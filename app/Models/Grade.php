<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

  //protected ?string $translationLocale=['Name'];
    public $translatable = ['Name','Notes'];
    /**
     * @var array|mixed
     */

    protected $fillable=['Name','Notes'];
    protected $table = 'Grades';
    public $timestamps = true;

}
