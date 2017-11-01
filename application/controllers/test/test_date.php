<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class test_date extends CI_Controller {

    public function index() {

        // 比较日期大小
        $datetime1 = new DateTime('2009-10-11');
        $datetime2 = new DateTime('2009-10-16');
        $interval = date_diff($datetime1, $datetime2);
        //echo $interval->format('%R%a days');
        var_dump($interval);
        echo $interval->d;
    }

    public function t() {
        $sql = 'select m.id as id,m.date as date from myusers as m where m.name = ?';
        $res = $this->db->query($sql, array('吴大富'));
        $rows = $res->result();
        foreach ($rows as $r) {
            $date1 = new DateTime(date("Y-m-d H:i:s"));
            $date = new DateTime($r->date);
            $interval = date_diff($date1, $date);
            //echo $interval->format('%R%a days');
            var_dump($interval);
            echo $interval->d;
        }

        //var_dump(date("Y-m-d H:i:s"));
    }
    
    public function getDateList1() {
        $this->load->library('Lunar');
        $result = $this->lunar->getDateList();
        echo $result;
    }

    public function getDateList() {
        $date = time();
        $beginDate = date("Y-m-d", time());
        $endDate = date("Y-m-d", strtotime("+1 year", time()));

        $arrDate = array();

        for ($i = 0; $i <= 5; $i++) {
            $date = $this->monthadd(time(), $i);

            $firstday = strtotime(date('Y-m-01', $date));
            $lastday = strtotime("+1 month -1 day", $firstday);

            $arrDay = array();

            $dayCount = date('t', $firstday);
            for ($j = 0; $j < $dayCount; $j++) {
                $day = date("Y-m-d", strtotime("+$j day", $firstday));

                $enable = true;
                if ($i == 0 || $i == 12) {
                    if ($day < $beginDate || $day > $endDate) {
                        $enable = false;
                    }
                }

                $arr = $this->dateConversion($day);
                $lunar = mb_substr($arr[2], 0, 3, "UTF-8");
                ;
                $week = date("w", strtotime($day));

                if ($j == 0) {
                    for ($k = 0; $k < $week; $k++) {
                        $arrDay[] = array('enable' => false, 'solar' => '', 'lunar' => '', 'week' => '');
                    }
                }

                $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                $week = "周" . $weekarray[$week];
                if ($day == date("Y-m-d")) {
                    $week = '今天';
                } else if ($day == date("Y-m-d", strtotime("+1 day", time()))) {
                    $week = '明天';
                }

                $arrDay[] = array('enable' => $enable, 'solar' => $day, 'lunar' => $lunar, 'week' => $week);
            }

            $arrDate[] = array('date' => date("Y-m-d", $firstday), 'days' => $arrDay);
        }

        //var_dump($arrDate);
        echo json_encode($arrDate);
    }

    /**
     * 阴阳历转换
     *
     * @param mixed $date This is a description
     * @return mixed This is the return value description
     *
     */
    public function dateConversion($date) {
        $Year = date('Y', strtotime($date));
        $Month = date('m', strtotime($date));
        $Day = date('d', strtotime($date));

        $this->load->library('Lunar');
        //$lunar = new Lunar;
        $result = $this->lunar->convertSolarToLunar($Year, $Month, $Day);

        $festival = $this->lunar->getFestival($date);

        if (!empty($festival))
            $result[2] = $festival;

        return $result;
    }

    /**
     * 月份增加
     *
     * @param mixed $date This is a description
     * @param mixed $interval This is a description
     * @return mixed This is the return value description
     *
     */
    public function monthadd($date, $interval) {
        $date1 = strtotime("+" . $interval . " month", $date);
        $date2 = strtotime("-" . $interval . " month", $date1);

        if (date("Y-m-d", $date) != date("Y-m-d", $date2)) {
            $dayCount = date('t', $date2);
            $date1 = strtotime(date('Y-m-' . $dayCount, $date2));
        }
        return $date1;
    }
    
    public function sjc()
    {
        echo date('YmdHis');
    }
    
    public function zf()
    {
        $this->load->view('test/zf');
    }

}

