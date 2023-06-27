<?php

$dominio = 'http://localhost:8081';

$id = $_POST['id'];

// var_dump($id);

if (isset($_POST['delete'])) {
    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $dominio.'/delete_por_id');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    curl_setopt($ch, CURLOPT_POSTFIELDS, $id);

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

}


else if (isset($_POST['update'])) {
    // Make Curl
    // Generated @ codebeautify.org
    $taxa = $_POST['taxa'];
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $dominio.'/reajustar_preco_por_id/'.$id.'/'.$taxa);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

else if (isset($_POST['update-all'])) {
    $taxa = $_POST['taxa'];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $dominio.'/reajustar_preco');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

    curl_setopt($ch, CURLOPT_POSTFIELDS, $taxa);

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

else if (isset($_POST['delete-all'])) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $dominio.'/delete_all');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

//var_dump($result);

header("location: ../gerenciar.php");
die();
