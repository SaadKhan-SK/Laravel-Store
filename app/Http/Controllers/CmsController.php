<?php

namespace App\Http\Controllers;

use App\Http\Libraries\Generic;
use App\Models\About;
use App\Models\CmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CmsController extends Controller
{
    //
    public function about(Request $request)
    {
        $about = About::findOrFail(1);
        $data['about'] = $about;

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'heading' => 'required',
                'sub_heading' => 'required',
                'section_1' => 'required',
                'button' => 'required',
                'section_2' => 'required',
                'section_3' => 'required',
                'image' => 'required|image'
            ], [
                'heading.required' => 'Heading is required',
                'sub_heading.required' => 'Sub Heading is required',
                'section_1.required' => 'Section 1 is required',
                'button.required' => 'Button Text is required',
                'section_2.required' => 'Section 2 is required',
                'section_3.required' => 'Section 3 is required',
                'image.required' => "Please upload the image",
                'image.image' => "Please upload an image, not a file"
            ]);
    
            $value = [
                'heading' => $request->heading,
                'sub_heading' => $request->sub_heading,
                'section_1' => $request->section_1,
                'button' => $request->button,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
            ];
    
            if ($request->hasFile('image')) {
                $value['image'] = Generic::upload_image($request->file('image'));
            }
    
            // $about = null;
    
            // if ($request->id) {
                $about = About::findOrFail(1);
                $about->update($value);
            // } else {
                // $about = About::create($value);
            // }
    
            if ($about) {    
                return redirect()->to(route('admin.cms.about'))->with('success', "About Updated Successfully");
            } else {
                return redirect()->back()->with('fail', "Something went wrong!");
            }
        }
        return view('admin.cms.about')->with(["data"=>$data]);
    }
    public function services(Request $request)
    {
        $data=[];
        if($request->id)
        {
            $services = CmsService::findOrFail($request->id);
            $data['service'] = $services;
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'button' => 'required',
                'image' => 'required|image'
            ], [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                'button.required' => 'Button Text is required',
                'image.required' => "Please upload the image",
                'image.image' => "Please upload an image, not a file"
            ]);
    
            $value = [
                'name' => $request->name,
                'description' => $request->description,
                'slug'=>Str::slug($request->name),
                'button' => $request->button,
            ];
    
            if ($request->hasFile('image')) {
                $value['image'] = Generic::upload_image($request->file('image'));
            }
    
            // $services = null;
    
            if ($request->id) {
                $services = CmsService::findOrFail(1);
                $services->update($value);
                $message = "Services Updated Successfully";
            } else {
                $services = CmsService::create($value);
                $message = "Services Added Successfully";
            }
    
            if ($services) {    
                return redirect()->to(route('admin.cms.services'))->with('success', $message);
            } else {
                return redirect()->back()->with('fail', "Something went wrong!");
            }
        }
        return view('admin.cms.service')->with(["data"=>$data]);
    }
    public function allServices()
    {
        $services = CmsService::all();
        $data['services'] = $services;

        return view('admin.cms.allservices')->with(['data'=>$data]);
    }
    public function viewService(Request $request)
    {
        $services = CmsService::findOrFail($request->id);
        $data['service'] = $services;

        return view('admin.cms.viewService')->with(['data'=>$data]);
    }
    public function deleteService(Request $request)
    {
        $service = CmsService::findOrFail($request->id);
        $result = $service->delete();
        if ($result) {    
            return redirect()->to(route('admin.cms.services'))->with('success', "Services Deleted Successfully");
        } else {
            return redirect()->back()->with('fail', "Something went wrong!");
        }
    }
}
