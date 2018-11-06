<?php

namespace Codwelt\codliveditor\Clases;

use Codwelt\codliveditor\Clases\complementos;
use Illuminate\Support\Facades\Session;

class Javascript
{
    public $field;
    public $complementos;
    public $footer;

    public function __construct()
    {
        $this->field = " ";
        $this->complementos = new complementos();
        $this->footer = " ";
    }

    public function mainConfgurations()
    {
        self::opendocument();
        if (Session::get('config')['tiporender'] == 0) {
            self::inicomplementsheaders();
            self::inicomplementsfooters();
        }
        self::detectionHTml();
        self::detectionCss();
        self::detectionJs();
        self::render();
        self::closedocument();
        return $this->field;
    }

    public function opendocument()
    {
        $this->field .= "<script> 
$(document).ready(function () { 
    var documentoraw, archivo, header, footer, html, css, js, php; 
    documentoraw = ''; html = ''; header = ''; footer = ''; css = ''; js  = ' '; ";
    }

    public function inicomplementsheaders()
    {
        if (Session::get('config')['idframeworkfront'] == 1) {
            $this->field .= "
            header += '" . $this->complementos->addCssBootstrap() . "';";
        } elseif (Session::get('config')['idframeworkfront'] == 2) {
            $this->field .= "
            header += '" . $this->complementos->addCssSemanticui() . "';";
        }
    }

    public function inicomplementsfooters()
    {
        if (Session::get('config')['idframeworkfront'] == 1) {
            $this->footer .= $this->complementos->addJsBootstrapPoppers();
            $this->footer .= $this->complementos->addJsBootstrap();
        } elseif (Session::get('config')['idframeworkfront'] == 2) {
            $this->footer .= $this->complementos->addJsSemanticui();
        }
    }

    public function detectionHTml()
    {
        $this->field .= " 
        if ($('#html')) {
        $('#html') . keyup(function () {
             html = $(this) . val();
        });
    }";
    }

    public
    function detectionCss()
    {
        $this->field .= " if ($('#css')) {
        $('#css') . keyup(function () {
            css = $(this) . val();
        });
    } ";
    }

    public
    function detectionJs()
    {
        $this->field .= " if ($('#js')) { 
        $('#js') . keyup(function () {
            js = $(this) . val();
        });
    }";
    }

    public function render()
    {

        if (Session::get('config')['tiporender'] == 0) {
            $this->field .= "
                onload = (document) . onkeyup = function () { 
                documentoraw = ''; 
                documentoraw += header + '<style>' + css + '<\/style>' + html + ' <section id=\"jsreference\"><\/section>' + '<script>var scriptjs = document.createElement(\"script\"); scriptjs.setAttribute(\"src\", \"https://code.jquery.com/jquery-3.1.1.min.js\"); scriptjs.setAttribute(\"integrity\", \"sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=\"); scriptjs.setAttribute(\"crossorigin\", \"anonymous\"); document.getElementById(\"jsreference\").appendChild(scriptjs);' 
                + '" . $this->footer . "' + js + '< \/script>'; 
                (document . getElementById('preview') . contentWindow . document) . write(documentoraw); 
                (document . getElementById('preview') . contentWindow . document) . close()};";
        } else {
            $this->field .= "onload = (document) . onkeyup = function () { 
            var dato = $('#tokenid').val(); 
            
            var paramet = { '_token': dato}; 
            paramet['css'] = $('#css').val(); 
            paramet['html'] = $('#html').val(); 
            paramet['js'] = $('#js').val();
             
            $.ajax({ 
            url: '/codliveditor/lienzo/escribir/render', 
            dataType: 'json', 
            data: paramet, 
            method: 'post',
            success: function (result) { 
            $('#preview').attr('src', '/codliveditor/lienzo/ver/render/document/'); 
            },error: function (result) { 
            console.log('Fallo el render'); 
            console.log(result); 
            }, beforeSend: function () { 
            console.log('cargando ...'); 
            } 
            }); 
            };";
        }
    }

    public function closedocument()
    {
        $this->field .= " }); </script>";
    }
}
