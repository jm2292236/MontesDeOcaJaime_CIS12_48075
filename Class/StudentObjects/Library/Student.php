<?php
//Mark E. Lehr
//September 27th, 2012
//Student Class
class Student{
	
	private $name;//Student Name
	private $address;//Student Address
	private $phone;//Student Phone Number
    private $class_list;//Student Course List
	
	private function setName($n){$this->name=$n;}
	public  function getName(){return $this->name;}
	
	private function setAddress($a){$this->address=$a;}
	public  function getAddress(){return $this->address;}

	private function setPhone($p){$this->phone=$p;}
	public  function getPhone(){return $this->phone;}

	public function setClass_List($u){
			array_push($this->class_list,$u);
	}
	public  function getClass_List(){return $this->class_list;}

	public function Student($n,$a,$p){
		$this->setName($n);
		$this->setAddress($a);
		$this->setPhone($p);
		$this->class_list=array();
	}
};
?>