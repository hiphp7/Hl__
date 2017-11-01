<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 从去哪儿获取基本数据
 */
class jibendb extends CI_Controller {
    /*
      1、获取酒店列表
     */

    public function jiudian_jiudianliebiao() {
        date_default_timezone_set("Asia/Shanghai");

        $this->load->library('quna');
        $rel = $this->quna->queryHotelList('', '');
        $rel = json_decode($rel);

        if ($rel->code == 0) {
            $this->db->trans_begin();
            // 先删除数据库，在新建数据库
            $sql = "DROP TABLE IF EXISTS `jiudian_jiudianliebiao_0`;";
            // 删除数据库
            $this->db->query($sql);

            // 新建数据库
            $sql = "CREATE TABLE `jiudian_jiudianliebiao_0` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hotelId` varchar(60) DEFAULT NULL COMMENT 'hotelId',
  `updatedTime` datetime DEFAULT NULL COMMENT 'updatedTime',
  `hotelSeq` varchar(60) DEFAULT NULL COMMENT 'hotelSeq',
  `charushijian` datetime DEFAULT NULL COMMENT 'updatedTime',
  PRIMARY KEY (`id`),
  KEY `updatedTime` (`updatedTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $this->db->query($sql);

            //增加数据
            $hotels = $rel->result->hotels;
            foreach ($hotels as $h) {
                $obj = array(
                    'hotelId' => $h->hotelId,
                    'updatedTime' => date('Y-m-d H:i:s', $h->updatedTime)
                );
                if (!empty($h->hotelSeq) && $h->hotelSeq != '') {
                    $obj['hotelSeq'] = $h->hotelSeq;
                }
                $this->db->insert('jiudian_jiudianliebiao_0', $obj);
                $id = $this->db->insert_id();
            }

            //修改表名
            $sql = "rename table jiudian_jiudianliebiao to jiudian_jiudianliebiao_1;";
            $this->db->query($sql);
            $sql = "rename table jiudian_jiudianliebiao_0 to jiudian_jiudianliebiao;";
            $this->db->query($sql);
            $sql = "rename table jiudian_jiudianliebiao_1 to jiudian_jiudianliebiao_0;";
            $this->db->query($sql);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo 'false';
            } else {
                $this->db->trans_commit();


                echo 'true';
            }
        } else {
            echo json_encode($rel);
        }
    }

    /*
     * 2、酒店详情列表，包含：jiudian_jiudianxiangqingliebiao（酒店详情）、jiudian_landmarks（酒店详情子表--地标）、
     * jiudian_images（酒店详情子表）、jiudian_locations（images子表）、jiudian_rooms（物理房型）
     */

    public function jiudian_jiudianxiangqingliebiao() {
        date_default_timezone_set("Asia/Shanghai");
        $this->db->trans_begin();
        $this->load->library('quna');
        $sql = 'select m.id as id,
m.hotelId as hotelId,
m.updatedTime as updatedTime,
m.hotelSeq as hotelSeq from jiudian_jiudianliebiao as m';
        $res = $this->db->query($sql);
        $rows = $res->result();

        // 酒店详情列表
        $sql = "DROP TABLE IF EXISTS `jiudian_jiudianxiangqingliebiao_0`;";
        // 删除数据库
        $this->db->query($sql);
        // 新建数据库
        $sql = "CREATE TABLE `jiudian_jiudianxiangqingliebiao_0` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hotelId` varchar(60) DEFAULT NULL COMMENT 'hotelId',
  `name` text COMMENT 'name',
  `address` varchar(60) DEFAULT NULL COMMENT 'address',
  `starRates` int(11) DEFAULT NULL COMMENT 'starRates',
  `category` int(11) DEFAULT NULL COMMENT 'category',
  `phone` varchar(60) DEFAULT NULL COMMENT 'phone',
  `establishmentDate` varchar(60) DEFAULT NULL COMMENT 'establishmentDate',
  `renovationDate` varchar(60) DEFAULT NULL COMMENT 'renovationDate',
  `groupId` int(11) DEFAULT NULL COMMENT 'groupId',
  `brandId` int(11) DEFAULT NULL COMMENT 'brandId',
  `baiduLat` varchar(60) DEFAULT NULL COMMENT 'baiduLat(Decimal)',
  `baiduLon` varchar(60) DEFAULT NULL COMMENT 'baiduLon(Decimal)',
  `city` varchar(60) DEFAULT NULL COMMENT 'city',
  `district` varchar(60) DEFAULT NULL COMMENT 'district',
  `businessZone` varchar(60) DEFAULT NULL COMMENT 'businessZone',
  `introEditor` text COMMENT 'introEditor',
  `description` text COMMENT 'description',
  `generalAmenities` text COMMENT 'generalAmenities',
  `roomAmenities` text COMMENT 'roomAmenities',
  `recreationAmenities` text COMMENT 'recreationAmenities',
  `conferenceAmenities` varchar(60) DEFAULT NULL COMMENT 'conferenceAmenities',
  `airportPickUpService` varchar(60) DEFAULT NULL COMMENT 'airportPickUpService',
  `diningAmenities` varchar(60) DEFAULT NULL COMMENT 'diningAmenities',
  `surroundings` text COMMENT 'surroundings',
  `features` varchar(60) DEFAULT NULL COMMENT 'features',
  `facilities` text COMMENT 'facilities',
  `thumbnailId` text COMMENT 'thumbnailId',
  `updateTime` datetime DEFAULT NULL COMMENT 'updateTime',
  `commentScore` double DEFAULT NULL COMMENT 'commentScore',
  `enName` text COMMENT 'enName',
  `fax` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `starRates` (`starRates`) USING BTREE,
  KEY `category` (`category`) USING BTREE,
  KEY `groupId` (`groupId`) USING BTREE,
  KEY `brandId` (`brandId`) USING BTREE,
  KEY `updateTime` (`updateTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);

        // 酒店详情列表子表 -- 地标
        $sql = "DROP TABLE IF EXISTS `jiudian_landmarks_0`;";
        // 删除数据库
        $this->db->query($sql);

        // 新建数据库
        $sql = "CREATE TABLE `jiudian_landmarks_0` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jiudianxiangqingid` bigint(20) DEFAULT NULL COMMENT '酒店详情id',
  `name` varchar(60) DEFAULT NULL COMMENT 'name',
  PRIMARY KEY (`id`),
  KEY `jiudianxiangqingid` (`jiudianxiangqingid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);

        // 酒店详情列表子表 -- 图片
        $sql = "DROP TABLE IF EXISTS `jiudian_images_0`;";
        // 删除数据库
        $this->db->query($sql);

        // 新建数据库
        $sql = "CREATE TABLE `jiudian_images_0` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jiudianxiangqingid` bigint(20) DEFAULT NULL COMMENT '酒店详情id',
  `roomId` varchar(60) DEFAULT NULL COMMENT 'roomId',
  `imgtype` int(11) DEFAULT NULL COMMENT 'imgtype',
  PRIMARY KEY (`id`),
  KEY `jiudianxiangqingid` (`jiudianxiangqingid`) USING BTREE,
  KEY `imgtype` (`imgtype`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);

        // images子表--图片地址
        $sql = "DROP TABLE IF EXISTS `jiudian_locations_0`;";
        // 删除数据库
        $this->db->query($sql);

        // 新建数据库
        $sql = "CREATE TABLE `jiudian_locations_0` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `imageid` bigint(20) DEFAULT NULL COMMENT 'imageid',
  `value` text COMMENT 'value',
  PRIMARY KEY (`id`),
  KEY `imageid` (`imageid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);

        // 物理房型
        $sql = "DROP TABLE IF EXISTS `jiudian_rooms_0`;";
        // 删除数据库
        $this->db->query($sql);

        // 新建数据库
        $sql = "CREATE TABLE `jiudian_rooms_0` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hotelId` varchar(60) DEFAULT NULL COMMENT 'hotelId',
  `roomTypeId` varchar(60) DEFAULT NULL COMMENT 'roomTypeId',
  `name` text COMMENT 'name',
  `area` varchar(60) DEFAULT NULL COMMENT 'area',
  `floor` varchar(60) DEFAULT NULL COMMENT 'floor',
  `broadnet` varchar(60) DEFAULT NULL COMMENT 'broadnet',
  `wifi` varchar(60) DEFAULT NULL COMMENT 'wifi',
  `window` varchar(60) DEFAULT NULL COMMENT 'window',
  `bedType` varchar(60) DEFAULT NULL COMMENT 'bedType',
  `maxCustomers` int(11) DEFAULT NULL COMMENT 'maxCustomers',
  `highLights` text COMMENT 'highLights',
  `bath` varchar(60) DEFAULT NULL COMMENT 'bath',
  PRIMARY KEY (`id`),
  KEY `maxCustomers` (`maxCustomers`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);

        foreach ($rows as $r) {
            // $r->hotelId
            $queryHotelDetail = $this->quna->queryHotelDetail($r->hotelId, true, true);
            $queryHotelDetail = json_decode($queryHotelDetail);

            if ($queryHotelDetail->code == 0) {

                $hotelDetail = $queryHotelDetail->result->hotelDetail[0];
                $obj_hotelDetail = array();
                if (!empty($hotelDetail->hotelId)) {
                    $obj_hotelDetail['hotelId'] = $hotelDetail->hotelId;
                }
                //酒店详情
                if (!empty($hotelDetail->detail) && $hotelDetail->detail != '') {
                    $obj_hotelDetail['name'] = $hotelDetail->detail->name;
                    $obj_hotelDetail['address'] = $hotelDetail->detail->address;
                    // || $hotelDetail->detail->starRate == "0"
                    if (!empty($hotelDetail->detail->starRate)) {
                        $obj_hotelDetail['starRates'] = intval($hotelDetail->detail->starRate);
                    }
                    if (!empty($hotelDetail->detail->category)) {
                        $obj_hotelDetail['category'] = intval($hotelDetail->detail->category);
                    }
                    if (!empty($hotelDetail->detail->phone)) {
                        $obj_hotelDetail['phone'] = $hotelDetail->detail->phone;
                    }
                    if (!empty($hotelDetail->detail->fax)) {
                        $obj_hotelDetail['fax'] = $hotelDetail->detail->fax;
                    }
                    if (!empty($hotelDetail->detail->establishmentDate)) {
                        $obj_hotelDetail['establishmentDate'] = $hotelDetail->detail->establishmentDate;
                    }
                    if (!empty($hotelDetail->detail->renovationDate)) {
                        $obj_hotelDetail['renovationDate'] = $hotelDetail->detail->renovationDate;
                    }
                    if (!empty($hotelDetail->detail->groupId)) {
                        $obj_hotelDetail['groupId'] = intval($hotelDetail->detail->groupId);
                    }
                    if (!empty($hotelDetail->detail->brandId)) {
                        $obj_hotelDetail['brandId'] = intval($hotelDetail->detail->brandId);
                    }
                    if (!empty($hotelDetail->detail->baiduLat)) {
                        $obj_hotelDetail['baiduLat'] = $hotelDetail->detail->baiduLat;
                    }
                    if (!empty($hotelDetail->detail->baiduLon)) {
                        $obj_hotelDetail['baiduLon'] = $hotelDetail->detail->baiduLon;
                    }
                    if (!empty($hotelDetail->detail->city)) {
                        $obj_hotelDetail['city'] = $hotelDetail->detail->city;
                    }
                    if (!empty($hotelDetail->detail->district)) {
                        $obj_hotelDetail['district'] = $hotelDetail->detail->district;
                    }
                    if (!empty($hotelDetail->detail->businessZone)) {
                        $obj_hotelDetail['businessZone'] = $hotelDetail->detail->businessZone;
                    }
                    if (!empty($hotelDetail->detail->introEditor)) {
                        $obj_hotelDetail['introEditor'] = $hotelDetail->detail->introEditor;
                    }
                    if (!empty($hotelDetail->detail->description)) {
                        $obj_hotelDetail['description'] = $hotelDetail->detail->description;
                    }
                    if (!empty($hotelDetail->detail->generalAmenities)) {
                        $obj_hotelDetail['generalAmenities'] = $hotelDetail->detail->generalAmenities;
                    }
                    if (!empty($hotelDetail->detail->roomAmenities)) {
                        $obj_hotelDetail['roomAmenities'] = $hotelDetail->detail->roomAmenities;
                    }
                    if (!empty($hotelDetail->detail->recreationAmenities)) {
                        $obj_hotelDetail['recreationAmenities'] = $hotelDetail->detail->recreationAmenities;
                    }
                    if (!empty($hotelDetail->detail->conferenceAmenities)) {
                        $obj_hotelDetail['conferenceAmenities'] = $hotelDetail->detail->conferenceAmenities;
                    }
                    if (!empty($hotelDetail->detail->airportPickUpService)) {
                        $obj_hotelDetail['airportPickUpService'] = $hotelDetail->detail->airportPickUpService;
                    }
                    if (!empty($hotelDetail->detail->diningAmenities)) {
                        $obj_hotelDetail['diningAmenities'] = $hotelDetail->detail->diningAmenities;
                    }
                    if (!empty($hotelDetail->detail->surroundings)) {
                        $obj_hotelDetail['surroundings'] = $hotelDetail->detail->surroundings;
                    }
                    if (!empty($hotelDetail->detail->features)) {
                        $obj_hotelDetail['features'] = $hotelDetail->detail->features;
                    }
                    if (!empty($hotelDetail->detail->facilities)) {
                        $obj_hotelDetail['facilities'] = $hotelDetail->detail->facilities;
                    }
                    if (!empty($hotelDetail->detail->thumbnailId)) {
                        $obj_hotelDetail['thumbnailId'] = $hotelDetail->detail->thumbnailId;
                    }
                    if (!empty($hotelDetail->detail->updateTime)) {
                        $obj_hotelDetail['updateTime'] = date('Y-m-d H:i:s', $hotelDetail->detail->updateTime);
                    }
                    if (!empty($hotelDetail->detail->commentScore) || $hotelDetail->detail->commentScore === 0.0) {
                        $obj_hotelDetail['commentScore'] = floatval($hotelDetail->detail->commentScore);
                    }
                    if (!empty($hotelDetail->detail->enName)) {
                        $obj_hotelDetail['enName'] = $hotelDetail->detail->enName;
                    }
                    $this->db->insert('jiudian_jiudianxiangqingliebiao_0', $obj_hotelDetail);
                    $hotelDetail_id = $this->db->insert_id();
                    echo $hotelDetail_id;
                    //酒店详情子表--地标landmarks
                    if (!empty($hotelDetail->detail->landmarks) && $hotelDetail->detail->landmarks != '') {

                        $obj_landmarks = array();
                        foreach ($hotelDetail->detail->landmarks as $landmarks) {
                            if (!empty($landmarks->name)) {
                                $obj_landmarks['name'] = $landmarks->name;
                            }
                            $obj_landmarks['jiudianxiangqingid'] = $hotelDetail_id;
                            $this->db->insert('jiudian_landmarks_0', $obj_landmarks);
                        }
                    }
                    //酒店详情子表--images
                    if (!empty($hotelDetail->detail->images) && $hotelDetail->detail->images != '') {

                        $obj_image = array();
                        foreach ($hotelDetail->detail->images as $image) {
                            if (!empty($image->roomId) && $image->roomId != "NULL") {
                                $obj_image['roomId'] = $image->roomId;
                            }
                            if (!empty($image->type) || $image->type === 0) {
                                $obj_image['imgtype'] = intval($image->type);
                            }
                            $obj_image['jiudianxiangqingid'] = $hotelDetail_id;
                            $this->db->insert('jiudian_images_0', $obj_image);
                            $image_id = $this->db->insert_id();

                            //images子表--locations
                            if (!empty($image->locations) && $image->locations != '') {

                                $obj_locations = array();
                                foreach ($image->locations as $locations) {
                                    if (!empty($locations->value)) {
                                        $obj_locations['value'] = $locations->value;
                                    }
                                    $obj_locations['imageid'] = $image_id;
                                    $this->db->insert('jiudian_locations_0', $obj_locations);
                                }
                            }
                        }
                    }
                }
                // 物理房型
                if (!empty($hotelDetail->rooms)) {

                    foreach ($hotelDetail->rooms as $room) {
                        $obj_room = array();
                        if (!empty($hotelDetail->hotelId)) {
                            $obj_room['hotelId'] = $hotelDetail->hotelId;
                        }
                        $obj_room['roomTypeId'] = $room->roomTypeId;
                        $obj_room['name'] = $room->name;
                        if (!empty($room->area)) {
                            $obj_room['area'] = $room->area;
                        }
                        if (!empty($room->floor)) {
                            $obj_room['floor'] = $room->floor;
                        }
                        if (!empty($room->broadnet)) {
                            $obj_room['broadnet'] = $room->broadnet;
                        }
                        if (!empty($room->wifi)) {
                            $obj_room['wifi'] = $room->wifi;
                        }
                        if (!empty($room->window)) {
                            $obj_room['window'] = $room->window;
                        }
                        if (!empty($room->bedType)) {
                            $obj_room['bedType'] = $room->bedType;
                        }
                        if (!empty($room->maxCustomers) || $room->maxCustomers === 0) {
                            $obj_room['maxCustomers'] = intval($room->maxCustomers);
                        }
                        if (!empty($room->highLights)) {
                            $obj_room['highLights'] = $room->highLights;
                        }
                        if (!empty($room->bath)) {
                            $obj_room['bath'] = $room->bath;
                        }
                        $this->db->insert('jiudian_rooms_0', $obj_room);
                    }
                }
            } else {
                echo json_encode($queryHotelDetail);
            }
        }
        //修改表名
        $sql = "rename table jiudian_jiudianxiangqingliebiao to jiudian_jiudianxiangqingliebiao_1;";
        $this->db->query($sql);
        $sql = "rename table jiudian_jiudianxiangqingliebiao_0 to jiudian_jiudianxiangqingliebiao;";
        $this->db->query($sql);
        $sql = "rename table jiudian_jiudianxiangqingliebiao_1 to jiudian_jiudianxiangqingliebiao_0;";
        $this->db->query($sql);

        $sql = "rename table jiudian_landmarks to jiudian_landmarks_1;";
        $this->db->query($sql);
        $sql = "rename table jiudian_landmarks_0 to jiudian_landmarks;";
        $this->db->query($sql);
        $sql = "rename table jiudian_landmarks_1 to jiudian_landmarks_0;";
        $this->db->query($sql);

        $sql = "rename table jiudian_images to jiudian_images_1;";
        $this->db->query($sql);
        $sql = "rename table jiudian_images_0 to jiudian_images;";
        $this->db->query($sql);
        $sql = "rename table jiudian_images_1 to jiudian_images_0;";
        $this->db->query($sql);

        $sql = "rename table jiudian_locations to jiudian_locations_1;";
        $this->db->query($sql);
        $sql = "rename table jiudian_locations_0 to jiudian_locations;";
        $this->db->query($sql);
        $sql = "rename table jiudian_locations_1 to jiudian_locations_0;";
        $this->db->query($sql);

        $sql = "rename table jiudian_rooms to jiudian_rooms_1;";
        $this->db->query($sql);
        $sql = "rename table jiudian_rooms_0 to jiudian_rooms;";
        $this->db->query($sql);
        $sql = "rename table jiudian_rooms_1 to jiudian_rooms_0;";
        $this->db->query($sql);
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'false';
        } else {
            $this->db->trans_commit();
            echo 'true';
        }
    }

    public function jiudian_chengshi() {
        $this->load->library('mypost');
        $conf = $this->config->item('去哪儿');
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


        $res = $this->mypost->request_get_str($url, $data_get);

        $str1 = json_decode($res);
        $a = $str1->result->hotelGeoList;

        for ($i = 0; $i <= count($a); $i++) {
            if (!empty($a[$i])) {
                $arr = array(
                    'country' => $a[$i]->country,
                    'provinceId' => $a[$i]->provinceId,
                    'provinceName' => $a[$i]->provinceName,
                    'cityName' => $a[$i]->cityName,
                    'cityCode' => $a[$i]->cityCode,
                    'parentCityCode' => $a[$i]->parentCityCode
                );
            } else {
                $arr = array(
                    'country' => 0,
                    'provinceId' => 0,
                    'provinceName' => 0,
                    'cityName' => 0,
                    'cityCode' => 0,
                    'parentCityCode' => 0
                );
            }

            $this->db->insert('jiudian_chengshi0', $arr);
        }
    }

    public function jiudian_jiudianpinpai() {
        $this->load->library('mypost');
        $conf = $this->config->item('conf');
        $url = $conf['Urlquna'] . "brand/queryBrand.json";

        $head = new stdClass();
        $head->appKey = $conf['appKey'];
        $head->salt = $conf['salt'];
        $head->sign = md5(md5($conf['secretKey'] . $conf['appKey']) . $conf['salt']);
        $head->version = $conf['version'];


        $obj = new stdClass();
        $obj->head = $head;


        $str = json_encode($obj);
        $data_get = $str;


        $res = $this->mypost->request_get_str($url, $data_get);

        $str1 = json_decode($res);
        $a = $str1->result->brands;

        for ($i = 0; $i <= count($a); $i++) {
            if (!empty($a[$i])) {
                $groupId = intval($a[$i]->brandId);
                $arr = array(
                    'brandId' => $a[$i]->brandId,
                    'groupId' => $groupId,
                    'shortName' => $a[$i]->shortName,
                    'name' => $a[$i]->name,
                );
            } else {
                $arr = array(
                    'brandId' => '0',
                    'groupId' => 0,
                    'shortName' => '0',
                    'name' => '0'
                );
            }

            $this->db->insert('jiudian_jiudianpinpai', $arr);
        }
    }

    public function jiudian_yudingguize() {
        $this->load->library('qunae');
        $sql = 'select j.hotelId as hotelId from jiudian_jiudianliebiao as j ';
        $res = $this->db->query($sql);
        $rows = $res->result();
        //var_dump($rows);
        foreach ($rows as $r) {
            $rel = $this->qunae->queryRatePlan1('2016-12-19', '2016-12-20', $r->hotelId, '', '', '', '', '', '');
            $str1 = json_decode($rel);
            if ($str1->code == 0) {
                $a = $str1->result->hotels[0];


                $b = $a->bookingRules;
                //echo count($b)."<br/>";
                //  var_dump($b);
                $arr1 = array();
                if (!empty($a->hotelId)) {
                    $arr1['jiudianbianma'] = $a->hotelId;
                }
                // for($i=0;$i<=count($b);$i++){        
                if (!empty($a->bookingRules[0]->bookingRuleId) && $a->bookingRules[0]->bookingRuleId != '') {
                    $arr1['bookingRuleId'] = $a->bookingRules[0]->bookingRuleId;
                }
                if (!empty($a->bookingRules[0]->startDate) && $a->bookingRules[0]->startDate != '') {
                    $arr1['startDate'] = date('Y-m-d H:i:s', $a->bookingRules[0]->startDate);
                }
                if (!empty($a->bookingRules[0]->endDate) && $a->bookingRules[0]->endDate != '') {
                    $arr1['endDate'] = date('Y-m-d H:i:s', $a->bookingRules[0]->endDate);
                }
                if (!empty($a->bookingRules[0]->startHour) && $a->bookingRules[0]->startHour != '') {
                    $arr1['startHour'] = $a->bookingRules[0]->startHour;
                }
                if (!empty($a->bookingRules[0]->endHour) && $a->bookingRules[0]->endHour != '') {
                    $arr1['endHour'] = $a->bookingRules[0]->endHour;
                }
                if (!empty($a->bookingRules[0]->weekSet) && $a->bookingRules[0]->weekSet != '') {
                    $arr1['weekSet'] = $a->bookingRules[0]->weekSet;
                }
                if (!empty($a->bookingRules[0]->minAmount) && $a->bookingRules[0]->minAmount != '') {
                    $arr1['minAmount'] = intval($a->bookingRules[0]->minAmount);
                }
                if (!empty($a->bookingRules[0]->maxAmount) && $a->bookingRules[0]->maxAmount != '') {
                    $arr1['maxAmount'] = intval($a->bookingRules[0]->maxAmount);
                }
                if (!empty($a->bookingRules[0]->minDays) && $a->bookingRules[0]->minDays != '') {
                    $arr1['minDays'] = intval($a->bookingRules[0]->minDays);
                }
                if (!empty($a->bookingRules[0]->maxDays) && $a->bookingRules[0]->maxDays != '') {
                    $arr1['maxDays'] = intval($a->bookingRules[0]->maxDays);
                }
                if (!empty($a->bookingRules[0]->minAdvHours) && $a->bookingRules[0]->minAdvHours != '') {
                    $arr1['minAdvHours'] = intval($a->bookingRules[0]->minAdvHours);
                }
                if (!empty($a->bookingRules[0]->maxAdvHours) && $a->bookingRules[0]->maxAdvHours != '') {
                    $arr1['maxAdvHours'] = intval($a->bookingRules[0]->maxAdvHours);
                }
                if (!empty($a->bookingRules[0]->arrivalStartTime) && $a->bookingRules[0]->arrivalStartTime != '') {
                    $arr1['arrivalStartTime'] = $a->bookingRules[0]->arrivalStartTime;
                }
                if (!empty($a->bookingRules[0]->arrivalEndTime) && $a->bookingRules[0]->arrivalEndTime != '') {
                    $arr1['arrivalEndTime'] = $a->bookingRules[0]->arrivalEndTime;
                }
                if (!empty($a->bookingRules[0]->serviceStartTime) && $a->bookingRules[0]->serviceStartTime != '') {
                    $arr1['serviceStartTime'] = $a->bookingRules[0]->serviceStartTime;
                }
                if (!empty($a->bookingRules[0]->serviceEndTime) && $a->bookingRules[0]->serviceEndTime != '') {
                    $arr1['serviceEndTime'] = $a->bookingRules[0]->serviceEndTime;
                }
                /// }
                //var_dump($a->bookingRules[0]->bookingNotices);
                //var_dump($arr1);
                //插入数据
                $this->db->insert('jiudian_yudingguize', $arr1);
                $bookingRules_id = $this->db->insert_id();
                echo $bookingRules_id;

                //子表
                if (!empty($a->bookingRules[0]->bookingNotices) && $a->bookingRules[0]->bookingNotices != '') {
                    $arr_1 = array();
                    if (!empty($bookingRules_id) && $bookingRules_id != '') {
                        $arr_1['yudingguizeid'] = $bookingRules_id;
                    }
                    foreach ($a->bookingRules[0]->bookingNotices as $bookingNotices) {

                        if (!empty($bookingNotices->message) && $bookingNotices->message != '') {
                            $arr_1['message'] = $bookingNotices->message;
                        }
                        if (!empty($bookingNotices->startDate) && $bookingNotices->startDate != '') {
                            $arr_1['startDate'] = date('Y-m-d H:i:s', $bookingNotices->startDate);
                        }
                        if (!empty($bookingNotices->endDate) && $bookingNotices->endDate != '') {
                            $arr_1['endDate'] = date('Y-m-d H:i:s', $bookingNotices->endDate);
                        }

                        //插入数据
                        $this->db->insert('jiudian_yudingshuoming', $arr1_1);
                        $bookingRules_id = $this->db->insert_id();
                    }
                    var_dump($arr_1);
                }
            }
        }
    }

    public function jiudian_zengzhifuwu() {
        $this->load->library('qunae');
        $sql = 'select j.hotelId as hotelId from jiudian_jiudianliebiao as j ';
        $res = $this->db->query($sql);
        $rows = $res->result();
        //var_dump($rows);
        foreach ($rows as $r) {
            $rel = $this->qunae->queryRatePlan1('2016-12-19', '2016-12-20', $r->hotelId, '', '', '', '', '', '');
            $str1 = json_decode($rel);
            if ($str1->code == 0) {
                $a = $str1->result->hotels[0];


                $b = $a->bookingRules;
                //echo count($b)."<br/>";
                //  var_dump($b);
                $arr1 = array();
                if (!empty($a->hotelId)) {
                    $arr1['jiudianbianma'] = $a->hotelId;
                }
                //增值服务->valueAdds[]    已插入
                $arr2 = array();
                if (!empty($a->hotelId)) {
                    $arr2['jiudianbianma'] = $a->hotelId;
                }
                if (!empty($a->valueAdds[0]->valueAddId) && $a->valueAdds[0]->valueAddId != '') {
                    $arr2['valueAddId'] = $a->valueAdds[0]->valueAddId;
                }
                if (!empty($a->valueAdds[0]->typeCode) && $a->valueAdds[0]->typeCode != '') {
                    $arr2['typeCode'] = $a->valueAdds[0]->typeCode;
                }
                if (!empty($a->valueAdds[0]->amount) && $a->valueAdds[0]->amount != '') {
                    $arr2['amount'] = intval($a->valueAdds[0]->amount);
                }
                if (!empty($a->valueAdds[0]->isExtAdd) && $a->valueAdds[0]->isExtAdd != '') {
                    $arr2['isExtAdd'] = $a->valueAdds[0]->isExtAdd;
                }
                if (!empty($a->valueAdds[0]->extOption) && $a->valueAdds[0]->extOption != '') {
                    $arr2['extOption'] = $a->valueAdds[0]->extOption;
                }
                if (!empty($a->valueAdds[0]->extPrice) && $a->valueAdds[0]->extPrice != '') {
                    $arr2['extPrice'] = doubleval($a->valueAdds[0]->extPrice);
                }
                if (!empty($a->valueAdds[0]->startDate) && $a->valueAdds[0]->startDate != '') {
                    $arr2['startDate'] = date('Y-m-d H:i:s', $a->valueAdds[0]->startDate);
                }
                if (!empty($a->valueAdds[0]->endDate) && $a->valueAdds[0]->endDate != '') {
                    $arr2['endDate'] = date('Y-m-d H:i:s', $a->valueAdds[0]->endDate);
                }
                if (!empty($a->valueAdds[0]->description) && $a->valueAdds[0]->description != '') {
                    $arr2['description'] = $a->valueAdds[0]->description;
                }
                //var_dump($arr2);
                $this->db->insert('jiudian_zengzhifuwu', $arr2);
            }
        }
    }

    public function jiudian_chanpinxinxi() {
        $this->load->library('qunae');
        $sql = 'select j.hotelId as hotelId from jiudian_jiudianliebiao as j ';
        $res = $this->db->query($sql);
        $rows = $res->result();
        //var_dump($rows);
        foreach ($rows as $r) {
            $rel = $this->qunae->queryRatePlan1('2016-12-19', '2016-12-20', $r->hotelId, '', '', '', '', '', '');
            $str1 = json_decode($rel);
            if ($str1->code == 0) {
                $a = $str1->result->hotels[0];


                // $b = $a->bookingRules;
                //echo count($b)."<br/>";
                //  var_dump($b);
                $arr1 = array();
                if (!empty($a->hotelId)) {
                    $arr1['jiudianbianma'] = $a->hotelId;
                }
                //产品信息 ratePlans   已插入    
                $c = $a->rooms[0];
                $arr3 = array();
                if (!empty($c->roomTypeId)) {
                    $arr3['fangxingid'] = intval($c->roomTypeId);
                }
                //var_dump($arr3);
                // for($k=0;$k<=count($c);$k++){
                if (!empty($c->ratePlans[0]->ratePlanId) && $c->ratePlans[0]->ratePlanId != '') {
                    $arr3['ratePlanId'] = intval($c->ratePlans[0]->ratePlanId);
                }
                if (!empty($c->ratePlans[0]->productName) && $c->ratePlans[0]->productName != '') {
                    $arr3['productName'] = $c->ratePlans[0]->productName;
                }
                if (!empty($c->ratePlans[0]->status) && $c->ratePlans[0]->status != '') {
                    $arr3['status'] = $c->ratePlans[0]->status;
                }
                if (!empty($c->ratePlans[0]->instantConfirmation) && $c->ratePlans[0]->instantConfirmation != '') {
                    $arr3['instantConfirmation'] = $c->ratePlans[0]->instantConfirmation;
                }
                if (!empty($c->ratePlans[0]->paymentType) && $c->ratePlans[0]->paymentType != '') {
                    $arr3['paymentType'] = $c->ratePlans[0]->paymentType;
                }
                if (!empty($c->ratePlans[0]->valueAddIds) && $c->ratePlans[0]->valueAddIds != '') {
                    $arr3['valueAddIds'] = $c->ratePlans[0]->valueAddIds;
                }
                if (!empty($c->ratePlans[0]->currencyCode) && $c->ratePlans[0]->currencyCode != '') {
                    $arr3['currencyCode'] = $c->ratePlans[0]->currencyCode;
                }
                if (!empty($c->ratePlans[0]->refundRuleId) && $c->ratePlans[0]->refundRuleId != '') {
                    $arr3['refundRuleId'] = $c->ratePlans[0]->refundRuleId;
                }
                if (!empty($c->ratePlans[0]->bookingRuleIds) && $c->ratePlans[0]->bookingRuleIds != '') {
                    $arr3['bookingRuleIds'] = $c->ratePlans[0]->bookingRuleIds;
                }
                if (!empty($c->ratePlans[0]->forceGuarantee) && $c->ratePlans[0]->forceGuarantee != '') {
                    $arr3['forceGuarantee'] = $c->ratePlans[0]->forceGuarantee;
                }
                if (!empty($c->ratePlans[0]->customerTypes[0]) && $c->ratePlans[0]->customerTypes[0] != '') {
                    $arr3['customerTypes'] = $c->ratePlans[0]->customerTypes[0];
                }
                if (!empty($c->ratePlans[0]->guaranteeRuleId) && $c->ratePlans[0]->guaranteeRuleId != '') {
                    $arr3['guaranteeRuleId'] = $c->ratePlans[0]->guaranteeRuleId;
                }
                if (!empty($c->ratePlans[0]->wifi) && $c->ratePlans[0]->wifi != '') {
                    $arr3['wifi'] = $c->ratePlans[0]->wifi;
                }
                if (!empty($c->ratePlans[0]->bedType) && $c->ratePlans[0]->bedType != '') {
                    $arr3['bedType'] = $c->ratePlans[0]->bedType;
                }
                if (!empty($c->ratePlans[0]->maxCustomers) && $c->ratePlans[0]->maxCustomers != '') {
                    $arr3['maxCustomers'] = intval($c->ratePlans[0]->maxCustomers);
                }
                if (!empty($c->ratePlans[0]->saleUnit) && $c->ratePlans[0]->saleUnit != '') {
                    $arr3['saleUnit'] = $c->ratePlans[0]->saleUnit;
                }
                if (!empty($c->ratePlans[0]->giftIds) && $c->ratePlans[0]->giftIds != '') {
                    $arr3['giftIds'] = $c->ratePlans[0]->giftIds;
                }
                if (!empty($c->ratePlans[0]->broadnet) && $c->ratePlans[0]->broadnet != '') {
                    $arr3['broadnet'] = $c->ratePlans[0]->broadnet;
                }
                if (!empty($c->ratePlans[0]->window) && $c->ratePlans[0]->window != '') {
                    $arr3['window'] = $c->ratePlans[0]->window;
                }
                if (!empty($c->ratePlans[0]->productRoomName) && $c->ratePlans[0]->productRoomName != '') {
                    $arr3['productRoomName'] = $c->ratePlans[0]->productRoomName;
                }
                if (!empty($c->ratePlans[0]->bizType) && $c->ratePlans[0]->bizType != '') {
                    $arr3['bizType'] = $c->ratePlans[0]->bizType;
                }
                if (!empty($c->ratePlans[0]->sellTimeQuantity) && $c->ratePlans[0]->sellTimeQuantity != '') {
                    $arr3['sellTimeQuantity'] = intval($c->ratePlans[0]->sellTimeQuantity);
                }
                if (!empty($c->ratePlans[0]->memberCategory[0]) && $c->ratePlans[0]->memberCategory[0] != '') {
                    $arr3['memberCategory'] = $c->ratePlans[0]->memberCategory[0];
                }
                if (!empty($c->ratePlans[0]->additionFeeDesc) && $c->ratePlans[0]->additionFeeDesc != '') {
                    $arr3['additionFeeDesc'] = $c->ratePlans[0]->additionFeeDesc;
                }
                if (!empty($c->ratePlans[0]->isAbroadPrice) && $c->ratePlans[0]->isAbroadPrice != '') {
                    $arr3['isAbroadPrice'] = $c->ratePlans[0]->isAbroadPrice;
                }
                if (!empty($c->ratePlans[0]->swiftCheckIn) && $c->ratePlans[0]->swiftCheckIn != '') {
                    $arr3['swiftCheckIn'] = $c->ratePlans[0]->swiftCheckIn;
                }
                if (!empty($c->ratePlans[0]->productGroup) && $c->ratePlans[0]->productGroup != '') {
                    $arr3['productGroup'] = intval($c->ratePlans[0]->productGroup);
                }
                //var_dump($arr3);
                //插入数据
                $this->db->insert('jiudian_chanpinxinxi', $arr3);
                $ratePlans_id = $this->db->insert_id();
                echo $ratePlans_id;
                //子表 nightlyRates夜间价格
                $arr3_1 = array();

                if (!empty($c->ratePlans[0]->nightlyRates) && $c->ratePlans[0]->nightlyRates != '') {

                    foreach ($c->ratePlans[0]->nightlyRates as $nightlyRates) {
                        if (!empty($nightlyRates->date) && $nightlyRates->date != '') {
                            $arr3_1['date'] = date('Y-m-d H:i:s', $nightlyRates->date);
                        }
                        if (!empty($nightlyRates->cost) && $nightlyRates->cost != '') {
                            $arr3_1['cost'] = doubleval($nightlyRates->cost);
                        }
                        if (!empty($nightlyRates->status) && $nightlyRates->status != '') {
                            $arr3_1['status'] = $nightlyRates->status;
                        }
                        if (!empty($nightlyRates->instantConfirmation) && $nightlyRates->instantConfirmation != '') {
                            $arr3_1['instantConfirmation'] = $nightlyRates->instantConfirmation;
                        }
                        if (!empty($nightlyRates->instantConfirmCount) && $nightlyRates->instantConfirmCount != '') {
                            $arr3_1['instantConfirmCount'] = intval($nightlyRates->instantConfirmCount);
                        }
                        if (!empty($nightlyRates->availableRooms) && $nightlyRates->availableRooms != '') {
                            $arr3_1['availableRooms'] = intval($nightlyRates->availableRooms);
                        }
                        if (!empty($nightlyRates->salePrice) && $nightlyRates->salePrice != '') {
                            $arr3_1['salePrice'] = doubleval($nightlyRates->salePrice);
                        }
                        if (!empty($nightlyRates->marketPrice) && $nightlyRates->marketPrice != '') {
                            $arr3_1['marketPrice'] = doubleval($nightlyRates->marketPrice);
                        }

                        $arr3_1['chanpinxinxiid'] = $ratePlans_id;

                        //插入数据
                        $this->db->insert('jiudian_jianyejiage', $arr3_1);
                    }
                    //var_dump($arr3_1);
                }
            }
        }
    }

    public function jiudian_jiudianyouhuilibao() {
        $this->load->library('qunae');
        $sql = 'select j.hotelId as hotelId from jiudian_jiudianliebiao as j ';
        $res = $this->db->query($sql);
        $rows = $res->result();
        //var_dump($rows);
        foreach ($rows as $r) {
            $rel = $this->qunae->queryRatePlan1('2016-12-19', '2016-12-20', $r->hotelId, '', '', '', '', '', '');
            $str1 = json_decode($rel);
            if ($str1->code == 0) {
                $a = $str1->result->hotels[0];


                $b = $a->bookingRules;
                //echo count($b)."<br/>";
                //  var_dump($b);
                $arr1 = array();
                if (!empty($a->hotelId)) {
                    $arr1['jiudianbianma'] = $a->hotelId;
                }
                //var_dump($a->gifts);
                //优惠列表 gifts   
                $arr4 = array();
                if (!empty($a->hotelId)) {
                    $arr4['jiudianbianma'] = $a->hotelId;
                }
                if (!empty($a->gifts[0]->giftId) && $a->gifts[0]->giftId != '') {
                    $arr4['giftId'] = $a->gifts[0]->giftId;
                }
                if (!empty($a->gifts[0]->validType) && $a->gifts[0]->validType != '') {
                    $arr4['validType'] = $a->gifts[0]->validType;
                }
                if (!empty($a->gifts[0]->startDate) && $a->gifts[0]->startDate != '') {
                    $arr4['startDate'] = date('Y-m-d H:i:s', $a->gifts[0]->startDate);
                }
                if (!empty($a->gifts[0]->endDate) && $a->gifts[0]->endDate != '') {
                    $arr4['endDate'] = date('Y-m-d H:i:s', $a->gifts[0]->endDate);
                }
                if (!empty($a->gifts[0]->name) && $a->gifts[0]->name != '') {
                    $arr4['name'] = $a->gifts[0]->name;
                }
                if (!empty($a->gifts[0]->description) && $a->gifts[0]->description != '') {
                    $arr4['description'] = $a->gifts[0]->description;
                }
                //var_dump($arr4);
                $this->db->insert('jiudian_jiudianyouhuilibao', $arr4);
            }
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'false';
        } else {
            $this->db->trans_commit();
            echo 'true';
        }
    }

}
