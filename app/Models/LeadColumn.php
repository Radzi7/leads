<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadColumn extends Model
{
    use HasFactory;
    protected $withCount = ['leads'];

    public function leads() {
        return $this->hasMany(Lead::class);
    }
}
