<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;



class Animal extends Model
{
    use HasFactory;
    use Sortable;

    // mass assignable attributes
    protected $fillable = ['name','description'];

    // fields to be sortable by ascending/descending order.
    public $sortable = ['id','name','date_of_birth'];
}
