<?php

require_once "../models/requisicao.php";

use Models\Requisicao;

/**
 * Resolve o formulário de ações da dashboard para reajustar preço ou deletar livros
 */

    $requisicao = new Requisicao();

    $id = $_POST['id'];

    /* *Ações diferentes de acordo com os botões */
    if (isset($_POST['update'])) {
        $taxa = $_POST['taxa'];
        $result = $requisicao->reajustar_por_id($id, $taxa);
    }
    else if (isset($_POST['update-all'])) {
        $taxa = $_POST['taxa'];
        $result = $requisicao->reajustar_todos($taxa);
    }
    else if (isset($_POST['delete'])) {
        $result = $requisicao->deletar_por_id($id);
    }
    else if (isset($_POST['delete-all'])) {
        $result = $requisicao->deletar_todos();
    }

    /** Redireciona de volta à página de gerenciamento */
    header("location: ../gerenciar.php");
    die();
