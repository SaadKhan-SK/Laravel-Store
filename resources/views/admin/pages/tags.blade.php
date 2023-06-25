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
                            <h4 class="card-title">Tags</h4>
                            {{-- <p class="card-title-desc">DataTables has most features enabled by
                                default, so all you need to do to use it with your own tables is to call
                                the construction function: <code>$().DataTable();</code>.
                            </p> --}}
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end"> <!-- Updated class name -->
                                <a href="{{ route('admin.add-tag') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Add Tag</a> <!-- Removed flex-justify-end class -->
                            </div>
                            <table table id="tagstable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($data['products'] as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('upload/'.$product->image) }}" class="rounded-circle" width="50" height="50" alt="">{{ $product->name }}</td>
                                        <td>{{ $product->vendor->name }}</td>
                                        <td><button type="button" id="active-inactive" class='btn btn-{{ $product->status == 1 ? "success":"danger"}} btn-rounded' data-tag-id="{{ $product->id }}">{{$product->status == 1 ? "Active":"Inactive"}}</button></td>
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
                                        <th>Status</th>
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
    var tagTable = $('#tagstable').DataTable({
            // processing: true,
            serverSide: false,
            ajax: {
                url: "{{ route('admin.all-tags') }}",
                dataType: 'json',
                dataSrc: 'tags' // Set the data source to an empty string to match the response structure
            },
            columns: [{
                    data: 'id'
                },
                {
                data: null,
                render: function(data) {
                    return '<span>' + data.name + '</span>';
                    }
                },
                {
                    data: null,
                    render: function(data) {
                        var statusClass = (data.status == 1) ? 'success' : 'danger';
                        var statusText = (data.status == 1) ? 'Active' : 'Inactive';
                        var buttonId = 'active-inactive-' + data
                            .id; // Generate unique id using tag ID
                        return '<button type="button" id="' + buttonId + '" class="btn btn-' +
                            statusClass + ' btn-rounded active-inactive" data-tag-id="' +
                            data.id + '">' +
                            statusText + '</button>';
                    }
                },
                {
                    data: null,
                    render: function(data) {
                        return '<a class="btn btn-success btn-sm mx-2" title="Edit" href="{{ route('admin.add-tag') }}?id=' + data.id +
                            '"><i class="mdi mdi-pencil d-block font-size-16"></i></a>'
                            +'<a class="delete btn btn-danger btn-sm" title="Delete" href="{{ route('admin.delete-tag') }}?id=' + data.id +
                            '"><i class="mdi mdi-trash-can d-block font-size-16"></i></a>';
                    }
                }
            ],
            order: [[0, 'asc']]


            
        });
        $(document).on("click", ".active-inactive", function(e) {
            e.preventDefault();
            var productId = $(this).data('tag-id');

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
                        url: "{{ route('admin.update-tag-status') }}",
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

                            tagTable.ajax.reload();

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
                    $("#active-inactive-" + productId + "[data-tag-id='" + productId + "']")
                        .text(result.value);
                        // table.draw();
                }
            }).catch(error => {
                console.log(error);
            });
        });
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
