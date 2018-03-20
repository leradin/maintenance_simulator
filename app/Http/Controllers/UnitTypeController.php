<?php

namespace App\Http\Controllers;

use App\UnitType;
use App\IpAddress;
use Illuminate\Http\Request;
use Lang;

class UnitTypeController extends Controller
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
        $unitTypes = UnitType::with('ipAddress')->get();
        return view('catalog.unitType.index',['unitTypes' => $unitTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.unitType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $ipAddress = IpAddress::create(['ip' => $request->ip]);

        $unitType = UnitType::create(['name' => $request->name,
                                      'abbreviation' => $request->abbreviation,
                                      'ip_address_id' => $ipAddress->id]);

        //$unitType->ipAddress()->save($ipAddress);

        $unitType = $unitType::with('ipAddress')->find($unitType->id);
        if($request->ajax()){
            return \Response::json($unitType);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_unit_type');
        return redirect('/unit_type')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function show(UnitType $unitType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitType $unitType)
    {
        return view('catalog.unitType.edit',['unitType' => $unitType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitType $unitType)
    {
        if (IpAddress::where('ip',$request->ip)->exists()) {
            $ipAddress = IpAddress::where('ip',$request->ip)->get();
        }else{
            $ipAddress = IpAddress::create(['ip' => $request->ip]);
        }

        $unitType->fill(['name' => $request->name,
                         'abbreviation' => $request->abbreviation,
                         'ip_address_id' => $ipAddress->id]);
        $unitType->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_unit_type');
        return redirect('/unit_type')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitType $unitType)
    {
        try{
            $unitType->delete();
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.remove_unit_type');
            return redirect('/unit_type')->with('message',$message);
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_delete_unit_type');
            return redirect('/unit_type')->with('message',$message);
        }
    }
}
