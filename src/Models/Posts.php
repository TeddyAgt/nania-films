<?php

namespace App\Models;

class Posts extends Model
{
    protected int $id;
    protected int $author_id;
    protected string $title;
    protected string $type;
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
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getAuthor_id()
    {
        return $this->author_id;
    }

    public function setAuthor_id($author_id)
    {
        $this->author_id = $author_id;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getCreation_date()
    {
        return $this->creation_date;
    }

    public function getModification_date()
    {
        return $this->modification_date;
    }

    public function setModification_date($modification_date)
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
