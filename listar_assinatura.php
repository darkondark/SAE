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
  <link rel="shortcut icon" href="public/images/favicon.png" />
</head>
<body>
  <header>
    <div class="navbar-fixed">
      <nav class="z-depth-0">
        <div class="nav-wrapper light-blue lighten-1">
          <a href="#" data-target="mobile-demo" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
          <a href="/saet" class="brand-logo logo"><img class="imagem-logo" src="public/images/teiu.png" alt="Logo da Teiu 60 anos">SAET</a>
          <form id="form-search" class="search hide-on-med-and-down">
            <div class="input-field">
              <input id="search" type="search">
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
      <div class="principal">
        <h1 class="titulo center">Lista de Assinatura</h1>
        <table id="tabela-assinaturas" class="highlight responsive-table">
          <thead>
            <tr>
              <td><div class="acao">
                <div class="valign-wrapper">Id</div>
                <a id="id" class="valign-wrapper thead-table"href="#"><i class="material-icons">unfold_more</i></a>
              </div></td>
              <td><div class="acao">
                <div class="valign-wrapper">Nome</div>
                <a id="nome" class="valign-wrapper thead-table"href="#"><i class="material-icons">unfold_more</i></a>
              </div></td>
              <td><div class="acao">
                <div class="valign-wrapper">Cargo</div>
                <a id="cargo" class="valign-wrapper thead-table"href="#"><i class="material-icons">unfold_more</i></a>
              </div></td>
              <td><div class="acao">
                <div class="valign-wrapper">E-mail</div>
                <a id="email" class="valign-wrapper thead-table"href="#"><i class="material-icons">unfold_more</i></a>
              </div></td>
              <td><div class="acao">
                Telefone
              </div></td>
              <td><div class="acao">
                Celular
              </div></td>
              <td><div class="acao">
                Empresa
              </div></td>
              <td>Ações</td>
            </tr>
          </thead>
          <tbody id="body-assinaturas">

          </tbody>
        </table>
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
    <div id="modal-confirm" class="modal">
       <div class="modal-content">
           <div class="row">
             <div class="col s12">
                 <h4 class="center modal-titulo">Deseja excluir a assinatura abaixo?</h4>
             </div>
             <div class="input-field col s12 m6">
               <i class="material-icons prefix">person</i>
               <input id="modal-delete-nome" class="modal-nome" type="text" disabled value="Vazio">
               <label for="modal-delete-nome">Nome</label>
             </div>
             <div class="input-field col s12 m6">
               <i class="material-icons prefix">email</i>
               <input id="modal-delete-email" class="modal-email" type="email" disabled value="Vazio">
               <label for="modal-delete-email">Email</label>
             </div>
             <div class="input-field col s12 m6">
               <i class="material-icons prefix">work</i>
               <input id="modal-delete-cargo" class="modal-cargo" type="text" disabled value="Vazio">
               <label for="modal-delete-cargo">Cargo</label>
             </div>
             <div class="input-field col s12 m6">
               <i class="material-icons prefix">phone</i>
               <input id="modal-delete-telefone" class="modal-telefone" type="text" disabled value="Vazio">
               <label for="modal-delete-telefone">Telefone</label>
             </div>
             <div class="input-field col s12 m6">
               <i class="material-icons prefix">smartphone</i>
               <input id="modal-delete-celular" class="modal-celular" type="text" disabled value="Vazio">
               <label for="modal-delete-celular">Celular</label>
             </div>
             <div class="input-field col s12 m6">
               <i class="material-icons prefix">business</i>
               <select id="modal-delete-empresa" class="modal-empresa icons" disabled>
                 <option value="" disabled selescted>Escolha uma opção</option>
                 <option value="1" data-icon="public/images/teiu.png">Teiu</option>
                 <option value="2" data-icon="public/images/kaioka.png">Kaioka</option>
               </select>
               <label for="modal-delete-empresa" >Empresa</label>
             </div>
             <div class="col s6">
               <button class="btn waves-effect waves-light red close-modal">Não</button>
             </div>
             <div class="col s6">
               <button id="confirm-delete" class="btn waves-effect waves-light green">Sim</button>
             </div>
           </div>
       </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal-edit" class="modal">
       <div class="modal-content">
           <form id="form-edit" class="col s12" method="post">
             <div class="row">
               <div class="col s12">
                   <h4 class="center modal-titulo">Editar assinatura</h4>
               </div>
               <div class="input-field col s12 m6">
                 <i class="material-icons prefix">person</i>
                 <input id="modal-edit-nome" name="nome" class="modal-nome" type="text" value="Vazio" required>
                 <label for="modal-edit-nome">Nome</label>
               </div>
               <div class="input-field col s12 m6">
                 <i class="material-icons prefix">email</i>
                 <input id="modal-edit-email" name="email" class="modal-email" type="email" value="Vazio" disabled>
                 <label for="modal-edit-email">Email</label>
               </div>
               <div class="input-field col s12 m6">
                 <i class="material-icons prefix">work</i>
                 <input id="modal-edit-cargo" name="cargo" class="modal-cargo" type="text" value="Vazio" required>
                 <label for="modal-edit-cargo">Cargo</label>
               </div>
               <div class="input-field col s12 m6">
                 <i class="material-icons prefix">phone</i>
                 <input id="modal-edit-telefone" name="telefone" class="modal-telefone" type="text" value="Vazio" required>
                 <label for="modal-edit-telefone">Telefone</label>
               </div>
               <div class="input-field col s12 m6">
                 <i class="material-icons prefix">smartphone</i>
                 <input id="modal-edit-celular" name="celular" class="modal-celular" type="text" value="Vazio">
                 <label for="modal-edit-celular">Celular</label>
               </div>
               <div class="input-field col s12 m6">
                 <i class="material-icons prefix">business</i>
                 <select id="modal-edit-empresa" name="id_empresa" class="modal-empresa icons">
                   <option value="" disabled selescted>Escolha uma opção</option>
                   <option value="1" data-icon="public/images/teiu.png">Teiu</option>
                   <option value="2" data-icon="public/images/kaioka.png">Kaioka</option>
                 </select>
                 <label for="modal-edit-empresa" >Empresa</label>
               </div>
               <div class="col s6">
                 <button class="btn waves-effect waves-light red close-modal">Não</button>
               </div>
               <div class="col s6">
                 <button class="btn waves-effect waves-light green" type="submit" name="action">Sim</button>
               </div>
             </div>
           </form>
       </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal-sendmail" class="modal">
      <div class="modal-content">
        <h4>Assinatura enviada com sucesso!</h4>
      </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal-delete-sucess" class="modal">
      <div class="modal-content">
        <h4>Assinatura exluida com sucesso</h4>
        <p>Clique em Continuar para recarregar a página.</p>
      </div>
      <div class="modal-footer">
        <a class="recarregar waves-effect waves-light btn">Continuar</a>
      </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal-error" class="modal">
      <div class="modal-content">
        <h4>Atenção</h4>
        <p>Erro ao excluir a assinatura, favor tentar novamente.</p>
      </div>
      <div class="modal-footer">
        <a class="close-modal waves-effect waves-light btn">Continuar</a>
      </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal-edit-sucess" class="modal">
      <div class="modal-content">
        <h4>Assinatura atualizada com sucesso</h4>
        <p>Clique em Continuar para recarregar a página.</p>
      </div>
      <div class="modal-footer">
        <a class="recarregar waves-effect waves-light btn">Continuar</a>
      </div>
    </div>
    <div id="carregando" class="hide">
    </div>
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="public/js/materialize.min.js"></script>
    <script type="text/javascript" src="public/js/listar.js"></script>
  </body>
  </html>
