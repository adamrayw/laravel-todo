<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todo';

    protected $fillable = ['title', 'date', 'time', 'priority', 'user_id', 'status'];

    protected $nullable = ['status'];
}
