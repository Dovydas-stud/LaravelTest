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
        // $data = [
        //     "Welcome to page \"crud\"",
        //     "Back home"
        // ];

        $data = collect([
            "cruds"   => crud::all()
        ]);

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

        // $data = collect([
        //     "cruds"   => crud::all()
        // ]);

        // return view('crud.index', compact('data'));
        // return redirect()->route('crud', compact('data'));

        return redirect()->route('crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        return redirect()->route('crud');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(crud $crud, $id)
    {
        $text = $crud->where('id', '=', $id)->get()[0]->text;

        return view('crud.edit', compact('text', 'id'));
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
            'id'   => 'required|numeric'
        ]);

        $crud->where('id', $data['id'])->update(['text' => $data['text']]);

        return redirect()->route('crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud, $id)
    {
        $crud->where('id', $id)->delete();

        return redirect()->route('crud');
    }
}
