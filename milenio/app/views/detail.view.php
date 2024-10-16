<?php

class DetailsView {
    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showDetail($libro) {
        require 'templates/detail.phtml';
    }

    public function showError($error) {
        require 'templates/layout/error.phtml';
    }
}