<?php

namespace App\Http\Controllers;

use App\Http\Libraries\Generic;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        return view('admin.pages.categories');
    }
    public function allCategories()
    {
        $categories = Category::all();
        $formattedCategories = [];

        foreach ($categories as $category) {
            $formattedCategories[] = [
                'id' => $category->id,
                'name' => $category->name,
                'image' => $category->image,
                'status' => $category->status
            ];
        }

        $data['categories'] = $formattedCategories;

        return response()->json($data);
    }
    public function addCategory(Request $request)
    {
        $data = [];

        if ($request->id) {
            $category = Category::findOrFail($request->id);
            $data['category'] = $category;
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
            ], [
                'name.required' => 'Category Name is required',
            ]);

            $value = [
                'name' => $request->name,
            ];

            if ($request->hasFile('image')) {
                $value['image'] = Generic::upload_image($request->file('image'));
            }

            if ($request->id) {
                $category = Category::findOrFail($request->id);
                $category->update($value);
                $message = "Category Updated Successfully";
            } else {
                // Create a new category
                $category = Category::create($value);
                $message = "Category Added Successfully";
            }

            if ($category) {
                return redirect()->route('admin.category')->with('success', $message);
            } else {
                return redirect()->back()->with('fail', "Something went wrong!");
            }
        }

        return view('admin.pages.addCategory', compact('data'));
    }


    public function updateStatus(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'status' => 'required',
                'id' => 'required'
            ]);

            $category = Category::findOrFail($request->id);

            $category->status = $request->status;

            // dd($category);

            $category->save();

            return response()->json(['success' => true, "message" => 'Status Updated']);
        }
    }
    public function deleteCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $result = $category->delete();
        return response()->json(['success' => true, "message" => 'Delete Category Successfully']);
    }
}