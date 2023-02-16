<?php

    // header('Content-type: text/html; charset=utf-8');
    //SETANDO CONSTANTES DE ACESSO DO BANCO DE DADOS
    define("DB_HOST", '127.0.0.1');
    define("DB_NAME", 'db_conversion');
    define("DB_USER", 'root');
    define("DB_PASSWORD", '');

    $dollarToday = file_get_contents('https://dolarhoje.com/');

function dollarNow()
{
    $dollarToday = file_get_contents('https://dolarhoje.com/');

    $table = substr(
        $dollarToday,
        strpos($dollarToday, '<table class="conversao">'),
        strpos($dollarToday, '</table>') + 8 - strpos($dollarToday, '<table class="conversao">')
    );

    $body = explode(
        '</a></td> <td>',
        str_replace(
            ["    ", "   ", "  "],
            ' ',
            mb_strcut($table, strpos($table, '<tbody>'), strpos($table, '</tbody>') + 8 - strpos($table, '<tbody>'))
        )
    );

    $body = array_map('strip_tags', $body); //limpa tags de codigo
    $body = array_map('trim', $body); //elimina espaços vazios inicio e fim da string
    $bodyString = implode(" - ", $body);//converte em string
    $stringToArr = explode("   ", $bodyString);//converte em array

    foreach ($stringToArr as $value) {
        $cityValue = explode(" - ", $value); //converte em array para $value

        //atribui para uma novo array associativo os dados já tratados.
        $cotationNow [] = [
            "city" => $cityValue[0],
            "cotation" => (float)str_replace(['R$', ' ', ','], ['', '', '.'], $cityValue[1])
        ];
    }

    return $cotationNow;
}

function insertCotation()
{
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME;
        $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
        // instancia objeto PDO, conectando no MySQL
        $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $usd_create = date('Y-m-d H:i:s');

        // executa uma série de instruções SQL
        foreach (dollarNow() as $Cotations) {
            extract($Cotations);

            $conn->query(
                "INSERT INTO cv_dollar (usd_city, usd_cotation, usd_create) VALUES ('{$city}', '{$cotation}','{$usd_create}')"
            );

            $cotation = [
                'usd_city' => $city,
                'usd_cotation' => $cotation
            ];
        }
        // fecha a conexão
        $conn = null;

        return $cotation;
    } catch (PDOException $e) {
        // caso ocorra uma exceção, exibe na tela
        print 'Erro!: ' . $e->getMessage() . "\n";
    }
}

    /*$date = date('Y-m-)*/
function updateCotation($date)
{
    $dsn = 'mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME;
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
    // instancia objeto PDO, conectando no MySQL
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $conn->query(
        "SELECT usd_city, usd_cotation, DATE(usd_update) as update_day FROM cv_dollar WHERE DATE(usd_update) = DATE('{$date}') ORDER BY usd_city ASC"
    );

    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // var_dump($row);

            $cotation[] = [
                'usd_city' => $row['usd_city'],
                'usd_cotation' => $row['usd_cotation']
            ];
        }
    } else {
        insertCotation();
        /*
         $return = $conn->query(
             "SELECT usd_city, usd_cotation, DATE(usd_update) FROM cv_dollar WHERE DATE(usd_update) = DATE('{$date}') ORDER BY usd_city ASC"
         );
         if ($return) {
             foreach ($result->fetch(PDO::FETCH_ASSOC) as $Cotations) {
                 extract($Cotations);

                 $Cotation[] = [
                     'usd_city' => $usd_city,
                     'usd_cotation' => $usd_cotation
                 ];
             }
         }*/
    }
    // fecha a conexão
    $conn = null;

    return 'tetse';
}

    /*
    * Exibe erros lançados por ajax
    */
function AjaxErro($ErrMsg, $ErrNo = null)
{
    $CssClass = ($ErrNo == E_USER_NOTICE ? 'trigger_info' : ($ErrNo == E_USER_WARNING ? 'trigger_alert' : ($ErrNo == E_USER_ERROR ? 'trigger_error' : 'trigger_success')));

    return "<div class='trigger trigger_ajax {$CssClass}'>{$ErrMsg}</div>";
}
