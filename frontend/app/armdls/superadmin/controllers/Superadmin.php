<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
    	$this->load->model('home_models');
			$this->load->helper('cookie');
					$config = array('server'            => REST_URL,
					                //'api_key'         => 'Setec_Astronomy'
					                //'api_name'        => 'X-API-KEY'
					                //'http_user'       => 'username',
					                //'http_pass'       => 'password',
					                //'http_auth'       => 'basic',
					                //'ssl_verify_peer' => TRUE,
					                //'ssl_cainfo'      => '/certs/cert.pem'
					                );

					// Run some setup
					$this->rest->initialize($config);
	}

	public function index(){
		if ($this->session->has_userdata('login')) {
			redirect(base_url().'superadmin/landing');
		}
		if($this->input->server('REQUEST_METHOD')=='GET'){
			$this->load->view('login');
		}
		else if($this->input->server('REQUEST_METHOD')=='POST'){
			$params['input'] = $this->input->post('user');
			$result = $this->rest->post('user/login',$params);
			$data['user'] = json_decode(json_encode($result), true);
			$this->session->set_userdata('login',$data['user']);
			// echo json_encode($data['user']);
			if ($data['user']['status']==TRUE) {
				redirect(base_url().'superadmin/landing');
			}
			else{
				redirect(base_url().'superadmin');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('login');
		$this->session->sess_destroy();
		redirect(base_url().'superadmin');
	}

	public function managerial(){
		$this->load->view('header');
		$this->load->view('manage');
		$this->load->view('footer');
	}

	public function landing(){
		if (!$this->session->has_userdata('login')) {
			redirect(base_url().'superadmin');
		}
		if($this->input->server('REQUEST_METHOD')=='GET'){
			$this->load->view('header');
			$this->load->view('landing');
			$this->load->view('footer');
		}
	}

  function __encrip_password($password) {
        return md5($password);
    }


}
