<?php

namespace App\Charts;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class EmployeesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $employees = User::select('position', DB::raw('count(*) as total'))
            ->groupBy('position')
            ->get();

        return $this->chart->donutChart()
            ->addData($employees->pluck('total')->toArray())
            ->setHeight(350)
            ->setLabels(User::pluck('position')->toArray());
    }
}
