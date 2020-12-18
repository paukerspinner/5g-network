<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualityEvaluation extends Model
{
    const STANDARD_VALUE = 70; // If value >= STANDARD_VALUE -> this criterion is qualified

    protected $fillable = ['network_node_id', 'evaluation_criteria_id', 'value'];
    protected $appends = ['label'];

    public function evaluationCriteria() {
        return $this->belongsTo('App\EvaluationCriteria', 'evaluation_criteria_id');
    }

    public function getLabelAttribute() {
        return $this->evaluationCriteria()->getResults()->label;
    }
}
