<?php

namespace Codwelt\codliveditor\Clases;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PDF;

class tools
{
    private $ruta;
    private $rutapublica;
    private $rutaplantillas;

    public function __construct()
    {
        $this->ruta = resource_path('views/codliveditor/conf/') . "vista.blade.php";
        $this->rutavista = 'codliveditor/conf/vista';
        $this->rutapublica = public_path('codliveditor/pdf/');
        $this->rutaplantillas = resource_path('views/codliveditor/plantillas/');
    }

    public function collectioToArray($data)
    {
        if (count($data) > 0) {
            $data = $data->toArray();
        } else {
            $data = null;
        }
        return $data;

    }

    public function mainver($html, $titulo)
    {
        try {
            if (Session::get('config')['tipostorage'] == "local") {
                self::escribirVista($html);
                return self::download($titulo);
            } elseif (Session::get('config')['tipostorage'] == "s3") {
                return self::escribirVistaS3($html, $titulo);
            } else {
                self::escribirVista($html);
                return self::download($titulo);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function renderdocument($html)
    {
        self::escribirVista($html);
        return true;
    }


    public function download($titulo)
    {
        $pdfs = \PDF::loadView($this->rutavista)->save($this->rutapublica . $titulo . '.pdf', ['data' => 1])->stream($titulo . '.pdf');
        header("Content-disposition: attachment; filename=" . $this->rutapublica . $titulo . ".pdf");
        header("Content-type: application/pdf");
        return '/codliveditor/pdf/' . $titulo . ".pdf";
        //readfile($this->rutapublica . $titulo . ".pdf");
        //\unlink($this->rutapublica . $titulo . ".pdf");
    }

    public function escribirVista($template)
    {
        $file = fopen($this->ruta, 'w+');
        fwrite($file, $template);
        fclose($file);
        return true;
    }

    public function escribirVistaS3($template, $titulo)
    {
        Storage::disk('s3')->put($titulo . '.pdf', $template);
        return Storage::disk('s3')->download($titulo . '.pdf');

    }

    public function escribirplantillas($nombre, $documento)
    {
        $file = fopen($this->rutaplantillas . $nombre . '.blade.php', 'w+');
        fwrite($file, $documento);
        fclose($file);
        return true;
    }

}
