<?php

namespace Codwelt\codliveditor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class codliveditorModel extends Model
{
    use SoftDeletes;
    protected $table = "codliveditor";
    protected $fillable = ['id', 'nombreTemplate', 'html', 'css', 'js', 'php'];
}
