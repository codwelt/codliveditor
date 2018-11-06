<?php

namespace Codwelt\codliveditor\Clases;
class complementos
{

    public function addFontAwsome()
    {
        return ' <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> ';
    }

    public function addJquery()
    {
        return 'var scriptjs = document.createElement("script"); scriptjs.setAttribute("src", "https://code.jquery.com/jquery-3.1.1.min.js"); scriptjs.setAttribute("integrity", "sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="); scriptjs.setAttribute("crossorigin", "anonymous");';
    }

    public function addJqueryEscritura()
    {
        return '<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>';

    }

    public function addCssBootstrap()
    {
        return ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> ';
    }

    public function addJsBootstrapPoppers()
    {
        return 'var BootstrapPoppers = document.createElement("script"); BootstrapPoppers.setAttribute("src", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"); BootstrapPoppers.setAttribute("integrity", "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"); BootstrapPoppers.setAttribute("crossorigin", "anonymous"); document.getElementById("jsreference").appendChild(BootstrapPoppers);';

    }

    public function addJsBootstrapPoppersEscritura()
    {
        return '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>';

    }

    public function addJsBootstrap()
    {
        return 'var addJsBootstrap = document.createElement("script"); addJsBootstrap.setAttribute("src", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"); addJsBootstrap.setAttribute("integrity", "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"); addJsBootstrap.setAttribute("crossorigin", "anonymous"); document.getElementById("jsreference").appendChild(addJsBootstrap);';
    }

    public function addJsBootstrapEscritura()
    {
        return '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>';
    }

    public function addCssSemanticui()
    {
        return ' <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css"> ';
    }

    public function addJsSemanticui()
    {
        return 'var addJsSemanticui = document.createElement("script"); addJsSemanticui.setAttribute("src", "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.js"); document.getElementById("jsreference").appendChild(addJsSemanticui);';
    }

    public function addJsSemanticuiEscritura()
    {
        return '<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.js"></script>';
    }
}
