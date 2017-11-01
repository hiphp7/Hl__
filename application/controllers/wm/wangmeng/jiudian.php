<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 订单
 */
class jiudian extends CI_Controller {
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

        $std4 = new stdClass();
        $std4->index = 1;
        $std4->display_name = '酒店名称';
        $std4->name = 'hotelname';
        $std4->show = true;
        $li[1] = $std4;

        $std5 = new stdClass();
        $std5->index = 2;
        $std5->display_name = '入住/离店日期';
        $std5->name = 'ruzhu_lidian';
        $std5->show = true;
        $li[2] = $std5;


        $std7 = new stdClass();
        $std7->index = 3;
        $std7->display_name = '间夜数';
        $std7->name = 'jianyeshu';
        $std7->show = true;
        $li[3] = $std7;

        $std8 = new stdClass();
        $std8->index = 4;
        $std8->display_name = '订单总价';
        $std8->name = 'shijizhifuzonge';
        $std8->show = true;
        $li[4] = $std8;
        
        $std9 = new stdClass();
        $std9->index = 5;
        $std9->display_name = '订单状态';
        $std9->name = 'dingdanzhuangtai';
        $std9->show = true;
        $li[5] = $std9;
        

        $std11 = new stdClass();
        $std11->index = 6;
        $std11->display_name = '完成时间';
        $std11->name = 'fukuanshijian';
        $std11->show = true;
        $li[6] = $std11;
        
        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;
        $this->load->view('wm/wangmeng/jiudian/index',$data);
    }
    
    public function all(){
        $myconfig = $this->config->item('酒店订单状态');
        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $wm_admin = $this->session->userdata('wm_admin');
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');


        $cishu = $this->input->post('cishu');
        if ($cishu == 0) {
            $result = new stdClass();
            $result->myData = array();
            $result->iTotalDisplayRecords = 0;
            $result->iTotalRecords = 0;
            echo json_encode($result);
            exit;
        }
        $mysort = 'id';
        $mydir = 'desc';
        //取所有订单
      $sql = 'select m.id as id,m.affiliateConfirmationId as affiliateConfirmationId,m.chanpinleixing as chanpinleixing,
                m.caigouqudao as caigouqudao,m.hotelId as hotelId,m.arrivalDate as arrivalDate,m.departureDate as departureDate,
                m.zhifufangshi as zhifufangshi,m.totalCost as totalCost,m.shijizhifuzonge as shijizhifuzonge,m.dingdanzhuangtai as dingdanzhuangtai,
                m.ismail as ismail,m.caigouqudao as caigouqudao,m.roomTypeId as roomTypeId,m.xiadanshijian as xiadanshijian,m.fukuanshijian as fukuanshijian,
                m.numberOfRooms as numberOfRooms,m.numberOfCustomers as numberOfCustomers,m.hotelname as hotelname,m.roomtype as roomtype from jiudian_chuangjiandingdan as m ';
        //var_dump($sql);
      $sqlcount = 'select count(m.id) as id from jiudian_chuangjiandingdan as m ';
      $ps = array();

      $sql = $sql. 'where '; 
      $sqlcount = $sqlcount . 'where ';


        $sql = $sql. 'and m.dingdanzhuangtai = ? '; 
        $sqlcount = $sqlcount . 'and m.dingdanzhuangtai = ? ';
        $ps[]= 2;

        $sql = $sql . 'and m.shanghuhao = ? ';
        $sqlcount = $sqlcount . 'and  m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];        

      if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql = $sql . 'and m.fukuanshijian between ? and ? ';
            $sqlcount = $sqlcount . 'and m.fukuanshijian between ? and ? ';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
        }
      $sql = $sql . 'order by m.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;
    
        $sql = str_replace("where order", "order", $sql); 
        $sql = str_replace("where and", "where", $sql);
        $sqlcount = str_replace("where order", "order", $sqlcount);
        $sqlcount = str_replace("where and", "where", $sqlcount);
        $newstr = substr(trim($sqlcount), 0, strlen(trim($sqlcount)) - 5);
        if (substr(trim($sqlcount), -5) == 'where') {
            $sqlcount = $newstr;
        }
        
        $res_count = $this->db->query($sqlcount,$ps);
        $res = $this->db->query($sql,$ps);
        $a = $this->db->last_query();

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

            $row[$i]->jianyeshu = $row[$i]->numberOfRooms * $row[$i]->numberOfCustomers;

            $row[$i]->dingdan_shijian = $row[$i]->affiliateConfirmationId . '/' . $row[$i]->xiadanshijian ;
            $row[$i]->ruzhu_lidian = substr($row[$i]->arrivalDate, 0,10) . '/' . substr($row[$i]->departureDate, 0,10) ;
            
        }
        $result = new stdClass();
        $result->myData = $row;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;
        echo json_encode($result);
                
                
    }
public function info() {
        $wm_admin = $this->session->userdata('wm_admin');
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');

        $sql = 'select m.id as id,m.affiliateConfirmationId as affiliateConfirmationId,m.chanpinleixing as chanpinleixing,
                  m.caigouqudao as caigouqudao,m.hotelId as hotelId,m.arrivalDate as arrivalDate,m.departureDate as departureDate,
                  m.zhifufangshi as zhifufangshi,m.totalCost as totalCost,m.shijizhifuzonge as shijizhifuzonge,m.dingdanzhuangtai as dingdanzhuangtai,
                  m.ismail as ismail,m.caigouqudao as caigouqudao,m.roomTypeId as roomTypeId,m.xiadanshijian as xiadanshijian,m.fukuanshijian as fukuanshijian,
                  m.numberOfRooms as numberOfRooms,m.numberOfCustomers as numberOfCustomers,m.hotelname as hotelname,m.roomtype as roomtype from jiudian_chuangjiandingdan as m ';

        $ps = array();

       $sql = $sql. 'where '; 

        $sql = $sql. ' m.dingdanzhuangtai = ? '; 
        $ps[]= 2;

        $sql = $sql . 'and m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];

        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
              $sql = $sql . 'and m.fukuanshijian between ? and ? ';
              $ps[] = $datetimeStart . " 0:0:0";
              $ps[] = $datetimeEnd . " 23:59:59";
          };     
        $res = $this->db->query($sql,$ps);

        $jianpiaoall = 0;
        $dingdanall = 0;
        $dingdanzongjiaall = 0;
        if ($res->num_rows()>0) {
            $row = $res->result();
            for($i = 0; $i < count($row);$i++){
                $jianpiaoall += $row[$i]->numberOfRooms * $row[$i]->numberOfCustomers;
                $dingdanall += 1;          
                $dingdanzongjiaall += $row[$i]->totalCost;          
            }
    
        } 


        $b = new stdClass();
        $b->dingdanall = $dingdanall;
        $b->jianpiaoall = $jianpiaoall;
        $b->dingdanzongjiaall = $dingdanzongjiaall;

        echo json_encode($b);
    }


    
}

