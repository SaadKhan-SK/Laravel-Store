<?php

namespace App\Http\Controllers;

use App\Http\Libraries\Generic;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tag()
    {
        return view('admin.pages.tags');
    }
    public function allTags()
    {
        $tags = Tag::all();
        $formattedTags = [];

        foreach ($tags as $tag) {
            $formattedTags[] = [
                'id' => $tag->id,
                'name' => $tag->name,
                'status' => $tag->status
            ];
        }

        $data['tags'] = $formattedTags;

        return response()->json($data);
    }
    public function addTag(Request $request)
    {
        $data = [];

        if ($request->id) {
            $tag = Tag::findOrFail($request->id);
            $data['tag'] = $tag;
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
            ], [
                'name.required' => 'Tag Name is required',
            ]);

            $value = [
                'name' => $request->name,
            ];

            if ($request->id) {
                $tag = Tag::findOrFail($request->id);
                $tag->update($value);
                $message = "Tag Updated Successfully";
            } else {
                // Create a new tag
                $tag = Tag::create($value);
                $message = "Tag Added Successfully";
            }

            if ($tag) {
                return redirect()->route('admin.tag')->with('success', $message);
            } else {
                return redirect()->back()->with('fail', "Something went wrong!");
            }
        }

        return view('admin.pages.addTag', compact('data'));
    }


    public function updateStatus(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'status' => 'required',
                'id' => 'required'
            ]);

            $tag = Tag::findOrFail($request->id);

            $tag->status = $request->status;

            // dd($tag);

            $tag->save();

            return response()->json(['success' => true, "message" => 'Status Updated']);
        }
    }
    public function deleteTag(Request $request)
    {
        $tag = Tag::findOrFail($request->id);
        $result = $tag->delete();
        return response()->json(['success' => true, "message" => 'Delete Tag Successfully']);
    }
}
