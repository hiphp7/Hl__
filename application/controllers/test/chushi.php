<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class chushi extends CI_Controller {

    public function index() {
        $this->load->library('encrypt');
        // 保存管理员
        $obj = array(
            'zhanghu' => 'admin',
            'mima' => $this->encrypt->encode('admin'),
            'guanliyuanzuid' => 0,
            'jiaoseid' => 0
        );
        $adminid = $this->db->insert('guanliyuan', $obj);
        
        // 保存权限
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '出票管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '退票管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '改签申请管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '改签出票管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '保险售后管理--订单管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '报销售后管理--订单管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '报销售后管理--订单管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '政策调控',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '政策添加',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '国内机票',
            'mingcheng' => '政策更新',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '财务管理',
            'mingcheng' => '退款处理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '财务管理',
            'mingcheng' => '批量退款记录',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '财务管理',
            'mingcheng' => '机票报表',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '平台管理',
            'mingcheng' => '用户管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '平台管理',
            'mingcheng' => '保险公司管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '平台管理',
            'mingcheng' => '保险产品管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '平台管理',
            'mingcheng' => '管理员组',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '平台管理',
            'mingcheng' => '管理员',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '平台管理',
            'mingcheng' => '角色管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '平台管理',
            'mingcheng' => '权限管理',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
        
        $this->db->insert('quanxian', array(
            'fumingcheng' => '账户设置',
            'mingcheng' => '安全中心',
            'jiaoseid' => 0,
            'zeng' => true,
            'shan' => true,
            'gai' => true,
            'cha' => true
        ));
    }
    
    public function admin()
    {
        $this->load->library('encrypt');
        $obj = array(
            'zhanghu' => 'admin',
            'mima' => $this->encrypt->encode('admin')
        );
        $this->db->insert('guanliyuan', $obj);
    }

    public function de() {
        $this->load->library('encrypt');
        $encrypted_string = 'JNu2QMtolZ7QrjM2p4aZCB2UR+Jvt4eUddNxxDjiE/lbWHP1P/pPdX+YCKzsJKUja4mUbCIbuXXQTYNc5Ku5Gg==';
        $plaintext_string = $this->encrypt->decode($encrypted_string);
        echo $plaintext_string;
    }

}
