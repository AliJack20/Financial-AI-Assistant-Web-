<?php

namespace App\Http\Controllers;


use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function overview()
    {
        // Total income & expenses
        $income = Transaction::where('type', 'income')->sum('amount');
        $expenses = Transaction::where('type', 'expense')->sum('amount');

        // Savings Rate
        $savingsRate = $income > 0 ? (($income - $expenses) / $income) * 100 : 0;

        // Compare with previous month for trend
        $thisMonth = now()->format('Y-m');
        $lastMonth = now()->subMonth()->format('Y-m');

        $incomeThisMonth = Transaction::where('type', 'income')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('amount');

        $incomeLastMonth = Transaction::where('type', 'income')
            ->whereMonth('date', now()->subMonth()->month)
            ->whereYear('date', now()->subMonth()->year)
            ->sum('amount');

        $incomeTrend = $incomeLastMonth > 0
            ? (($incomeThisMonth - $incomeLastMonth) / $incomeLastMonth) * 100
            : 0;

        $expenseThisMonth = Transaction::where('type', 'expense')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('amount');

        $expenseLastMonth = Transaction::where('type', 'expense')
            ->whereMonth('date', now()->subMonth()->month)
            ->whereYear('date', now()->subMonth()->year)
            ->sum('amount');

        $expenseTrend = $expenseLastMonth > 0
            ? (($expenseThisMonth - $expenseLastMonth) / $expenseLastMonth) * 100
            : 0;

        // Monthly data for line chart
        $monthlyData = Transaction::select(
                DB::raw('DATE_FORMAT(date, "%Y-%m") as month'),
                DB::raw('SUM(CASE WHEN type = "income" THEN amount ELSE 0 END) as income'),
                DB::raw('SUM(CASE WHEN type = "expense" THEN amount ELSE 0 END) as expenses')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Category data for pie chart
        $categoryData = Transaction::select(
                'category',
                DB::raw('SUM(amount) as total')
            )
            ->groupBy('category')
            ->get();

        return view('overview', compact(
            'income',
            'expenses',
            'savingsRate',
            'incomeTrend',
            'expenseTrend',
            'monthlyData',
            'categoryData'
        ));
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



    
