<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
 function contactus() {
        return view('contactus');
        }
        
function contact_us(\Illuminate\Http\Request $request) {  
            $name = $request->input('name');
            $email = $request->input('email');  
            $subject = $request->input('subject');  
            $message = $request->input('message');  
            return 'username: ' . $name . "<br>" . ' email: ' . $email . "<br>" . ' subject: ' . $subject . "<br>" . ' message: ' . $message;  
        }
        
}
