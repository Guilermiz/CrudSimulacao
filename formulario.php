<!doctype html>
<html lang="en">
   <head> 
    <meta charset="utf8">
    <title>Novo Lote</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <br> <h3>Preencha:</h3> 
        <form action="index.php" method="post"> <br>
        <div class="form-group">

        <label for="id">ID do Usuário: </label><br>
        <input type="number" id="id" name="id"><br>
        <label for="qtdMensalidade">Qantidade de Mensalidades: </label><br>
        <input type="number" id="qtdMensalidade" name="qtdmensalidade"><br>
        <label for="nome">Valor da Mensalidade: </label><br>
        <input type="number" id="vlrMensalidade" name="vlrmensalidade"><br>
        <label for="nome">Quantidade de Utilização: </label><br>
        <input type="number" id="qtdUtilizacao" name="qtdutilizacao"><br>
        <label for="nome">Valor de utilização: </label><br>
        <input type="number" id="vlrUtilizacao" name="vlrutilizacao"><br><br>
        
        <button class="btn btn-primary" type="submit" name="mandar" id="mandar">Confirmar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
        </div>    
    </form>
    </div> 
</body>
</html>