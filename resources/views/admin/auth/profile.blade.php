@include('admin.layouts.header', ['title' => 'Dashboard'])

@include('admin.layouts.menu')
<style>
    .hide {
        display: none;
    }

    .upload__btn {
        display: inline-block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 10px 0px 0px 0px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: #40ba46;
        border-color: #40ba46;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
    }

    .upload__inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Edit Profile
                        </div>
                        <div class="card-body">
                            <form action="{{ route('auth.profile-edit') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="rounded-circle border overflow-hidden position-relative"
                                        style="width: 150px; height: 150px;">
                                        <label for="imageInput"
                                            class="position-absolute top-0 start-0 w-100 h-100 m-0 p-0">
                                            <img id="previewImage"
                                            src="{{ isset($data['profile']) && $data['profile']->image !== null ? asset('upload/' . $data['profile']->image) : '' }}"
                                            alt="#" class="w-100 h-100 object-fit-cover">

                                            <input type="file" name="image" id="imageInput"
                                                class="position-absolute top-0 start-0 w-100 h-100 opacity-0"
                                                style="visibility: hidden">
                                            <p class="text-center">Upload image</p>
                                        </label>
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="{{ $data['profile']->id ?? '' }}">
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter the Name"
                                            name="name"
                                            value="{{ isset($data['profile']) ? $data['profile']->user->name : old('name') }}">
                                            @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Enter the Email"
                                            name="email"
                                            value="{{ isset($data['profile']) ? $data['profile']->user->email : old('email') }}">
                                            @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="contact" class="form-label">Contact Number</label>
                                        <input type="tel" class="form-control" placeholder="Enter Contact Number"
                                            name="contact"
                                            value="{{ isset($data['profile']) ? $data['profile']->contact : old('contact') }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="contact" class="form-label">Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Address"
                                            name="address"
                                            value="{{ isset($data['profile']) ? $data['profile']->address : old('address') }}">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="password" class="form-label">Change Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Change Password"
                                            name="password">
                                            @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password_confirmation" class="form-control" placeholder="Enter Change Password"
                                            name="password_confirmation">
                                            @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-12">
                                        <label for="description" class="form-label">Bio</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ isset($data['profile']) ? $data['profile']->description : old('description') }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
