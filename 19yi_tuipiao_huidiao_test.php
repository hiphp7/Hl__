<?php

$txt = $_POST["json_param"];
if(!empty($txt))
{
$myfile = fopen("退票.txt", "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
}

    $myfile = "jieshou.txt";
    $txt = $_POST["json_param"];
    file_put_contents($myfile, $txt, FILE_APPEND);
    $txt = "\r\n";
    file_put_contents($myfile, $txt, FILE_APPEND);

header("Content-type:text/html;charset=utf-8");
ini_set('date.timezone', 'Asia/Shanghai');
//连接数据库
$link = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die('数据库连接失败！</br>错误原因：' . mysql_error());
//设置字符集，如utf8和gbk等，根据数据库的字符集而定
mysql_query("set names 'utf8'");
mysql_select_db('air', $link);
//开始一个事务   
mysql_query("BEGIN");
$str = json_decode($_POST["json_param"]);

if ($str->status == "SUCCESS" || $str->status == "PART") {

    $request_id = $str->request_id;
    $trip_no = $str->trip_no;
    $merchant_order_id = $str->merchant_order_id;
    $order_id = $str->order_id;
    $refund_total_amount = $str->refund_total_amount;
    $refund_type = $str->refund_type;
    $order_userinfo = $str->order_userinfo;
	//var_dump($order_userinfo);
	
    $sql = "select m.id as id ,m.insurance as insurance from train_order as m where order_id ='$order_id'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result,MYSQL_ASSOC);
    mysql_free_result($result);
    $id = $row['id'];
    $insurance = floatval($row['insurance']); // 保险单价
    $baoxiantotal = 0;
    $refund_total = 0;	
	

    foreach ($order_userinfo as $v) {
        if (intval($v->ticket_type) == 0) {
            // 大人
            $sql1 = "update train_order_lvke set
                    ticketStatusName = '已退票'
                    where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids ='$v->user_ids'";
            $result = mysql_query($sql1);
			$baoxiantotal += $insurance; // 保险总额
        } else {
            // 儿童
            $sql2 = "update train_order_lvke set
                    ticketStatusName = '已退票'
                    where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids ='$v->user_ids' and ticketStatusName = '退票中' limit 1";
            mysql_query($sql2);
        }
		$refund_total = $baoxiantotal + floatval($refund_total_amount); // 退款总额
		//查订单总额
		$sql = "select m.id as id , m.pay_money as pay_money from train_order as m where order_id ='$order_id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result,MYSQL_ASSOC);
		$amount = $row['pay_money'];
        // 差额退款
        $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
        $get_data = array('transaction_id' => '', 'out_trade_no' => $merchant_order_id, 'total_fee' => floatval($amount)*100, 'refund_fee' => floatval($refund_total)*100);

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
		

        if (strpos($data, '成功')) {
            // 修改退票订单
            $sql3 = "update train_tuipiao_dingdan set
            trip_no = '$trip_no',
            zhuangtai = '5',
            refund_type = '$refund_type',
			refund_baoxian_amount = '$baoxiantotal',
            refund_total_amount = '$refund_total_amount'
            where shenqinghao = '$request_id'";
            $result = mysql_query($sql3);
        } else {
            // 修改退票订单
            $sql4 = "update train_tuipiao_dingdan set
            trip_no = '$trip_no',
            zhuangtai = '4',
            refund_type = '$refund_type',
			refund_baoxian_amount = '$baoxiantotal',
            refund_total_amount = '$refund_total_amount'
            where shenqinghao = '$request_id'";
            $result = mysql_query($sql4);
        }
		// 查看还有没有没退票的人
		$sql_renshu = "select m.id as id,SUM(m.ticketStatusName ='出票完成') as shengyu, SUM(m.ticketStatusName ='退票中') as  zhengtui FROM train_order_lvke as m where m.order_id = '$order_id'";
		
		$result = mysql_query($sql_renshu);
		$row = mysql_fetch_row($result,MYSQL_ASSOC);
		mysql_free_result($result);
		$shengyu = $row['shengyu'];
		$zhengtui = $row['zhengtui'];
		if($shengyu + $zhengtui == 0){
			$sql2 = "update train_order set status = 4 where order_id = '$order_id'";
			$result = mysql_query($sql2);
		}
    }
} else {
    // 修改退票订单
    $sql5 = "update train_tuipiao_dingdan set
            zhuangtai = '3'
            where shenqinghao = '$request_id'";
    mysql_query($sql5);
}

if (mysql_errno()) {
    mysql_query('rollback');
    mysql_close($link);
    echo 'FAILURE';
} else {

    mysql_query('commit');
    mysql_close($link);
    echo 'SUCCESS';
}

