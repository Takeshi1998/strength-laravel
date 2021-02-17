<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $table='lines';
    protected $fillable = ['line_id'];

    public static function createUserId($userId){
        $line=new Line();
        $data=['line_id'=>$userId];
        $line->fill($data);
        $line->save();
        return;
    }
}
