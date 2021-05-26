<?php
	use Slim\Http\Request;
	use Slim\Http\Response;
	use App\Models\Produto; //INSTANCIAR A CLASSE QUE CRIAMOS NO APP/
	use App\Models\Usuario; //INSTANCIAR A CLASSE QUE CRIAMOS NO APP/
	use \Firebase\JWT\JWT;

	/*----------------------------------------------
	ORM -> MAPEADOR DE OBJETO RELACIONAL
	ILLUMINATE -> É O MOTOR DA BASE DE DADOS LARAVEL 
	SEM O LARAVEL ELOQUENT ORM

	SITE CLIENTE
	
	API.EDUARDO
	CADASTRO
	TOKEN
	TOKEN
	------------------------------------------------*/
	//INSTANCIAR O APP
	$oApp->post('/api/token', function($cReq, $cResp){

			//RECUPERAR OS DADOS ENCAMINHADOS
			$aDados = $cReq->getParsedBody();
			//var_dump($aDados);

			$cEmail = $aDados['email'] ?? mull;
			$cSenha = $aDados['senha'] ?? mull;

			$oUsuario = Usuario::where('email', $cEmail)->first();

			if(!is_null($oUsuario) && (md5($cSenha) === $oUsuario->senha)){
				//GERAR TOKEN
				$cSecretKey = $this->get('aSettings')['cSecretKey'];
				//echo $cSecretKey;
				$cToken = JWT::encode($oUsuario, $cSecretKey);
				//echo $cToken;
				return $cResp->withJson([
					'chave' => $cToken
				]);
			} 

			return $cResp->withJson(['status' => 'erro']);

		

	});

	