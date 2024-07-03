<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Service;
use Illuminate\Support\Facades\DB; // Add this line

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $serviceId = $request->input('service_id');
        $quantity = $request->input('quantity', 1);

        $service = Service::find($serviceId);
        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $cartItem = Cart::updateOrCreate(
            ['service_id' => $serviceId],
            [
                'service_title' => $service->title,
                'category_id' => $service->category,
                'quantity' => DB::raw("quantity + $quantity"),
                'total_price' => DB::raw("total_price + $service->price * $quantity")
            ]
        );

        return response()->json($cartItem);
    }

    public function removeFromCart(Request $request)
    {
        $serviceId = $request->input('service_id');

        $cartItem = Cart::where('service_id', $serviceId)->first();
        if ($cartItem) {
            $cartItem->delete();
        }

        return response()->json(['success' => true]);
    }

    public function getCart()
    {
        $cartItems = Cart::with('service')->get();
        $totalPrice = $cartItems->sum('total_price');

        return response()->json(['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    }
}
