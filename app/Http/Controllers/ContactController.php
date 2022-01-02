<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts() {
        $contacts = Contact::all();
        return response()->json(['contacts' => $contacts, 'message' => 'Contacts', 'code' => 200]);
    }
}
