<?php 

require_once("XML.Class.php");
require_once("Connection.php");


$xml = new XML();
$erro = 0;
$mErro =  "Sem mensagem";
//$idproduto = $_GET['id'];
$idproduto = '2';

$xml->OpenTag("response");

if($idproduto == ''){
	$erro = 1;
	$mErro = "Código invalido";
	echo $mErro;
} else {
	
		$sql = "SELECT * FROM produto where idproduto = $idproduto";
		$result = mysqli_query($conn, $sql);

		if($result->num_rows > 0){
			$reg = mysqli_fetch_object($result);
			$xml->addTag('nome_produto', $reg->nome_produto);
			$xml->addTag('valor', $reg->valor);

		}else {
			$erro = 2;
			$mErro="Produto não encontrado";
		}
	
}

$xml->addTag('erro',$erro);
$xml->addTag('mErro',$mErro);

$xml->CloseTag("response");




echo "Print no final index"."<br>". $xml;

 ?>