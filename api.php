<?php

// Permitir acesso somente do mesmo domínio
header("Access-Control-Allow-Origin: htttps://site.com.br");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Sua chave de acesso do Unsplash
$accessKey = 'SUA_CHAVE_DE_ACESSO_DO_UNSPLASH';

// URL base da API do Unsplash
$unsplashURL = 'https://api.unsplash.com/search/photos';

// Função para resolver o caminho da solicitação
function proxyReqPathResolver($request)
{
    global $accessKey;
    $parts = explode('?', $request);
    return '?client_id=' . $accessKey . (count($parts) > 1 ? '&' . $parts[1] : '');
}

// URL da solicitação recebida na sua API PHP
$requestUrl = $_SERVER['REQUEST_URI'];

// Resolve o caminho da solicitação
$proxyUrl = proxyReqPathResolver($requestUrl);

// Monta a URL completa da solicitação para a API do Unsplash
$fullUrl = $unsplashURL . $proxyUrl;


// Inicializa uma sessão cURL
$curl = curl_init();

// Configura as opções do cURL
curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => $fullUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $_SERVER['REQUEST_METHOD'],
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    )
);

// Executa a requisição cURL
$response = curl_exec($curl);
$err = curl_error($curl);

// Fecha a sessão cURL
curl_close($curl);

// Se houver erro na requisição cURL, exibe o erro
if ($err) {
    echo "Erro na requisição cURL: " . $err;
} else {
    // Senão, envia a resposta de volta ao cliente
    echo $response;
}
