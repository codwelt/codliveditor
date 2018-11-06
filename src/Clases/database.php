<?php

namespace Codwelt\codliveditor\Clases;

use Codwelt\codliveditor\Clases\tools;
use Codwelt\codliveditor\Models\codliveditorModel;
use Codwelt\codliveditor\Models\codliveditorconfig;
use Illuminate\Support\Facades\DB;

class database
{
    public $theme;
    public $config;
    public $tools;

    public function __construct()
    {
        $this->theme = new codliveditorModel();
        $this->config = new codliveditorconfig();
        $this->tools = new tools();
    }

    public function addTheme($data)
    {
        $this->theme->nombreTemplate = $data['nombre'];
        $this->theme->html = $data['html'];
        $this->theme->css = $data['css'];
        $this->theme->js = $data['js'];
        return $this->theme->save();
    }

    public function listThemes()
    {
        return $this->tools->collectioToArray(codliveditorModel::all());
    }

    public function updateTheme($request, $id)
    {
        return DB::table('codliveditor')
            ->where('id', $id)
            ->update([
                'nombreTemplate' => $request['nombre'],
                'html' => $request['html'],
                'css' => $request['css'],
                'js' => $request['js'],
            ]);
    }


    public function leerconfig()
    {
        return $this->tools->collectioToArray(codliveditorconfig::all());
    }

    public function actualizarConfiguracion($request, $id)
    {
        DB::table('codliveditorconf')
            ->where('id', 1)
            ->update([
                'tipostorage' => $request['tipostorage'],
                'tiporender' => $request['tiporender'],
                'idframeworkfront' => $request['tipoframework'],
            ]);

        if (isset($request['html'])) {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'html' => 1
                ]);
        } else {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'html' => 0
                ]);
        }

        if (isset($request['css'])) {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'css' => 1
                ]);
        } else {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'css' => 0
                ]);
        }

        if (isset($request['js'])) {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'js' => 1
                ]);
        } else {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'js' => 0
                ]);
        }

        if (isset($request['php'])) {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'php' => 1
                ]);
        } else {
            DB::table('codliveditorconf')
                ->where('id', 1)
                ->update([
                    'php' => 0
                ]);
        }

        return true;
    }

    public function buscartheme($id)
    {
        return codliveditorModel::find($id);
    }
}
