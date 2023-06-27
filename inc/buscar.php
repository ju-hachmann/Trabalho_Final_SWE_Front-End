
<div class="container w-75 mt-3 mb-5 text-center">

    <form action="" method="post">
        <div class="row align-items-center">
            <div class="col-auto">Buscar Livros:</div>
            <div class="col-5">
                <input class="form-control" type="text" name="texto" id="texto" placeholder="Buscar" required>
            </div>
            <div class="col-auto">
                <select name="filtro" id="filtro" required>
                    <option value="todos" selected>Todos os campos</option>
                    <option value="autor" >Autor</option>
                    <option value="titulo">Título</option>
                    <option value="isbn">ISBN</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" name="buscar" class="btn btn-tertiary">Buscar</button>
            </div>
        </div>
    </form>
</div>

<?php

$dominio = 'http://localhost:8081';
$filtro = '';

if (isset($_POST['buscar'])) {
    $filtro = $_POST['filtro'];
    $texto = $_POST['texto'];
    switch($filtro)
    {
        case 'todos':
            $endpoint = '/get_todos_contendo';
            break;
        case 'autor':
            $endpoint = '/get_por_autor';
            break;
        case 'titulo': 
            $endpoint = '/get_por_titulo';
            break;
        case 'isbn':
            $endpoint = '/get_por_isbn';
            break;
    }

    // Gerando o cUrl
    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $dominio.$endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    curl_setopt($ch, CURLOPT_POSTFIELDS, $texto);

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    echo "<p>Resultado da busca por: $texto em: $filtro";
}
else {
    $endpoint = '/get_all';
    $result = file_get_contents($dominio.$endpoint);
}


$livros = json_decode($result);

// A busca por isbn não retorna um array como as outras buscas
if ($filtro == 'isbn') {
    $livros = array($livros);
}
