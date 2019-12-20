<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class C_hadir extends CI_Controller{
        public function index()
        {
            $data=array();
            $data["controller"]=$this->router->class;
            $data["method"]=$this->router->method;
            $this->load->view('v_temp', $data);
        }
    }
?>