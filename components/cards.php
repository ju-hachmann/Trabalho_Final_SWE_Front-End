
<div class="container-fluid">
    <div class="row row-cols-3">
        <?php foreach($livros as $livro) { ?>
            <div class="card">
                <div class="row">
                    <div class="col-4 card-body">
                        <img class="rounded" style="max-width: 100%" src="<?php echo $livro->image?>" alt="Image">
                    </div>
                    <div class="col-8 card-body">
                        <h4 class="card-title"><?php echo $livro->titulo ?></h4>
                        <h5 class="card-subtitle"><?php echo $livro->autor ?></h5>
                        <p class="card-text"><?php echo $livro->editora ?> <br>ISBN: <?php echo $livro->isbn ?></p>
                        <h5 class="card-subtitle">R$ <?php echo number_format($livro->preco, 2, ",", "") ?></h5>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
