<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    public function index() {
        $this->load->view('h5/templates/user/index');
    }

    public function personal() {
        $this->load->view('h5/templates/user/personal');
    }

    public function register() {
        $this->load->view('h5/templates/user/register');
    }

    public function login() {
        $this->load->view('h5/templates/user/login');
    }

    // 找回密码
    public function forgotPassword() {
        $this->load->view('h5/templates/user/forgotPassword');
    }

    //我的帐户
    public function myaccount() {
        $this->load->view('h5/templates/user/myaccount');
    }

    //机票订单
    public function flightOrder() {
        $this->load->view('h5/templates/user/order/flightOrder');
    }

    //订单详情
    public function orderDetail() {
        $this->load->view('h5/templates/user/order/orderDetail');
    }
	
	//机票订单 - 改签
    public function alterTicket() {
        $this->load->view('h5/templates/user/order/alterTicket');
    }
	//机票订单 - 退票
    public function refundTicket() {
        $this->load->view('h5/templates/user/order/refundTicket');
    }

    //常用信息
    public function commonInfo() {
        $this->load->view('h5/templates/user/commonInfo');
    }
	
	//火车订单
    public function trainorderlist() {
        $this->load->view('h5/templates/user/trainorderlist');
    }
    //火车订单详情
    public function trainorderinfo() {
        $this->load->view('h5/templates/user/mytraininfo');
    }
    //火车退款
    public function traintuikuan() {
        $this->load->view('h5/templates/user/traintuikuan');
    }

    /*
     * 查询用户表信息 begin
     */

    // 查询手机号码
    public function FindShouJiHaoMa() {
		$callback = $this->input->get('callback');
        $shoujihaoma = $this->input->get('shoujihaoma');
        $sql = 'select m.id as id from yonghu as m where m.shoujihaoma = ? ';
        $res = $this->db->query($sql, $shoujihaoma);
        $row = $res->first_row();
        if (!empty($row) && intval($row->id) > 0) {
            echo intval($row->id);
        } else {
            echo false;
        }
    }
	
	// 查询账户
    public function FindZhangHu() {
		$callback = $this->input->get('callback');
        $shoujihaoma = $this->input->get('shoujihaoma');
        $sql = 'select m.id as id from yonghu as m where m.zhanghu = ? ';
        $res = $this->db->query($sql, $shoujihaoma);
        $row = $res->first_row();
        if (!empty($row) && intval($row->id) > 0) {
            echo intval($row->id);
        } else {
            echo false;
        }
    }

    // 登录时查询手机号码或邮箱号码/注册邮箱
    public function FindDengLuMing() {
		$callback = $this->input->get('callback');
        // number可以是手机号码或邮箱号码
        $ps = $this->input->get('number');
        $mima = $this->input->get('mima');
        $obj = array('dengluriqi' => date("Y-m-d H:i:s"));
        //$sql = 'select m.id as id, m.zhanghu as zhanghu, m.mima as mima, m.xingming as xingming, m.shoujihaoma as shoujihaoma from yonghu as m where m.mima = ? and (m.shoujihaoma = ? or m.youxiang = ?)';
        $sql = 'select m.id as id, m.zhanghu as zhanghu, m.mima as mima, m.xingming as xingming, m.shoujihaoma as shoujihaoma from yonghu as m where m.mima = ? and ';
        if(strpos($ps, '@') !== false)
        {
            $sql = $sql.'m.youxiang = ?';
            $this->db->update('yonghu', $obj, array('youxiang' => $ps));
        }
        else
        {
            $sql = $sql.'m.zhanghu = ?';
            $this->db->update('yonghu', $obj, array('zhanghu' => $ps));
        }
        $res = $this->db->query($sql, array($mima, $ps));
        //$bool = $this->db->update('yonghu', $obj, array('shoujihaoma' => $shoujihaoma));
        $row = $res->first_row();
		
	echo json_encode($row);
    }
	
	public function FindDengLuMingget() {
		$callback = $this->input->get('callback');
        // number可以是手机号码或邮箱号码
        $shoujihaoma = $this->input->get('number');
        $youxiang = $this->input->get('number');
        $mima = $this->input->get('mima');
        $obj = array('dengluriqi' => date("Y-m-d H:i:s"));
        //$sql = "select m.id as id from yonghu as m where m.mima = ? and m.id = (select m.id as id from yonghu as m where m.shoujihaoma = ? or m.youxiang = ?)";
        //$res = $this->db->query($sql, array($mima, $shoujihaoma, $shoujihaoma));
        $sql = 'select m.id as id, m.zhanghu as zhanghu, m.mima as mima, m.xingming as xingming, m.shoujihaoma as shoujihaoma from yonghu as m where m.mima = ? and (m.shoujihaoma = ? or m.youxiang = ?)';
        $res = $this->db->query($sql, array($mima, $shoujihaoma, $youxiang));
        $bool = $this->db->update('yonghu', $obj, array('shoujihaoma' => $shoujihaoma));
        $row = $res->first_row();
		
		echo json_encode($row);
		
    }

    //查找用户全部信息
    public function FindAll() {
		$callback = $this->input->get('callback');
        $UserId = $this->input->get('UserId');
        $sql = 'select m.id as id,
m.zhanghu as zhanghu,
m.mima as mima,
m.xingming as xingming,
m.xingbie as xingbie,
m.youxiang as youxiang,
m.shoujihaoma as shoujihaoma,
m.chushengriqi as chushengriqi,
m.zhuceriqi as zhuceriqi,
m.beizhu as beizhu,
m.zhucelaiyuan as zhucelaiyuan,
m.dengluriqi as dengluriqi,
m.OpenidQQ as OpenidQQ,
m.OpenidWX as OpenidWX,
m.UnionidWX as UnionidWX,
m.OpenidXM as OpenidXM,
m.chengshiip as chengshiip from yonghu as m where m.id = ?';
        $res = $this->db->query($sql, $UserId);
        $rows = $res->result();
        echo json_encode($rows);
    }

    //上传头像
    public function upload() {
		$callback = $this->input->get('callback');
        // 用户id
        $UserId = $this->input->get('UserId');
        // 去掉url头后的base64编码字符串
        $base64 = $this->input->get('touxiang');
        //获取图片类型
        $type = $this->input->get('type');
        $new_file = "/usr/local/apache/htdocs/air/resources/user/userImages/" . $UserId . ".{$type}";
        $base64_decode = base64_decode($base64);
        if (write_file($new_file, $base64_decode)) {
            echo $UserId . ".{$type}";
        } else {
            echo false;
        }
    }

    // 查询用户表信息 [end]
    //注册并增加注册日期
    public function AddZhuCeRiQi() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $obj = array(
            'zhanghu' => $this->input->get('shoujihaoma'),
            'shoujihaoma' => $this->input->get('shoujihaoma'),
            'mima' => $this->input->get('mima'),
            'zhuceriqi' => date("Y-m-d H:i:s")
        );
		
        $this->db->insert('yonghu', $obj);
        $id = $this->db->insert_id();
        echo $id;
    }

    // 更新用户数据
    public function updateUserData() {
		$callback = $this->input->get('callback');
        // 用户id
        $UserId = $this->input->get('UserId');
        // 用户姓名
        $xingming = $this->input->get('xingming');
        // 用户性别
        $xingbie = $this->input->get('xingbie');
        // 用户密码
        $mima = $this->input->get('mima');
        // 用户手机号码
        $zhanghu = $this->input->get('zhanghu');
        // 用户邮箱
        $youxiang = $this->input->get('youxiang');

        // 判断信息是否改变
        $obj = array();
        if (!empty($xingming) && $xingming != '') {
            $obj['xingming'] = $xingming;
        }

        if (!empty($xingbie) && $xingbie != '') {
            $obj['xingbie'] = $xingbie;
        }

        if (!empty($mima) && $mima != '') {
            $obj['mima'] = $mima;
        }
        if (!empty($zhanghu) && $zhanghu != '') {
            $obj['zhanghu'] = $zhanghu;
			$obj['shoujihaoma'] = $zhanghu;
        }

        if (!empty($youxiang) && $youxiang != '') {
            $obj['youxiang'] = $youxiang;
        }
        $bool = $this->db->update('yonghu', $obj, array('id' => $UserId));

        echo $bool;
    }

    //获取验证码
    public function YanZhengMa() {
		$callback = $this->input->get('callback');
        // 获取参数
        $shoujihaoma = $this->input->get('shoujihaoma');
        $obj = new stdClass();
        $obj->yzm = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        //$obj->yzm = '789875';
        $this->load->library('myalidayu');
        $obj->result = $this->myalidayu->YanZhengMa($obj->yzm, '', $shoujihaoma);
        echo json_encode($obj);
    }

    // 发送邮件
    public function SendEmail() {
		$callback = $this->input->get('callback');
        $youxiang = $this->input->get('youxiang');
        $obj = new stdClass();
        $obj->yzm = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

        $this->load->library('email');
        //以下设置Email参数  
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.126.com';
        $config['smtp_user'] = 'monk0123456@126.com';
        $config['smtp_pass'] = '19830306';
        $config['smtp_port'] = '25';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        //以下设置Email内容  
        $this->email->from('monk0123456@126.com', '比比旅行官网');
        $this->email->to($youxiang);
        $this->email->subject('比比旅行用户(m.bibi321.com)绑定邮箱验证码');
        $this->email->message(
                '<div style="font-size: 14px;">
                亲爱的比比旅行用户，您好！
                <br/>
                <br/>
                您的绑定验证码是：<span style="color: rgb(247, 118, 22);">' . $obj->yzm . '</span>
                <br/>
                <br/>
                本邮件由系统自动发送，请勿直接回复！
                <br/>
                感谢您的访问，祝您使用愉快！
                <br/>
                <br/>
                比比旅行
                <br/>
                <span style="color: #900;">m.bibi321.com</span>
            </div>'
        );
        //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径  
        $obj->rel = $this->email->send();
        echo json_encode($obj);
    }
	
	//机票订单 - 获取订单列表（订单+航程）
    public function orderList() {
		$callback = $this->input->get('callback');
        $UserId = $this->input->get('UserId');
		$status = $this->input->get('status');
        $sf = $this->input->get('sf');
        $jc = $this->config->item("机场"); //城市
        $airport = $this->config->item("airport_short"); //机场
        $cpzt = $this->config->item("出票状态"); //出票状态
        $zjlx = $this->config->item("证件类型"); //证件类型
        $bxlx = $this->config->item("保险类型"); //保险类型
		$ddzt = $this->config->item("订单状态"); //订单状态
        $obj = new stdClass();
        //获取联系人
		$this->db->trans_begin();
        $yonghu_sql = 'select m.xingming as xingming,
m.shoujihaoma as shoujihaoma from yonghu as m where m.id = ?';
        $yonghu_res = $this->db->query($yonghu_sql, $UserId);
        $yonghu = $yonghu_res->result();
        if (!empty($yonghu)) {
            $obj->yonghu = $yonghu;
        }
        //获取订单表数据 [begin]
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
m.youjirendianhua as youjirendianhua from dingdan as m where m.yonghuid = ? order by m.id desc ';

    $orders_res = $this->db->query($orders_sql, array($UserId));

        $orders = $orders_res->result();
		$kegaiqianrenshu = 0;
        $ketuipiaorenshu = 0; 
        if (!empty($orders)) {
            $orders_ss = array();
            foreach ($orders as $od) {
                $myorder = new stdClass();
                //订单id
                $myorder->orderid = $od->id;
                //用户id
                $myorder->yonghuid = $od->yonghuid;
                //付款时间
                $myorder->fukuanshijian = $od->fukuanshijian;
				// 创建时间
				$myorder->chuangjianshijian = $od->chuangjianshijian;
                //付款时间戳
                $myorder->fukuanshijianchuo = strtotime($od->fukuanshijian);
				$myorder->chuangjianshijianchuo = strtotime($od->chuangjianshijian);
                //订单号
                $myorder->dingdanhao = $od->dingdanhao;
                //订单总额
                $myorder->dingdanzonge = $od->dingdanzonge;
                //订单状态
                $myorder->dingdanzhuangtai = $od->dingdanzhuangtai;
                //订单状态名
                $myorder->statusName = $ddzt[intval($od->dingdanzhuangtai)];
                //出票状态
                $myorder->chupiaozhuangtai = $od->chupiaozhuangtai;
				//出票状态名
				// $myorder->statusName = $cpzt[intval($od->chupiaozhuangtai)];
				//收件人
                $myorder->shoujianren = $od->shoujianren;
                //邮寄地址
                $myorder->youjidizhi = $od->youjidizhi;
                //邮寄人电话
                $myorder->youjirendianhua = $od->youjirendianhua;
				
				$myorder->lianxiren = $od->lianxiren;
				$myorder->lianxirendianhua = $od->lianxirendianhua;				
                //获取订单表数据 [end]

                if (!empty($od->id) && $od->id != '') {
                    //获取订单航程信息 [begin]
                    $hangchengs_sql = 'select m.id as id,
m.gendingdanid as gendingdanid,
m.dingdanid as dingdanid,
m.dabianma as dabianma,
m.PNRhao as PNRhao,
m.PNRxinxi as PNRxinxi,
m.shifouertong as shifouertong,
m.chengkerenshu as chengkerenshu,
m.wangfanhangcheng as wangfanhangcheng,
m.fanchengbiaozhi as fanchengbiaozhi,
m.hangchengxuhao as hangchengxuhao,
m.hangkonggongsi as hangkonggongsi,
m.hangbanhao as hangbanhao,
m.gongxianghangbanhao as gongxianghangbanhao,
m.jixing as jixing,
m.qifeijichang as qifeijichang,
m.daodajichang as daodajichang,
m.qifeihangzhanlou as qifeihangzhanlou,
m.daodahangzhanlou as daodahangzhanlou,
m.jingtinglianbiao as jingtinglianbiao,
m.qifeishijian as qifeishijian,
m.daodashijian as daodashijian,
m.cangwei as cangwei,
m.tuigaiqianguize as tuigaiqianguize,
m.piaoyuanshuliang as piaoyuanshuliang,
m.xiaoshouzongjia as xiaoshouzongjia,
m.piaomiandanjia as piaomiandanjia,
m.ranyoushui as ranyoushui,
m.jijianfei as jijianfei,
m.baoxian as baoxian,
m.qitafei as qitafei,
m.danzhangpiaomianjia as danzhangpiaomianjia,
m.guanliyuanid as guanliyuanid,
m.waicaipingtaiid as waicaipingtaiid,
m.neibudingdanhao as neibudingdanhao,
m.waibudingdanhao as waibudingdanhao,
m.ticketText as ticketText,
m.PNRResponse as PNRResponse,
m.waicaichupiaobianma as waicaichupiaobianma,
m.waicaidingdanzonge as waicaidingdanzonge,
m.pingtaizhuangtai as pingtaizhuangtai,
m.quxiaodingdanshijian as quxiaodingdanshijian,
m.pingtaiyuanyin as pingtaiyuanyin from hangcheng as m where m.dingdanid = ?';
                    $hangchengs_res = $this->db->query($hangchengs_sql, $myorder->orderid);
                    $hangchengs = $hangchengs_res->result();
                    if (!empty($hangchengs)) {
                        $hangchengs_obj = new stdClass();
                        foreach ($hangchengs as $hc) {
                            $myhangcheng = new stdClass();
                            //航程id
                            $myhangcheng->id = $hc->id;
                            if (!empty($myhangcheng->id) && $myhangcheng->id != '') {
                                //获取航程旅客信息 [begin]
                                $hangchenglvkes_sql = 'select m.id as id,
m.gendingdanid as gendingdanid,
m.dingdanid as dingdanid,
m.hangchengid as hangchengid,
m.lvkeid as lvkeid,
m.pingtaidingdanhao as pingtaidingdanhao,
m.piaohao as piaohao,
m.hangbanhao as hangbanhao,
m.shifoutuipiao as shifoutuipiao,
m.shifougaiqian as shifougaiqian,
m.shifouertong as shifouertong,
m.cangwei as cangwei,
m.chuangjianshijian as chuangjianshijian,
m.zhongwenming as zhongwenming,
m.yingwenming as yingwenming,
m.xingbie as xingbie,
m.chushengriqi as chushengriqi,
m.guoji as guoji,
m.zhengjianleixing as zhengjianleixing,
m.zhengjianhaoma as zhengjianhaoma,
m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
m.chushengdi as chushengdi,
m.lianxidianhua as lianxidianhua,
m.email as email,
m.zhuangtai as zhuangtai,
m.modifyStipulate as modifyStipulate,
m.beizhu as beizhu from hangchenglvke as m where m.hangchengid = ?';
                                $hangchenglvkes_res = $this->db->query($hangchenglvkes_sql, $myhangcheng->id);
                                $hangchenglvkes = $hangchenglvkes_res->result();
                                if (!empty($hangchenglvkes)) {
                                    $hangchenglvkes_ss = array();
                                    foreach ($hangchenglvkes as $hclk) {
                                        $myhangchenglvke = new stdClass();
										$zhuangtai = $hclk->zhuangtai; 						
									   if ($zhuangtai == '已出票') {
											$kegaiqianrenshu = $kegaiqianrenshu+1; // 可改签人数
										};
										if($zhuangtai == '已出票'){
											$ketuipiaorenshu = $ketuipiaorenshu+1; // 可退票人数
										}

                                        //航程旅客id
                                        $myhangchenglvke->id = $hclk->id;
                                        //订单id
                                        $myhangchenglvke->dingdanid = $hclk->dingdanid;
                                        //航程id
                                        $myhangchenglvke->hangchengid = $hclk->hangchengid;
                                        //旅客id
                                        $myhangchenglvke->lvkeid = $hclk->lvkeid;
										//是否儿童
										$myhangchenglvke->shifouertong = $hclk->shifouertong;
                                        //平台订单号
                                        $myhangchenglvke->pingtaidingdanhao = $hclk->pingtaidingdanhao;
                                        //票号
                                        $myhangchenglvke->piaohao = $hclk->piaohao;
                                        //航班号
                                        $myhangchenglvke->hangbanhao = $hclk->hangbanhao;
                                        //是否退票
                                        if ($hclk->shifoutuipiao == '是') {
                                            $myhangchenglvke->shifoutuipiao = true;
                                        } else {
                                            $myhangchenglvke->shifoutuipiao = false;
                                        }
                                        //是否改签
                                        if ($hclk->shifougaiqian == '是') {
                                            $myhangchenglvke->shifougaiqian = true;
                                        } else {
                                            $myhangchenglvke->shifougaiqian = false;
                                        }
                                        //舱位
                                        $myhangchenglvke->cangwei = $hclk->cangwei;
                                        //航程旅客名称
                                        if (!empty($hclk->zhongwenming) && $hclk->zhongwenming != '') {
                                            $myhangchenglvke->name = $hclk->zhongwenming;
                                        } else {
                                            $myhangchenglvke->name = $hclk->yingwenming;
                                        }
                                        //证件名
                                        $myhangchenglvke->zhengjianming = $zjlx[intval($hclk->zhengjianleixing)];
                                        //证件号码
                                        $myhangchenglvke->zhengjianhaoma = $hclk->zhengjianhaoma;
										// 航程旅客状态
										$myhangchenglvke->zhuangtai = $hclk->zhuangtai;
										// 是否可改签
                                        $myhangchenglvke->modifyStipulate = $hclk->modifyStipulate;  
                                        $hangchenglvkes_ss[] = $myhangchenglvke;
                                    }
                                    $myhangcheng->hangchenglvkes = $hangchenglvkes_ss;
                                }
                            }
                            //获取航程旅客信息 [end]
                            //订单id
                            $myhangcheng->dingdanid = $hc->dingdanid;
                            //是否儿童
                            $myhangcheng->shifouertong = $hc->shifouertong;
                            //往返航程
                            $myhangcheng->wangfanhangcheng = $hc->wangfanhangcheng;
                            //返程标志
                            $myhangcheng->fanchengbiaozhi = $hc->fanchengbiaozhi;
                            //航程序号
                            $myhangcheng->hangchengxuhao = $hc->hangchengxuhao;
                            //航空公司
                            $myhangcheng->hangkonggongsi = $hc->hangkonggongsi;
                            //航班号
                            $myhangcheng->hangbanhao = $hc->hangbanhao;
                            //共享航班号
                            $myhangcheng->gongxianghangbanhao = $hc->gongxianghangbanhao;
                            //机型
                            $myhangcheng->jixing = $hc->jixing;
                            //起飞机场
                            $myhangcheng->qifeijichang = $hc->qifeijichang;
                            //到达机场
                            $myhangcheng->daodajichang = $hc->daodajichang;
                            //起飞城市
                            //$jc[strval($xml->flightItems->orgCity)];
                            $myhangcheng->qifeichengshi = $jc[strval(array_search($myhangcheng->qifeijichang, $airport))];
                            //到达城市
                            $myhangcheng->daodachengshi = $jc[strval(array_search($myhangcheng->daodajichang, $airport))];

                            //起飞航站楼
                            $myhangcheng->qifeihangzhanlou = $hc->qifeihangzhanlou;
                            //到达航站楼
                            $myhangcheng->daodahangzhanlou = $hc->daodahangzhanlou;
                            //经停链表
                            $myhangcheng->jingtinglianbiao = $hc->jingtinglianbiao;
                            //起飞时间
                            $myhangcheng->qifeishijian = $hc->qifeishijian;
                            //起飞时间戳
                            $myhangcheng->qifeishijianchuo = strtotime($hc->qifeishijian);
                            //到达时间
                            $myhangcheng->daodashijian = $hc->daodashijian;
                            //到达时间戳
                            $myhangcheng->daodashijianchuo = strtotime($hc->daodashijian);
                            //舱位
                            $myhangcheng->cangwei = $hc->cangwei;
                            //销售总价
                            $myhangcheng->xiaoshouzongjia = $hc->xiaoshouzongjia;
                            //取消订单时间
                            $myhangcheng->quxiaodingdanshijian = $hc->quxiaodingdanshijian;
							
                            //往返程判断
                            if ($myhangcheng->wangfanhangcheng == '1') {
                                if ($myhangcheng->fanchengbiaozhi == '0') {
                                    //去程
                                    $hangchengs_obj->goto = $myhangcheng;
                                } else if ($myhangcheng->fanchengbiaozhi == '1') {
                                    //返程
                                    $hangchengs_obj->back = $myhangcheng;
                                }
                            } else {
                                //去程
                                $hangchengs_obj->goto = $myhangcheng;
                            }
                        }
                        //航程信息
                        $myorder->hangchengs = $hangchengs_obj;
                        //获取订单航程信息 [end]
                    }
					$myorder->kegaiqianrenshu = $kegaiqianrenshu;
                    $myorder->ketuipiaorenshu = $ketuipiaorenshu;

                    //获取保险订单信息 [begin]
                    $baoxiandingdans_sql = 'select m.id as id,
m.dingdanid as dingdanid,
m.baoxianchanpinid as baoxianchanpinid,
m.hangchenglvkeid as hangchenglvkeid,
m.dingdanzhuangtai as dingdanzhuangtai,
m.dingdanzongjia as dingdanzongjia,
m.baoxianleixing as baoxianleixing,
m.baoxiandingdanhao as baoxiandingdanhao,
m.waicaipingtai as waicaipingtai,
m.waicaidingdanbianhao as waicaidingdanbianhao,
m.waicaizongjia as waicaizongjia,
m.waicaibeizhu as waicaibeizhu,
m.baodanhao as baodanhao,
m.baodanzhuangtai as baodanzhuangtai,
m.chuangjianshijian as chuangjianshijian,
m.shengxiaoriqi as shengxiaoriqi,
m.chulishijian as chulishijian,
m.wanchengshijian as wanchengshijian,
m.caozuoyuanid as caozuoyuanid,
m.beizhu as beizhu from baoxiandingdan as m where m.dingdanid = ?';
                    $baoxiandingdans_res = $this->db->query($baoxiandingdans_sql, $myorder->orderid);
                    $baoxiandingdans = $baoxiandingdans_res->result();
                    if (!empty($baoxiandingdans)) {
                        $baoxiandingdans_ss = array();
                        foreach ($baoxiandingdans as $bxdd) {
                            $mybaoxiandingdans = new stdClass();
                            //保险类型
                            $mybaoxiandingdans->baoxianleixing = $bxlx[intval($bxdd->baoxianleixing)];
                            //保单号
                            $mybaoxiandingdans->baodanhao = $bxdd->baodanhao;
                            //订单总价
                            $mybaoxiandingdans->dingdanzongjia = $bxdd->dingdanzongjia;
                            $baoxiandingdans_ss[] = $mybaoxiandingdans;
                        }
                        $myorder->baoxiandingdans = $baoxiandingdans_ss;
                        //获取保险订单信息 [end]
                    }
                }
                $orders_ss[] = $myorder;
            }
            $orderlist = array();

            foreach ($orders_ss as $v) {

                if ($status == '1') {
                    if ($v->dingdanzhuangtai == '0') {
                        $orderlist[] = $v;
                    } 
                } elseif ($status == '2' ) {
                    $time =$v->hangchengs->goto->qifeishijian;
                    $weiqifei = strtotime($time) > strtotime(date("y-m-d h:i:s"));
                    if ($weiqifei && $v->dingdanzhuangtai == '3') {
                        $orderlist[] = $v;

                    }
                } else {
                    $orderlist[] = $v;
                }
            }

            $obj->orders = $orderlist;
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				echo 'fasle';
			}
			else
			{
				$this->db->trans_commit();
				echo json_encode($obj);
			}
			
        }
        
    }

   // 提交改签数据
	public function alterRequest() {
		$callback = $this->input->get('callback');
		date_default_timezone_set("Asia/Shanghai");
		$this->db->trans_begin();
		$gaiqianxinxi = json_decode($this->input->get('submitInfo'));
		$dingdanid = '';
		$shengqinghao = 'GQ'.date('YmdHis');  //申请号
		//去程
		if ($gaiqianxinxi->goto->chk == true) {
            $gaiqianshijian = $gaiqianxinxi->goto->changeDate;
            $shifoushengcang = $gaiqianxinxi->goto->upgrade;
            $adultlist = $gaiqianxinxi->goto->adultlist;
            if (!empty($adultlist) || $adultlist != '') {
                foreach ($adultlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid;
                    $data->dingdanid = $v->dingdanid;  // 订单ID
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id; // 航程旅客Id
                    $data->gaiqianshijian = $gaiqianshijian;  // 改签时间
                    $data->shifoushengcang = $shifoushengcang;  // 是否升舱
                    $data->gaiqianrenshu = 1;  // 改签人数
                    $data->shenqingzhuangtai = 0;  // 申请状态
					$data->chulizhuangtai = 0;  // 处理状态
                    $data->gaiqianshuoming = $gaiqianxinxi->Remark;  // 改签说明
                    $data->shenqingriqi = date("Y-m-d H:i:s", time()); // 申请时间
                    $this->db->insert('gaiqian', $data);
					$id = $this->db->insert_id();
                    $this->db->update('gaiqian', array('shenqinghao' => $shengqinghao), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "改签中"), array('id' => $v->id));
                }
            }
            $childlist = $gaiqianxinxi->goto->childlist;
            if (!empty($childlist) || $childlist != '') {
                foreach ($childlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid;
                    $data->dingdanid = $v->dingdanid;  // 订单ID
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id; // 航程旅客Id
                    $data->gaiqianshijian = $gaiqianshijian;  // 改签时间
                    $data->shifoushengcang = $shifoushengcang;  // 是否升舱
                    $data->gaiqianrenshu = 1;  // 改签人数
                    $data->shenqingzhuangtai = 0;  // 申请状态
					$data->chulizhuangtai = 0;  // 处理状态
                    $data->gaiqianshuoming = $gaiqianxinxi->Remark;  // 改签说明
                    $data->shenqingriqi = date("Y-m-d H:i:s", time()); // 申请时间
                    $this->db->insert('gaiqian', $data);
					$id = $this->db->insert_id();
                    $this->db->update('gaiqian', array('shenqinghao' => $shengqinghao), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "改签中"), array('id' => $v->id));
                }
            }
        }
        //返程
        if ($gaiqianxinxi->back->chk == true) {
            $gaiqianshijian = $gaiqianxinxi->back->changeDate;
            $shifoushengcang = $gaiqianxinxi->back->upgrade;
            $adultlist = $gaiqianxinxi->back->adultlist;
            if (!empty($adultlist) || $adultlist != '') {
                foreach ($adultlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid;
                    $data->dingdanid = $v->dingdanid;  // 订单ID
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id; // 航程旅客Id
                    $data->gaiqianshijian = $gaiqianshijian;  // 改签时间
                    $data->shifoushengcang = $shifoushengcang;  // 是否升舱
                    $data->gaiqianrenshu = 1;  // 改签人数
                    $data->shenqingzhuangtai = 0;  // 申请状态
					$data->chulizhuangtai = 0;  // 处理状态
                    $data->gaiqianshuoming = $gaiqianxinxi->Remark;  // 改签说明
                    $data->shenqingriqi = date("Y-m-d H:i:s", time()); // 申请时间
                    $this->db->insert('gaiqian', $data);
					$id = $this->db->insert_id();
                    $this->db->update('gaiqian', array('shenqinghao' => $shengqinghao), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "改签中"), array('id' => $v->id));
                }
            }
            $childlist = $gaiqianxinxi->back->childlist;
            if (!empty($childlist) || $childlist != '') {
                foreach ($childlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid;
                    $data->dingdanid = $v->dingdanid;  // 订单ID
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id; // 航程旅客Id
                    $data->gaiqianshijian = $gaiqianshijian;  // 改签时间
                    $data->shifoushengcang = $shifoushengcang;  // 是否升舱
                    $data->gaiqianrenshu = 1;  // 改签人数
                    $data->shenqingzhuangtai = 0;  // 申请状态
					$data->chulizhuangtai = 0;  // 处理状态
                    $data->gaiqianshuoming = $gaiqianxinxi->Remark;  // 改签说明
                    $data->shenqingriqi = date("Y-m-d H:i:s", time()); // 申请时间
                    $this->db->insert('gaiqian', $data);
					$id = $this->db->insert_id();
                    $this->db->update('gaiqian', array('shenqinghao' => $shengqinghao), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "改签中"), array('id' => $v->id));
                }
            }

        }

		

        $this->db->insert('gaiqiandingdan', array('dingdanid'=>$dingdanid,'chulizhuangtai'=>0, 'shenqingzhuangtai'=>0, 'shenqinghao' => $shengqinghao,'shenqingriqi' =>date("Y-m-d H:i:s")));
      
			
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'false';
		} else {
			$this->db->trans_commit();
			echo 'true';
		}
	}

	// 提交退票数据
	public function refundRequest() {
		$callback = $this->input->get('callback');
		date_default_timezone_set("Asia/Shanghai");
		$this->db->trans_begin();
		$tuipiaoxinxi = json_decode($this->input->get('refundInfo'));
		$dingdanid = '';
        $tuipiaoleixing = $tuipiaoxinxi->RawReason->type;  // 退票类型
        $tuipiaoyuanyin = $tuipiaoxinxi->RawReason->Name; //退票原因
        $beizhu = $tuipiaoxinxi->RawNote; // 备注
		$isall = $tuipiaoxinxi->isall; // 是否全部
		// 去程
        if ($tuipiaoxinxi->goto->chk == true) {
            $adultlist = $tuipiaoxinxi->goto->adultlist;
            if (!empty($adultlist) || $adultlist != '') {
                foreach ($adultlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid; // 订单Id
                    $data->dingdanid = $v->dingdanid;  // 订单Id
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id;  // 航程旅客ID
                    $data->chulizhuangtai = 0;  // 处理状态
                    $data->shenqingriqi = date("Y-m-d H:i:s", time());  // 申请时间
                    $data->tuipiaoleixing = $tuipiaoleixing;  // 退票类型
                    $data->tuipiaoyuanyin = $tuipiaoyuanyin;  // 退票原因
                    $data->beizhu = $beizhu;  //  备注
                    $this->db->insert('tuipiao', $data);
					$id = $this->db->insert_id();
                    $this->db->update('tuipiao', array('shenqinghao' => 'TP'.date('YmdHis').$id), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "退票中"), array('id' => $v->id));
                }
            }

            $childlist = $tuipiaoxinxi->goto->childlist;
            if (!empty($childlist) || $childlist != '') {
                foreach ($childlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid; // 订单Id
                    $data->dingdanid = $v->dingdanid;  // 订单Id
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id;  // 航程旅客ID
                    $data->chulizhuangtai = 0;  // 处理状态
                    $data->shenqingriqi = date("Y-m-d H:i:s", time());  // 申请时间
                    $data->tuipiaoleixing = $tuipiaoleixing;  // 退票类型
                    $data->tuipiaoyuanyin = $tuipiaoyuanyin;  // 退票原因
                    $data->beizhu = $beizhu;  //  备注
                    $this->db->insert('tuipiao', $data);
					$id = $this->db->insert_id();
                    $this->db->update('tuipiao', array('shenqinghao' => 'TP'.date('YmdHis').$id), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "退票中"), array('id' => $v->id));
                }
            }
			$sql = 'select m.id from tuipiaodingdan as m where m.dingdanid = ? and m.chulizhuangtai = 0 and tuipiaoleixing = ?';

            $query = $this->db->query($sql, array($dingdanid,$tuipiaoleixing));
            $res = $query->row();
            if (empty($res)) {
                $this->db->insert('tuipiaodingdan', array('dingdanid'=>$dingdanid, 'tuipiaoleixing'=>$tuipiaoleixing, 'chulizhuangtai'=>0));
            }

        }
		// 返程
        if ($tuipiaoxinxi->back->chk == true) {
            $adultlist = $tuipiaoxinxi->back->adultlist;
            if (!empty($adultlist) || $adultlist != '') {
                foreach ($adultlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid; // 订单Id
                    $data->dingdanid = $v->dingdanid;  // 订单Id
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id;  // 航程旅客ID
                    $data->chulizhuangtai = 0;  // 处理状态
                    $data->shenqingriqi = date("Y-m-d H:i:s", time());  // 申请时间
                    $data->tuipiaoleixing = $tuipiaoleixing;  // 退票类型
                    $data->tuipiaoyuanyin = $tuipiaoyuanyin;  // 退票原因
                    $data->beizhu = $beizhu;  //  备注
                    $this->db->insert('tuipiao', $data);
					$id = $this->db->insert_id();
                    $this->db->update('tuipiao', array('shenqinghao' => 'TP'.date('YmdHis').$id), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "退票中"), array('id' => $v->id));
                }
            }

            $childlist = $tuipiaoxinxi->back->childlist;
            if (!empty($childlist) || $childlist != '') {
                foreach ($childlist as $k => $v) {
                    $data = new stdClass();
                    $dingdanid = $v->dingdanid; // 订单Id
                    $data->dingdanid = $v->dingdanid;  // 订单Id
                    $data->hangchengid = $v->hangchengid;  // 航程ID
                    $data->hangchenglvkeid = $v->id;  // 航程旅客ID
                    $data->chulizhuangtai = 0;  // 处理状态
                    $data->shenqingriqi = date("Y-m-d H:i:s", time());  // 申请时间
                    $data->tuipiaoleixing = $tuipiaoleixing;  // 退票类型
                    $data->tuipiaoyuanyin = $tuipiaoyuanyin;  // 退票原因
                    $data->beizhu = $beizhu;  //  备注
                    $this->db->insert('tuipiao', $data);
					$id = $this->db->insert_id();
                    $this->db->update('tuipiao', array('shenqinghao' => 'TP'.date('YmdHis').$id), array('id' => $id));
					$this->db->update('hangchenglvke', array('zhuangtai' => "退票中"), array('id' => $v->id));
                }
            }
			$sql = 'select m.id from tuipiaodingdan as m where m.dingdanid = ? and m.chulizhuangtai = 0 and tuipiaoleixing = ?';

            $query = $this->db->query($sql, array($dingdanid,$tuipiaoleixing));
            $res = $query->row();
            if (empty($res)) {
                $this->db->insert('tuipiaodingdan', array('dingdanid'=>$dingdanid, 'tuipiaoleixing'=>$tuipiaoleixing, 'chulizhuangtai'=>0));
            }

        }
		//if ($isall) {
		//	$this->db->update('dingdan', array('chupiaozhuangtai' => 2), array('id' => $dingdanid));
		//}
        

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'false';
		} else {
			$this->db->trans_commit();
			echo 'true';
		}
	}
	
    //常用信息 - 获取乘客列表
    public function LvKeList() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $zhengjianleixing = $this->config->item('证件类型');
        $UserId = $this->input->get('UserId');
        $sql = 'select m.id as id,
m.yonghuid as yonghuid,
m.zhongwenming as zhongwenming,
m.yingwenming as yingwenming,
m.xingbie as xingbie,
m.chushengriqi as chushengriqi,
m.shifouertong as shifouertong,
m.guoji as guoji,
m.zhengjianleixing as zhengjianleixing,
m.zhengjianhaoma as zhengjianhaoma,
m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
m.chushengdi as chushengdi,
m.shoujihao as shoujihao,
m.lianxidianhua as lianxidianhua,
m.email as email,
m.beizhu as beizhu from lvke as m where m.yonghuid = ?';
        $res = $this->db->query($sql, $UserId);
        $rows = $res->result();
        //echo json_encode($rows);
        if (!empty($rows)) {
            foreach ($rows as $k => $v) {
                foreach ($zhengjianleixing as $k1 => $v1) {
                    if ($v->zhengjianleixing == $k1) {
                        $rows[$k]->zhengjianleixing = $zhengjianleixing[$k1];
                    }
                }
				$v->chushengriqi = date("Y-m-d",strtotime( $v->chushengriqi));
            }
            echo json_encode($rows);
        } else {
            echo false;
        }
    }

    //常用信息 - 新增乘客
    public function addLvKe() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $zjlx = $this->config->item('证件类型');
        $zhengjianleixing = '';
        //转换为证件类型的数字表示
        foreach ($zjlx as $k => $v) {
            if ($this->input->get('zhengjianleixing') == $v) {
                $zhengjianleixing = $k;
            }
        }
        $yonghuid = intval($this->input->get('UserId'));
        $zhongwenming = $this->input->get('zhongwenming');
        $xingbie = $this->input->get('xingbie');
        if ($xingbie == '男') {
            $xingbie = 1;
        } else {
            $xingbie = 0;
        }
        $chushengriqi = $this->input->get('chushengriqi');
		$shifouertong = $this->input->get('shifouertong');
        $zhengjianhaoma = $this->input->get('zhengjianhaoma');
        $shoujihao = $this->input->get('shoujihao');
        $obj = array(
            'yonghuid' => $yonghuid,
            'zhongwenming' => $zhongwenming,
            'xingbie' => $xingbie,
            'chushengriqi' => $chushengriqi,
			'shifouertong' => $shifouertong,
            'zhengjianleixing' => intval($zhengjianleixing),
            'zhengjianhaoma' => $zhengjianhaoma,
            'shoujihao' => $shoujihao
        );
        $this->db->insert('lvke', $obj);
        $id = $this->db->insert_id();
        echo $id;
    }

    // 更新乘客信息
    public function updateLvKeData() {
		$callback = $this->input->get('callback');
        $id = $this->input->get('id');
        $zhongwenming = $this->input->get('zhongwenming');
        $zhengjianhaoma = $this->input->get('zhengjianhaoma');
		$shifouertong = $this->input->get('shifouertong');
        $shoujihao = $this->input->get('shoujihao');
        $xingbie = $this->input->get('xingbie');
        // 判断信息是否改变
        $obj = array();
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $obj['zhongwenming'] = $zhongwenming;
        }

		if ($shifouertong != '') {
            $obj['shifouertong'] = $shifouertong;
        }
        if (!empty($zhengjianhaoma) && $zhengjianhaoma != '') {
            $obj['zhengjianhaoma'] = $zhengjianhaoma;
        }

        if (!empty($shoujihao) && $shoujihao != '') {
            $obj['shoujihao'] = $shoujihao;
        }
        if ($xingbie != '') {
            $obj['xingbie'] = $xingbie;
        }
        $row = $this->db->update('lvke', $obj, array('id' => $id));
        echo $row;
    }

    // 删除乘客
    public function delLvKe() {
		$callback = $this->input->get('callback');
        $id = $this->input->get('id');
        $row = $this->db->delete('lvke', array('id' => $id));
        echo $row;
    }

    //常用信息 - 获取收件地址信息
    public function YongHuDiZhi() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $zhengjianleixing = $this->config->item('证件类型');
        $UserId = $this->input->get('UserId');
        $sql = 'select m.id as id,
