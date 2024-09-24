<?php

namespace App\Models;

class Contents extends Model
{
    protected int $post_id;
    protected string $thumb;
    protected string $details;
    protected string $text;
    protected array $medias;
    protected string $vimeo_id;
    protected string $url;

    public function __construct()
    {
        parent::__construct();
        $this->table = "contents";
    }

    // Getters & setters ******************************
    public function getPost_id()
    {
        return $this->post_id;
    }

    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;

        return $this;
    }

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

    public function getMedias()
    {
        return $this->medias;
    }

    public function setMedias($medias)
    {
        $this->medias = $medias;

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

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    // Methods ******************************
    public function find($id)
    {
        $query = $this->host->prepare("
            SELECT *
            FROM {$this->table}
            WHERE post_id = :id;
        ");
        $query->bindValue(":id", $id);
        $query->execute();
        $content = $query->fetch();
        if ($content->medias) {
            $content->medias = json_decode($content->medias);
        }
        return $content;
    }
}
