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
                                                    <a href="{{asset('upload/'.$data['profile']->image)}}"
                                                        class="image-popup">
                                                        <img tyle="aspect-ratio:1;"
                                                            src="{{asset('upload/'.$data['profile']->image)}}"
                                                            class="img-fluid rounded-circle d-block" alt="work-thumbnail">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h6 class="font-size-16 align-content-center mb-1">
                                                        Name: {{$data['profile']->user->name}}</h6>
                                                    <h6 class="font-size-16 align-content-center mb-1">
                                                        Email: {{$data['profile']->user->email}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <a href="{{route('auth.profile-edit')}}"
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
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#profileDescription" role="tab"
                                            aria-selected="false">Bio</a>
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
                                        <h5 class="card-title mb-0">Overview</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            {!! isset($data['profile']) ? '' : '' !!}
                                                <div class="pb-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Name :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2 text-dark">{{$data['profile']->user->name ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Email:</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <a href="mailto:{{$data['profile']->user->email}}" class="mb-2 text-dark">
                                                                    {{$data['profile']->user->email ?? ''}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Contact:</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <a  href="tel:{{$data['profile']->contact}}" class="mb-2 text-dark">
                                                                    {{$data['profile']->contact ?? ''}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-3">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Address:</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <a href="https://maps.google.com/?q={{$data['profile']->address}}" target="_blank" class="mb-2 text-dark">
                                                                    {{$data['profile']->address ?? ''}}</a>
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


                            <div class="tab-pane" id="profileDescription" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Bio</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            {!! $data['profile']->description !!}
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
