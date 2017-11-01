<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tijiao extends CI_Controller {
    
    public function i()
    {
        $this->load->view('test/tijiao');
    }

    public function index() {
        $yidi_piaohao = $this->input->post('yidi_piaohao');
         $piaohao = json_decode($yidi_piaohao);
         foreach ($piaohao as $key => $v)
         {
             //$this->db->update('hangchenglvke', array('piaohao' => $v->piaohao), array('id' => $v->hangchenglvke));
             echo $v->piaohao.' '.$v->hangchenglvke;
             echo '   ';
         }
    }
    
}
