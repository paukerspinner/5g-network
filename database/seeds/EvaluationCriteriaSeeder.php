<?php

use Illuminate\Database\Seeder;
use App\EvaluationCriteria;

class EvaluationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EvaluationCriteria::create([
            'label' => 'Tỷ lệ thiết lập kết nối NR (SgNB) thành công',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tỷ lệ rớt dịch vụ trên SgNB',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tỉ lệ chuyển giao thành công trong SgNB (Intra-SgNB PScell Change)',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tỉ lệ chuyển giao thành công trong SgNB (Inter-SgNB PScell Change)',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tốc độ downlink trung bình user',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tốc độ downlink trung bình user',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tốc độ uplink trung bình user',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tốc độ downlink trung bình cell',
        ]);
        EvaluationCriteria::create([
            'label' => 'Tốc độ uplink trung bình cell',
        ]);
        EvaluationCriteria::create([
            'label' => 'Lưu lượng downlink của cell',
        ]);
        EvaluationCriteria::create([
            'label' => 'Lưu lượng uplink của cell',
        ]);
        EvaluationCriteria::create([
            'label' => 'Số  lượng user trung bình của cell',
        ]);
        EvaluationCriteria::create([
            'label' => 'Số  lượng user lớn nhatas của cell',
        ]);
        EvaluationCriteria::create([
            'label' => 'Độ khả dụng của cell',
        ]);
    }
}
