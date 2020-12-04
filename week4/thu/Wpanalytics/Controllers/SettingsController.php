<?php

namespace Wpanalytics\Controllers;

/**
 * Class SecurityController
 * 
 * @package \Wpanalytics;
 */
class SettingsController extends BaseController {

    public function settings() {
        $this->loadview('settings', ['title' => 'Wpanalytics-Settings']);
    }

    public function security() {
        $this->loadview('security', ['title' => 'Wpanalytics-Security']);
    }

    public function token() {
        $this->loadview('token', ['title' => 'Wpanalytics-Token']);
    }

    public function connect() {
        $this->loadview('connect-website', ['title' => 'Wpanalytics-Connect_Website']);
    }
}