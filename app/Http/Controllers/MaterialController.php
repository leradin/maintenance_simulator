<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Lang;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('catalog.material.index',['materials' => $materials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = Material::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($material);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_material');
        return redirect('/material')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        return view('catalog.material.edit',['material' => $material]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $material->fill($request->except(['_token']));
        $material->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_material');
        return redirect('/material')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_material');
        return redirect('/material')->with('message',$message);
    }
}
