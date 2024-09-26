<?php

namespace App\Models;

class Posts extends Model
{
    protected int $id;
    protected int $author_id;
    protected string $title;
    protected int $type_id;
    // protected string $type;
    protected bool $status;
    protected string $creation_date;
    protected string $modification_date;
    protected Contents $content;

    public function __construct()
    {
        parent::__construct();
        $this->table = "posts";
        $this->content = new Contents();
    }

    // Getters & setters ******************************
    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAuthor_id(): int
    {
        return $this->author_id;
    }

    public function setAuthor_id($author_id): self
    {
        $this->author_id = $author_id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType_id(): int
    {
        return $this->type_id;
    }

    public function setType_id($type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreation_date(): string
    {
        return $this->creation_date;
    }

    public function getModification_date(): string
    {
        return $this->modification_date;
    }

    public function setModification_date($modification_date): self
    {
        $this->modification_date = $modification_date;

        return $this;
    }

    // Methods
    public function findLasts(int $n): array
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            ORDER BY creation_date DESC
            LIMIT :n;
        ");

        $query->bindValue(":n", $n, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
}
