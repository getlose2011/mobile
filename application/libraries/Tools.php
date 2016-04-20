<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Tools {
	public static function getTotalPage($total_num, $number_page) {
        $number_page = empty($number_page) ? 10 : $number_page;
        $total_num = ceil($total_num / $number_page);
        return $total_num;
    }
}

?>