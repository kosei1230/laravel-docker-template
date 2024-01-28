<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// Todoモデル
class Todo extends Model
{
    use SoftDeletes;
    
    protected $table = 'todos';
    // fill()が可能なカアラムの指定、複数代入の脆弱性の保護のため使用される
    protected $fillable = [
        'content'
    ];
}