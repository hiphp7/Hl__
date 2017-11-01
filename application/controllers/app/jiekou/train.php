<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type:text/html;charset=utf-8");
class Train extends CI_Controller {

    public function trainList()
    {
        $this->load->library('yi19');
        date_default_timezone_set("Asia/Shanghai");

        $date = $this->input->post('date');
        $date = date('Y-m-d', strtotime($date));
        $arrStation = $this->input->post('arrStation');
        $depStation = $this->input->post('depStation');
        //$trainlist = $this->yi19->AV($date, $arrStation, $depStation);
		$trainlist = $this->yi19->AV($date, $depStation, $arrStation);

        // $trainlist = $this->yi19->AV("2016-12-04", '南京', '深圳北');
	/*	
		$myfile = "newfile.txt";
		$txt = $trainlist;
		file_put_contents($myfile, $txt, FILE_APPEND);
		$txt = "\r\n";
		file_put_contents($myfile, $txt, FILE_APPEND);
	
	*/
        $trainlist = json_decode($trainlist);

        if (!empty($trainlist)) {
            if ( $trainlist->return_code == "000" ) {
                $train_data = $trainlist->train_data;
				if($train_data != ''){					
					$list = array();
					$stationList = array();
					$stationname = array();
					foreach ($train_data as $k=> $v) {
						$l = new stdClass();
						/*G、D、C 动车*/
						$l->train_code = $v->train_code;
						$train_type =substr($v->train_code, 0, 1); // 车次类型
						if ($train_type == 'G' || $train_type == 'C') {
							$l->train_type = 0;
						} else if ($train_type == 'D') {
							$l->train_type = 1;
						} else if ($train_type == 'Z' || $train_type == 'T' || $train_type == 'K') {
							$l->train_type = 2;
						} else if ($train_type == 'L' || $train_type == 'Y') {
							$l->train_type = 30;
						} else {
							$l->train_type = 30;
						}
						$l->start_station = $v->start_station;
						$l->end_station = $v->end_station;
						$l->start_time = $v->start_time;
						$l->from_time = $v->from_time;
						$l->arrive_time = $v->arrive_time;
						$l->costtime = $this->liechetime($v->cost_time);
						$from_station = $v->from_station;
						$arrive_station = $v->arrive_station;
						if (!in_array($from_station, $stationname)) {
							$station= array();
							$station['station'] = $from_station;
							$station['chk'] = false;
							$station['type'] = true; // 出发站
							$stationList[] = $station;
							$stationname[] = $from_station;
						}
						if (!in_array($arrive_station, $stationname)) {
							$station= array();
							$station['station'] = $arrive_station;
							$station['chk'] = false;
							$station['type'] = false; // 到达站
							$stationList[] = $station;
							$stationname[] = $arrive_station;
						}
						$l->from_station = $from_station;
						$l->arrive_station = $arrive_station;
						$l->cost_time = $v->cost_time;
						if(strtotime($v->from_time) < strtotime("06:00")){
							$l->depTimeId = 0;
						}
						else if(strtotime($v->from_time) < strtotime("12:00")){
							$l->depTimeId = 1;
						} else if(strtotime($v->from_time) < strtotime("18:00")){
							$l->depTimeId = 2;
						} else {
							$l->depTimeId = 3;
						}
						$arr = array();
						if ($v->rz1 != "-") {
							$arr1 = new stdClass();
							$arr1 ->price = $v->rz1;
							$arr1 ->count = $v->rz1_num;
							if ($arr1->count == '-') {
								$arr1->count = 0;
							}
							$arr1 ->type = "rz1_num";
							$arr1 ->typeId = 2;
							$arr1 ->typeName = "一等座";
							array_push($arr, $arr1);
						}

						if ($v->rz2 != "-") {
							$arr2 = new stdClass();
							$arr2 ->price = $v->rz2;
							$arr2 ->count = $v->rz2_num;
							if ($arr2->count == '-') {
								$arr2->count = 0;
							}
							$arr2 ->type = "rz2_num";
							$arr2 ->typeId = 3;
							$arr2 ->typeName = "二等座";
							array_push($arr, $arr2);
						}

						if ($v->tdz != "-") {
							$arr3 = new stdClass();
							$arr3 ->price = $v->tdz;
							$arr3 ->count = $v->tdz_num;
							if ($arr3->count == '-') {
								$arr3->count = 0;
							}
							$arr3 ->type = "tdz_num";
							$arr3 ->typeId = 1;
							$arr3 ->typeName = "特等座";
							array_push($arr, $arr3);
						}

						if ($v->wz != "-") {
							$arr4 = new stdClass();
							$arr4 ->price = $v->wz;
							$arr4 ->count = $v->wz_num;
							if ($arr4->count == '-') {
								$arr4->count = 0;
							}
							$arr4 ->type = "wz_num";
							$arr4 ->typeId = 9;
							$arr4 ->typeName = "无座";
							array_push($arr, $arr4);
						}
						// yws 上 ywx 下 ywz 中
						if ($v->ywx != "-") {
							$arr5 = new stdClass(); // 特殊
							$arr5 ->price = $v->ywx;
							$arr5 ->count = $v->yw_num;
							if ($arr5->count == '-') {
								$arr5->count = 0;
							}
							$arr5 ->type = "yw_num";
							$arr5 ->typeId = 6;
							$arr5 ->typeName = "硬卧";
							array_push($arr, $arr5);
						}
						// gws 上 gwx 下 
						if ($v->gwx != "-") {
							$arr6 = new stdClass(); // 特殊
							$arr6 ->price = $v->gwx;
							$arr6 ->count = $v->gw_num;
							if ($arr6->count == '-') {
								$arr6->count = 0;
							}
							$arr6 ->type = "gw_num";
							$arr6 ->typeId = 4;
							$arr6 ->typeName = "高级软卧";
							array_push($arr, $arr6);
						}

						if ($v->rz != "-") {
							$arr7 = new stdClass();
							$arr7 ->price = $v->rz;
							$arr7 ->count = $v->rz_num;
							if ($arr7->count == '-') {
								$arr7->count = 0;
							}
							$arr7 ->type = "rz_num";
							$arr7 ->typeId = 7;
							$arr7 ->typeName = "软座";
							array_push($arr, $arr7);
							}

						if ($v->swz != "-") {
							$arr8 = new stdClass();
							$arr8 ->price = $v->swz;
							$arr8 ->count = $v->swz_num;
							if ($arr8->count == '-') {
								$arr8->count = 0;
							}
							$arr8 ->type = "swz_num";
							$arr8 ->typeId = 0;
							$arr8 ->typeName = "商务座";
							array_push($arr, $arr8);
						}

						if ($v->yz != "-") {
							$arr9 = new stdClass();
							$arr9 ->price = $v->yz;
							$arr9 ->count = $v->yz_num;
							if ($arr9->count == '-') {
								$arr9->count = 0;
							}
							$arr9 ->type = "yz_num";
							$arr9 ->typeId = 8;
							$arr9 ->typeName = "硬座";
							array_push($arr, $arr9);
						}
						// rwx 下 rws 上
						if ($v->rwx != "-") {
							$arr10 = new stdClass();
							$arr10 ->price = $v->rwx;
							$arr10 ->count = $v->rw_num;
							if ($arr10->count == '-') {
								$arr10->count = 0;
							}
							$arr10 ->type = "rw_num";
							$arr10 ->typeId = 5;
							$arr10 ->typeName = "软卧";
							array_push($arr, $arr10);
						}
						if(!empty($arr)){
							$lowerprice = $arr[0];
							$wuzuo = array();

							foreach ($arr as $k => $v) {
								if ($lowerprice->price >= $v->price && $v->count>0 && $v->typeId != 9) {
									$lowerprice = $arr[$k];
								}
								if ($v->typeId == 9 && $lowerprice->price >= $v->price && $v->count>0) {
									$wuzuo = $v;
								}
							}

							if (!empty($wuzuo) && $lowerprice->count <=0) {
								 $lowerprice = $wuzuo;
							}

							$l->seatList = $arr;
							$l->lowerprice = $lowerprice;
							$list[] = $l;							
						}

					}
					$data = new stdClass();
					$data->code = 0;
					$data->item = new stdClass();
					$data->item ->searchDate = $date;
					$data->item ->depStation = $depStation;
					$data->item ->arrStation = $arrStation;
					$data->item ->trainList = $list;
					$data->item ->stationList = $stationList;
					$train = json_encode($data);
					echo $train;
				}else{
					$data = new stdClass();
					$data->code = 0;
					$data->item = new stdClass();
					$data->item ->searchDate = $date;
					$data->item ->depStation = $depStation;
					$data->item ->arrStation = $arrStation;
					$data->item ->trainList = '';
					$data->item ->stationList = '';
					$train = json_encode($data);
					echo $train;
					
				}
            } elseif ($trainlist->return_code == "106") {

                $data = new stdClass();
                $data->code = 1;
                $data->item = new stdClass();
                $data->item->searchDate= $date;
                $data->item->depStation= $depStation;
                $data->item->arrStation= $arrStation;
				$data->item->trainList = new stdClass();
                $data->item->trainList->station= '';
                $data->item->stationList= array();
                $data->msg= $trainlist->message;
                $train = json_encode($data);
                echo $train;
            } else {
				echo 'fasle';
			}
        } else {
            echo 'false';
         }

    }

