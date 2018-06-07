<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
    	parent::__construct();
    	//Codeigniter : Write Less Do More
    	$this->load->model('Dbslogin');
    	$this->load->helper('url');
    }
	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	function registertamu(){
		$this->load->view('header');
		$this->load->view('registertamu');
		$this->load->view('footer');
	}

	function tamu(){
		$this->load->view('logintamu');
	}

	function pegawai(){
		$this->load->view('loginpegawai');
		$this->load->view('footer');
	}

	function admin(){
		$this->load->view('loginadmin');
		$this->load->view('footer');
	}

	function pilihlogin(){
		$this->load->view('sesilogin');
		$this->load->view('footer');

	}

	
	function logintamu(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->Dbslogin->cek_login("tamu",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("login/pegawaiyes"));
 
		}else{
			echo "Username dan password salah !";
		}
	}

	function loginpegawai(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->Dbslogin->cek_login("pegawai",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("login/pegawaiyes"));
 
		}else{
			echo "Username dan password salah !";
		}
	}

	function loginadmin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->Dbslogin->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("login/pegawaiyes"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}


}
