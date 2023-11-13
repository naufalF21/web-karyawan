<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\Lembur;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PresenceChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $today = Carbon::now();
        $labels = [];
        $present = [];
        $absent = [];
        $overtime = [];

        for ($i = 0; $i < 7; $i++) {
            $labels[] = $today->copy()->subDays($i)->format('d M y');
            $present[] = Absen::where('status', 'Attended')
                ->whereDate('tanggal', $today->copy()->subDays($i))->count();
            $absent[] = Absen::where('status', 'Absent')
                ->whereDate('tanggal', $today->copy()->subDays($i))->count();
            $overtime[] = Lembur::where('status', 'true')
                ->whereDate('tanggal_lembur', $today->copy()->subDays($i))->count();
        }

        $labels = array_reverse($labels);
        $present = array_reverse($present);
        $absent = array_reverse($absent);
        $overtime = array_reverse($overtime);

        return $this->chart->lineChart()
            ->addData('Present', $present)
            ->addData('Absent', $absent)
            ->addData('Overtime', $overtime)
            ->setColors(['#2A85FF', '#D0EDDD', '#B1E5FC'])
            ->setXAxis($labels);
    }
}
