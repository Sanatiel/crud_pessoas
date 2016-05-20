<?php

class People{


	private $data = array();


	public function __construct(){

	}


	public function __set($name,$value){
		$this->data[$name] = $value;
	}


	public function __get($name){
		return $this->data[$name];
	}




}









?>