<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 平台管理  --  角色管理
 */
class jiaoseguanli extends CI_Controller {

        private $li;
        private $guanlizu;

        function __construct() {
            parent::__construct();

            // 生成列表显示的列
            $std1 = new stdClass();
            $std1->index = 0;
            $std1->display_name = '角色类型名称';
            $std1->name = 'mingcheng';
            $std1->show = true;
            $li[0] = $std1;

            $std2 = new stdClass();
            $std2->index = 1;
            $std2->display_name = '操作人';
            $std2->name = 'xingming';
            $std2->show = true;
            $li[1] = $std2;

            $std3 = new stdClass();
            $std3->index = 2;
            $std3->display_name = '更新时间';
            $std3->name = 'chuangjianshijian';
            $std3->show = true;
            $li[2] = $std3;

            $this->li = $li;

            $sql = "select m.id as id ,m.mingcheng as mingcheng from guanliyuanzu as m";
            $query = $this->db->query($sql);
            $result = $query->result();
            if (!empty($result)) {
                $this->guanlizu = $result;
            } else {
                $this->guanlizu = array();
            }
        }


	public function index()
	{
        $data['li'] = $this->li;
        $data['guanlizu'] = $this->guanlizu;
        $this->load->view('admin/pingtaiguanli/jiaose/index', $data);
	}

    /**
     * 显示全部角色
     */
    public function all() {
        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name)) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }


        $sql = 'select m.id as id, m.mingcheng as mingcheng, b.xingming as xingming,
        m.chuangjianshijian as chuangjianshijian, m.caozuoyuanid as caozuoyuanid

            from jiaose as m  left join  guanliyuan as b on   m.caozuoyuanid= b.id where ';

        $sqlcount = 'select count(m.id) as id from jiaose as m where ';

        // 不变的
        $sql = $sql . 'order by m.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;

        $sql = str_replace("where order", "order", $sql);
        $sql = str_replace("where and", "where", $sql);

        $sqlcount = str_replace("where order", "order", $sqlcount);
        $sqlcount = str_replace("where and", "where", $sqlcount);
        $newstr = substr(trim($sqlcount), 0, strlen(trim($sqlcount)) - 5);
        if (substr(trim($sqlcount), -5) == 'where') {
            $sqlcount = $newstr;
        }

        $res = $this->db->query($sql);
        $res_count = $this->db->query($sqlcount);

        $mycount = 0;
        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }

        $result = new stdClass();
        $result->myData = $res->result();
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

        // 保存保险公司
    public function save()
    {
        date_default_timezone_set("Asia/Shanghai");
        $admin_session = $this->session->userdata('admin');
        $ChannelID = $this->security->xss_clean($this->input->post('ChannelID'));
        $obj = array(
            'mingcheng' => $this->security->xss_clean($this->input->post('mingcheng')),
            'guanliyuanzuid' => $ChannelID,
            'caozuoyuanid' => $admin_session['id'],
            'chuangjianshijian' => date("Y-m-d H:i:s")
        );
        $this->db->insert('jiaose', $obj);
        $id = $this->db->insert_id();
        if(intval($id) > 0)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
    }

    // 删除平台
    public function del()
    {
        $this->db->trans_begin();
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->db->delete('jiaose', array('id' => $id));
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo '0';
        }
        else
        {
            $this->db->trans_commit();
            echo '1';
        }
    }

    // 修改角色
    public function update()
    {
        date_default_timezone_set("Asia/Shanghai");
        $admin_session = $this->session->userdata('admin');
        $obj = array(
            'mingcheng' => $this->security->xss_clean($this->input->post('mingcheng')),
            'caozuoyuanid' => $admin_session['id'],
            'guanliyuanzuid' => $this->security->xss_clean($this->input->post('ChannelID')),
            'chuangjianshijian' => date("Y-m-d H:i:s")
        );
        
        $this->db->trans_begin();
        $this->db->update('jiaose', $obj, array('id' => $this->input->post('id')));
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo '0';
        }
        else
        {
            $this->db->trans_commit();
            echo '1';
        }
    }
}
