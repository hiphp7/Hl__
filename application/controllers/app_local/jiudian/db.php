<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class db extends CI_Controller {
    
    /*
     * 1、酒店列表
     */

    public function HotelList() {
        date_default_timezone_set("Asia/Shanghai");
        $this->db->trans_begin();
        $this->load->library('quna');
        $rel = $this->quna->queryHotelList('', '');
        $rel = json_decode($rel);

        if ($rel->code == 0) {
            $hotels = $rel->result->hotels;
            foreach ($hotels as $h) {
                $obj = array(
                    'hotelId' => $h->hotelId,
                    'updatedTime' => date('Y-m-d H:i:s', $h->updatedTime)
                );
                if (!empty($h->hotelSeq) && $h->hotelSeq != '') {
                    $obj['hotelSeq'] = $h->hotelSeq;
                }
                $this->db->insert('jiudian_jiudianliebiao', $obj);
                $id = $this->db->insert_id();
                echo $id;
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

    /*
     * 2、酒店详情列表
     */
    public function HotelDetail() {
        date_default_timezone_set("Asia/Shanghai");
        $this->db->trans_begin();
        $this->load->library('quna');
        $sql = 'select m.id as id,
m.hotelId as hotelId,
m.updatedTime as updatedTime,
m.hotelSeq as hotelSeq from jiudian_jiudianliebiao as m';
        $res = $this->db->query($sql);
        $rows = $res->result();
//        var_dump($rows);
//        exit();
        foreach ($rows as $r) {
            // $r->hotelId
            $queryHotelDetail = $this->quna->queryHotelDetail($r->hotelId, true, true);
//            var_dump($queryHotelDetail);
//            exit();
            $queryHotelDetail = json_decode($queryHotelDetail);

            if ($queryHotelDetail->code == 0) {
                $hotelDetail = $queryHotelDetail->result->hotelDetail[0];
//            var_dump($hotelDetail[]->hotelId);
//            exit();
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
                    if (!empty($hotelDetail->detail->commentScore)) {
                        $obj_hotelDetail['commentScore'] = floatval($hotelDetail->detail->commentScore);
                    }
                    if (!empty($hotelDetail->detail->enName)) {
                        $obj_hotelDetail['enName'] = $hotelDetail->detail->enName;
                    }
//                    var_dump($obj_hotelDetail);
//                    exit();
                    $this->db->insert('jiudian_jiudianxiangqingliebiao', $obj_hotelDetail);
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
                            $this->db->insert('jiudian_landmarks', $obj_landmarks);
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
                            $this->db->insert('jiudian_images', $obj_image);
                            $image_id = $this->db->insert_id();

                            //images子表--locations
                            if (!empty($image->locations) && $image->locations != '') {
                                $obj_locations = array();
                                foreach ($image->locations as $locations) {
                                    if (!empty($locations->value)) {
                                        $obj_locations['value'] = $locations->value;
                                    }
                                    $obj_locations['imageid'] = $image_id;
                                    $this->db->insert('jiudian_locations', $obj_locations);
                                }
                            }
                        }
                    }
                }
                //物理房型
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
                        $this->db->insert('jiudian_rooms', $obj_room);
                    }
                }
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
