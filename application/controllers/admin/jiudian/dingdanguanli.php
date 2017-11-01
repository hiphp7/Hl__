<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 订单
 */
class dingdanguanli extends CI_Controller {
    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '订单编号/创建日期';
        $std1->name = 'dingdan_shijian';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '产品类型';
        $std2->name = 'chanpinleixing';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '采购渠道';
        $std3->name = 'caigouqudao';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '酒店名称';
        $std4->name = 'hotelname';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '入住/离店日期';
        $std5->name = 'ruzhu_lidian';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '支付方式';
        $std6->name = 'zhifufangshi';
        $std6->show = true;
        $li[5] = $std6;

        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '订单总价';
        $std7->name = 'totalCost';
        $std7->show = true;
        $li[6] = $std7;

        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '实际支付总额';
        $std8->name = 'shijizhifuzonge';
        $std8->show = true;
        $li[7] = $std8;
        
        $std9 = new stdClass();
        $std9->index = 8;
        $std9->display_name = '订单状态';
        $std9->name = 'dingdanzhuangtai';
        $std9->show = true;
        $li[8] = $std9;
        
        $std10 = new stdClass();
        $std10->index = 9;
        $std10->display_name = '是否报销';
        $std10->name = 'ismail';
        $std10->show = true;
        $li[9] = $std10;
        
        $std11 = new stdClass();
        $std11->index = 10;
        $std11->display_name = '订单联系电话';
        $std11->name = 'Mobile';
        $std11->show = true;
        $li[10] = $std11;
        
