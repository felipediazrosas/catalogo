<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductosStoreRequest;
use App\Http\Requests\ProductosUpdateRequest;

class ProductosController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Productos::class);

        $search = $request->get('search', '');

        $allProductos = Productos::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_productos.index',
            compact('allProductos', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Productos::class);

        $allCiudades = Ciudades::get();

        return view('app.all_productos.create', compact('allCiudades'));
    }

    /**
     * @param \App\Http\Requests\ProductosStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosStoreRequest $request)
    {
        $this->authorize('create', Productos::class);

        $validated = $request->validated();
        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('public');
        }

        $productos = Productos::create($validated);
        foreach($request->cantidad as $id_cant=> $cant){
            if(isset($request->allCiudades[$id_cant])){
                $attach[$request->allCiudades[$id_cant]] = [ 'cantidad'=> $cant];
            }
        }
        
        $productos->allCiudades()->attach($attach);
        //$productos->allCiudades()->attach($request->allCiudades);

        return redirect()
            ->route('all-productos.edit', $productos)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $productos)
    {
        $productos = Productos::where('id', $productos)->first();
        $this->authorize('view', $productos);

        return view('app.all_productos.show', compact('productos'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $productos)
    {
        $productos = Productos::where('id', $productos)->first();
        $this->authorize('update', $productos);

        $allCiudades = Ciudades::get();

        return view(
            'app.all_productos.edit',
            compact('productos', 'allCiudades')
        );
    }

    /**
     * @param \App\Http\Requests\ProductosUpdateRequest $request
     * @param \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function update(
        ProductosUpdateRequest $request,
        $productos
    ) {
        $productos = Productos::where('id', $productos)->first();
        $this->authorize('update', $productos);

        $validated = $request->validated();
        if ($request->hasFile('imagen')) {
            if ($productos->imagen) {
                Storage::delete($productos->imagen);
            }

            $validated['imagen'] = $request->file('imagen')->store('public');
        }

        foreach($request->cantidad as $id_cant=> $cant){
            if(isset($request->allCiudades[$id_cant])){
                $update[$request->allCiudades[$id_cant]] = [ 'cantidad'=> $cant];
            }
        }

        $productos->allCiudades()->sync($update);

        $productos->update($validated);

        return redirect()
            ->route('all-productos.edit', $productos)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $productos)
    {
        $productos = Productos::where('id', $productos)->first();
        $this->authorize('delete', $productos);

        if ($productos->imagen) {
            Storage::delete($productos->imagen);
        }

        $productos->delete();

        return redirect()
            ->route('all-productos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
