<?php

$input = '110';
$output = correspondingNumber($input);
var_dump($output);

function correspondingNumber($input = null)
{
    if (empty($input) or !validation($input)) {
        return 0;
    }
    return getNumber($input);
}

/**
 * Com exceção de V, L e D, os outros numerais podem se repetir no máximo três vezes
 */
function validation($input = null)
{
    if (empty($input)) {
        return false;
    }

    if (is_numeric($input)) {
        return true;
    }

    $canNotHave = array(
        'IIII',
        'VV',
        'XXXX',
        'LL',
        'CCCC',
        'DD',
        'MMMM'
    );

    foreach ($canNotHave as $number) {
        if (substr_count($input, $number) >= 1) {
            return false;
        }
    }
    return true;
}

function getNumber($input = null)
{
    if (empty($input)) {
        return 0;
    }

    if (is_numeric($input)) {
        return getIndoArabicNumbers($input);
    }
    return getRomanNumbers($input);
}

function getRomanNumbers($input = null)
{
    if (empty($input)) {
        return 0;
    }

    $corresponding = array(
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    );

    $split = str_split($input);
    $result = 0;
    for ($cont = 0; $cont < strlen($input); $cont++) {
        $beforeReference = isset($split[$cont - 1]) ? $split[$cont - 1] : null;
        $reference = $split[$cont];
        if (isset($corresponding[$beforeReference])
            and ($corresponding[$beforeReference] < $corresponding[$reference])
        ) {
            $result -= $corresponding[$reference];
        } else {
            $result += $corresponding[$reference];
        }
    }
    return ($result < 0) ? ((-1) * $result) : $result;
}

function getIndoArabicNumbers($input = null)
{
    if (empty($input)) {
        return 0;
    }

    $corresponding = array(
        1 => 'I',
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M'
    );

    if (isset($corresponding[$input])) {
        return $corresponding[$input];
    }
}
