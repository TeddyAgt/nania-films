<?php

namespace App\Models;

class Productions extends Posts
{

    protected string $thumb;
    protected string $details;
    protected string $text;
    protected string $vimeo_id;
    protected array $medias;


    public function __construct()
    {
        parent::__construct();
        $this->type = "productions";
    }

    // Getters & setters ******************************
    public function getThumb()
    {
        return $this->thumb;
    }

    public function setThumb($thumb)
    {
        $this->thumb = $thumb;

        return $this;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;

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

    public function getVimeo_id()
    {
        return $this->vimeo_id;
    }

    public function setVimeo_id($vimeo_id)
    {
        $this->vimeo_id = $vimeo_id;

        return $this;
    }

    public function getMedias()
    {
        return $this->medias;
    }

    public function setMedias($medias)
    {
        $this->medias = $medias;

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
        return $query->fetchAll();
    }
}
