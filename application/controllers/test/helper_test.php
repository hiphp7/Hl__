<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class helper_test extends CI_Controller {

    public function index() {
       $this->load->helper('tools');
       $r = getPadLevel('123456');
       echo $r;
       echo "<br/>";
       echo show('是帅哥！');
    }
    
    private function ArrayToString($data)
    {
        $st = '';
        $len = count($data);
        $index = 0;
        foreach ($data as $key => $value) {
           if($index == $len - 1)
           {
               $st = $st.$key .'='. $value;
           }
           else
           {
               $st = $st.$key .'='. $value.'&';
               $index++;
           }  
        }
        return $st;
    }
    
    public function ats()
    {
        $data['A'] = 1;
        $data['B'] = 'QW';
        $data['C'] = 'EW';
        $data['D'] = 'RT';
        $data['E'] = 123;
        
        echo $this->ArrayToString($data);
        echo '<br/>';
    }
    
}
