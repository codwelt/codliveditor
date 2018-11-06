<?php

namespace Codwelt\codliveditor\Clases;


class documentoHtml
{
    private $documento;

    public function __construct()
    {
        $this->documento = "";
    }

    public function Maindocumento($html, $css, $js, $titulo, $header, $footer)
    {
        self::initDocument();
        self::addHeader($css, $titulo, $header);
        self::addBody($html, $js, $footer);
        self::endDocument();
        return $this->documento;
    }

    public function initDocument()
    {
        $this->documento = "<!doctype html><html lang='en'>";
    }


    public function addHeader($css, $titulo, $header)
    {
        $this->documento .= '<head><meta charset="UTF-8"><meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>' . $titulo . '</title>' . self::AddCss($css) . ' ' . $header . '</head>';
    }

    public function addBody($html, $js, $footer)
    {
        $this->documento .= '<body>' . $html . ' ' . $footer . ' ' . self::addJs($js) . '</body>';
    }

    public function endDocument()
    {
        $this->documento .= '</html>';
    }


    public function AddCss($css)
    {
        return '<style>' . $css . '</style>';

    }


    public function addJs($js)
    {
        return '<script>' . $js . '</script>';
    }
}
