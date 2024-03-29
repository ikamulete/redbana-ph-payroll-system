<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();	
	}
	
	//by abe, 03may2011 1711H : ano ba talaga, 'Signupmodel' which does not correspond to the filename of our model or '__construct()' ?
	//remove either upon deciding.	
	/*
	function Signupmodel(){
	// load the parent constructor
		parent::__Model;
	}
	*/
	
	function submit_posted_data($fname, $mname, $sname, $eadd, $empnum,$password,$status,$mrate,$payment_mode,$position,$dept,$gender,$sdate,$bdate,$type) {
	// db is initialized in the controller, to interact with the database.
		$data = array(
				'fname' => mysql_real_escape_string($this->input->post('fname')),
				'mname' => mysql_real_escape_string($this->input->post('mname')),
				'sname' => mysql_real_escape_string($this->input->post('sname')),
				'email' => mysql_real_escape_string($this->input->post('eadd')),
				'empnum' => mysql_real_escape_string($this->input->post('empnum')),
				'password' => mysql_real_escape_string($this->input->post('password')),
				'status' => mysql_real_escape_string($this->input->post('status')),
				'mrate' => mysql_real_escape_string($this->input->post('mrate')),
				'payment_mode' => mysql_real_escape_string($this->input->post('payment_mode')),
				'position' => mysql_real_escape_string($this->input->post('position')),
				'dept' => mysql_real_escape_string($this->input->post('dept')),
				'gender' => mysql_real_escape_string($this->input->post('gender')),
				'sdate' => mysql_real_escape_string($this->input->post('sdate')),
				'bdate' => mysql_real_escape_string($this->input->post('bdate'))); 
		$this->db->insert('employee',$data);
		
	}
	
	/*
	function get_all_data() {
	// again, we use the db to get the data from table �form�
	$data['result']=$this->db->get('Product');
	return $data['result'];
	}


	function check_exists_username($username){
		
		$query = "SELECT Username from admin where Username = ?";
		$result = $this->db->query($query,$username);
		
		if($result->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	function getclass($username1){
			$this->db->where('Username', $username1);
			$this->db->select('Class');
			$class1 = $this->db->get('admin');
			echo $class1;
			//if ($stock=='cashier') echo "CASHIER";
			//return $stock;

	}		

		*/
	function validate_superuser($empnum1)
	{
			$this->db->where('empnum', $empnum1);
			$this->db->where('user_right', "superuser");
			$query = $this->db->get('employee');	
			if($query->num_rows == 1)return true;
			else return false;
	}
	function validate_hr($empnum1)
	{
			$this->db->where('empnum', $empnum1);
			$this->db->where('user_right', "hr");
			$query = $this->db->get('employee');	
			if($query->num_rows == 1)return true;
			else return false;
	}
	function validate_accounting($empnum1)
	{
			$this->db->where('empnum', $empnum1);
			$this->db->where('user_right', "accounting");
			$query = $this->db->get('employee');	
			if($query->num_rows == 1)return true;
			else return false;
	}
	function validate_emp($empnum1)
	{
			$this->db->where('empnum', $empnum1);
			$this->db->where('user_right', "employee");
			$query = $this->db->get('employee');	
			if($query->num_rows == 1)return true;
			else return false;
	}
	function validate_supervisor($empnum1)
	{
			$this->db->where('empnum', $empnum1);
			$this->db->where('user_right', "supervisor");
			$query = $this->db->get('employee');	
			if($query->num_rows == 1)return true;
			else return false;
	}
}//class

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */