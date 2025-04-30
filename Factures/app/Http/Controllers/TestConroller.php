<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Keep this if you might need request data later
use Illuminate\View\View; // Import the View class if returning a view

class TestConroller extends Controller // Typo: Usually "TestController"
{
    /**
     * Display a simple test message.
     *
     * @return string // Option 1: Return a simple string
     */
    public function showMessage(): string
    {
        $message = "Hello! This is a test message from TestConroller.";
        return $message;
    }

    /**
     * Display a test message using a Blade view.
     *
     * @return \Illuminate\View\View // Option 2: Return a view
     */
    // public function showMessageWithView(): View
    // {
    //     $message = "Hello! This message is displayed using a Blade view.";
    //     // Assumes you have a view file at: resources/views/test/message.blade.php
    //     return view('test.message', ['messageContent' => $message]);
    // }
}