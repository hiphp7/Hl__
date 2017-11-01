<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 订单处理
 */
class order extends CI_Controller {

    // 改签支付
    public function zhifu() {
        $dingdanhao = $this->input->get('out_trade_no');
        $fukuanshijian = $this->input->get('fukuanshijian');
        $totalprice = $this->input->get('total_fee');

        $y = substr($fukuanshijian, 0, 4);
        $m = substr($fukuanshijian, 4, 2);
        $d = substr($fukuanshijian, 6, 2);
        $h = substr($fukuanshijian, 8, 2);
        $i = substr($fukuanshijian, 10, 2);
        $s = substr($fukuanshijian, 12, 2);
        $fukuanshijianall = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $i . ':' . $s;
        $dingdanid = substr($dingdanhao, 16); // 订单id

        $sql = "select m.fukuanshijian AS fukuanshijian FROM dingdan as m WHERE m.id = ?";
        $query = $this->db->query($sql, array($dingdanid));
        $dingdan = $query->row();
        $fukuanshijian = $dingdan->fukuanshijian;
        if(empty($fukuanshijian)){
            $this->db->trans_begin();
            $obj = array(
                'dingdanzhuangtai' => 1,
                'chupiaozhuangtai' => 0,
                'zhifufangshi' => 2,
                'dingdanhao' => $dingdanhao,
                'fukuanshijian' => $fukuanshijianall);
            $this->db->update('dingdan', $obj, array('id' => $dingdanid));
            $this->db->update('hangchenglvke', array('zhuangtai' => '出票中'), array('dingdanid' => $dingdanid));

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                // 失败回滚的时候要把钱退掉
                $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
                $get_data = array('transaction_id' => '', 'out_trade_no' => $dindanhao, 'total_fee' => floatval($totalprice) * 100, 'refund_fee' => floatval($totalprice) * 100);
                $resutl = $this->request_get($url, $get_data);
                echo 'fasle';
            } else {
                $this->db->trans_commit();
                $this->load->library('sendmessage');
                $data = $this->sendmessage->send('@all','你有一个新的<国内机票>订单，请及时处理');
                $myfile = "sendmessage.txt";
                $txt = $data.'--订单号:'.$dingdanhao.'付款时间:'.$fukuanshijianall;
                file_put_contents($myfile, $txt, FILE_APPEND);
                $txt = "\r\n";
                file_put_contents($myfile, $txt, FILE_APPEND);
                echo 'true';
            }            

        } else{
            echo 'true';
        }
    }

    // 获取退签改
    public function tuigaiqian_localDb($airlineCode, $seatCode) {
        //$airlineCode = $this->input->post('aircode');
        //$seatCode = $this->input->post('seatCode');
        $this->db->trans_begin();
        $sql = 'select m.seatId as seatId,
			        m.airlineCode as airlineCode,
			        m.seatCode as seatCode,
			        m.refundStipulate as refundStipulate,
			        m.changeStipulate as changeStipulate,
			        m.suitableAirline as suitableAirline,
			        m.modifyStipulate as modifyStipulate from tuigaiqianzhengce as m where airlineCode = ? and seatCode =? ';
        $query = $this->db->query($sql, array($airlineCode, $seatCode));
        $adult = $query->row();

        $sql = 'select m.seatId as seatId,
			        m.airlineCode as airlineCode,
			        m.seatCode as seatCode,
			        m.refundStipulate as refundStipulate,
			        m.changeStipulate as changeStipulate,
			        m.suitableAirline as suitableAirline,
			        m.modifyStipulate as modifyStipulate from tuigaiqianzhengce as m where airlineCode = ? and seatCode = "Y" ';
        $query = $this->db->query($sql, array($airlineCode));
        $child = $query->row();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 'fasle';
        } else {
            $this->db->trans_commit();
            $data = new stdClass();
            $data->adult = $adult;
            $data->child = $child;
            return json_encode($data);
        }
    }

    // 获取退签改
    public function tuigaiqian() {
        date_default_timezone_set("Asia/Shanghai");
        $airport = $this->config->item("airport_short"); //机场
        //出发日期
        $depDate = $this->input->post('date');
        //航空公司
        $airlineCode = $this->input->post('aircode');
        //出发机场三字码
        $depCode = array_search($this->input->post('orgAirport'), $airport);
        //目的机场三字码
        $arrCode = array_search($this->input->post('dstAirport'), $airport);
        //舱位
        $classCode = $this->input->post('seatCode');

        $this->load->library('mypost');
        $conf = $this->config->item("conf");

        //返回成功与否判断
        $returnStatus = "true";
        //echo $this->tuigaiqian_localDb($airlineCode, $classCode);
        //die();
        // 成人
        $url = $conf['Url51Book'] . "getModifyAndRefundStipulateServiceRestful1.0/getModifyAndRefundStipulate";
        $post_data['agencyCode'] = $conf['Agency51Book'];
        $sign = md5($conf['Agency51Book'] . $airlineCode . $arrCode . $classCode . $depCode . $depDate . $conf['Security51Book']);
        $post_data['sign'] = $sign;
        $post_data['depDate'] = $depDate;
        $post_data['airlineCode'] = $airlineCode;
        $post_data['classCode'] = $classCode;
        $post_data['depCode'] = $depCode;
        $post_data['arrCode'] = $arrCode;
        $res = $this->mypost->request_post($url, $post_data);
        $g = simplexml_load_string($res);
        if (!empty($g) && $g->returnCode == 'S') {
            $adult = new stdClass();
            //条目id
            $adult->seatId = $g->modifyAndRefundStipulateList->seatId;
            //航空公司二字码
            $adult->airlineCode = $airlineCode;

            //$adult->airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
            //舱位码
            $adult->seatCode = $g->modifyAndRefundStipulateList->seatCode;
            //舱位级别
            $adult->seatType = $g->modifyAndRefundStipulateList->seatType;
            //服务级别
            $adult->serviceLevel = $g->modifyAndRefundStipulateList->serviceLevel;
            //退票规定
            $adult->refundStipulate = urldecode($g->modifyAndRefundStipulateList->refundStipulate);
            //更改规定
            $adult->changeStipulate = urldecode($g->modifyAndRefundStipulateList->changeStipulate);
            //适用航线
            $suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
            $a = (array) $suitableAirline;
            $a = $a[0];
            $adult->suitableAirline = $a;
            //$adult->suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
            //签转规定
            $modifyStipulate = "可以改签";
            if (urldecode($g->modifyAndRefundStipulateList->modifyStipulate) == '不能改签;') {
                $modifyStipulate = "不能改签";
            }
            $adult->modifyStipulate = $modifyStipulate;
        } else {
            $returnStatus = "false";
        }

        // 儿童
        $url = $conf['Url51Book'] . "getModifyAndRefundStipulateServiceRestful1.0/getModifyAndRefundStipulate";
        $post_data['agencyCode'] = $conf['Agency51Book'];
        $sign = md5($conf['Agency51Book'] . $airlineCode . $arrCode . "Y" . $depCode . $depDate . $conf['Security51Book']);
        $post_data['sign'] = $sign;
        $post_data['depDate'] = $depDate;
        $post_data['airlineCode'] = $airlineCode;
        $post_data['classCode'] = "Y";
        $post_data['depCode'] = $depCode;
        $post_data['arrCode'] = $arrCode;
        $res = $this->mypost->request_post($url, $post_data);
        $g = simplexml_load_string($res);
        if (!empty($g) && $g->returnCode == 'S') {
            $child = new stdClass();
            //条目id
            $child->seatId = $g->modifyAndRefundStipulateList->seatId;
            //航空公司二字码
            //$airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
            //$airlineCode = strval($airlineCode);
            //$child->airlineCode = $airlineCode[0];
            $child->airlineCode = $airlineCode;
            //$child->airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
            //舱位码
            $child->seatCode = $g->modifyAndRefundStipulateList->seatCode;
            //舱位级别
            $child->seatType = $g->modifyAndRefundStipulateList->seatType;
            //服务级别
            $child->serviceLevel = $g->modifyAndRefundStipulateList->serviceLevel;
            //退票规定
            $child->refundStipulate = urldecode($g->modifyAndRefundStipulateList->refundStipulate);
            //更改规定
            $child->changeStipulate = urldecode($g->modifyAndRefundStipulateList->changeStipulate);
            //适用航线
            $suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
            $a = (array) $suitableAirline;
            $a = $a[0];
            $child->suitableAirline = $a;
            //签转规定
            $modifyStipulate = "可以改签";
            if (urldecode($g->modifyAndRefundStipulateList->modifyStipulate) == '不能改签;') {
                $modifyStipulate = "不能改签";
            }
            $child->modifyStipulate = $modifyStipulate;
        } else {
            $returnStatus = "false";
        }
        if ($returnStatus == "true") {
            $data = new stdClass();
            $data->adult = $adult;
            $data->child = $child;
            echo json_encode($data);
        } else {
            echo "false";
        }
    }

    public function chahangchengtuigaiqian_lao() {
        $hangchengid = $this->input->post('hangchengid');

        $sql = 'select m.refundStipulate as refundStipulate,
			        m.changeStipulate as changeStipulate,
			        m.suitableAirline as suitableAirline,
			        m.modifyStipulate as modifyStipulate,
			        m.refundStipulateChild as refundStipulateChild,
			        m.changeStipulateChild as changeStipulateChild,
			        m.modifyStipulateChild as modifyStipulateChild,
			        m.suitableAirlineChild as suitableAirlineChild from hangcheng as m where id = ? ';
        $query = $this->db->query($sql, array($hangchengid));
        $res = $query->row();
        if (!empty($query)) {
            $adult = new stdClass();
            $adult->refundStipulate = $res->refundStipulate;
            $adult->changeStipulate = $res->changeStipulate;
            $adult->suitableAirline = $res->suitableAirline;
            $adult->modifyStipulate = $res->modifyStipulate;
            $child = new stdClass();
            $child->refundStipulate = $res->refundStipulateChild;
            $child->changeStipulate = $res->changeStipulateChild;
            $child->suitableAirline = $res->suitableAirlineChild;
            $child->modifyStipulate = $res->modifyStipulateChild;

            $data = new stdClass();
            $data->adult = $adult;
            $data->child = $child;
            echo json_encode($data);
        } else {
            echo 'false';
        }
    }

   public function chahangchengtuigaiqian() {
        $hangchengid = $this->input->post('hangchengid');
        $sql = "select m.adult_tuigaiid as adult_tuigaiid ,m.child_tuigaiid as child_tuigaiid from hangcheng as m where m.id = ?";
        $query = $this->db->query($sql, array($hangchengid));
        $res = $query->row();

        
        $adult_tuigaiid = $res->adult_tuigaiid;
        $child_tuigaiid = $res->child_tuigaiid;
        $data = Array();
        
      $sql_adult = "select m.id as id, m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,
          m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,
          m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,
          m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,
          m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,
          m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from order_tuigaiguize as m 
          where m.id =?";      
        $query_adult = $this->db->query($sql_adult, array($adult_tuigaiid));
        $data[0] = $query_adult->last_row("array");       
         $sql_child= "select m.id as id, m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,
          m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,
          m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,
          m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,
          m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,
          m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from order_tuigaiguize as m 
          where m.id =?";      
        $query_child = $this->db->query($sql_child, array($child_tuigaiid));
        $data[1] = $query_child->last_row("array");
		if(!empty($data)){				
			foreach ($data as $k=>$v) {
				//   提前更改费率
				if ($data[$k]['changePercentAfter'] =="0") {
					$data[$k]['changePercentAfter'] = "免费";
				} elseif ($data[$k]['changePercentAfter'] =="100") {
					$data[$k]['changePercentAfter'] = "不得退票";
				} else {
					$data[$k]['changePercentAfter'] = $data[$k]['changePercentAfter'].'%';
				}

				if ($data[$k]['changePercentBefore'] =="0") {
					$data[$k]['changePercentBefore'] = "免费";
				} elseif ($data[$k]['changePercentBefore'] =="100") {
					$data[$k]['changePercentBefore'] = "不得退票";
				} else {
					$data[$k]['changePercentBefore'] = $data[$k]['changePercentBefore'].'%';
				}

				if ($data[$k]['refundPercentAfter'] =="0") {
					$data[$k]['refundPercentAfter'] = "免费";
				} elseif ($data[$k]['refundPercentAfter'] =="100") {
					$data[$k]['refundPercentAfter'] = "不得退票";
				} else {
					$data[$k]['refundPercentAfter'] = $data[$k]['refundPercentAfter'].'%';
				}

				if ($data[$k]['changePercentAdvance'] =="0") {
					$data[$k]['changePercentAdvance'] = "免费";
				} elseif ($data[$k]['changePercentAdvance'] =="100") {
					$data[$k]['changePercentAdvance'] = "不得退票";
				} else {
					$data[$k]['changePercentAdvance'] = $data[$k]['changePercentAdvance'].'%';
				}

				if ($data[$k]['refundPercentBefore'] =="0") {
					$data[$k]['refundPercentBefore'] = "免费";
				} elseif ($data[$k]['refundPercentBefore'] =="100") {
					$data[$k]['refundPercentBefore'] = "不得退票";
				} else {
					$data[$k]['refundPercentBefore'] = $data[$k]['refundPercentBefore'].'%';
				}

				if ($data[$k]['refundPercentAdvance'] =="0") {
					$data[$k]['refundPercentAdvance'] = "免费";
				} elseif ($data[$k]['refundPercentAdvance'] =="100") {
					$data[$k]['refundPercentAdvance'] = "不得退票";
				} else {
					$data[$k]['refundPercentAdvance'] = $data[$k]['refundPercentAdvance'].'%';
				}
			}		
			
			echo json_encode($data);
		} else {
			echo "false";
		}
            
    }
    public function save() {
        
        // 加载乘客
        $this->load->model("yonghu/mlvkei", "mlvkei");
        // 加载用户地址 (用于收邮件)
        $this->load->model("yonghu/myonghudizhi", "myonghudizhi");
        // 加载订单
        $this->load->model("dingdan/mdingdan", "mdingdan");
        // 加载航程
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        // 支付完成传递过来的订单号
        $dindanhao = $this->input->post('orderid');
        // 收件地址需保存订单中
        $mail = json_decode($this->input->post('mail'));
        // 航程 保险信息
        $selected = json_decode($this->input->post('selected'));
        // 获取旅客数据
        $lvke = json_decode($this->input->post('userContacts'));
        // 获取地址列表
        $addressList = json_decode($this->input->post('addressList'));
        // 获取保险
        $baoxian = json_decode($this->input->post('Insurance'));
        //联系人
        $currentContact = json_decode($this->input->post('currentContact'));
        // 价格
        $costdetail = json_decode($this->input->post('costdetail'));
        // 发票
        $air_taitou = json_decode($this->input->post('air_taitou'));

        $yonghuid = $currentContact->id; // 用户id
        $lianxirendianhua = $currentContact->shoujihaoma; // 联系人手机号码
        $lianxiren = $currentContact->xingming; // 姓名

        $sf = $this->input->post('sf');
		// 开启事务
		$this->db->trans_begin();		
		$sql = "select m.id as id from dingdan as m where m.dingdanhao = ?";
		$query = $this->db->query($sql, array($dindanhao));

		if($query->num_rows() > 0){
            $this->db->trans_commit();
			echo "false"; //已经有订单号返回
            die();
		} else {
	


			// 第一步：
			// 添加订单
			$dingdan_obj = $this->mdingdan->getSaveObj($yonghuid, $costdetail, $mail);

			if ($air_taitou->isTaitou) {
				$dingdan_obj->fapiaoleixing = $air_taitou->type;
				$dingdan_obj->fapiaomingzi = $air_taitou->name;
				$dingdan_obj->qiyeshuihao = $air_taitou->shuihao;
				$dingdan_obj->istaitou = 1;
			}

			if (!empty($sf)) {
				$dingdan_obj->sf = $sf;
			} else {
				$dingdan_obj->sf = '';
			}
			
			$shanghuhao =  $currentContact->shanghuhao;
			$dingdan_obj->shanghuhao = $shanghuhao; 

			// 保存订单
			$this->db->insert('dingdan', $dingdan_obj);
			$dingdanid = $this->db->insert_id();


			// 生成订单号
			$this->db->update('dingdan', array('dingdanhao' => $dindanhao), array('id' => $dingdanid));

			// 第二步：
			// 添加航程
			// 添加后 再传入航程
			$lvke = $this->gethangchenglvke($lvke, $yonghuid);
			$hc_obj_ar = $this->mhangcheng->getSaveObj($selected, $dingdan_obj, $dingdanid, $lvke, $baoxian, $costdetail);
			$index = 0;
			foreach ($hc_obj_ar as $hc_obj) {
				//$hc_obj = $this->mhangcheng->getSaveObj($selected, $dingdan_obj, $dingdanid, $lvke, $baoxian);
				
				$adult_tuigai = $hc_obj->adult_tuigai;
				$this->db->insert('order_tuigaiguize', $adult_tuigai);
				$adult_tuigaiid= $this->db->insert_id();

				$child_tuigai = $hc_obj->child_tuigai;
				$this->db->insert('order_tuigaiguize', $child_tuigai);
				$child_tuigaiid = $this->db->insert_id();

				$hc1 = $hc_obj->hangcheng;
				$hc1->dingdanid = $dingdanid;
				
				$hc1->adult_tuigaiid= $adult_tuigaiid;
				$hc1->child_tuigaiid = $child_tuigaiid;
				
				
				if (count($hc_obj_ar) > 1) {
					// 返程标志
					// $hc1->fanchengbiaozhi = 1; //  0 去程 1返程
					// 往返航程
					$hc1->wangfanhangcheng = 1; //  0 单程 1 往返程
				} else {
					// 往返航程
					$hc1->wangfanhangcheng = 0; //  0 单程 1 往返程
				}
				if ($index == 0) {
					$hc1->fanchengbiaozhi = 0;
				} else {
					$hc1->fanchengbiaozhi = 1;
				}
				$index++;

				// 保存航程信息
				$this->db->insert('hangcheng', $hc1);
				$hangchengid = $this->db->insert_id();
			
				// 保存 航程旅客
				foreach ($hc_obj->lvke as $c) {
					// 第三步：
					// 保存航程旅客
					$lk = $c->lk;
					$lk->dingdanid = $dingdanid;
					$lk->hangchengid = $hangchengid;
					$lk->shifoutuipiao = '否';
					$lk->shifougaiqian = '否';
					
					if ($lk->shifouertong == 0) {
						$lk->tuigaiid = $adult_tuigaiid;
					} else {
						$lk->tuigaiid = $child_tuigaiid;                    
					}
					
					$this->db->insert('hangchenglvke', $lk); //插入航程旅客
					$hangchenglvkeid = $this->db->insert_id();


					// 第四步：
					if (!empty($c->accident)) {
						$accident = $c->accident;
						$accident->dingdanid = $dingdanid;
						$accident->hangchenglvkeid = $hangchenglvkeid;
						$this->db->insert('baoxiandingdan', $accident); //插入保险
						$baoxiandingdanid = $this->db->insert_id();
						$this->db->update('baoxiandingdan', array('baoxiandingdanhao' => "BX" . time() . $baoxiandingdanid), array('id' => $baoxiandingdanid));
					}
					if (!empty($c->dallyover)) {
						$dallyover = $c->dallyover;
						$dallyover->dingdanid = $dingdanid;
						$dallyover->hangchenglvkeid = $hangchenglvkeid;
						$this->db->insert('baoxiandingdan', $dallyover); //插入保险
						$baoxiandingdanid = $this->db->insert_id();
						$this->db->update('baoxiandingdan', array('baoxiandingdanhao' => 'BX' . time() . $baoxiandingdanid), array('id' => $baoxiandingdanid));
					}
					//echo '订单ID：'.$dingdanid.' 航程ID：'. $hangchengid .' 航程旅客ID：'.$hangchenglvkeid.' 保险ID： '.$baoxiandingdanid;
				}
			}
			$wangfanhangcheng = $hc1->wangfanhangcheng;
			$this->db->update('dingdan', array('wangfanhangcheng' => $wangfanhangcheng), array('id' => $dingdanid)); // 往返航程订单

			// 添加乘客
			//foreach ($lvke as $v) {
			//      $this->mlvkei->UpdateSave($yonghuid, $v->zhongwenming, $v->chushengriqi, $v->zhengjianhaoma, array_search(strval($v->zhengjianleixing), $this->config->item('证件类型')), $v->type);
			//}
			// 保存收件地址
			if ($addressList != '') {
				$this->saveaddress($addressList, $yonghuid);
				//foreach ($addressList as $v) {
				//    $this->myonghudizhi->UpdateSave($yonghuid, $v->shoujianrenmingzi, $v->dizhi, $v->shoujihao);
				//}
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

    public function save_lao() {
        $this->db->trans_begin();
        // 加载乘客
        $this->load->model("yonghu/mlvkei", "mlvkei");
        // 加载用户地址 (用于收邮件)
        $this->load->model("yonghu/myonghudizhi", "myonghudizhi");
        // 加载订单
        $this->load->model("dingdan/mdingdan", "mdingdan");
        // 加载航程
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        // 支付完成传递过来的订单号
        $dindanhao = $this->input->post('orderid');
        // 收件地址需保存订单中
        $mail = json_decode($this->input->post('mail'));
        // 航程 保险信息
        $selected = json_decode($this->input->post('selected'));
        // 获取旅客数据
        $lvke = json_decode($this->input->post('userContacts'));
        // 获取地址列表
        $addressList = json_decode($this->input->post('addressList'));
        // 获取保险
        $baoxian = json_decode($this->input->post('Insurance'));
        //联系人
        $currentContact = json_decode($this->input->post('currentContact'));
        // 价格
        $costdetail = json_decode($this->input->post('costdetail'));

        $yonghuid = $currentContact->id; // 用户id
        $lianxirendianhua = $currentContact->shoujihaoma; // 联系人手机号码
        $lianxiren = $currentContact->xingming; // 姓名
        // 第一步：
        // 添加订单
        $dingdan_obj = $this->mdingdan->getSaveObj($yonghuid, $costdetail, $mail);

        $time = $this->chaxun($dindanhao);
        $dingdan_obj->fukuanshijian = $date = date("Y-m-d H:i:s", strtotime($time)); // 付款时间
        // 保存订单
        $this->db->insert('dingdan', $dingdan_obj);
        $dingdanid = $this->db->insert_id();
        // 生成订单号
        $this->db->update('dingdan', array('dingdanhao' => $dindanhao), array('id' => $dingdanid));

        // 第二步：
        // 添加航程
        // 添加后 再传入航程
        $lvke = $this->gethangchenglvke($lvke, $yonghuid);
        $hc_obj_ar = $this->mhangcheng->getSaveObj($selected, $dingdan_obj, $dingdanid, $lvke, $baoxian, $costdetail);
        $index = 0;
        foreach ($hc_obj_ar as $hc_obj) {
            //$hc_obj = $this->mhangcheng->getSaveObj($selected, $dingdan_obj, $dingdanid, $lvke, $baoxian);
            $hc1 = $hc_obj->hangcheng;
            $hc1->dingdanid = $dingdanid;

            if (count($hc_obj_ar) > 1) {
                // 返程标志
                // $hc1->fanchengbiaozhi = 1; //  0 去程 1返程
                // 往返航程
                $hc1->wangfanhangcheng = 1; //  0 单程 1 往返程
            } else {
                // 往返航程
                $hc1->wangfanhangcheng = 0; //  0 单程 1 往返程
            }

            if ($index == 0) {
                $hc1->fanchengbiaozhi = 0;
            } else {
                $hc1->fanchengbiaozhi = 1;
            }
            $index++;

            // 保存航程信息
            $this->db->insert('hangcheng', $hc1);
            $hangchengid = $this->db->insert_id();

            // 保存 航程旅客
            foreach ($hc_obj->lvke as $c) {
                // 第三步：
                // 保存航程旅客
                $lk = $c->lk;
                $lk->dingdanid = $dingdanid;
                $lk->hangchengid = $hangchengid;
                $lk->shifoutuipiao = '否';
                $lk->shifougaiqian = '否';

                $this->db->insert('hangchenglvke', $lk);
                $hangchenglvkeid = $this->db->insert_id();

                // 第四步：
                if (!empty($c->accident)) {
                    $accident = $c->accident;
                    $accident->dingdanid = $dingdanid;
                    $accident->hangchenglvkeid = $hangchenglvkeid;

                    $this->db->insert('baoxiandingdan', $accident);
                    $baoxiandingdanid = $this->db->insert_id();
                    $this->db->update('baoxiandingdan', array('baoxiandingdanhao' => "BX" . time() . $baoxiandingdanid), array('id' => $baoxiandingdanid));
                }
                if (!empty($c->dallyover)) {
                    $dallyover = $c->dallyover;
                    $dallyover->dingdanid = $dingdanid;
                    $dallyover->hangchenglvkeid = $hangchenglvkeid;

                    $this->db->insert('baoxiandingdan', $dallyover);
                    $baoxiandingdanid = $this->db->insert_id();
                    $this->db->update('baoxiandingdan', array('baoxiandingdanhao' => 'BX' . time() . $baoxiandingdanid), array('id' => $baoxiandingdanid));
                }
                //echo '订单ID：'.$dingdanid.' 航程ID：'. $hangchengid .' 航程旅客ID：'.$hangchenglvkeid.' 保险ID： '.$baoxiandingdanid;
            }
        }
        // 添加乘客
        //foreach ($lvke as $v) {
        //      $this->mlvkei->UpdateSave($yonghuid, $v->zhongwenming, $v->chushengriqi, $v->zhengjianhaoma, array_search(strval($v->zhengjianleixing), $this->config->item('证件类型')), $v->type);
        //}
        // 保存收件地址
        if ($addressList != '') {
            $this->saveaddress($addressList, $yonghuid);
            //foreach ($addressList as $v) {
            //    $this->myonghudizhi->UpdateSave($yonghuid, $v->shoujianrenmingzi, $v->dizhi, $v->shoujihao);
            //}
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            // 失败回滚的时候要把钱退掉
            $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
            $get_data = array('transaction_id' => '', 'out_trade_no' => $dindanhao, 'total_fee' => floatval($costdetail->totalprice) * 100, 'refund_fee' => floatval($costdetail->totalprice) * 100);
            $resutl = $this->request_get($url, $get_data);
            echo 'false';
        } else {
            $this->db->trans_commit();

            echo 'true';
        }
		

    }

    // 保存收件地址
    public function saveaddress($addressList, $yonghuid) {
        if (!empty($addressList) && $addressList != '') {
            foreach ($addressList as $v) {
                $obj = array('yonghuid' => $yonghuid,
                    'shoujianrenmingzi' => $v->shoujianrenmingzi,
                    'dizhi' => $v->dizhi,
                    'shoujihao' => $v->shoujihao);
                if ($v->isNew) {
                    $this->db->insert('yonghudizhi', $obj);
                } else {
                    $this->db->update('yonghudizhi', $obj, array('id' => $v->id));
                }
            }
        }
    }

    /**
     * 获取航程旅客并保存旅客信息
     */
    public function gethangchenglvke($lvke, $yonghuid) {
        $data = new stdClass();
        $hangchenglvke = array(); //  买票的乘客
        foreach ($lvke as $v) {
            $data->yonghuid = $yonghuid;
            $data->zhongwenming = $v->zhongwenming;
            $data->chushengriqi = $v->chushengriqi;
            $data->zhengjianhaoma = $v->zhengjianhaoma;
            $data->shifouertong = $v->type;
            $v->shifouertong = $v->type;
            $zhengjianleixing = $this->config->item('证件类型');
            $v->zhengjianleixing = array_search(strval($v->zhengjianleixing), $zhengjianleixing);
            $data->zhengjianleixing = $v->zhengjianleixing;
            $isNew = $v->isNew;
            $chk = $v->chk;
            $isEdit = $v->isEdit;
            if ($isNew == true) {
                $chk = $v->chk;
                if ($chk == true) {
                    $this->db->insert('lvke', $data);
                    $id = $this->db->insert_id();
                    // 插入后取出;
                    $sql = 'select m.id as id, m.yonghuid as yonghuid, m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, m.shifouertong as shifouertong, m.xingbie as xingbie, m.chushengriqi as chushengriqi, m.guoji as guoji, m.zhengjianleixing as zhengjianleixing, m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi, m.chushengdi as chushengdi, m.shoujihao as shoujihao, m.lianxidianhua as lianxidianhua, m.email as email from lvke as m where id = ?';
                    $query = $this->db->query($sql, array($id));
                    $row = $query->row();
                    if (isset($row)) {
                        $hangchenglvke[] = $query->row();
                    }
                } else {
                    $this->db->insert('lvke', $data);
                }
            } else {
                $id = $v->id;
                if ($isEdit == true) {
                    if ($chk == true) {
                        $this->db->where('id', $id);
                        $this->db->update('lvke', $data);
                        $hangchenglvke[] = $v;
                    } else {
                        $this->db->where('id', $id);
                        $this->db->update('lvke', $data);
                    }
                } else {
                    if ($chk == true) {
                        $hangchenglvke[] = $v;
                    }
                }
            }
        }
        return $hangchenglvke;
    }

    /**
     * 模拟get进行url请求
     * @param string $url
     * @param array $get_data
     */
    function request_get($url = '', $get_data = array()) {
        if (empty($url) || empty($get_data)) {
            return false;
        }
        $o = "";
        foreach ($get_data as $k => $v) {
            $o.= "$k=" . urlencode($v) . "&";
        }
        $get_data = substr($o, 0, -1);
        $postUrl = $url . '?' . $get_data;
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch); //运行curl
        curl_close($ch);

        return $data;
    }

    /**
     * 对象数组转为普通数组
     *
     */
    public function object2array($object) {
        if (is_object($object)) {
            $array = array();
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }

    public function tuigai() {
        date_default_timezone_set("Asia/Shanghai");
        $airport = $this->config->item("airport_short"); //机场
        //出发日期
        $depDate = $this->input->post('date');
        //航空公司
        $airlineCode = $this->input->post('aircode');
        //出发机场三字码
        $depCode = array_search($this->input->post('orgAirport'), $airport);
        //目的机场三字码
        $arrCode = array_search($this->input->post('dstAirport'), $airport);
        //舱位
        $classCode = $this->input->post('seatCode');

        $this->load->library('mypost');
        $conf = $this->config->item("conf");

/*

        $airport = $this->config->item("airport_short"); //机场
        //出发日期
        $depDate = "2017-02-21";
        //航空公司
        // $airlineCode = "PN";
        $airlineCode = "SC";
        //出发机场三字码
        $depCode = array_search("新郑机场", $airport);
        //目的机场三字码
        $arrCode = array_search("库尔勒机场", $airport);
        //舱位
        // $classCode = "T";
        $classCode = "V";
*/		
		
        $this->load->library('mypost');
        $this->load->library('book51');
        $conf = $this->config->item("conf");
        $data = Array();
		$all = Array();

        $sql = "select m.airlineCode as airlineCode,m.seatCode as seatCode,m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from tuigaiguize as m where m.kaiguan = 1  and m.airlineCode = ? and m.seatCode = ? ";
        $query = $this->db->query($sql, array($airlineCode, $classCode));
        $res = $query->last_row("array");
        if (empty($res)) {
            // 本地查不到数据时在线查询
            $re = $this->book51->RC5($airlineCode, $arrCode, $classCode, $depCode, $depDate);
            if (!empty($re) && $re->returnCode == 'S') {
                if (!empty($re->modifyAndRefundStipulateList)) {
                    $a = $re->modifyAndRefundStipulateList;
                    $data_a = json_encode($a);
                    $a1 = json_decode($data_a);

                    $modifyStipulate = '0';
                    if (urldecode($a1->modifyStipulate) != '不能改签;') {
                        $modifyStipulate = '1';
                    }
                    $suitableAirline = '*';
                    if (urldecode($a1->suitableAirline) != '适用全部航线') {
                        $suitableAirline = urldecode($a1->suitableAirline);
                    }
                    if (!isset($a1->changeTimePoint)) {
                        $changeTimePoint = '';
                    } else {
                        $changeTimePoint = $a1->changeTimePoint;
                    }
                    if (!isset($a1->refundTimePoint)) {
                        $refundTimePoint = '';
                    } else {
                        $refundTimePoint = $a1->refundTimePoint;
                    }

                    if (!isset($a1->serviceLevel)) {
                        $serviceLevel = '';
                    } else {
                        $serviceLevel = $a1->serviceLevel;
                    }
                    //   提前更改费率
                    if (!isset($a1->changePercentAdvance)) {
                        $changePercentAdvance = '';
                    } else {
                        $changePercentAdvance = $this->tostr($a1->changePercentAdvance);
                    }
                    //   提前退废票率
                    if (!isset($a1->refundPercentAdvance)) {
                        $refundPercentAdvance = '';
                    } else {
                        $refundPercentAdvance = $this->tostr($a1->refundPercentAdvance);
                    }
                    //   提前变更时间点
                    if (!isset($a1->changeTimePointAdvance)) {
                        $changeTimePointAdvance = '';
                    } else {
                        $changeTimePointAdvance = $a1->changeTimePointAdvance;
                    }
                    //   提前退票时间点
                    if (!isset($a1->refundTimePointAadvance)) {
                        $refundTimePointAadvance = '';
                    } else {
                        $refundTimePointAadvance = $a1->refundTimePointAadvance;
                    }
                    $obj = array(
                            'inserttime' => date("Y-m-d H:i:s"),                    
                            'airlineCode' => $a1->airlineCode,
                            'seatCode' => $a1->seatCode,
                            'changePercentAfter' => $this->tostr($a1->changePercentAfter),
                            'changePercentBefore' => $this->tostr($a1->changePercentBefore),
                            'refundPercentAfter' => $this->tostr($a1->refundPercentAfter),
                            'refundPercentBefore' => $this->tostr($a1->refundPercentBefore),
                            'changeTimePoint' => $changeTimePoint,
                            'refundTimePoint' => $refundTimePoint,
                            'changePercentAdvance' => $changePercentAdvance,
                            'refundPercentAdvance' => $refundPercentAdvance,
                            'changeTimePointAdvance' => $changeTimePointAdvance,
                            'refundTimePointAadvance' => $refundTimePointAadvance,
                            'suitableAirline' => $suitableAirline,
                            'modifyStipulate' => $modifyStipulate);

                    $this->db->insert('tuigaiguize', $obj);
                    $id = $this->db->insert_id();
 
                    $data[0] = $obj;
					$all[0] = $obj;
                }
            }
        } else {
            $data[0] = $res;
			$all[0] = $res;			
        }

        $classCode = "Y";
        $sql = "select  m.airlineCode as airlineCode,m.seatCode as seatCode,m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from tuigaiguize as m where m.kaiguan = 1  and m.airlineCode = ? and m.seatCode = ? ";
        $query = $this->db->query($sql, array($airlineCode, $classCode));
        $res = $query->last_row("array");
        if (empty($res)) {
            // 本地查不到数据时在线查询
            $re = $this->book51->RC5($airlineCode, $arrCode, $classCode, $depCode, $depDate);
            if (!empty($re) && $re->returnCode == 'S') {
                if (!empty($re->modifyAndRefundStipulateList)) {
                    $a = $re->modifyAndRefundStipulateList;
                    $data_a = json_encode($a);
                    $a1 = json_decode($data_a);

                    $modifyStipulate = '0';
                    if (urldecode($a1->modifyStipulate) != '不能改签;') {
                        $modifyStipulate = '1';
                    }
                    $suitableAirline = '*';
                    if (urldecode($a1->suitableAirline) != '适用全部航线') {
                        $suitableAirline = urldecode($a1->suitableAirline);
                    }
                    if (!isset($a1->changeTimePoint)) {
                        $changeTimePoint = '';
                    } else {
                        $changeTimePoint = $a1->changeTimePoint;
                    }
                    if (!isset($a1->refundTimePoint)) {
                        $refundTimePoint = '';
                    } else {
                        $refundTimePoint = $a1->refundTimePoint;
                    }

                    if (!isset($a1->serviceLevel)) {
                        $serviceLevel = '';
                    } else {
                        $serviceLevel = $a1->serviceLevel;
                    }

                    //   提前更改费率
                    if (!isset($a1->changePercentAdvance)) {
                        $changePercentAdvance = '';
                    } else {
                        $changePercentAdvance = $this->tostr($a1->changePercentAdvance);
                    }
                    //   提前退废票率
                    if (!isset($a1->refundPercentAdvance)) {
                        $refundPercentAdvance = '';
                    } else {
                        $refundPercentAdvance = $this->tostr($a1->refundPercentAdvance);
                    }
                    //   提前变更时间点
                    if (!isset($a1->changeTimePointAdvance)) {
                        $changeTimePointAdvance = '';
                    } else {
                        $changeTimePointAdvance = $a1->changeTimePointAdvance;
                    }
                    //   提前退票时间点
                    if (!isset($a1->refundTimePointAadvance)) {
                        $refundTimePointAadvance = '';
                    } else {
                        $refundTimePointAadvance = $a1->refundTimePointAadvance;
                    }
                    $obj = array(
                            'inserttime' => date("Y-m-d H:i:s"),
                            'airlineCode' => $a1->airlineCode,
                            'seatCode' => $a1->seatCode,
                            'changePercentAfter' => $this->tostr($a1->changePercentAfter),
                            'changePercentBefore' => $this->tostr($a1->changePercentBefore),
                            'refundPercentAfter' => $this->tostr($a1->refundPercentAfter),
                            'refundPercentBefore' => $this->tostr($a1->refundPercentBefore),
                            'changeTimePoint' => $changeTimePoint,
                            'refundTimePoint' => $refundTimePoint,
                            'changePercentAdvance' => $changePercentAdvance,
                            'refundPercentAdvance' => $refundPercentAdvance,
                            'changeTimePointAdvance' => $changeTimePointAdvance,
                            'refundTimePointAadvance' => $refundTimePointAadvance,
                            'suitableAirline' => $suitableAirline,
                            'modifyStipulate' => $modifyStipulate);

                    $this->db->insert('tuigaiguize', $obj);
                    $id = $this->db->insert_id();

                    $data[1] = $obj;
					$all[1] = $obj;	
	
                }
            }
        } else {
            $data[1] = $res;
			$all[1] = $res;				
        }
		

        foreach ($data as $k=>$v) {
            //   提前更改费率
            if ($data[$k]['changePercentAfter'] =="0") {
                $data[$k]['changePercentAfter'] = "免费";
            } elseif ($data[$k]['changePercentAfter'] =="100") {
                $data[$k]['changePercentAfter'] = "不得退票";
            } else {
                $data[$k]['changePercentAfter'] = $data[$k]['changePercentAfter'].'%';
            }

            if ($data[$k]['changePercentBefore'] =="0") {
                $data[$k]['changePercentBefore'] = "免费";
            } elseif ($data[$k]['changePercentBefore'] =="100") {
                $data[$k]['changePercentBefore'] = "不得退票";
            } else {
                $data[$k]['changePercentBefore'] = $data[$k]['changePercentBefore'].'%';
            }

            if ($data[$k]['refundPercentAfter'] =="0") {
                $data[$k]['refundPercentAfter'] = "免费";
            } elseif ($data[$k]['refundPercentAfter'] =="100") {
                $data[$k]['refundPercentAfter'] = "不得退票";
            } else {
                $data[$k]['refundPercentAfter'] = $data[$k]['refundPercentAfter'].'%';
            }

            if ($data[$k]['changePercentAdvance'] =="0") {
                $data[$k]['changePercentAdvance'] = "免费";
            } elseif ($data[$k]['changePercentAdvance'] =="100") {
                $data[$k]['changePercentAdvance'] = "不得退票";
            } else {
                $data[$k]['changePercentAdvance'] = $data[$k]['changePercentAdvance'].'%';
            }

            if ($data[$k]['refundPercentBefore'] =="0") {
                $data[$k]['refundPercentBefore'] = "免费";
            } elseif ($data[$k]['refundPercentBefore'] =="100") {
                $data[$k]['refundPercentBefore'] = "不得退票";
            } else {
                $data[$k]['refundPercentBefore'] = $data[$k]['refundPercentBefore'].'%';
            }

            if ($data[$k]['refundPercentAdvance'] =="0") {
                $data[$k]['refundPercentAdvance'] = "免费";
            } elseif ($data[$k]['refundPercentAdvance'] =="100") {
                $data[$k]['refundPercentAdvance'] = "不得退票";
            } else {
                $data[$k]['refundPercentAdvance'] = $data[$k]['refundPercentAdvance'].'%';
            }
        }
		
		$data['all'] = $all;
		
        echo json_encode($data);
    }

    // 百分号去小数点后面0
    public function tostr($baifenshu){
        $s = explode('.',$baifenshu);
        if ($s[1]==0) {
            return $s[0];
        } else{
            return $str;
        }
    }
    public function tuigai_test() {
        date_default_timezone_set("Asia/Shanghai");
        $airport = $this->config->item("airport_short"); //机场
        //出发日期
        $depDate = $this->input->post('date');
        //航空公司
        $airlineCode = $this->input->post('aircode');
        //出发机场三字码
        $depCode = array_search($this->input->post('orgAirport'), $airport);
        //目的机场三字码
        $arrCode = array_search($this->input->post('dstAirport'), $airport);
        //舱位
        $classCode = $this->input->post('seatCode');

        $this->load->library('mypost');
        $conf = $this->config->item("conf");



        $airport = $this->config->item("airport_short"); //机场
        //出发日期
        $depDate = "2017-02-21";
        //航空公司
        // $airlineCode = "PN";
        $airlineCode = "HO";
        //出发机场三字码
        $depCode = array_search("虹桥机场", $airport);
        //目的机场三字码
        $arrCode = array_search("首都机场", $airport);
        //舱位
        // $classCode = "T";
        $classCode = "Q";
		
		
        $this->load->library('mypost');
        $this->load->library('book51');
        $conf = $this->config->item("conf");
        $data = Array();
		$all = Array();

        $sql = "select m.airlineCode as airlineCode,m.seatCode as seatCode,m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from tuigaiguize as m where m.kaiguan = 1  and m.airlineCode = ? and m.seatCode = ? ";
        $query = $this->db->query($sql, array($airlineCode, $classCode));
        $res = $query->last_row("array");
        if (empty($res)) {
            // 本地查不到数据时在线查询
            $re = $this->book51->RC5($airlineCode, $arrCode, $classCode, $depCode, $depDate);
            if (!empty($re) && $re->returnCode == 'S') {
                if (!empty($re->modifyAndRefundStipulateList)) {
                    $a = $re->modifyAndRefundStipulateList;
                    $data_a = json_encode($a);
                    $a1 = json_decode($data_a);

                    $modifyStipulate = '0';
                    if (urldecode($a1->modifyStipulate) != '不能改签;') {
                        $modifyStipulate = '1';
                    }
                    $suitableAirline = '*';
                    if (urldecode($a1->suitableAirline) != '适用全部航线') {
                        $suitableAirline = urldecode($a1->suitableAirline);
                    }
                    if (!isset($a1->changeTimePoint)) {
                        $changeTimePoint = '';
                    } else {
                        $changeTimePoint = $a1->changeTimePoint;
                    }
                    if (!isset($a1->refundTimePoint)) {
                        $refundTimePoint = '';
                    } else {
                        $refundTimePoint = $a1->refundTimePoint;
                    }

                    if (!isset($a1->serviceLevel)) {
                        $serviceLevel = '';
                    } else {
                        $serviceLevel = $a1->serviceLevel;
                    }
                    //   提前更改费率
                    if (!isset($a1->changePercentAdvance)) {
                        $changePercentAdvance = '';
                    } else {
                        $changePercentAdvance = $this->tostr($a1->changePercentAdvance);
                    }
                    //   提前退废票率
                    if (!isset($a1->refundPercentAdvance)) {
                        $refundPercentAdvance = '';
                    } else {
                        $refundPercentAdvance = $this->tostr($a1->refundPercentAdvance);
                    }
                    //   提前变更时间点
                    if (!isset($a1->changeTimePointAdvance)) {
                        $changeTimePointAdvance = '';
                    } else {
                        $changeTimePointAdvance = $a1->changeTimePointAdvance;
                    }
                    //   提前退票时间点
                    if (!isset($a1->refundTimePointAadvance)) {
                        $refundTimePointAadvance = '';
                    } else {
                        $refundTimePointAadvance = $a1->refundTimePointAadvance;
                    }
                    $obj = array(
                            'inserttime' => date("Y-m-d H:i:s"),                    
                            'airlineCode' => $a1->airlineCode,
                            'seatCode' => $a1->seatCode,
                            'changePercentAfter' => $this->tostr($a1->changePercentAfter),
                            'changePercentBefore' => $this->tostr($a1->changePercentBefore),
                            'refundPercentAfter' => $this->tostr($a1->refundPercentAfter),
                            'refundPercentBefore' => $this->tostr($a1->refundPercentBefore),
                            'changeTimePoint' => $changeTimePoint,
                            'refundTimePoint' => $refundTimePoint,
                            'changePercentAdvance' => $changePercentAdvance,
                            'refundPercentAdvance' => $refundPercentAdvance,
                            'changeTimePointAdvance' => $changeTimePointAdvance,
                            'refundTimePointAadvance' => $refundTimePointAadvance,
                            'suitableAirline' => $suitableAirline,
                            'modifyStipulate' => $modifyStipulate);

                    $this->db->insert('tuigaiguize', $obj);

                    $id = $this->db->insert_id();
     
                    $data[0] = $obj;
					$all[0] = $obj;
                }
            }
        } else {
            $data[0] = $res;
			$all[0] = $res;			
        }

        $classCode = "Y";
        $sql = "select m.airlineCode as airlineCode,m.seatCode as seatCode,m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from tuigaiguize as m where m.kaiguan = 1  and m.airlineCode = ? and m.seatCode = ? ";
        $query = $this->db->query($sql, array($airlineCode, $classCode));
        $res = $query->last_row("array");
        if (empty($res)) {
            // 本地查不到数据时在线查询
            $re = $this->book51->RC5($airlineCode, $arrCode, $classCode, $depCode, $depDate);
            if (!empty($re) && $re->returnCode == 'S') {
                if (!empty($re->modifyAndRefundStipulateList)) {
                    $a = $re->modifyAndRefundStipulateList;
                    $data_a = json_encode($a);
                    $a1 = json_decode($data_a);

                    $modifyStipulate = '0';
                    if (urldecode($a1->modifyStipulate) != '不能改签;') {
                        $modifyStipulate = '1';
                    }
                    $suitableAirline = '*';
                    if (urldecode($a1->suitableAirline) != '适用全部航线') {
                        $suitableAirline = urldecode($a1->suitableAirline);
                    }
                    if (!isset($a1->changeTimePoint)) {
                        $changeTimePoint = '';
                    } else {
                        $changeTimePoint = $a1->changeTimePoint;
                    }
                    if (!isset($a1->refundTimePoint)) {
                        $refundTimePoint = '';
                    } else {
                        $refundTimePoint = $a1->refundTimePoint;
                    }

                    if (!isset($a1->serviceLevel)) {
                        $serviceLevel = '';
                    } else {
                        $serviceLevel = $a1->serviceLevel;
                    }

                    //   提前更改费率
                    if (!isset($a1->changePercentAdvance)) {
                        $changePercentAdvance = '';
                    } else {
                        $changePercentAdvance = $this->tostr($a1->changePercentAdvance);
                    }
                    //   提前退废票率
                    if (!isset($a1->refundPercentAdvance)) {
                        $refundPercentAdvance = '';
                    } else {
                        $refundPercentAdvance = $this->tostr($a1->refundPercentAdvance);
                    }
                    //   提前变更时间点
                    if (!isset($a1->changeTimePointAdvance)) {
                        $changeTimePointAdvance = '';
                    } else {
                        $changeTimePointAdvance = $a1->changeTimePointAdvance;
                    }
                    //   提前退票时间点
                    if (!isset($a1->refundTimePointAadvance)) {
                        $refundTimePointAadvance = '';
                    } else {
                        $refundTimePointAadvance = $a1->refundTimePointAadvance;
                    }
                    $obj = array(
                            'inserttime' => date("Y-m-d H:i:s"),
                            'airlineCode' => $a1->airlineCode,
                            'seatCode' => $a1->seatCode,
                            'changePercentAfter' => $this->tostr($a1->changePercentAfter),
                            'changePercentBefore' => $this->tostr($a1->changePercentBefore),
                            'refundPercentAfter' => $this->tostr($a1->refundPercentAfter),
                            'refundPercentBefore' => $this->tostr($a1->refundPercentBefore),
                            'changeTimePoint' => $changeTimePoint,
                            'refundTimePoint' => $refundTimePoint,
                            'changePercentAdvance' => $changePercentAdvance,
                            'refundPercentAdvance' => $refundPercentAdvance,
                            'changeTimePointAdvance' => $changeTimePointAdvance,
                            'refundTimePointAadvance' => $refundTimePointAadvance,
                            'suitableAirline' => $suitableAirline,
                            'modifyStipulate' => $modifyStipulate);

                    $this->db->insert('tuigaiguize', $obj);
                    $id = $this->db->insert_id();

                    $data[1] = $obj;
					$all[1] = $obj;	
	
                }
            }
        } else {
            $data[1] = $res;
			$all[1] = $res;				
        }
		

        foreach ($data as $k=>$v) {
            //   提前更改费率
            if ($data[$k]['changePercentAfter'] =="0") {
                $data[$k]['changePercentAfter'] = "免费";
            } elseif ($data[$k]['changePercentAfter'] =="100") {
                $data[$k]['changePercentAfter'] = "不得退票";
            } else {
                $data[$k]['changePercentAfter'] = $data[$k]['changePercentAfter'].'%';
            }

            if ($data[$k]['changePercentBefore'] =="0") {
                $data[$k]['changePercentBefore'] = "免费";
            } elseif ($data[$k]['changePercentBefore'] =="100") {
                $data[$k]['changePercentBefore'] = "不得退票";
            } else {
                $data[$k]['changePercentBefore'] = $data[$k]['changePercentBefore'].'%';
            }

            if ($data[$k]['refundPercentAfter'] =="0") {
                $data[$k]['refundPercentAfter'] = "免费";
            } elseif ($data[$k]['refundPercentAfter'] =="100") {
                $data[$k]['refundPercentAfter'] = "不得退票";
            } else {
                $data[$k]['refundPercentAfter'] = $data[$k]['refundPercentAfter'].'%';
            }

            if ($data[$k]['changePercentAdvance'] =="0") {
                $data[$k]['changePercentAdvance'] = "免费";
            } elseif ($data[$k]['changePercentAdvance'] =="100") {
                $data[$k]['changePercentAdvance'] = "不得退票";
            } else {
                $data[$k]['changePercentAdvance'] = $data[$k]['changePercentAdvance'].'%';
            }

            if ($data[$k]['refundPercentBefore'] =="0") {
                $data[$k]['refundPercentBefore'] = "免费";
            } elseif ($data[$k]['refundPercentBefore'] =="100") {
                $data[$k]['refundPercentBefore'] = "不得退票";
            } else {
                $data[$k]['refundPercentBefore'] = $data[$k]['refundPercentBefore'].'%';
            }

            if ($data[$k]['refundPercentAdvance'] =="0") {
                $data[$k]['refundPercentAdvance'] = "免费";
            } elseif ($data[$k]['refundPercentAdvance'] =="100") {
                $data[$k]['refundPercentAdvance'] = "不得退票";
            } else {
                $data[$k]['refundPercentAdvance'] = $data[$k]['refundPercentAdvance'].'%';
            }
        }
		
		$data['all'] = $all;
		
        echo json_encode($data);
    }

    
}
