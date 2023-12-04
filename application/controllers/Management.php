<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
	
	function login_page(){
		$data = 0;
		$this->load->view('v_login_page', $data);
	}

	function check_login(){
		$this->load->model('Management_model', 'mng');
		
		$this->mng->emp_username = $this->input->post("username");
		$this->mng->emp_password = $this->input->post("password");
		
		$pass_check = md5("c0D3".$this->mng->emp_password."3C1oD");
		
		$this->mng->emp_password = $pass_check;
		
		$result = $this->mng->get_user_data();
		
		if($result->num_rows() == 1){
			// set session
			$id = $result->row()->emp_id;
			$this->session->set_userdata("id", $id);
			redirect('Management/employee_list', 'refresh');
		}else{
			// ข้อมูลไม่ถูกต้อง
			$msg = "username หรือ password ไม่ถูกต้อง";
			$this->session->set_flashdata('msg', $msg);
			redirect('Management/login_page', 'refresh');
		}
	}
	
	// show all employee
	function employee_list(){
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('Management_model','mng');
		$data['mng'] = $this->mng;
		
		$data['employee'] = $this->mng->get_employee_all();
		
		$this->load->view('v_employee_list', $data);
	}
	
	// add employee
	function add_employee(){
		$this->load->model('Management_model','mng');
		$data['mng'] = $this->mng;
		
		$data_prefix = $this->mng->get_all_prefix();
		foreach($data_prefix->result() as $key=>$row){
			$arr_prefix[$row->prefix_id] = $row->prefix_name;
		}
		$data['opt_prefix'] = $arr_prefix;
		
		$data_gender = $this->mng->get_all_gender();
		foreach($data_gender->result() as $key=>$row){
			$arr_gender[$row->gender_id] = $row->gender_name;
		}
		$data['opt_gender'] = $arr_gender;
		
		$this->load->view('v_add_employee', $data);
	}
	
	function employee_save(){
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('Management_model','mng');
		
		$this->mng->emp_prefix_id	= $this->input->post("prefix");
		$this->mng->emp_first_name	= $this->input->post("first_name");
		$this->mng->emp_last_name	= $this->input->post("last_name");
		$this->mng->emp_gender_id	= $this->input->post("gender");
		$this->mng->emp_email		= $this->input->post("email");
		$this->mng->emp_telephone	= $this->input->post("telephone");
		
		$this->mng->emp_username	= $this->input->post("username");
		$this->mng->emp_password	= md5("c0D3".$this->input->post("password")."3C1oD");
		$cf_passowrd	= $this->input->post("cf_passowrd");
		
		$this->mng->insert_employee();
		
		if($_FILES["filename"]["name"] != ""){
			list($file_name, $file_type) = explode(".", $_FILES['filename']['name']);
			
			move_uploaded_file($_FILES["filename"]["tmp_name"], "pic/pic-".$this->mng->last_insert.".".$file_type);
			
			$pic = "pic-".$this->mng->last_insert.".".$file_type;
		}else{
			$pic = "default-profile.jpg";
		}
		
		$this->mng->emp_id = $this->mng->last_insert;
		$this->mng->emp_pic = $pic;
		$this->mng->update_employee();
		
		//case ไม่มีปัญหา
		
		redirect('Management/employee_list', 'refresh');
	}
	
	function edit_employee($id){
		$this->load->model('Management_model','mng');
		$data['mng'] = $this->mng;
		
		$data_prefix = $this->mng->get_all_prefix();
		foreach($data_prefix->result() as $key=>$row){
			$arr_prefix[$row->prefix_id] = $row->prefix_name;
		}
		$data['opt_prefix'] = $arr_prefix;
		
		$data_gender = $this->mng->get_all_gender();
		foreach($data_gender->result() as $key=>$row){
			$arr_gender[$row->gender_id] = $row->gender_name;
		}
		$data['opt_gender'] = $arr_gender;
		
		// get data form id
		if($this->mng->get_employee_by_id($id)->num_rows() == 1){
			$data['emp'] = $this->mng->get_employee_by_id($id)->row();
		}else{
			redirect('Management/employee_list', 'refresh');
		}
		
		$this->load->view('v_edit_employee', $data);
	}
	
	function employee_update(){
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('Management_model','mng');
		
		$this->mng->emp_id			= $this->input->post("id");
		$old_data = $this->mng->get_employee_by_id($this->mng->emp_id)->row();
		$this->mng->emp_prefix_id	= $this->input->post("prefix");
		$this->mng->emp_first_name	= $this->input->post("first_name");
		$this->mng->emp_last_name	= $this->input->post("last_name");
		$this->mng->emp_gender_id	= $this->input->post("gender");
		$this->mng->emp_email		= $this->input->post("email");
		$this->mng->emp_telephone	= $this->input->post("telephone");
		
		$this->mng->emp_username	= $this->input->post("username");
		$password					= $this->input->post("password");
		
		if($password != "--password--"){
			$this->mng->emp_password	= md5("c0D3".$password."3C1oD");
		}else{
			$this->mng->emp_password	= $old_data->emp_password;
		}
		
		if($_FILES["filename"]["name"] != ""){
			list($file_name, $file_type) = explode(".", $_FILES['filename']['name']);
			
			move_uploaded_file($_FILES["filename"]["tmp_name"], "pic/pic-".$this->mng->emp_id.".".$file_type);
			
			$pic = "pic-".$this->mng->emp_id.".".$file_type;
		}else{
			$pic = $old_data->emp_pic;
		}
		
		$this->mng->emp_pic = $pic;
		$this->mng->update_employee();
		
		//case ไม่มีปัญหา
		
		redirect('Management/employee_list', 'refresh');
	}
	
	function delete_employee(){
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('Management_model','mng');
		
		$delete_id = $this->input->post("delete_id");
		$this->mng->delete_employee($delete_id);
		
		redirect('Management/employee_list', 'refresh');
	}
	
	function check_username(){
		$this->load->model('Management_model','mng');
		
		$username = $this->input->post("username");
		$data = $this->mng->check_username($username);
		
		echo $data->num_rows();
	}
}
?>