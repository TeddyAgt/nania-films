<?php

namespace App\Models;

use App\Tools\Host;

class Model extends Host
{
    protected string $table;
    protected Host $host;

    public function __construct()
    {
        $this->host = Host::getInstance();
    }

    public function find($id)
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            WHERE id = :id;
        ");
        $query->bindValue(":id", $id);
        $query->execute();
        return $query->fetch();
    }

    public function findAll()
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table};
        ");
        $query->execute();
        return $query->fetchAll();
    }

    public function create()
    {
        $keys = [];
        $placeholders = [];
        $values = [];

        foreach ($this as $key => $value) {
            if ($value !== null && $key !== "host" && $key !== "table") {
                $keys[] = $key;
                $placeholders[] = ":$key";
                $values[] = $value;
            }
        }

        $keysList = implode(", ", $keys);
        $placeholdersList = implode(", ", $placeholders);

        $query = $this->host->prepare("
            INSERT INTO {$this->table} ($keysList)
            VALUES ($placeholdersList);
        ");

        foreach ($placeholders as $p) {
            $query->bindValue($p, array_shift($values));
        }

        $query->execute();
        return $this->host->lastInsertId();
    }

    public function update()
    {
        $keys = [];
        $placeholders = [];
        $values = [];

        foreach ($this as $key => $value) {
            if ($value !== null && $key !== "host" && $key !== "table") {
                $keys[] = "$key = :$key";
                $placeholders[] = ":$key";
                $values[] = $value;
            }
        }
        $keysList = implode(", ", $keys);

        $query = $this->host->prepare("
            UPDATE {$this->table}
            SET $keysList
            WHERE id = {$this->id};
        ");

        foreach ($placeholders as $p) {
            $query->bindValue($p, array_shift($values));
        }
        $query->execute();
    }

    public function delete($id): bool
    {
        $query = $this->host->prepare("
            DELETE FROM {$this->table}
            WHERE id = :id;
        ");
        $query->bindValue(":id", $id);
        return $query->execute();
    }

    public function hydrate($data): self
    {
        foreach ($data as $key => $value) {
            $setter = "set" . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
        return $this;
    }
}
