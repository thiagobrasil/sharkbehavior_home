<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>SharkBehavior ADM</title>

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shark Beharvior</a>
    </div>
    <!-- <ul class="nav navbar-nav"> -->
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <!-- <li><a href="#">Page 1</a></li> -->
      <!-- <li><a href="#">Page 2</a></li> -->
    <!-- </ul> -->
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
    </ul>
  </div>
</nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titulo">
          <legend><h3>Shark Behavior ADM</h3></legend>
        </div>
      </div>
    </div>
  </div>
  <br><br>

  <div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#users">Gerência de Usuários</a></li>
      <li><a href="#obs">Observações</a></li>
      <li><a href="#date">Pesquisa por Datas</a></li>
      <!-- <li><a href="#menu3">Menu 3</a></li> -->
    </ul>

    <div class="tab-content">
      <div id="users" class="tab-pane fade in active">
        <h3>Gerência de Usuários</h3>
        <p>Edite, adicione ou remova um usuário para o sistema
          <br><br>
          <div class="container">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Curso</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Maria Luiza Gomes Soares</td>
                  <td>Zootecnia</td>
                  <td><button type="button" class="btn btn-warning">Editar</button> <button type="button" class="btn btn-danger">Remover</button></td>
                </tr>
                <tr>
                  <td>Anna Raquel de Andrade</td>
                  <td>Biologia</td>
                  <td><button type="button" class="btn btn-warning">Editar</button> <button type="button" class="btn btn-danger">Remover</button></td>
                </tr>
                <tr>
                  <td>João Alberto Lima Cavalcanti</td>
                  <td>Veterinária</td>
                  <td><button type="button" class="btn btn-warning">Editar</button> <button type="button" class="btn btn-danger">Remover</button></td>
                </tr>
              </tbody>
            </table>
            <br>
            <!-- <p>Adicionar novo funcionário</p> -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#novoObservador">Adicionar novo observador</button>
          </div>
        </div>

        <!-- Modal observações, refere-se a TAB Observações -->
        <div id="obs" class="tab-pane fade">
          <h3>Observações</h3>
          <br>
          <div class="form-group">
              <label for="comment">Escreva abaixo:</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
              <button type="button" class="btn btn-success">Registrar</button>
        </div>

        <!--  Modal pesquisa por datas-->
        <div id="date" class="tab-pane fade">
          <h3>Pesquisa por Datas</h3>
          <br>
          <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p> -->
          <div class="form-group row">
            <!-- <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Date and time</label> -->
            <div class="col-md-12">
              <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
            </div>
        </div>
        <button type="button" class="btn btn-success">Buscar</button>
        </div>
      </div>
    </div>


<div class="container">
  <!-- <h2>Novo Observador</h2> -->
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#novoObservador">Open Small Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="novoObservador" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Novo Observador</h4>
        </div>
        <div class="modal-body">
          <!--  Dados do novo observador -->
          <form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="observadorNome">Nome: </label>
    <div class="col-sm-10">
      <input type="name" class="form-control" id="observadorNome" placeholder="Informe o nome">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cursoNome">Curso: </label>
    <div class="col-sm-10">
      <input type="name" class="form-control" id="cursoNome" placeholder="Informe o curso">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">

    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
  </div>
</form>
<!-- Fim dos dados do novo observador -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


  </div> <!-- end container modals -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/stylejs.js"></script>
</body>
</html>
