<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\EmployeesChart;
use App\Charts\LeaveOvertimeChart;
use App\Charts\PresenceChart;
use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(LeaveOvertimeChart $barChart, EmployeesChart $donutChart, PresenceChart $lineChart)
    {
        $users = User::all();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => $users,
            'barChart' => $barChart->build(),
            'donutChart' => $donutChart->build(),
            'lineChart' => $lineChart->build()
        ]);
    }
}
