<?php
class Leave_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	function buildMonthDropdown()//builds month dropdown for date
    {
        $month=array(
            '01'=>'January',
            '02'=>'February',
            '03'=>'March',
            '04'=>'April',
            '05'=>'May',
            '06'=>'June',
            '07'=>'July',
            '08'=>'August',
            '09'=>'September',
            '10'=>'October',
            '11'=>'November',
            '12'=>'December');
        return $month;
    }
    function Leave_getall() {//select all the info of an employee from employee table
		$this->load->database();
		$query = $this->db->get('leave');
		return $query->result();
	}
	
	function Leave_edit() {
		$this->load->database();
		$empnum=$this->input->post('empnum');
		$filedate=$this->input->post('filedate');
		$query = $this->db->query('SELECT * FROM `employee` `a`, `leave` `b` WHERE `b`.`empnum`=`a`.`empnum` AND `b`.`filedate`="'.$filedate.'" AND `a`.`empnum`="'.$empnum.'"');	
		return $query->result();
	}

	function Leave_delete(){
		$this->db->where('empnum',$this->input->post('empnum'));
		$this->db->delete('leave');
	}//delete an employee
	
	function Leave_getinfo(){
		$this->load->database();
		//$sql_execute = "SELECT * FROM `leave` , `employee` WHERE `leave`.`empnum` = ' ".$this->input->post('empnum')." ' LIMIT 0 , 30";
		$query = $this->db->query('SELECT * FROM `employee` `a`, `leave` `b` WHERE `b`.`empnum`=`a`.`empnum`');	
		return $query->result();
	}

	/*
	*/
	function Leave_numrows() {//count number of rows
		$this->load->database();
		$empnum=$this->input->post('empnum');
		$query = $this->db->get_where('leave',array('empnum'=>$empnum));
		return $query->num_rows();
	}
	function Leave_Insert(){
		
		$fday=$this->input->post('fday');
		$fmonth=$this->input->post('fmonth');
		$fyear=$this->input->post('fyear');
		$sday=$this->input->post('sday');
		$smonth=$this->input->post('smonth');
		$syear=$this->input->post('syear');
		$rday=$this->input->post('rday');
		$rmonth=$this->input->post('rmonth');
		$ryear=$this->input->post('ryear');
		$filedate=$fyear . '-' . $fmonth. '-' . $fday;
		$startdate=$syear . '-' . $smonth. '-' . $sday;
		$returndate=$ryear . '-' . $rmonth. '-' . $rday;
		$data = array(
		'empnum'=>$this->input->post('empnum'),
		'filedate'=>$filedate,       
	    'startdate'=>$startdate,
		'returndate'=>$returndate,
		'type'=>$this->input->post('type'),
		'reason'=>$this->input->post('reason'),
		);
		$this->db->insert('leave',$data); 
	}
	function Leave_approved(){
		//$this->db->where('empnum',$this->input->post('empnum'));
		$app = "approved";
		$row = $this->db->where('empnum',$this->input->post('empnum'));
		$sql_x = 'UPDATE `leave` SET `approval` = ? WHERE `empnum` = ? AND `filedate` = ?';
		$this->db->query($sql_x, array($app, $this->input->post('empnum'),$this->input->post('filedate') ) );
	}
	function Leave_notapproved(){
		$this->db->where('empnum',$this->input->post('empnum'));
		$app = "not approved";
		$row = $this->db->where('empnum',$this->input->post('empnum'));
		$sql_x = 'UPDATE `leave` SET `approval` = ? WHERE `empnum` = ? AND `filedate` = ?';
		$this->db->query($sql_x, array($app, $this->input->post('empnum'),$this->input->post('filedate') ) );
	}
	function Empview()
	{
		$emp = $this->session->userdata('empnum');
		$sql_x = 'SELECT * FROM `leave` WHERE `empnum` = ?';
		$query = $this->db->query($sql_x, array($emp));
		if(empty($query)) return NULL;
		else return $query->result();
	}
	
}
?>