m.yonghuid as yonghuid,
m.shoujianrenmingzi as shoujianrenmingzi,
m.dizhi as dizhi,
m.youbian as youbian,
m.shoujihao as shoujihao,
m.lianxidianhua as lianxidianhua,
m.beizhu as beizhu from yonghudizhi as m where m.yonghuid = ?';
        $res = $this->db->query($sql, $UserId);
        $rows = $res->result();
        echo json_encode($rows);
    }

    //常用信息 - 新增用户地址
    public function addYongHuDiZhi() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $yonghuid = intval($this->input->get('UserId'));
        $shoujianrenmingzi = $this->input->get('shoujianrenmingzi');
        $shoujihao = $this->input->get('shoujihao');
        $dizhi = $this->input->get('dizhi');
        $youbian = $this->input->get('youbian');
        $obj = array(
            'yonghuid' => $yonghuid,
            'shoujianrenmingzi' => $shoujianrenmingzi,
            'shoujihao' => $shoujihao,
            'dizhi' => $dizhi,
            'youbian' => $youbian
        );
        $this->db->insert('yonghudizhi', $obj);
        $id = $this->db->insert_id();
        echo $id;
    }

    // 常用信息 - 更新用户地址
    public function updateYongHuDiZhi() {
		$callback = $this->input->get('callback');
        $id = $this->input->get('id');
        $shoujianrenmingzi = $this->input->get('shoujianrenmingzi');
        $shoujihao = $this->input->get('shoujihao');
        $dizhi = $this->input->get('dizhi');
        $youbian = $this->input->get('youbian');
        // 判断信息是否改变
        $obj = array();
        if (!empty($shoujianrenmingzi) && $shoujianrenmingzi != '') {
            $obj['shoujianrenmingzi'] = $shoujianrenmingzi;
        }

        if (!empty($shoujihao) && $shoujihao != '') {
            $obj['shoujihao'] = $shoujihao;
        }

        if (!empty($dizhi) && $dizhi != '') {
            $obj['dizhi'] = $dizhi;
        }
        if (!empty($youbian) && $youbian != '') {
            $obj['youbian'] = $youbian;
        }
        $row = $this->db->update('yonghudizhi', $obj, array('id' => $id));
        echo $row;
    }

    // 常用信息 - 删除用户地址
    public function delYongHuDiZhi() {
		$callback = $this->input->get('callback');
        $id = $this->input->get('id');
        $row = $this->db->delete('yonghudizhi', array('id' => $id));
        echo $row;
    }

    //常用信息 - 获取证件类型列表
    public function ZhengJianLeiXing() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $zhengjianleixing = $this->config->item('证件类型');
        echo json_encode($zhengjianleixing);
    }

}

