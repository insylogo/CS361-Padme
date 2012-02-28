<?php
class Course {
	public $id;
	public $department;
	public $number;
	public $name;
	public $description;
	public $credits;
	public $is_semester;
	public $time;
	public $start_date;
	public $end_date;
	public $start_time;
	public $end_time;
	public $offering;
	
	 function __construct ($id, $dept, $num, $name, $desc, $cred, $issem) {
	 	$this->id = $id;
	 	$this->description = $desc;
		$this->credits = $cred;
		$this->is_semester = $issem;
		$this->department = $dept;
		$this->name = $name;
		$this->number = $num; 
	 }
	 
	 function set_date($start_date, $end_date) {
	 	$this->start_date = $start_date;
		$this->end_date = $end_date;	 
	 }
	 
	 function set_time($start_time, $end_time) {
	 	$this->start_time = $start_time;
		$this->end_time = $end_time;
		
	 }
	 
}
?>