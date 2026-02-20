<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use Framework\ServiceContainer;
use Framework\ServiceProviderInterface;
use Framework\ResponseFactory;
use Exception;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @param ServiceContainer $container
     * @return void
     * @throws Exception
     */
    public function register(ServiceContainer $container): void
    {
        $responseFactory = $container->get(ResponseFactory::class);

        $homeController = new HomeController($responseFactory);
        $container->set(HomeController::class, $homeController);

        $taskController = new TaskController($responseFactory);
        $container->set(TaskController::class, $taskController);
    }
}
