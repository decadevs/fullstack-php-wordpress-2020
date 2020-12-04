<?php

namespace Wpanalytics;

class Application {
    public function mount() {
        $router = new Router();

        $router->executeUrl();
    }
}