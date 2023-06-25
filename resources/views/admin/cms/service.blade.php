@include('admin.layouts.header', ['title' => 'Services'])

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
                            {{ isset($data['service']->id) ? "Edit" : "Add" }} Service
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.cms.service')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="rounded-circle border overflow-hidden position-relative"
                                        style="width: 150px; height: 150px;">
                                        <label for="imageInput"
                                            class="position-absolute top-0 start-0 w-100 h-100 m-0 p-0">
                                            <img id="previewImage"
                                                src="{{ isset($data['service']) ? asset('upload/' . $data['service']->image) : '' }}"
                                                alt="#" class="w-100 h-100 object-fit-cover">
                                            <input type="file" name="image" id="imageInput"
                                                class="position-absolute top-0 start-0 w-100 h-100 opacity-0"
                                                style="visibility: hidden">
                                            <p class="text-center">Upload image</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter Name"
                                            value="{{ isset($data['service']) ? $data['service']->name : old('name') }}">
                                            <input type="hidden" name="id" value="{{ $data['service']->id ?? '' }}">
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="button" class="form-label">Button</label>
                                        <input type="text" class="form-control" name="button" id="button"
                                            placeholder="Enter Button Text"
                                            value="{{ isset($data['service']) ? $data['service']->button : old('button') }}">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Enter Description" id="ckeditor">{{ isset($data['service']) ? $data['service']->description : old('description') }}</textarea>
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
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });
    })
</script>
