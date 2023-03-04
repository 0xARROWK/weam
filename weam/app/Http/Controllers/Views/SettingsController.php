<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Allows to display the pages relating to the account of the logged in user
     *
     * @return View
     */
    public function index(): View
    {
        return view('settings');
    }
}
