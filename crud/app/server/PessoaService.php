<?php
    $pessoaNome = "";
    $pessoaCpf = "";
    $pessoaNascimento = date_create();
    $edit_state = false;

    $db = mysqli_connect("localhost", "root", "123", "mbgroup");

    if (isset($_POST['save'])) {
        $id = $_POST['id'];
        $pessoaNome = $_POST['pessoaNome'];
        $pessoaCpf = $_POST['pessoaCpf'];
        $pessoaNascimento = $_POST['pessoaNascimento']; 
    
        $query = "INSERT INTO pessoa (id, nome, cpf, data_nascimento) VALUES ('$id', '$pessoaNome', '$pessoaCpf', '$pessoaNascimento')";
        mysqli_query($db, $query);
        header('location: pessoa.php');    
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $pessoaNome = $_POST['pessoaNome'];
        $pessoaCpf = $_POST['pessoaCpf'];
        $pessoaNascimento = $_POST['pessoaNascimento'];
        
        mysqli_query($db, "UPDATE pessoa SET id='$id', nome='$pessoaNome',
            cpf='$pessoaCpf', data_nascimento='$pessoaNascimento' WHERE id='$id'");
        header('location: pessoa.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM pessoa WHERE id='$id'");
        header('location: pessoa.php');
    }

    $result = mysqli_query($db, "SELECT * FROM pessoa");
?>