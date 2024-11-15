<?php

namespace App\Controllers;

use App\Services\SQLService;
use App\Services\TemplateService;

class ContainerController
{
    private PostService $postService;
    private TemplateService $templateService;

    public function __construct()
    {
        $this->templateService = new TemplateService();
    }

    public function getSign(): string
    {
        return $this->templateService->render('pages/signPage', ["signNavBar" => 1,]);
    }
    public function getHome(): string
    {
        return $this->templateService->render('pages/indexPage', ["homeNavBar" => 1,"footer" => 1]);
    }
    public function getServices(): string
    {
        return $this->templateService->render('pages/servicesPage', ["servicesNavBar" => 1,"footer" => 1]);
    }
    public function getContact(): string
    {
        return $this->templateService->render('pages/contactPage', ["contactNavBar" => 1,"footer" => 1]);
    }
    private function redirect(string $url): void
    {
        header('Location: ' . $url, true, 302);
        exit();
    }





    //////////////////////*******************
    public function getList(): string
    {
        $posts = $this->postService->getAll();
        return $this->templateService->render('posts/list', [
            'title' => 'Basic Blog',
            'posts' => $posts
        ]);
    }
    private function uploadPhoto(array $image, array &$data): void
    {
        if ($image) {
            $data['image_name'] = $this->postService->generateImageHash($image['image_name']['name']);
            $targetPath = __DIR__ . '/../../images/PhotoPost/' . $data['image_name'];
            if (!move_uploaded_file($image['image_name']['tmp_name'], $targetPath)) {
                throw new \Exception("Failed to upload image");
            }
        }
    }
    private function deletePhoto(array $image, string $id, bool $skip = false): void
    {
        $posts = $this->postService->getAll();
        foreach ($posts as $post) {
            if ($post->id === $id) {
                if ((isset($image['image_name']) && $image['image_name']['error'] === UPLOAD_ERR_OK) || $skip) {
                    $imagePath = realpath(__DIR__ . '/../../images/PhotoPost/' . $post->image_name);
                    if ($imagePath && file_exists($imagePath)) {
                        if (!unlink($imagePath)) {
                            error_log("Error deleting file: " . $imagePath);
                        }
                    }
                }
            }
        }
    }

    public function create(array $data, array $image)
    {
        try {
            $this->uploadPhoto($image, $data);
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

        $post = PostModel::fromArray($data);
        $this->postService->create($post);
        $this->redirect('/index.php');
    }

    public function getCreate(): string
    {
        return $this->templateService->render('posts/create', [
            'title' => 'New Post',
            'navBar' => "NewPost"
        ]);
    }

    public function edit(string $id, array $data, array $image): void
    {
        try {
            if (isset($image['image_name']) && $image['image_name']['error'] === UPLOAD_ERR_OK) {
                $this->deletePhoto($image, $id);
                $this->uploadPhoto($image, $data);
            }

            $this->postService->update($id, $data);
            $this->redirect('/index.php');

        } catch (\Exception $e) {
            error_log("Exception in edit: " . $e->getMessage());
        }
    }

    public function getEdit($id): string
    {
        $post = $this->postService->getOne($id);

        return $this->templateService->render('posts/edit', [
            'title' => 'Edit Post',
            'navBar' => "NewPost",
            'post' => $post
        ]);
    }

    public function delete(string $id): void
    {
        try {
            $this->deletePhoto([], $id, true);
            $this->postService->delete($id);
            $this->redirect('/index.php');
        } catch (\Exception $e) {
            error_log("Error exception when deleted a post: " . $e->getMessage());
        }
    }

    public function getDelete($id): string
    {
        $post = $this->postService->getOne($id);
        return $this->templateService->render('posts/delete', [
            'title' => 'Delete Post',
            'navBar' => "NewPost",
            'post' => $post
        ]);
    }


}