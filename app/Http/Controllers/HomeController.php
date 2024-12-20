<?php

namespace App\Http\Controllers;

use App\Models\CheckDiscount;
use App\Models\Discounts;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Redemption;
use App\Models\Registrars;
use App\Models\Transaction;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $registrars = Registrars::select('id', 'msisdn', 'network', 'shop_name', 'location', 'shopowner_name', 'shopowner_number', 'card_code', 'cvv_code', 'created_at')
            ->latest()
            ->take(1000)
            ->get();



            $total_entries = Registrars::count();


        $weeklyRedemptions = Registrars::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count('id');

        return view(
            'pages.dashboard',
            compact(
                'total_entries',
                'weeklyRedemptions',
                'registrars'
            )
        );
    }


 public function discounts()
    {
        $discounts = Discounts::select('id', 'card_code', 'purchaseAmount', 'discount_amount', 'OTP', 'created_at')
            ->latest()
            ->take(1000)
            ->get();

        return view('pages.discounts', compact('discounts'));
    }

    public function checkDiscounts()
    {
        $checkDiscounts = CheckDiscount::select('id', 'card_code', 'cvv_code', 'discountValue', 'created_at')
            ->latest()
            ->take(1000)
            ->get();

        return view('pages.check_discounts', compact('checkDiscounts'));
    }

    public function registrars()
    {
        $registrars = Registrars::select('id', 'msisdn', 'network', 'shop_name', 'location', 'shopowner_name', 'shopowner_number', 'card_code', 'cvv_code', 'created_at')
            ->latest()
            ->take(1000)
            ->get();

        return view('pages.registrars', compact('registrars'));
    }


}
