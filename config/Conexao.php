<?php
class Conexao {
  private $host = "localhost";
  private $usuario = "intranet";
  private $senha = "LucasTeiu@2018";
  private $nome_bd = "teiu_saet";
  private $conexao;

  public function getConexao() {

    $this->conexao = null;

    try {
      $this->conexao = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nome_bd, $this->usuario, $this->senha);
      $this->conexao->exec("set names utf8");
    } catch (PDOException $e) {
      echo "Erro na conexao: " . $e->getMessage();
    }

    return $this->conexao;
  }
}
?>
