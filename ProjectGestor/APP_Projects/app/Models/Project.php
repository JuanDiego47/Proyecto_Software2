<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'project_name',
        'description',
        'start_date',
        'end_date',
        'budget',
        'overall_sustainability_score'
    ];



    public function metrics() {
        return $this->belongsToMany(SustainabilityMetric::class, 'project_metrics')
                    ->withPivot(['metric_value', 'date_measured'])
                    ->withTimestamps(); // Important for pivot tables
    }

    public function stakeholders() {
        return $this->belongsToMany(Stakeholder::class, 'project_stakeholders')
                    ->withPivot(['engagement_level', 'impact_assessment'])
                    ->withTimestamps();
    }
}
