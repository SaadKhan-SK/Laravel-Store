@include('admin.layouts.header', ['title' => 'Slider'])

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
                                                    <a href="{{asset('upload/'.$data['slider']->image)}}"
                                                        class="image-popup">
                                                        <img style="aspect-ratio:1;"
                                                            src="{{asset('upload/'.$data['slider']->image)}}"
                                                            class="img-fluid rounded-circle d-block" alt="work-thumbnail">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h3 class="font-size-24 mb-1">
                                                        {{$data['slider']->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <a href="{{route('admin.cms.slider',['id'=>$data['slider']->id])}}"
                                                    class="btn btn-info"><i class="me-1"></i> Edit</a>
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
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#sliderDescription" role="tab"
                                            aria-selected="false">Description</a>
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
                                            {!! isset($data['slider']) ? '' : '' !!}
                                                <div class="pb-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Heading :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">{{$data['slider']->heading ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Discount :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">{{$data['slider']->discount ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Heading 2 :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">{{$data['slider']->heading_2 ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Sub Heading :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">{{$data['slider']->sub_heading ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Button</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2">
                                                                    {{$data['slider']->button ?? ''}}</p>
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


                            <div class="tab-pane" id="sliderDescription" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Description</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            {!! $data['slider']->description !!}
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
