<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUrl = '/vector/public';
$url = str_replace($baseUrl, '', $url);
$method = $_SERVER['REQUEST_METHOD'];
echo "url: ".$url." <br>";
if ($url==='/api/events') {//  && $method === 'GET'
    echo "api: get events";
    return;
}
if (preg_match('#^/api/events/(\d+)/register$#', $url, $matches)) {// && $method === 'POST'
    var_dump($matches);
    return;
}
echo "not found";
?>