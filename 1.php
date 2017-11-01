<?php
header("Content-type:text/html;charset=utf-8");
require_once('../air/application/libraries/TopSdk.php');

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
		var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
			echo 1;
            return true;
        } else {
			echo 0;
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
		var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
			echo 1;
            return true;
        } else {
			echo 0;
            return false;
        }
    }
    
//连接数据库
$link = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die ('数据库连接失败！</br>错误原因：'.mysql_error());
//设置字符集，如utf8和gbk等，根据数据库的字符集而定
mysql_query("set names 'utf8'");
mysql_select_db('air',$link);

$order_id = "EXHC170506142915771";
// 查询支付订单总额
$sql_dingdan = "select m.id as id ,m.link_name as link_name ,m.pay_money as pay_money ,m.from_station as from_station,m.arrive_station as arrive_station,m.from_time as from_time,m.link_phone as link_phone ,m.refund_amount as refund_amount ,m.refund_status as refund_status, m.train_code as train_code from train_order as m where order_id ='$order_id'";
$result = mysql_query($sql_dingdan);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
mysql_free_result($result);
$pay_money = $row['pay_money'];
$from_station = $row['from_station'];
$arrive_station = $row['arrive_station'];
$from_time = $row['from_time'];
$date = date("Y-m-d H:i:s", strtotime($from_time));
$deptime = date("H:i", strtotime($from_time));
$link_phone = $row['link_phone'];
$train_code = $row['train_code'];
$refund_amount = $row['refund_amount'];
$refund_status = $row['refund_status'];
$link_name = $row['link_name'];
$phone = "4009917909";

$str ="差额退款".$refund_amount."元，";

	//$myalidayu = new myalidayu();
//	echo huochechupiao1($link_name, $link_phone, $date,$from_station,  $arrive_station, $train_code, $deptime);
        echo huochechupiao2($link_name, $link_phone, $date, $from_station, $arrive_station, $train_code, $deptime,$refund_amount);




/*

$amount = "357.0";
$refund_amount = "357.0";
$merchant_order_id = "hc201701211857025";
	// 差额退款
	$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
    $get_data = array('transaction_id' => '', 'out_trade_no' => $merchant_order_id, 'total_fee' => floatval($amount), 'refund_fee' => floatval($refund_amount));


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
	
	$myfile = "newfile.txt";
$txt = $data;
file_put_contents($myfile, $txt, FILE_APPEND);
$txt = "\r\n";
file_put_contents($myfile, $txt, FILE_APPEND);

*/