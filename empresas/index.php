<?php
header("Content-Type: application/json; charset=UTF-8");

include "../models/EmpresaDAO.php";
include "../config/Conexao.php";

$conexao = new Conexao();
$db = $conexao->getConexao();
$empresas = new EmpresaDAO($db);

switch ($_SERVER["REQUEST_METHOD"]) {
  case 'GET':
  if (isset($_GET["id"])) {
    $result = $empresas->getById($_GET["id"]);
  } else {
    $result = $empresas->getAll();
  }
  break;
}

echo json_encode($result);

?>
