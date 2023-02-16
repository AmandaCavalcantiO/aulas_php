

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

    <link rel="stylesheet" href="_css/icomoon/demo-files/demo.css">
    <link rel="stylesheet" href="_css/style.css">
    <script src="_js/jquery.js"></script>
    <script src="_js/maskinput.js"></script>
    <script src="_js/script.js"></script>
    <title>Agenda</title>


</head>
<body>
<?php
$agenda = __DIR__ . '/agenda.txt';
if ($_REQUEST) {
    if (!file_exists($agenda) || !is_file($agenda)) {
        $fileOpen = fopen($agenda, "w");
        fwrite($fileOpen, $_REQUEST['name'] . " - " . $_REQUEST['phone'] . PHP_EOL);
        fclose($fileOpen);
    } else {
        $fileOpen = fopen($agenda, "a+");
        fwrite($fileOpen, $_REQUEST['name'] . " - " . $_REQUEST['phone'] . PHP_EOL);
    }
    unset($_REQUEST);
}

?>

<section class="container">

  <form action="">
    <label for="name">
        <span>Nome:</span>
        <input type="text" name="name" id="name">
    </label>

    <label for="phone">
        <span>Telefone:</span>
        <input type="text" name="phone" id="phone" class="formPhone">
    </label>

    <button type="submit">Salvar</button>
  </form>

  <div id="phonesList">
  </div>

</section>
</body>
</html>
