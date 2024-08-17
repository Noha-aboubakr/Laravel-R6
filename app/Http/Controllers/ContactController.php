<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail; 
use App\Mail\ContactMessage; 
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactindex()
    {
        return view('contact');
    }

    
    public function submit(Request $request)  
    {  
        $data = $request->validate([  
            'name' => 'required|string|max:100',  
            'email' => 'required|email|max:100', 
            'subject'=>'required|string|max:100',
            'message' => 'required|string',   
        ]);  
        // dd($data); 

          Mail::to('hello@example.com')->send(new ContactMessage($data));   
         
}  
    }