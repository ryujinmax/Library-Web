<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryBook;

class ListBook extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'writer',
        'publisher',
        'categoryBook',
        'description',
    ];

    public function categoryBook() {
        return $this->belongsTo( CategoryBook::class, 'categoryBook', 'id' );
    }
}
