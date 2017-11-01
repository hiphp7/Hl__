<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('TopSdk.php');

class myalidayu {

    //private $url = 'https://eco.taobao.com/router/rest';
    private $client;

    function __construct() {

        $this->client = new TopClient;
        $this->client->appkey = '23341419';
        $this->client->secretKey = '0220203b8335451c88ef9e216db8be95';
        $this->client->format = "json";
    }

    // 比比旅行验证码v2.00
    public function YanZhengMa($yzm, $username, $tel) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $username . '","action":"注册比比旅行账号","code":"' . $yzm . '","time":"5分钟","phone":"400-991-7909"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_11365109");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
      模板类型:短信通知
      模板名称:比比旅行出票通知
      模板ID:SMS_11380084
      模板内容:${name}您好，您已购买${date}${dep}至${arr}的${airline}${flight}航班，起飞之间为${deptime}，票号：${tktno}。客服热线：${phone}
申请说明: 客户购买机票后的通知
服务电话：4009917909
      申请说明:旅客成功购买机票后的短信通知。
     */
    public function ChuPiaoTongZhi($tel, $name, $date, $dep, $arr, $air, $flight, $deptime, $tktno) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'", "tktno": "'. $tktno .'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_11380084");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
      模板名称:比比旅行航变通知
      模板ID:SMS_7340256
      模板内容:您所预定的${date}从${dep}飞往${arr}的${flight}航班已${msg}。服务电话4009917909
      申请说明:在比比旅行网购买机票的旅客，在出现航变时的短信通知。
     */
    public function HangChenBianGeng($tel, $date, $dep, $arr, $flight, $msg) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","flight":"' . $flight . '","msg":"'.$msg.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_7340256");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
      模板名称:比比旅行初始密码
      模板ID:SMS_7470743
      模板内容:感谢您使用${webname}，您的初始密码为：${password}，为了您的信息安全，请您尽快修改密码。
      申请说明:初次使用比比旅行时生成的初始密码。
     */
    public function ChuShiMiMa($tel, $webname, $password) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "webname":"' . $webname . '","password":"' . $password . '"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_7470743");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /*
      模板名称:航程信息提醒
      模板ID:SMS_9525210
      模板内容:您已预定${depdate}(${deptime})飞往${arrcity}的${flight}航班，${passenger}，请提前两小时到达机场。
      申请说明:客户购买机票后，向客户发送航班信息。
     */

