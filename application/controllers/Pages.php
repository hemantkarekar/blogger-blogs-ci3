<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	/**
	 * Login Page for this controller.
	 * 
	 */

	function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		if (isset($_SESSION["username"])) {
			header("Location:" . base_url());
		}
		$data["page"] = [
			"title" => "Login Page"
		];
		$this->load->view('pages/login', $data);
	}
	public function register()
	{
		$data["page"] = [
			"title" => "Register Page"
		];
		$this->load->view('pages/register', $data);
	}

	public function index()
	{
		if (!isset($_SESSION['username'])) {
			header("Location:" . base_url("login"));
		}
		$data["page"] = [
			"title" => "Home Page"
		];

		$data["user"] = [
			"full_name" => $this->db->query("SELECT `full_name` FROM `users` WHERE `username` = '" . $_SESSION['username']. "'")->result()[0]->full_name
		];
		$this->load->view('pages/index', $data);
	}

	public function blogs(){
		if (!isset($_SESSION['username'])) {
			header("Location:" . base_url("login"));
		}
		$this->load->model("Blogs_model");
		$data["blogs"] = $this->Blogs_model->get_all_blogs_meta();
		$data["page"] = [
			"title" => "All Blogs Page"
		];
		$this->load->view('pages/blogs', $data);
	}
}
