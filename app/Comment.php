<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function users(){
        return $this->belongsTo('App\User','talker_id');
    }

    protected $table='comments';
    public $timestamps = false;

    protected $guarder=array(
        'id',
        'name'

    );

    protected $fillable = ['tweet','zikan'];




}
