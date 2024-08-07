<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classe;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;

use function Pest\Laravel\post;


class ClassController extends Controller
{
    use common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = classe::get();
        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_classe');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // dd($request);
           $data = $request->validate([
            'classname'=> 'required|string',
            'capacity'=> 'required|numeric', 
            'price'=> 'required|decimal:0,2',
            'timefrom'=>'required|date_format:H:i:s',
            'timeto'=> 'required|date_format:h:i:s|after:timefrom', 
            'image'=> 'required|mimes:png,jpg,jpeg',                
    ]);

    // $file_extension= $request->image->getClientOriginalExtension();
    // $file_name= time(). '.' . $file_extension;
    // $data['image']=$file_name;
    // $path='assets/images';
    // $request->image->move($path, $file_name); 

    $data['image']= $this->uploadFile($request->image, 'assets/images');
    $data['isfulled']=isset($request->isfulled);
    // dd($data);
   
    Classe::create($data);
    return redirect()->route('classes.index');

    //     $classname= $request->input('classname');
    //     $capacity= $request->input('capacity');
    //     $price= $request->input('price');
    //     $timefrom= $request->input('timefrom');
    //     $timeto= $request->input('timeto');
    //     $isfulled= $request->input('isfulled');
    //     if($isfulled) {
	// 		$isfulled= 1;
	// 		}else {
	// 			$isfulled = 0; 
	// 		}

    //     Classe::create([
    //         'classname'=> $classname,
    //         'capacity'=> $capacity,
    //         'price'=> $price,
    //         'timefrom'=> $timefrom,
    //         'timeto'=> $timeto,
    //         'isfulled'=> $isfulled, 

    //     ]); 

    // // return "Data inserted";
    // return redirect()->route('classes.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classe= classe::findOrFail($id);
        return view ('classe_details', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classe= classe::findOrFail($id);
        return view ('edit_classe', compact('classe'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request,$id);
        $data = $request->validate([
            'classname'=> 'required|string',
            'capacity'=> 'required|numeric', 
            'price'=> 'required|decimal:0,2',
            'timefrom'=>'required',
            'timeto'=> 'required|after:timefrom', 
            'image'=> 'nullable|mimes:png,jpg,jpeg',              
    ]);

    if ($request->hasFile('image')) { 
    // $file_extension= $request->image->getClientOriginalExtension();
    // $file_name= time(). '.' . $file_extension;
    // $data['image']=$file_name;
    // $path='assets/images';
    // $request->image->move($path, $file_name); 

    $data['image']= $this->uploadFile($request->image, 'assets/images');
    }
    $data['isfulled']=isset($request->isfulled);
    // dd($data);

    classe::where('id', $id)->update($data);
    return redirect()->route('classes.index');

        
        // $data = [
        //     'classname'=> $request->classname,
        //     'Capacity' => $request->capacity,
        //     'price' => $request->price,
        //     'timefrom' => $request->timefrom,
        //     'timeto' => $request->timeto,
        //     'isfulled' => isset ($request->isfulled),
        // ];
        // classe::where('id', $id)->update($data);
        // return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        classe::where('id', $id)->delete();
        // return "data deleted";
        return redirect()->route('classes.index');  
    }

    public function showDeleted()
    {
      $classes= classe::onlyTrashed()->get();
        return view('trashedClasses', compact('classes'));
    }

    
    public function restore(string $id)
    {
        classe::where('id', $id)->restore();
        return redirect()->route('classes.showDeleted');
    }

    public function forceDelete(Request $request):RedirectResponse
    {
        $id=$request->id;
        classe::where('id', $id)->forceDelete();
        return redirect()->route('classes.showDeleted');  
    }
}
