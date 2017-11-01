<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 退改签政策
 */
class mtuigaiqianzhengce extends CI_Model {

    public function update() {
        date_default_timezone_set("Asia/Shanghai");
        $this->load->library('mypost');
        $conf = $this->config->item("conf");

        $url = $conf['Url51Book'] . "getModifyAndRefundStipulatesServiceRestful1.0/getModifyAndRefundStipulates";
        $post_data['agencyCode'] = $conf['Agency51Book'];

        $sign = md5($conf['Agency51Book'] . '02000' . $conf['Security51Book']);
        $post_data['sign'] = $sign;
        $post_data['rowPerPage'] = 2000;
        $post_data['lastSeatId'] = 0;
        $post_data['lastModifiedAt'] = '2000-01-01 00:00:00';

        $res = $this->mypost->request_post($url, $post_data);
        $g = simplexml_load_string($res);

        if (!empty($g) && $g->returnCode == 'S') {
            $this->db->trans_begin();
            // 先删除数据库，在新建数据库
            $sql = "DROP TABLE IF EXISTS `tuigaiqianzhengce`;";

            // 删除数据库
            $this->db->query($sql);
            $sql = "CREATE TABLE `tuigaiqianzhengce` (";
            $sql = $sql . "`id` bigint(20) NOT NULL AUTO_INCREMENT,";
            $sql = $sql . "`seatId` varchar(60) DEFAULT NULL COMMENT 'seatId',";
            $sql = $sql . "`airlineCode` varchar(60) DEFAULT NULL COMMENT 'airlineCode',";
            $sql = $sql . "`seatCode` varchar(60) DEFAULT NULL COMMENT 'seatCode',";
            $sql = $sql . "`refundStipulate` text COMMENT 'refundStipulate',";
            $sql = $sql . "`changeStipulate` text COMMENT 'changeStipulate',";
            $sql = $sql . "`suitableAirline` varchar(60) DEFAULT NULL COMMENT 'suitableAirline',";
			$sql = $sql . "`updatetime` datetime DEFAULT NULL COMMENT 'updatetime',";
            $sql = $sql . "`modifyStipulate` tinyint(1) DEFAULT NULL COMMENT 'modifyStipulate',";
            $sql = $sql . "PRIMARY KEY (`id`)";
            $sql = $sql . ") ENGINE=InnoDB DEFAULT CHARSET=utf8;";

            // 新建数据库
            $this->db->query($sql);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        }

        $seatId = '';
        $modifiedAt = '';
        // 保存数据库
        if (!empty($g->modifyAndRefundStipulateList)) {
            foreach ($g->modifyAndRefundStipulateList as $a) {
                $data_a = json_encode($a);
                $a1 = json_decode($data_a);

                $modifyStipulate = TRUE;
                if (urldecode($a1->modifyStipulate) != '不能改签;') {
                    $modifyStipulate = FALSE;
                }
                $obj = array(
				    'updatetime' => date("Y-m-d H:i:s"),
                    'seatId' => $a1->seatId,
                    'airlineCode' => $a1->airlineCode,
                    'seatCode' => $a1->seatCode,
                    'refundStipulate' => urldecode($a1->refundStipulate),
                    'changeStipulate' => urldecode($a1->changeStipulate),
                    'suitableAirline' => urldecode($a1->suitableAirline),
                    'modifyStipulate' => $modifyStipulate
                );

                $this->db->insert('tuigaiqianzhengce', $obj);
                $id = $this->db->insert_id();
                echo $id;
                $seatId = $a->seatId;
                $modifiedAt = $a->modifiedAt;
            }
        }

        // 如果没有取完就继续取
        if (!empty($g) && $g->leftPages != '0') {
            $this->subUpdate($g, $seatId, $modifiedAt);
        }
    }

    private function subUpdate($shang, $seatId = '', $modifiedAt = '') {
        $ps = new stdClass();
        if (!empty($shang) && $shang->leftPages != '0') {
            $this->load->library('mypost');
            $conf = $this->config->item("conf");

            $url = $conf['Url51Book'] . "getModifyAndRefundStipulatesServiceRestful1.0/getModifyAndRefundStipulates";
            $post_data['agencyCode'] = $conf['Agency51Book'];

            $sign = md5($conf['Agency51Book'] . $seatId . '2000' . $conf['Security51Book']);
            $post_data['sign'] = $sign;
            $post_data['rowPerPage'] = 2000;
            $post_data['lastSeatId'] = $seatId;
            $post_data['lastModifiedAt'] = $modifiedAt;

            $res = $this->mypost->request_post($url, $post_data);
            $xml = simplexml_load_string($res);

            //echo json_encode($xml);
            $g = json_encode($xml);
            // 保存数据库
            if (!empty($g->modifyAndRefundStipulateList)) {
                foreach ($g->modifyAndRefundStipulateList as $a) {
                    $data_a = json_encode($a);
                    $a1 = json_decode($data_a);

                    $modifyStipulate = TRUE;
                    if (urldecode($a1->modifyStipulate) != '不能改签;') {
                        $modifyStipulate = FALSE;
                    }
                    $obj = array(
					    'updatetime' => date("Y-m-d H:i:s"),
                        'seatId' => $a1->seatId,
                        'airlineCode' => $a1->airlineCode,
                        'seatCode' => $a1->seatCode,
                        'refundStipulate' => urldecode($a1->refundStipulate),
                        'changeStipulate' => urldecode($a1->changeStipulate),
                        'suitableAirline' => urldecode($a1->suitableAirline),
                        'modifyStipulate' => $modifyStipulate
                    );
                    $this->db->insert('tuigaiqianzhengce', $obj);
                    $seatId = $a->seatId;
                    $modifiedAt = $a->modifiedAt;
                }
                $ps->g = $g;
            }
        }
        $ps->seatId = $seatId;
        $ps->modifiedAt = $modifiedAt;

        if (!empty($ps->g) && $ps->seatId != '' && $ps->modifiedAt != '') {
            $this->subUpdate($ps->g, $ps->seatId, $ps->modifiedAt);
        }
    }

}