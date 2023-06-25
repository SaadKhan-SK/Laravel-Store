<?php

namespace App\Http\Controllers;

use App\Http\Libraries\Generic;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function product()
    {
        if(auth()->user()->role == "Vendor")
        {
            return view('vendor.pages.product');
        }
        if(auth()->user()->role == "Admin")
        {

            return view('admin.pages.product');
        }
    }
    public function products()
    {
        

            return view('admin.pages.allProduct');
        
    }
    public function YourProduct()
    {
        $products = Product::with('admin', 'category')->where(['vendor_id'=>auth()->user()->id])->get();
        // echo "<pre>";
        // echo print_r($products->toArray());
        // exit;
        $formattedProducts = [];

        foreach ($products as $product) {
            $formattedProducts[] = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'publish_date' => Carbon::parse($product->publish_date)->format('F d, Y'),
                'vendor' => $product->admin->name,
                'is_approved' => $product->is_approved,
                'status' => $product->status,
                'price' => $product->price,
            ];
        }

        $data['products'] = $formattedProducts;

        

        return response()->json($data);
    }
    public function vendorProduct()
    {
        $products = Product::with('vendor', 'category')->where(['vendor_id'=>auth()->user()->id])->get();
        // echo "<pre>";
        // echo print_r($products->toArray());
        // exit;
        $formattedProducts = [];

        foreach ($products as $product) {
            $formattedProducts[] = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'publish_date' => Carbon::parse($product->publish_date)->format('F d, Y'),
                'vendor' => $product->vendor->name,
                'is_approved' => $product->is_approved,
                'status' => $product->status,
                'price' => $product->price,
            ];
        }

        $data['products'] = $formattedProducts;

        

        return response()->json($data);
    }
    public function allProduct()
    {
        $products = Product::with('vendor', 'category')
    ->where(function ($query) {
        $query->where('vendor_id', '!=', auth()->user()->id)
            ->orWhereHas('vendor', function ($query) {
                $query->where('role', '!=', 'Admin');
            });
    })
    ->get();
        // echo "<pre>";
        // echo print_r($products->toArray());
        // exit;
        $formattedProducts = [];

        foreach ($products as $product) {
            $formattedProducts[] = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'publish_date' => Carbon::parse($product->publish_date)->format('F d, Y'),
                'vendor' => $product->vendor->name,
                'is_approved' => $product->is_approved,
                'status' => $product->status,
                'price' => $product->price,
            ];
        }

        $data['products'] = $formattedProducts;

        

        return response()->json($data);
    }



    public function addProduct(Request $request)
    {
        // echo '<pre>';
        // echo print_r($_POST);
        // echo exit;
        $categories = Category::all();
        $data['categories'] = $categories;
        $tags = Tag::all();
        $data['tags'] = $tags;

        if ($request->id) {
            $product = Product::with('gallery')->findOrFail($request->id);
            $data['product'] = $product;

            $selectedTags = $product->tags->pluck('id')->all();
            $data['selectedTags'] = $selectedTags;
            // echo "<pre>";
            // echo print_r($data['product']->toArray());
            // exit;
        }
        

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'category_id' => 'required',
                'price' => 'required',
                'publish_date' => 'required',
                'small_description' => 'required',
                'tnc' => 'required',
                'image' => $request->id ? 'nullable|image' : 'required|image'
            ], [
                'name.required' => 'Name is required',
                'category_id.required' => 'Please select the Category',
                'price.required' => 'Please enter the Price',
                'publish_date.required' => 'Please select the Publish Date',
                'small_description.required' => 'Please enter the Small Description',
                'tnc.required' => 'Please enter the Terms and Conditions',
                'image.required' => 'Please upload the image',
                'image.image' => "Please upload an image, not a file"
            ]);

            $value = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'discount_percentage' => $request->discount_percentage,
                'small_description' => $request->small_description,
                'publish_date' => $request->publish_date,
                'rejected_reason' => $request->rejected_reason,
                'tnc' => $request->tnc,
                'status' => 1,
                'is_approved' => 1,
            ];
            if ($request->has('tags')) {
                $tagIds = $request->input('tags');
                $tags = Tag::whereIn('id', $tagIds)->get();
                $product->tags()->sync($tags);
            }

            if ($request->hasFile('image')) {
                $value['image'] = Generic::upload_image($request->file('image'));
            }

            if ($request->vendor_id) {
                $value['vendor_id'] = $request->vendor_id;
            } elseif ($request->id) {
                $product = Product::findOrFail($request->id);
                $value['vendor_id'] = $product->vendor_id;
            } else {
                $value['vendor_id'] = auth()->user()->id;
            }
            $product = null;

            if ($request->id) {
                $product = Product::findOrFail($request->id);
                $product->update($value);
                $message = "Product Updated Successfully";
            } else {
                $product = Product::create($value);
                $message = "Product Added Successfully";
            }

            if ($product) {
                // Handle additional images upload
                if ($request->hasFile('additional_images')) {
                    foreach ($request->file('additional_images') as $file) {
                        $filename = Generic::upload_image($file);
                        $product->gallery()->create(['image' => $filename]);
                    }
                }
                if(auth()->user()->role == "Admin")
                {
                return redirect()->to(route('admin.product'))->with('success',$message );
                }
                if(auth()->user()->role == "Vendor")
                {
                return redirect()->to(route('vendor.product'))->with('success',$message );
                }
            } else {
                return redirect()->back()->with('fail', "Something went wrong!");
            }
        }
            if(auth()->user()->role == "Admin")
            {
                return view('admin.pages.addProduct')->with(["data" => $data]);
            }
            if(auth()->user()->role == "Vendor")
            {
                return view('vendor.pages.addProduct')->with(["data" => $data]);

            }
    }


    public function viewProduct(Request $request)
    {
        if ($request->id) {
            $product = Product::with('gallery')->findOrFail($request->id);
            $product->created_at_formatted = Carbon::parse($product->created_at)->format('F d, Y');
            $product->publish_date_formatted = Carbon::parse($product->publish_date)->format('F d, Y');
            $data['product'] = $product;
        }

        // echo "<pre>";
        // echo print_r($data['product']->toArray());
        // exit;
        if(auth()->user()->role == "Admin")
        {
            return view('admin.pages.viewProduct')->with(["data"=>$data]);
        }
        if(auth()->user()->role == "Vendor")
        {
            return view('vendor.pages.viewProduct')->with(["data"=>$data]);

        }
        return view('admin.pages.viewProduct')->with(["data"=>$data]);
    }

    public function updateStatus(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'status' => 'required',
                'id' => 'required'
            ]);

            $product = Product::findOrFail($request->id);

            $product->status = $request->status;

            // dd($product);

            $product->save();

            return response()->json(['success' => true, "message" => 'Status Updated']);
        }
    }
    public function updateApprove(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'is_approved' => 'required',
                'id' => 'required'
            ]);

            $product = Product::findOrFail($request->id);

            $product->is_approved = $request->is_approved;

            // dd($product);

            $product->save();

            return response()->json(['success' => true, "message" => 'Product Status Updated']);
        }
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $result = $product->delete();
        return response()->json(['success' => true, "message" => 'Delete Product Successfully']);
    }
    public function deleteGallery(Request $request)
    {
        // Find the image by ID
        $image = ProductGallery::findOrFail($request->id);

        // Perform any additional checks or validations if needed

        // Delete the image
        $image->delete();

        // Return a response indicating successful deletion
        return response()->json(['message' => 'Image deleted successfully']);
    }
}