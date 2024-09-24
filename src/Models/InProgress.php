<?php

namespace App\Models;

class InProgress extends Posts
{
    public function __construct()
    {
        parent::__construct();
        $this->type = "inProgress";
    }

    // Methods ******************************
    public function findLasts(int $n): array
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            WHERE {$this->table}.type = '{$this->type}'
            ORDER BY creation_date DESC
            LIMIT :n;
        ");

        $query->bindValue(":n", $n, \PDO::PARAM_INT);
        $query->execute();
        $news = $query->fetchAll();

        foreach ($news as $n) {
            $n->content = $this->content->find($n->id);
        }

        return $news;
    }
}
