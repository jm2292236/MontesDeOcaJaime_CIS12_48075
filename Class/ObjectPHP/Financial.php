<?php
//Mark E. Lehr
//July 2nd,2011
//Financial Class
class Financial
{
	private $presValue; //i.e. Principle $ only
	private $mDeposits; //Monthly Deposits $ only
	private $invRate;   //Interest (store as int)
	private $inflation;	//Inflation (store as int)
	private $years;     //Period of investment
	
	//Utility function because it is private
	//Initialize with a default value
	private function setYears($y)
	{
		if($y<0) $this->years=4;    //Set to a default
		else $this->years=(int)($y);//if not valid
	}
	
	//Retrieves the property
	public function getYears(){ return $this->years;}
	
	//Utility function because it is private
	//Initialize with a default value
	private function setInflation($if)
	{
		if($if<0) $this->inflation=4;    //Set to a default
		else $this->inflation=(int)($if);//if not valid
	}
	
	//Retrieves the property
	public function getInflation(){ return $this->inflation;}
	
	//Utility function because it is private
	//Initialize with a default value
	private function setInvRate($iv)
	{
		if($iv<0) $this->invRate=10;   //Set to a default
		else $this->invRate=(int)($iv);//if not valid
	}
	
	//Retrieves the property
	public function getInvRate(){ return $this->invRate;}
	
	//Utility function because it is private
	//Initialize with a default value
	private function setMDeposits($m)
	{
		if($m<0) $this->mDeposits=100;  //Set to a default
		else $this->mDeposits=(int)($m);//if not valid
	}
	
	//Retrieves the property
	public function getMDeposits(){ return $this->mDeposits;}
	
	//Utility function because it is private
	//Initialize with a default value
	private function setPresValue($p)
	{
		if($p<0) $this->presValue=100;  //Set to a default
		else $this->presValue=(int)($p);//if not valid
	}
	
	//Retrieves the property
	public function getPresValue(){ return $this->presValue;}
	
	//Retrieves all the properties
	public function getAll()
	{ 
		$all=array($this->presValue,$this->mDeposits,
		           $this->invRate,  $this->inflation,
				   $this->years);
		return $all;
	}
	
	//Constructor (Same name as class)
	//Initialize the properties
	//$p -> Principle
	//$m -> Monthly Deposit
	//$iv-> Interest
	//$if-> Inflation 
	//$y->  Years
	public function Financial($p,$m,$iv,$if,$y)
	{
		$this->setMDeposits($m);
		$this->setInvRate($iv);
		$this->setInflation($if);
		$this->setYears($y);
		$this->setPresValue($p);
	}
	
	//Given all the properties, what is the Future Value
	public function FV()
	{
		$fv=$this->presValue;
		$yDeposits=12*$this->mDeposits;
		for($i=1;$i<=$this->years;$i++)
		{
			$fv=$fv*(1+$this->invRate/100)+$yDeposits;
			$yDeposits=$yDeposits*(1+$this->inflation/100);
		}
		return (int)($fv);
	}
	
	//Given all the properties, what is the Present Value
	//of all the contributions
	public function PV($fv)
	{
		$pv=$fv;
		//Take into account inflation
		$infFactor=1/(1+$this->inflation/100);
		for($i=1;$i<=$this->years;$i++)
		{
			$pv*=$infFactor;
		}
		return (int)($pv);
	}
}
?>