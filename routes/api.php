<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUrl = '/vector/public';
$url = str_replace($baseUrl, '', $url);
echo "url: ".$url." <br>";
if ($url==='/api/events') {
    echo "api: get events";
}
?>