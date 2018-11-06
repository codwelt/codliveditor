<?php

namespace Codwelt\codliveditor\Clases;

use Codwelt\codliveditor\Clases\documentoHtml;
use Codwelt\codliveditor\Clases\complementos;
use Codwelt\codliveditor\Clases\Javascript;
use Codwelt\codliveditor\Clases\database;
use Illuminate\Support\Facades\Session;
use Codwelt\codliveditor\Clases\tools;


class codmanager
{
    public $jscript;
    public $db;
    public $tools;
    public $arquitectura;
    public $complementos;

    public function __construct()
    {
        $this->jscript = new Javascript();
        $this->db = new database();
        $this->tools = new tools();
        $this->arquitectura = new documentoHtml();
        $this->complementos = new complementos();
        self::loadconfig();
    }

    public function initviews()
    {
        return $this->jscript->mainConfgurations();
    }

    public function agregarThemes($request)
    {
        if ($this->db->addTheme($request->all())) {
            return "exitoso";
        } else {
            return "fallo";
        }
    }

    public function listaThemes()
    {
        return $this->db->listThemes();
    }

    public function mostarPdf($request)
    {
        $docum = $this->arquitectura->Maindocumento($request['html'], $request['css'], $request['js'], $request['nombre'], self::inicomplementsheaders(), self::inicomplementsfooters());
        return $this->tools->mainver($docum, $request['nombre']);
    }


    public function inicomplementsheaders()
    {
        $header = "";
        if (Session::get('config')['idframeworkfront'] == 1) {
            $header .= $this->complementos->addCssBootstrap();
        } elseif (Session::get('config')['idframeworkfront'] == 2) {
            $header .= $this->complementos->addCssSemanticui();
        }
        return $header;
    }

    public function inicomplementsfooters()
    {
        $foot = "";
        $foot .= $this->complementos->addJqueryEscritura();
        if (Session::get('config')['idframeworkfront'] == 1) {
            $foot .= $this->complementos->addJsBootstrapPoppersEscritura();
            $foot .= $this->complementos->addJsBootstrapEscritura();
        } elseif (Session::get('config')['idframeworkfront'] == 2) {
            $foot .= $this->complementos->addJsSemanticuiEscritura();
        } else {
            $foot .= "";
        }
        return $foot;
    }


    public function Actualizar($request, $id)
    {
        return $this->db->updateTheme($request, $id);
    }

    public function traerconfig()
    {
        return $this->db->leerconfig();
    }

    public function actualizarConfiguracion($data, $id)
    {
        return $this->db->actualizarConfiguracion($data, $id);
    }

    private function loadconfig()
    {
        if (!Session::exists('config')) {
            Session::put('config', $this->db->leerconfig()[0]);
        }
    }

    public function escribirRender($request)
    {
        $docum = $this->arquitectura->Maindocumento($request['html'], $request['css'], $request['js'], "render", self::inicomplementsheaders(), self::inicomplementsfooters());
        return $this->tools->renderdocument($docum);
    }


    public function escribirvistatheme($id)
    {
        $request = $this->db->buscartheme($id);
        $docum = $this->arquitectura->Maindocumento($request['html'], $request['css'], $request['js'], $request['nombreTemplate'], self::inicomplementsheaders(), self::inicomplementsfooters());
        return $this->tools->escribirplantillas($request['nombreTemplate'], $docum);
    }
}
