<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tags', 'description'];

    public function scopeFilter($query, array $filters){
        // dd($filters['search']);
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }

        if ($filters['tags'] ?? false) {
            $query->where('tags', 'like', '%' . request('tags') . '%');
        }
    }
}
