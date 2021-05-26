<?php

	use Slim\Http\Request;
	use Slim\Http\Response;
	// Routes
	
	$oApp->get('/[{name}]', function ($cReq, $cResp, $args) {
	    // Sample log message
	    $this->logger->info("Slim-Skeleton '/' route");
	
	    // Render index view
	    return $this->renderer->render($cResp, 'index.phtml', $args);
	});

	$oApp->options('/{routes:.+}', function ($cReq, $cResp, $cArgs) {
    	return $cResp;
	});

	//INSTANCIAR A ROTA PRODUTOS
	require __DIR__ . '/routes/produtos.php';
	require __DIR__ . '/routes/autenticacao.php';

   $oApp->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    	$handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    	return $handler($req, $res);
   });
	


?>
