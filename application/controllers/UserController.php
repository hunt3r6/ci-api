<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/JWT.php';
use \Firebase\JWT\JWT;


class UserController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}

	public function response($data)
	{
		$this->output
			 ->set_content_type('application/json')
			 ->set_status_header(200)
			 ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			 ->_display();

		exit();
	}

	public function register()
	{
		return $this->response($this->user->save());
	}

	public function get_all()
	{
		return $this->response($this->user->get());
	}

	public function get($id)
	{
		return $this->response($this->user->get('id', $id));
	}

	public function login()
	{
		if (!$this->user->is_valid()) {
			return $this->response([

				'success'  => FALSE,
				'message' => 'email atau paswordnya salah'

				]);
		}

		die('hard');
	}

}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */