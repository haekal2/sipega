<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class C_edulevel extends CI_Controller{
        public function index()
        {
            $data=array();
            $data["controller"]=$this->router->class;
            $data["method"]=$this->router->method;
            $this->load->view('v_temp', $data);
        }

        public function form2add()
        {
            $data = array();
            $this->load->model("m_edulevel");
            $data=$this->m_edulevel->initdata();
            $data["myview"]="v_frmedulevel";
            $this->load->view("v_main", $data);
        }

        public function save4add()
        {
            $data=array();
            $this->load->model("m_edulevel");
            $data=$this->m_edulevel->initdata();		
            $data["saveresult"]=$this->m_edulevel->insertdata($data);
            $data["myview"]="v_frmedulevelsaved";
            $this->load->view("v_main",$data);
        }
    }
?>