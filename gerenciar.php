<?php

require_once "components/header.php";

require_once "inc/buscar.php";

require_once "components/dashboard-buttons.php";



if (!empty(array($livros))) {
    require_once "components/dashboard.php";
}
else {
    echo "<p>Nenhum item foi encontrado</p>";
}


?>
</body>
</html>