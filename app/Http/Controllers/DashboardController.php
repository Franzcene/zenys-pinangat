<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminates\Support\Facades\DB;
use App\Models\Products;
use App\Models\Inventory;
use App\Models\Customers;

class DashboardController extends Controller
{
    public function index()
    {
       // Fetching data from the database
    $totalOrders = Orders::count();
       $totalInventory = Products::count(); // Assuming 'stock' is a column in your products table
       $totalSales = Orders::sum('total_amount'); // Adjust this to your sales logic

       // Recent activities (You can modify this as needed)
    $recentActivities = [     
        '*Pinangat Festival! June 10-24',
        '*Collaboration with BSIT students from Sorsogon State University for their Capstone Project, August 26, 2024',
        '*Shipment to Palawan August 28, 2024',
        
    ];

    return view('dashboard', compact('totalOrders', 'totalInventory', 'totalSales', 'recentActivities'));
    }
}

