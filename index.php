<?php

require_once "components/header.php";

require_once "inc/buscar.php";

if (!empty(array($livros))) {
    require_once "components/cards.php";
}
else {
    echo "<p>Nenhum item foi encontrado</p>";
}


?>

</body>
</html>