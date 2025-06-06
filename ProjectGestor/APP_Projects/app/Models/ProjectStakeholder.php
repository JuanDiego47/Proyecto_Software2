<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;  // Important: Use Pivot

class ProjectStakeholder extends Pivot
{
    // If you need to customize the pivot table name or timestamps:
    // protected $table = 'project_stakeholders'; // If your table name is different
    // public $timestamps = true; // If you want timestamps on the pivot table (usually recommended)

    // You can add additional methods or logic here if needed, but often the base Pivot class is sufficient.

    // Example: Accessing related Project and Stakeholder
    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function stakeholder() {
        return $this->belongsTo(Stakeholder::class);
    }


    // If you have any custom attributes or accessors on the pivot table, define them here.
    // For example:
    // public function getImpactAssessmentSummaryAttribute() {
    //     return substr($this->impact_assessment, 0, 50) . "..."; // Shortened summary
    // }
}