    public function trainstatus()
    {
        date_default_timezone_set("Asia/Shanghai");
        $this->load->library('yi19');
        $station = $this->input->post('station');
        $data = $this->yi19->querySubwayStation($station);
        echo $data;
    }
	    /**
         * 火车列车时刻差
         */
        public function liechetime($time){
            header("Content-type: text/html; charset=utf-8");   
            $time = intval($time);
            $d = floor($time/60/24);
            $time  -= $d * 60  * 24;   
            $h = floor(($time%(60*24))/60);
            $time  -= $h * 60;
            $m = floor($time%(60*24));
            $d=intval($d);
            $h=intval($h);
            if ($d == 0) {
                if ($h == 0) {
                    return  $m.'分';
                } else {
                   return  $h.'小时'.$m.'分';
                }
                
            } else {
                return $d.'天'.$h.'小时'.$m.'分';
            }
        }
		
		public function checkTicketNum() {
			$xiwei = $this->config->item('火车席位19yi');
			date_default_timezone_set("Asia/Shanghai");
			$this->load->library('yi19');
			$orderDetail = json_decode($this->input->post('orderDetail'));
			//识别座位类型
			$type = $orderDetail->seatList[0]->type;
			//出发时间
			$from_time = $orderDetail->from_time;
			//车次
			$train_code = $orderDetail->train_code;
			//出发时间
			$travel_time = date('Y-m-d', strtotime($orderDetail->search->date));///$date = date('Y-m-d', strtotime($date));
			//出发车站
			$from_station = $orderDetail->from_station;
			//到达车站
			$arrive_station = $orderDetail->arrive_station;
			$data = $this->yi19->checkTicketNum($train_code, $travel_time, $from_station, $arrive_station);
			$data = json_decode($data);			
			if($data->return_code == '000'){
				if(intval($data->$type)>0){
				   echo "余票充足";
				}else{
					echo "余票不足";
				}
			}else{
				echo "查询余票失败";
			} 
		}
	   // 支付时查询
		public function checkTicketNumzhifu() {
			date_default_timezone_set("Asia/Shanghai");
			$xiwei = $this->config->item('火车席位19yi');
			$this->load->library('yi19');
			$orderDetail = json_decode($this->input->post('orderDetail'));
			//识别座位类型
			$type = $orderDetail->seat_type;
			//出发时间
			$from_time = $orderDetail->depSortDate;
			//车次
			$train_code = $orderDetail->train_code;
			//出发时间
			$travel_time = date('Y-m-d', strtotime($orderDetail->travel_time)); ///$date = date('Y-m-d', strtotime($date));
			//出发车站
			$from_station = $orderDetail->from_station;
			//到达车站
			$arrive_station = $orderDetail->arrive_station;
			$data = $this->yi19->checkTicketNum($train_code, $travel_time, $from_station, $arrive_station);
			$data = json_decode($data);
			$xiwei_num= $xiwei[$type].'_num';
			if ($data->return_code == '000') {
				if (intval($data->$xiwei_num)>0) {
					echo "余票充足";
				} else {
					echo "余票不足";
				}
			} else {
				echo "查询余票失败";
			}
		}


    
}