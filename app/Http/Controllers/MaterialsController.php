<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $materials = Material::paginate(5);
        return view('materials.index', [
            'materials' => $materials,
        ]);
    }

    public function deleted() : View
    {
        $materials = Material::onlyTrashed()->get();

        return view('materials.deleted', [
            'materials' => $materials,
        ]);
    }

    public function restore(int $id)
    {
        Material::onlyTrashed()->find($id)->restore();

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('materials.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        Material::create([
            'title' => $request->get('title'),
        ]);
        return redirect()->route('materials.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): View
    {
        $material = Material::find($id);
        return view('materials.edit', [
            'material' => $material
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        Material::where('id', $id)->update([
            'title' => $request->get('title')
        ]);
        return redirect()->route('materials.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        Material::destroy($id);
        return redirect()->back();
    }
}
