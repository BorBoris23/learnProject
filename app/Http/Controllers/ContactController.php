<?php

namespace App\Http\Controllers;

use App\Models\Appeal;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required',
            'appealText' => 'required',
        ]);

        Appeal::create(request()->all());

        return redirect('/');
    }
}
