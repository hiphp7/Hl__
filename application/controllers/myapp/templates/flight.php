<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class flight extends CI_Controller {

    public function query() {
        $this->load->view('h5/templates/flight/query');
    }

    /**
     * 查询航班
     */
    public function myquery() {

	    $callback = $this->input->get('callback');
        // 获取参数
        $depCity = $this->input->get('depCity');
        $arrCity = $this->input->get('arrCity');
        //注：date第一次为去程时间；若有返程，点击选返程，则第二次为返程时间。
        $date = $this->input->get('date');
        $mytrip = $this->input->get('mytrip');

        $obj = new stdClass();
        $jc = $this->config->item("机场"); //城市
        $airport = $this->config->item("airport_short"); //机场
        $airline = $this->config->item("airline"); //航空公司
        // 获取数据
        $this->load->library('book51');
        $depCity_code = array_search($depCity, $jc);
        $arrCity_code = array_search($arrCity, $jc);
        $xml = $this->book51->AV3($depCity_code, $arrCity_code, $date);
        //echo json_encode($xml);
        //exit();
        //$xml = simplexml_load_file(base_url("data/51book.xml"));


        if (strval($xml->returnCode) == "S" ) {
        	$obj->orgCitysanzima = strval($xml->flightItems->orgCity);
        	$obj->dstCitysanzima = strval($xml->flightItems->dstCity);			
			// 出发城市
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
			$orgairp = array();// 出发机场
			$dstairp = array(); // 到达机场
			foreach ($flights as $f) {
				$myflights = new stdClass();
				//是否共享航班
				$myflights->codeShare = $f->codeShare;
				// 机场税
				$myflights->airportTax = $f->airportTax;
				//出发机场
				$myflights->orgAirport = $airport[strval($f->orgCity)];//
				//抵达机场
				$myflights->dstAirport = $airport[strval($f->dstCity)];//
				// 抵达城市 航站楼
				$dstJetquay = strval($f->dstJetquay);

				if ( $dstJetquay == ' ' || $dstJetquay == '--') {
					$dstJetquay = '';
					$myflights->dstJetquay = $dstJetquay; // $f->dstJetquay;
				} else {
					$myflights->dstJetquay = $f->dstJetquay; // $f->dstJetquay;
				}

				
				// 航班号
				$myflights->flightNo = $f->flightNo;
				// 航空公司英文简写
				$myflights->aircode = substr($f->flightNo, 0, 2);
				// 获取航空公司名称
				$myflights->gs = $airline[strval(substr($f->flightNo, 0, 2))]; // substr($f->flightNo, 0, 2);
				
				//出发机场
				//$myflights->orgAirport = $airport[strval($xml->flightItems->orgCity)];
				// 出发城市 航站楼
				$orgJetquay = strval($f->orgJetquay);
				if ( $orgJetquay == ' ' || $orgJetquay == '--') {
					$orgJetquay = '';
					 $myflights->orgJetquay = $orgJetquay; // $f->orgJetquay;
				} else {
					 $myflights->orgJetquay = $f->orgJetquay; // $f->orgJetquay;
				}
				$orgAirport = $myflights->orgAirport;
				$a = new stdClass();
				$a->chk = false; 
				$a->orgAirport = $orgAirport ; 
				if (!in_array($a,$orgairp)) {
					array_push($orgairp, $a);
				}

				$dstAirport = $myflights->dstAirport;
				$b = new stdClass();
				$b->chk = false; 
				$b->dstAirport = $dstAirport; 
				if (!in_array($b, $dstairp)) {
					array_push($dstairp, $b);
				}

				// 出发时间
				$myflights->depTime = date("H:i", strtotime($f->depTime));//
				// 到达时间
				$myflights->arriTime = date("H:i", strtotime($f->arriTime));//
				//时段指针
				if($myflights->depTime < "06:00")
					$myflights->depTimeId = 0;
				else if($myflights->depTime < "12:00")
					$myflights->depTimeId = 1;
				else if($myflights->depTime < "18:00")
					$myflights->depTimeId = 2;
				else $myflights->depTimeId = 3;
				// 时间
				$myflights->param1 = $f->param1;
				// 飞机类型
				$myflights->planeType = $f->planeType;
				// 经停
				$myflights->stopnum = $f->stopnum;
				// 是否筛选
				$myflights->chk = false;
				// 坐位
				$seatItems_ss = array();

				$jingji = array(); // 经济舱
				$shangwu = array(); //商务舱
				$toudeng = array(); //头等舱
				foreach ($f->seatItems as $s) {

					$discount = (array)($s->discount);
				   if($discount[0] < 1.0 && $discount[0] > 0.0){
						$s->dz = 1;
				   }

					$s->parPrice = intval(strval($s->parPrice));
					$s->settlePrice = intval(ceil((float) (strval($s->settlePrice))));

					if($s->param2 == "3" || $s->param2 == "6"){
						if($s->seatType == "3" ){
							$s->seatMsg = "经济舱";
						} else {
							$s->seatMsg = "经济舱";
						}
						$jingji[] = $s;
					}
					if($s->param2 == "2" ){
						if($s->seatType == "3"){
							$s->seatMsg = "商务舱";
						} else {
							$s->seatMsg = "商务舱";
						}
						$shangwu[] = $s;
					}
					if($s->param2 == "1"){
						if($s->seatType == "3"){
							$s->seatMsg = "头等舱";
						} else {
							$s->seatMsg = "头等舱";
						}
						$toudeng[] = $s;
					}

				}

				$myseatItems = array();
				$tehui = array();
				if(!empty($jingji)){
					if(count($jingji)>1){
						$first = array_shift($jingji);
						array_push($myseatItems, $first);
						$seatCode = (array)($first->seatCode);
						if($seatCode[0] != "Y"){
							$t = json_encode($first);
							$t = json_decode($t);
							$t->parPrice = $t->settlePrice;
							array_push($tehui, $t);
						}
						$end = array_pop($jingji);

						$seatCode = (array)($end->seatCode);
						if($seatCode[0] == "Y"){
							array_push($myseatItems, $end);
						}
					} else {
						$end = array_pop($jingji);

						$seatCode = (array)($end->seatCode);
						if($seatCode[0] == "Y"){
							array_push($myseatItems, $end);
						} else {
							array_push($myseatItems, $end);
							
							if($seatCode[0] != "Y"){
								$t = json_encode($end);
								$t = json_decode($t);
								$t->parPrice = $t->settlePrice;
								array_push($tehui, $t);
							}
						}

					}

				}

				if(!empty($shangwu)){
					$first = array_shift($shangwu);
					array_push($myseatItems, $first);

				}
				if (!empty($toudeng)) {
					$first = array_shift($toudeng);
					array_push($myseatItems, $first);
					
				}
				$myflights->seatItems = $myseatItems;
				$myflights->tehui = $tehui;

				//用于价格排序
				if (!empty($myseatItems)) {
					if(!empty($tehui)){
						$myflights->sortPrice = intval($tehui[0]->parPrice);
					} else {

						$myflights->sortPrice = intval($myseatItems[0]->parPrice);

					}

				}

				$flights_ss[] = $myflights;
			}

			$obj->flights = $flights_ss;
			$obj->returnCode = "S";
			
			$obj->orgairp = $orgairp;
			$obj->dstairp = $dstairp;

			echo json_encode($obj);
			
        } else {
            echo  json_encode($xml);
        }

        
    }

}
