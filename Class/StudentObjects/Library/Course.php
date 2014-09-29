<?php
//Mark E. Lehr
//September 25th, 2012
//Course Class
class Course{
	
	private $name;//Name of the course like PHP
	private $discipline;//Discipline like CIS
	private $number;//Course number lik 12
    private $units;//Unit value of course like 3
	private $secNumber;//Section Number like 47278
    private $score;//Score the class
	
	private function setName($n){$this->name=$n;}
	public  function getName(){return $this->name;}
	
	private function setDiscipline($d){$this->discipline=$d;}
	public  function getDiscipline(){return $this->discipline;}

	private function setNumber($n){$this->number=$n;}
	public  function getNumber(){return $this->number;}

	private function setUnits($u){$this->units=$u;}
	public  function getUnits(){return $this->units;}

	private function setSecNumber($n){$this->secNumber=$n;}
	public  function getSecNumber(){return $this->secNumber;}

	public function setScore($s){
		if($s>=0 && $s<=100){
			$this->score=$s;
		}else{
			$this->score=0;
		}
	}
	public function getScore(){return $this->score;}
	
	public function getGrade(){
		if($this->score>=90)return 'A';
		if($this->score>=80)return 'B';
		if($this->score>=70)return 'C';
		if($this->score>=60)return 'D';
		return 'F';
	}

	public function Course($n,$d,$b,$u,$s){
		$this->setName($n);
		$this->setDiscipline($d);
		$this->setNumber($b);
		$this->setUnits($u);
		$this->setSecNumber($s);
	}
};
?>