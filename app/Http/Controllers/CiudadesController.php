<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadesStoreRequest;
use App\Http\Requests\CiudadesUpdateRequest;

class CiudadesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Ciudades::class);

        $search = $request->get('search', '');

        $allCiudades = Ciudades::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.all_ciudades.index', compact('allCiudades', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Ciudades::class);

        return view('app.all_ciudades.create');
    }

    /**
     * @param \App\Http\Requests\CiudadesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CiudadesStoreRequest $request)
    {
        $this->authorize('create', Ciudades::class);

        $validated = $request->validated();

        $ciudades = Ciudades::create($validated);

        return redirect()
            ->route('all-ciudades.edit', $ciudades)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ciudades $ciudades
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $ciudades)
    {
        $ciudades = Ciudades::where('id', $ciudades)->first();
        $this->authorize('view', $ciudades);

        return view('app.all_ciudades.show', compact('ciudades'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ciudades $ciudades
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $ciudades)
    {
        $ciudades = Ciudades::where('id', $ciudades)->first();
        $this->authorize('update', $ciudades);
        return view('app.all_ciudades.edit', compact('ciudades'));
    }

    /**
     * @param \App\Http\Requests\CiudadesUpdateRequest $request
     * @param \App\Models\Ciudades $ciudades
     * @return \Illuminate\Http\Response
     */
    public function update(CiudadesUpdateRequest $request, $ciudades)
    {
        $ciudades = Ciudades::where('id', $ciudades)->first();
        $this->authorize('update', $ciudades);

        $validated = $request->validated();

        $ciudades->update($validated);

        return redirect()
            ->route('all-ciudades.edit', $ciudades)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ciudades $ciudades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $ciudades)
    {
        $ciudades = Ciudades::where('id', $ciudades)->first();
        $this->authorize('delete', $ciudades);

        $ciudades->delete();

        return redirect()
            ->route('all-ciudades.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
