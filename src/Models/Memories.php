<?php

namespace App\Models;

class Memories extends Posts
{
    public function __construct()
    {
        parent::__construct();
        $this->type = "memories";
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
        $memories = $query->fetchAll();

        foreach ($memories as $memory) {
            $memory->content = $this->content->find($memory->id);
        }

        return $memories;
    }
}
