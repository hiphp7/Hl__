<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 测试 51book 发送
 */
class book51_test extends CI_Controller {

    public function index() {
       $this->load->library('myalidayu');
       $this->myalidayu->Send();
    }
    
    public function test2()
    {
        $str = '1234';
        echo substr($str, 0, 2);
    }
    
    public function test1()
    {
        $this->load->library('book51');
        $this->book51->AV3('SHA', 'PEK', '2016-11-18');
    }
    
    public function xml()
    {
        $obj = new stdClass();
        $jc = $this->config->item("机场");
        $airline = $this->config->item("airline");
        
        $xml = simplexml_load_file('F:\\51book.xml');
        //var_dump($xml);
        //var_dump($flights[0]->airportTax);
        
        // 出发机场
        $obj->orgCity = $jc[strval($xml->flightItems->orgCity)]; // $xml->flightItems->orgCity;
        // 抵达城市
        $obj->dstCity = $jc[strval($xml->flightItems->dstCity)]; // $xml->flightItems->dstCity;
        
        // 基础价
        $obj->basePrice = $xml->flightItems->basePrice;
        // 日期
        $obj->date = $xml->flightItems->date;
        // 距离
        $obj->distance = $xml->flightItems->distance;
        
        /*
         * 航班信息
         */
        $flights = $xml->flightItems->flights;
        $flights_ss = array();
        $index = 0;
        foreach ($flights as $f)
        {
            $myflights = new stdClass();
            // 机场税
            $myflights->airportTax = $f->airportTax;
            // 抵达城市 航站楼
            $myflights->dstJetquay = $f->dstJetquay; // $f->dstJetquay;
            // 航班号
            $myflights->flightNo = $f->flightNo;
            
            // 获取航空公司名称
            $myflights->gs = $airline[strval(substr($f->flightNo, 0, 2))]; // substr($f->flightNo, 0, 2);
            
            // 出发城市 航站楼
            $myflights->orgJetquay = $f->orgJetquay; // $f->orgJetquay;
            // 出发时间
            $myflights->depTime = $xml->flightItems->depTime;
            // 到达时间
            $myflights->arriTime = $xml->flightItems->arriTime;
            // 时间
            $myflights->param1 = $f->param1;
            // 飞机类型
            $myflights->planeType = $f->planeType;
            // 经停
            $myflights->stopnum = $xml->flightItems->stopnum;
            
            $seatItems_ss = array();
            // 坐位
            foreach ($f->seatItems as $s);
            {
                $myseatItems = new stdClass();
                // 折扣
                $myseatItems->discount = $s->discount;
                // 票面价
                $myseatItems->parPrice = $s->parPrice;
                $myseatItems->seatCode = $s->seatCode;
                $myseatItems->seatMsg = $s->seatMsg;
                $myseatItems->seatStatus = $s->seatStatus;
                $myseatItems->seatType = $s->seatType;
                $myseatItems->settlePrice = $s->settlePrice;
                $seatItems_ss[] = $myseatItems;
            }
            $myflights->seatItems = $seatItems_ss;
            //var_dump($seatItems_ss);
            $flights_ss[] = $myflights;
            
            $index++;
            
        }
        $obj->flights = $flights_ss;
        //var_dump($obj->flights);
        /*
        echo $dstCity;
        //echo $orgCity;
        echo $jc[strval($dstCity)].' '.$jc[strval($orgCity)];
         */
        //echo $index;
        echo json_encode($obj);
    }
    
    public function AV3()
    {
        $this->load->library('book51');
        $this->book51->AV3('SHA', 'PEK', '2016-10-18');
    }


    public function getAvailableFlightWithPriceAndCommision()
    {
        $this->load->library('mypost');
        $conf = $this->config->item("conf");
        
        $url = $conf['Url51Book']."getAvailableFlightWithPriceAndCommisionServiceRestful1.0/getAvailableFlightWithPriceAndCommision";
        $post_data['agencyCode']       = $conf['Agency51Book'];
        $post_data['dstAirportCode']      = 'SHA';
        $post_data['orgAirportCode'] = 'PEK';
        
        $sign = md5($conf['Agency51Book'].'SHA'.'0010'.'PEK'.$conf['Security51Book']);
        $post_data['sign']    = $sign;
        $post_data['date']    = '2016-10-18';
        
        $post_data['onlyAvailableSeat']    = 0;
        $post_data['onlyNormalCommision']    = 0;
        $post_data['onlyOnWorkingCommision']    = 1;
        $post_data['onlySelfPNR']    = 0;
        //$post_data = array();
        $res = $this->mypost->request_post($url, $post_data);
		
        $xml = simplexml_load_string($res);
        var_dump($xml);
        
    }
	public function RC6(){
        $this->load->library('mypost');
        $conf = $this->config->item("conf");
        
        $url = $conf['Url51Book']."getModifyAndRefundStipulatesServiceRestful1.0/getModifyAndRefundStipulates";
        $post_data['agencyCode'] = $conf['Agency51Book'];
        
        $sign = md5($conf['Agency51Book'].'02000'.$conf['Security51Book']);
		$post_data['sign'] = $sign;
		$post_data['rowPerPage'] = 2000;
		$post_data['lastSeatId'] = 0;
		$post_data['lastModifiedAt'] = '2000-01-01 00:00:00';
        
		
        $res = $this->mypost->request_post($url, $post_data);
        $xml = simplexml_load_string($res);
		//return $xml;
        echo json_encode($xml);
    }
	
	public function AV4(){
		//header("Content-type:text/html;charset=utf-8");
        $this->load->library('mypost');
        $conf = $this->config->item("conf");
        
        $url = $conf['Url51Book']."getFlightInfoByFlightNoServiceRestful1.0/getFlightInfoByFlightNo";
        $post_data['agencyCode'] = $conf['Agency51Book'];
		$flightNo ="CZ3962";
		$date ="2016-12-14";
		$post_data['flightNo'] = $flightNo;
		$post_data['date'] = $date;
        
        $sign = md5($conf['Agency51Book'].$date.$flightNo.$conf['Security51Book']);
		$post_data['sign'] = $sign;

		//$post_data['seatClass'] = "Y";
		//var_dump($post_data);
        
		
        $res = $this->mypost->request_post($url, $post_data);
		var_dump($res);

        $xml = simplexml_load_string($res);
		//var_dump($res);
		//return $xml;
        echo json_encode($xml);
    }
	public function jd(){
		//header("Content-type:text/html;charset=utf-8");
        $this->load->library('mypost');
        $conf = $this->config->item("conf");
        
        $url = "http://hdsoutlet.qunar.com/api/hotel/queryHotelDetail.json";
        $post_data['hotelIds'] = "2536987";
		

		//$post_data['seatClass'] = "Y";
		//var_dump($post_data);
        
		
        $res = $this->mypost->request_post($url, $post_data);
		var_dump($res);

        //$xml = simplexml_load_string($res);
		//var_dump($res);
		//return $xml;
        //echo json_encode($xml);
    }
}











































