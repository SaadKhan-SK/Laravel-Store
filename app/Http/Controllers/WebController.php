<?php

namespace App\Http\Controllers;

use App\Models\CmsService;
use App\Models\Product;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function home()
    {
        return view('web.pages.home');
    }
    public function about()
    {
        return view('web.pages.about');
    }
    public function cart()
    {
        return view('web.pages.cart');
    }
    public function service()
    {
        $services = CmsService::all();
        $data['services'] = $services;

        return view('web.pages.services')->with(["data" => $data]);
    }
    public function team()
    {
        return view('web.pages.team');
    }
    public function account()
    {
        return view('web.pages.account');
    }
    public function register(Request $request)
    {
        if ($request->isMethod("post")) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
                'name' => 'required',
                'password' => 'required|min:8|confirmed',
                'role' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $data = $request->only(['name', 'email', 'password', 'role']);


            $user = User::create($data);
            auth()->login($user);

            return response()->json(['message' => 'Successfully registered'], 200);
        }
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email.required' => 'The Email is required.',
                'email.email' => 'Please enter a valid Email Address.',
                'password.required' => 'Password is required.'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            if (
                Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ])
            ) {
                if (Auth()->user()->role == 'Admin') {
                    return response()->json(['redirect' => route('admin.dashboard'), 'message' => 'Login Successfully'], 200);
                } else if (Auth()->user()->role == 'Vendor') {
                    return response()->json(['redirect' => route('vendor.dashboard'), 'message' => 'Login Successfully'], 200);
                } else {
                    return response()->json([
                        'redirect' => route('shop.web'),
                        'message' => 'Successfully logged in'
                    ], 200);

                }
            } else {
                return response()->json(['error' => 'Wrong Credentials'], 422);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('account.web')->with('success', "Logout Successfully!");
    }
    public function shop()
    {
        $product = Product::paginate(12);
        $data['products'] = $product;
        return view('web.pages.shop')->with(["data" => $data]);
    }
    public function product(Request $request, $slug)
    {
        $product = Product::where(['slug' => $slug])->with('category', 'tags', 'gallery')->first();
        $data['products'] = $product->toArray();

        $tagNames = $product->tags->pluck('name')->implode(', '); // Convert tags array to comma-separated string
        $data['tags'] = $tagNames;

        // echo "<pre>";
        // print_r($data);
        // exit;
        return view('web.pages.product-detail')->with(["data" => $data]);
    }
    public function addReview(Request $request)
    {
        // Validate the incoming request data
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'review' => 'required',
        ];
        $errors = [
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Your Email Address',
            'email.email' => 'Please Enter A Valid Email',
            'message.required' => 'Please Enter Your Message',
            'review.required' => 'Please Give a Star',
        ];

        $validator = Validator::make($request->all(), $rules, $errors);

        if ($validator->fails()) {
            $response = [
                'status' => 0,
                'message' => $validator->errors()->first(),
            ];

            return response()->json($response, 200);
        }

        $user = empty(auth()->user()->id) ? null : auth()->user()->id;
        $data = [
            'user_id' => $user,
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'review' => $request->review,
        ];

        $review = new Review();
        $review->fill($data)->save();

        $response = [
            'status' => 1,
            'message' => 'Review added successfully',
            'review' => $review,
        ];

        return response()->json($response, 200);
    }

    public function allReviews(Request $request)
    {
        $review = Review::with('product','user')->where(['product_id'=>$request->id])->get();

        $count = count($review);

        // echo "<pre>";
        // echo print_r($review->toArray());
        // echo exit;

        if (!$review || empty($review)) {
            // review is empty
            $response = [
                "status" => 0,
                "message" => 'No Review!',
                "review" => [],
            ];

            return response()->json($response, 200);
        }

        $response = [
            "status" => 1,
            // "message" => 'Review retrieved successfully!',
            "review" => $review->toArray(),
            "count" => $count,
        ];

        return response()->json($response, 200);
    }


}