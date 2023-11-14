<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'user_applications';

    protected $fillable = ['job_title','company_name','company_location','company_email'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
