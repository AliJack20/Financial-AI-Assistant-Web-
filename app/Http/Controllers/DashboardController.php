<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function overview()
    {
        $monthlyData = Transaction::selectRaw('
                DATE_FORMAT(date, "%Y-%m") as month,
                SUM(CASE WHEN type = "income" THEN amount ELSE 0 END) as income,
                SUM(CASE WHEN type = "expense" THEN amount ELSE 0 END) as expenses
            ')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $categoryData = Transaction::selectRaw('
                category,
                SUM(amount) as total
            ')
            ->where('type', 'expense')
            ->groupBy('category')
            ->get();

        return view('overview', [
            'monthlyData' => $monthlyData,
            'categoryData' => $categoryData
        ]);
    }

    public function analytics()
    {
        $monthlySavings = Transaction::selectRaw('
                DATE_FORMAT(date, "%Y-%m") as month,
                SUM(CASE WHEN type = "income" THEN amount ELSE 0 END) -
                SUM(CASE WHEN type = "expense" THEN amount ELSE 0 END) as savings
            ')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('analytics', [
            'monthlySavings' => $monthlySavings
        ]);
    }
}
