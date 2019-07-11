<?php
header("Content-Type: application/json; charset=UTF-8");

include "../models/AssinaturaDAO.php";
include "../config/Conexao.php";

$conexao = new Conexao();
$db = $conexao->getConexao();
$assinaturas = new AssinaturaDAO($db);

switch($_SERVER["REQUEST_METHOD"]) {
  case "GET":
  if (isset($_GET["id"])) {
    $result = $assinaturas->getById($_GET["id"]);
  } else if (isset($_GET["email"])) {
    $result = $assinaturas->getByEmail($_GET["email"]);
  } else if (isset($_GET["chave"]) & isset($_GET["ordem"]) & isset($_GET["direcao"])) {
    $result = $assinaturas->search(array (
        "nome" => $_GET["chave"],
        "email" => $_GET["chave"],
        "cargo" => $_GET["chave"],
        "ordem" => $_GET["ordem"],
        "direcao" => $_GET["direcao"]
    ));
  } else  {
    $result = array(
      'status' => '300',
      'message'=> 'Parametros não informados'
    );
  }
  break;
  case "POST":
  $result = $assinaturas->insert(array(
    "nome" => $_POST["nome"],
    "cargo" => $_POST["cargo"],
    "email" => $_POST["email"],
    "telefone" => $_POST["telefone"],
    "celular" => $_POST["celular"],
    "id_empresa" => intval($_POST["id_empresa"])
  ));
  break;
  case "PUT":
  parse_str(file_get_contents("php://input"), $_PUT);
  $result = $assinaturas->update(array(
    "id" => intval($_PUT["id"]),
    "nome" => $_PUT["nome"],
    "cargo" => $_PUT["cargo"],
    "email" => $_PUT["email"],
    "telefone" => $_PUT["telefone"],
    "celular" => $_PUT["celular"],
    "id_empresa" => intval($_PUT["id_empresa"])
  ));
  break;
  case "DELETE":
  parse_str(file_get_contents("php://input"), $_DELETE);
  $result = $assinaturas->remove(intval($_DELETE["id"]));
  break;
}
echo json_encode($result);
?>
