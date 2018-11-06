<?php

namespace Codwelt\codliveditor\Models;

use Illuminate\Database\Eloquent\Model;

class codliveditorconfig extends Model
{

    protected $table = "codliveditorconf";
    protected $fillable = ['id', 'tipostorage', 'tiporender', 'html', 'css', 'js', 'php', 'idframeworkfront'];
}
