<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SustainabilityMetric extends Model
{
    use HasFactory;
    public function category() {
        return $this->belongsTo(SustainabilityCategory::class);
    }

    public function projects() { // For accessing projects related to this metric
        return $this->belongsToMany(Project::class, 'project_metrics')
                    ->withPivot(['metric_value', 'date_measured'])
                    ->withTimestamps();
    }
}
