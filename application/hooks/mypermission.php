<?php

/**
 * 权限管理
 * @author 陈飞
 */
class mypermission {

    public function permission() {
        date_default_timezone_set("Asia/Shanghai");
        $CI = & get_instance();
        $CI->load->helper('url');
        $CI->load->library('session');
        $admin = $CI->uri->segment(1);
        $sub = $CI->uri->segment(2);

        $admin_session = $CI->session->userdata('admin');
        $sangfang_admin = $CI->session->userdata('sangfang_admin');
		$wm_admin = $CI->session->userdata('wm_admin');
        // 假如没有登录就跳转到登录页面
        if (strcasecmp($admin, 'admin') == 0 && strcasecmp($sub, 'login') != 0 && empty($admin_session)) {
            redirect('/admin/login/index');

        }
        
        // 判断三方平台登录
        if (strcasecmp($admin, 'hl') == 0 && strcasecmp($sub, 'index') == 0 && empty($sangfang_admin)) {
            redirect('/hl/login');

        }
        
        if (strcasecmp($admin, 'myhl') == 0 && empty($sangfang_admin)) {
            redirect('/hl/login');

        }
		if (strcasecmp($admin, 'wm') == 0 && strcasecmp($sub, 'login') != 0 && empty($wm_admin) && strcasecmp($sub, 'register') != 0) {

            redirect("/wm/login/index");
			die();
        }

        
        /**
         * 读取取权限表中对应的项并显示出来
         * 只对 get 方式起作用
         */
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'get') == 0 && strcasecmp($admin, 'admin') == 0 && strcasecmp($admin, 'hl') != 0 && strcasecmp($admin, 'myhl') != 0 && !empty($admin_session) && strcasecmp($sub, 'login') != 0) {
            $CI->load->database();
            // 读取角色对应的权限
            $sql = 'select m.fumingcheng as fumingcheng, m.mingcheng as mingcheng, m.dizhi as dizhi, m.zeng as zeng, m.shan as shan, m.gai as gai, m.cha as cha from quanxian as m where m.jiaoseid = ?';
            $res = $CI->db->query($sql, array($admin_session['jiaoseid']));
            $rows = $res->result();

            $leixing = $CI->uri->segment(3);

            $data = array();
            foreach ($rows as $r) {
                // 父目录
                if (!empty($r) && !empty($r->fumingcheng) && $r->fumingcheng == '国内机票') {
                    $data['guoneijipiao'] = true;
                    if (!empty($sub) && $sub == 'guoneijipiao') {
                        $data['guoneijipiao_curr'] = true;
                    }
                }

                // 子目录  出票管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '出票管理') {
                    $data['guoneijipiao_chupiao'] = true;
                    if (!empty($leixing) && $leixing == 'chupiao') {
                        $data['guoneijipiao_jipiaoshouhou_curr'] = true;
                        $data['guoneijipiao_chupiao_curr'] = true;
                    }
                }

                // 子目录  退票管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '退票管理') {
                    $data['guoneijipiao_tuipiao'] = true;
                    if (!empty($leixing) && $leixing == 'tuipiao') {
                        $data['guoneijipiao_jipiaoshouhou_curr'] = true;
                        $data['guoneijipiao_tuipiao_curr'] = true;
                    }
                }

                // 子目录  改签申请管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '改签申请管理') {
                    $data['guoneijipiao_gaiqianshengqing'] = true;
                    if (!empty($leixing) && $leixing == 'gaiqianshengqing') {
                        $data['guoneijipiao_jipiaoshouhou_curr'] = true;
                        $data['guoneijipiao_gaiqianshengqing_curr'] = true;
                    }
                }

                // 子目录  改签出票管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '改签出票管理') {
                    $data['guoneijipiao_gaiqianchupiao'] = true;
                    if (!empty($leixing) && $leixing == 'gaiqianchupiao') {
                        $data['guoneijipiao_jipiaoshouhou_curr'] = true;
                        $data['guoneijipiao_gaiqianchupiao_curr'] = true;
                    }
                }

                // 子目录  保险售后管理--订单管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '保险售后管理--订单管理') {
                    $data['guoneijipiao_dingdan'] = true;
                    if (!empty($leixing) && $leixing == 'dingdan') {
                        $data['guoneijipiao_baoxian_curr'] = true;
                        $data['guoneijipiao_dingdan_curr'] = true;
                    }
                }

                // 子目录  保险售后管理--订单管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '报销售后管理--订单管理') {
                    $data['guoneijipiao_baoxiao'] = true;
                    if (!empty($leixing) && $leixing == 'baoxiao_dingdan') {
                        $data['guoneijipiao_baoxiao_curr'] = true;
                        $data['guoneijipiao_baoxiao_dd_curr'] = true;
                    }
                }

                // 子目录  机票政策管理--订单管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '政策调控') {
                    $data['guoneijipiao_zhengcetiaokong'] = true;
                    if (!empty($leixing) && $leixing == 'zhengcetiaokong') {
                        $data['guoneijipiao_jpzc_curr'] = true;
                        $data['guoneijipiao_zhengcetiaokong_curr'] = true;
                    }
                }

                // 子目录  机票政策管理--政策更新
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '政策更新') {
                    $data['guoneijipiao_zhengcegengxin'] = true;
                    if (!empty($leixing) && $leixing == 'zhengcegengxin') {
                        $data['guoneijipiao_jpzc_curr'] = true;
                        $data['guoneijipiao_zhengcegengxin_curr'] = true;
                    }
                }

                // 子目录  机票政策管理--政策添加
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '政策添加') {
                    $data['guoneijipiao_zhengcetianjia'] = true;
                    if (!empty($leixing) && $leixing == 'zhengcetianjia') {
                        $data['guoneijipiao_jpzc_curr'] = true;
                        $data['guoneijipiao_zhengcetianjia_curr'] = true;
                    }
                }

                // 父目录
                if (!empty($r) && !empty($r->fumingcheng) && $r->fumingcheng == '财务管理') {
                    $data['caiwuguanli'] = true;
                    if (!empty($sub) && $sub == 'caiwuguanli') {
                        $data['caiwuguanli_curr'] = true;
                    }
                }

                // 子目录  退款处理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '退款处理') {
                    $data['caiwuguanli_tuikuanchuli'] = true;
                    if (!empty($leixing) && $leixing == 'tuikuanchuli') {
                        $data['caiwuguanli_tuikuanguanli_curr'] = true;
                        $data['caiwuguanli_tuikuanchuli_curr'] = true;
                    }
                }

                // 子目录  批量退款记录
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '批量退款记录') {
                    $data['caiwuguanli_pltuikuanchuli'] = true;
                    if (!empty($leixing) && $leixing == 'piliangtuikuanchuli') {
                        $data['caiwuguanli_tuikuanguanli_curr'] = true;
                        $data['caiwuguanli_pltuikuanchuli_curr'] = true;
                    }
                }


                // 子目录  国内机票报表
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '出票报表') {
                    $data['caiwuguanli_jipiaobaobiao'] = true;
                    if (!empty($leixing) && $leixing == 'jipiaobaobiao') {
                        $data['caiwuguanli_gnjp_curr'] = true;
                        $data['caiwuguanli_jipiaobaobiao_curr'] = true;
                    }
                }

                // 子目录  国内机票报表
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '改签出票报表') {
                    $data['caiwuguanli_gaiqianchupiao'] = true;
                    if (!empty($leixing) && $leixing == 'gaiqianchupiao') {
                        $data['caiwuguanli_gnjp_curr'] = true;
                        $data['caiwuguanli_gaiqianchupiao_curr'] = true;
                    }
                }
                // 子目录  国内机票报表
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '退票报表') {
                    $data['caiwuguanli_tuipiao'] = true;
                    if (!empty($leixing) && $leixing == 'tuipiao') {
                        $data['caiwuguanli_gnjp_curr'] = true;
                        $data['caiwuguanli_tuipiao_curr'] = true;
                    }
                }
                // 子目录  国内机票报表
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '拒单报表') {
                    $data['caiwuguanli_judan'] = true;
                    if (!empty($leixing) && $leixing == 'judan') {
                        $data['caiwuguanli_gnjp_curr'] = true;
                        $data['caiwuguanli_judan_curr'] = true;
                    }
                }
                // 子目录  国内机票报表
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '详情报表') {
                    $data['caiwuguanli_xiangqing'] = true;
                    if (!empty($leixing) && $leixing == 'xiangqing') {
                        $data['caiwuguanli_gnjp_curr'] = true;
                        $data['caiwuguanli_xiangqing_curr'] = true;
                    }
                }
				
				// 子目录  酒店拒单报表
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '酒店拒单报表') {
                    $data['caiwuguanli_jiudianjudan'] = true;
                    if (!empty($leixing) && $leixing == 'jiudianjudan') {
                        $data['caiwuguanli_jdbb_curr'] = true;
                        $data['caiwuguanli_jiudianjudan_curr'] = true;
                    }
                }
				
				  // 子目录 订房报表
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '订房报表') {
                    $data['caiwuguanli_jiudiandingfang'] = true;
                    if (!empty($leixing) && $leixing == 'jiudiandingfang') {
                        $data['caiwuguanli_jdbb_curr'] = true;
                        $data['caiwuguanli_jiudiandingfang_curr'] = true;
                    }
                }


                // 父目录
                if (!empty($r) && !empty($r->fumingcheng) && $r->fumingcheng == '平台管理') {
                    $data['pingtaiguanli'] = true;
                    if (!empty($sub) && $sub == 'pingtaiguanli') {
                        $data['pingtaiguanli_curr'] = true;
                    }
                }

                // 子目录  用户管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '用户管理') {
                    $data['pingtaiguanli_yonghu'] = true;
                    if (!empty($leixing) && $leixing == 'yonghu') {
                        $data['pingtaiguanli_yh_curr'] = true;
                        $data['pingtaiguanli_yonghu_curr'] = true;
                    }
                }

                // 子目录  保险公司管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '保险公司管理') {
                    $data['pingtaiguanli_baoxiangongsi'] = true;
                    if (!empty($leixing) && $leixing == 'baoxiangongsi') {
                        $data['pingtaiguanli_cpgl_curr'] = true;
                        $data['pingtaiguanli_baoxiangongsi_curr'] = true;
                    }
                }

                // 子目录  保险产品管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '保险产品管理') {
                    $data['pingtaiguanli_baoxianchanping'] = true;
                    if (!empty($leixing) && $leixing == 'baoxianchanping') {
                        $data['pingtaiguanli_cpgl_curr'] = true;
                        $data['pingtaiguanli_baoxianchanping_curr'] = true;
                    }
                }

                // 子目录  管理员组
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '管理员组') {
                    $data['pingtaiguanli_guanliyuanzu'] = true;
                    if (!empty($leixing) && $leixing == 'guanliyuanzu') {
                        $data['pingtaiguanli_xtgl_curr'] = true;
                        $data['pingtaiguanli_guanliyuanzu_curr'] = true;
                    }
                }

                // 子目录  
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '管理员') {
                    $data['pingtaiguanli_guanliyuan'] = true;
                    if (!empty($leixing) && $leixing == 'guanliyuan') {
                        $data['pingtaiguanli_xtgl_curr'] = true;
                        $data['pingtaiguanli_guanliyuan_curr'] = true;
                    }
                }

                // 子目录  角色管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '角色管理') {
                    $data['pingtaiguanli_jiaoseguanli'] = true;
                    if (!empty($leixing) && $leixing == 'jiaoseguanli') {
                        $data['pingtaiguanli_xtgl_curr'] = true;
                        $data['pingtaiguanli_jiaoseguanli_curr'] = true;
                    }
                }

                // 子目录  权限管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '权限管理') {
                    $data['pingtaiguanli_quanxian'] = true;
                    if (!empty($leixing) && $leixing == 'quanxian') {
                        $data['pingtaiguanli_xtgl_curr'] = true;
                        $data['pingtaiguanli_quanxian_curr'] = true;
                    }
                }
                // 子目录  产品配置
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '产品配置') {
                    $data['pingtaiguanli_chanpinpeizhi'] = true;
                    if (!empty($leixing) && $leixing == 'chanpinpeizhi') {
                        $data['pingtaiguanli_xtgl_curr'] = true;
                        $data['pingtaiguanli_chanpinpeizhi_curr'] = true;
                    }
                }

                // 父目录
                if (!empty($r) && !empty($r->fumingcheng) && $r->fumingcheng == '账户设置') {
                    $data['zhanghushezhi'] = true;
                    if (!empty($sub) && $sub == 'zhanghushezhi') {
                        $data['zhanghushezhi_curr'] = true;
                    }
                }

                // 子目录  安全中心
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '安全中心') {
                    $data['zhanghushezhi_anquanzhongxin'] = true;
                    if (!empty($leixing) && $leixing == 'anquanzhongxin') {
                        $data['zhanghushezhi_aqzx_curr'] = true;
                        $data['zhanghushezhi_anquanzhongxin_curr'] = true;
                    }
                }
                // 父目录
                if (!empty($r) && !empty($r->fumingcheng) && $r->fumingcheng == '火车管理') {
                    $data['huocheguanli'] = true;
                    if (!empty($sub) && $sub == 'huochepiao') {
                        $data['huocheguanli_curr'] = true;
                    }
                }
                // 子目录  出票管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '出票管理') {
                    $data['huocheguanli_chupiaoguanli'] = true;
                    if (!empty($leixing) && $leixing == 'chupiaoguanli') {
                        $data['huocheguanli_cpgl_curr'] = true;
                        $data['huocheguanli_chupiaoguanli_curr'] = true;
                    }
                }
				// 父目录
                if (!empty($r) && !empty($r->fumingcheng) && $r->fumingcheng == '酒店业务') {
                    $data['jiudianguanli'] = true;
                    if (!empty($sub) && $sub == 'jiudian') {
                        $data['jiudianguanli_curr'] = true;
                    }
                }
                
                // 子目录  订单管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '订单管理') {
                    $data['jiudianguanli_dingdanguanli'] = true;
                    if (!empty($leixing) && $leixing == 'dingdanguanli') {
                        $data['jiudianguanli_ddgl_curr'] = true;
                        $data['jiudianguanli_dingdanguanli_curr'] = true;
                    }
                }
                
                // 子目录  信息管理
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '信息管理') {
                    $data['jiudianguanli_xinxiguanli'] = true;
                    if (!empty($leixing) && $leixing == 'xinxiguanli') {
                        $data['jiudianguanli_xxgl_curr'] = true;
                        $data['jiudianguanli_xinxiguanli_curr'] = true;
                    }
                }
                
                /**
                 * 问答详情
                 */
                $wenda = $CI->uri->segment(4);
                if(!empty($wenda) && substr($wenda, 0, 5) == 'wenda')
                {
                    $data['jiudianguanli_xinxiguanli_wenda_curr'] = true;
                }
                /**
                 * 新增问答
                 */
                if(!empty($wenda) && substr($wenda, 0, 7) == 'xinzeng')
                {
                    $data['jiudianguanli_xinxiguanli_xinzeng_curr'] = true;
                }
				

                // 父目录

                if (!empty($r) && !empty($r->fumingcheng) && $r->fumingcheng == '网盟业务') {
                    $data['wangmengyewu'] = true;
					
                    if (!empty($sub) && $sub == 'wangmengyewu') {
                        $data['wangmengyewu_curr'] = true;
                    }
                }
                // 子目录  企业商户
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '企业商户') {
                    $data['wangmengyewu_qiyeshanghu'] = true;
                    if (!empty($leixing) && $leixing == 'qiyeshanghu') {
                        $data['wangmengyewu_cpgl_curr'] = true;
                        $data['wangmengyewu_qiyeshanghu_curr'] = true;
                    }
                }
                // 子目录  企业商户
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '账单结算') {
                    $data['wangmengyewu_zhangdanjiesuan'] = true;
                    if (!empty($leixing) && $leixing == 'zhangdanjiesuan') {
                        $data['wangmengyewu_cpgl_curr'] = true;
                        $data['wangmengyewu_zhangdanjiesuan_curr'] = true;
                    }
                }
                if (!empty($r) && !empty($r->mingcheng) && $r->mingcheng == '个人商户') {
                    $data['wangmengyewu_gerenshanghu'] = true;
                    if (!empty($leixing) && $leixing == 'gerenshanghu') {
                        $data['wangmengyewu_cpgl_curr'] = true;
                        $data['wangmengyewu_gerenshanghu_curr'] = true;
                    }
                }   				
            }
            $CI->load->view('page/dbhead', $data);
        }    // 三方平台的判断
        else if (strcasecmp($_SERVER['REQUEST_METHOD'], 'get') == 0 && !empty($sangfang_admin) && (strcasecmp($admin, 'hl') == 0 || strcasecmp($admin, 'myhl') == 0)) {
            $data = array();
            if (strcasecmp($admin, 'hl') == 0 && strcasecmp($sub, 'index') == 0) {
                // 接入管理
                $data['jieruguanli'] = true;
                $data['shengchenglianjiedizhi'] = true;
            }

            if (strcasecmp($admin, 'myhl') == 0 && strcasecmp($sub, 'lianjieguanli') == 0) {
                $three = $CI->uri->segment(3);
                if (!empty($three)) {
                    // 接入管理
                    $data['jieruguanli'] = true;
                    if (strcasecmp($three, 'dizhi') == 0) {
                        $data['shengchenglianjiedizhi'] = true;
                    } else if (strcasecmp($three, 'zhangdan') == 0) {
                        $data['zhangdan'] = true;
                    } else if (strcasecmp($three, 'duijie') == 0) {
                        $data['duijie'] = true;
                    }
                    else if (strcasecmp($three, 'yue') == 0) {
                        $data['yue'] = true;
                    }
                }
            }

            $CI->load->view('page/sangfangdbhead', $data);
        } else if (strcasecmp($_SERVER['REQUEST_METHOD'], 'get') == 0 && !empty($wm_admin) && strcasecmp($admin, 'wm') == 0 && strcasecmp($sub, 'login') != 0 && !empty($wm_admin)) {
            $data = array();

            if (strcasecmp($admin, 'wm') == 0 && strcasecmp($sub, 'wangmeng') == 0 && !empty($wm_admin)) {
                $three = $CI->uri->segment(3);                
                if (!empty($three)) {
                    $wm_admin = $CI->session->userdata('wm_admin');
                    $data["shangumingcheng"] = $wm_admin['mingcheng'];

                    $sql_chapin = 'SELECT q.chanpinleixing AS leixing  FROM wm_qianyuechanpin as q WHERE q.shanghuhao = ? and q.zhuangtai = 1';
                    $query_chapin = $CI->db->query($sql_chapin, array($wm_admin['shanghuhao']));
                    $res = $query_chapin->result();
                    $feiji_show  = false;
                    $huoche_show  = false;
                    $jiudian_show  = false;
                    $baoxian_show  = false;
                    if ($query_chapin->num_rows() > 0) {
                        foreach ($res as $v) {
                            if ($v->leixing==0) {
                                $huoche_show = true;                           
                            } else if ($v->leixing==1) {
                                $feiji_show  = true;
                            } else if ($v->leixing==2) {
                                $jiudian_show = true;
                            } else if ($v->leixing==3){
                                $baoxian_show = true;
                            }           
                        }
                        
                    }
                    $data['huoche_show'] = $huoche_show;
                    $data['feiji_show'] = $feiji_show;
                    $data['jiudian_show'] = $jiudian_show;
                    $data['baoxian_show'] = $baoxian_show;
                    // 接入管理

                    if (strcasecmp($three, 'home') == 0) {
                        $data['lianjie'] = true;
                    } else if (strcasecmp($three, 'feiji') == 0) {
                        $data['feiji'] = true;
                    } else if (strcasecmp($three, 'yonghu') == 0) {
                        $data['yonghu'] = true;
                    } else if (strcasecmp($three, 'huoche') == 0) {
                        $data['huoche'] = true;
                    } else if (strcasecmp($three, 'zhanghu') == 0) {
                        $data['zhanghu'] = true;
                    } else if (strcasecmp($three, 'zhangdan') == 0) {
                        $data['zhangdan'] = true;
                        $four = $CI->uri->segment(4);
                        if (strcasecmp($four, 'dangqianxiangqing') == 0) {
                            $data['dangqianxiangqing'] = true;
                        } else {
                            $data['dangqianxiangqing'] = false;
                        }
                    } else if (strcasecmp($three, 'jiudian') == 0) {
                        $data['jiudian'] = true;
                    } else if(strcasecmp($three, 'baoxian') == 0) {
                        $data['baoxian'] = true;
                    } else if(strcasecmp($three, 'zhifu') == 0) {
                        $data['zhifu'] = true;
                    }
                    
                }
            }


            $CI->load->view('page/wmhead', $data);
        } else {
            
        }

        /*
        if (strcasecmp($admin, 'test') == 0 && (strcasecmp($sub, 'page') == 0)) {
            $data['test'] = '吴大富';
            $CI->load->view('page/test1', $data);
        }
         */
    }

    /*
     * 日志记录
     */

    public function PostController() {
        /*
          $CI =& get_instance();
          $CI->load->helper('url');
          $CI->load->library('session');
          $webadmin = $CI->session->userdata('webadmin');
          if(!empty($webadmin) && !empty($webadmin['shangdianguanliyuanId']))
          {
          $obj = array(
          'weitongguanliyuanId' => $webadmin['shangdianguanliyuanId'],
          'caozuoriqi' => date("Y-m-d H:i:s"),
          'ipdizhi' => $CI->input->ip_address(),
          'caozuojilu' => ''
          );

          // 加载管理员日志
          $CI->load->model('shangdianxinxi/mguanliyuanrizhi', 'mguanliyuanrizhi');
          // 记录日志
          $CI->mguanliyuanrizhi->SaveByArray($obj);
          }
         */
    }

}

?>
