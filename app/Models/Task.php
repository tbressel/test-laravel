<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;

class Task extends Model
{
    use HasFactory;

    public $fillable = [
        'task_stat'
    ];
    
/**
* Get the theme from the task.
*/
public function themes()
{
return $this->belongsToMany(Theme::class);
}



}
