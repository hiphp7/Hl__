<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * quna 接口
 */
class quna {

    function request_get_str($url = '', $data_get = '') {
        if (empty($url) || empty($data_get)) {
            return false;
        }

        $header = array('Content-Type: application/json');

        $getUrl = $url . '?' . "reqData=" . $data_get;
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $getUrl); //抓取指定网页
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        //curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch); //运行curl
        curl_close($ch);

        return $data;
    }

    /**
     * 模拟post进行url请求
     * @param string $url
     * @param array $post_data
     */
    function request_post_str($url = '', $data_post = '') {
        $header = array('Content-Type:application/json');
        $postUrl = $url . '?' . "reqData=" . $data_post;
        $ch = curl_init($url); //初始化curl
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);    //https 加这两句      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页   
        //curl_setopt($ch, CURLOPT_HEADER, 0);//设置header    
        $data = curl_exec($ch); //运行curl     
        return $data;
    }

    /**
     * 1、酒店列表
      $updataTime 修改时间
      $havePrice 是否要求有在线报价
     */
    public function queryHotelList($updataTime = '', $havePrice = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryHotelList.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        if ($updataTime != '') {
            $data->updataTime = $updataTime;
        }
        if ($havePrice != '') {
            $data->havePrice = $havePrice;
        }
        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 2、酒店详情列表
      $hotelId  酒店编号
      $detail  酒店详情
      $rooms  物理房型集合
     */
    public function queryHotelDetail($hotelIds, $isNeedImage = '', $isNeedRooms = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryHotelDetail.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->hotelIds = $hotelIds;
        if ($isNeedImage != '') {
            $data->isNeedImage = $isNeedImage;
        }
        if ($isNeedRooms != '') {
            $data->isNeedRooms = $isNeedRooms;
        }

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 3、酒店增量
      $maxId  每次请求最大的id
      $changeType  变更类型

     */
    public function queryHotelIncrement($maxId, $changeType = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryHotelIncrement.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        if ($changeType != '') {
            $data->changeType = $changeType;
        }
        $data->maxId = $maxId;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 4、创建酒店聚合任务接口
      $clusterHotelInfos  聚合的酒店列表


     */
    public function submitClusterHotels($clusterHotelInfos) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "cluster/submitClusterHotels.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->clusterHotelInfos = $clusterHotelInfos;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 5、根据酒店id查询聚合酒店 
      $hotelIds 分销商酒店编号


     */
    public function fetchClusterByIds($hotelIds) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "cluster/fetchClusterByIds.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->hotelIds = $hotelIds;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 6、城市接口



     */
    public function queryCity() {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "city/queryCity.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $obj = new stdClass();
        $obj->head = $head;


        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 7、酒店品牌数据



     */
    public function queryBrand() {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "brand/queryBrand.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $obj = new stdClass();
        $obj->head = $head;


        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 8、房型报价接口



     */
    public function queryRatePlan($arrivalDate, $departureDate, $hotelIds, $roomTypeId = '', $ratePlanId = '', $isSkipHdsCondition = '', $roomNum = '', $latestArrivalTime = '', $occupancyInfos = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryRatePlan.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        if ($roomTypeId != '') {
            $data->roomTypeId = $roomTypeId;
        }
        if ($ratePlanId != '') {
            $data->ratePlanId = $ratePlanId;
        }
        if ($isSkipHdsCondition != '') {
            $data->isSkipHdsCondition = $isSkipHdsCondition;
        }
        if ($roomNum != '') {
            $data->roomNum = $roomNum;
        }
        if ($latestArrivalTime != '') {
            $data->latestArrivalTime = $latestArrivalTime;
        }
        if ($occupancyInfos != '') {
            $data->occupancyInfos = $occupancyInfos;
        }
        $data->arrivalDate = $arrivalDate;
        $data->departureDate = $departureDate;
        $data->hotelIds = $hotelIds;


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 9、房型聚合接口



     */
    public function clusterRooms($hotelId, $ratePlans) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "cluster/clusterRooms.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->hotelId = $hotelId;
        $data->ratePlans = $ratePlans;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 10、获取变价酒店



     */
    public function queryChangedPrice($updateTime = '', $maxChangeId = '', $needChangeDetail = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "hotel/queryChangedPrice.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        if ($updateTime != '') {
            $data->updateTime = $updateTime;
        }
        if ($maxChangeId != '') {
            $data->maxChangeId = $maxChangeId;
        }
        if ($needChangeDetail != '') {
            $data->needChangeDetail = $needChangeDetail;
        }

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;

        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    /**
     * 11、下单前可订检查接口



     */
    public function validateOrder($arrivalDate, $departureDate, $latestArrivalTime, $hotelId, $ratePlanId, $totalPrice, $numberOfRooms) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/validateOrder.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->arrivalDate = $arrivalDate;
        $data->departureDate = $departureDate;
        $data->latestArrivalTime = $latestArrivalTime;
        $data->hotelId = $hotelId;
        $data->ratePlanId = $ratePlanId;
        $data->totalPrice = $totalPrice;
        $data->numberOfRooms = $numberOfRooms;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;

        $str = json_encode($obj);
        $data_get = $str;
        //var_dump($data_get);
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    // 12、创建订单
    public function createOrder1($affiliateConfirmationId, $hotelId, $departureDate, $roomTypeId, $ratePlanId, $arrivalDate, $numberOfRooms, $numberOfCustomers = '', $latestArrivalTime, $currencyCode, $noteToHotel = '', $name,$mobile, $orderRooms, $groupBuyFlag = '', $needGuarantee = '', $guaranteePrice = '', $paymentType, $totalCost = '', $totalSalePrice = '', $forceGuarantee = '', $customerType = '', $paid = '', $distributorSalePrice = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = "https://hdspci.qunar.com/api/order/createOrder.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        if ($numberOfRooms != '') {
            $data->numberOfRooms = $numberOfRooms;
        }
        if ($noteToHotel != '') {
            $data->noteToHotel = $noteToHotel;
        }

        if ($noteToHotel != '') {
            $data->noteToHotel = $noteToHotel;
        }

        if ($groupBuyFlag != '') {
            $data->groupBuyFlag = $groupBuyFlag;
        }

        if ($needGuarantee != '') {
            $data->needGuarantee = $needGuarantee;
        }

        if ($guaranteePrice != '') {
            $data->guaranteePrice = $guaranteePrice;
        }

        if ($totalCost != '') {
            $data->totalCost = $totalCost;
        }

        if ($totalSalePrice != '') {
            $data->totalSalePrice = $totalSalePrice;
        }

        if ($forceGuarantee != '') {
            $data->forceGuarantee = $forceGuarantee;
        }

        if ($customerType != '') {
            $data->customerType = $customerType;
        }

        if ($paid != '') {
            $data->paid = $paid;
        }

        if ($distributorSalePrice != '') {
            $data->distributorSalePrice = $distributorSalePrice;
        }
        $data->affiliateConfirmationId = $affiliateConfirmationId;
        $data->hotelId = $hotelId;
        $data->departureDate = $departureDate;
        $data->roomTypeId = $roomTypeId;
        $data->ratePlanId = $ratePlanId;
        $data->arrivalDate = $arrivalDate;
        $data->numberOfCustomers = $numberOfCustomers;
        $data->latestArrivalTime = $latestArrivalTime;
        $data->currencyCode = $currencyCode;
		$data->contact = new stdClass();
        $data->contact->name = $name;
        $data->contact->mobile = $mobile;
        $data->orderRooms = $orderRooms;
        $data->paymentType = $paymentType;
     

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_post = $str;
        //var_dump($str);
        $res = $this->request_post_str($url, $data_post);
        //var_dump($res);
        return $res;
    }

    //13 post订单支付或担保接口 payOrder   ok
    public function payOrder1($orderId, $payAmount) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = "https://hdspci.qunar.com/api/order/payOrder.json;";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->orderId = $orderId;
        $data->payAmount = $payAmount;

		$obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_post = $str;
        //var_dump($data_post);
        $res = $this->request_post_str($url, $data_post);
        return $res;
    }

    //14.取消订单      ok
    public function cancelOrder1($orderId) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/cancelOrder.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->orderId = $orderId;
        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        //var_dump($str);
        $res = $this->request_get_str($url, $data_get);
        //var_dump($res);
        return $res;
    }

    //15 查询订单详情 queryOrderDetail    ok
    public function queryOrderDetail2($orderId, $affiliateConfirmationId = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/queryOrderDetail.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->orderId = $orderId;
        if ($affiliateConfirmationId != '') {
            $data->affiliateConfirmationId = $affiliateConfirmationId;
        }

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    //16 订单变更 modifyOrder    ---post 
    public function modifyOrder1($orderId, $hotelId, $roomTypeId, $ratePlanId, $isDrrSale = '', $nightlyRates = '', $arrivalDate, $departureDate, $latestArrivalTime = '', $numberOfRooms, $customers, $noteToHotel = '', $contact, $currencyCode, $totalCost = '', $totalSalePrice = '', $additionalPayment = '', $refundPayment = '', $distributorSalePrice = '', $preChangeToken = '') {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/modifyOrder.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        if ($isDrrSale != '') {
            $data->currencyCode = $currencyCode;
        }
        if ($nightlyRates != '') {
            $data->nightlyRates = $nightlyRates;
        }

        if ($latestArrivalTime != '') {
            $data->latestArrivalTime = $latestArrivalTime;
        }
        if ($noteToHotel != '') {
            $data->noteToHotel = $noteToHotel;
        }
        if ($totalCost != '') {
            $data->totalCost = $totalCost;
        }
        if ($totalSalePrice != '') {
            $data->totalSalePrice = $totalSalePrice;
        }
        if ($additionalPayment != '') {
            $data->additionalPayment = $additionalPayment;
        }
        if ($refundPayment != '') {
            $data->refundPayment = $refundPayment;
        }
        if ($distributorSalePrice != '') {
            $data->distributorSalePrice = $distributorSalePrice;
        }
        if ($preChangeToken != '') {
            $data->preChangeToken = $preChangeToken;
        }
        $data->orderId = $orderId;
        $data->hotelId = $hotelId;
        $data->ratePlanId = $ratePlanId;
        $data->arrivalDate = $arrivalDate;
        $data->numberOfRooms = $numberOfRooms;
        $data->customers = $customers;
        $data->contact = $contact;
        $data->currencyCode = $currencyCode;

        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_post = $str;
        $res = $this->request_post_str($url, $data_post);
        return $res;
    }

    //17 按时间获取订单同步ID queryChangedByDate
    public function queryChangedByDate1($lastTime) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "queryChangedByDate.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->lastTime = $lastTime;


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    //18 订单增量接口 queryChanged  
    public function queryChanged1($lastId) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/queryChanged.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->lastId = $lastId;


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    //.19 可变更报价列表 queryModfiyOptions   
    public function queryModfiyOptions1($lastId, $arrivalDate, $departureDate) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/queryModifyOptions.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->lastId = $lastId;
        $data->arrivalDate = $arrivalDate;
        $data->departureDate = $departureDate;


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    //.20可变更报价详情 queryModifyDetail
    public function queryModifyDetail1($orderId, $arrivalDate, $departureDate, $numberOfRooms) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/queryModifyDetail.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->orderId = $orderId;
        $data->arrivalDate = $arrivalDate;
        $data->departureDate = $departureDate;
        $data->numberOfRooms = $numberOfRooms;


        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    //.21 预变更详情 queryPreChangeDetail  不存在预变更信息
    public function queryPreChangeDetail1($orderId) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/queryPreChangeDetail.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->orderId = $orderId;



        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

    //.22 提交审核信息 submitOrderAudit
    public function submitOrderAudit1($orderId, $auditRecord) {
        $CI = & get_instance();
        $conf = $CI->config->item("去哪儿");
        $url = $conf['Urlquna'] . "order/submitOrderAudit.json";
        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = time();
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $head->salt);
        $head->version = $conf['version'];

        $data = new stdClass();
        $data->orderId = $orderId;
        $data->auditRecord = $auditRecord;



        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        $str = json_encode($obj);
        $data_get = $str;
        $res = $this->request_get_str($url, $data_get);
        return $res;
    }

}
