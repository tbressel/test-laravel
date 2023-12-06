<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;


class Theme extends Model
{
    use HasFactory;

/**
* Get the task containing the theme.
*/
public function tasks()
{
return $this->belongsToMany(Task::class);
}

}
