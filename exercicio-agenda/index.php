<?php

$agenda = __DIR__ . '/agenda.txt';
if ($_REQUEST) {
    if (isset($_REQUEST['name']) && isset($_REQUEST['phone'])) {
        $data = "{$_REQUEST['name']} - {$_REQUEST['phone']} " . PHP_EOL;
        if (!file_exists($agenda) || !is_file($agenda)) {
            file_put_contents($agenda, $data);
        } else {
            file_put_contents($agenda, $data, FILE_APPEND | LOCK_EX);
        }
        unset($_REQUEST);
    }
}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap' rel='stylesheet'>

    <link rel="stylesheet" href="style.css">
    <script src="_js/jquery.js"></script>
    <script src="_js/maskinput.js"></script>
    <script src="_js/script.js"></script>
    <title>Agenda</title>
</head>
<body>
  <form action="">
    <div class="flex-box justify-center align-items-center">
        <label for="name">
            <span>Nome:</span>
            <input type="text" name="name" id="name">
        </label>

        <label for="phone">
            <span>Telefone:</span>
            <input type="text" name="phone" id="phone" class="formPhone">
        </label>

        <button type="submit" class="green">Salvar</button>
    </div>
  </form>

  <div id="result" class="result">

    <h1> Lista telefonica </h1>
    <button class="changeList" ></button>

    <?php
     echo "<div id='list' class= 'table table-grid'>";

    if (file_exists($agenda) || is_file($agenda)) {
        $list = file($agenda, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($list as &$value) {
            $contact = explode("-", $value, 2);
            echo "<article class= 'contact'> <span> {$contact[0]} </span> <b> {$contact[1]} </b> </article>";
        }
    }
    echo "</div>;"
    ?>
  </div>

</body>
</html>
