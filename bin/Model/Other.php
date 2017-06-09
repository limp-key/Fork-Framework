<?php

namespace Fork\Bin\Model;

trait Other{

    public function param($parameters = array()){
	if(is_array($parameters)){
	    for($i = 0; $i < count($parameters); $i++){
		$parameters[$i] = $this->MySQLi->escape_string($parameters[$i]);
	    }
	    
	    if(count($parameters) == 1)
		return $parameters[0];
	    else
		return $parameters;
	}else{
	    $parameters = $this->MySQLi->escape_string($parameters);
	    return $parameters;
	}
    }

    public function where($parameters){
	$parameters = $this->param($parameters);
	$this->Query .= " WHERE $parameters";

	return $this;
    }

    public function exec(){
	$returnQuery = $this->MySQLi->query($this->Query);
	
	return $returnQuery;
    }

    public function show(){
	$returnQuery = $this->MySQLi->query($this->Query);

	if(!empty($returnQuery))
	    return $returnQuery->fetch_all();
	else
	    return false;
    }

    public function create_database($TableName){
  	$TableName = $this->MySQLi->escape_string($TableName);
	$this->Query = "CREATE DATABASE $TableName";
    }

    public function drop_database($TableName){
	$TableName = $this->MySQLi->escape_string($TableName);
	$this->Query = "DROP DATABASE $TableName";
    }

    public function query($Request){
	$this->Query = $Request;

	return $this;
    }
    
}
