<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 保险
 */
class baoxian extends CI_Controller {
	public function select()
	{
		$chanpinleibie= $this->config->item('保险类型');
        $sql = "select m.id as id, m.baoxiangongsiid as baoxiangongsiid, m.chanpinmingcheng as chanpinmingcheng, m.chanpinleibie as chanpinleibie, m.baoxianjine as baoxianjine, m.baoexiangxi as baoexiangxi, m.baoxianfanwei as baoxianfanwei, m.xiaoshoudanjia as xiaoshoudanjia, m.zuixiaonianling as zuixiaonianling, m.zuidanianling as zuidanianling from baoxianchanpin as m";
        $re = $this->db->query($sql);
        $res = $re->result();
		$baoxian = new stdClass();
		$baoxian->accident = array();
		$baoxian->dallyover = array();

		foreach ($res as $k1 => $v1) {
              $id = $v1->baoxiangongsiid;
			// 查询 保险公司名称
			$sql = "select m.mingcheng as mingcheng from baoxiangongsi as m where id = ?";
			$q = $this->db->query($sql, array($id));
			$v1->mingcheng = $q->row()->mingcheng;
			if ($v1->chanpinleibie == 0) {
				$v1->chanpinmingzi = $chanpinleibie[0];
				$baoxian->accident[] = $v1;
			} elseif ($v1->chanpinleibie == 2) {
				$v1->chanpinmingzi = $chanpinleibie[2];
				$baoxian->dallyover[]= $v1;
			}
		}

		//echo json_encode($baoxian);
                $callback = $this->input->get('callback');
                echo $callback."('".json_encode($baoxian)."')";
	}
}