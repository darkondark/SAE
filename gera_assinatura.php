<?php
include "models/AssinaturaDAO.php";
include "config/Conexao.php";

$conexao = new Conexao();
$db = $conexao->getConexao();
$assinaturas = new AssinaturaDAO($db);

function tirarAcentos($string){
  return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/"),explode(" ","a A e E i I o O u U n N Ç"),$string);
}
if (isset($_GET["assinatura"])) {
  $assinatura = json_decode(json_encode($assinaturas->getByEmail($_GET["assinatura"])), true);
  if ($assinatura != null) {
    $nome = trim(strtoupper(tirarAcentos($assinatura['nome'])));
    $cargo = $assinatura['cargo'];
    $email = $assinatura['email'];
    $telefone = $assinatura['telefone'];
    $celular = $assinatura['celular'];
    $id_empresa = $assinatura['empresa'];
    $siteTeiu = 'www.merca.com.br';
    $chars = array("(", ")", "-");
    if(strlen(trim(str_replace($chars, "", $celular)))>0){
      $linha3 = $telefone. " | ". $celular;
    } else {
      $linha3 = $telefone. " | (77) 4009-8600";
    }

    $linha4 = $email. " | ". $siteTeiu;


    //Tamanhos
    if(strlen($nome)>30) {
      $tamNome = 7.8;
    } else if(strlen($nome)>25) {
      $tamNome = 10;
    } else if(strlen($nome)>20) {
      $tamNome = 11;
    } else {
      $tamNome = 13;
    }

    $tamCargo = 10;
    $tamTelefone = $tamSite =  $tamEmail = 8;

    //diz ao servidor que isto é do tipo mime image/png
    header("Content-type:image/png");
    // cria uma imagem com 200 de largura e 200 de altura
    if($id_empresa== 'TEIÚ'){
      $img = imagecreatefrompng("public/images/assinatura_outubro_rosa.png");
    }else{
      $img = imagecreatefrompng("public/images/assinatura_outubro_rosa_kaioka.png");
    }

    // Cores
    //$cor_azul = imagecolorclosest($img, 46, 80, 146);
    $cor_rosa = imagecolorclosest($img, 220, 80, 150);

    // Fontes
    $fontVerdanaB = dirname(__FILE__) ."/public/fonts/60anos/verdanab.ttf";
    $fontARL = dirname(__FILE__) ."/public/fonts/60anos/ARLRDBD.TTF";
    $fontVerdana = dirname(__FILE__) ."/public/fonts/60anos/verdana.ttf";

    imagettftext($img, $tamNome, 0, 214, 25, $cor_rosa, $fontVerdanaB, $nome);
    imagettftext($img, $tamCargo, 0, 214, 40, $cor_rosa, $fontARL, $cargo);
    imagettftext($img, $tamTelefone, 0, 214, 55, $cor_rosa, $fontVerdana, $linha3);
    imagettftext($img, $tamEmail, 0, 214, 70, $cor_rosa, $fontVerdana, $linha4);

    //faço a imagem ser impressa em vídeo
    imagepng($img);
    //retiro a imagem da memoria
    imagedestroy($img);
  }
  echo "Error: assinatura não encontrada!";
} else {
  echo "Error: informe a assinatura!";
}
?>
