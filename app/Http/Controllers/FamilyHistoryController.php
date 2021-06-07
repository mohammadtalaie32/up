<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FamilyHistory;
use App\Http\Requests;

class FamilyHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demo.familyhistory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([ 
        'Mother'    => implode(',', (array) $request->get('Mother')),
        'Father'    => implode(',', (array) $request->get('Father')),
        'Sisters'   => implode(',', (array) $request->get('Sisters')),
        'Brothers'  => implode(',', (array) $request->get('Brothers')),
        'Children'  => implode(',', (array) $request->get('Children')),
        ]);

        FamilyHistory::create($request->all());
        return redirect()->route('demo')
            ->with('success','Family History Of Patient has been added successfully!.');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
