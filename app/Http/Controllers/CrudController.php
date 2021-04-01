<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = crud::all();

        return view('crud.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|max:255',
        ]);

        crud::create($data);

        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        return redirect()->route('crud.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud $crud)
    {
        $data = $request->validate([
            'text' => 'required|max:255',
        ]);

        // $crud->where('id', $data['id'])->update(['text' => $data['text']]);

        $crud->update($data);

        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud)
    {
        $crud->delete();

        return redirect()->route('crud.index');
    }
}
