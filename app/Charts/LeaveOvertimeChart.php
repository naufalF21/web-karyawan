<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\User;
use App\Models\Lembur;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeaveOvertimeChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $today = Carbon::now();
        $labels = [];
        $cuti = [];
        $lembur = [];

        for ($i = 0; $i < 7; $i++) {
            $labels[] = $today->copy()->subDays($i)->format('d M y');
            $cuti[] = Cuti::where('status', 'true')
                ->whereDate('tanggal', $today->copy()->subDays($i))->count();
            $lembur[] = Lembur::where('status', 'true')
                ->whereDate('tanggal_lembur', $today->copy()->subDays($i))->count();
        }

        $labels = array_reverse($labels);
        $cuti = array_reverse($cuti);
        $lembur = array_reverse($lembur);

        return $this->chart->barChart()
            ->addData('Leave', $cuti)
            ->addData('Overtime', $lembur)
            ->setColors(['#2A85FF', '#957BFB'])
            ->setHeight(325)
            ->setXAxis($labels);
    }
}
