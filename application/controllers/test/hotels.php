<?php
header("Content-type: text/html; charset=utf-8");    
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hotels extends CI_Controller {

    //酒店列表
    public function queryHotelList() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryHotelList.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        //$data = new stdClass();
        //$data->updateTime = '571821570';

        $obj = new stdClass();
        $obj->head = $head;
        // $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test1() {
        date_default_timezone_set("Asia/Shanghai");
        $this->load->library('quna');
        $rel = $this->quna->queryHotelList('', '');
        //$rel = json_decode($rel);
        echo $rel;
        //echo date('Y-m-d H:i:s', "1454572180000");
    }

    //酒店详情列表
    public function queryHotelDetail() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryHotelDetail.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->hotelIds = '571820642';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        echo $res;
    }

    public function test2() {
        $this->load->library('quna');
        $res = $this->quna->queryHotelDetail('571820642', true, true);
        echo $res;
    }

    //酒店增量
    public function queryHotelIncrement() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryHotelIncrement.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->maxId = '12';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test3() {
        $this->load->library('quna');
        $this->quna->queryHotelIncrement('12', '');
    }

    //创建酒店聚合任务接口
    public function submitClusterHotels() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "cluster/submitClusterHotels.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $arr = array();
        $arr[0]['hotelId'] = 'sanya789';
        $arr[0]['city'] = 'sanya';
        $arr[0]['name'] = '蜈支洲岛度假中心11';
        $arr[0]['address'] = '蜈支洲岛11';
        $arr[1]['hotelId'] = 'sanya78911';
        $arr[1]['city'] = 'sanya11';
        $arr[1]['name'] = '蜈支洲岛度假中心11';
        $arr[1]['address'] = '蜈支洲岛11';
        $data = $arr;


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test4() {
        $this->load->library('quna');
        $this->quna->queryHotelIncrement('12', '');
    }

    //根据酒店id查询聚合酒店
    public function fetchClusterByIds() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "cluster/fetchClusterByIds.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];
        $arr = array('sanya789', '123', 'x123');
        $data = new stdClass();
        $data = $arr;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test5() {
        $this->load->library('quna');
        $this->quna->queryHotelIncrement('12', '');
    }

    //城市接口
    public function queryCity() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "city/queryCity.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        //$data = new stdClass();
        //$data->maxId = '12';

        $obj = new stdClass();
        $obj->head = $head;
        //$obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test6() {
        $this->load->library('quna');
        $this->quna->queryCity();
    }

    //酒店品牌数据
    public function queryBrand() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "brand/queryBrand.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        //$data = new stdClass();
        //$data->maxId = '12';

        $obj = new stdClass();
        $obj->head = $head;
        //$obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test7() {
        $this->load->library('quna');
        $this->quna->queryBrand();
    }

    //房型报价接口
    public function queryRatePlan() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryRatePlan.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->arrivalDate = '2017-01-20';
        $data->departureDate = '2017-01-25';
        $data->hotelIds = '571820642';
        $data->roomTypeId = '90000141';
        $data->ratePlanId ='50000039';
        $data->roomNum = 5;
        $data->latestArrivalTime = '2017-01-20';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
        $str1 = json_decode($res);
        var_dump($str1->result->bookingMessage);
        var_dump($str1->result->hotels[0]->rooms[0]->ratePlans[0]->nightlyRates);
    }

    public function test8() {
        $this->load->library('quna');
        $this->quna->queryRatePlan('2016-12-15', '2016-12-16', '571821570', '', '', '', '', '', '');
    }

    //房型聚合接口
    public function clusterRooms() {
        $this->load->library('mypost');
        $conf = $this->config->item('去哪儿');
        $url = $conf['Urlquna'] . "cluster/clusterRooms.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $arr = array();
        $arr[0]['ratePlanName'] = '大床房';
        $arr[1]['ratePlanName'] = '大床房(含早)';
        $arr[2]['ratePlanName'] = '电脑房(含早)';
        $data = new stdClass();
        $data->ratePlans = $arr;
        $data->hotelId = '571821570';
        //$data->roomTypeId = '11035368';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test9() {
        $this->load->library('quna');
        $arr = array();
        $arr[0]['ratePlanName'] = '大床房';
        $arr[1]['ratePlanName'] = '大床房(含早)';
        $arr[2]['ratePlanName'] = '电脑房(含早)';
        $this->quna->clusterRooms('571821570', $arr);
    }

    //获取变价酒店
    public function queryChangedPrice() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryChangedPrice.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->updateTime = '1447851048000';
        $data->maxChangeId = '1932';
        //$data->hotelIds = '571821570';
        //$data->roomTypeId = '11035368';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test10() {
        $this->load->library('quna');
        $this->quna->queryChangedPrice('', '1932', '');
    }

    //下单前可订检查接口
    public function validateOrder() {
        $this->load->library('mypost');
        $conf = $this->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/validateOrder.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->arrivalDate = '2017-01-20';
        $data->departureDate = '2017-01-25';
        $data->latestArrivalTime = '2017-01-20';
        $data->hotelId = '571820642';
        $data->ratePlanId = '50000039';
        $data->totalPrice = '2500';
        $data->numberOfRooms = '1';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        var_dump($str);

        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test11() {
        $this->load->library('quna');
        $this->quna->validateOrder('2017-01-27', '2017-02-02', '2017-01-27', '571820642', '50000041', '3000', '1');
    }

    //12创建订单
    public function createOrder() {
        $this->load->library('mypost');
        $url = "https://hdsoutlet.qunar.com/api/order/createOrder.json";



        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = time();
        $head->sign = md5(md5('abcdefg' . '12345678') . $head->salt);
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->affiliateConfirmationId = 'bibi123456789';
        $data->hotelId = '571820652';
        $data->roomTypeId = '90000143';
        $data->ratePlanId = '216138';
        $data->arrivalDate = '2017-01-08';
        $data->departureDate = '2017-01-25';
        $data->paymentType = 'Prepay'; //预付Prepay
        $data->numberOfRooms = 1;
        $data->forceGuarantee = 'false';
        //$data->numberOfCustomers = '1';
        $data->latestArrivalTime = '2017-01-05';
        $data->currencyCode = 'RMB';
        $data->totalCost = 500;
        $data->totalCommition = 0;


        $data->contact->name = '张三';
        $data->contact->mobile = '13718103771';
        
        $arr = array();
        //$arr[0]->Customers = array();
        $arr[0]->Customers[0]->Name = '李四';
        $data->orderRooms = $arr;
        //var_dump($data->orderRooms);
       // var_dump($arr[0]->Customers[0]->name );
        //var_dump($arr[0]->customer[0]->name);
        //$arr[1]['Name'] = '李四';
        //$data->orderRooms = array('Customers'=> array('Name'=>'李四'));
        //$data->groupBuyFlag = 'notGroupBuy';
        // $data->needGuarantee = true;
        // $data->guaranteePrice = 10;
        // $data->forceGuarantee = false;
        //$data->paid = true;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);

        var_dump($str);
        $data_post = $str;
        $res = $this->mypost->request_post_str($url, $data_post);
        var_dump($res);
    }

    public function test12() {
        $hotelId = '571821570';
//        $sql = "SELECT arrivalEndTime FROM jiudian_yudingguize WHERE jiudianbianma = $hotelId";
//        $latestArrivalTime = $this->db->query($sql);
//        $rows = json_encode($latestArrivalTime->result());
//        echo $rows->arrivalEndTime;
//        exit();

        $this->load->library('quna');
        $arr1 = array();
        $arr1[0]['Name'] = '张三';
        $arr1[1]['Mobile'] = '13718103771';
        $arr2 = array();
        $arr2[0]['orderRooms']['customers'] = '李四';
        $row = $this->quna->createOrder1('oottii11111111', $hotelId, '2016-12-24', '90000143', '216138', '2016-12-25', '1', '', '2016-12-24 20:00', 'RMB', '', $arr1, '$arr2', '', '', '', 'Prepay', '550', '', 'false', '', '', '');
        var_dump($row);
    }

    //13 post订单支付或担保接口 payOrder  ok
    public function payOrder() {
        $this->load->library('mypost');
        $url = "https://hdsoutlet.qunar.com/api/order/payOrder.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderId = '101038413358';
        $data->payAmount = '2500';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);


        var_dump($str);
        $data_post = $str;
        $res = $this->mypost->request_post_str($url, $data_post);
        var_dump($res);
    }

    public function test13() {
        $this->load->library('quna');
        $this->quna->payOrder1('100494262309', '50');
    }

    //14.取消订单  ok
    public function cancelOrder() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/cancelOrder.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderId = '123456781401101123114122';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        //var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test14() {
        $this->load->library('quna');
        $this->quna->cancelOrder1('101039124370');
    }

    //15 查询订单详情 queryOrderDetail    ok
    public function queryOrderDetail() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/queryOrderDetail.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = time();
        $head->sign = md5(md5('abcdefg' . '12345678') . $head->salt);
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderId = '101042314034';
        $data->affiliateConfirmationId = '';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        //var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
        $str = json_decode($res);
        var_dump($str->result->orders[0]->orderStatus);
    }

    public function test15() {
        $this->load->library('quna');
        $this->quna->queryOrderDetail2('123456781401', '');
    }

    //16 订单变更 modifyOrder    ---post    ok
    public function modifyOrder() {
        $this->load->library('mypost');
        $url = "https://hdsoutlet.qunar.com/api/order/modifyOrder.json";
        $arr1 = array();
        $arr1[0]['name'] = 'hello';
        $arr2 = array();
        $arr2[0]['name'] = 'haha';
        $arr2[1]['mobile'] = '13813513811';

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderId = '100876773721';
        $data->hotelId = '159091';
        $data->roomTypeId = '90000095';
        $data->ratePlanId = '59069';
        $data->isDrrSale = '';
        $data->arrivalDate = '2016-12-20';
        $data->departureDate = '2016-12-23';
        $data->latestArrivalTime = '2016-12-20 20:00:00';
        $data->numberOfRooms = '1';

        $data->customers = $arr1;
        $data->noteToHotel = '请安排安静的房间';
        $data->currencyCode = 'RMB';
        $data->totalCost = '85';
        $data->totalSalePrice = '';
        $data->additionalPayment = '';
        $data->refundPayment = '0';
        $data->distributorSalePrice = '';
        $data->contact = $arr2;



        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        var_dump($str);
        $data_post = $str;
        $res = $this->mypost->request_post_str1($url, $data_post);
        var_dump($res);
    }

    public function test16() {
        $this->load->library('quna');
        $arr1 = array();
        $arr1[0]['name'] = 'hello';

        $arr2 = array();
        $arr2[0]['name'] = 'haha';
        $arr2[1]['mobile'] = '13813513811';
        $this->quna->modifyOrder1('100876773721', '159091', '90000095', '59069', '', '', '2016-12-20', '2016-12-23', '2016-12-20 20:00:00', '1', '$arr1', '', '$arr2', 'RMB', '', '', '', '', '', '');
    }

    //17 按时间获取订单同步ID queryChangedByDate    string ''  ok
    public function queryChangedByDate() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/queryChangedByDate.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->lastTime = '2016-12-15 00:00:00';


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test17() {
        $this->load->library('quna');
        $this->quna->queryChangedByDate1('2016-12-20 00:00:00');
    }

    //18 订单增量接口 queryChanged     ok
    public function queryChanged() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/queryChanged.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->lastId = '10000';


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        //var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test18() {
        $this->load->library('quna');
        $this->quna->queryChanged1('1');
    }

    //.19 可变更报价列表 queryModfiyOptions     订单变更，可变更报价查询，订单不存在
    public function queryModfiyOptions() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/queryModifyOptions.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderId = '100876773721';
        $data->arrivalDate = '2016-07-27';
        $data->departureDate = '2016-07-28';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        //var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test19() {
        $this->load->library('quna');
        $this->quna->queryModfiyOptions1('100876773721', '2016-12-20', '2016-12-23');
    }

    //20 可变更报价详情 queryModifyDetail    产品id无效
    public function queryModifyDetail() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/queryModifyDetail.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderId = '100870959872';
        $data->arrivalDate = '2016-12-21';
        $data->departureDate = '2016-12-22';
        $data->numberOfRooms = '1';

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        //var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test20() {
        $this->load->library('quna');
        $this->quna->queryModifyDetail1('100870959872', '2016-12-21', '2016-12-22', '1');
    }

    //.21 预变更详情 queryPreChangeDetail      不存在预变更信息
    public function queryPreChangeDetail() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/queryPreChangeDetail.json";

        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderId = '100881658099';


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        //var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test21() {
        $this->load->library('quna');
        $this->quna->queryPreChangeDetail1('100881658099');
    }

    //22 提交审核信息 submitOrderAudit
    public function submitOrderAudit() {
        $this->load->library('mypost');
        $url = "http://hdsoutlet.qunar.com/api/order/submitOrderAudit.json";

        $ary = array(
            'auditParty' => 'PARTNER',
            'auditSeq' => '1',
            'auditStatus' => 'UNMATCHED_ORDER',
            'auditTime' => '1451296800000',
            'auditRemark' => '',
            'totalPrice' => '300',
            'totalCommission' => '30',
            'totalDeduction' => '',
            'auditRooms' => array(
                'qunarRoomId' => 'Q_123456781401101123114122_1',
                'roomNo' => '201',
                'roomName' => '大床房',
                'customerName' => '张三',
                'arrivalDate' => '1451124000000',
                'departDate' => '1451210400000',
                'auditStatus' => 'CHECKED_OUT',
                'remark' => '已离店'
            ),
            array(
                'qunarRoomId' => 'Q_123456781401101123114122_2',
                'roomNo' => '202',
                'roomName' => '高级大床房',
                'customerName' => '李四',
                'arrivalDate' => '1451124000000',
                'departDate' => '1451210400000',
                'auditStatus' => 'UNMATCHED_ORDER',
                'remark' => '原单不符'
            )
        );
        //       $arr2 =  array();
        //      $arr2[0][auditParty] = 'PARTNER';
        //     $arr2[1][auditSeq] = '1';
        //     $arr2[2][auditRooms] = '1';


        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = "1397813103606";
        $head->sign = md5(md5('abcdefg' . '12345678') . '1397813103606');
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->orderNum = '91546578544';
        $data->auditRecord = $ary;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        var_dump($str);
        $data_get = $str;
        $res = $this->mypost->request_get_str($url, $data_get);
        var_dump($res);
    }

    public function test22() {
        $this->load->library('quna');

        $arr = array('orderNum' => '123456781401101123114122',
            'auditRecord' => array(
                'auditParty' => 'PARTNER',
                'auditSeq' => '1',
                'auditStatus' => 'UNMATCHED_ORDER',
                'auditTime' => '1451296800000',
                'auditRemark' => '',
                'totalPrice' => '300',
                'totalCommission' => '30',
                'totalDeduction' => '',
                'auditRooms' => array(
                    'qunarRoomId' => 'Q_123456781401101123114122_1',
                    'roomNo' => '201',
                    'roomName' => '大床房',
                    'customerName' => '张三',
                    'price' => '',
                    'commission' => '',
                    'arrivalDate' => '1451124000000',
                    '1451124000000' => '1451210400000',
                    'auditStatus' => 'CHECKED_OUT',
                    'remark' => '已离店'
                )
            )
        );


        $this->quna->submitOrderAudit1('123456781401101123114122', $arr);
    }
    public function creatorder1(){
        $this->load->library('mypost');
        $url = "https://hdsoutlet.qunar.com/api/order/createOrder.json";



        $head = new stdClass();
        $head->appKey = "12345678";
        $head->salt = time();
        $head->sign = md5(md5('abcdefg' . '12345678') . $head->salt);
        $head->version = '3.1.0';
        
        $data = new stdClass();
        $data->affiliateConfirmationId = 'hl'.time();
        $data->hotelId = '571820642';
        $data->roomTypeId ='90000141';
        $data->ratePlanId ='50000039';
        $data->arrivalDate ='2017-01-20';
        $data->departureDate ='2017-01-25';
        $data->paymentType ='Prepay';
        $data->numberOfRooms ='1';
        $data->latestArrivalTime ='2017-01-20';
        $data->currencyCode ='RMB';
        $contactname = urlencode('张三');
        $data->contact->Name = $contactname;
        $data->contact->Mobile ='13718103771';
        $data->totalCost =2500;
        $arr = array();
        
        $ordername = urlencode('李四');
        $arr[0]->Customers[0]->Name = urlencode('张三');
        
     
        
        
 
        $data->orderRooms = $arr;
        
        
        
        

        
        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        var_dump($str);
        $data_post = $str;
        $res = $this->mypost->request_post_str($url, $data_post);
        var_dump($res);
    }
    public function test23(){
        $this->load->library('quna');
        $affiliateConfirmationId = 'hl'.time();
        $hotelId = '571820642';
        $roomTypeId ='90000141';
        $ratePlanId ='50000039';
        $arrivalDate ='2017-01-20';
        $departureDate ='2017-01-25';
        $paymentType ='Prepay';
        $numberOfRooms ='1';
        $latestArrivalTime ='2017-01-20';
        $currencyCode ='RMB';
        $name = urlencode('张三');
        $mobile ='13718103771';
        $totalCost =2500;
        $arr = array();
        //$ordername = urlencode('李四');
        $arr[0]->Customers[0]->Name = $name;
        $this->quna->createOrder1($affiliateConfirmationId,$hotelId, $departureDate, $roomTypeId, $ratePlanId, $arrivalDate, $numberOfRooms,'',$latestArrivalTime,$currencyCode,'',$name,$mobile,$arr,'','','',$paymentType,$totalCost,'','','','','');
        
    }

}

?>