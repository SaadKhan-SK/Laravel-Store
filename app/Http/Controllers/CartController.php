<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $rules = [
            'id' => 'required',
            // 'quantity' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                "status" => 0,
                "message" => $validator->errors()->first(),
            ];

            return response()->json($response, 200);
        }

        $product = Product::find($request->id);

        if (!$product) {
            $response = [
                "status" => 0,
                "message" => 'Product not found!',
            ];

            return response()->json($response, 200);
        }

        $quantity = empty($request->quantity) || $request->quantity === 0 ? 1 : $request->quantity;

        $cart = session()->get('cart', [
            'items' => [],
            'total_price' => 0,
        ]);

        $items = collect($cart['items']);

        $existingItemIndex = $items->search(function ($item) use ($product) {
            return $item['id'] === $product->id;
        });

        if ($existingItemIndex !== false) {
            $existingItem = $items[$existingItemIndex];
            $existingItem['quantity'] = $quantity;
            $existingItem['total_price'] = $existingItem['quantity'] * $existingItem['price'];
            $items[$existingItemIndex] = $existingItem;
        } else {
            $item = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => number_format($product->price, 0),
                'discount' => $product->discount_percentage,
                'image' => $product->image,
                'quantity' => $quantity,
            ];

            // Check if the product has a discount percentage
            if (!empty($product->discount_percentage)) {
                $discountedPrice = $product->price - number_format($product->price * $product->discount_percentage / 100, 0);
                $item['price'] = $discountedPrice;
            }

            $item['total_price'] = $item['quantity'] * $item['price'];

            $items->push($item);
        }

        $cart['total_price'] = $items->sum('total_price');
        $cart['items'] = $items->toArray();

        session()->put('cart', $cart);

        $response = [
            "status" => 1,
            "message" => 'Product added to cart!',
            "cart" => $cart,
        ];

        return response()->json($response, 200);
    }


    public function removeFromCart(Request $request)
    {
        $rules = [
            'id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                "status" => 0,
                "message" => $validator->errors()->first(),
            ];

            return response()->json($response, 200);
        }

        $product_id = $request->input('id');

        $cart = session()->get('cart');

        if (isset($cart['items'])) {
            foreach ($cart['items'] as $index => $item) {
                if ($item['id'] == $product_id) {
                    unset($cart['items'][$index]);
                    $cart['total_price'] -= $item['total_price'];
                    break;
                }
            }

            $cart['items'] = array_values($cart['items']); // Re-index the remaining items

            session()->put('cart', $cart);

            $response = [
                'status' => 1,
                'message' => 'Product removed from cart',
                'cart' => $cart
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'No products found in cart'
            ];
        }

        return response()->json($response);
    }






    public function showCart()
    {
        return view('web.pages.cart');
    }
    public function allCartProducts()
    {
        $cart = session()->get('cart');

        if (!$cart || empty($cart['items'])) {
            // Cart is empty
            $response = [
                "status" => 0,
                "message" => 'Cart is empty!',
                "cart" => [],
            ];

            return response()->json($response, 200);
        }

        $response = [
            "status" => 1,
            "message" => 'Cart retrieved successfully!',
            "cart" => $cart,
        ];

        return response()->json($response, 200);
    }

    public function cartCount()
    {
        $count = session()->has('cart') ? count(session('cart')['items']) : 0;

        return response()->json(['count' => $count]);
    }
    // public function removeFromCart(Request $request)
    // {
    //     $rowId = $request->row_id;

    //     $cart = session()->get('cart');

    //     // Remove the specified item from the cart
    //     $updatedCart = collect($cart)->reject(function ($item) use ($rowId) {
    //         return $item['id'] === $rowId;
    //     })->all();

    //     // Store the updated cart in the session
    //     session()->put('cart', $updatedCart);

    //     return response()->json(['success' => 'Item removed from cart successfully']);
    // }
}