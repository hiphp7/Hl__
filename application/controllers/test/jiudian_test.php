<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jiudian_test extends CI_Controller {

    public function hotels() {
        $this->load->view('h5/jiudian/templates/jiudian_query/hotels');
    }

    public function hotelDetail() {
        $this->load->view('h5/jiudian/templates/jiudian_query/hotelDetail');
    }
    //酒店列表数据
    public function hotelList() {
        //$cityCode = $this->input->post('cityCode');
        $cityCode = 'beijing_city';
        //查jiudian_jiudianxiangqingliebiao表
        $sql_jiudianxiangqingliebiao = 'select m.id as id,
m.hotelId as hotelId,
m.name as name,
m.address as address,
m.category as category,
m.city as city,
m.introEditor as introEditor,
m.description as description,
m.generalAmenities as generalAmenities,
m.roomAmenities as roomAmenities,
m.recreationAmenities as recreationAmenities,
m.conferenceAmenities as conferenceAmenities,
m.thumbnailId as thumbnailId,
m.commentScore as commentScore from jiudian_jiudianxiangqingliebiao as m where m.city = ?';
        $res_jiudianxiangqingliebiao = $this->db->query($sql_jiudianxiangqingliebiao, $cityCode);
        $rows_jiudianxiangqingliebiao = $res_jiudianxiangqingliebiao->result();
        //查jiudian_rooms表，查找酒店的物理房型
        if (!empty($rows_jiudianxiangqingliebiao)) {
            for ($i = 0; $i < count($rows_jiudianxiangqingliebiao); $i++) {
                $salePrice_ss = array();
                $sql_rooms = 'select m.roomTypeId as roomTypeId from jiudian_rooms as m where m.hotelId = ?';
                $res_rooms = $this->db->query($sql_rooms, $rows_jiudianxiangqingliebiao[$i]->hotelId);
                $rows_rooms = $res_rooms->result();
//                echo json_encode($rows_rooms);
//                exit();
                //查jiudian_chanpinxinxi表，查找酒店房型的产品
                if (!empty($rows_rooms)) {
                    foreach ($rows_rooms as $room) {
                        //echo $room->roomTypeId;
                        $sql_chanpinxinxi = 'select m.ratePlanId as ratePlanId from jiudian_chanpinxinxi as m where m.roomTypeId = ?';
                        $res_chanpinxinxi = $this->db->query($sql_chanpinxinxi, $room->roomTypeId);
                        $rows_chanpinxinxi = $res_chanpinxinxi->result();
                        echo json_encode($rows_chanpinxinxi);
                        
                        //查jiudian_jianyejiage表，查找酒店房型产品的价格
                        if (!empty($rows_chanpinxinxi)) {
                            foreach ($rows_chanpinxinxi as $cpxx) {
                                $sql_jianyejiage = 'select m.salePrice as salePrice from jiudian_jianyejiage as m where m.ratePlanId = ?';
                                $res_jianyejiage = $this->db->query($sql_jianyejiage, $cpxx->ratePlanId);
                                $rows_jianyejiage = $res_jianyejiage->result();
                                //echo json_encode($rows_jianyejiage);
                                if (!empty($rows_jianyejiage)) {
                                    foreach ($rows_jianyejiage as $jyjg) {
                                        $salePrice_ss[] = $jyjg->salePrice;
                                        //echo $jyjg->salePrice;
                                    }
                                }
                                //exit();
                            }
                        }
                    }
                }
                //对价格升序排序
                if (!empty($salePrice_ss)) {
                    sort($salePrice_ss);
                    $rows_jiudianxiangqingliebiao[$i]->salePrice = $salePrice_ss[0];
                }
            }
            echo json_encode($rows_jiudianxiangqingliebiao);
        } else {
            echo "false";
        }
    }

    //获取酒店详情数据
    public function hotelDetailList() {
        $hotelId = $this->input->post('hotelId');
        //$hotelId = "571820642";
        $this->db->trans_begin();
        $obj_rooms = new stdClass();
        $sql_jiudian_rooms = 'select m.id as id,
m.hotelId as hotelId,
m.roomTypeId as roomTypeId,
m.name as name,
m.area as area,
m.floor as floor,
m.broadnet as broadnet,
m.wifi as wifi,
m.window as window,
m.bedType as bedType,
m.maxCustomers as maxCustomers,
m.highLights as highLights,
m.imageUrl as imageUrl,
m.bath as bath from jiudian_rooms as m where m.hotelId = ?';
        $res_jiudian_rooms = $this->db->query($sql_jiudian_rooms, $hotelId);
        $rows_jiudian_rooms = $res_jiudian_rooms->result();
        //echo json_encode($rows_jiudian_rooms);
        if (!empty($rows_jiudian_rooms)) {
            $room_ss = array();
            foreach ($rows_jiudian_rooms as $room) {
                $myroom = new stdClass();
                //酒店id
                $myroom->hotelId = $room->hotelId;
                //房型编码
                $myroom->roomTypeId = $room->roomTypeId;
                //房型名称
                $myroom->name = $room->name;
                //房间面积
                $myroom->area = $room->area;
                //楼层
                $myroom->floor = $room->floor;
                //宽带
                $myroom->broadnet = $room->broadnet;
                //wifi
                $myroom->wifi = $room->wifi;
                //窗户
                $myroom->window = $room->window;
                //床型
                $myroom->bedType = $room->bedType;
                //最大入住人数
                $myroom->maxCustomers = $room->maxCustomers;
                //亮点说明
                $myroom->highLights = $room->highLights;
                //卫浴
                $myroom->bath = $room->bath;
                //产品信息集
                $sql_jiudian_chanpinxinxi = 'select m.id as id,
m.roomTypeId as roomTypeId,
m.ratePlanId as ratePlanId,
m.productName as productName,
m.status as status,
m.instantConfirmation as instantConfirmation,
m.paymentType as paymentType,
m.valueAddIds as valueAddIds,
m.currencyCode as currencyCode,
m.refundRuleId as refundRuleId,
m.bookingRuleIds as bookingRuleIds,
m.forceGuarantee as forceGuarantee,
m.customerTypes as customerTypes,
m.guaranteeRuleId as guaranteeRuleId,
m.wifi as wifi,
m.bedType as bedType,
m.window as window,
m.productRoomName as productRoomName from jiudian_chanpinxinxi as m where m.roomTypeId = ?';
                $res_jiudian_chanpinxinxi = $this->db->query($sql_jiudian_chanpinxinxi, $myroom->roomTypeId);
                $rows_jiudian_chanpinxinxi = $res_jiudian_chanpinxinxi->result();
                if (!empty($rows_jiudian_chanpinxinxi)) {
                    $chanpinxinxi_ss = array();
                    foreach ($rows_jiudian_chanpinxinxi as $cpxx) {
                        //判断付款类型是否是预付
                        if ($cpxx->paymentType == 'Prepay') {
                            $mychanpinxinxi = new stdClass();
                            //房型编码
                            $mychanpinxinxi->roomTypeId = $cpxx->roomTypeId;
                            //产品编号
                            $mychanpinxinxi->ratePlanId = $cpxx->ratePlanId;
                            //产品名称
                            $mychanpinxinxi->productName = $cpxx->productName;
                            //产品房型名称，注：productRoomName+ productName 组成完整的产品名称
                            $mychanpinxinxi->productRoomName = $cpxx->productRoomName;
                            //付款类型
                            $mychanpinxinxi->paymentType = $cpxx->paymentType;
                            //货币 RMB人民币 HKD港币 MOP澳门币 USD美币 SGD新加坡币。当前均为RMB
                            $mychanpinxinxi->currencyCode = $cpxx->currencyCode;
                            //wifi
                            $mychanpinxinxi->wifi = $cpxx->wifi;
                            //床型:BIG-大床；DOUBLE-双床；BIG_DOUBLE-大/双床；OTHER-其他
                            if ($cpxx->bedType == 'BIG') {
                                $mychanpinxinxi->bedType = '大床';
                            } else if ($cpxx->bedType == 'DOUBLE') {
                                $mychanpinxinxi->bedType = '双床';
                            } else if ($cpxx->bedType == 'BIG_DOUBLE') {
                                $mychanpinxinxi->bedType = '大/双床';
                            } else if ($cpxx->bedType == 'OTHER') {
                                $mychanpinxinxi->bedType = '其他';
                            }
                            //间夜价格 - 产品信息子表
                            $sql_jiudian_jianyejiage = 'select m.id as id,
m.ratePlanId as ratePlanId,
m.date as date,
m.cost as cost,
m.instantConfirmation as instantConfirmation,
m.instantConfirmCount as instantConfirmCount,
m.availableRooms as availableRooms,
m.salePrice as salePrice,
m.marketPrice as marketPrice from jiudian_jianyejiage as m where m.ratePlanId = ?';
                            $res_jiudian_jianyejiage = $this->db->query($sql_jiudian_jianyejiage, $mychanpinxinxi->ratePlanId); ////17
                            $rows_jiudian_jianyejiage = $res_jiudian_jianyejiage->result();
                            if (!empty($rows_jiudian_jianyejiage)) {
                                $jianyejiage_ss = array();
                                foreach ($rows_jiudian_jianyejiage as $jyjg) {
                                    $myjianyejiage = new stdClass();
                                    //产品编号
                                    $myjianyejiage->ratePlanId = $jyjg->ratePlanId;
                                    //底价
                                    $myjianyejiage->cost = $jyjg->cost;
                                    //卖价
                                    $myjianyejiage->salePrice = $jyjg->salePrice;
                                    //市场网络参考价
                                    $myjianyejiage->marketPrice = $jyjg->marketPrice;
                                    $jianyejiage_ss[] = $myjianyejiage;
                                }
                                $mychanpinxinxi->jianyejiage = $jianyejiage_ss;
                            }
                            //成人儿童数 - 产品信息子表,仅在国际报价的实时报价时展示
                            $sql_jiudian_chengrenertongshu = 'select m.id as id,
m.ratePlanId as ratePlanId,
m.adults as adults,
m.children as children,
m.childAges as childAges from jiudian_chengrenertongshu as m where m.ratePlanId = ?';
                            $res_jiudian_chengrenertongshu = $this->db->query($sql_jiudian_chengrenertongshu, $mychanpinxinxi->ratePlanId); ////17
                            $rows_jiudian_chengrenertongshu = $res_jiudian_chengrenertongshu->result();
                            if (!empty($rows_jiudian_chengrenertongshu)) {
                                $chengrenertongshu_ss = array();
                                foreach ($rows_jiudian_chengrenertongshu as $cr) {
                                    $mychengrenertongshu = new stdClass();
                                    //产品编号
                                    $mychengrenertongshu->ratePlanId = $cr->ratePlanId;
                                    //成人数
                                    $mychengrenertongshu->adults = $cr->adults;
                                    //儿童数
                                    $mychengrenertongshu->children = $cr->children;
                                    //儿童年龄
                                    $mychengrenertongshu->childAges = $cr->childAges;
                                    $chengrenertongshu_ss[] = $mychengrenertongshu;
                                }
                                $mychanpinxinxi->chengrenertongshu = $chengrenertongshu_ss;
                            }
                            $chanpinxinxi_ss[] = $mychanpinxinxi;
                        }
                    }//产品信息 [end]
                    $myroom->chanpinxinxi = $chanpinxinxi_ss;
                }
                $room_ss[] = $myroom;
            }//rooms [end]
            $obj_rooms->rooms = $room_ss;
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'false';
        } else {
            $this->db->trans_commit();
            echo json_encode($obj_rooms);
        }
    }
	
	public function test1(){
		date_default_timezone_set("Asia/Shanghai");
        $hotelId = '573320012';
        $ruzhuDate = '2017-02-23';
        $lidianDate = '2017-02-26';
        $this->load->library('quna');
        $queryFangXingBaoJia = $this->quna->queryRatePlan($ruzhuDate, $lidianDate, $hotelId, '', '', '', '', '', '');
        $queryFangXingBaoJia = json_decode($queryFangXingBaoJia);
        echo json_encode($queryFangXingBaoJia);
	}
}


