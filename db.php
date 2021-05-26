<?php
//LIMITA A EXECUAÇÃO VIA BROWSE E SOMENTE EXECUTA VIA COMANDO
	//if (PHP_SAPI != 'cli') {
	//		exit('Rodar via Cli');
	//    
	//}

	// 1° _DIR_ RECUPERA O CAMINHO ABSOLUTO DO AUTOLOAD
	require __DIR__ . '/vendor/autoload.php';
	
	
	// 2° RECUPERA O CAMINHO ABSOLUTO ONDE ESTA AS CONFIGURAÇÕES
	$aSettings = require __DIR__ . '/src/settings.php';

	//INSTACIA O OBJETO APP
	$oApp = new \Slim\App($aSettings);
	
	// 3° RECUPERA CARREGA AS DEPENDENCIAS ONDE É NECESSARIO JA TER CRIADO O APP
	require __DIR__ . '/src/dependencies.php';
	
	$oDb = $oContainer->get('aDb');
	$cSchema = $oDb->schema();
	$cTabela = 'produtos';

	$cSchema->dropIfExists($cTabela);

	//CRIAR A TABELA
	$cSchema->create( $cTabela, function($cTabela){
		$cTabela->increments('id');
		$cTabela->string('titulo', 100);
		$cTabela->text('descricao');
		$cTabela->decimal('preco',11,2);
		$cTabela->text('fabricante',60);
		$cTabela->timestamps();

	});

	//PREENCHER A TABELA
	$oDb->table($cTabela)->insert([
	
		'titulo'		=> 'Iphone X1 Edu Espacial 64GB',
		'descricao'		=> 'Tela "5.8" IOS 12 4G WI-FI Câmera 12MP',
		'preco'			=> 4999.00,
		'fabricante'	=> 'Eduardo Paro de Simoni',		
		'updated_at'	    => '2020-05-17',
		'created_at'	=> '2020-05-17'

	]);

		//PREENCHER A TABELA
	$oDb->table($cTabela)->insert([
	
		'titulo'		=> 'Smartphone X2 Edu 64GB',
		'descricao'		=> 'Tela "5.2" IOS 12 4G WI-FI Câmera 12MP',
		'preco'			=> 4999.00,
		'fabricante'	=> 'Eduardo Paro de Simoni',		
		'updated_at'	    => '2020-05-17',
		'created_at'	=> '2020-05-17'	

	]);


	
	// INICIA A APLICAÇÃO
	$oApp->run();
	
?>