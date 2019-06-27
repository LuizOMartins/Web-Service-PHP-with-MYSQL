<?php

class XML {

	 private $xml;
	 private $tab = 1; //identação

	 public function __construct( $version = '1.0', $encoding = 'UTF-8'){
	 	
	 	$this->xml .= "<?xml version='$version' encoding='$encoding' ?>\n";
	 }

	 	public function OpenTag($name){
	 		$this->xml.="<$name>\n";
	 	}

	 	public function CloseTag($name){
	 		$this->tab--;
	 		$this->addTab();
	 		$this->xml .="</$name>\n";
	 	}

	 	private function addTab(){
	 		for($i = 0; $i <=$this->tab; $i++){
	 			$this->xml .= "\t";
	 		}
	 	}

	 	public function addTag($name, $value){
	 		$this->addTab();
	 		$this->xml .= "<$name>$value</$name>\n";
	 	}

	 	public  function __toString(){
	 		return $this->xml;
	 	}

	 	public function setValue($value){
	 		$this->xml.="$value\n";
	 	}
}

?>