<?php

namespace Wpanalytics;

class Application {
    public function mount() {
        return new Router();
    }
}