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
                            {{ isset($data['product']->id) ? 'Edit' : 'Add' }} Product
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.add-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="rounded-circle border overflow-hidden position-relative"
                                        style="width: 150px; height: 150px;">
                                        <label for="imageInput"
                                            class="position-absolute top-0 start-0 w-100 h-100 m-0 p-0">
                                            <img id="previewImage"
                                                src="{{ isset($data['product']) ? asset('upload/' . $data['product']->image) : '' }}"
                                                alt="#" class="w-100 h-100 object-fit-cover">
                                            <input type="file" name="image" id="imageInput"
                                                class="position-absolute top-0 start-0 w-100 h-100 opacity-0"
                                                style="visibility: hidden">
                                            <p class="text-center">Upload image</p>
                                        </label>
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="{{ $data['product']->id ?? '' }}">
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter the Product Name"
                                            name="name"
                                            value="{{ isset($data['product']) ? $data['product']->name : old('name') }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            <?php foreach ($data['categories'] as $category) {?>
                                            <option value="{{ $category->id }}"
                                                {{ isset($data['product']) && $data['product']->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" placeholder="Enter the Price"
                                            name="price"
                                            value="{{ isset($data['product']) ? $data['product']->price : old('price') }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="publish_date" class="form-label">Publish Date</label>
                                        <input type="text" class="form-control" name="publish_date" id="publish_date"
                                            value="{{ isset($data['product']) ? $data['product']->publish_date : old('publish_date') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="tags">Tags</label>
                                        <select class="form-control" name="tags[]" id="tags"
                                            placeholder="This is a placeholder" multiple>
                                            @foreach ($data['tags'] as $tag)
                                                <option value="{{ $tag->id }}"
                                                    {{ isset($data['selectedTags']) && in_array($tag->id, $data['selectedTags']) ? 'selected' : '' }}>
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="row mt-3 discount">
                                    <div class="col-12 d-flex align-items-center">
                                        <label for="discounted" class="form-label col-4">Is this product
                                            discounted?</label>
                                        <div class="square-switch col-4">
                                            <input type="checkbox" id="discounted" switch="bool"
                                                {{ isset($data['product']) && $data['product']->discount_percentage ? 'checked' : '' }} />
                                            <label for="discounted" data-on-label="Yes" data-off-label="No"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 discount_percent">
                                    <div class="form-group col-6">
                                        <label for="discount_percentage" class="form-label">Discount Percentage</label>
                                        <input type="number" name="discount_percentage" id="discount_percentage"
                                            class="form-control"
                                            value="{{ isset($data['product']) ? $data['product']->discount_percentage : old('discount_percentage') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-12">
                                        <label for="small_description">Small Description</label>
                                        <textarea name="small_description" id="small_description" cols="30" rows="10">{{ isset($data['product']) ? $data['product']->small_description : old('small_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-12">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10">{{ isset($data['product']) ? $data['product']->description : old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-12">
                                        <label for="tnc">Terms and Conditions</label>
                                        <textarea name="tnc" id="tnc" cols="30" rows="10">{{ isset($data['product']) ? $data['product']->tnc : old('tnc') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="basicpill-tnc-id-input" class="form-label">Product
                                                Additional Images</label>
                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn">
                                                        <p>Upload images</p>
                                                        <input name="additional_images[]" type="file"
                                                            id="additional_images" multiple=""
                                                            data-max_length="20" class="upload__inputfile">
                                                    </label>
                                                </div>
                                                <div id="show-img"></div>
                                            </div>
                                        </div>
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
        $(document).ready(function() {
            // Check if the gallery has existing images
            const gallery = {!! isset($data['product']) && !empty($data['product']->gallery)
                ? json_encode($data['product']->gallery)
                : 'null' !!};

            // Display existing images in the gallery
            if (gallery) {
                const fileInput = document.getElementById('additional_images');
                const uploadImgWrap = displayImages(fileInput, gallery);
                document.getElementById('show-img').appendChild(uploadImgWrap);
            }

            // Listen for file input change event
            document.getElementById('additional_images').addEventListener('change', function() {
                const uploadImgWrap = displayImages(this, null);
                document.getElementById('show-img').innerHTML = '';
                document.getElementById('show-img').appendChild(uploadImgWrap);
            });

            // Function to display uploaded images
            function displayImages(fileInput, gallery) {
                const uploadImgWrap = document.createElement('div');
                uploadImgWrap.classList.add('upload__img-wrap');

                const files = fileInput.files;

                // Display uploaded images
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imageBox = document.createElement('div');
                        imageBox.classList.add('upload__img-box');

                        const image = document.createElement('div');
                        image.style.backgroundImage = `url(${e.target.result})`;
                        image.dataset.number = i + 1;
                        image.classList.add('img-bg');

                        const closeIcon = document.createElement('div');
                        closeIcon.classList.add('upload__img-close');
                        closeIcon.addEventListener('click', function() {
                            const imageBox = this.parentNode;
                            const uploadImgWrap = imageBox.parentNode;
                            uploadImgWrap.removeChild(imageBox);
                        });

                        image.appendChild(closeIcon);
                        imageBox.appendChild(image);
                        uploadImgWrap.appendChild(imageBox);
                    };

                    reader.readAsDataURL(file);
                }

                // Display existing gallery images if available
                if (gallery && gallery.length > 0) {
                    gallery.forEach((item) => {
                        const imageBox = document.createElement('div');
                        imageBox.classList.add('upload__img-box');

                        const image = document.createElement('div');
                        image.style.backgroundImage =
                            `url({{ asset('upload/${item.image}') }})`;
                        image.dataset.number = item.id;
                        image.classList.add('img-bg');

                        const closeIcon = document.createElement('div');
                        closeIcon.classList.add('upload__img-close');
                        closeIcon.addEventListener('click', function() {
                            const imageBox = this.parentNode;
                            const uploadImgWrap = imageBox.parentNode;
                            $.ajax({
                                url: "{{ route('admin.delete-gallery', ['imageId' => '__imageId__']) }}"
                                    .replace('__imageId__', imageId),
                                type: 'DELETE',
                                success: function(response) {
                                    // Handle the successful deletion, such as removing the image from the UI
                                    uploadImgWrap.removeChild(imageBox);
                                },
                                error: function(xhr, status, error) {
                                    // Handle the error, if any
                                    console.error(error);
                                }
                            });
                        });

                        image.appendChild(closeIcon);
                        imageBox.appendChild(image);
                        uploadImgWrap.appendChild(imageBox);
                    });
                }

                return uploadImgWrap;
            }

            // Other code...
        });


    })
</script>
