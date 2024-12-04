<?php

namespace Models;

class Unit
{
    private string $id;
    private string $name;
    private int $cost;
    private string $origin;
    private string $url_img;

    // Le constructeur initialise toutes les propriétés
    public function __construct(string $id, string $name, int $cost, string $origin, string $url_img)
    {
        $this->id = $id;  // Initialisation de la propriété $id
        $this->name = $name;
        $this->cost = $cost;
        $this->origin = $origin;
        $this->url_img = $url_img;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function getUrlImg(): string
    {
        return $this->url_img;
    }
}
