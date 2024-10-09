<?php

namespace App\Models;

class Memories extends Posts
{
    public function __construct()
    {
        parent::__construct();
        $this->type_id = 3;
    }

    // Methods ******************************
    public function findAll(bool $active = false): array
    {
        $filter = $active ? "AND status = 1" : "";
        $query = $this->host->prepare("
        SELECT *
        FROM {$this->table}
        WHERE type_id = {$this->type_id}
        $filter;
    ");

        $query->execute();
        $memories = $query->fetchAll();

        foreach ($memories as $memory) {
            $memory->content = $this->content->find($memory->id);
        }

        return $memories;
    }

    public function findLasts(int $n): array
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            WHERE {$this->table}.type_id = '{$this->type_id}'
            ORDER BY creation_date DESC
            LIMIT :n;
        ");

        $query->bindValue(":n", $n, \PDO::PARAM_INT);
        $query->execute();
        $memories = $query->fetchAll();

        foreach ($memories as $memory) {
            $memory->content = $this->content->find($memory->id);
        }

        return $memories;
    }
}
