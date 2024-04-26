<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use PhpParser\Node\Expr\FuncCall;
use Stripe\Stripe;

class CartController extends Controller
{
    //

    public function index()
    {
        $events = Booking::all()->where('user_id', '==', Auth::user()->id);
        $totalPrice = $events->sum('total_price');
        return view('cart.cart_index', compact('events', 'totalPrice'));
    }

    public function session()
    {

        $events = Booking::all()->where('user_id', Auth::user()->id);
        $totalPrice = $events->sum('total_price');
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'mad',
                        'product_data' => [
                            "name" => "welcome" . ' ' . Auth::user()->name,
                            "description" => 'chi7aja'
                        ],
                        'unit_amount'  => $totalPrice . '00',
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment', // the mode  of payment
            'success_url' => route('success'), // route when success 
            'cancel_url'  => route('myHome'), // route when  failed or canceled
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return;
    }
    public function myHome()
    {
        return;
    }
}
