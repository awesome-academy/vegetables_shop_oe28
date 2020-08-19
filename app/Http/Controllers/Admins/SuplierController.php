<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuplierRequest;
use App\Http\Requests\UpdateSuplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supliers = Supplier::all();

        return view('admin.supliers.index', compact('supliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuplierRequest $request)
    {
        Supplier::create($request->all());

        return redirect()->route('supliers.index')->with('success', trans('messages.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supliers = Supplier::findOrFail($id);

        return view('admin.supliers.edit', compact('supliers'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuplierRequest $request, $id)
    {
        $suplier = Supplier::findOrFail($id);
        $suplier->update($request->all());

        return redirect()->route('supliers.index')->with('success', trans('messages.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suplier = Supplier::findOrFail($id);
        $suplier->delete();

        return redirect()->route('supliers.index')->with('success', trans('messages.delete_success'));
    }
}
