<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 工具类 地区
 */
class diqu extends CI_Controller {

	/*
         * 城市
	 */
	public function GetCitys() {
            $provinceid = $this->input->post('provinceid');
            $TrueTablename = $this->db->dbprefix('cities');
            
            $sql = 'select m.id as id, m.cityid as cityid, m.city as city, m.provinceid as provinceid from '.$TrueTablename.' as m where m.provinceid = ?';
            $res = $this->db->query($sql, array($provinceid));
            $result = $res->result();
            echo json_encode($result);
        }
        
        /*
         * 地区
	 */
	public function GetAreas() {
            $cityid = $this->input->post('cityid');
            $TrueTablename = $this->db->dbprefix('areas');
            
            $sql = 'select m.id as id, m.areaid as areaid, m.area as area, m.cityid as cityid from '.$TrueTablename.' as m where m.cityid = ?';
            $res = $this->db->query($sql, array($cityid));
            $result = $res->result();
            echo json_encode($result);
        }
}
