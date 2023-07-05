
<!-- Formulário de adição de novos livros -->

<div class="container w-25 mt-3 ms-5">
    <form action="./inc/controle-adicionar.php" method="post">
        <fieldset>
            <legend>Adicionar Novo Livro</legend>

            <div class="form-group">
                <label for="id" class="form-label">ID: </label>
                <input type="number" class="form-control" name="id" id="id" min="0" placeholder="Id do livro" required>
            </div>

            <div class="form-group">
                <label for="isbn" class="form-label">ISBN: </label>
                <input type="number" class="form-control" name="isbn" id="isbn" min="0" placeholder="ISBN" required>
            </div>

            <div class="form-group">
                <label for="titulo" class="form-label">Título: </label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título do livro" required>
            </div>

            <div class="form-group">
                <label for="autor" class="form-label">Autor: </label>
                <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor do livro" required>
            </div>

            <div class="form-group">
                <label for="editora" class="form-label">Editora: </label>
                <input type="text" class="form-control" name="editora" id="editora" placeholder="Editora" required>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">URL da imagem: </label>
                <input type="text" class="form-control" name="image" id="image" placeholder="URL da imagem" required>
            </div>

            <div class="form-group">
                <label for="preco" class="form-label">Preço: </label>
                <input type="number" class="form-control" name="preco" id="preco" min="0" step="0.01" placeholder="R$" required>
            </div>

            <div class="row">
                <div class="col"><button class="btn btn-secondary" type="reset">Limpar</button></div>
                <div class="col"><button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button></div>
            </div>
        </fieldset>
    </form>
</div>
