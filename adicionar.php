<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Livraria - SWE</title>
</head>
<body>

    <!-- Navbar Padrão do Bootstrap -->
    <?php require_once "components/navbar.php" ?>


    <main>
        <!-- Adicionar.php -->
        <?php

            /** Insere o formulário para adicionar livros */
            require_once "components/adicionar-form.php";

        ?>

    </main>
    

</body>
</html>


