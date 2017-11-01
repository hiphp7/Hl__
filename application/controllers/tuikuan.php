<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 退款
 */
class tuikuan extends CI_Controller {

    /**
     * 模拟get进行url请求
     * @param string $url
     * @param array $get_data
     */
    function request_get($url = '', $get_data = array()) {
        if (empty($url) || empty($get_data)) {
            return false;
        }

        $o = "";
        foreach ($get_data as $k => $v) {
            $o.= "$k=" . urlencode($v) . "&";
        }
        $get_data = substr($o, 0, -1);

        $postUrl = $url . '?' . $get_data;
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch); //运行curl
        curl_close($ch);

        return $data;
    }

    public function index($out_trade_no, $total_fee, $refund_fee) {
		// 更新数据库
        $bool = $this->db->update('dingdan', array('yituijine' => $refund_fee), array('dingdanhao' => $out_trade_no));

        // 更新数据库成功后，在调用退款接口
        if (!empty($bool) && intval($bool) > 0) {
			$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
			$get_data = array('transaction_id' => '', 'out_trade_no' => $out_trade_no, 'total_fee' => floatval($total_fee) * 100, 'refund_fee' => floatval($refund_fee) * 100);
			$resutl = $this->request_get($url, $get_data);
			//var_dump($resutl);

		}

        if (strpos($resutl, '成功')) {
            $ps = $this->input->get('ps');
            if ($ps == 'wufachupiao') {
                // 发短信通知无法出票 
                $this->load->library('myalidayu');
                $this->load->model('dingdan/mdingdan', 'mdingdan');
                if ($out_trade_no != '') {
					
                    $ddan = $this->mdingdan->getObjById($out_trade_no);

                    // 短信
                    $fasong = $this->mdingdan->getDuanXinTongZhiEx($ddan->id);
					if(!empty($fasong->airline_fan)){
					  $this->myalidayu->ChuPiaoShiBai_wangfan_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->date_fan, $fasong->dep_fan, $fasong->arr_fan, $fasong->airline_fan, $fasong->flight_fan);

					} else {
					  $this->myalidayu->ChuPiaoShiBai_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);

					}  
                }
            }
            $dingdanhao = $out_trade_no;

            $orders_sql = 'select m.id as id,
            m.dingdanhao as dingdanhao,
            m.sanfanggongsi as sanfanggongsi,
            m.dingdanleibie as dingdanleibie,
            m.yonghuid as yonghuid,
            m.chupiaobianma as chupiaobianma,
            m.zhifufangshi as zhifufangshi,
            m.dingdanzonge as dingdanzonge,
            m.chupiaozhuangtai as chupiaozhuangtai,
            m.lianxiren as lianxiren,
            m.lianxirendianhua as lianxirendianhua,
            m.baoxian as baoxian,
            m.baoxiaopingzheng as baoxiaopingzheng,
            m.fasongduanxin as fasongduanxin,
            m.dingdanzhuangtai as dingdanzhuangtai,
            m.fukuanshijian as fukuanshijian,
            m.chuangjianshijian as chuangjianshijian,
            m.chulishijian as chulishijian,
            m.wanchengshijian as wanchengshijian,
            m.caozuoyuanid as caozuoyuanid,
            m.beizhu as beizhu,
            m.shoujianren as shoujianren,
            m.youjidizhi as youjidizhi,
            m.youjirendianhua as youjirendianhua,
            m.suodanid as suodanid,
            m.yidipingtai as yidipingtai,
            m.yidicaigoujine as yidicaigoujine,
            m.yididingdanhao as yididingdanhao,
            m.yidiqitashuoming as yidiqitashuoming,
            m.prn as prn,
            m.caigoujine as caigoujine,
            m.qitashuoming as qitashuoming,
            m.isgaiqian as isgaiqian,
            m.chupiaozhuangtai as chupiaozhuangtai,
            m.chuangjianshijian as chuangjianshijian
            from dingdan as m  where dingdanhao = ?';

            $orders_res = $this->db->query($orders_sql, $dingdanhao);

            $dingdan = $orders_res->row();
            $orderid = $dingdan->id;

            $sql = "SELECT group_concat(concat(concat(lk.qifeishijian,'-'),lk.daodashijian)) as qifeidaodashijian, SUM(lk.fanchengbiaozhi) AS wangfan, GROUP_CONCAT(lk.s1) AS chengrencangweiall, GROUP_CONCAT(lk.s2) AS ertongcangweiall, SUM(lk.piaomiandanjia) as piaomiandanjiaall, SUM(lk.danzhangpiaomianjia) as danzhangpiaomianjiaall, group_concat(concat(concat(lk.dstCitysanzima,'-'),lk.orgCitysanzima)) as chufadaodacity, GROUP_CONCAT(lk.hangbanhao) as hanghanhaoall,lk.* FROM (select m.id as id,m.dstCitysanzima as dstCitysanzima,m.orgCitysanzima as orgCitysanzima,m.qifeishijian as qifeishijian,m.daodashijian as daodashijian,m.piaomiandanjia as piaomiandanjia,m.danzhangpiaomianjia AS danzhangpiaomianjia,m.xiaoshouzongjia AS xiaoshouzongjia,m.hangbanhao as hangbanhao,m.fanchengbiaozhi as fanchengbiaozhi,SUM(case when l.shifouertong = 0 THEN 1 else 0 END) AS daren,
            SUM(case when l.shifouertong = 1 THEN 1 else 0 END) AS ertong,l.shifouertong AS shifouertong,l.hangchengid AS hangchengid,mmm.s1 AS s1,mmm.s2 AS s2,m.dstCity,m.orgCity FROM hangcheng as m LEFT JOIN ( SELECT  m1.seatCode as s1, m1.hangchengid as h1, m2.hangchengid as h2  ,m2.seatCode as s2 FROM hangchenglvke AS m1,hangchenglvke AS m2 WHERE  m1.shifouertong =0 AND m2.shifouertong=1 ) as mmm ON mmm.h1 =m.id and mmm.h2 =m.id LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ? GROUP BY l.hangchengid )as lk ";

            $query = $this->db->query($sql, array($orderid));

            $hc = $query->row();

            $data = new stdclass();
            $data->dingdanhao = $dingdan->dingdanhao;
            $data->orderid = $orderid;
            $data->lianxiren = $dingdan->lianxiren;
              $data->lianxirendianhua = $dingdan->lianxirendianhua;  // 联系人电话
              $data->chuangjianshijian  = $dingdan->chuangjianshijian;  // 创建时间
              $data->zhifushijian  = $dingdan->fukuanshijian;  // 付款时间
              $data->chupiaoshijian  = $dingdan->wanchengshijian;  // 完成时间
              $data->dingdanzhuangtai  = $dingdan->dingdanzhuangtai;  // 订单状态
              $data->jipiaozongjia  = $dingdan->dingdanzonge;  // 订单总价

              $data->zhifufeilv = 0.006; // 支付费率
              $data->zhifushouxufei = floatval($dingdan->dingdanzonge) * 0.006; // 支付手续费
              $data->shijishoukuan = floatval($dingdan->dingdanzonge)-$data->zhifushouxufei;  // 实收款
              $data->zhifuqudao = $dingdan->zhifufangshi;  // 支付渠道
              $data->baoxiaozongjia = $dingdan->baoxiaopingzheng ?  15 : 0;

              $data->hangchengleixing = $hc->wangfan;   // 是否往返程
              $data->hangbanhao = $hc->hanghanhaoall; // 航班号
              $data->chufachengshi = $hc->orgCity;  // 出发城市
              $data->daodachengshi = $hc->dstCity;  // 到达城市

              $data->qifeijichang = $hc->chufadaodacity; // 出发机场-到达机场

              $data->chengrencangwei = $hc->chengrencangweiall;  // 成人舱位
              $data->ertongcangwei = $hc->ertongcangweiall;   // 儿童舱位
              $data->chengrenshuliang = $hc->daren;  // 成人数
              $data->ertonshuliang = $hc->ertong;  // 儿童数
              $data->changrenjia = $hc->piaomiandanjiaall;  // 成人票面价
              $data->ertongjia = intval($hc->danzhangpiaomianjiaall)/2; // 儿童价票面价
              $data->qifeidaodashijian = $hc->qifeidaodashijian; // 起飞到达时间

              $data->youhu = 0;

              if ($dingdan->baoxian) {
                $sql2 = 'select m.dingdanzongjia as dingdanzongjia from baoxiandingdan as m where m.dingdanid = ?';
                $query = $this->db->query($sql2, array($orderid));

                $baoxian = $query->first_row();
                $baoxiandanjia = $baoxian->dingdanzongjia;
                $data->baoxiandanjia = $baoxiandanjia;
                $daren = $hc->daren;
                $ertong = $hc->ertong;

                $data->baoxianshu = $daren + $ertong;
                $data->baoxianzongjia = ($daren + $ertong) * $baoxiandanjia;


              } else {
                $data->baoxiandanjia = 0;
                $data->baoxianshu = 0;
                $data->baoxianzongjia = 0;

              }
            $data->dingdanzhuangtai = '无法出票';
            $data->tuikuanshijian = date("YmdHis");
            $this->db->insert('caiwu_fj_judan',$data);
			
            // 修改出票状态  chupiaozhuangtai 10  dingdanzhuangtai 5  dingdanhao
            $this->db->update('dingdan', array('chupiaozhuangtai' => 10, 'dingdanzhuangtai' => 5), array('dingdanhao' => $out_trade_no));
			//  修改航程旅客状态
			$this->db->update('hangchenglvke', array('zhuangtai' => '无法出票'), array('dingdanid' => $ddan->id));

 
			
            echo '成功';
        } else {
            echo '失败';
        }
    }

}