        $std12 = new stdClass();
        $std12->index = 11;
        $std12->display_name = '跟单';
        $std12->name = 'gendan';
        $std12->show = true;
        $li[11] = $std12;

        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;
        $this->load->view('admin/jiudian/dingdanguanli/index',$data);
    }
    
    public function all(){
        $myconfig = $this->config->item('酒店订单状态');
        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];
        
        // 订单号
        $affiliateConfirmationId = $this->input->post('dingdanhao');
        // 是否报销
        $ismail = $this->input->post('baoxiao');
        // 采购渠道
        $caigouqudao = $this->input->post('caigou');
        // 订单来源
        $dingdanlaiyuan = $this->input->post('dingdanlaiyuan');
        // 支付方式
        $zhifufangshi = $this->input->post('zhifu');
        // 订单状态
        $dingdanzhuangtai = $this->input->post('zhuangtai');
        // 创建时间 开始
        $chuangjianriqi_begin = $this->input->post('chuangjianriqi_begin');
        // 创建时间 结束
        $chuangjianriqi_end = $this->input->post('chuangjianriqi_end');
		$shanghuhao = $this->input->post('shanghuhao');
        $mysort = 'id';
        $mydir = 'desc';
        //取所有订单
      $sql = 'select m.id as id,m.affiliateConfirmationId as affiliateConfirmationId,m.chanpinleixing as chanpinleixing,
                m.caigouqudao as caigouqudao,m.hotelId as hotelId,m.arrivalDate as arrivalDate,m.departureDate as departureDate,
                m.zhifufangshi as zhifufangshi,m.totalCost as totalCost,m.shijizhifuzonge as shijizhifuzonge,m.dingdanzhuangtai as dingdanzhuangtai,
                m.ismail as ismail,m.caigouqudao as caigouqudao,m.roomTypeId as roomTypeId,m.xiadanshijian as xiadanshijian,m.fukuanshijian as fukuanshijian,
                m.numberOfRooms as numberOfRooms,m.hotelname as hotelname,m.roomtype as roomtype from jiudian_chuangjiandingdan as m ';
        //var_dump($sql);
      $sqlcount = 'select count(m.id) as id from jiudian_chuangjiandingdan as m ';
	  $ps = array();
	  if(!empty($affiliateConfirmationId) && $affiliateConfirmationId != ""){
        $sql = $sql. 'where m.affiliateConfirmationId = ? '; 
        $sqlcount = $sqlcount . 'where m.affiliateConfirmationId = ? ';
        $ps[]=$affiliateConfirmationId;
      }  else {
         $sql = $sql. 'where '; 
        $sqlcount = $sqlcount . 'where ';
        
      }
      if(!empty($ismail) && $ismail != ''&& $ismail != '全部'){
          $sql = $sql. 'and m.ismail = ? '; 
        $sqlcount = $sqlcount . 'and m.ismail = ? ';
        $ps[]=$ismail;
      }
      if(!empty($caigouqudao) && $caigouqudao != '' && $caigouqudao != '全部'){
          $sql = $sql. 'and m.caigouqudao = ? '; 
        $sqlcount = $sqlcount . 'and m.caigouqudao = ? ';
        $ps[]=$caigouqudao;
      }
     if(!empty($dingdanlaiyuan) && $dingdanlaiyuan != '' && $dingdanlaiyuan != '全部'){
          $sql = $sql. 'and m.dingdanlaiyuan = ? '; 
        $sqlcount = $sqlcount . 'and m.dingdanlaiyuan = ? ';
        $ps[]=$dingdanlaiyuan;
      }
	if (!empty($shanghuhao) && $shanghuhao != '' && $shanghuhao != '全部') {
		$sql = $sql . 'and m.shanghuhao = ? ';
		$sqlcount = $sqlcount . 'and m.shanghuhao = ? ';
		$ps[] = $shanghuhao;
	} 
	  
     
      if(!empty($zhifufangshi) && $zhifufangshi != '' && $zhifufangshi != '全部'){
          $sql = $sql. 'and m.zhifufangshi = ? '; 
        $sqlcount = $sqlcount . 'and m.zhifufangshi = ? ';
        $ps[]=$zhifufangshi;
      } 
      if(!empty($dingdanzhuangtai) && $dingdanzhuangtai != '' && $dingdanzhuangtai != '全部'){
          $sql = $sql. 'and m.dingdanzhuangtai = ? '; 
        $sqlcount = $sqlcount . 'and m.dingdanzhuangtai = ? ';
        $ps[] = $dingdanzhuangtai;
      } 
      if (!empty($chuangjianriqi_begin) && $chuangjianriqi_begin != '' && !empty($chuangjianriqi_end) && $chuangjianriqi_end != '') {
            $sql = $sql . 'and m.xiadanshijian between ? and ? ';
            $sqlcount = $sqlcount . 'and m.xiadanshijian between ? and ? ';
            $ps[] = $chuangjianriqi_begin;
            $ps[] = $chuangjianriqi_end;
        }
      $sql = $sql . 'order by m.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;
          //var_dump($sql);
        $sql = str_replace("where order", "order", $sql);
        //var_dump($sql);
        $sql = str_replace("where and", "where", $sql);
        //var_dump($sql);
        $sqlcount = str_replace("where order", "order", $sqlcount);
        $sqlcount = str_replace("where and", "where", $sqlcount);
        $newstr = substr(trim($sqlcount), 0, strlen(trim($sqlcount)) - 5);
        if (substr(trim($sqlcount), -5) == 'where') {
            $sqlcount = $newstr;
        }
        
        $res_count = $this->db->query($sqlcount,$ps);
        $res = $this->db->query($sql,$ps);
        $mycount = 0;
        $row_count = $res_count->first_row();
        //var_dump($row_count);
        if (!empty($row_count)) {
            $mycount = $row_count->id;
        }
       //var_dump($res);
        $row = $res->result();
        
        for($i = 0; $i < count($row);$i++){
            $row[$i]->dingdanzhuangtai = $myconfig[$row[$i]->dingdanzhuangtai];
            //查询联系电话
            $sql1 = 'select m.Mobile as Mobile from jiudian_contact as m where m.chuangjiandingdanid = ?';
            //var_dump($sql1);
            $res1 = $this->db->query($sql1,$row[$i]->id);
            $row1 = $res1->row();
            $row[$i]->Mobile = $row1->Mobile;
            //查询入住人
            $sql2 = 'select m.name as name from jiudian_orderrooms as m where  m.chuangjiandingdanid = ?';
            $res2 = $this->db->query($sql2,$row[$i]->id); 
            $row2 = $res2->result();
            $row[$i]->checkin = $row2;
            //如果需要报销的查询报销信息
            if($row[$i]->ismail == "是"){
                $row[$i]->baoxiaofei =20;
                $sql3 = 'select m.xingming as xingming,m.address as address,m.mobile as mobile from jiudian_fapiao as m where m.bibidingdanbianhao = ?';
                $res3 = $this->db->query($sql3,$row[$i]->affiliateConfirmationId);
                $row3 = $res3->row();
                $row[$i]->shoujianren = $row3->xingming;
                $row[$i]->address = $row3->address;
                $row[$i]->shoujianmobile = $row3->mobile;
            }

            $row[$i]->gendan = "";
            $row[$i]->dingdan_shijian = $row[$i]->affiliateConfirmationId . '/' . $row[$i]->xiadanshijian ;
            $row[$i]->ruzhu_lidian = $row[$i]->arrivalDate . '/' . $row[$i]->departureDate ;
            
        }
        $result = new stdClass();
        $result->myData = $row;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;
        echo json_encode($result);
                
                
    }
    public function xiangqing($id = ''){
 
        //var_dump($id);
        $myconfig = $this->config->item('酒店订单状态');
        $sql = 'select m.affiliateConfirmationId as affiliateConfirmationId,m.chanpinleixing as chanpinleixing,
                m.caigouqudao as caigouqudao,m.hotelId as hotelId,m.arrivalDate as arrivalDate,m.departureDate as departureDate,
                m.zhifufangshi as zhifufangshi,m.totalCost as totalCost,m.shijizhifuzonge as shijizhifuzonge,m.dingdanzhuangtai as dingdanzhuangtai,
                m.ismail as ismail,m.caigouqudao as caigouqudao,m.roomTypeId as roomTypeId,m.xiadanshijian as xiadanshijian,m.fukuanshijian as fukuanshijian,
                m.numberOfRooms as numberOfRooms,m.currencyCode as currencyCode,m.hotelname as hotelname,m.roomtype as roomtype from jiudian_chuangjiandingdan as m where id = ?';
        $res = $this->db->query($sql,$id);
        $obj = $res->row();
 
        $sql2 = 'select m.name as name from jiudian_orderrooms as m where  m.chuangjiandingdanid = ?';
        $res2 = $this->db->query($sql2,$id);
        $row2 = $res2->row();
        //var_dump($row2);
        $obj->ordername = $row2->name;
        //查询联系电话
            $sql5 = 'select m.Mobile as Mobile from jiudian_contact as m where m.chuangjiandingdanid = ?';
            //var_dump($sql1);
            $res5 = $this->db->query($sql5,$id);
            $row5 = $res5->row();
            $obj->Mobile = $row5->Mobile;
        if($obj->ismail == "是"){
            $obj->baoxiaofei = 20;
            $obj->hotelcost = $obj->totalCost - 20;   
            $sql4 = 'select m.xingming as xingming,m.address as address,m.mobile as mobile from jiudian_fapiao as m where m.bibidingdanbianhao = ?';
            $res4 = $this->db->query($sql4,$obj->affiliateConfirmationId);
            $row4 = $res4->row();
            $obj->shoujianren = $row4->xingming;
            $obj->address = $row4->address;
            $obj->shoujianmobile = $row4->mobile;
        }else{
            $obj->baoxiaofei = 0;
            $obj->hotelcost = $obj->totalCost;
        }
       $obj->dingdanzhuangtai = $myconfig[$obj->dingdanzhuangtai];
       //$obj->dingdanzhuangtai_int = $obj->dingdanzhuangtai;
       $obj->youhuijine = 0;
       $data['obj'] = $obj;
       $this->load->view('admin/jiudian/dingdanguanli/xiangqing',$data);
    }
    
}

