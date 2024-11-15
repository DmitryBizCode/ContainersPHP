<?php

namespace App\Services;

use App\Controllers\ContainerController;

class Router
{
    private ContainerController $containerController;

    public function __construct()
    {
        $this->containerController = new ContainerController();
    }

    public function route(string $action = null, string $id = null, string $method = 'GET', array $data = [], array $image = [])
    {
        switch ($action) {
            case 'sign':
                if ($method == 'POST') {
                    $this->containerController->create($data, $image);
                    break;
                } else {
                    $content = $this->containerController->getSign();
                    break;
                }
            // no break
            case 'contact':
                if ($method == 'POST') {
                    $this->containerController->edit($id, $data, $image);
                    break;
                } else {
                    $content = $this->containerController->getContact();
                    break;
                }
            // no break
            case 'services':
                if ($method == 'POST') {
                    echo $id;
                    $this->containerController->delete($id);
                    break;
                } else {
                    $content = $this->containerController->getServices();
                    break;
                }
            // no break
            default:
                $content = $this->containerController->getHome();
                break;
        }

        echo $content;
    }
}