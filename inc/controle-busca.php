<?php

require_once "./models/requisicao.php";

use Models\Requisicao;


/**
 * Lida com a busca de livros
 */

    /** Insere o formulário de busca: */
    require_once "components/search-form.php";


    /** Resolve o formulário de busca: */

    $requisicao = new Requisicao();

    $filtro = '';
    if (isset($_POST['buscar'])) {
        $filtro = $_POST['filtro'];
        $texto = $_POST['texto'];
        echo "<p>Resultado da busca por: $texto em: $filtro";
        $resultado = $requisicao->busca_com_filtro($filtro, $texto);
    }
    else {
        $resultado = $requisicao->busca_geral();
    }

    
    /** 
     * Decodifica o json que vem da API
     * 
     * json_decode() transforma o json obtido da requisição externa em objetos 'stdClass' */
    $livros = json_decode($resultado);


    /**
     *  Lidando com erro na busca
     * 
     * Esvazia a lista de livros
     */
    $error = false;
    if (isset($livros->status) && ($livros->status == 400)) {
        $error = true;
        $livros = [];
    }


    /** 
     * Alerta Grave de Gambiarra:
     * Como a busca por isbn retorna apenas um livro e não uma lista, solucionei usando um cast array() no resultado da busca
     * Assim, $livros sempre vai ser um array, não importa o tipo da requisição
     */
    if (!$error && $filtro == 'isbn') {
        $livros = array($livros);
    }


    /** Inverte ordem para aparecer os mais recentes por primeiro */
    krsort($livros);



    /** As variáveis são passadas adiante na página que está chamando este arquivo e podem ser utilizadas */

    /** O correto aqui seria criar objetos Livro para cada item retornado, mas não vi necessidade */
