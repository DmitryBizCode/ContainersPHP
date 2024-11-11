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
            case 'create':
                if ($method == 'POST') {
                    $this->postController->create($data, $image);
                    break;
                } else {
                    $content = $this->postController->getCreate();
                    break;
                }
            // no break
            case 'update':
                if ($method == 'POST') {
                    $this->postController->edit($id, $data, $image);
                    break;
                } else {
                    $content = $this->postController->getEdit($id);
                    break;
                }
            // no break
            case 'delete':
                if ($method == 'POST') {
                    echo $id;
                    $this->postController->delete($id);
                    break;
                } else {
                    $content = $this->postController->getDelete($id);
                    break;
                }
            // no break
            default:
                $content = $this->postController->getList();
                break;
        }

        echo $content;
    }
}