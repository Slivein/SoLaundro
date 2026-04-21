<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = [
            [
                'code' => 'ORD-001',
                'service' => 'Wash & Fold',
                'weight' => '3 kg',
                'status' => 'Picked up',
                'pickup' => '22 Apr 2026, 09:00',
            ],
            [
                'code' => 'ORD-002',
                'service' => 'Express Wash',
                'weight' => '2 kg',
                'status' => 'Processing',
                'pickup' => '22 Apr 2026, 13:30',
            ],
            [
                'code' => 'ORD-003',
                'service' => 'Ironing Only',
                'weight' => '4 pcs',
                'status' => 'Ready for pickup',
                'pickup' => '21 Apr 2026, 16:00',
            ],
        ];

        return view('dashboard.orders.index', [
            'orders' => $orders,
        ]);
    }
}
