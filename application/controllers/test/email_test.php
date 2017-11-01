<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class email_test extends CI_Controller {

    public function index() {
        //$youxiang = $this->input->post('youxiang');
        $obj = new stdClass();
        $obj->yzm = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $this->load->library('email');
        //以下设置Email参数  
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.126.com';
        $config['smtp_user'] = 'monk0123456@126.com';
        $config['smtp_pass'] = '19830306';
        $config['smtp_port'] = '25';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        //以下设置Email内容  
        $this->email->from('monk0123456@126.com', '比比旅行官网');
        $this->email->to("1017268973@qq.com");
        $this->email->subject('比比旅行用户(m.bibi321.com)绑定邮箱验证码');
        $this->email->message(
                '<div style="font-size: 14px;">
                亲爱的比比旅行用户，您好！
                <br/>
                <br/>
                您的绑定验证码是：<span style="color: rgb(247, 118, 22);">' . $obj->yzm . '</span>
                <br/>
                <br/>
                本邮件由系统自动发送，请勿直接回复！
                <br/>
                感谢您的访问，祝您使用愉快！
                <br/>
                <br/>
                比比旅行
                <br/>
                <span style="color: #900;">m.bibi321.com</span>
            </div>'
        );
        //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径  
        $obj->rel = $this->email->send();
        echo json_encode($obj);
    }

}
