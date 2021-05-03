<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Adoptions extends Model
{
    use HasFactory;
    use Sortable;

    // fields to be sortable by ascending/descending order.
    public $sortable = ['animalID', 'userID', 'created_at', 'created_at'];
}
