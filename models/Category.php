<?php

class Category
{
    private ?int $id_category;
    private string $name;

    public function __construct(string $name = '', ?int $id_category = null)
    {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    public function getAll()
    {
        $category = $this->id_category;
        $name = $this->name;
        return [$category, $name];
    }

    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;
    }

    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
