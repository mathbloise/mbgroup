<?php
    $produtoCodigo = "";
    $produtoNome = "";
    $produtoPreco = 0;
    $edit_state = false;

    $db = mysqli_connect("localhost", "root", "123", "mbgroup");

    if (isset($_POST['save'])) {
        $id = $_POST['id'];
        $produtoCodigo = $_POST['produtoCodigo'];
        $produtoNome = $_POST['produtoNome'];
        $produtoPreco = $_POST['produtoPreco']; 
    
        $query = "INSERT INTO produto (id, codigo, nome, preco_unitario) VALUES ('$id', '$produtoCodigo', '$produtoNome', '$produtoPreco')";
        mysqli_query($db, $query);
        header('location: produto.php');    
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $produtoCodigo = $_POST['produtoCodigo'];
        $produtoNome = $_POST['produtoNome'];
        $produtoPreco = $_POST['produtoPreco'];
        
        mysqli_query($db, "UPDATE produto SET id='$id', codigo='$produtoCodigo',
            nome='$produtoNome', preco_unitario='$produtoPreco' WHERE id='$id'");
        header('location: produto.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM produto WHERE id='$id'");
        header('location: produto.php');
    }

    $result = mysqli_query($db, "SELECT * FROM produto");
?>