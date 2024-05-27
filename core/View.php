<?php

namespace Core;

class View {
    public function render($view, $data = null) {
        require_once __DIR__.'/../src/views/'.$view.'.php';
    }
}