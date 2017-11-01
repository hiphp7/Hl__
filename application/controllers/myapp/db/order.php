<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 订单处理
 */
class order extends CI_Controller {
    // 改签支付
    public function gaiqianzhifu(){
		$callback = $this->input->get('callback');
        $this->db->trans_begin();
        $gaiqianorder = json_decode($this->input->get('gaiqianorder'));
        $dingdanid = $gaiqianorder->orderid;

        $time = date("Y-m-d H:i:s");
        $this->db->set('dingdanzhuangtai', 1);
        $this->db->set('chupiaozhuangtai', 0);
        $this->db->set('fukuanshijian', $time);
        $this->db->where('id', $dingdanid);
        $this->db->update('dingdan');

        $hangchengs = $gaiqianorder->hangchengs;
        if (!empty($hangchengs->goto)) {
            $hangchenglvkes= $hangchengs->goto->hangchenglvkes;
            foreach($hangchenglvkes as $lk){
                $this->db->set('zhuangtai', '出票中');
                $this->db->where('id', $lk->id);
                $this->db->update('hangchenglvke');
            }
        }
        if (!empty($hangchengs->back)) {
            $hangchenglvkes= $hangchengs->back->hangchenglvkes;
            foreach($hangchenglvkes as $lk){
                $this->db->set('zhuangtai', '出票中');
                $this->db->where('id', $lk->id);
                $this->db->update('hangchenglvke');
            }
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $dingdanhao = $gaiqianorder->dingdanhao;
            $totalprice = $gaiqianorder->dingdanzonge;
            // 失败回滚的时候要把钱退掉
            $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
            $get_data = array('transaction_id' => '', 'out_trade_no' => $dindanhao, 'total_fee' => $totalprice, 'refund_fee' => $totalprice);
            $resutl = $this->request_get($url, $get_data);            
           
			echo $callback . "(fasle)";
        }
        else
        {

           $this->db->trans_commit();

			echo $callback . "(true)";
        }

    }
	// 获取退签改
	public function tuigaiqian_localDb($airlineCode, $seatCode){
		$callback = $this->input->get('callback');
        //$airlineCode = $this->input->get('aircode');
        //$seatCode = $this->input->get('seatCode');
        $this->db->trans_begin();
        $sql = 'select m.seatId as seatId,
        m.airlineCode as airlineCode,
        m.seatCode as seatCode,
        m.refundStipulate as refundStipulate,
        m.changeStipulate as changeStipulate,
        m.suitableAirline as suitableAirline,
        m.modifyStipulate as modifyStipulate from tuigaiqianzhengce as m where airlineCode = ? and seatCode =? ';
        $query = $this->db->query($sql, array($airlineCode,$seatCode));
        $adult = $query->row();

        $sql = 'select m.seatId as seatId,
        m.airlineCode as airlineCode,
        m.seatCode as seatCode,
        m.refundStipulate as refundStipulate,
        m.changeStipulate as changeStipulate,
        m.suitableAirline as suitableAirline,
        m.modifyStipulate as modifyStipulate from tuigaiqianzhengce as m where airlineCode = ? and seatCode = "Y" ';
        $query = $this->db->query($sql, array($airlineCode));
        $child = $query->row();

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return 'fasle';
        }
        else
        {
            $this->db->trans_commit();
            $data = new stdClass();
            $data->adult = $adult;
            $data->child = $child;
            return json_encode($data);
        }

    }
	
	// 获取退签改
	public function tuigaiqian(){
		$callback = $this->input->get('callback');
		date_default_timezone_set("Asia/Shanghai");
		$airport = $this->config->item("airport_short"); //机场
		//出发日期
		$depDate = $this->input->get('date');
		//航空公司
        $airlineCode = $this->input->get('aircode');
		//出发机场三字码
		$depCode = array_search($this->input->get('orgAirport'), $airport);
		//目的机场三字码
		$arrCode = array_search($this->input->get('dstAirport'), $airport);
		//舱位
        $classCode = $this->input->get('seatCode');
		
        $this->load->library('mypost');
        $conf = $this->config->item("conf");
		
		//返回成功与否判断
		$returnStatus = "true";
		//echo $this->tuigaiqian_localDb($airlineCode, $classCode);
        //die();
		
		// 成人
        $url = $conf['Url51Book'] . "getModifyAndRefundStipulateServiceRestful1.0/getModifyAndRefundStipulate";
        $post_data['agencyCode'] = $conf['Agency51Book'];
		$sign = md5($conf['Agency51Book'] . $airlineCode . $arrCode . $classCode . $depCode . $depDate . $conf['Security51Book']);
        $post_data['sign'] = $sign;
		$post_data['depDate'] = $depDate;
        $post_data['airlineCode'] = $airlineCode;
        $post_data['classCode'] = $classCode;
        $post_data['depCode'] = $depCode;
		$post_data['arrCode'] = $arrCode;
        $res = $this->mypost->request_post($url, $post_data);
        $g = simplexml_load_string($res);
        if (!empty($g) && $g->returnCode == 'S') {
			$adult = new stdClass();
			//条目id
			$adult->seatId = $g->modifyAndRefundStipulateList->seatId;
			//航空公司二字码
            $adult->airlineCode = $airlineCode;
	
			//$adult->airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
			//舱位码
			$adult->seatCode = $g->modifyAndRefundStipulateList->seatCode;
			//舱位级别
			$adult->seatType = $g->modifyAndRefundStipulateList->seatType;
			//服务级别
			$adult->serviceLevel = $g->modifyAndRefundStipulateList->serviceLevel;
			//退票规定
			$adult->refundStipulate = urldecode($g->modifyAndRefundStipulateList->refundStipulate);
			//更改规定
			$adult->changeStipulate = urldecode($g->modifyAndRefundStipulateList->changeStipulate);
			//适用航线
			$suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
			$a = (array)$suitableAirline;
			$a = $a[0];
            $adult->suitableAirline = $a;
			//$adult->suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
			//签转规定
			$modifyStipulate = "可以改签";
			if (urldecode($g->modifyAndRefundStipulateList->modifyStipulate) == '不能改签;') {
				$modifyStipulate = "不能改签";
			}
			$adult->modifyStipulate = $modifyStipulate;
		}else{
			$returnStatus = "false";
		}
		
		// 儿童
		$url = $conf['Url51Book'] . "getModifyAndRefundStipulateServiceRestful1.0/getModifyAndRefundStipulate";
        $post_data['agencyCode'] = $conf['Agency51Book'];
		$sign = md5($conf['Agency51Book'] . $airlineCode . $arrCode . "Y". $depCode . $depDate . $conf['Security51Book']);
        $post_data['sign'] = $sign;
		$post_data['depDate'] = $depDate;
        $post_data['airlineCode'] = $airlineCode;
        $post_data['classCode'] = "Y";
        $post_data['depCode'] = $depCode;
		$post_data['arrCode'] = $arrCode;
        $res = $this->mypost->request_post($url, $post_data);
        $g = simplexml_load_string($res);
        if (!empty($g) && $g->returnCode == 'S') {
			$child = new stdClass();
			//条目id
			$child->seatId = $g->modifyAndRefundStipulateList->seatId;
			//航空公司二字码
			//$airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
            //$airlineCode = strval($airlineCode);
            //$child->airlineCode = $airlineCode[0];
			$child->airlineCode = $airlineCode;
			//$child->airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
			//舱位码
			$child->seatCode = $g->modifyAndRefundStipulateList->seatCode;
			//舱位级别
			$child->seatType = $g->modifyAndRefundStipulateList->seatType;
			//服务级别
			$child->serviceLevel = $g->modifyAndRefundStipulateList->serviceLevel;
			//退票规定
			$child->refundStipulate = urldecode($g->modifyAndRefundStipulateList->refundStipulate);
			//更改规定
			$child->changeStipulate = urldecode($g->modifyAndRefundStipulateList->changeStipulate);
			//适用航线
			$suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
			$a = (array)$suitableAirline;
			$a = $a[0];
			$child->suitableAirline = $a;
			//签转规定
			$modifyStipulate = "可以改签";
			if (urldecode($g->modifyAndRefundStipulateList->modifyStipulate) == '不能改签;') {
				$modifyStipulate = "不能改签";
			}
			$child->modifyStipulate = $modifyStipulate;
		}else{
			$returnStatus = "false";
		}
		if($returnStatus == "true"){
			$data = new stdClass();
			$data->adult = $adult;
			$data->child = $child;
			
			echo $callback . "(" . json_encode($data) . ")";
		}else{
			echo $callback . "(false)";
		}
		
    }
	public function chahangchengtuigaiqian() {
		$callback = $this->input->get('callback');
        $hangchengid = $this->input->get('hangchengid');
  
        $sql = 'select m.refundStipulate as refundStipulate,
        m.changeStipulate as changeStipulate,
        m.suitableAirline as suitableAirline,
        m.modifyStipulate as modifyStipulate,
        m.refundStipulateChild as refundStipulateChild,
        m.changeStipulateChild as changeStipulateChild,
        m.modifyStipulateChild as modifyStipulateChild,
        m.suitableAirlineChild as suitableAirlineChild from hangcheng as m where id = ? ';
        $query = $this->db->query($sql, array($hangchengid));
        $res = $query->row();
        if (!empty($query)) {
            $adult = new stdClass();
            $adult->refundStipulate = $res->refundStipulate;
            $adult->changeStipulate = $res->changeStipulate;
            $adult->suitableAirline = $res->suitableAirline;
            $adult->modifyStipulate = $res->modifyStipulate;
            $child = new stdClass();
            $child->refundStipulate = $res->refundStipulateChild;
            $child->changeStipulate = $res->changeStipulateChild;
            $child->suitableAirline = $res->suitableAirlineChild;
            $child->modifyStipulate = $res->modifyStipulateChild;
            
            $data = new stdClass();
            $data->adult = $adult;
            $data->child = $child;
			
            echo $callback . "(" . json_encode($data) . ")";
        } else {
            echo $callback . "(false)";
        }


    }
	
	
	    public function save() {
			$callback = $this->input->get('callback');
			$this->db->trans_begin();
			// 加载乘客
            $this->load->model("yonghu/mlvkei", "mlvkei");
			// 加载用户地址 (用于收邮件)
            $this->load->model("yonghu/myonghudizhi", "myonghudizhi");
			// 加载订单
            $this->load->model("dingdan/mdingdan", "mdingdan");
			// 加载航程
			$this->load->model("hangcheng/mhangcheng", "mhangcheng");
			
			// 支付完成传递过来的订单号
			$dindanhao = $this->input->get('orderid');
			// 收件地址需保存订单中
            $mail = json_decode($this->input->get('mail'));
			// 航程 保险信息
			$selected = json_decode($this->input->get('selected'));
			// 获取旅客数据
			$lvke = json_decode($this->input->get('userContacts'));
			// 获取地址列表
			$addressList = json_decode($this->input->get('addressList'));
			// 获取保险
			$baoxian = json_decode($this->input->get('Insurance'));
			//联系人
            $currentContact = json_decode($this->input->get('currentContact'));
			// 价格
			$costdetail = json_decode($this->input->get('costdetail'));
			
            $yonghuid = $currentContact->id;  // 用户id
            $lianxirendianhua = $currentContact->shoujihaoma; // 联系人手机号码
            $lianxiren = $currentContact->xingming; // 姓名
			
			// 第一步：
			// 添加订单
			$dingdan_obj = $this->mdingdan->getSaveObj($yonghuid, $costdetail, $mail);
			// 保存订单
            $this->db->insert('dingdan', $dingdan_obj);
            $dingdanid = $this->db->insert_id();
			// 生成订单号
			$this->db->update('dingdan', array('dingdanhao' => $dindanhao), array('id' => $dingdanid));
			
			// 第二步：
			// 添加航程
			// 添加后 再传入航程 
		    $lvke = $this->gethangchenglvke($lvke, $yonghuid);
			$hc_obj_ar = $this->mhangcheng->getSaveObj($selected, $dingdan_obj, $dingdanid, $lvke, $baoxian,$costdetail);
			$index = 0;
			foreach($hc_obj_ar as $hc_obj)
			{
			//$hc_obj = $this->mhangcheng->getSaveObj($selected, $dingdan_obj, $dingdanid, $lvke, $baoxian);
		    $hc1 = $hc_obj->hangcheng;
			$hc1->dingdanid = $dingdanid;
			
			if(count($hc_obj_ar)>1)
			{
			    // 返程标志
			    // $hc1->fanchengbiaozhi = 1; //  0 去程 1返程
			    // 往返航程
			    $hc1->wangfanhangcheng = 1; //  0 单程 1 往返程
			}
			else
			{
				// 往返航程
			    $hc1->wangfanhangcheng = 0; //  0 单程 1 往返程
			}
			
			if($index == 0)
			{
				$hc1->fanchengbiaozhi = 0;
			}
			else
			{
				$hc1->fanchengbiaozhi = 1;
			}
			$index++;
			
			// 保存航程信息
            $this->db->insert('hangcheng', $hc1);
            $hangchengid = $this->db->insert_id();
			
			// 保存 航程旅客
			foreach($hc_obj->lvke as $c)
			{
				// 第三步：
				// 保存航程旅客
				$lk = $c->lk;
				$lk->dingdanid = $dingdanid;
				$lk->hangchengid = $hangchengid;
				$lk->shifoutuipiao = '否';
                $lk->shifougaiqian = '否';
				
				$this->db->insert('hangchenglvke', $lk);
				$hangchenglvkeid = $this->db->insert_id();
				
				// 第四步：
				if(!empty($c->accident))
				{
				    $accident = $c->accident;
				    $accident->dingdanid = $dingdanid;
				    $accident->hangchenglvkeid = $hangchenglvkeid;
				
				    $this->db->insert('baoxiandingdan', $accident);
					$baoxiandingdanid = $this->db->insert_id();
					$this->db->update('baoxiandingdan', array('baoxiandingdanhao' => "BX".time().$baoxiandingdanid), array('id' => $baoxiandingdanid));
				}
				if(!empty($c->dallyover))
                {
                    $dallyover = $c->dallyover;
                    $dallyover->dingdanid = $dingdanid;
                    $dallyover->hangchenglvkeid = $hangchenglvkeid;
					
                    $this->db->insert('baoxiandingdan', $dallyover);
					$baoxiandingdanid = $this->db->insert_id();
					$this->db->update('baoxiandingdan', array('baoxiandingdanhao' => 'BX'.time().$baoxiandingdanid), array('id' => $baoxiandingdanid));
                }
				//echo '订单ID：'.$dingdanid.' 航程ID：'. $hangchengid .' 航程旅客ID：'.$hangchenglvkeid.' 保险ID： '.$baoxiandingdanid;
			}
			}
			// 添加乘客
            //foreach ($lvke as $v) {
            //      $this->mlvkei->UpdateSave($yonghuid, $v->zhongwenming, $v->chushengriqi, $v->zhengjianhaoma, array_search(strval($v->zhengjianleixing), $this->config->item('证件类型')), $v->type);
            //}

                // 保存收件地址
                if ($addressList != '') {
					$this->saveaddress($addressList,$yonghuid);
                    //foreach ($addressList as $v) {
                    //    $this->myonghudizhi->UpdateSave($yonghuid, $v->shoujianrenmingzi, $v->dizhi, $v->shoujihao);
                    //}
                }
			// 以下操作为保存财务出票订单用
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

                $orders_res = $this->db->query($orders_sql, $dindanhao);

                $dingdan = $orders_res->row();

                 $orderid = $dingdan->id;
                 
                 $sql = "SELECT group_concat(concat(concat(lk.qifeishijian,'-'),lk.daodashijian)) as qifeidaodashijian, SUM(lk.fanchengbiaozhi) AS wangfan, GROUP_CONCAT(lk.s1) AS chengrencangweiall, GROUP_CONCAT(lk.s2) AS ertongcangweiall, SUM(lk.piaomiandanjia) as piaomiandanjiaall, SUM(lk.danzhangpiaomianjia) as danzhangpiaomianjiaall, group_concat(concat(concat(lk.dstCitysanzima,'-'),lk.orgCitysanzima)) as chufadaodacity, GROUP_CONCAT(lk.hangbanhao) as hanghanhaoall,lk.* FROM (select m.id as id,m.dstCitysanzima as dstCitysanzima,m.orgCitysanzima as orgCitysanzima,m.qifeishijian as qifeishijian,m.daodashijian as daodashijian,m.piaomiandanjia as piaomiandanjia,m.danzhangpiaomianjia AS danzhangpiaomianjia,m.xiaoshouzongjia AS xiaoshouzongjia,m.hangbanhao as hangbanhao,m.fanchengbiaozhi as fanchengbiaozhi,
     l.shifouertong AS shifouertong,l.hangchengid AS hangchengid,mmm.s1 AS s1,mmm.s2 AS s2,m.dstCity,m.orgCity FROM hangcheng as m LEFT JOIN ( SELECT  m1.seatCode as s1, m1.hangchengid as h1, m2.hangchengid as h2  ,m2.seatCode as s2 FROM hangchenglvke AS m1,hangchenglvke AS m2 WHERE  m1.shifouertong =0 AND m2.shifouertong=1 ) as mmm ON mmm.h1 =m.id and mmm.h2 =m.id LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ? GROUP BY l.hangchengid )as lk ";
                 
                 $query = $this->db->query($sql, array($orderid));

                 $hc = $query->row();
				 $sql4 = '
				 select
				 SUM(case when l.shifouertong = 0 THEN 1 else 0 END) AS daren,
				 SUM(case when l.shifouertong = 1 THEN 1 else 0 END) AS ertong FROM hangcheng as m LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ? limit 1';
				 $query = $this->db->query($sql4, array($orderid));
				 $renci = $query->row();
                 $data = new stdclass();
                 $data->dingdanhao = $dingdan->dingdanhao;
                 $data->orderid = $orderid;
                 $data->lianxiren = $dingdan->lianxiren;
                $data->lianxirendianhua = $dingdan->lianxirendianhua;  // 联系人电话
                $data->chuangjianshijian  = $dingdan->chuangjianshijian;  // 创建时间
                $data->zhifushijian  = $dingdan->fukuanshijian;  // 付款时间
                $data->chupiaoshijian  = $dingdan->wanchengshijian;  // 完成时间
                $data->dingdanzhuangtai  = $dingdan->dingdanzhuangtai;  // 订单状态
                $data->jiaopiaozongjia  = $dingdan->dingdanzonge;  // 订单总价

                $data->zhifufeilv = 0.006; // 支付费率
                $data->zhifushouxufei = floatval($dingdan->dingdanzonge) * 0.006; // 支付手续费
                $data->shijishoukuan = floatval($dingdan->dingdanzonge)-$data->zhifushouxufei;  // 实收款
                $data->zhifuqudao = $dingdan->zhifufangshi;  // 支付渠道
                $data->baoxiaozongjia = $dingdan->baoxiaopingzheng ?  15 : 0;

                $data->hangchengleixing = $hc->wangfan;   // 是否往返程
				if ($hc->wangfan) {
                    $daren = intval($renci->daren)/2;
                    $ertong = intval($renci->ertong)/2;
                    $baoxianshu = ($daren+$ertong)*2 ;
                } else {
                    $daren = $renci->daren;
                    $ertong = $renci->ertong;
                    $baoxianshu = $daren+$ertong;
                }
                $data->hangbanhao = $hc->hanghanhaoall; // 航班号
                $data->chufachengshi = $hc->orgCity;  // 出发城市
                $data->daodachengshi = $hc->dstCity;  // 到达城市

                $data->qifeijichang = $hc->chufadaodacity; // 出发机场-到达机场

                $data->chengrencangwei = $hc->chengrencangweiall;  // 成人舱位
                $data->ertongcangwei = $hc->ertongcangweiall;   // 儿童舱位
                $data->chengrenshuliang = $daren;  // 成人数
                $data->ertonshuliang = $ertong;  // 儿童数
                $data->changrenjia = $hc->piaomiandanjiaall;  // 成人票面价
                $data->ertongjia = intval($hc->danzhangpiaomianjiaall)/2; // 儿童价票面价
                $data->qifeidaodashijian = $hc->qifeidaodashijian; // 起飞到达时间

                $data->youhu = 0;

                if ($dingdan->baoxian) {
                    $sql2 = 'select m.dingdanzongjia as dingdanzongjia from baoxiandingdan as m where m.dingdanid = ?';
                    $query = $this->db->query($sql2, array($orderid));

                    $baoxian = $query->first_row();
                    $baoxiamdamjia = $baoxian->dingdanzongjia;
                    $data->baixiandanjia = $baoxiamdamjia;
                    $daren = $hc->daren;
                    $ertong = $hc->ertong;

                    $data->baoxianshu = $daren + $ertong;
                    $data->baoxiandanjia = ($daren + $ertong) * $baoxiamdamjia;


                } else {
                    $data->baixiandanjia = 0;
                    $data->baoxianshu = 0;
                    $data->baoxiandanjia = 0;

                }

                $this->db->insert('caiwu_fj_chupiao' , $data);  
			
			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				
				// 失败回滚的时候要把钱退掉
				$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
                $get_data = array('transaction_id' => '', 'out_trade_no' => $dindanhao, 'total_fee' => $costdetail->totalprice, 'refund_fee' => $costdetail->totalprice);
                $resutl = $this->request_get($url, $get_data);
				echo $callback . "(" . json_encode($data) . ")";
			}
			else
			{
				$this->db->trans_commit();
				
				echo $callback . "(false)"
			}
		}
		
		// 保存收件地址
    public function saveaddress($addressList, $yonghuid) {
		$callback = $this->input->get('callback');
        if (!empty($addressList) && $addressList != '') {
            foreach ($addressList as $v) {
                $obj = array('yonghuid' => $yonghuid,
                    'shoujianrenmingzi' => $v->shoujianrenmingzi,
                    'dizhi' => $v->dizhi,
                    'shoujihao' => $v->shoujihao);
                if ($v->isNew) {
                    $this->db->insert('yonghudizhi', $obj);
                } else {
                    $this->db->update('yonghudizhi', $obj, array('id' => $v->id));
                }
            }
        }
    }
		
		/**
         * 获取航程旅客并保存旅客信息
         */
        public function gethangchenglvke($lvke, $yonghuid)
        {
            $callback = $this->input->get('callback');
            $data = new stdClass();
            $hangchenglvke = array();  //  买票的乘客
            foreach ($lvke as $v) {

                $data->yonghuid = $yonghuid;
                $data->zhongwenming = $v->zhongwenming;
                $data->chushengriqi = $v->chushengriqi;
                $data->zhengjianhaoma = $v->zhengjianhaoma;
                $data->shifouertong = $v->type;
				$v->shifouertong = $v->type;

                $zhengjianleixing = $this->config->item('证件类型');
                $v->zhengjianleixing = array_search(strval($v->zhengjianleixing), $zhengjianleixing);
                $data->zhengjianleixing = $v->zhengjianleixing;
				
                $isNew = $v->isNew;
                $chk = $v->chk;
                $isEdit = $v->isEdit;

                if ($isNew == true) {
                    $chk = $v->chk;
                    if ($chk == true) {
                        $this->db->insert('lvke', $data);
                        $id = $this->db->insert_id();
                        // 插入后取出;
                        $sql = 'select m.id as id, m.yonghuid as yonghuid, m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, m.shifouertong as shifouertong, m.xingbie as xingbie, m.chushengriqi as chushengriqi, m.guoji as guoji, m.zhengjianleixing as zhengjianleixing, m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi, m.chushengdi as chushengdi, m.shoujihao as shoujihao, m.lianxidianhua as lianxidianhua, m.email as email from lvke as m where id = ?';
                        $query = $this->db->query($sql ,array($id));
                        $row = $query->row();
                        if (isset($row)) {
                            $hangchenglvke[] = $query->row();
                        }

                    } else {
                        $this->db->insert('lvke', $data);
                    }
                } else {
                    $id = $v->id;
                    if ($isEdit == true) {
                        if ($chk == true) {
                            $this->db->where('id', $id);
                            $this->db->update('lvke', $data);
                            $hangchenglvke[] = $v;
                        } else {
                            $this->db->where('id', $id);
                            $this->db->update('lvke', $data);
                        }
                    } else {
                        if ($chk == true){
                                $hangchenglvke[] = $v;
                            }
                    }
                }
            }
            return $hangchenglvke;
        }
		
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
        foreach ( $get_data as $k => $v ) 
        { 
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $get_data = substr($o,0,-1);

        $postUrl = $url.'?'.$get_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
    }
	
    /** 
     * 对象数组转为普通数组 
     * 
     */  
     public function object2array($object) {
       if (is_object($object)) {
            $array = array();
         foreach ($object as $key => $value) {
           $array[$key] = $value;
         }
       }
       else {
         $array = $object;
       }
       return $array;
     }
}
