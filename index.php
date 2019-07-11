<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Matheus Coqueiro Andrade">
  <meta name="description" content="Aplicação destinada para criação do sistema SAET - Sistema de Assinaturas de Email da Teiú.">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>SAE - Sistema de Assinaturas de Email</title>

  <link rel="stylesheet" href="public/css/materialize.min.css" media="screen,projection" type="text/css" >
  <link rel="stylesheet" href="public/css/icon.css">
  <link rel="stylesheet" href="public/css/custom-listar.css">
  <link rel="stylesheet" href="public/css/custom-cadastrar.css">
  <link rel="shortcut icon" href="public/images/favicon.png" />
</head>
<body>
  <header>
    <div class="navbar-fixed">
      <nav class="z-depth-0">
        <div class="nav-wrapper light-blue lighten-1">
          <a href="#" data-target="mobile-demo" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
          <a href="/saet" class="brand-logo logo"><img class="imagem-logo" src="public/images/teiu.png" alt="Logo da Teiu 60 anos">SAET</a>
          <form class="search hide-on-med-and-down">
            <div class="input-field">
              <input id="search" type="search" required>
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
            </div>
          </form>
        </div>
      </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="/saet" class="brand-logo light-blue lighten-1">
        <img src="public/images/logo.png" alt="Logo da Teiu 60 anos">
      </a></li>
      <li><a href="/saet" class="center light-blue lighten-1 logo-nome">SAE</a></li>
      <li><a href="cadastrar_assinatura.php">Cadastrar Assinatura<i class="material-icons left">add_to_photos</i></a></li>
      <li><a href="listar_assinatura.php"><i class="material-icons">view_list</i>Listar Assinaturas</a></li>
      <li><a href="#!"><i class="material-icons">settings</i>Configurações</a></li>
    </header>
    <main>
      <div class="container">
        <h1 class="center">Bem-vindo ao SAE!</h1>
        <p class="flow-text">Este o Sistema de Assinaturas de Email, ele foi desenvolvido especialmente para realizar os cadastros e controle das assinaturas de email dos colaboradores da empresa. Utilize o menu acima para ter acesso aos recursos!</p>
      </div>
    </main>
    <footer class="page-footer light-blue lighten-1">
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col s12 m7 text-footer">
              <span class="">Copyright &copy; 2018 <a href="http://www.merca.com.br/" class="grey-text text-lighten-4" target="_blank" ><b>Merca</b></a> Todos os direitos reservados.</span>
            </div>
            <div class="col s12 m5 text-footer direita">
              <span class="">Desenvolvido por e modificado por <a href="https://github.com/darkondark" class="grey-text text-lighten-4" target="_blank" ><b>Lucas Lacerda</b></a></span>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="public/js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
    </script>
  </body>
  </html>
