<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lector;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lector = Lector::All();
        return view('lector.index', compact('lector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name'  => 'required', 
            'last_name'   => 'required',
        ]);

        $lector = Lector::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        // $lectors = Lector::All();

        return redirect('/lector')->with('success', 'Data Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lector = Lector::find($id);

        return view('lector.edit', compact('lector', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name'  => 'required', 
            'last_name'   => 'required',
        ]);

        $lector = Lector::find($id);

        $lector->first_name = $request->get('first_name');
        $lector->last_name = $request->get('last_name');

        $lector->save();
        return redirect()->route('lector.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lector = Lector::find($id);

        $lector->delete();
        return redirect()->route('lector.index')->with('success', 'Data Deleted');
    }
}
