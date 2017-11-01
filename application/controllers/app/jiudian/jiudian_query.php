<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jiudian_query extends CI_Controller {

    public function hotels() {
        $this->load->view('h5/jiudian/templates/jiudian_query/hotels');
    }

    public function hotelDetail() {
        $this->load->view('h5/jiudian/templates/jiudian_query/hotelDetail');
    }

	/*
	* 过滤所有的空白字符,包括空格、全角空格、换行等
	*/
	public function myTrim($str)
	{
	 $search = array(" ","　","\n","\r","\t");
	 $replace = array("","","","","");
	 return str_replace($search, $replace, $str);
	}

	
	public function hotelSearch() {
        date_default_timezone_set("Asia/Shanghai");
        $this->db->trans_begin();
        $cityName = $this->input->post('cityName')."市";
		//微信定位
		$position_name = $this->input->post('position_name');
        //分页
        $offset = $this->input->post('offset') + 1;
        $searchBox = $this->input->post('searchBox');
        $starSelect = $this->input->post('starSelect');
        $priceSelect = $this->input->post('priceSelect');
        if(empty($searchBox)){
			if(strpos($position_name, $cityName) !== false && !empty($position_name)){
				$searchBox = $position_name;
			}else{
				$searchBox = $cityName;
			}
            
        }else{
            $searchBox = $cityName.$searchBox;
        }
        if (empty($starSelect)) {
            $starSelect = -1;
        }
        //价格区间搜索
        if (!empty($priceSelect)) {
            $arraylist = explode("~", $priceSelect);
            $value1 = intval($arraylist[0]);
            $value2 = $arraylist[1];
            //“600~不限”的情况
            if (!is_numeric($value2)) {
                $value2 = 10000;
            }
        } else {
            $value1 = 0;
            $value2 = 0;
        }

        $this->load->library('javageo');
        //地点、星级（-1为不限）、价格1（0为不限）、价格2（0为不限）、多少米内、分页、返回数据数量
        
		//$searchBox = "深圳市";
		//$offset = 1;
        $rows_jiudianxiangqingliebiao = $this->javageo->Find($searchBox, $starSelect, $value1, $value2, 50000, $offset, 10);
		//echo $rows_jiudianxiangqingliebiao[0];
		//exit();
		//var_dump($rows_jiudianxiangqingliebiao);
		//var_dump($rows_jiudianxiangqingliebiao[0]);
		//$str = $rows_jiudianxiangqingliebiao[0];
		//$str = self::myTrim($str);
		//$str1=json_decode($str);
		//var_dump($str1);
	    //var_dump($str1->hotelId);
		//echo $errorinfo = json_last_error();
		//exit();
        $obj = new stdClass();
        $jiudianxiangqingliebiao_ss = array();
        $district_ss = array();
        $district_ob = array();
        //酒店的物理房型
        if (!empty($rows_jiudianxiangqingliebiao)) {
            for ($i = 0; $i < count($rows_jiudianxiangqingliebiao); $i++) {
				//过滤掉空格、全角空格、换行等
				$rows_jiudianxiangqingliebiao[$i] = self::myTrim($rows_jiudianxiangqingliebiao[$i]);
                $rows_jiudianxiangqingliebiao[$i] = json_decode($rows_jiudianxiangqingliebiao[$i]);
				//var_dump($rows_jiudianxiangqingliebiao[$i]->hotelId);
				//exit();
                $myjiudianxiangqingliebiao = new stdClass();
                //酒店id
                $myjiudianxiangqingliebiao->hotelId = $rows_jiudianxiangqingliebiao[$i]->hotelId;
                //价格
                $myjiudianxiangqingliebiao->hotelPrice = intval(ceil($rows_jiudianxiangqingliebiao[$i]->hotelPrice * 1.05));
                //酒店名称
                $myjiudianxiangqingliebiao->name = $rows_jiudianxiangqingliebiao[$i]->name;
                //酒店地址
                $myjiudianxiangqingliebiao->address = $rows_jiudianxiangqingliebiao[$i]->address;
                //去哪儿推荐星级（档次）
                $myjiudianxiangqingliebiao->category = $rows_jiudianxiangqingliebiao[$i]->category;
                //酒店城市编码
                $myjiudianxiangqingliebiao->city = $rows_jiudianxiangqingliebiao[$i]->city;

                //行政区
                $myjiudianxiangqingliebiao->district = $rows_jiudianxiangqingliebiao[$i]->district;
                $district = $myjiudianxiangqingliebiao->district;
                if (!in_array($district, $district_ss)) {
                    $district_ss[] = $district;
                    $mydistrict = new stdClass();
                    $mydistrict->district = $district;
                    $mydistrict->chk = false;
                    $district_ob[] = $mydistrict;
                }

                //描述
                $myjiudianxiangqingliebiao->description = $rows_jiudianxiangqingliebiao[$i]->description;
                //服务设施
                $myjiudianxiangqingliebiao->generalAmenities = $rows_jiudianxiangqingliebiao[$i]->generalAmenities;
                //房间设施
                $myjiudianxiangqingliebiao->roomAmenities = $rows_jiudianxiangqingliebiao[$i]->roomAmenities;
                //酒店头图地址
                $myjiudianxiangqingliebiao->thumbnailId = $rows_jiudianxiangqingliebiao[$i]->thumbnailId;
                //酒店评分
                $myjiudianxiangqingliebiao->commentScore = $rows_jiudianxiangqingliebiao[$i]->commentScore;
				//距离
				$myjiudianxiangqingliebiao->distance = $rows_jiudianxiangqingliebiao[$i]->distance;
                $jiudianxiangqingliebiao_ss[] = $myjiudianxiangqingliebiao;
            }
            //}
        }
        $obj->jiudianxiangqings = $jiudianxiangqingliebiao_ss;
        $obj->districts = $district_ob;
        $obj->offset = $offset;
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'false';
        } else {
            $this->db->trans_commit();
            echo json_encode($obj);
        }
    }

	
	//酒店列表数据
    public function hotelList() {
        date_default_timezone_set("Asia/Shanghai");
        $cityCode = $this->input->post('cityCode');
        $maxNumbel = $this->input->post('maxNumbel');
        $offset = $this->input->post('offset');
        //$jiudianming = $this->input->post('jiudianming');
        $starSelect = $this->input->post('starSelect');
        $priceSelect = $this->input->post('priceSelect');
        
//        $cityCode = "beijing_city";
//        $maxNumbel = 8;
//        $offset = 0;
//        $priceSelect = "400~600";
        
        $obj = new stdClass();
        $this->db->trans_begin();

        $jiudianxiangqingliebiao_ss = array();
        $district_ss = array();
        $district_ob = array();
        //判断符合条件的数据，长度是否为8
        while (count($jiudianxiangqingliebiao_ss) < 8) {
            //查jiudian_jiudianxiangqingliebiao表
            $sql_jiudianxiangqingliebiao = 'select m.id as id,
m.hotelId as hotelId,
m.name as name,
m.address as address,
m.category as category,
m.city as city,
m.baiduLat as baiduLat,
m.baiduLon as baiduLon,
m.district as district,
m.description as description,
m.generalAmenities as generalAmenities,
m.roomAmenities as roomAmenities,
m.thumbnailId as thumbnailId,
m.commentScore as commentScore from jiudian_jiudianxiangqingliebiao as m where m.city = ?';
            $jdlb_arr = array();
            $jdlb_arr[] = $cityCode;

            if (!empty($starSelect)) {
				//星级筛选
                $sql_jiudianxiangqingliebiao = $sql_jiudianxiangqingliebiao . ' and m.category = ?';
                $jdlb_arr[] = $starSelect;
            }

            $sql_jiudianxiangqingliebiao = $sql_jiudianxiangqingliebiao . ' LIMIT ' . $maxNumbel . ' OFFSET ' . $offset;
//        echo $sql_jiudianxiangqingliebiao;
//        exit();
            $res_jiudianxiangqingliebiao = $this->db->query($sql_jiudianxiangqingliebiao, $jdlb_arr);
            $rows_jiudianxiangqingliebiao = $res_jiudianxiangqingliebiao->result();
            //var_dump($rows_jiudianxiangqingliebiao);
//        echo count($rows_jiudianxiangqingliebiao);
//        exit();
            //查jiudian_rooms表，查找酒店的物理房型
            if (!empty($rows_jiudianxiangqingliebiao)) {
                for ($i = 0; $i < count($rows_jiudianxiangqingliebiao); $i++) {
                    $myjiudianxiangqingliebiao = new stdClass();

                    $salePrice_ss = array();
                    $sql_rooms = 'select m.roomTypeId as roomTypeId from jiudian_fangxing as m where m.jiudianbianma = ?';
                    $res_rooms = $this->db->query($sql_rooms, $rows_jiudianxiangqingliebiao[$i]->hotelId);
                    $rows_rooms = $res_rooms->result();
                    //var_dump($rows_rooms);
                    //查jiudian_chanpinxinxi表，查找酒店房型的产品
                    if (!empty($rows_rooms)) {
                        foreach ($rows_rooms as $room) {
                            //echo $room->roomTypeId;
                            $sql_chanpinxinxi = 'select m.id as id,m.ratePlanId as ratePlanId,m.paymentType as paymentType from jiudian_chanpinxinxi as m where m.roomTypeId = ?';
                            $res_chanpinxinxi = $this->db->query($sql_chanpinxinxi, $room->roomTypeId);
                            $rows_chanpinxinxi = $res_chanpinxinxi->result();
                            //var_dump($rows_chanpinxinxi);
                            //echo json_encode($rows_chanpinxinxi);
                            //查jiudian_jianyejiage表，查找酒店房型产品的价格
                            if (!empty($rows_chanpinxinxi)) {
                                foreach ($rows_chanpinxinxi as $cpxx) {
                                    //判断付款类型是否是预付
                                    if ($cpxx->paymentType == 'Prepay') {
                                        $sql_jianyejiage = 'select m.cost as cost,m.status as status from jiudian_jianyejiage as m where m.chanpinxinxiid = ? LIMIT 1 OFFSET 0';
                                        $res_jianyejiage = $this->db->query($sql_jianyejiage, $cpxx->id);
                                        $rows_jianyejiage = $res_jianyejiage->result();
                                        //判断是否可售卖，不可售卖则跳过该产品
                                        if ($rows_jianyejiage[0]->status == false || $rows_jianyejiage[0]->status == "0") {
                                            continue;
                                        }
                                        if (!empty($rows_jianyejiage)) {
                                            $salePrice_ss[] = intval(ceil($rows_jianyejiage[0]->cost * 1.05));
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if (!empty($salePrice_ss)) {
                        //价格升序排序
                        sort($salePrice_ss);
                        //价格区间搜索
                        if (!empty($priceSelect)) {
                            $arraylist = explode("~", $priceSelect);
                            $value1 = intval($arraylist[0]);
                            $value2 = $arraylist[1];
                            //“600~不限”的情况
                            if (!is_numeric($value2)) {
                                if (intval($salePrice_ss[0]) < $value1) {
                                    continue;
                                }
                            } else {
                                if (intval($salePrice_ss[0]) < $value1 || intval($salePrice_ss[0]) > intval($value2)) {
                                    continue;
                                }
                            }
                        }
                        $myjiudianxiangqingliebiao->hotelPrice = $salePrice_ss[0];
                    } else {
                        continue;
                    }
                    //酒店id
                    $myjiudianxiangqingliebiao->hotelId = $rows_jiudianxiangqingliebiao[$i]->hotelId;
                    //酒店名称
                    $myjiudianxiangqingliebiao->name = $rows_jiudianxiangqingliebiao[$i]->name;
                    //酒店地址
                    $myjiudianxiangqingliebiao->address = $rows_jiudianxiangqingliebiao[$i]->address;
                    //去哪儿推荐星级（档次）
                    $myjiudianxiangqingliebiao->category = $rows_jiudianxiangqingliebiao[$i]->category;
                    //酒店城市编码
                    $myjiudianxiangqingliebiao->city = $rows_jiudianxiangqingliebiao[$i]->city;
                    //行政区
                    $myjiudianxiangqingliebiao->district = $rows_jiudianxiangqingliebiao[$i]->district;
                    $district = $myjiudianxiangqingliebiao->district;
                    if (!in_array($district, $district_ss)) {
                        $district_ss[] = $district;
                        $mydistrict = new stdClass();
                        $mydistrict->district = $district;
                        $mydistrict->chk = false;
                        $district_ob[] = $mydistrict;
                    }

                    //描述
                    $myjiudianxiangqingliebiao->description = $rows_jiudianxiangqingliebiao[$i]->description;
                    //服务设施
                    $myjiudianxiangqingliebiao->generalAmenities = $rows_jiudianxiangqingliebiao[$i]->generalAmenities;
                    //房间设施
                    $myjiudianxiangqingliebiao->roomAmenities = $rows_jiudianxiangqingliebiao[$i]->roomAmenities;
                    //酒店头图地址
                    $myjiudianxiangqingliebiao->thumbnailId = $rows_jiudianxiangqingliebiao[$i]->thumbnailId;
                    //酒店评分
                    $myjiudianxiangqingliebiao->commentScore = $rows_jiudianxiangqingliebiao[$i]->commentScore;

                    //酒店详情展示图
                    $sql_jiudian_images = 'select m.id as id from jiudian_images as m where m.hotelId = ? LIMIT 1 OFFSET 0';
                    //通过酒店详情自增id查询
                    $res_jiudian_images = $this->db->query($sql_jiudian_images, $rows_jiudianxiangqingliebiao[$i]->hotelId);
                    $rows_jiudian_images = $res_jiudian_images->result();
                    if (!empty($rows_jiudian_images)) {
                        $image_ss = array();
                        foreach ($rows_jiudian_images as $image) {

                            $myimage = new stdClass();
                            //图片地址
                            $sql_jiudian_locations = 'select m.id as id,
m.value as value from jiudian_locations as m where m.imageid = ? LIMIT 1 OFFSET 0';
                            //通过images自增id查询
                            $res_jiudian_locations = $this->db->query($sql_jiudian_locations, $image->id);
                            $rows_jiudian_locations = $res_jiudian_locations->result();
                            if (!empty($rows_jiudian_locations)) {
                                $myimage->location = $rows_jiudian_locations[0]->value;
                            }
                            $image_ss[] = $myimage;
                        }
                        $myjiudianxiangqingliebiao->images = $image_ss;
                    }
                    $jiudianxiangqingliebiao_ss[] = $myjiudianxiangqingliebiao;
                }
            }
			//偏移量
            $offset += 8;
            if (count($rows_jiudianxiangqingliebiao) < 8) {
                break;
            }
        }
        $obj->jiudianxiangqings = $jiudianxiangqingliebiao_ss;
        $obj->districts = $district_ob;
        $obj->offset = $offset;
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'false';
        } else {
            $this->db->trans_commit();
            echo json_encode($obj);
        }
    }

	
    //获取酒店详情数据
    public function hotelDetailList() {
        date_default_timezone_set("Asia/Shanghai");
        $hotelId = $this->input->post('hotelId');
        $ruzhuDate = $this->input->post('ruzhuDate');
        $lidianDate = $this->input->post('lidianDate');
		//$ruzhuDate = '2017-02-26';
        //$lidianDate = '2017-02-27';
		//$hotelId = '573331037';
        $this->load->library('quna');
        //房型报价接口
        $queryFangXingBaoJia = $this->quna->queryRatePlan($ruzhuDate, $lidianDate, $hotelId, '', '', '', '', '', '');
        $queryFangXingBaoJia = json_decode($queryFangXingBaoJia);
        //酒店详情接口，取展示图
        $queryHotelDetail = $this->quna->queryHotelDetail($hotelId, true, false);
        $queryHotelDetail = json_decode($queryHotelDetail);
        $obj = new stdClass();
        //展示图
        if ($queryHotelDetail->code == 0) {
            if (!empty($queryHotelDetail->result->hotelDetail[0]->detail->images)) {
                $images = $queryHotelDetail->result->hotelDetail[0]->detail->images;
                $image_ss = array();
                foreach ($images as $image) {
                    $myimage = new stdClass();
                    //图片地址
                    $myimage->location = $image->locations[0]->value;
                    $image_ss[] = $myimage;
                }
                $obj->images = $image_ss;
            }
        }
        //房型
        if ($queryFangXingBaoJia->code == 0) {
            $FangXingBaoJia = $queryFangXingBaoJia->result->hotels[0];
            if (!empty($FangXingBaoJia->rooms)) {
                $room_ss = array();
                foreach ($FangXingBaoJia->rooms as $room) {
                    $myroom = new stdClass();
                    //备注
                    if (!empty($room->description)) {
                        $myroom->description = $room->description;
                    }
                    //图片地址
                    if (!empty($room->imageUrl)) {
                        $myroom->imageUrl = $room->imageUrl;
                    }
                    //楼层
                    if (!empty($room->floor)) {
                        $myroom->floor = $room->floor;
                    }
                    //房型编码
                    if (!empty($room->roomTypeId)) {
                        $myroom->roomTypeId = $room->roomTypeId;
                    }
                    //房型名称
                    if (!empty($room->name)) {
                        $myroom->name = $room->name;
                    }
                    //房间特色
                    if (!empty($room->highlights)) {
                        $myroom->highlights = $room->highlights;
                    }
                    //产品信息集
                    if (!empty($room->ratePlans)) {
                        $chanpinxinxi_ss = array();
                        //$compare = 0;
                        foreach ($room->ratePlans as $ratePlan) {
							//判断是否可售卖，不可售卖则跳过该产品
							if($ratePlan->status == false){
								continue;
							}
                            //判断付款类型是否是预付
                            if ($ratePlan->paymentType == 'Prepay') {
                                $mychanpinxinxi = new stdClass();
                                //产品编号
                                if (!empty($ratePlan->ratePlanId)) {
                                    $mychanpinxinxi->ratePlanId = $ratePlan->ratePlanId;
                                }
                                //产品名称
                                if (!empty($ratePlan->productName)) {
                                    $mychanpinxinxi->productName = $ratePlan->productName;
                                }
                                //产品房型名称，注：productRoomName+ productName 组成完整的产品名称
                                if (!empty($ratePlan->productRoomName)) {
                                    $mychanpinxinxi->productRoomName = $ratePlan->productRoomName;
                                }
                                //付款类型：现付和预付
                                if (!empty($ratePlan->paymentType)) {
                                    $mychanpinxinxi->paymentType = $ratePlan->paymentType;
                                }
                                //货币 RMB人民币 HKD港币 MOP澳门币 USD美币 SGD新加坡币。当前均为RMB
                                if (!empty($ratePlan->currencyCode)) {
                                    $mychanpinxinxi->currencyCode = $ratePlan->currencyCode;
                                }
                                //wifi
                                if (!empty($ratePlan->wifi)) {
                                    $mychanpinxinxi->wifi = $ratePlan->wifi;
                                }
                                //床型:BIG-大床；DOUBLE-双床；BIG_DOUBLE-大/双床；OTHER-其他
                                if (!empty($ratePlan->bedType)) {
                                    if ($ratePlan->bedType == 'BIG') {
                                        $mychanpinxinxi->bedType = '大床';
                                    } else if ($ratePlan->bedType == 'DOUBLE') {
                                        $mychanpinxinxi->bedType = '双床';
                                    } else if ($ratePlan->bedType == 'BIG_DOUBLE') {
                                        $mychanpinxinxi->bedType = '大/双床';
                                    } else if ($ratePlan->bedType == 'OTHER') {
                                        $mychanpinxinxi->bedType = '其他';
                                    }
                                }
                                //宽带
                                if (!empty($ratePlan->broadnet)) {
                                    $mychanpinxinxi->broadnet = $ratePlan->broadnet;
                                }
                                //窗户
                                if (!empty($ratePlan->window)) {
                                    $mychanpinxinxi->window = $ratePlan->window;
                                }
                                //间夜价格
                                if (!empty($ratePlan->nightlyRates)) {
                                    $jianyejiage_ss = array();
                                    foreach ($ratePlan->nightlyRates as $jyjg) {
										$myjianyejiage = new stdClass();
										//当天日期
										if (!empty($jyjg->date)) {
											$myjianyejiage->date = date('Y-m-d',$jyjg->date/1000);
										}
										//底价
										if (!empty($jyjg->cost)) {
											$myjianyejiage->cost = $jyjg->cost;
											$myjianyejiage->tehuiPrice = ceil($jyjg->cost * 1.05);
											$myjianyejiage->zunxiangPrice = ceil($jyjg->cost * 1.08);
										}
										//卖价
										if (!empty($jyjg->salePrice)) {
											$myjianyejiage->salePrice = $jyjg->salePrice;
										}
										//市场网络参考价
										if (!empty($jyjg->marketPrice)) {
											$myjianyejiage->marketPrice = $jyjg->marketPrice;
										}
										$jianyejiage_ss[] = $myjianyejiage;
										$mychanpinxinxi->jianyejiage = $jianyejiage_ss;
                                    }
                                }
                                $chanpinxinxi_ss[] = $mychanpinxinxi;
                            }
                        }//产品信息 [end]
						//判断是否有产品，没有则跳过此房型
                        if(empty($chanpinxinxi_ss)){
                            continue; 
                        }
                        $myroom->chanpinxinxi = $chanpinxinxi_ss;
                        //产品冒泡排序
                        $chanpinxinxi_tmp;
                        for ($i = 0; $i < count($myroom->chanpinxinxi) - 1; $i++) {
                            for ($j = 0; $j < count($myroom->chanpinxinxi) - 1 - $i; $j++) {
                                if ($myroom->chanpinxinxi[$j]->jianyejiage[0]->cost > $myroom->chanpinxinxi[$j + 1]->jianyejiage[0]->cost) {
                                    $chanpinxinxi_tmp = $myroom->chanpinxinxi[$j];
                                    $myroom->chanpinxinxi[$j] = $myroom->chanpinxinxi[$j + 1];
                                    $myroom->chanpinxinxi[$j + 1] = $chanpinxinxi_tmp;
                                }
                            }
                        }
                    }
                    //判断是否有房型产品（预付）
                    if (!empty($myroom->chanpinxinxi)) {
                        $myhotel_chanpin = new stdClass();
                        //取最低价那条产品（上面的方法已排好序）
                        $low_chanpin = json_encode($myroom->chanpinxinxi[0]);
                        //比比特惠
                        $hotel_tehui = json_decode($low_chanpin);
                        $hotel_tehui->productType = '比比特惠';
                        $hotel_tehui->hotelPrice = ceil($hotel_tehui->jianyejiage[0]->cost * 1.05);
                        //$hotel_tehui->youhuijine = ceil($hotel_tehui->jianyejiage[0]->cost * 0.08);
                        $myhotel_chanpin->hotel_tehui = $hotel_tehui;

                        //尊享订房
                        $hotel_zunxiang = json_decode($low_chanpin);
                        $hotel_zunxiang->productType = '尊享订房';
                        $hotel_zunxiang->hotelPrice = ceil($hotel_zunxiang->jianyejiage[0]->cost * 1.08);
                        //$hotel_zunxiang->youhuijine = ceil($hotel_zunxiang->jianyejiage[0]->cost * 0.03);
                        $myhotel_chanpin->hotel_zunxiang = $hotel_zunxiang;
                        $myroom->chanpinxinxi = $myhotel_chanpin;
                        $room_ss[] = $myroom;
                    }
                }//rooms [end]
                $obj->rooms = $room_ss;
                //房型冒泡排序
                $tmp;
                for ($i = 0; $i < count($obj->rooms) - 1; $i++) {
                    for ($j = 0; $j < count($obj->rooms) - 1 - $i; $j++) {
                        if ($obj->rooms[$j]->chanpinxinxi->hotel_tehui->hotelPrice > $obj->rooms[$j + 1]->chanpinxinxi->hotel_tehui->hotelPrice) {
                            $tmp = $obj->rooms[$j];
                            $obj->rooms[$j] = $obj->rooms[$j + 1];
                            $obj->rooms[$j + 1] = $tmp;
                        }
                    }
                }
            }
            if (!empty($obj->rooms)) {
                echo json_encode($obj);
            } else {
                echo '空';
            }
        } else {
            echo 'false';
        }
    }

}

