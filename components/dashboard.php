

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

                <?php
                    foreach($livros as $livro) {
                        echo "<tr>";
                        echo "<td>" . $livro->id . "</td>";
                        echo "<td>" . $livro->isbn . "</td>";
                        echo "<td>" . $livro->autor . "</td>";
                        echo "<td><span style='font-decoration: italic'>" . $livro->titulo . "</span></td>";
                        echo "<td>" . $livro->editora . "</td>";
                        echo "<td>R$ " . number_format($livro->preco, 2, ",", "") . "</td>";
                        echo "<td>";
                        // require "dashboard-buttons.php";
                        echo '<div class="container">
                            <form action="inc/actions.php" method="post">
                            <input type="hidden" name="id" value=' . $livro->id . '>
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
                        </div>';
                        echo "</td>";
                        echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


