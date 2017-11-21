<?php

namespace Embranchment\Session;

class SessionManipulate {

    /*
     * Starting session in this request
     */
    public function __construct(){

	session_start();
    }

    /*
     * Write changes in session variable and close the session
     */
    public function __destruct(){
	
	session_write_close();
    }

    /*
     * Write in session variable
     *
     * @param string
     * @param mix
     *
     * @return bool
     */
    public function write($Session,$Parameter){
	
	$_SESSION[$Session] = $Parameter;

	if ($_SESSION[$Session] === $Parameter) {

	    return true;
	}

	return false;
    }

    /*
     * Read session variable
     *
     * @param
     *
     * @return mix
     */
    public function read($ParametersInSession){
	
	return $_SESSION[$ParametersInSession];
    }

    /*
     * Delete all session variables for this request
     */
    public function destroy(){
	
	session_destroy();
    }
}
