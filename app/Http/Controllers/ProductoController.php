<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producto = Producto::orderBy('id','ASC')->paginate(10);
        //$roles = Roles::latest()->paginate(5);
        return view('producto.index', compact('producto'))->with('i',(request()->input('page', 1) - 1) *10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['componente' => 'required']);
        $producto = new Producto(); 
        $producto->componente = request('componente');        
        $producto->id_categoria= request('id_categoria');
        $producto->id_proyecto= request('id_proyecto');
        $producto->status = ( $request->status == 'on') ? true:false;
        $producto->save(); 
        return redirect('/producto');
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
        $producto = Producto::findOrFail($id);
         return view('producto.edit',compact('producto'));
     
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
        $request->validate([
            'componente' => 'required']);
             
             $form_data = array('componente' => $request->componente,
                                'id_categoria'=> $request->id_categoria,
                                'id_proyecto' => $request->id_proyecto,
                                'status' => (( $request->status == 'on') ? true:false )
                            );
                            Producto::whereId($id)->update($form_data);

             return redirect('producto')->with('success','Rol actualizado correctamente!');
      
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
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/producto');
    }
}
