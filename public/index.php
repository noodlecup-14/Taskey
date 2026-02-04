<?php

require __DIR__ .'/../vendor/autoload.php'; // Load the classes into memory

use Framework\Kernel; // IMPORT the class
use Framework\Request;
use Framework\Response;

// This is the front controller.

$kernel = new Kernel();

// Define some routes
$router = $kernel->getRouter();
$router->addRoute("GET","/", "Welcome to Taskey");
$router->addRoute("GET","/about","This is Noodle's Taskey");

// $_SERVER['REQUEST_URI']`: What the browser request, contains path + query string. "/..."
// parse_url: Extract only the path, ex: /tasks?done=1 --> /tasks

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (!is_string($urlPath)) {
    $urlPath = "/";
}

/* PARAMETERS EXPLAINED:
 * $_SERVER['REQUEST_METHOD'] → "GET", "POST"
 * $_GET: query parameters: /tasks?done=1 gives ['done' => '1']
 */
$request = new Request($_SERVER['REQUEST_METHOD'], $urlPath, $_GET, $_POST);

$response = $kernel->handle($request);

$response->echo();
