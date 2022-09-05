<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $item;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Item::inRandomOrder()->first();

        $cart = Cart::where('user_id',Auth::id());
        $items = Item::latest()->get();
        return view('home')
                    ->with('items',$items)
                    ->with('ads',$ads)
                    ->with('cart',$cart);
    }
}
