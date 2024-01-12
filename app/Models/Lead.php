<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'status', 'number','lead_column_id', 'operator_id'];
    public function lead_column() {
        return $this->hasOne(LeadColumn::class);
    }

    public function operator() {
        return $this->hasOne(Operator::class);
    }
}
