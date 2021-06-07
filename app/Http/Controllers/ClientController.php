<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$records = DB::select('select * from clients');
        //return view('demo.index',['records'=>$records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('demo.addclient');
        $records = DB::select('select * from clients');
        return view('demo.addclient',['records'=>$records])
            ->with('success','Client has been adddd!.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            //'first_name' =>'required',
            //'last_name' => 'required',
            //'phone'     => 'required',
            //'email'     => 'required',

        ]);
        if (!$request->has('invite_code')) {
            $invite_code = str_random(8);
            $request->request->add(['invite_code' =>($invite_code)]);
        }

        Client::create($request->all());
            return redirect()->route('client.create');
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
