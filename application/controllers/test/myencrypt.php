<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class myencrypt extends CI_Controller {

    public function en() {
        echo md5(uniqid());
        echo '<br/>';
        $this->load->library('encrypt');
        $msg = '深圳航旅投资+123456789';
        $encrypted_string = $this->encrypt->encode($msg);
        echo $encrypted_string;
        echo '<br/>';
        echo md5($msg);
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
        $encrypted_string = 'ama1wyoV9xFzEJJbFg/tgUSW6zCXZDUaSD1ExcH6hZZ7fIP76XQG2arh6/iVXsDk93Tbr8dY7D4D7uYdmUQkyg==';
        $plaintext_string = $this->encrypt->decode($encrypted_string);
        echo $plaintext_string;
    }

}
