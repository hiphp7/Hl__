<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 锁单
 */
class msoudan extends CI_Model {

    /**
     * 判断是否锁单
     * 如果锁单就返回 ture 否则 false
     */
    public function isSouDan($tableid = 0, $tablename = '') {
       
        $suodanzhuangtai = '未锁单';
        if ($tableid != 0) {
            $admin_session = $this->session->userdata('admin');
            $sql = 'select m.guanliyuanid as guanliyuanid from suodan as m where m.tableid = ? and m.tablename = ?';
            $res = $this->db->query($sql, array($tableid, $tablename));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    if($admin_session['id'] != $r->guanliyuanid)
                    {
                        $suodanzhuangtai = '别人锁单';
                    }
                    else
                    {
                        $suodanzhuangtai = '自己锁单';
                    }
                }
            }
        }
        return $suodanzhuangtai;
    }
    
    /**
     * 获取锁单人
     */
    public function getSouDan($tableid = 0, $tablename = '') {
       
        $result = '';
        if ($tableid != 0) {
            // 加载管理员
            $this->load->model("guanli/mguanliyuan", "mguanliyuan");
            
            $sql = 'select m.guanliyuanid as guanliyuanid, m.suodanshijian as suodanshijian from suodan as m where m.tableid = ? and m.tablename = ?';
            $res = $this->db->query($sql, array($tableid, $tablename));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $result = $this->mguanliyuan->getName($r->guanliyuanid). '/'.$r->suodanshijian;
                }
            }
        }
        return $result;
    }
    
    /**
     * 保存锁单
     */
    public function save($tableid, $tablename = '') {
        
        $admin_session = $this->session->userdata('admin');
        $this->db->insert('suodan', array('guanliyuanid' => $admin_session['id'], 'tableid' => $tableid, 'tablename' => $tablename, 'suodanshijian' => date("Y-m-d H:i:s")));
        $id = $this->db->insert_id();
        return $id;
    }
    
    /*
     * 删除锁单
     */
    public function del($tableid, $tablename = '')
    {
        $this->db->delete('suodan',  array('tableid' => $tableid, 'tablename' => $tablename));
    }
}
