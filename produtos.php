<?php
	use Slim\Http\Request;
	use Slim\Http\Response;
	use App\Models\Produto; //INSTANCIAR A CLASSE QUE CRIAMOS NO APP/

	/*----------------------------------------------
	ORM -> MAPEADOR DE OBJETO RELACIONAL
	ILLUMINATE -> É O MOTOR DA BASE DE DADOS LARAVEL 
	SEM O LARAVEL ELOQUENT ORM
	------------------------------------------------*/
	//INST6ANCIAR O APP
	$oApp->group('/api/v1', function(){

		//ROTA PARA LISTAGEM DE PRODUTOS
		$this->get('/produtos/lista', function($cReq, $cResp){
			//INSTANCIAR A CLASSE PRODUTO E UTILIZAR O METODO QUE FOI EXTENDIDO GET
			$oProdutos = Produto::get();

			return $cResp->withJson($oProdutos);
		});

		//ROTA PARA INSERIR PRODUTOS
		$this->post('/produtos/adiciona', function($cReq, $cResp){
			
			$aDados = $cReq->getParsedBody();
			//TESTE
			//echo '<prev>';
			//print_r($aDados);
			//echo '</prev>';

			$oProduto = Produto::create($aDados);

			return $cResp->withJson($oProduto);
		});

		//ROTA PARA LISTAGEM DE PRODUTOS
		$this->get('/produtos/lista/{id}', function($cReq, $cResp, $cArgs){
			//var_dump($cArgs);
			//INSTANCIAR A CLASSE PRODUTO E UTILIZAR O METODO QUE FOI EXTENDIDO GET
			$oProdutos = Produto::findOrFail($cArgs['id']);

			return $cResp->withJson($oProdutos);
		});

		//ROTA PARA LISTAGEM DE PRODUTOS
		$this->put('/produtos/atualiza/{id}', function($cReq, $cResp, $cArgs){
			//var_dump($cArgs);
			//RECUPERAR OS DADOS ENCAMINHADOS
			$aDados = $cReq->getParsedBody();
			//var_dump($aDados);
			//LOCALIZAR O ITEM
			$oProduto = Produto::findOrFail($cArgs['id']);
			//ATUALIZAR
			$oProduto->update($aDados);

			return $cResp->withJson($oProduto);
		});


		//ROTA PARA LISTAGEM DE PRODUTOS
		//$this->remove('/produtos/remove/{id}', function($cReq, $cResp, $//cArgs){
		//	//var_dump($cArgs);
		//	//RECUPERAR OS DADOS ENCAMINHADOS
		//	$aDados = $cReq->getParsedBody();
		//	//var_dump($aDados);
		//	//LOCALIZAR O ITEM
		//	$oProduto = Produto::findOrFail($cArgs['id']);
		//	//ATUALIZAR
		//	$oProduto->delete($aDados);
//
		//	return $cResp->withJson($oProduto);
		//});


	});

	