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
                            About
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.cms.about')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="rounded-circle border overflow-hidden position-relative"
                                        style="width: 150px; height: 150px;">
                                        <label for="imageInput"
                                            class="position-absolute top-0 start-0 w-100 h-100 m-0 p-0">
                                            <img id="previewImage"
                                                src="{{ isset($data['about']) ? asset('upload/' . $data['about']->image) : '' }}"
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
                                        <label for="heading" class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" id="heading"
                                            placeholder="Enter Heading"
                                            value="{{ isset($data['about']) ? $data['about']->heading : old('heading') }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sub_heading" class="form-label">Sub Heading</label>
                                        <input type="text" class="form-control" name="sub_heading" id="sub_heading"
                                            placeholder="Enter Sub Heading"
                                            value="{{ isset($data['about']) ? $data['about']->sub_heading : old('sub_heading') }}">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="button" class="form-label">Button</label>
                                    <input type="text" class="form-control" name="button" id="button"
                                        placeholder="Enter Sub Heading"
                                        value="{{ isset($data['about']) ? $data['about']->button : old('button') }}">
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label for="section_1" class="form-label">Section 1</label>
                                        <textarea type="text" class="form-control" name="section_1" placeholder="Enter Section 1" id="section_1">{{ isset($data['about']) ? $data['about']->section_1 : old('section_1') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label for="section_2" class="form-label">Section 2</label>
                                        <textarea type="text" class="form-control" name="section_2" placeholder="Enter Section 2" id="section_2">{{ isset($data['about']) ? $data['about']->section_2 : old('section_2') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label for="section_3" class="form-label">Section 3</label>
                                        <textarea type="text" class="form-control" name="section_3" placeholder="Enter Section 3" id="section_3">{{ isset($data['about']) ? $data['about']->section_3 : old('section_3') }}</textarea>
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
            .create(document.querySelector('#section_1'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#section_2'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#section_3'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });
    })
</script>
