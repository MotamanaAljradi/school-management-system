<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;

    //protected ?string $translationLocale=['Name'];
    public $translatable = ['Name_class'];
    /**
     * @var array|mixed
     */
    public $timestamps = true;
    protected $table = 'Classrooms';
    protected $fillable=['Name_class','Grade_id'];
    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

}
