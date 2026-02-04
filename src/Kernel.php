<?php

namespace Framework; // This class is in the Framework. In the same namespace -> do not need to import other classes.

class Kernel {
    private Router $router;

    public function __construct() {
        $this->router = new Router();
    }

    public function getRouter(): Router {
        return $this->router;
    }

    public function handle(Request $request): Response {
//        $response = new Response(body: "Thank you for your request.");
//        return $response;
        return $this->router->dispatch($request);
    }
}
