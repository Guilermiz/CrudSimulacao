<?php

include_once "classe/conexao.php";

//RECEBER E MOSTRAR DADOS REFERENTES AO ID
if(isset($_GET['editar'])){
$id = $_GET['editar'];
$sql = $pdo->prepare("SELECT * FROM t_unimedlote WHERE idUnimed = ?");
$sql->execute([$id]);
$sql = $sql->fetch();
}

  //EDITAR DADOS DO BANCO:
  if(isset($_POST['mandarEditar']) && (isset($_POST['idEditar']) && isset($_POST['qtdmensalidadeEditar']) && 
    isset($_POST['vlrmensalidadeEditar']) && isset($_POST['qtdutilizacaoEditar']) && isset($_POST['vlrutilizacaoEditar']))){
      $idEditar = $_POST['idEditar'];
      $qtdmensalidadeEditar = $_POST['qtdmensalidadeEditar']; 
      $vlrmensalidadeEditar = $_POST['vlrmensalidadeEditar'];
      $qtdutilizacaoEditar = $_POST['qtdutilizacaoEditar'];
      $vlrutilizacaoEditar = $_POST['vlrutilizacaoEditar']; 
      $edit = "UPDATE t_unimedlote SET idCliente = ?, qtdMensalidades = ?, vlrMensalidades = ?,
              qtdUtilizacao = ?, vlrUtilizacao = ? WHERE idUnimed = ?";
      $editar = $pdo->prepare($edit);
      $editar->execute([$idEditar, $qtdmensalidadeEditar, $vlrmensalidadeEditar, $qtdutilizacaoEditar, $vlrutilizacaoEditar, $id]);
      header("location:index.php");
  }

?>

<!doctype html>
<html lang="en">
   <head> 
    <meta charset="utf8">
    <title>Editar Lote</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <br> <h3>Alterar:</h3> 
        <form method="post"> <br>
        <div class="form-group">

        <label for="id">ID do Usuário: </label><br>
        <input type="number" id="idEditar" name="idEditar" value="<?= $sql["idCliente"]; ?>"><br>
        <label for="qtdMensalidade">Qantidade de Mensalidades: </label><br>
        <input type="number" id="qtdMensalidadeEditar" name="qtdmensalidadeEditar" value="<?= $sql["qtdMensalidades"]; ?>"><br>
        <label for="nome">Valor da Mensalidade: </label><br>
        <input type="number" id="vlrMensalidadeEditar" name="vlrmensalidadeEditar" value="<?= $sql["vlrMensalidades"]; ?>"><br>
        <label for="nome">Quantidade de Utilização: </label><br>
        <input type="number" id="qtdUtilizacaoEditar" name="qtdutilizacaoEditar" value="<?= $sql["qtdUtilizacao"]; ?>"><br>
        <label for="nome">Valor de utilização: </label><br>
        <input type="number" id="vlrUtilizacaoEditar" name="vlrutilizacaoEditar" value="<?= $sql["vlrUtilizacao"]; ?>"><br><br>
        
        <button class="btn btn-primary" type="submit" id="mandarEditar" name="mandarEditar">Confirmar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
        </div>    
    </form>
    </div> 
</body>
</html>