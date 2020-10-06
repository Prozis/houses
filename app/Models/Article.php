<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    //автоматическое преобразование Json в массив для полей с ссылками на изображения
    protected $casts = [
       'smallImage' => 'array',
       'bigImage' => 'array',
    ];
    protected $fillable = ['articleID', 'title', 'smallImage', 'price', 'bigImage', 'text'];


}
