<?php

namespace Controllers;

class MainController
{
    private $engine;

    public function index(): void
    {
        echo $this->engine->render('home', ['tftSetName' => 'Remix Rumble']);
    }

    /**
     * Constructeur de la classe MainController
     */
    public function __construct()
    {
        $this->engine = new \League\Plates\Engine(__DIR__ . "/../Views");
    }
}
