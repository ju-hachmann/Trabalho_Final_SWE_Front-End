<?php

require "components/header.php";
require "inc/Livro.php";

if (isset($_POST['cadastrar'])) {
    foreach ($_POST as $key => $value) {
        $var = $key;
        $$var = $value;
    }

    $livro = new Livro($id, $isbn, $titulo, $autor, $editora, $image, $preco);

    $json = json_encode($livro);

    // echo $id;
    // echo $image;
    // echo $autor;
    // die();

    // Curl

    // Generated @ codebeautify.org
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'localhost:8081/adicionar_livro');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n 
    //         \"id\": " . $id . ",\n
    //         \"isbn\": " . $isbn . ",\n
    //         \"titulo\": \"" . $titulo . "\",\n
    //         \"autor\": \"" . $autor . "\",\n
    //         \"editora\": \"" . $editora . "\",\n
    //         \"image\": \"" . $image . "\",\n
    //         \"preco\": ". $preco . "\n}");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    // Echo sucesso
    $livro = json_decode($result);
    echo "<p>Livro " . $livro->titulo . " adicionado com sucesso!</p>";
}

require "components/form-adicionar.php";

?>
</body>
</html>