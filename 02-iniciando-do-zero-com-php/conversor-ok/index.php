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

    <title>Conversor Monetário</title>

    <script src='_js/jquery.js'></script>
    <script src='_js/jquery.form.js'></script>
    <script src='_js/script.js'></script>

</head>
<body>
<section class="container">

    <form action="" style="margin-bottom: 50px;">
        <select name="seletor" id="seletor">
            <option value="" disabled selected>SELECIONE O CONVERSOR</option>
            <option value="dolar">Cotação do Dólar</option>
            <option value="medidas">Conversor Métrico</option>
            <option value="ex_11">Ex.11 Conversor de dias</option>
            <option value="ex_12">Ex.12 Conversor de salário</option>
            <option value="ex_13">Ex.13 Conversor de unidade, dezena e centena</option>

        </select>
    </form>

    <form action='' id="dolar" method='post' class="auto_save ds_none" enctype="multipart/form-data" novalidate>

        <input type="hidden" name="callback" value="Exercicies">
        <input type="hidden" name="callback_action" value="conversion">

        <fieldset>
            <legend><i class='icon icon-coin-dollar'></i> CONVERSOR MONETÁRIO</legend>

            <div class='trigger_modal'></div>

            <div class='flex-box'>
                    <label for='usd'>
                        <span class='icon icon-coin-dollar'>Valor em USD:</span>
                        <input type='number' name='usd' id='usd' step='0.01' min='1' value='' required>
                    </label>
                <label for='city'>
                    <span>Cidade do Câmbio:</span>
                    <select name='city' id='city' required>
                        <option value='' disabled selected>Selecione a cidade</option>
                        <option value='bh'>Belo Horizonte</option>
                        <option value='rj'>Rio de Janeiro</option>
                        <option value='sp'>São Paulo</option>
                    </select>
                </label>

                <label for='result'>
                    <span>A cotação em <mark id='ct'></mark> é <b>R$</b> </span>
                    <input type='text' name='result' placeholder="VALOR EM BRL" id='result' value=''>
                </label>
            </div>

            <div class="flex-box">
                <button class="btn btn-green btn-rounded" value="1" type="submit">
                    <img class="ds_none form_load" src="images/load_w.gif" alt="Enviando formulário!">
                    CONVERTER</button>
            </div>
        </fieldset>
    </form>


    <form action='' id="medidas" method='post' class="auto_save ds_none" enctype="multipart/form-data" novalidate>

        <input type="hidden" name="callback" value="Exercicies">
        <input type="hidden" name="callback_action" value="metrico">

        <fieldset>
            <legend><i class='icon icon-meter'></i> CONVERSOR MÉTRICO</legend>

            <div class='trigger_modal'></div>

            <div class='flex-box'>
                    <label for='value_convertion'>
                        <span class='icon icon-coin-dollar'>VALOR:</span>
                        <input type='number' name='value_convertion' id='value_convertion' step='0.001' min='1' value='' tabindex="1" required>
                    </label>

                <label for='type_convertion'>
                    <span>CONVERTER MEDIDA:</span>
                    <select name='type_convertion' id='type_convertion' tabindex="2" required>
                        <option value='' disabled selected>Selecione a tipo de conversão</option>
                        <option value='cm_m'>CM - M</option>
                        <option value='mm_m'>MM - M</option>
                        <option value='m_km'>M - KM</option>
                        <option value='km_milha'>KM - MILHA</option>
                    </select>
                </label>

                <label for='result'>
                    <span>A medida em <mark id='un'></mark> é <b>=</b> </span>
                    <input type='text' name='result_convertion' placeholder="RESULTADO" id='result_convertion' value=''>
                </label>
            </div>

            <div class="flex-box">
                <button class="btn btn-green btn-rounded" value="1" tabindex="3" type="submit">
                    <img class="ds_none form_load" src="images/load_w.gif" alt="Enviando formulário!">
                    CONVERTER</button>
            </div>
        </fieldset>
    </form>

    <form action='' id="ex_11" method='post' class="auto_save ds_none" enctype="multipart/form-data" novalidate>

        <input type="hidden" name="callback" value="Exercicies">
        <input type="hidden" name="callback_action" value="ex_11">

        <fieldset>
                <legend></i> CONVERSOR DIAS</legend>

                <div class='trigger_modal'></div>

                <div class='flex-box-row'>
                    <div class="align-center" style="margin-bottom: 50px;">
                        11. Uma fábrica controla o tempo de trabalho sem acidentes pela quantidade de dias. Faça um
                        algoritmo para converter este tempo em anos, meses e dias. Assuma que cada mês possui sempre
                        30 dias.
                    </div>

                    <label for='days'>
                        <span class=''>Dias sem acidentes:</span>
                        <input type='number' name='value_convertion' id='days'  min='1' value='' tabindex="1" required>
                    </label>
                    <div class="align-center" id="ex_11_result" style="margin-bottom: 50px;">Resultado</div>
                </div>

                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="Enviando formulário!">
                        CONVERTER</button>
                </div>
            </fieldset>
    </form>

    <form action='' id="ex_12" method='post' class="auto_save ds_none" enctype="multipart/form-data" novalidate>

        <input type="hidden" name="callback" value="Exercicies">
        <input type="hidden" name="callback_action" value="ex_12">

        <fieldset>
            <legend></i> CONVERSOR DE SALÁRIO</legend>

            <div class='trigger_modal'></div>

            <div class='flex-box'>
                <div class="align-center" style="margin-bottom: 50px;">
                    12. Faça um algoritmo para ler o salário de um funcionário e aumentá-Io em 15%. Após o aumento,
                    desconte 8% de impostos. Imprima o salário inicial, o salário com o aumento e o salário final.
                </div>
                <label for='salary'>
                    <span class=''>Salário do funcionário:</span>
                    <input type='number' name='salary' id='salary'  step='0.01' min='1' value='' required>
                </label>
                <div class="align-center" id="ex_12_result" style="margin-bottom: 50px;">RESULTADO</div>
            </div>

            <div class="flex-box">
                <button class="btn btn-green btn-rounded" value="1" type="submit">
                    <img class="ds_none form_load" src="images/load_w.gif" alt="Enviando formulário!">
                    CONVERTER</button>
            </div>
        </fieldset>
    </form>

    <form action='' id="ex_13" method='post' class="auto_save ds_none" enctype="multipart/form-data" novalidate>

        <input type="hidden" name="callback" value="Exercicies">
        <input type="hidden" name="callback_action" value="ex_13">

        <fieldset>
            <legend></i> CONVERSOR DE UNIDADE, DEZENA E CENTENA</legend>

            <div class='trigger_modal'></div>

            <div class='flex-box'>
            <div class="align-center" style="margin-bottom: 50px;">
                13. Ler um número inteiro (assuma até três dígitos) e imprimir a saída da seguinte forma: CENTENA = x DEZENA = x  UNIDADE = x
            </div>

                <label for='number_to_convert'>
                    <span class=''>Valor:</span>
                    <input type='number' name='number_to_convert' id='number_to_convert'  min='1' value='' max="999" required>
                </label>
                <div class="align-center" id="ex_13_result" style="margin-bottom: 50px;">RESULTADO</div>
            </div>

            <div class="flex-box">
                <button class="btn btn-green btn-rounded" value="1" type="submit">
                    <img class="ds_none form_load" src="images/load_w.gif" alt="Enviando formulário!">
                    CONVERTER</button>
            </div>
        </fieldset>
    </form>

    <form action='' id="ex_14" method='post' class="auto_save ds_none" enctype="multipart/form-data" novalidate>

        <input type="hidden" name="callback" value="Exercicies">
        <input type="hidden" name="callback_action" value="ex_14">

        <fieldset>
            <legend></i> CALCULADORA ÁREA DA PIZZA</legend>

            <div class='trigger_modal'></div>

            <div class='flex-box'>
            <div class="align-center" style="margin-bottom: 50px;">
                14. Calcule a área de uma pizza que possui um raio R (pi=3.14).
            </div>
                <label for='pizza_radius'>
                    <span class=''>Raio da pizza:</span>
                    <input type='number' name='pizza_radius' id='pizza_radius' step='0.001' min='1' value='' required>
                </label>
                <div class="align-center" id="ex_14_result" style="margin-bottom: 50px;">RESULTADO</div>
            </div>

            <div class="flex-box">
                <button class="btn btn-green btn-rounded" value="1" type="submit">
                    <img class="ds_none form_load" src="images/load_w.gif" alt="Enviando formulário!">
                    CONVERTER</button>
            </div>
        </fieldset>
    </form>

</section>
</body>
</html>
