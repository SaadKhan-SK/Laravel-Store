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

            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">service</h4>

                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">service</li>
                            </ol>
                        </div> 

                    </div>
                </div>
            </div> --}}
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Categories</h4>
                            {{-- <p class="card-title-desc">DataTables has most features enabled by
                                default, so all you need to do to use it with your own tables is to call
                                the construction function: <code>$().DataTable();</code>.
                            </p> --}}
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end"> <!-- Updated class name -->
                                <a href="{{ route('admin.cms.service') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Add Service</a> <!-- Removed flex-justify-end class -->
                            </div>
                            <table table id="serviceTable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['services'] as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td><img src="{{ asset('upload/'.$service->image) }}" class="avatar-sm rounded-circle me-2" width="50" height="50" alt="">{{ $service->name }}</td>
                                        <td><a class="btn btn-success btn-sm mx-2" href="{{ route('admin.cms.view-service',['id'=>$service->id])}}"><i class="mdi mdi-eye d-block font-size-16"></i></a><a class="btn btn-success btn-sm mx-2" href="{{ route('admin.cms.service',['id'=>$service->id])}}"><i class="mdi mdi-pencil d-block font-size-16"></i></a> <a class="delete btn btn-danger btn-sm" title="Delete" href="{{ route('admin.cms.delete-service',['id'=>$service->id])}}"><i class="mdi mdi-trash-can d-block font-size-16"></i></a></td>
                                    </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

</div>
@include('admin.layouts.footer')