<?php

require __DIR__ . '/../vendor/autoload.php'; // Autoload dependencies and classes

use App\RouteProvider;
use App\ServiceProvider;
use Framework\Kernel;
use Framework\Request;

// This is the front controller.

// Boot
$kernel = new Kernel();

// Register services (controllers)
$kernel->registerServices(new ServiceProvider());

// Register routes (using controllers from container)
$kernel->registerRoutes(new RouteProvider());

// Get Request data from the global variables
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Extract the path from the URL
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (!is_string($urlPath)) {
    $urlPath = '/';
}

// Get query (GET) parameters
$queryParams = $_GET;

// Get POST data
$postData = $_POST;

// Create the Request object
$request = new Request($method, $urlPath, $queryParams, $postData);

// Handle the request and get the response
$response = $kernel->handle($request);

// Send the response to the client
$response->echo();
