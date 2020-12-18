<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NetworkNode extends Model
{
    const THRESHOLD_EMBB = 7;
    const THRESHOLD_MMTC = 9;
    const THRESHOLD_URLLC = 14;
    
    protected $fillable = ['address'];
    protected $appends = ['enable_embb', 'enable_mmtc', 'enable_urllc'];
    protected $hidden = ['created_at', 'updated_at'];

    public function evaluations() {
        return $this->hasMany('App\QualityEvaluation', 'network_node_id');
    }

    public function getEnableEmbbAttribute() {
        $qualified_criterions = $this->evaluations()->where('value', '>=', QualityEvaluation::STANDARD_VALUE)->get();
        return count($qualified_criterions) >= self::THRESHOLD_EMBB;
    }

    public function getEnableMmtcAttribute() {
        $qualified_criterions = $this->evaluations()->where('value', '>=', QualityEvaluation::STANDARD_VALUE)->get();
        return count($qualified_criterions) >= self::THRESHOLD_MMTC;
    }

    public function getEnableUrllcAttribute() {
        $qualified_criterions = $this->evaluations()->where('value', '>=', QualityEvaluation::STANDARD_VALUE)->get();
        return count($qualified_criterions) >= self::THRESHOLD_URLLC;
    }
}
