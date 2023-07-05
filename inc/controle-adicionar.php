<?php

require_once "../models/requisicao.php";
require_once "../models/livro.php";

use Models\Livro;
use Models\Requisicao;

/**
 * Resolve o formulário de cadastro de novo livro
 */
    
    if (isset($_POST['cadastrar'])) {
        foreach ($_POST as $key => $value) {
            $var = $key;
            $$var = $value;
        }

        $livro = new Livro($id, $isbn, $titulo, $autor, $editora, $image, $preco);

        $requisicao = new Requisicao();

        $resultado = $requisicao->adicionar_livro($livro);


        /** Precisa realizar checagem do sucesso da requisição (não fiz) */
        $livro = json_decode($result);
        $mensagem = "<p>Livro " . $livro->titulo . " adicionado com sucesso!</p>";

        /** Redireciona de volta à home */
        header("location: ../index.php");
        die();
    }
