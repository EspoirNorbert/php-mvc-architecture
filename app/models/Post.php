<?php

namespace App\Models;

/***
 * Post Model
 */
class Post
{

    private  $id;
    private  $title;
    private  $content;
    private  $date;

    public function __construct(int $_id = null, string $_title = null, string $_content = null, string $_date = null)
    {
        $this->id = $_id;
        $this->title = $_title;
        $this->content = $_content;
        $this->date = $_date;
    }

    /**
     * Getters and setters
     */
    public function getId(): ?int
    {
        return  $this->id;
    }
    public function setId(int $id): int
    {
        return  $this->id = $id;
    }
    public function getTitle(): string
    {
        return  $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title  = $title;
    }
    public function getContent(): string
    {
        return  $this->title;
    }
    public function setContent(string $content)
    {
        $this->content  = $content;
    }
    public function getDate(): string
    {
        return  $this->date;
    }
    public function setDate(string $date)
    {
        $this->date  = $date;
    }

    public function hydrate(array $data)
    {
        if (isset($data['post_id'])) $this->setId(intval($data['post_id']));
        if (isset($data['title'])) $this->setTitle($data['title']);
        if (isset($data['content'])) $this->setContent($data['content']);
        if (isset($data['creation_date'])) $this->setDate($data['creation_date']);
    }
}
