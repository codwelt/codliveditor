<?php

namespace Codwelt\codliveditor\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codwelt\codliveditor\Clases\codmanager;
use Illuminate\Support\Facades\Session;

class codliveditorconfigcontroller extends Controller
{
    public $manager;

    public function __construct()
    {
        $this->manager = new codmanager();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = $this->manager->traerconfig();
        return view('codliveditor.conf.config')->with('configuracion', $config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $config = $this->manager->actualizarConfiguracion($request->all(), $id);
        return redirect()->route('configuracion.index')->withErrors('Actualizacionón', "notification");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
