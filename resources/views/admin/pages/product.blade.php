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
                        <h4 class="mb-sm-0 font-size-18">Product</h4>

                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Product</li>
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
                            <h4 class="card-title">Products</h4>
                            {{-- <p class="card-title-desc">DataTables has most features enabled by
                                default, so all you need to do to use it with your own tables is to call
                                the construction function: <code>$().DataTable();</code>.
                            </p> --}}
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end"> <!-- Updated class name -->
                                <a href="{{ route('admin.add-product') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Add Product</a> <!-- Removed flex-justify-end class -->
                            </div>
                            <table table id="productstable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Vendor</th>
                                        <th>Publish Date</th>
                                        <th>Product Status</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($data['products'] as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('upload/'.$product->image) }}" class="rounded-circle" width="50" height="50" alt="">{{ $product->name }}</td>
                                        <td>{{ $product->vendor->name }}</td>
                                        <td><button type="button" id="active-inactive" class='btn btn-{{ $product->status == 1 ? "success":"danger"}} btn-rounded' data-product-id="{{ $product->id }}">{{$product->status == 1 ? "Active":"Inactive"}}</button></td>
                                        <td>{{ $product->price }}</td>
                                        <td><a href="{{ route('admin.add-product',['id'=>$product->id])}}"><i class="fas fa-edit"></i></a></td>
                                        {{-- <a href="{{ route('admin.edit-product')}}"><i class="fas fa-edit"></i></a> 
                                    </tr>
                                        @endforeach --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Vendor</th>
                                        <th>Publish Date</th>
                                        <th>Product Status</th>
                                        <th>Status</th>
                                        <th>Price</th>
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    $(document).ready(function()
    {

        var table = $('#productstable').DataTable({
            // processing: true,
            serverSide: false,
            ajax: {
                url: "{{ route('admin.your-product') }}",
                dataType: 'json',
                dataSrc: 'products' // Set the data source to an empty string to match the response structure
            },
            columns: [{
                    data: 'id'
                },
                {
                data: null,
                render: function(data) {
                    return '<img src="{{asset("upload/")}}/' + data.image + '" alt="Category image" class="avatar-sm rounded-circle me-2"/>' +
                        '<span>' + data.name + '</span>';
                    }
                },
                {
                    data: 'vendor'
                },
                {
                    data:'publish_date'
                },
                {
                    data: null,
                    render: function(data) {
                        var approvedClass = (data.is_approved == 1) ? 'success' : 'danger';
                        var approvedText = (data.is_approved == 1) ? 'Approved' : 'Declined';
                        var buttonId = 'approved-declined-' + data
                            .id; // Generate unique id using product ID
                        return '<button type="button" id="' + buttonId + '" class="btn btn-' +
                            approvedClass + ' btn-rounded approved-declined" data-product-id="' +
                            data.id + '">' +
                            approvedText + '</button>';
                    }
                },
                {
                    data: null,
                    render: function(data) {
                        var statusClass = (data.status == 1) ? 'success' : 'danger';
                        var statusText = (data.status == 1) ? 'Active' : 'Inactive';
                        var buttonId = 'active-inactive-' + data
                            .id; // Generate unique id using product ID
                        return '<button type="button" id="' + buttonId + '" class="btn btn-' +
                            statusClass + ' btn-rounded active-inactive" data-product-id="' +
                            data.id + '">' +
                            statusText + '</button>';
                    }
                },
                {
                    data: 'price'
                },
                {
                    data: null,
                    render: function(data) {
                        return '<a class="btn btn-info btn-sm" title="View" href="{{ route('admin.view-product') }}?id=' + data.id +
                            '"><i class="mdi mdi-eye d-block font-size-16"></i></a>'
                            +'<a class="btn btn-success btn-sm mx-2" title="Edit" href="{{ route('admin.add-product') }}?id=' + data.id +
                            '"><i class="mdi mdi-pencil d-block font-size-16"></i></a>'
                            +'<a class="delete btn btn-danger btn-sm" title="Delete" href="{{ route('admin.delete-product') }}?id=' + data.id +
                            '"><i class="mdi mdi-trash-can d-block font-size-16"></i></a>';
                    }
                }
            ],
            order: [[1, 'asc']]
        });

        $(document).on("click", ".active-inactive", function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');

            // Determine the initial selected status based on data attribute
            var initialStatus = $(this).text().trim();

            // Generate the HTML for the select box
            var selectBoxHtml = `
        <select id="status-select" class="swal2-select">
            <option value="1" ${initialStatus === 'Active' ? 'selected' : ''}>Active</option>
            <option value="0" ${initialStatus === 'Inactive' ? 'selected' : ''}>Inactive</option>
        </select>
    `;

            // Open SweetAlert confirmation dialog
            Swal.fire({
                title: 'Update Status',
                html: selectBoxHtml,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    // Get the selected status
                    var status = $('#status-select').val();

                    // Send an AJAX request to update the status
                    return $.ajax({
                        url: "{{ route('admin.update-status') }}",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: productId,
                            status: parseInt(status)
                        }
                    }).then(response => {
                        if (response.success) {
                            // Return the updated status for display in the Swal dialog
                            var toast = Swal.fire({
                                icon: 'success',
                                title: response.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                showClass: {
                                    popup: 'swal2-noanimation',
                                    backdrop: 'swal2-noanimation'
                                },
                                hideClass: {
                                    popup: '',
                                    backdrop: ''
                                }
                            });

                            table.ajax.reload();

                            return response.newStatus;
                        } else {
                            // Return an error message if the status update fails
                            throw new Error(response.error);
                        }
                    }).fail(xhr => {
                        throw new Error(xhr.responseText);
                    });
                }
            }).then(result => {
                if (result.value) {
                    // Update the status in the table
                    $("#active-inactive-" + productId + "[data-product-id='" + productId + "']")
                        .text(result.value);
                        // table.draw();
                }
            }).catch(error => {
                console.log(error);
            });
        });

        $(document).on('click', '.delete', function (e) {
    e.preventDefault();
    var href = $(this).attr("href");
    console.log(href);

    // Open SweetAlert confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this data!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, proceed with the delete action
            $.ajax({
                url: href,
                success: function (data) {
                    var toast = Swal.fire({
                        icon: 'success',
                        title: data.message, // Use data instead of response
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        showClass: {
                            popup: 'swal2-noanimation',
                            backdrop: 'swal2-noanimation'
                        },
                        hideClass: {
                            popup: '',
                            backdrop: ''
                        }
                    });
                    // Reload the table or perform any necessary action
                    // Here, assuming table is the ID of the table element
                    $('#productstable').DataTable().ajax.reload();
                },
                error: function (xhr, status, error) {
                    // Handle error response
                }
            });
        }
    });
});
        $(document).on("click", ".approved-declined", function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');

            // Determine the initial selected status based on data attribute
            var initialStatus = $(this).text().trim();

            // Generate the HTML for the select box
            var selectBoxHtml = `
        <select id="approve-select" class="swal2-select">
            <option value="1" ${initialStatus === 'Approved' ? 'selected' : ''}>Approved</option>
            <option value="0" ${initialStatus === 'Declined' ? 'selected' : ''}>Declined</option>
        </select>
    `;

            // Open SweetAlert confirmation dialog
            Swal.fire({
                title: 'Update Status',
                html: selectBoxHtml,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    // Get the selected status
                    var status = $('#approve-select').val();

                    // Send an AJAX request to update the status
                    return $.ajax({
                        url: "{{ route('admin.update-approve') }}",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: productId,
                            is_approved: parseInt(status)
                        }
                    }).then(response => {
                        if (response.success) {
                            // Return the updated status for display in the Swal dialog
                            var toast = Swal.fire({
                                icon: 'success',
                                title: response.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                showClass: {
                                    popup: 'swal2-noanimation',
                                    backdrop: 'swal2-noanimation'
                                },
                                hideClass: {
                                    popup: '',
                                    backdrop: ''
                                }
                            });

                            table.ajax.reload();

                            return response.newStatus;
                        } else {
                            // Return an error message if the status update fails
                            throw new Error(response.error);
                        }
                    }).fail(xhr => {
                        throw new Error(xhr.responseText);
                    });
                }
            }).then(result => {
                if (result.value) {
                    // Update the status in the table
                    $("#active-inactive-" + productId + "[data-product-id='" + productId + "']")
                        .text(result.value);
                        // table.draw();
                }
            }).catch(error => {
                console.log(error);
            });
        });


    })
