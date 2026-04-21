<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            ['label' => 'Active orders', 'value' => '3'],
            ['label' => 'Ready for pickup', 'value' => '1'],
            ['label' => 'Total spent', 'value' => 'Rp246.000'],
        ];

        $recentOrders = [
            ['code' => 'INV-240421-001', 'service' => 'Wash & Fold', 'status' => 'Washing', 'total' => 'Rp54.000'],
            ['code' => 'INV-240420-014', 'service' => 'Express Wash', 'status' => 'Ready for pickup', 'total' => 'Rp72.000'],
            ['code' => 'INV-240419-009', 'service' => 'Ironing Only', 'status' => 'Delivered', 'total' => 'Rp36.000'],
        ];

        return view('dashboard.home', [
            'stats' => $stats,
            'recentOrders' => $recentOrders,
        ]);
    }
}
