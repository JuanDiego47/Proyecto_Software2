<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SustainabilityCategory extends Model
{
    use HasFactory;
    public function metrics() {
        return $this->hasMany(SustainabilityMetric::class);
    }
}
