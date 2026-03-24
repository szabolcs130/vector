<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../app/repositories/EventRepository.php';
require_once __DIR__ . '/../app/services/EventService.php';
require_once __DIR__ . '/../app/controllers/EventController.php';
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUrl = '/vector/public';
$url = str_replace($baseUrl, '', $url);
$method = $_SERVER['REQUEST_METHOD'];
if ($url==='/api/events' && $method === 'GET') {
    $controller=new EventController(new EventService(new EventRepository()));
    $controller->getEventsFreeSpot();
    return;
}
if (preg_match('#^/api/events/(\d+)/register$#', $url, $matches) && $method === 'POST') {
    $controller=new EventController(new EventService(new EventRepository()));
    $controller->eventRegister($matches[1]);
    return;
}
http_response_code(404);
header('Content-Type: application/json');
echo json_encode(["error" => "Not Found"]);
?>