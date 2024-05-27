<?php

namespace Core;

class View {
    public function render($view, $args = null) {
        $data = $args;
        require_once __DIR__.'/../src/views/'.$view.'.php';
    }
}