<?php

	namespace app\models;
	use Illuminate\Database\Eloquent\Model;

	/**
	 Banco de dados Usuarios ->Criar classe Usuario no singular
	 O 
	 */
	class Produto extends Model
	{
		//DEFINIR OQUE PODE SER POSTADO
		protected $fillable = [

			'titulo',
			'descricao',
			'preco',
			'fabricante',
			'updated_at',
			'created_at'

		];
	}
?>