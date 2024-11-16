<?php

namespace App\Controllers;

use App\Services\PeopleService;
use App\Services\PlaceService;
use App\Services\SQLService;
use App\Services\TemplateService;
use PDO;

class ContainerController
{
    private PeopleService $peopleService;
    private PlaceService $placeService;
    private TemplateService $templateService;

    public function __construct()
    {
        $pdo = new SQLService();
        $this->placeService = new PlaceService($pdo->getPdo());
        $this->peopleService = new PeopleService($pdo->getPdo());
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
    public function getProfileRequest(bool $sign,array $data): string
    {
        if ($sign){
            $this->signUp($data);
            $this->signIn($data['email'], $data['password']);
        }
        else{
            $this->signIn($data['email'], $data['password']);
        }
        return $this->templateService->render('pages/servicesPage', ["servicesNavBar" => 1,"footer" => 1]);
    }

    private function signUp($data): void{
        $countryId = $this->placeService->getOneCountry($data['country']);
        $this->peopleService->insertClient($data['name'], $data['email'], $countryId['country_id'], $data['surname'], $data['address'], $data['phone_number']);
    }
    private function signIn(string $mail, string $password): array{
        $data = $this->peopleService->getOneClientByEmail($mail);
        return $data['password'] === password_hash($password, PASSWORD_DEFAULT) ? $data : [];
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