<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;

class accountingController extends Controller
{
    public function incomeStatement()
    {
        $totalSales = orders::sum('total_amount');
        $totalExpenses = orders::where('status', 'completed')->sum('expense');  // Assuming expense is a field
        $netIncome = $totalSales - $totalExpenses;

        return view('accounting.income_statement', compact('totalSales', 'totalExpenses', 'netIncome'));
    }

    public function reconciliation()
    {
        // Logic for reconciliation goes here
        return view('accounting.reconciliation');
    }
}
