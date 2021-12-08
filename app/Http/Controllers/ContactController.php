<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('visitors.pages.contact');
    }

    public function store(Request $request) {
        $contact = Contact::create($request->all());
        return response()->json(['message' => 'success']);
    }   
}
