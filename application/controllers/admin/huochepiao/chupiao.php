<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  --  出票管理
 */
class chupiao extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

// 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '订单号';
        $std1->name = 'orderid';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '异地订单号';
        $std2->name = 'order_id';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '车次';
        $std3->name = 'train_code';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '出发站';
        $std4->name = 'from_station';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '到达站';
        $std5->name = 'arrive_station';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '乘车日期';
        $std6->name = 'chengcheqiri';
        $std6->show = true;
        $li[5] = $std6;

        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '出发/到达';
        $std7->name = 'chufa_daoda';
        $std7->show = true;
        $li[6] = $std7;

        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '乘客数量';
        $std8->name = 'lvkenum';
        $std8->show = true;
        $li[7] = $std8;

        $std9 = new stdClass();
        $std9->index = 8;
        $std9->display_name = '订单类型';
        $std9->name = 'dingdanleixing';
        $std9->show = true;
        $li[8] = $std9;

        $std10 = new stdClass();
        $std10->index = 9;
        $std10->display_name = '订单状态';
        $std10->name = 'statusname';
        $std10->show = true;
        $li[9] = $std10;
/*
        $std11 = new stdClass();
        $std11->index = 10;
        $std11->display_name = '锁单人/更新时间';
        $std11->name = 'suodan';
        $std11->show = false;
        $li[10] = $std11;
*/
        $this->li = $li;
    }

    public function index($dingdanid = '') {
        $data['li'] = $this->li;

// if ($dingdanid != '') {
//     $this->load->library('mysimpleencrypt');
//     $dingdanid = $this->mysimpleencrypt->de($dingdanid);
//     $admin_session = $this->session->userdata('admin');
//     $obj = array('suodan' => true, 'suodanid' => $admin_session ['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
//     $this->db->update('train_order', $obj, array('id' => $dingdanid));
// }
        $this->load->view('admin/huochepiao/chupiao/index', $data);
    }

    /**
     * 通过 乘客姓名
     * 查询返回 订单ID
     */
    public function getDingDanIdByName($username) {
        $result = '';
        $ps = array();
        $sql = 'select distinct m.orderid as orderid from train_order_lvke as m where ';
        if (!empty($username) && $username != '') {
            $sql = $sql . ' m.user_name = ? ';
            $ps[] = $username;
        }

        $res = $this->db->query($sql, $ps);
        if ($res->num_rows() > 0) {
            $result = '(';
            $db_reslt = $res->result();
            $index = 0;
            foreach ($db_reslt as $r) {
                if ($index == count($db_reslt) - 1) {
                    $result = $result . $r->orderid;
                } else {
                    $result = $result . $r->orderid . ',';
                }
                $index++;
            }
            $result = $result . ')';
        }
        return $result;
    }

    /**
     * 显示全部订单
     */
    public function all() {

        $admin_session = $this->session->userdata('admin');
        $this->load->library('mysimpleencrypt');
// 加载管理员
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
// 加载锁单
        $this->load->model("dingdan/msoudan", "msoudan");
        $orderstatus = $this->config->item("火车订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];


// 订单ID
        $order_id = $this->input->post('order_id');
//  异地订单号
        $merchant_order_id = $this->input->post('merchant_order_id');
// 乘客姓名
        $user_name = $this->input->post('user_name');
// 支付方式
        $zhifufangshi = $this->input->post('zhifufangshi');
// 订单状态
        $status = $this->input->post('status');
// 日期类型
        $riqi = $this->input->post('riqi');
// 来源
        $laiyuan = $this->input->post('laiyuan');
// 付款时间 开始
        $shijian_begin = $this->input->post('shijian_begin');
// 付款时间 结束
        $shijian_end = $this->input->post('shijian_end');
		$shanghuhao = $this->input->post('shanghuhao');

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'orderid' == $this->li[$sortid]->name) {
            $mysort = 'chuangjianshijian';
            $mydir = $dir;
        }

        $sql = 'select m.id as id,m.merchant_order_id as merchant_order_id,
        m.train_code as train_code,
        m.arrive_station as arrive_station,
        m.from_station as from_station,
        m.status as status,
        m.travel_time as travel_time,
        m.order_id as order_id,
        m.from_time as from_time,
        m.arrive_time as arrive_time,
        m.isshifazhan as isshifazhan,
        m.iszhongdianzhan as iszhongdianzhan,

        m.chuangjianshijian as chuangjianshijian,
        m.suodan as suodan,
        m.suodanid as suodanid,
        m.suodanshijian as suodanshijian
        from train_order as m ';

        $sqlcount = 'select count(m.id) as id from train_order as m ';

        $ps = array();
// 乘客姓名
        if (!empty($user_name) && $user_name != '') {
            $ps_sub = $this->getDingDanIdByName($user_name);
            $sql = $sql . 'where m.id in ' . $ps_sub . ' ';
            $sqlcount = $sqlcount . 'where m.id in ' . $ps_sub . ' ';
        } else {
            $sql = $sql . 'where ';
            $sqlcount = $sqlcount . 'where ';
        }

// 异地出票编码
        if (!empty($merchant_order_id) && $merchant_order_id != '') {
            $sql = $sql . 'and m.merchant_order_id = ? ';
            $sqlcount = $sqlcount . 'and m.merchant_order_id = ? ';
            $ps[] = merchant_order_id;
        }
        if (!empty($shanghuhao) && $shanghuhao != '' && $shanghuhao != '全部') {
            $sql = $sql . 'and m.shanghuhao = ? ';
            $sqlcount = $sqlcount . 'and m.shanghuhao = ? ';
            $ps[] = $shanghuhao;
        } 
		

// 支付方式
        if (!empty($zhifufangshi) && $zhifufangshi != '' && $zhifufangshi != '全部') {
            $sql = $sql . 'and m.zhifufangshi = ? ';
            $sqlcount = $sqlcount . 'and m.zhifufangshi = ? ';
            $ps[] = $zhifufangshi;
        }

// 订单状态
        if (!empty($status) && $status != '' && $status != '全部') {
            $sql = $sql . 'and m.status = ? ';
            $sqlcount = $sqlcount . 'and m.status = ? ';
            $ps[] = $status;
        }
// 日期类型

        if (!empty($riqi) && $riqi != '') {
            if ($riqi == '1') {  // 支付日期
                if (!empty($shijian_begin) && $shijian_begin != '' && !empty($shijian_end) && $shijian_end != '') {
                    $sql = $sql . 'and m.chuangjianshijian between ? and ? ';
                    $sqlcount = $sqlcount . 'and m.chuangjianshijian between ? and ? ';
                    $ps[] = $shijian_begin;
                    $ps[] = $shijian_end;
                }
            } else if ($riqi == '2') { // 出票时间
                if (!empty($shijian_begin) && $shijian_begin != '' && !empty($shijian_end) && $shijian_end != '') {
                    $sql = $sql . 'and m.out_ticket_time between ? and ? ';
                    $sqlcount = $sqlcount . 'and m.out_ticket_time between ? and ? ';
                    $ps[] = $shijian_begin;
                    $ps[] = $shijian_end;
                }
            } else {

            }
        } else { // 创建时间
            if (!empty($shijian_begin) && $shijian_begin != '' && !empty($shijian_end) && $shijian_end != '') {
                $sql = $sql . 'and m.chuangjianshijian between ? and ? ';
                $sqlcount = $sqlcount . 'and m.chuangjianshijian between ? and ? ';
                $ps[] = $shijian_begin;
                $ps[] = $shijian_end;
            }
        }
		


// 不变的
        $sql = $sql . 'order by m.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;

        $sql = str_replace("where order", "order", $sql);
        $sql = str_replace("where and", "where", $sql);

        $sqlcount = str_replace("where order", "order", $sqlcount);
        $sqlcount = str_replace("where and", "where", $sqlcount);
        $newstr = substr(trim($sqlcount), 0, strlen(trim($sqlcount)) - 5);
        if (substr(trim($sqlcount), -5) == 'where') {
            $sqlcount = $newstr;
        }

        $res = $this->db->query($sql, $ps);



        $res_count = $this->db->query($sqlcount, $ps);


        $mycount = 0;
        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }

        $mydata = $res->result();
        if (!empty($mydata)) {
            foreach ($mydata as $v) {
                $v->statusname = $orderstatus[$v->status];
                $chuangjianshijian = $v->chuangjianshijian;
                $order_id = $v->order_id;
                $v->orderid = $v->merchant_order_id . '<br/>' . $chuangjianshijian;

                $v->chengcheqiri = date('Y-m-d', strtotime($v->travel_time));


                $from_time = date('H:i', strtotime($v->from_time));
                $arrive_time = date('H:i', strtotime($v->arrive_time));

                $date=floor((strtotime($v->arrive_time)-strtotime($v->from_time))/86400);


                if($date>0){
                    $v->chufa_daoda = $from_time.' - '.$arrive_time.' +'.$date.'天';
                } else{
                    $v->chufa_daoda = $from_time.' - '.$arrive_time;
                }

                if ($v->isshifazhan == '0') {
                    $v->from_station = '始 - '.$v->from_station;
                } else {

                }
                if ($v->iszhongdianzhan == '0') {
                    $v->arrive_station = '终 - '.$v->arrive_station;
                } else {
                    $v->arrive_station = '过 - '.$v->arrive_station;
                }
				$xinxi = $this->getPersonNum($v->id);
                $v->lvkenum = $xinxi->num.'人';
                $v->dingdanleixing = 1;
				$v->id=$this->mysimpleencrypt->en($v->id);
            }
        }




        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    /**
     * 获取订单的旅客人数
     * $id 为订单 id
     */
    public function getPersonNum($id) {

        $sql = 'select count(m.id) as num ,m.bx_channel as bx_channel from train_order_lvke as m where m.orderid = ?';
        $res = $this->db->query($sql, array($id));
        $mycount = 0;
        $row = $res->first_row(); 
        return $row;
    }

    /**
     * 详情
     * $en_id 航程 id
     */
    public function xiangqing($en_id = '') {

        $this->load->library('mysimpleencrypt');
        $data['li'] = $this->li;

        $id = $this->mysimpleencrypt->de($en_id);

        $data['obj'] = $this->getorder($id);
		$data['passenslist'] = $this->getpasenger($id);
        $this->load->view('admin/huochepiao/chupiao/xiangqing', $data);
    }

    public function getorder($id = ''){
        $orderstatus = $this->config->item("火车订单状态");
        $zhifufangshi = $this->config->item("支付方式");
        $seattype = $this->config->item("火车席位类型");
        $sql = 'select m.id as id,m.merchant_order_id as merchant_order_id,
        m.train_code as train_code,
        m.arrive_station as arrive_station,
        m.from_station as from_station,
        m.status as status,
        m.travel_time as travel_time,
        m.order_id as order_id,
        m.from_time as from_time,
        m.arrive_time as arrive_time,

        m.seat_type as seat_type,
        m.train_code as train_code,
        m.bx_invoice as bx_invoice,
        m.bx_invoice_address as bx_invoice_address,
        m.bx_invoice_phone as bx_invoice_phone,
        m.bx_invoice_receiver as bx_invoice_receiver,
        m.bx_invoice_zipcode as bx_invoice_zipcode,
        m.link_address as link_address,
        m.link_mail as link_mail,
        m.link_name as link_name,
        m.link_phone as link_phone,
        m.insurance as insurance,
        m.insurerName as insurerName,
        m.pay_money as pay_money,
		m.fail_reason as fail_reason,
        m.isshifazhan as isshifazhan,
        m.iszhongdianzhan as iszhongdianzhan,
        m.out_ticket_time as out_ticket_time,
        m.ticket_pay_money as ticket_pay_money,
        m.chuangjianshijian as chuangjianshijian,
        m.suodan as suodan,
        m.suodanid as suodanid,
        m.zhifufangshi as zhifufangshi,
        m.suodanshijian as suodanshijian
        from train_order as m where id = ?';

        $query = $this->db->query($sql, array($id));
        $data = new stdClass();
        $a = $query->result();
        if (!empty($a)) {
            $data = $query->first_row();
            $data->statusname = $orderstatus[$data->status];
            $data->dingdanlaiyuan = 'App'; // 待定
            $data->zhifufangshi = $zhifufangshi[$data->zhifufangshi];
            $data->chengcheqiri = date('Y-m-d', strtotime($data->travel_time));


            $from_time = date('H:i', strtotime($data->from_time));
            $arrive_time = date('H:i', strtotime($data->arrive_time));

            $date=floor((strtotime($data->arrive_time)-strtotime($data->from_time))/86400);
			$data->costtime = $this->timecha($data->from_time, $data->arrive_time);

            if($date>0){
                $data->chufa_daoda = $from_time.' - '.$arrive_time.' +'.$date.'天';
            } else{
                $data->chufa_daoda = $from_time.' - '.$arrive_time;
            }

            if ($data->isshifazhan == '0') {
                $data->from_station = '始 - '.$data->from_station;
            } else {

            }
            if ($data->iszhongdianzhan == '0') {
                $data->arrive_station = '终 - '.$data->arrive_station;
            } else {
                $data->arrive_station = '过 - '.$data->arrive_station;
            }
            $data->seat_type = $seattype[$data->seat_type];
			$xinxi = $this->getPersonNum($data->id);
            $data->lvkenum = $xinxi->num.'人';
			$data->bx_channel = $xinxi->bx_channel;

            if ($data->bx_invoice == '0') {
                $data->bx_invoice = '否';
            } else {
                $data->bx_invoice = '是';
            }

            $data->isbuyinsurance = '是'; //是否买保险
        }

        return $data;

    }

   	public function getpasenger($id){
		$dingdanzhuangtai = $this->config->item('火车订单状态');
		$zuoweileixing = $this->config->item('火车席位类型');
		$type = $this->config->item('火车证件类型');
		$chupiaostatus = $this->config->item('火车出票状态');
		$sql = 'select m.bx_channel as bx_channel,
					m.bx_code as bx_code,
					m.id as id,
					m.shijijiage as shijijiage,
					m.bx_price as bx_price,
					m.ids_type as ids_type,
					m.ticket_type as ticket_type,
					m.user_ids as user_ids,
					m.user_name as user_name,
					m.train_box as train_box,
					m.seat_no as seat_no,
					m.seat_type as seat_type,
					m.ticketStatusName as ticketStatusName,
					m.bx_channel as bx_channel 
					from train_order_lvke as m where orderid = ?';
			$query = $this->db->query($sql, array($id));
			$passenslist = $query->result();
			foreach ($passenslist as $key => $v) {
				$v->identityName = $type[$v->ids_type];		
			}
			return $passenslist;
	}
	/**
	 * 计算时间差
	 */
	public function timecha($date1, $date2){

		$cle = strtotime($date2)-strtotime($date1);
		$d = floor($cle/3600/24);
		$cle  -= $d * 60 * 60 * 24;
		$h = floor(($cle%(3600*24))/3600);
		$cle  -= $h * 60 * 60;
		$m = floor(($cle%(3600*24))/60);
		$d=intval($d);
		$h=intval($h);

		if ($d <= 0) {
			if ($h <= 0) {
				return  $m.'分';
			} else {
			   return  $h.'小时'.$m.'分';
			}
			
		} else {
			return $d.'天'.$h.'小时'.$m.'分';
		}
	}
   


}

