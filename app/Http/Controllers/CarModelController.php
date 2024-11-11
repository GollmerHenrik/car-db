<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("carModel/list",["entities"=>CarModel::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            //TODO: validate, whether idMaker exists
        ]);
        $carModel=new CarModel();
        $carModel->name=$request->name;
        $carModel->idMaker=$request->idMaker;

        $carModel->save();
        return request()->route("carModels")->with("success", "car model created");
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
        return view("carModel/edit",["resource"=>carModel::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            //TODO: validate, whether idMaker exists
        ]);
        $carModel=CarModel::findOrFail($id);
        $carModel->name=$request->name;
        $carModel->idMaker=$request->idMaker;

        $carModel->save();
        return request()->route("carModels")->with("success", "car model edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carModel=CarModel::findOrFail($id);
        $carModel->delete();

        return redirect()->route("carModels")->with("success","carmodel törölve");
    }
}
