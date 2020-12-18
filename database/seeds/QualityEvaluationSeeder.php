<?php

use Illuminate\Database\Seeder;
use App\EvaluationCriteria;
use App\NetworkNode;
use App\QualityEvaluation;

class QualityEvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $network_nodes = NetworkNode::all();
        $evaluation_criterias = EvaluationCriteria::all();
        foreach ($network_nodes as $network_node) {
            foreach ($evaluation_criterias as $evaluation_criteria) {
                QualityEvaluation::create([
                    'network_node_id' => $network_node->id,
                    'evaluation_criteria_id' => $evaluation_criteria->id,
                    'value' => rand(65, 100)
                ]);
            }
        }
    }
}
