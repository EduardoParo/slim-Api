<?php
	if (PHP_SAPI == 'cli-server') {
	    // To help the built-in PHP dev server, check if the 	request was actually for
	    // something which should probably be served as a static 	file
	    $cFile = __DIR__ . $_SERVER['REQUEST_URI'];
	    if (is_file($cFile)) {
	        return false;
	    }
	}

	// 1° _DIR_ RECUPERA O CAMINHO ABSOLUTO DO AUTOLOAD
	require __DIR__ . '/../vendor/autoload.php';
	
	//INICIA UMA SEÇÃO
	session_start();
	
	// 2° RECUPERA O CAMINHO ABSOLUTO ONDE ESTA AS CONFIGURAÇÕES
	$aSettings = require __DIR__ . '/../src/settings.php';

	//INSTACIA O OBJETO APP
	$oApp = new \Slim\App($aSettings);
	
	// 3° RECUPERA CARREGA AS DEPENDENCIAS ONDE É NECESSARIO JA TER CRIADO O APP
	require __DIR__ . '/../src/dependencies.php';

	$oContainer->get('aDb');
	
	// 4° CARREGA AS DEPENDENCIAS ONDE É NECESSARIO JA TER CRIADO O APP
	require __DIR__ . '/../src/middleware.php';
	
	// 5° CARREGA AS DEPENDENCIAS ONDE É NECESSARIO JA TER CRIADO O APP
	require __DIR__ . '/../src/routes.php';
	
	// INICIA A APLICAÇÃO
	$oApp->run();
	
?>