<?php

function functionName($arg1, $arg2)
{
    $body = [$arg1, $arg2];

    return $body;
}

function optionalArgs($arg1, $arg2 = 'HEHE', $arg3 = null)
{
    $body = [$arg1, $arg2, $arg3];

    return $body;
}

function calcImc()
{
    global $weight;
    global $height;

    return $weight / ($height * $height);
}

function payTotal($price)
{
    static $total;

    $total += $price;
    return "<p>O total a pagar é <span class='tag'> R$" . number_format($total, 2, ',', '.') . " </span> </p>";
}

function myClass()
{
    $studentsNames = func_get_args();
    $studentsCount = func_num_args();

    return [
        'alunos' => $studentsNames,
        'presentes' => $studentsCount
    ];
}

function ex11($days)
{
    return [
    'years' => intdiv($days, 365),
    'months' => intdiv(($days % 365), 30),
    'days' => ($days % 365) % 30
    ];
}
