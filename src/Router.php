<?php

namespace Framework;

class Router
{
    /** @var Route[] */
    private array $routes;

    public function __construct() {

    }

    public function dispatch(Request $request): Response {
        $matchedRoute = null;
        // Loop through routes array to find a match, then break out of the loop.
        foreach ($this->routes as $route) {
            if ($route->matches($request->method, $request->path)) {
                $matchedRoute = $route;
                break;
            }
        }
        // If nothing is matches, return 404 with a message.
        if ($matchedRoute === null) {
            // Route not found, return 404
            return $response = new Response("Page not found", 404);
        }

        // When matches, create a new response and return it.
        $response = new Response($matchedRoute->return);
        return $response;
    }

    public function addRoute(string $method, string $path, string $return): void {
        // Push function
        $this->routes[] = new Route($method, $path, $return);
    }
}