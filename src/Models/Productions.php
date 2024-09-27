<?php

namespace App\Models;

class Productions extends Posts
{

    public function __construct()
    {
        parent::__construct();
        $this->type_id = 1;
    }

    // Methods ******************************
    public function findLasts(int $n): array
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            WHERE {$this->table}.type_id = {$this->type_id}
            ORDER BY creation_date DESC
            LIMIT :n;
        ");

        $query->bindValue(":n", $n, \PDO::PARAM_INT);
        $query->execute();
        $productions = $query->fetchAll();

        foreach ($productions as $production) {
            $production->content = $this->content->find($production->id);
        }

        return $productions;
    }

    public function findByPage(int $page)
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            WHERE {$this->table}.type_id = {$this->type_id}
            ORDER BY creation_date DESC
            LIMIT 5 OFFSET :page;
        ");

        $query->bindValue(":page", ($page * 5) - 5, \PDO::PARAM_INT);
        $query->execute();
        $productions = $query->fetchAll();

        foreach ($productions as $production) {
            $production->content = $this->content->find($production->id);
        }

        return $productions;
    }
}
