
<!-- Formulário de Busca -->

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
