<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    public $timestamps = false;

    protected $guarder=array(
        'id',
        'name'

    );
    protected $fillable = ['tweet','zikan'];
}
