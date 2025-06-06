<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    use HasFactory;
    public function projects() {
        return $this->belongsToMany(Project::class, 'project_stakeholders')
                    ->withPivot(['engagement_level', 'impact_assessment'])
                    ->withTimestamps();
    }
}
