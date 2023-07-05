
<!-- Formulário da página de gerenciamento -->

<form action="./inc/controle-dashboard.php" method="post">
    <div class="container mt-3 mb-5 text-center">
        <div class="row align-items-center">
            <div class="col-3"><h5>Ações Gerais</h5></div>
            
            <div class="col-3">
                <input type='number' class='form-control' name='taxa' placeholder="% reajuste">
            </div>
            <div class="col-3">
                <button type='submit' name='update-all' class='btn btn-warning'>Reajustar Preço de Todos</button>
            </div>
            <div class="col-3">
                <button type='submit' class='btn btn-danger' name='delete-all' title="Deletar Todos os Itens">Deletar Todos</button>
            </div>        
        
        </div>
    </div>
</form>

