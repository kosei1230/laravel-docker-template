<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Todoモデル
class Todo extends Model
{
    
    protected $table = 'todos';
    // fill()が可能なカアラムの指定、複数代入の脆弱性の保護のため使用される
    protected $fillable = [
        'content'
    ];
}