<?php
defined('BASEPATH')or exit('no direct script access allowed');
require_once APPPATH."/third_party/PHPExcel.php";

class Excel extends PHPExcel{
    public function __construct(){
        parent::__construct();
    }
}