    public function HangChengXinXiTiXing($tel, $depdate, $deptime, $arrcity, $flight, $passenger) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "depdate":"' . $depdate . '","deptime":"' . $deptime . '", "arrcity": "'.$arrcity.'", "flight": "'.$flight.'", "passenger": "'.$passenger.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_9525210");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /*
      模板名称:航变信息提醒
      模板ID:SMS_9700001
      模板内容:您预定的${depdate}飞往${arrcity}的${flight}航班，起飞时间：${deptime}，乘机人：${passenger}，变更为：${newmsg}
      申请说明:客户购买机票后，如果航班发生变化，向客户发送航变信息。
     */

    public function HangBianXinXiTiXing($tel, $depdate, $deptime, $arrcity, $flight, $passenger, $newmsg) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "depdate":"' . $depdate . '","deptime":"' . $deptime . '", "arrcity": "'.$arrcity.'", "flight": "'.$flight.'", "passenger": "'.$passenger.'", "newmsg": "'.$newmsg.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_9700001");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /*
      模板名称:出票通知v2.0
      模板ID:SMS_11380084
      模板内容:${name}您好，您已购买${date}${dep}至${arr}的${airline}${flight}航班，起飞之间为${deptime}，票号：${tktno}。客服热线：${phone}
      申请说明:客户购买机票后的通知
     */

    public function ChuPiaoTongZhi2($tel, $name, $date, $dep, $arr, $airline, $flight, $deptime, $tktno, $phone){
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $airline . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'", "tktno": "'.$tktno.'", "phone":"'.$phone.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_11380084");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /*
      模板名称:投保成功通知v2.10
      模板ID:SMS_13241423
      模板内容:${name}您好，您已成功投保${date}${dep}至${arr}的${airline}${flight}航班的${insurance}，保单号${insuno}。客服热线：${phone}
      申请说明:客户购买航空保险后的投保成功通知
     */

    public function TouBaoChengGong2($tel, $name, $date, $dep, $arr, $airline, $flight, $insurance, $insuno, $phone){
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $airline . '", "flight":"' . $flight . '", "insurance": "'.$insurance.'", "insuno": "'.$insuno.'", "phone":"'.$phone.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_13241423");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }

    /*
      模板名称:火车票出票通知v1.10
      模板ID:SMS_15470664
      模板内容:${name}，您已购买${date}${dep}至${arr}的${train}次列车，订单号${orderno}，${deptime}出发，座位号为${seatno}。客服热线：${phone}
      申请说明:客户通过阿里旅行app成功购买火车票时发送的短信通知。
     */

    public function HuoChePiaoChuPiao($tel, $name, $date, $dep, $arr, $train, $flight, $deptime, $tktno, $phone){
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","train":"' . $train . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'", "tktno": "'.$tktno.'", "phone":"'.$phone.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_15470664");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
      模板名称:退票通知
      模板ID: SMS_33725383
      模板内容:${name}您好，您购买的${date}${dep}至${arr}的${airline}${flight}航班退票成功！起飞时间为${deptime}，票号：${tktno}。如有疑问，请拨打客服热线：${phone}
      申请说明:客户退票成功后的通知
     */
    public function TuiPiaoTongZhi($tel, $name, $date, $dep, $arr, $airline, $flight, $deptime, $tktno, $phone){
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $airline . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'", "tktno": "'.$tktno.'", "phone":"'.$phone.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_33725383");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
      模板名称:改签通知
      模板ID:SMS_33690345
      模板内容:${name}您好，您购买的${dep}至${arr}的${airline}${flight}航班改签成功，改签后的时间为${date}。如有疑问，请拨打客服热线：${phone}
      申请说明:客户改签成功后的通知
     */
    public function GaiQianTongZhi($tel, $name, $date, $dep, $arr, $airline, $flight, $phone){
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $airline . '", "flight":"' . $flight . '", "phone":"'.$phone.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_33690345");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
      模板名称:无法出票
      模板ID:SMS_33690716
      模板内容:${name}您好，您预订的${$date}${dep}至${arr}的${airline}${flight}航班因余票不足出票失败，
      稍后讲退款至您的支付账户。如有疑问，请拨打客服热线：${phone}
      申请说明:客户改签成功后的通知
     */
    public function wufachupiao($tel, $name, $date, $dep, $arr, $airline, $flight, $phone){
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $airline . '", "flight":"' . $flight . '", "phone":"'.$phone.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_33690716");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
      模板名称:机票往返出票成功通知v1.0
      模板ID:SMS_34885366
      模板内容:${name}您好，您已购买${date1}${dep1}至${arr1}的${airline1}${flight1}航班，
      起飞之间为${deptime1}，票号：${tktno1}，返程${date2}${dep2}至${arr2}的${airline2}${flight2}航班，
      起飞之间为${deptime2}，票号：${tktno2}，请至少提前2小时到达机场办理登机。服务电话：4009917909
      申请说明:机票往返出票成功短息通知
     */
    public function wanfanchupiao($tel, $name, $date1, $dep1, $arr1, $airline1, $flight1, $deptime1, $tktno1,
            $date2, $dep2, $arr2, $airline2, $flight2, $deptime2, $tktno2){
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date1":"' . $date1 . '","dep1":"' . $dep1 . '","arr1":"' . $arr1 . '","airline1":"' . $airline1 . '", "flight1":"' . $flight1 . '", "deptime1":"'.$deptime1.'",
            "tktno1": "'.$tktno1.'", "date2": "'.$date2.'", "$dep1": "'.$dep2.'","arr2":"' . $arr2 . '","airline2":"' . $airline2 . '", "flight2":"' . $flight2 . '", "deptime2":"'.$deptime2.'",
            "tktno2": "'.$tktno2.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_34885366");

        $resp = $this->client->execute($req);
        //var_dump($resp);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:出票成功短信V5.0
      模板ID:SMS_35675128
      ${name}您好，您已购买${date}${dep}至${arr}的${airline}${flight}航班，
     * 起飞时间${deptime}，乘机当天请带好证件提前2小时至机场办理登机手续,服务热线:4009917909
     */
    public function ChuPiaoTongZhi_v5($tel, $name, $date, $dep, $arr, $air, $flight, $deptime) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_35675128");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:往返出票成功短息V5.0
      模板ID:SMS_35830195
      ${name}您好,您已购买去程${date}${dep}至${arr}的${airline}${flight}航班,
      起飞时间${deptime},返程${date1}${dep1}至${arr1}的${airline1}${flight1}航班,
      起飞时间${deptime1},乘机当天请带好证件提前2小时至机场办理登机手续,服务热线:4009917909
     */
    public function ChuPiaoTongZhi_wangfan_v5($tel, $name, $date, $dep, $arr, $air, $flight, $deptime,
            $date1, $dep1, $arr1, $air1, $flight1, $deptime1) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'", 
            "date1": "'.$date1.'", "dep1": "'.$dep1.'", "arr1": "'.$arr1.'", "airline1": "'.$air1.'", "flight1": "'.$flight1.'", "deptime1": "'.$deptime1.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_35830195");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:改签成功通知短信v5.0
      模板ID:SMS_36665020
      ${name}您好，改签后的行程为${date}，从${dep}飞往${arr}的${airline}的${flight}航班，
      起飞时间${deptime}，乘机当天请带好证件提前2小时至机场办理登机手续，客服热线：4009917909
     */
    public function GaiQianChengGong_v5($tel, $name, $date, $dep, $arr, $air, $flight, $deptime) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36665020");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:往返出票成功短息V5.0
      模板ID:SMS_36540039
      ${name}您好，改签后的行程为，去程${date}，从${dep}飞往${arr}的${airline}$的{flight}航班，起飞时间${deptime}，
      返程${date1}，从${dep1}飞往${arr1}的${airline1}$的{flight1}航班，起飞时间${deptime1}，
      乘机当天请带好证件提前2小时至机场办理登机手续,客服热线:4009917909
     */
    public function GaiQianChengGong_wangfan_v5($tel, $name, $date, $dep, $arr, $air, $flight, $deptime,
            $date1, $dep1, $arr1, $air1, $flight1, $deptime1) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '", "deptime": "'.$deptime.'", 
            "date1": "'.$date1.'", "dep1": "'.$dep1.'", "arr1": "'.$arr1.'", "airline1": "'.$air1.'", "flight1": "'.$flight1.'", "deptime1": "'.$deptime1.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36540039");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:单程退票成功模板5.0
      模板ID:SMS_36420037
      ${name}您好，您购买的${date}，从${dep}飞往${arr}的${airline}的${flight}航班，退票成功，客服热线：4009917909
     */
    public function TuiPiao_v5($tel, $name, $date, $dep, $arr, $air, $flight) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36420037");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:往返退票成功模板5.0
      模板ID:SMS_36455024
      ${name}您好，您购买的去程${date}，从${dep}飞往${arr}的${airline}的${flight}航班，
      返程${date1}，从${dep1}飞往${arr1}的${airline1}的${flight1}航班，退票成功，客服热线:4009917909
     */
    public function TuiPiao_wangfan_v5($tel, $name, $date, $dep, $arr, $air, $flight,
            $date1, $dep1, $arr1, $air1, $flight1) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '",
            "date1": "'.$date1.'", "dep1": "'.$dep1.'", "arr1": "'.$arr1.'", "airline1": "'.$air1.'", "flight1": "'.$flight1.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36455024");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:单程出票失败短息模板5.0
      模板ID:SMS_36505023
      ${name}您好，您购买的${date}，从${dep}飞往${arr}的${airline}的${flight}航班，退票成功，客服热线：4009917909
     */
    public function ChuPiaoShiBai_v5($tel, $name, $date, $dep, $arr, $air, $flight) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36505023");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:往返出票失败短息模板5.0
      模板ID:SMS_36455025
      ${name}您好，您预订的去程${date}，从${dep}飞往${arr}的${airline}的${flight}航班，
     返程${date1}，从${dep1}飞往${arr1}的${airline1}的${flight1}航班，因余票不足出票失败，稍后将退款至您的支付账户。客服热线：4009917909
     */
    public function ChuPiaoShiBai_wangfan_v5($tel, $name, $date, $dep, $arr, $air, $flight,
            $date1, $dep1, $arr1, $air1, $flight1) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '",
            "date1": "'.$date1.'", "dep1": "'.$dep1.'", "arr1": "'.$arr1.'", "airline1": "'.$air1.'", "flight1": "'.$flight1.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36455025");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:单程拒绝退款短息模板5.0
      模板ID:SMS_36420038
      ${name}您好，您提交的${date}，从${dep}飞往${arr}的${airline}的${flight}航班退票，退票审核失败。客服热线4009917909
     */
    public function JuJueTuiKuan_v5($tel, $name, $date, $dep, $arr, $air, $flight) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36420038");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:往返拒绝退款短息模板5.0
      模板ID:SMS_36550114
      ${name}您好，您提交的去程${date}，从${dep}飞往${arr}的${airline}的${flight}航班，
      返程${date1}，从${dep1}飞往${arr1}的${airline1}的${flight1}航班退票，退票审核失败。客服热线4009917909
     */
    public function JuJueTuiKuan_wangfan_v5($tel, $name, $date, $dep, $arr, $air, $flight,
            $date1, $dep1, $arr1, $air1, $flight1) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '",
            "date1": "'.$date1.'", "dep1": "'.$dep1.'", "arr1": "'.$arr1.'", "airline1": "'.$air1.'", "flight1": "'.$flight1.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36550114");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:改签失败模板5.0
      模板ID:SMS_36660005
      ${name}您好，您提交的${date}，从${dep}飞往${arr}的${airline}的${flight}航班退票，退票审核失败。客服热线4009917909
     */
    public function GaiQianShiBai_v5($tel, $name, $date, $dep, $arr, $air, $flight) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36660005");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
      模板类型:短信通知
      模板名称:改签失败往返模板5.0
      模板ID:SMS_36550115
      ${name}您好，你提交的去程${date}，从${dep}飞往${arr}的${airline}的${flight}航班，
      回程${date}，从${dep}飞往${arr}的${airline}的${flight}航班改签失败，客服热线：4009917909
     */
    public function GaiQianShiBai_wangfan_v5($tel, $name, $date, $dep, $arr, $air, $flight,
            $date1, $dep1, $arr1, $air1, $flight1) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '",
            "date1": "'.$date1.'", "dep1": "'.$dep1.'", "arr1": "'.$arr1.'", "airline1": "'.$air1.'", "flight1": "'.$flight1.'"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_36550115");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }
	
	/**
      模板类型:短信通知  
      模板名称:保险投保成功短信通知v5.0
      模板ID:SMS_40930129
      ${name}您好，您已成功投保${date}，从${dep}飞往${arr}的${airline}的${flight}航班，可通过查询订单详细获
     */
    public function TouBaoChengGong_v5($tel, $name, $date, $dep, $arr, $air, $flight) {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam('{ "name":"' . $name . '","date":"' . $date . '","dep":"' . $dep . '","arr":"' . $arr . '","airline":"' . $air . '", "flight":"' . $flight . '"}');
        $req->setRecNum($tel);
        $req->setSmsTemplateCode("SMS_40930129");

        $resp = $this->client->execute($req);
        if (!empty($resp->result->success) && $resp->result->success == true) {
            return true;
        } else {
            return false;
        }
    }	
    
    /*
     * 仅仅用于测试
     */
    public function Send() {
        date_default_timezone_set('Asia/Shanghai');
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend('123456');
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("比比旅行");
        $req->setSmsParam("{ \"name\":\"吴大富\",\"action\":\"注册比比旅游账号\",\"code\":\"6543210\",\"time\":\"50分钟\",\"phone\":\"123456789\"}");
        $req->setRecNum("13541167940");
        $req->setSmsTemplateCode("SMS_11365109");

        //var_dump($this->client);
        $resp = $this->client->execute($req);
        //$arr = objectArray($resp);
        //print_r($arr);
        var_dump($resp);
    }

}