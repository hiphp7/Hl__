<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 51book 接口
 */
class book51 {

    /**
     * 模拟post进行url请求
     * @param string $url
     * @param array $post_data
     */
    function request_post($url = '', $post_data = array()) {
        if (empty($url) || empty($post_data)) {
            return false;
        }
        
        $o = "";
        foreach ( $post_data as $k => $v ) 
        { 
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);

        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
    }
    
    /**
     * 航班查询（含票面价、返佣）[AV3]
     * $orgAirportCode 起飞城市三字码
     * $dstAirportCode 到达城市三字码
     * $date yyyy-MM-dd 始发日期
     */
    public function AV3($orgAirportCode, $dstAirportCode, $date, $airlineCode = '', $depTime = '',
            $direct = '', $onlyAvailableSeat = 0, $onlyNormalCommision = 1, $onlyOnWorkingCommision = 1,
            $onlySelfPNR = 0)
    {
        $CI = & get_instance();
        $conf = $CI->config->item("conf");
        
        $url = $conf['Url51Book']."getAvailableFlightWithPriceAndCommisionServiceRestful1.0/getAvailableFlightWithPriceAndCommision";
        $post_data['agencyCode']       = $conf['Agency51Book'];
        $post_data['dstAirportCode']      = $dstAirportCode;
        $post_data['orgAirportCode'] = $orgAirportCode;
        
        $sign = md5($conf['Agency51Book'].$dstAirportCode.$onlyAvailableSeat.$onlyNormalCommision.$onlyOnWorkingCommision.$onlySelfPNR.$orgAirportCode.$conf['Security51Book']);
        $post_data['sign']    = $sign;
        $post_data['date']    = $date;
        
        if($airlineCode != '')
        {
            $post_data['airlineCode']    = $airlineCode;
        }
        
        if($depTime != '')
        {
            $post_data['depTime']    = $depTime;
        }
        
        if($direct != '')
        {
            $post_data['direct']    = $direct;
        }
        
        $post_data['onlyAvailableSeat']    = $onlyAvailableSeat;
        $post_data['onlyNormalCommision']    = $onlyNormalCommision;
        $post_data['onlyOnWorkingCommision']    = $onlyOnWorkingCommision;
        $post_data['onlySelfPNR']    = $onlySelfPNR;
        //$post_data = array();
        $res = $this->request_post($url, $post_data);
        $xml = simplexml_load_string($res);
        
        //var_dump($xml);
        return $xml;
    }
    
    /**
     * 航班查询（含票面价、返佣）[AV3]
     * $orgAirportCode 起飞城市三字码
     * $dstAirportCode 到达城市三字码
     * $date yyyy-MM-dd 始发日期
     */
    public function CO1($orgAirportCode, $dstAirportCode, $date, $airlineCode = '', $depTime = '',
            $direct = '', $onlyAvailableSeat = 0, $onlyNormalCommision = 1, $onlyOnWorkingCommision = 1,
            $onlySelfPNR = 0)
    {
        $CI = & get_instance();
        $conf = $CI->config->item("conf");
        
        $url = $conf['Url51Book']."createOrderByPassengerServiceRestful1.0/createOrderByPassenger";
        $post_data['agencyCode']       = $conf['Agency51Book'];
        $post_data['dstAirportCode']      = $dstAirportCode;
        $post_data['orgAirportCode'] = $orgAirportCode;
        
        $sign = md5($conf['Agency51Book'].$dstAirportCode.$onlyAvailableSeat.$onlyNormalCommision.$onlyOnWorkingCommision.$onlySelfPNR.$orgAirportCode.$conf['Security51Book']);
        $post_data['sign']    = $sign;
        $post_data['date']    = $date;
        
        if($airlineCode != '')
        {
            $post_data['airlineCode']    = $airlineCode;
        }
        
        if($depTime != '')
        {
            $post_data['depTime']    = $depTime;
        }
        
        if($direct != '')
        {
            $post_data['direct']    = $direct;
        }
        
        $post_data['onlyAvailableSeat']    = $onlyAvailableSeat;
        $post_data['onlyNormalCommision']    = $onlyNormalCommision;
        $post_data['onlyOnWorkingCommision']    = $onlyOnWorkingCommision;
        $post_data['onlySelfPNR']    = $onlySelfPNR;
        //$post_data = array();
        $res = $this->request_post($url, $post_data);
        $xml = simplexml_load_string($res);
        var_dump($xml);
    }
	
	/**
	 *
     * 获取所有退改签规定[RC6]
	 *
     */
	public function RC6(){
		$CI = & get_instance();
        $conf = $CI->config->item("conf");
        $url = $conf['Url51Book']."getModifyAndRefundStipulatesServiceRestful1.0/getModifyAndRefundStipulates";
        $post_data['agencyCode'] = $conf['Agency51Book'];
        
        $sign = md5($conf['Agency51Book'].'02000'.$conf['Security51Book']);//
		$post_data['sign'] = $sign;
		$post_data['rowPerPage'] = 2000;
		$post_data['lastSeatId'] = 0;
		$post_data['lastModifiedAt'] = '2000-01-01 00:00:00';
        
        $res = $this->request_post($url, $post_data);
        $xml = simplexml_load_string($res);
		return $xml;
        //json_encode($xml);
    }
      /**
         *
         * 获取退改签规定[RC5]
         *
         */
        public function RC5($airlineCode ,$arrCode ,$classCode ,$depCode , $depDate){
            $CI = & get_instance();
            $conf = $CI->config->item("conf");
            
            $url = $conf['Url51Book'] . "getModifyAndRefundStipulateServiceRestful1.0/getModifyAndRefundStipulate";
            $post_data['agencyCode'] = $conf['Agency51Book'];
            $sign = md5($conf['Agency51Book'] . $airlineCode . $arrCode . $classCode . $depCode . $depDate . $conf['Security51Book']);
            $post_data['sign'] = $sign;
            $post_data['depDate'] = $depDate;
            $post_data['airlineCode'] = $airlineCode;
            $post_data['classCode'] = $classCode;
            $post_data['depCode'] = $depCode;
            $post_data['arrCode'] = $arrCode;       
            $res = $this->request_post($url, $post_data);
            $xml = simplexml_load_string($res);
            return $xml;
            //json_encode($xml);
        }	
    
}