<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;

class CarController extends Controller
{
    use common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //session 5
        $cars = Car::get();
        return view('cars', compact('cars'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
                'cartitle'=> 'required|string',
                'price'=> 'required|numeric',     //or decimal
                'description'=> 'required|string|max:1000',    
                'image'=> 'required|mimes:png,jpg,jpeg',            
        ]);

        $data['image']= $this->uploadFile($request->image, 'assets/new/images/cars');
        $data['published']=isset($request->published);
       

        Car::create($data);
        return redirect()->route('cars.index');



        // $cartitle= $request->input('cartitle');
        // $price= $request->input('price');
        // $description= $request->input('description');

        // $published= $request->input('published');
        // if($published) {
		// 	$published= 1;
		// 	}else {
		// 		$published = 0; 
		// 	}


        // // Car::create([
        // //     'cartitle'=> $cartitle,
        // //     'price'=> $price,
        // //     'description'=> $description,
        // //     'published'=> $published, 

        // ]);

        // return redirect()->route('cars.index');
    }


    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car= car::findOrFail($id);
        return view ('car_details', compact('car'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car= car::findOrFail($id);
        return view ('edit_car', compact('car'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request,$id);

        $data = $request->validate([
            'cartitle'=> 'required|string',
            'price'=> 'required|numeric',     //or decimal
            'description'=> 'required|string|max:1000',
            'image'=> 'nullable|mimes:png,jpg,jpeg', 
    ]);

    if ($request->hasFile('image')) { 
  $data['image']= $this->uploadFile($request->image, 'assets/new/images/cars');
    }

    $data['published']=isset($request->published);
    // dd($data);

       Car::where('id', $id)->update($data);
        return redirect()->route('cars.index');


        // $data = [
        //     'cartitle'=> $request->cartitle,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'published' => isset ($request->published),

        // ];

        // Car::where('id', $id)->update($data);

        // return redirect()->route('cars.index');
    
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect()->route('cars.index');
    }



    public function showDeleted()
    {
      $cars= Car::onlyTrashed()->get();
    
        return view('trashedCars', compact('cars'));
    }



    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
    
        return redirect()->route('cars.showDeleted');
    }




    public function forceDelete(Request $request):RedirectResponse
    {
        $id=$request->id;
        Car::where('id', $id)->forceDelete();
        return redirect()->route('cars.index');  
    }

}
