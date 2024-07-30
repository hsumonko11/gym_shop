<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        return view('fronts.layouts.contact');
    }

    public function store(Request $request){
        $request->validate([
            "email" => "required",
            "note" => "required"
        ]);

        $contact = new Contact;
        $contact->email = $request->email;
        $contact->note = $request->note;
        $contact->save();

        return back()->with('success','Message sent successfully.');
    }
}
