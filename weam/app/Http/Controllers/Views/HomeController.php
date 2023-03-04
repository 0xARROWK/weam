<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Allows to display the home page and application pages that do not require identification
     *
     * @return View
     */
    public function index(): View
    {
        return view('home');
    }
}
