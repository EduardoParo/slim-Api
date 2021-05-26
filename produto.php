<?php
echo 'Chegamos a rota ->produtos.php';
	namespace App\Models;

	

	use Illuminate\Database\Eloquent\Model;


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