</script>
{{-- <script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {

            var $form = $(".require-validation"),

                inputSelector = ['input[type=email]', 'input[type=password]',

                    'input[type=text]', 'input[type=file]',

                    'textarea'

                ].join(', '),

                $inputs = $form.find('.required').find(inputSelector),

                $errorMessage = $form.find('div.error'),

                valid = true;

            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');

            $inputs.each(function(i, el) {

                var $input = $(el);

                if ($input.val() === '') {

                    $input.parent().addClass('has-error');

                    $errorMessage.removeClass('hide');

                    e.preventDefault();

                }

            });

            if (!$form.data('cc-on-file')) {

                e.preventDefault();

                Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                Stripe.createToken({

                    number: $('.card-number').val(),

                    cvc: $('.card-cvc').val(),

                    exp_month: $('.card-expiry-month').val(),

                    exp_year: $('.card-expiry-year').val()

                }, stripeResponseHandler);

            }

        });

        function stripeResponseHandler(status, response) {

            if (response.error) {

                $('.error')

                    .removeClass('hide')

                    .find('.alert')

                    .text(response.error.message);

            } else {

                /* token contains id, last4, and card type */

                var token = response['id'];

                $form.find('input[type=text]').empty();

                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                $form.get(0).submit();

            }

        }

    });
</script> --}}
