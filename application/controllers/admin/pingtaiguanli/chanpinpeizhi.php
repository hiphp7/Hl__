<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 平台管理  --  产品配置
 */
class chanpinpeizhi extends CI_Controller {

        /**
         * 管理员
         */
    public function index()
    {

        $sql = 'select m.id as id, m.chanpinleixing as chanpinleixing, m.yewuleixing as yewuleixing, m.shangbanshijian as shangbanshijian,m.xiabanshijian as xiabanshijian, m.zhouqi as zhouqi from peizhi as m';
        $query = $this->db->query($sql);
        $peizhi = $query->result();
        $data['peizhi'] = $peizhi;
         $this->load->view('admin/pingtaiguanli/chanpinpeizhi/index', $data);
    }

    public function edit($id){
        $sql ='select m.id as id, m.chanpinleixing as chanpinleixing, m.yewuleixing as yewuleixing, m.shangbanshijian as shangbanshijian,m.xiabanshijian as xiabanshijian, m.zhouqi as zhouqi from peizhi as m where id = ?';
        $query = $this->db->query($sql, $id);
        $peizhi = $query->row();
        $zhouqi = explode(",", $peizhi->zhouqi);

        $data['peizhi'] = $peizhi;
        $data['zhouqi'] = $zhouqi;
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
            );
        $data['csrf'] = $csrf;

        $this->load->view('admin/pingtaiguanli/chanpinpeizhi/edit', $data);
    }
    public function editsave(){

        $data = $this->input->post();


        $obj = new stdclass();
        // $obj->chanpinleixing = $data['chanpinleixing'];
        // $obj->yewuleixing = $data['yewuleixing'];
        $obj->shangbanshijian = $data['shangbanshijian'];
        $obj->xiabanshijian = $data['xiabanshijian'];
        $obj->zhouqi = implode(",",$data['zhouqi']);
        
        $this->db->update('peizhi', $obj, array('id'=>$data['id']));

        redirect('admin/pingtaiguanli/chanpinpeizhi/index','refresh');

    }
}
