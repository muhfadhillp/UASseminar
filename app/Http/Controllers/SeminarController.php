<?php

namespace App\Http\Controllers;

use App\Models\seminar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminar = seminar::paginate(10);
        return view('seminar.index', ['seminar' => $seminar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seminar.create');
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
            'nama_seminar' => ['required', 'string', 'max:255'],
        ]);
        $data = $request->all();
        seminar::create($data);
        return redirect('/seminar');
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
        return view('seminar.edit', ['seminar' => seminar::find($id)]);
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
        $request->validate([
            'nama_seminar' => ['required', 'string', 'max:255'],
        ]);
        $data = $request->all();
        $seminar = seminar::find($id);
        $seminar->update($data);
        return redirect('/seminar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seminar = seminar::find($id);
        $seminar->delete();
        return redirect('/seminar');
    }
}
