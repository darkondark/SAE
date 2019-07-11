<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Matheus Coqueiro Andrade">
  <meta name="description" content="Aplicação destinada para criação do sistema SAET - Sistema de Assinaturas de Email da Teiú.">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>SAET - Sistema de Assinaturas de Email da Teiú</title>

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
      <li><a href="/saet" class="center light-blue lighten-1 logo-nome">SAET</a></li>
      <li><a href="cadastrar_assinatura.php">Cadastrar Assinatura<i class="material-icons left">add_to_photos</i></a></li>
      <li><a href="listar_assinatura.php"><i class="material-icons">view_list</i>Listar Assinaturas</a></li>
      <li><a href="#!"><i class="material-icons">settings</i>Configurações</a></li>
    </header>
    <main>
      <div class="central">
        <div class="container">
          <h1 class="titulo center">Cadastrar Nova Assinatura</h1>

          <div class="row">
            <form id="form_assinatura" class="col s12" method="post">
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">person</i>
                  <input name="nome" id="nome" type="text" class="validate" required>
                  <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">email</i>
                  <input name="email" id="email" type="email" class="validate" required>
                  <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">work</i>
                  <input name="cargo" id="cargo" type="text" class="validate" required>
                  <label for="cargo">Cargo</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">phone</i>
                  <input name="telefone" id="telefone" type="text" class="validate" required>
                  <label for="telefone">Telefone</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">smartphone</i>
                  <input name="celular" id="celular" type="text" class="validate">
                  <label for="celular">Celular</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">business</i>
                  <select name="id_empresa" id="id_empresa" class="icons validate" required>
                    <option value="" disabled selected>Escolha uma opção</option>
                    <option value="1" data-icon="public/images/favicon.png">Teiu</option>
                    <option value="2" data-icon="public/images/kaioka.png">Kaioka</option>
                  </select>
                  <label for="id_empresa">Empresa</label>
                </div>
              </div>
              <button class="btn waves-effect waves-light light-blue lighten-1">Enviar
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <footer class="page-footer light-blue lighten-1">
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col s12 m7 text-footer">
              <span class="">Copyright &copy; 2018 <a href="http://www.teiu.com.br/" class="grey-text text-lighten-4" target="_blank" ><b>TEIÚ</b></a> Todos os direitos reservados.</span>
            </div>
            <div class="col s12 m5 text-footer direita">
              <span class="">Desenvolvido por <a href="https://github.com/mastercoks" class="grey-text text-lighten-4" target="_blank" ><b>Matheus Coqueiro</b></a></span>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal Structure -->
    <div id="modal-sucess" class="modal">
      <div class="modal-content">
        <h4>Assinatura cadastrada com sucesso</h4>
        <p>Clique em Continuar para recarregar a página.</p>
      </div>
      <div class="modal-footer">
        <a id="recarregar" class="waves-effect waves-light btn">Continuar</a>
      </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal-email-invalid" class="modal">
      <div class="modal-content">
        <h4>Atenção</h4>
        <p>Email já utilizado, favor tente novamente com outro email.</p>
      </div>
    </div>
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="public/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.sidenav').sidenav();
        $('#form_assinatura').submit(function(){
          var dados = $( this ).serialize();
          console.log(dados);
          $.get("assinaturas/?email=" + $( this ).find('#email').val(), function(result) {
            if (result == null) {
              $.ajax({
                type: "POST",
                url: "assinaturas/",
                data: dados,
                success: function( data )
                {
                  $('#modal-sucess').modal('open');
                }
              });
            } else {
              $('#email').removeClass('valid');
              $('#email').addClass('invalid')
              $('#modal-email-invalid').modal('open');
            }
          });
          return false;
        });
        // Modal
        $('.modal').modal();
        // Validation
        $('input#input_text, textarea#textarea2').characterCounter();
        // Selected option
        $('select').formSelect();
      });

      $('#recarregar').click(function() {
        location.reload();
      });
    </script>
  </body>
  </html>
