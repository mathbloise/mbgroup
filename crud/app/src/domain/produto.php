<?php $server = include('../../server/ProdutoServer.php'); 
    
    if(isset($_GET['edit'])) {    
        $id = $_GET['edit'];
        $edit_state = true;
        $record = mysqli_query($db, "SELECT * from produto WHERE id=$id");
        $selecionar = mysqli_fetch_array($record);
        $id = $selecionar['id'];
        $codigo = $selecionar['codigo'];
        $nome = $selecionar['nome'];
        $preco = $selecionar['preco_unitario'];
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Produto</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">Produto</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="pessoa.php">Pessoa <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Código</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td> <?php echo $row['codigo']; ?></td>
                    <td> <?php echo $row['nome']; ?></td>
                    <td> <?php echo $row['preco_unitario']; ?></td>
                    <td><a class="btn btn-info" href="produto.php?edit=<?php echo $row['id'] ?>" name="update"> Editar
                        </a>
                        <a class="btn btn-danger" href="produto.php?del=<?php echo $row['id'] ?>" name="delete"> Deletar
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <nav class="navbar navbar-expand-lg navbar-light bg-light"></nav>
        <form method="post" action="<?php $server; ?>">
            <div class="col-md-2 form-group">
                <label for="id">ID</label>
                <input type="number" class="form-control" name="id" value="<?php if(isset($id)) { echo $id; }; ?>">
            </div>
            <div class="col-md-2 form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" name="produtoCodigo"
                    value="<?php if(isset($codigo)) { echo $codigo; }; ?>">
            </div>
            <div class="col-md-4 form-group">
                <label for="nome">Nome do produto</label>
                <input type="text" class="form-control" name="produtoNome"
                    value="<?php if(isset($nome)) { echo $nome; }; ?>">
            </div>
            <div class="col-md-3 form-group">
                <label for="preço">Preço</label>
                <input type="number" class="form-control" name="produtoPreco"
                    value="<?php if(isset($preco)) { echo $preco; }; ?>">
            </div>
            <?php if ($edit_state == false): ?>
            <button type="submit" name="save" class="btn btn-primary">Cadastrar</button>
            <?php else: ?>
            <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
            <?php endif ?>
        </form>
    </div>
</body>

</html>