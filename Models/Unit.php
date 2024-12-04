<?php

declare(strict_types=1);

namespace Entities;

class Unit
{
    private ?string $id;
    private string $name;
    private float $cost;
    private string $origin;
    private string $url_img;

    public function __construct()
    {
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getCost(): float { return $this->cost; }
    public function getOrigin(): string { return $this->origin; }
    public function getUrlImg(): string { return $this->url_img; }

    // Setters
    public function setId(string $id): void { $this->id = $id; }
    public function setName(string $name): void { $this->name = $name; }
    public function setCost(float $cost): void { $this->cost = $cost; }
    public function setOrigin(string $origin): void { $this->origin = $origin; }
    public function setUrlImg(string $url_img): void { $this->url_img = $url_img; }
}
