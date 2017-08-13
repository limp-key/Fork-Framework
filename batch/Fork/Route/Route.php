<?php

namespace Fork\Route;

use Fork\Assembly\Main as AssemblyMain;

class Route{
    
    public static function Request($Path, $Class, $Method, $Config = ''){

	if( ( empty($_SERVER['REDIRECT_URL']) && $Path !== '/' ) ||
	    $Path !== $_SERVER['REDIRECT_URL'] ||
		      $Path !== $_SERVER['REQUEST_URI'] ){
	    
	    return false;
	}
	
	# Load config
	\Fork\Assembly\Configs::ToPlug($Config);

	#\Fork\Assembly\Configs::Defaults();

	#\Fork\Assembly\Configs::Mains();

	if (!empty($Config))
	    \Fork\Assembly\Configs::Additionals($Config);

	#phpinfo();

	#Create object Controller (depending on the request)
	
	$Controller = sprintf('\\Controllers\\%s',$Class);

	#$AssemblyController = new $Controller();
	#include '/var/www/limp-key/fork/Controllers/ForkController.php';
	$AssemblyController = new \Controllers\ForkController();
	
	if($AssemblyController->$Method() == null){
	    \Fork\Assistant\Exception::errorURL();
	}
    }
}