@include('admin.layouts.header', ['title' => 'Dashboard'])

@include('admin.layouts.menu')
<style>
    .hide {
        display: none;
    }
</style>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xl me-3">
                                                    <a href="{{asset('upload/'.$data['product']->image)}}"
                                                        class="image-popup">
                                                        <img tyle="aspect-ratio:1;"
                                                            src="{{asset('upload/'.$data['product']->image)}}"
                                                            class="img-fluid rounded-circle d-block" alt="work-thumbnail">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h3 class="font-size-24 mb-1">
                                                        {{$data['product']->name}}</h3>
                                                    <p class="font-size-18">Rs. {{$data['product']->price}}</p>
                                                    <p class="text-muted font-size-13">Status:
                                                        <span class="btn btn-sm btn-{{$data['product']->is_approved == 1  ? "success" : "danger"}}">{{$data['product']->is_approved == 1 ? "Approved":"Declined"}}</span>

                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <a href="{{route('admin.add-product',['id'=>$data['product']->id])}}"
                                                    class="btn btn-info"><i class="me-1"></i> Edit</a>
                                            </div>

                                            <div>
                                                <span class="btn btn-{{$data['product']->status == 1 ?  "success":"danger"}}">{{$data['product']->status == 1 ? "Active":"Inactive"}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab"
                                            aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#productDescription" role="tab"
                                            aria-selected="false">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#producttnc" role="tab"
                                            aria-selected="false">Terms &amp; Conditions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#productgallery" role="tab"
                                            aria-selected="false">Product Gallery</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">About</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            {!! isset($data['product']) ? '' : '' !!}
                                                <div class="pb-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Title :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">{{$data['product']->name ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Date of Creation:</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">
                                                                    {{$data['product']->created_at_formatted ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Publish Date:</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">
                                                                    {{$data['product']->publish_date_formatted ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! isset($data['product']->discount_percentage) ? '' : '' !!}
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Is Discounted :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">{{$data['product']->discount_percentage ? "Yes" : "No" }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{""}}
                                                @if(!is_null($data['product']->discount_percentage))
                                                    <div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Discount Percentage:</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p class="mb-2">{{ $data['product']->discount_percentage }}%</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif


                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Price:</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">Rs. {{$data['product']->price ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                            </div>
                            <!-- end tab pane -->


                            <div class="tab-pane" id="productDescription" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Description</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            {!! $data['product']->description !!}
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="producttnc" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Terms &amp; Conditions</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            {!! $data['product']->tnc !!}
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            
                            <!-- end tab pane -->
                            <div class="tab-pane" id="productgallery" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Gallery</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($data['product']['gallery'] as $image)
                                                <div class="col-md-2">
                                                    <div class="card">
                                                        <a href="{{ asset('upload/'.$image['image']) }}" class="image-popup">
                                                            <img src="{{ asset('upload/'.$image['image']) }}" class="card-img-top" alt="Product Image" style="width: 200px;">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            
                            
                            
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@include('admin.layouts.footer');
