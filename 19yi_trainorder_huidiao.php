<?php
header("Content-type:text/html;charset=utf-8");
ini_set('date.timezone','Asia/Shanghai');
require_once('../hl/application/libraries/TopSdk.php');
/**
  模板类型:短信通知  
  模板名称:火车出票成功短信通知v5.0
  模板ID: SMS_46725150
   您好${name}，您已购买${date}，${dep}至${arr}的${train}次列车，出发时间${deptime}，座席号请查询订单详细，客服热线：4009917909
 */
function huochechupiao1($name,$tel, $date, $dep,$arr,  $train, $deptime) {
	date_default_timezone_set('Asia/Shanghai');
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req->setSmsType("normal");
	$req->setSmsFreeSignName("比比旅行");
	$req->setSmsParam('{ "name":"' . $name . '", "date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","train":"' . $train . '", "deptime":"' . $deptime . '"}');
	$req->setRecNum($tel);
	$req->setSmsTemplateCode("SMS_46725150");
	
	$client = new TopClient;
	$client->appkey = '23341419';
	$client->secretKey = '0220203b8335451c88ef9e216db8be95';
	$client->format = "json";

	$resp = $client->execute($req);
	if (!empty($resp->result->success) && $resp->result->success == true) {
		return true;
	} else {
		return false;
	}
}

  /**
  模板类型:短信通知
  模板名称:火车出票成功短信通知 - 加退款
  模板ID: SMS_46655133
  您好${name}，您已购买${date}，${dep}至${arr}的${train}次列车，出发时间${deptime}，差额退款${money}元，客服热线：4009917909
 */
function huochechupiao2($name,$tel, $date, $dep,$arr,  $train, $deptime, $money) {
	date_default_timezone_set('Asia/Shanghai');
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req->setSmsType("normal");
	$req->setSmsFreeSignName("比比旅行");
	$req->setSmsParam('{ "name":"' . $name . '", "date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","train":"' . $train . '", "deptime":"' . $deptime . '", "money":"' . $money . '"}');
	$req->setRecNum($tel);
	$req->setSmsTemplateCode("SMS_46655133");
	
	$client = new TopClient;
	$client->appkey = '23341419';
	$client->secretKey = '0220203b8335451c88ef9e216db8be95';
	$client->format = "json";

	$resp = $client->execute($req);
	if (!empty($resp->result->success) && $resp->result->success == true) {
		return true;
	} else {
		return false;
	}
}
    

//连接数据库
$link = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die ('数据库连接失败！</br>错误原因：'.mysql_error());
//设置字符集，如utf8和gbk等，根据数据库的字符集而定
mysql_query("set names 'utf8'");
mysql_select_db('air',$link);   
//开始一个事务   
mysql_query("BEGIN");

