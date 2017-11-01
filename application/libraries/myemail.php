<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class myemail {

    // 发送邮件验证码
    public function YanZhengMa($email, $yzm) {
        $CI = & get_instance();
        $CI->load->library('email'); 
        
        $config['protocol'] = 'smtp';  
        $config['smtp_host'] = 'smtp.126.com';  
        // 公司邮箱
        $config['smtp_user'] = 'monk0123456@126.com';  
        // 公司密码
        $config['smtp_pass'] = '公司密码';  
        $config['smtp_port'] = '25';  
        $config['charset'] = 'utf-8';  
        $config['wordwrap'] = TRUE;  
        $config['mailtype'] = 'html';
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
        $this->email->initialize($config);              
          
        //以下设置Email内容  
        // 公司邮箱
        $this->email->from('monk0123456@126.com', '比比旅游');  
        $this->email->to($email);  
        $this->email->subject('比比旅游 邮件验证码');  
        $this->email->message('您的验证码是 '.$yzm);  
  
        $this->email->send();
    }

}