<?php $server = include('../../server/PessoaService.php'); 
    
    if(isset($_GET['edit'])) {    
        $id = $_GET['edit'];
        $edit_state = true;
        $record = mysqli_query($db, "SELECT * from pessoa WHERE id=$id");
        $selecionar = mysqli_fetch_array($record);
        $id = $selecionar['id'];
        $nome = $selecionar['nome'];
        $cpf = $selecionar['cpf'];
        $data_nascimento = $selecionar['data_nascimento'];
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Pessoa</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">Pessoa</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="produto.php">Produto <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data de Nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td> <?php echo $row['nome']; ?></td>
                    <td> <?php echo $row['cpf']; ?></td>
                    <td> <?php echo $row['data_nascimento']; ?></td>
                    <td><a class="btn btn-info" href="pessoa.php?edit=<?php echo $row['id'] ?>" name="update"> Editar
                        </a>
                        <a class="btn btn-danger" href="pessoa.php?del=<?php echo $row['id'] ?>" name="delete"> Deletar
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
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="pessoaNome"
                    value="<?php if(isset($nome)) { echo $nome; }; ?>">
            </div>
            <div class="col-md-4 form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="pessoaCpf"
                    value="<?php if(isset($cpf)) { echo $cpf; }; ?>">
            </div>
            <div class="col-md-3 form-group">
                <label for="data">Data de Nascimento</label>
                <input type="date" class="form-control" name="pessoaNascimento"
                    value="<?php if(isset($data_nascimento)) { echo $data_nascimento; }; ?>">
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