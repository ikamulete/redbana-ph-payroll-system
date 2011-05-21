<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	//by abe, 03may2011 1711H : ano ba talaga, 'Signupmodel' which does not correspond to the filename of our model or '__construct()' ?
	//remove either upon deciding.
	
	/*function Signupmodel()
	{
		// load the parent constructor
		parent::__Model;
		$this->load->library('session');
	}*/

	function fetch_User($empnum = NULL, $password = NULL)
	/*
		made | abe | 05may2011_2357 | for purpose of cohesion or singularity?
	*/
	{
		if($empnum == NULL or $password == NULL) return NULL; 
	
		$this->db->where('empnum', $empnum);
		$this->db->where('password', $password);
		$query = $this->db->get('employee');
		
		return $query;
	}
	
	function validate()
	{
	
		$query = $this->fetch_User(mysql_real_escape_string($this->input->post('empnum')),
				mysql_real_escape_string($this->input->post('password')));
		if($query->num_rows == 1)
		{
			return true;
		}
		else 
		{
			return false;
		}
		
	}
	
	function isUser_LoggedIn()
	{
		/*
		*	Made by abe, 03may2011 1702
		*   -basically checks whether a user is still logged in.
		*	-useful so that, Object-oriented approach is applied.
		*/
		$result = $this->session->userdata('logged_in');
		
		return $result;
	}
	
	function getCurrentUser()
	{
		$result = $this->session->userdata('empnum');
		
		return $result;
	}
	function can_Access($type){
		$query = $this->db->query('SELECT `type` FROM user_main WHERE user_right = "'.$this->session->userdata('userType').'" AND privilege="'.$type.'"');
		foreach ($query->result() as $row)
		$type=$row->type;
		if ($type==1) return true;
		else return false;
	}
	function permission($type){
		$query = $this->db->query('SELECT `type`,`privilege` FROM user_main WHERE user_right = "'.$this->session->userdata('userType').'" ');
		return $query;
	}
}//CLASS

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */