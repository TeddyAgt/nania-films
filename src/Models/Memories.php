<?php

namespace App\Models;

class Memories extends Posts
{
    protected array $medias;
    protected string $text;

    public function __construct()
    {
        parent::__construct();
        $this->type = "memories";
    }

    // Getters & setters ******************************
    public function getMedia()
    {
        return $this->medias;
    }

    public function setMedia($medias)
    {
        $this->medias = $medias;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    // Methods ******************************
    public function findLasts(int $n): array
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            JOIN contents ON {$this->table}.id = contents.post_id
            WHERE {$this->table}.type = '{$this->type}'
            ORDER BY creation_date DESC
            LIMIT :n;
        ");

        $query->bindValue(":n", $n, \PDO::PARAM_INT);
        $query->execute();
        $memories = $query->fetchAll();
        foreach ($memories as $memory) {
            $memory->medias = json_decode($memory->medias);
        }
        return $memories;
    }
}
