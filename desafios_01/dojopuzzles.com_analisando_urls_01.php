<?php

$url = 'http://www.google.com/mail?user=fulano';
//$url = 'http://www3.google.com/mail?user=fulano';
//$url = 'http://google.com/mail?user=fulano';
//$url = 'https://www.google.com/mail?user=fulano';
//$url = 'https://www.google.com?user=fulano';

$result = validationUrl($url);
print_r($result);

/**
 * Recebe uma url e verifica se a mesma está válida
 * @param mixed $url - url a ser validada
 * @return mixed
 */
function validationUrl($url = null)
{
    /**
     * Verifica se a url não está vazia
     */
    if (empty($url)) {
        return array();
    }

    $parser = parse_url($url);
    $host = $parser['host'];
    $dataHost = null;
    $dataDominio = substr($host, 0);
    /**
     * Verifica se encontra o WWW,
     * se encontrado faz o explode pelo ponto para verificar possíveis www, www2, www3, etc...
     * popula as variáveis de host e dominio
     */
    if (substr($host, 0, 3) == "www") {
        $explode = explode('.', $host);
        $dataHost = $explode[0];
        $dataDominio = substr($host, strlen($dataHost) + 1);
    }

    /**
     * Remove a barra "/" se existir no path
     */
    $path = $parser['path'];
    $dataPath = $path;
    if (substr($path, 0, 1) == "/") {
        $dataPath = substr_replace($path, '', 0, 1);
    }

    $data['protocolo'] = $parser['scheme'];
    $data['host'] = $dataHost;
    $data['dominio'] = $dataDominio;
    $data['path'] = $dataPath;
    $data['parametros'] = $parser['query'];

    return $data;
}
