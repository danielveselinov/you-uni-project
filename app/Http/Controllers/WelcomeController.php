<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $reviews = Review::latest('id')
            ->get();

        return view('welcome', compact('reviews'));
    }
}
