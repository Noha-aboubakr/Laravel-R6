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
   
        
        function uploadForm() {
                return view('upload');
        }

        public function upload(Request $request) {
           $file_extension= $request->image->getClientOriginalExtension();
           $file_name= time(). '.' . $file_extension;
           $path='assets/images';
           $request->image->move($path, $file_name); 
           return 'uploaded'  ;
        }
}

// Route::get('contactus', function () {
// return view('contactus');
// });  

// Route::post('contact_us', function (\Illuminate\Http\Request $request) {  
//     $name = $request->input('name');
//     $email = $request->input('email');  
//     $subject = $request->input('subject');  
//     $message = $request->input('message');  
//     return 'username: ' . $name . "<br>" . ' email: ' . $email . "<br>" . ' subject: ' . $subject . "<br>" . ' message: ' . $message;  
// })->name('contact_us'); 





//session8


