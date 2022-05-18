<?php

namespace App\Http\Controllers;

use App\Models\Appeal;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function show(Appeal $appeal)
    {
        $appeals = (new Appeal)::getAllAppeals();

        return view('admin.feedback', compact('appeals'));
    }
}
