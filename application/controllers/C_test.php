<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    Class C_test extends CI_Controller{
        public function loadview()
        {
            $this->load->view('v_bootstrap');
        }
    }