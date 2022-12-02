<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index() {
        $this->render('/main/index');
    }

    public function strooper() {
        $this->render('/main/strooper');
    }
}