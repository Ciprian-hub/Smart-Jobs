<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Model::unguard() fom boot(): ServiceProvider allow this mass assignment
    protected $fillable = ['title', 'company', 'location', 'email', 'web', 'tags', 'description'];

    public function scopeFilter($query, array $filters): void
    {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . "%");
        }
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . "%");
        }
    }

}
