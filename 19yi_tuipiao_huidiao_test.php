<?php

$txt = $_POST["json_param"];
if(!empty($txt))
{
$myfile = fopen("��Ʊ.txt", "w") or die("Unable to open file!");
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
//�������ݿ�
$link = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die('���ݿ�����ʧ�ܣ�</br>����ԭ��' . mysql_error());
//�����ַ�������utf8��gbk�ȣ��������ݿ���ַ�������
mysql_query("set names 'utf8'");
mysql_select_db('air', $link);
//��ʼһ������   
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
    $insurance = floatval($row['insurance']); // ���յ���
    $baoxiantotal = 0;
    $refund_total = 0;	
	

    foreach ($order_userinfo as $v) {
        if (intval($v->ticket_type) == 0) {
            // ����
            $sql1 = "update train_order_lvke set
                    ticketStatusName = '����Ʊ'
                    where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids ='$v->user_ids'";
            $result = mysql_query($sql1);
			$baoxiantotal += $insurance; // �����ܶ�
        } else {
            // ��ͯ
            $sql2 = "update train_order_lvke set
                    ticketStatusName = '����Ʊ'
                    where order_id = '$order_id' and ticket_type = '$v->ticket_type' and user_ids ='$v->user_ids' and ticketStatusName = '��Ʊ��' limit 1";
            mysql_query($sql2);
        }
		$refund_total = $baoxiantotal + floatval($refund_total_amount); // �˿��ܶ�
		//�鶩���ܶ�
		$sql = "select m.id as id , m.pay_money as pay_money from train_order as m where order_id ='$order_id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result,MYSQL_ASSOC);
		$amount = $row['pay_money'];
        // ����˿�
        $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
        $get_data = array('transaction_id' => '', 'out_trade_no' => $merchant_order_id, 'total_fee' => floatval($amount)*100, 'refund_fee' => floatval($refund_total)*100);

		$o = "";
		foreach ($get_data as $k => $v) {
		$o.= "$k=" . urlencode($v) . "&";
		}
		$get_data = substr($o, 0, -1);

		$postUrl = $url . '?' . $get_data;
		$ch = curl_init(); //��ʼ��curl
		curl_setopt($ch, CURLOPT_URL, $postUrl); //ץȡָ����ҳ
		curl_setopt($ch, CURLOPT_HEADER, 0); //����header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Ҫ����Ϊ�ַ������������Ļ��
		$data = curl_exec($ch); //����curl
		

        if (strpos($data, '�ɹ�')) {
            // �޸���Ʊ����
            $sql3 = "update train_tuipiao_dingdan set
            trip_no = '$trip_no',
            zhuangtai = '5',
            refund_type = '$refund_type',
			refund_baoxian_amount = '$baoxiantotal',
            refund_total_amount = '$refund_total_amount'
            where shenqinghao = '$request_id'";
            $result = mysql_query($sql3);
        } else {
            // �޸���Ʊ����
            $sql4 = "update train_tuipiao_dingdan set
            trip_no = '$trip_no',
            zhuangtai = '4',
            refund_type = '$refund_type',
			refund_baoxian_amount = '$baoxiantotal',
            refund_total_amount = '$refund_total_amount'
            where shenqinghao = '$request_id'";
            $result = mysql_query($sql4);
        }
		// �鿴����û��û��Ʊ����
		$sql_renshu = "select m.id as id,SUM(m.ticketStatusName ='��Ʊ���') as shengyu, SUM(m.ticketStatusName ='��Ʊ��') as  zhengtui FROM train_order_lvke as m where m.order_id = '$order_id'";
		
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
    // �޸���Ʊ����
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

