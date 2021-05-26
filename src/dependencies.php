<?php
	//INSTACNIA A BIBLIOTECA ILLUMINATE E APELIDA POR CAPSULE
	use Illuminate\Database\Capsule\Manager as Capsule;

	//RECUPERA O CONTAINER DO APP
	$oContainer = $oApp->getContainer();

	// view renderer
	$oContainer['renderer'] = function ($c) {
	    $aSettings = $c->get('aSettings')['renderer'];
	    return new Slim\Views\PhpRenderer($aSettings['template_path']);
	};

	// monolog
	$oContainer['logger'] = function ($c) {
	    $aSettings = $c->get('aSettings')['logger'];
	
	    $oLogger = new Monolog\Logger($aSettings['name']);
	    $oLogger->pushProcessor(new Monolog\Processor\UidProcessor());
	    $oLogger->pushHandler(new Monolog\Handler\StreamHandler($aSettings['path'], Monolog\Logger::DEBUG));
	    return $oLogger;
	};

	//REALIZAR A CONEXAO COM O BANCO DE DADOS
	//INSTANCIA 
	$oContainer['aDb'] = function($oC){
		//INSTACIA O OBJ DO ILLUMINATE
		$oCapsule = new Capsule;

		$oCapsule->addConnection($oC->get('aSettings')['aDb']);
		$oCapsule->setAsGlobal();
		$oCapsule->bootEloquent();

		return $oCapsule;
	};