$txt = $_POST["json_param"];
if(!empty($txt))
{
$myfile = fopen("TrainOrder.txt", "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
}

$myfile = "chupiao.txt";
$txt = $_POST["json_param"];
file_put_contents($myfile, $txt, FILE_APPEND);
$txt = "\r\n";
file_put_contents($myfile, $txt, FILE_APPEND);

$json_param = json_decode($_POST["json_param"]);
$status = $json_param->status;
$merchant_order_id = $json_param->merchant_order_id;

$amount = $json_param->amount;
$refund_amount = $json_param->refund_amount; // 退款数目
$refund_type = $json_param->refund_type; // 退款类型
$order_id = $json_param->order_id; 
$out_ticket_billno = $json_param->out_ticket_billno; // 12306 出票号
$out_ticket_time = $json_param->out_ticket_time;
$bx_pay_money = $json_param->bx_pay_money;

	// 查询支付订单总额
	$sql_dingdan = "select m.id as id ,m.pay_money as pay_money ,m.from_station as from_station,m.arrive_station as arrive_station,m.from_time as from_time,m.link_phone as link_phone , m.link_name as link_name ,m.refund_amount as refund_amount , m.refund_status as refund_status ,m.train_code as train_code from train_order as m where order_id ='$order_id'";
	$result = mysql_query($sql_dingdan);
	$row = mysql_fetch_row($result,MYSQL_ASSOC);
	mysql_free_result($result);
	$pay_money = $row['pay_money'];
	$from_station = $row['from_station'];
	$arrive_station = $row['arrive_station'];
	$from_time = $row['from_time'];
	$train_code = $row['train_code'];
	$date = date("Y-m-d", strtotime($from_time));
	$deptime = date("H:i", strtotime($from_time));
	$link_phone = $row['link_phone'];
	$link_name = $row['link_name'];
	$refund_status = $row['refund_status']; // 0 没退 1 已退
	$baoxianyou = false; // 保险为空FALSE 
if ($status == "SUCCESS") {
	$lvkelist = $json_param->order_userinfo;
	foreach ($lvkelist as  $v) {
		if (intval($v->ticket_type) == 0) {
			if (!empty($v->bx_code)) {
				$baoxianyou = true;
			}
		}
	};
	if ($baoxianyou) {
		foreach ($lvkelist as  $v) {
			if (intval($v->ticket_type) == 0) {
				// 更新大人
				$sql3 = "update train_order_lvke set bx_channel = '$v->bx_channel',
				 bx_code= '$v->bx_code',
				 bx_price= '$v->bx_price',
				 train_box= '$v->train_box',
				 seat_no= '$v->seat_no' where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids ='$v->user_ids'";
				 mysql_query($sql3);
			}
		}
		
	} else if(intval($refund_status) == 0) {
	
		// 订单出票成功
		$out_ticket_time = date("Y-m-d H:i:s",strtotime($out_ticket_time));  // 出票时间
		$sql = "select m.id as id from train_order as m where order_id ='$order_id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result,MYSQL_ASSOC);
		mysql_free_result($result);
		$id = $row['id'];
		$sql2 = "update train_order set out_ticket_billno = '$out_ticket_billno', 
		refund_amount = '$refund_amount',
		refund_type = '$refund_type',
		status = 2,
		out_ticket_time = '$out_ticket_time' where id = '$id'";
		$result = mysql_query($sql2);

		$lvkelist = $json_param->order_userinfo;

		foreach ($lvkelist as  $v) {
			if (intval($v->ticket_type) == 0) {
				// 更新大人
				$sql3 = "update train_order_lvke set bx_channel = '$v->bx_channel',
				 bx_code= '$v->bx_code',
				 bx_price= '$v->bx_price',
				 shijijiage= '$v->amount',
				 train_box= '$v->train_box',
				 ticketStatusName = '出票完成',
				 seat_no= '$v->seat_no' where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids ='$v->user_ids'";
				 mysql_query($sql3);

			} else {
				// 更新儿童
				$sql4 = "select m.id as id, m.seat_no as seat_no from train_order_lvke as m where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids = '$v->user_ids'";
				$result = mysql_query($sql4);
				$row = array();
				while ($r = mysql_fetch_object($result)) {
					$row[]= $r;
				}
				mysql_free_result($result);
				foreach ($row as $v1) {
					if ($v1->seat_no == "") {
						$id = $v1->id;
						$sql5 = "update train_order_lvke set bx_channel = '$v->bx_channel',
								 bx_code= '$v->bx_code',
								 bx_price= '$v->bx_price',
								 shijijiage= '$v->amount',
								 train_box= '$v->train_box',
								 ticketStatusName = '出票完成',
								 seat_no= '$v->seat_no' where id = '$id'";
						$result = mysql_query($sql5);
					}
				}
			}
		}
	}

} else {
	// 订单出票失败
	$fail_reason = $json_param->fail_reason;  // 失败原因
	$sql5 = "select m.id as id from train_order as m where order_id ='$order_id'";
	$result = mysql_query($sql5);
	$row = mysql_fetch_row($result,MYSQL_ASSOC);
	mysql_free_result($result);
	$id = $row['id'];
	$sql2 = "update train_order set fail_reason = '$fail_reason', 
	refund_amount = '$refund_amount',
	refund_type = '$refund_type',
	status = 7 where id = '$id'";
	$result = mysql_query($sql2);
	
	$lvkelist = $json_param->order_userinfo;
    foreach ($lvkelist as  $v) {
        $sql4 = "select m.id as id, m.seat_no as seat_no from train_order_lvke as m where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids = '$v->user_ids'";
        $result = mysql_query($sql4);
        $row = array();
        while ($r = mysql_fetch_object($result)) {
            $row[]= $r;
        }
        mysql_free_result($result);
        foreach ($row as $v1) {
            $id = $v1->id;
            $sql6 = "update train_order_lvke set bx_channel = '$v->bx_channel',
                     bx_code= '$v->bx_code',
                     bx_price= '$v->bx_price',
                     train_box= '$v->train_box',
                     ticketStatusName = '无法出票',
                     seat_no= '$v->seat_no' where id = '$id'";
            $result = mysql_query($sql6);
		}
	}
}


	if(floatval($refund_amount)>0 && intval($refund_status) == 0 && !$baoxianyou){

		// 差额退款
		$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
		$get_data = array('transaction_id' => '', 'out_trade_no' => $merchant_order_id, 'total_fee' => floatval($pay_money) * 100, 'refund_fee' => floatval($refund_amount) *100);

	 
		$o = "";
		foreach ( $get_data as $k => $v ) 
		{ 
			$o.= "$k=" . urlencode( $v ). "&" ;
		}
		$get_data = substr($o,0,-1);

		$postUrl = $url.'?'.$get_data;
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
		curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		$data = curl_exec($ch);//运行curl
		curl_close($ch);

		// 差额退款状态
		$sql2 = "update train_order set refund_status = 1 where order_id = '$order_id'";
		mysql_query($sql2);
		if($status == "SUCCESS"){
			// 发送短信 退款数
			huochechupiao2($link_name, $link_phone, $date, $from_station, $arrive_station, $train_code, $deptime,$refund_amount);
		}		
	
	} elseif(intval($refund_status) == 0 && !$baoxianyou){
		
		// 差额退款状态
		$sql2 = "update train_order set refund_status = 1 where order_id = '$order_id'";
		mysql_query($sql2);
		if($status == "SUCCESS"){
			// 发送短信
			huochechupiao1($link_name, $link_phone, $date,$from_station,  $arrive_station, $train_code, $deptime);
		}
	}else{
		
	}

if(mysql_errno ()){
    mysql_query('rollback');
    mysql_close($link);
    echo 'FAILURE';

}else{
    mysql_query('commit');
    mysql_close($link);
    if ($baoxianyou || $status != "SUCCESS" ) {
    	echo 'SUCCESS';
    } else {
    	echo 'FAILURE';
    }
}