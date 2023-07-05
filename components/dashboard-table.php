
<!-- Tabela gerenciamento de livros -->

<div class="container mt-3 mb-5 text-center">

    <div class="livros">
        <table class="table table-hover">
            <thead>
                <th>ID</th>
                <th>ISBN</th>
                <th>Autor</th>
                <th>Título</th>
                <th>Editora</th>
                <th>Valor (R$)</th>
                <th>Ações</th>
            </thead>
            <tbody>

            <?php foreach($livros as $livro) { ?>
                <tr>
                    <td><?php echo $livro->id ?></td>
                    <td><?php echo $livro->isbn ?></td>
                    <td><?php echo $livro->autor ?></td>
                    <td><?php echo $livro->titulo ?></td>
                    <td><?php echo $livro->editora ?></td>
                    <td>R$ <?php echo number_format($livro->preco, 2, ",", "") ?></td>
                    <td>
                        <div class="container">
                            <form action="./inc/controle-dashboard.php" method="post">
                                <input type="hidden" name="id" value=<?php echo $livro->id ?>>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="number" class="form-control" name="taxa" placeholder="% reajuste">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" name="update" class="btn btn-warning">Alterar Preço</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-danger" name="delete" title="Deletar este item">Deletar</button>
                                    </div>        
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>


