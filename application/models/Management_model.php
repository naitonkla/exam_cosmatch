<?php

class Management_model extends CI_Model {
	
	var $emp_id;
	var $emp_prefix_id;
	var $emp_first_name;
	var $emp_last_name;
	var $emp_gender_id;
	var $emp_email;
	var $emp_telephone;
	var $emp_pic;
	var $emp_username;
	var $emp_password;
	
	var $last_insert;

	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		$this->db = $this->load->database('default', TRUE);
	}
	
	function get_user_data(){
		$sql = "SELECT *
				FROM cm_employee
				WHERE emp_username = ? AND emp_password = ?";
		$query = $this->db->query($sql, array($this->emp_username, $this->emp_password));
		return $query;
	}
	
	function get_employee_all(){
		$sql = "SELECT *
				FROM cm_employee
				LEFT JOIN cm_prefix
					ON prefix_id = emp_prefix_id
				LEFT JOIN cm_gender
					ON gender_id = emp_gender_id
				WHERE emp_status = 'Y'
				ORDER BY convert(emp_first_name using tis620), convert(emp_last_name using tis620)";
		$query = $this->db->query($sql);
		return $query;
	}
	
	function get_all_prefix(){
		$sql = "SELECT * FROM cm_prefix";
		$query = $this->db->query($sql);
		return $query;
	}
	
	function get_all_gender(){
		$sql = "SELECT * FROM cm_gender";
		$query = $this->db->query($sql);
		return $query;
	}
	
	function insert_employee(){
		$sql = "insert into cm_employee (emp_prefix_id, emp_first_name, emp_last_name, emp_gender_id, emp_email, emp_telephone, emp_status, emp_username, emp_password, emp_create, emp_update) value (?, ?, ?, ?, ?, ?, 'Y', ?, ?, ?, ?)";
		$this->db->query($sql, array($this->emp_prefix_id, $this->emp_first_name, $this->emp_last_name, $this->emp_gender_id, $this->emp_email, $this->emp_telephone, $this->emp_username, $this->emp_password, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")));
		
		$this->last_insert = $this->db->insert_id();
	}
	
	function update_employee(){
		$sql = "UPDATE cm_employee
				SET emp_prefix_id = ?,
					emp_first_name = ?,
					emp_last_name = ?,
					emp_gender_id = ?,
					emp_email = ?,
					emp_telephone = ?,
					emp_pic = ?,
					emp_update = ?,
					emp_username = ?,
					emp_password = ?
				WHERE emp_id = ?";
		$this->db->query($sql, array($this->emp_prefix_id, $this->emp_first_name, $this->emp_last_name, $this->emp_gender_id, $this->emp_email, $this->emp_telephone, $this->emp_pic, date("Y-m-d H:i:s"), $this->emp_username, $this->emp_password, $this->emp_id));
	}
	
	function get_employee_by_id($id){
		$sql = "SELECT * FROM cm_employee where emp_id = ?";
		$query = $this->db->query($sql, $id);
		return $query;
	}
	
	function delete_employee($id){
		$sql = "UPDATE cm_employee set emp_status = 'N', emp_update = ? where emp_id = ?";
		$this->db->query($sql, array(date("Y-m-d H:i:s"), $id));
	}
	
	function check_username($username){
		$sql = "SELECT * FROM cm_employee WHERE emp_username = ?";
		$query = $this->db->query($sql, $username);
		return $query;
	}
}
?>