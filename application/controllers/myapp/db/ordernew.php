<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 订单处理
 */
class ordernew extends CI_Controller {

    public function save() {
		    $callback = $this->input->get('callback');
            date_default_timezone_set("Asia/Shanghai");
            $selected = json_decode($this->input->get('selected'));
            //联系人
            $currentContact = json_decode($this->input->get('currentContact'));
            $yonghuid = $currentContact->id;  // 用户id
            $lianxirendianhua = $currentContact->shoujihaoma; // 联系人手机号码
            $lianxiren = $currentContact->xingming; // 姓名

            // 收件地址需保存订单中
            $mail = json_decode($this->input->get('mail'));
            // $isMail= $mail->isMail;  //是否邮递发票
            // $shoujianren = $mail->shoujianrenmingzi; //收件人名字
            // $youjidizhi = $mail->dizhi; // 邮递地址
            // $youjirendianhua = $mail->shoujihao;

            // 添加乘客
            $lvke = json_decode($this->input->get('userContacts'));
            // var_dump($lvke);
            $data = new stdClass();
            $hangchenglvke = array();  //  买票的乘客
            foreach ($lvke as $v) {

                $data->yonghuid = $yonghuid;
                $data->zhongwenming = $v->zhongwenming;
                $data->chushengriqi = $v->chushengriqi;
                $data->zhengjianhaoma = $v->zhengjianhaoma;

                $zhengjianleixing = $this->config->item('证件类型');
                foreach ($zhengjianleixing as $k1 => $v1) {
                    if ($v->zhengjianleixing == $v1) {
                        $data->zhengjianleixing = $k1;
                    }

                }
                $isNew = $v->isNew;
                $chk = $v->chk;
                $isEdit = $v->isEdit;

                if ($isNew == true) {
                    $chk = $v->chk;
                    if ($chk == true) {
                        $this->db->insert('lvke', $data);
                        $id = $this->db->insert_id();
                        // 插入后取出;
                        $sql = 'select m.id as id, m.yonghuid as yonghuid, m.zhengwenming as zhengwenming, n.yingwenming as yingwenming, m.xingbie as xingbie, m.chushengriqi as chushengriqi, m.guoji as guoji, m.zhengjianleixing as zhengjianleixing, m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi, m.chushengdi as chushengdi, m.shoujihao as shoujihao, m.lianxirendianhua as lianxirendianhua, m.email as email from lvke as m where id = ?';
                        $query = $this->db->query($sql ,array($id));
                        if ($query->row()) {
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
                        if ($chk == true){
                                $hangchenglvke[] = $v;
                            }
                    }
                }
            }
            // 保存收件地址
            $address = json_decode($this->input->get('addressList'));
            $data2 = new stdClass();
            foreach ($address as $k2 => $v2) {
                $data2->yonghuid = $yonghuid;
                $data2->shoujianrenmingzi = $v2->shoujianrenmingzi;
                $data2->dizhi = $v2->dizhi;
                $data2->shoujihao = $v2->shoujihao;
                if ($v2->isNew) {
                    $this->db->insert('yonghudizhi', $data2);
                } else {
                    $id2 = $v2->id;
                    $this->db->where('id', $id2);
                    $this->db->update('yonghudizhi', $data2);
                }
            }

            // 保险
            $Insurance = json_decode($this->input->get('Insurance'));
            // var_dump($Insurance); 
            // 遍历保险
            // foreach ( $Insurance as $key => $value) {
            //     var_dump($key);
            //    if ($value->buy) {
            //        
            //    }
            // }
            $costdetail = json_decode($this->input->get('costdetail'));
            var_dump($costdetail);
            $dingdanhao = time();
            // 订单操作
            $order = new stdClass();
            $order->dingdanhao = $dindanhao;
            $order->yonghuid = $yonghuid;

            $order->dingdanzonge = $costdetail->totalprice; // 总费用


            $order->baoxiaopingzheng = $mail->isMail ? 1 : 0; // 报销凭证- 是否邮发票
            $order->shoujianren = $mail->shoujianrenmingzi; // 收件人名字
            $order->youjidizhi = $mail->dizhi;  //收件人地址
            $order->youjirendianhua = $mail->shoujihao; //收件人手机号

            $order->dingdanzhuangtai = 0; // 待付款 -订单状态

            $order->fasongduanxin = 1; // 发送短信

            $order->chulishijian = time(); // 处理时间
            $order->wanchengshijian = time(); // 完成时间
            $order->caozuoyuanid = 0; // 操作员id
            $order->beizhu = 'test'; // 备注


            $order->baoxian = 0 ; // 保险 0 未买 1买


            $order->zhifufangshi = 0 ; // 支付方式



            $this->db->insert('dingdan', $order);
            $dingdanid = $this->db->insert_id();

            // 航程
            if($selected->goto->date != ''){
                $hangcheng = new stdClass();
                // $hangcheng->gendingdanid = $gendingdanid;  // 根订单id
                $hangcheng->dingdanid = $dingdanid;
                // $hangcheng->dabianma = $dabianma;  // 大编码


                // $hangcheng->jixing = $selected->goto->flightNo[0]; // 飞机型号
                $jixing = $selected->goto->flight->flightNo; // 飞机型号
                $jixing = $this->object2array($jixing);
                $hangcheng->jixing = $jixing[0];


                $hangcheng->hangchengxuhao = $selected->goto->flight->aircode; // 飞机型号

                $hangcheng->hangkonggongsi = $selected->goto->flight->gs; // 航空公司
                $hangcheng->qifeijichang = $selected->goto->flight->orgAirport; // 起飞机场
                $hangcheng->daodajichang = $selected->goto->flight->dstAirport; // 到达机场

                $qifeihangzhanlou = $selected->goto->flight->orgJetquay; // 起飞航站楼
                $qifeihangzhanlou = $this->object2array($qifeihangzhanlou);
                $hangcheng->qifeihangzhanlou = $qifeihangzhanlou[0]; // 起飞航站楼

                $daodahangzhanlou = $selected->goto->flight->dstJetquay; // 到达航站楼
                $daodahangzhanlou = $this->object2array($daodahangzhanlou);; // 到达航站楼
                $hangcheng->daodahangzhanlou = $daodahangzhanlou[0]; // 到达航站楼


                $qifeishijian = $selected->goto->flight->depTime; // 起飞时间
                $qifeishijian = date("Y-m-d H:i:s" ,strtotime( $qifeishijian )) ;
                $hangcheng->qifeishijian = $qifeishijian;

                $daodashijian = $selected->goto->flight->arriTime; // 到达时间

                $daodashijian = date("Y-m-d H:i:s" ,strtotime( $daodashijian ));
                $hangcheng->daodashijian = $daodashijian;
                $hangcheng->cangwei = $selected->goto->seatItem->seatMsg; // 舱位
                $hangcheng->piaoyuanshuliang = $selected->goto->seatItem->seatStatus; // 数量


                // $hangcheng->PNRhao = $PNRhao; // PNRh号 记录乘客信息
                // $hangcheng->PNRxinxi = $PNRxinxi; // PNRh 记录乘客信息
                // $hangcheng->shifouertong = $shifouertong; // 
                // $hangcheng->chengkerenshu = $shifouertong; // 


                $hangcheng->wangfanhangcheng = 0; //  0 去程 1返程


                $hangcheng->hangchengxuhao = 0; //  航程序号
                $gongxianghangbanhao = $selected->goto->flight->codeShare[0]; // 是否是共享航班 0 否 1是
                $gongxianghangbanhao = $this->object2array($gongxianghangbanhao);
                $hangcheng->gongxianghangbanhao = $gongxianghangbanhao;
                $hangcheng->jingtinglianbiao = 0; // 是否是经停链表

                $re = $this->db->insert('hangcheng', $hangcheng);
                $hangchengid = $re->db->insert_id();


                // 航程旅客
                foreach ($hangchenglvke as $key => $value) {

                    $hclc =  new stdClass();

                     // $hclc->gendingdanid = 1111111111111;
                    $hclc->dingdanid = $dingdanid; // 订单ID
                    $hclc->hangchengid = $hangchengid ; // 航程ID // 要与上面的航程合并起来
                     // $hclc->pingtaidingdanhao = 1111111111111; // 平台订单号
                    $hclc->hangbanhao = '12';  // 航班号
                    $hclc->lvkeid = $v->id;   // 旅客ID
                    $hclc->chuangjianshijian = date("Y-m-d H:i:s" ,time()) ;
                    $hclc->zhongwenming = $v->zhongwenming;
                    $hclc->yingwenming = $v->yingwenming;
                    $hclc->xingbie = $v->xingbie;
                    $hclc->chushengriqi = $v->chushengriqi;
                    $hclc->guoji = $v->guoji;
                    $hclc->zhengjianleixing = $v->zhengjianleixing;
                    $hclc->zhengjianhaoma = $v->zhengjianhaoma;
                    $hclc->zhengjianyouxiaoqi = $v->zhengjianyouxiaoqi;
                    $hclc->chushengdi = $v->chushengdi;
                    $hclc->shoujihao = $v->shoujihao;
                    $hclc->lianxidianhua = $v->lianxidianhua;
                    $hclc->email = $v->email;

                    $re = $this->db->insert('hangchenglvke', $hclc);
                    $qe = $this->db->last_query();
                    echo $callback . "(" .$qe . ")";
                    var_dump($re);

                    // 保险

                    if ($baoxian->accident->buy) {
                        $bx = new stdClass();
                        $bx->dingdanid = 1111111111111;
                        $bx->baoxianchanpinid = $baoxian->accident->goto->product->id;  // 保险产品Id
                        $bx->hangchenglvkeid = 1;  // 航程旅客ID 在遍历乘客时添加

                        $bx->dingdanzhuangtai = 0;  // 订单状态
                        $bx->dingdanzongjia = $baoxian->accident->goto->unitprice;  // 订单总价
                        $bx->baoxianleixing = $baoxian->accident->goto->product->chanpinleibie;  // 保险类型
                        // $bx->baoxiandingdanhao = '';  // 保险订单号  不知

                        // $bx->baoxiandingdanhao = 0;  // 外采订单编号
                        // $bx->waicaipingtai = 0;  // 订单状态
                        // $bx->waicaizongjia = 0;  // 外采总价
                        // $bx->waicaibeizhu = 0;  // 外采备注
                        // $bx->baodanzhuangtai = 0;  // 保单状态
                        $bx->chuangjianshijian = date("Y-m-d H:i:s" ,time()) ;  // 创建时间
                        // $bx->shengxiaoriqi = 0;  // 生效日期
                        // $bx->chulishijian = 0;  // 处理时间
                        // $bx->wanchengshijian = 0;  // 完成时间
                        // $bx->caozuoyuanid = 0;  // 操作员id
                        // $bx->beizhu = 0;  // 备注

                        $re = $this->db->insert('baoxiandingdan', $bx);
                        var_dump($re);

                    }
                    if ($baoxian->dallyover->buy) {
                       $bx = new stdClass();
                       $bx->dingdanid = 1111111111111;
                       $bx->baoxianchanpinid = $baoxian->dallyover->goto->product->id;  // 保险产品Id
                       $bx->hangchenglvkeid = 1;  // 航程旅客ID 在遍历乘客时添加

                       $bx->dingdanzhuangtai = 0;  // 订单状态
                       $bx->dingdanzongjia = $baoxian->dallyover->goto->unitprice;  // 订单总价
                       $bx->baoxianleixing = $baoxian->dallyover->goto->product->chanpinleibie;  // 保险类型
                       // $bx->baoxiandingdanhao = '';  // 保险订单号  不知

                       // $bx->baoxiandingdanhao = 0;  // 外采订单编号
                       // $bx->waicaipingtai = 0;  // 订单状态
                       // $bx->waicaizongjia = 0;  // 外采总价
                       // $bx->waicaibeizhu = 0;  // 外采备注
                       // $bx->baodanzhuangtai = 0;  // 保单状态
                       $bx->chuangjianshijian = date("Y-m-d H:i:s" ,time()) ;  // 创建时间
                       // $bx->shengxiaoriqi = 0;  // 生效日期
                       // $bx->chulishijian = 0;  // 处理时间
                       // $bx->wanchengshijian = 0;  // 完成时间
                       // $bx->caozuoyuanid = 0;  // 操作员id
                       // $bx->beizhu = 0;  // 备注

                       $re = $this->db->insert('baoxiandingdan', $bx);
                       var_dump($re);

                    }

                }
            }
            // 返程
            if ($selected->back->date != '') {
                $hangcheng = new stdClass();
                // $hangcheng->gendingdanid = $gendingdanid;  // 根订单id
                $hangcheng->dingdanid = $dingdanid;
                // $hangcheng->dabianma = $dabianma;  // 大编码

                $jixing = $selected->back->flight->flightNo; // 飞机型号
                $jixing = $this->object2array($jixing);
                $hangcheng->jixing = $jixing[0];


                $hangcheng->hangchengxuhao = $selected->back->flight->aircode; // 飞机型号

                $hangcheng->hangkonggongsi = $selected->back->flight->gs; // 航空公司
                $hangcheng->qifeijichang = $selected->back->flight->orgAirport; // 起飞机场
                $hangcheng->daodajichang = $selected->back->flight->dstAirport; // 到达机场

                $qifeihangzhanlou = $selected->back->flight->orgJetquay; // 起飞航站楼
                $qifeihangzhanlou = $this->object2array($qifeihangzhanlou);
                $hangcheng->qifeihangzhanlou = $qifeihangzhanlou[0]; // 起飞航站楼

                $daodahangzhanlou = $selected->back->flight->dstJetquay; // 到达航站楼
                $daodahangzhanlou = $this->object2array($daodahangzhanlou);; // 到达航站楼
                $hangcheng->daodahangzhanlou = $daodahangzhanlou[0]; // 到达航站楼


                $qifeishijian = $selected->back->flight->depTime; // 起飞时间
                $qifeishijian = date("Y-m-d H:i:s" ,strtotime( $qifeishijian )) ;
                $hangcheng->qifeishijian = $qifeishijian;

                $daodashijian = $selected->back->flight->arriTime; // 到达时间

                $daodashijian = date("Y-m-d H:i:s" ,strtotime( $daodashijian ));
                $hangcheng->daodashijian = $daodashijian;
                $hangcheng->cangwei = $selected->back->seatItem->seatMsg; // 舱位
                $hangcheng->piaoyuanshuliang = $selected->back->seatItem->seatStatus; // 数量


                // $hangcheng->PNRhao = $PNRhao; // PNRh号 记录乘客信息
                // $hangcheng->PNRxinxi = $PNRxinxi; // PNRh 记录乘客信息
                // $hangcheng->shifouertong = $shifouertong; // 
                // $hangcheng->chengkerenshu = $shifouertong; // 


                $hangcheng->wangfanhangcheng = 1; //  0 去程 1返程


                $hangcheng->hangchengxuhao = 0; //  航程序号
                $gongxianghangbanhao = $selected->back->flight->codeShare[0]; // 是否是共享航班 0 否 1是
                $gongxianghangbanhao = $this->object2array($gongxianghangbanhao);
                $hangcheng->gongxianghangbanhao = $gongxianghangbanhao;
                $hangcheng->jingtinglianbiao = 0; // 是否是经停链表

                $hangchengid = $this->db->insert('hangcheng', $hangcheng);
                // $qe = $this->db->last_query();
                // echo($qe);
                var_dump($hangchengid);

                // 航程旅客
                foreach ($hangchenglvke as $key => $value) {

                    $hclc =  new stdClass();

                     // $hclc->gendingdanid = 1111111111111;
                    $hclc->dingdanid = $dingdanid; // 订单ID
                    $hclc->hangchengid = $hangchengid ; // 航程ID // 要与上面的航程合并起来
                     // $hclc->pingtaidingdanhao = 1111111111111; // 平台订单号
                    $hclc->hangbanhao = '12';  // 航班号
                    $hclc->lvkeid = $v->id;   // 旅客ID
                    $hclc->chuangjianshijian = date("Y-m-d H:i:s" ,time()) ;
                    $hclc->zhongwenming = $v->zhongwenming;
                    $hclc->yingwenming = $v->yingwenming;
                    $hclc->xingbie = $v->xingbie;
                    $hclc->chushengriqi = $v->chushengriqi;
                    $hclc->guoji = $v->guoji;
                    $hclc->zhengjianleixing = $v->zhengjianleixing;
                    $hclc->zhengjianhaoma = $v->zhengjianhaoma;
                    $hclc->zhengjianyouxiaoqi = $v->zhengjianyouxiaoqi;
                    $hclc->chushengdi = $v->chushengdi;
                    $hclc->shoujihao = $v->shoujihao;
                    $hclc->lianxidianhua = $v->lianxidianhua;
                    $hclc->email = $v->email;

                    $re = $this->db->insert('hangchenglvke', $hclc);
                    $qe = $this->db->last_query();
                    echo $callback . "(" .$qe . ")";
                    var_dump($re);

                    // 保险

                    if ($baoxian->accident->buy) {
                        $bx = new stdClass();
                        $bx->dingdanid = 1111111111111;
                        $bx->baoxianchanpinid = $baoxian->accident->back->product->id;  // 保险产品Id
                        $bx->hangchenglvkeid = 1;  // 航程旅客ID 在遍历乘客时添加

                        $bx->dingdanzhuangtai = 0;  // 订单状态
                        $bx->dingdanzongjia = $baoxian->accident->back->unitprice;  // 订单总价
                        $bx->baoxianleixing = $baoxian->accident->back->product->chanpinleibie;  // 保险类型
                        // $bx->baoxiandingdanhao = '';  // 保险订单号  不知

                        // $bx->baoxiandingdanhao = 0;  // 外采订单编号
                        // $bx->waicaipingtai = 0;  // 订单状态
                        // $bx->waicaizongjia = 0;  // 外采总价
                        // $bx->waicaibeizhu = 0;  // 外采备注
                        // $bx->baodanzhuangtai = 0;  // 保单状态
                        $bx->chuangjianshijian = date("Y-m-d H:i:s" ,time()) ;  // 创建时间
                        // $bx->shengxiaoriqi = 0;  // 生效日期
                        // $bx->chulishijian = 0;  // 处理时间
                        // $bx->wanchengshijian = 0;  // 完成时间
                        // $bx->caozuoyuanid = 0;  // 操作员id
                        // $bx->beizhu = 0;  // 备注

                        $re = $this->db->insert('baoxiandingdan', $bx);
                        var_dump($re);

                    }
                    if ($baoxian->dallyover->buy) {
                       $bx = new stdClass();
                       $bx->dingdanid = 1111111111111;
                       $bx->baoxianchanpinid = $baoxian->dallyover->back->product->id;  // 保险产品Id
                       $bx->hangchenglvkeid = 1;  // 航程旅客ID 在遍历乘客时添加

                       $bx->dingdanzhuangtai = 0;  // 订单状态
                       $bx->dingdanzongjia = $baoxian->dallyover->back->unitprice;  // 订单总价
                       $bx->baoxianleixing = $baoxian->dallyover->back->product->chanpinleibie;  // 保险类型
                       // $bx->baoxiandingdanhao = '';  // 保险订单号  不知

                       // $bx->baoxiandingdanhao = 0;  // 外采订单编号
                       // $bx->waicaipingtai = 0;  // 订单状态
                       // $bx->waicaizongjia = 0;  // 外采总价
                       // $bx->waicaibeizhu = 0;  // 外采备注
                       // $bx->baodanzhuangtai = 0;  // 保单状态
                       $bx->chuangjianshijian = date("Y-m-d H:i:s" ,time()) ;  // 创建时间
                       // $bx->shengxiaoriqi = 0;  // 生效日期
                       // $bx->chulishijian = 0;  // 处理时间
                       // $bx->wanchengshijian = 0;  // 完成时间
                       // $bx->caozuoyuanid = 0;  // 操作员id
                       // $bx->beizhu = 0;  // 备注

                       $re = $this->db->insert('baoxiandingdan', $bx);
                       var_dump($re);

                    }

                }

            }

        }
        /** 
         * 对象数组转为普通数组 
         * 
         */  
         function object2array($object) {
           if (is_object($object)) {
             foreach ($object as $key => $value) {
               $array[$key] = $value;
             }
           }
           else {
             $array = $object;
           }
           return $array;
         }


}