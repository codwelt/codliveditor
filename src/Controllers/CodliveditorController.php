<?php

namespace Codwelt\codliveditor\Controllers;

use Codwelt\codliveditor\Clases\codmanager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodliveditorController extends Controller
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
        return view('codliveditor.Lienzo')->with('js', $this->manager->initviews());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function renderview(Request $request)
    {
        $this->manager->escribirRender($request->all());
        return response()->json(['respuesta', 'Exitosa']);
    }


    public function escribirPdfRender(Request $request)
    {
        return response()->json($this->manager->escribirRender($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function verPdf(Request $request)
    {
        return response()->json($this->manager->mostarPdf($request->all()));
    }

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->manager->escribirvistatheme($id));
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
