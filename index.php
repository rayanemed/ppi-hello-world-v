<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olá povos!</title>
</head>
<body>
    <h1>App da Rayane Medeiros</h1>
    <?php
    require_once "model/Conexao.php";
    $tecnologias = Conexao::select("tecnolgia", "id, nome");
    print_r($tecnologias);
    ?>
</body>
</html>