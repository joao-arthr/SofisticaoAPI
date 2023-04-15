<?php
    include "../vendor/autoload.php";
    use app\routes\Router;
    use app\models\User;
    use app\models\Conexao;
    use app\helpers\Uri;
    header('Content-type: application/json');
    Router::execute();

    ?>