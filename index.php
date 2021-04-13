<?php

  //INCLUIR A CONEXÃO
  include_once "classe/conexao.php";

  //ADICIONAR DADOS NO BANCO:
  if(isset($_POST['id']) && isset($_POST['qtdmensalidade']) && isset($_POST['vlrmensalidade']) &&
    isset($_POST['qtdutilizacao']) && isset($_POST['vlrutilizacao'])){
      $id = $_POST['id'];
     $qtdmensalidade = $_POST['qtdmensalidade']; 
     $vlrmensalidade = $_POST['vlrmensalidade'];
     $qtdutilizacao = $_POST['qtdutilizacao'];
     $vlrutilizacao = $_POST['vlrutilizacao'];
     $sql = "INSERT INTO t_unimedlote VALUES (null, ?, ?, ?, ?, ?)";
     $retorno = $pdo->prepare($sql);
     $retorno->execute([$id, $qtdmensalidade, $vlrmensalidade, $qtdutilizacao, $vlrutilizacao]);
  }

  //MOSTRAR DADOS DO BANCO:
  $data = $pdo->prepare("SELECT * FROM t_unimedlote");
  $data->execute();
  $data = $data->fetchAll();

  //APAGAR DADOS DO BANCO:
  if(isset($_GET['excluir'])){
    $idExcluir = $_GET['excluir'];
    $delete = "DELETE FROM t_unimedlote WHERE idUnimed= ?";
    $excluir = $pdo->prepare($delete);
    $excluir->execute([$idExcluir]);
    header("location:index.php");
  }

?>

<!doctype html>
<html lang="en">
  <head> 
    <meta charset="utf8">
    <title>lote</title>
   
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

  </head>
<body>

<div class = "container">
<br> <h3>Unimed - lotes</h3> <br>
<div class="float-right"><a class= "btn btn-primary" href="formulario.php">Novo Lote</a></div> 
<br><br><br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID:</th>
      <th scope="col">Quantidade de Mensalidades:</th>
      <th scope="col">Valor de Mensalidades:</th>
      <th scope="col">Quantidade de Utilização:</th>
      <th scope="col">Valor de Utilização:</th>
      <th scope="col">Ação:</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php foreach($data as $row){  ?>
  <tbody>
    <tr>
      <th scope="row"><?= $row["idCliente"]; ?></th>
      <td><?= $row["qtdMensalidades"]; ?></td>
      <td><?= $row["vlrMensalidades"]; ?></td>
      <td><?= $row["qtdUtilizacao"]; ?></td>
      <td><?= $row["vlrUtilizacao"]; ?></td>
      <td><a class="btn btn-info" href="editar.php?editar=<?= $row['idUnimed']; ?>">Editar</a> </td>
      <td><a class="btn btn-danger" href="?excluir=<?= $row['idUnimed']; ?>">Excluir</a></td>
      <td><button id="idModal" type="button" class="btn btn-secondary" data-toggle="modal" 
                  data-target="#visualizarModal"  value="<?= $row['idUnimed']; ?>">Visualizar</button></td>     
    </tr>
  </tbody>
<?php } ?>
</table>
</div>

<!-- MODAL -->
<div class="modal fade" id="visualizarModal" role="dialog">
      <div class="modal-dialog"> 
        <div class="modal-content">
          <div class="modal-header">
        
            <h4>Lote <?= $row["idUnimed"]; ?></h4>      

          </div>
        <div class="modal-body">

          <p>Dados:</p>
            <table class="table">
              <tbody>
                <tr>
                <td><?= $row["idCliente"]; ?></th>
                <td><?= $row["qtdMensalidades"]; ?></td>
                <td><?= $row["vlrMensalidades"]; ?></td>
                <td><?= $row["qtdUtilizacao"]; ?></td>
                <td><?= $row["vlrUtilizacao"]; ?></td>
                </tr>
              </tbody>
            </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">OK</button>      
      </div>
    </div>     
  </div>
</div>

</html>