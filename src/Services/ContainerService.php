<?php

namespace App\Services;
use App\Model\ContainerModel;
use Exception;
use PDO;
class ContainerService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM posts");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];
        foreach ($data as $postData) {
            $posts[] = PostModel::fromArray($postData);
        }

        return $posts;
    }

    public function getOne(string $id): PostModel
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $postData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $postData ? PostModel::fromArray($postData) : PostModel::emptyPostModel();
    }

    public function create(PostModel $post): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content, date, is_edited, image_name) VALUES (:title, :content, :date, :is_edited, :image_name)");
        $stmt->execute($post->toArray());
    }

    public function update(string $id, array $data): void
    {
        if (empty($data['image_name'])) {
            $data['image_name'] = $this->getOne($id)->image_name;
        }
        $stmt = $this->pdo->prepare("UPDATE posts SET title = :title, content = :content, is_edited = 1, image_name = :image_name, date = :date WHERE id = :id");
        $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'content' => $data['content'],
            'date' => date('Y-m-d H:i:s'),
            'image_name' => $data['image_name']
        ]);
    }

    public function delete(string $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function generateImageHash(string $name): string
    {
        return hash('sha256', uniqid('', true) . pathinfo($name, PATHINFO_FILENAME)) . '.' . pathinfo($name, PATHINFO_EXTENSION);
    }
}