<?php

    require __DIR__ . "/../source/functions.inc.php";
    //usleep(50000);
    //DEFINE O CALLBACK E RECUPERA O POST
    $jSON = null;
    $CallBack = 'Exercicies';
    $PostData = filter_input_array(INPUT_POST);

    //VALIDA AÇÃO
if ($PostData && $PostData['callback_action'] && $PostData['callback'] == $CallBack) {
    //PREPARA OS DADOS
    $Case = $PostData['callback_action'];
    unset($PostData['callback'], $PostData['callback_action'], $PostData['result']);

    //SELECIONA AÇÃO
    switch ($Case) {
        case 'conversion':
            if (array_search('', $PostData)) {
                $jSON['trigger'] = AjaxErro(
                    "<p class='align-center'><b class='icon icon-warning'>Ooops!</b> Por favor preencha todos os campos.</p>",
                    E_USER_WARNING
                );
                $jSON['field'] = array_search('', $PostData);
            } else {
                //$date = date('Y-m-d');
                //updateCotation($date);
                $cotationNow = dollarNow();
                switch ($PostData['city']) {
                    case 'bh':
                        $cotacao = (float)$PostData['usd'] * (float)$cotationNow[0]['cotation'];
                        $city = 'BH';
                        break;

                    case 'rj':
                        $cotacao = (float)$PostData['usd'] * (float)$cotationNow[1]['cotation'];
                        $city = 'RJ';

                        break;

                    case 'sp':
                        $cotacao = (float)$PostData['usd'] * (float)$cotationNow[2]['cotation'];
                        $city = 'SP';
                        break;
                }

                $jSON['cotacao'] = 'R$ ' . number_format($cotacao, 2, ",", ".");
                $jSON['city'] = $city;

                $jSON['trigger'] = AjaxErro(
                    "<p class='align-center'><b class='icon icon-smile2'>Ok! </b> Tudo certo </p>"
                );
            }
            break;

        case 'metrico':
            switch ($PostData['type_convertion']) {
                case 'cm_m':
                    $un = 'metro(s)';
                    $result = ($PostData['value_convertion'] / 100) . " {$un}";
                    break;

                case 'mm_m':
                    $un = 'metro(s)';
                    $result = ($PostData['value_convertion'] * 1000) . " {$un}";
                    break;

                case 'm_km':
                    $un = 'quilometro(s)';
                    $result = ($PostData['value_convertion'] / 1000) . " {$un}";
                    break;

                case 'km_milha':
                    $un = 'milhas';
                    $result = ($PostData['value_convertion'] * 1.6) . " {$un}";
                    break;

                case 'km_legua':
                    $un = 'legua(s)';
                    $result = ($PostData['value_convertion'] * 6) . " {$un}";
                    break;
            }

            $jSON['result'] = $result;
            $jSON['un'] = $un;
            $jSON['trigger'] = AjaxErro("<b class='icon icon-happy'></b> Conversão realizada com Sucesso!");

            break;

        case 'ex_11':
    

            $result = '';
            if ($days > 0) {
                $days == 1 ? $days_str = " dia " : $days_str = " dias ";

                $result =  $result . $days . $days_str;
            }

            if ($months > 0) {
                $months == 1 ? $months_str = " mês " : $months_str = " meses ";

                if ($result != '') {
                     $result =  $result . "e ";
                };
                $result =  $result . $months . $months_str;
            }

            if ($years > 0) {
                $years == 1 ? $year_str = " ano" : $year_str = " anos";

                if ($result != '') {
                    $result =  $result . "e ";
                };
                $result =  $result . $years . $year_str . ".";
            }

            $jSON['ex_11_result'] =  $result;
            break;

        case 'ex_12':
            $salary = $PostData['salary'] * 1.15;
            $salaryWithTax = $salary * 0.92;
            $jSON['ex_12_result'] =  'Salário inicial é R$' . salary_formater($PostData['salary']) . ", o salário com aumento é R$" . salary_formater($salary) .
            " e o salário com descontos de impostos é R$ " . salary_formater($salaryWithTax) . ".";
            break;

        case 'ex_13':
            $hundred = intdiv($PostData['number_to_convert'], 100);
            $tens = intdiv($PostData['number_to_convert'] % 100, 10);
            $unity = ($PostData['number_to_convert'] % 100) % 10;
            $jSON['ex_13_result'] = ' <p> CENTENA = ' . $hundred . '<br> DEZENA = ' . $tens . '<br> UNIDADE = ' . $unity . '</p>';
            break;

        case 'ex_14':
            $pizza_area = $PostData['pizza_radius'] ** 2 ;
            break;
    }

    //RETORNA O CALLBACK
    if ($jSON) {
        echo json_encode($jSON);
    } else {
        $jSON['trigger'] = AjaxErro(
            '<b>OPSS:</b> Desculpe. Mas uma ação do sistema não respondeu corretamente. Ao persistir, contate o desenvolvedor!',
            E_USER_ERROR
        );
        echo json_encode($jSON);
    }
} else {
    //ACESSO DIRETO
    die('<div style="width: 100vh; height: 100vw; display: flex; justify-content: center;align-items: center;
background-color: red;color: white; padding: 50px;" <h1 style="font-size: 40px; text-align: center; width: 100%; text-shadow: 2px 2px 4px rgba(0,0,0,0.4)">Acesso Restrito!</h1></div>');
}

function salary_formater($number)
{
    return number_format($number, 2, ',', '.');
}
