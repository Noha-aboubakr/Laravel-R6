<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\classe;

use function Pest\Laravel\post;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $classname= $request->input('classname');
        $capacity= $request->input('capacity');
        $price= $request->input('price');
        $timefrom= $request->input('timefrom');
        $timeto= $request->input('timeto');

        $isfulled= $request->input('isfulled');
        if($isfulled) {
			$isfulled= 1;
			}else {
				$isfulled = 0; 
			}

        Classe::create([
            'classname'=> $classname,
            'capacity'=> $capacity,
            'price'=> $price,
            'timefrom'=> $timefrom,
            'timeto'=> $timeto,
            'isfulled'=> $isfulled, 

        ]); 

    return "Data inserted";

}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
