<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <?php echo date('Y'); ?> © E-commerce.
            </div>

        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">

    <div data-simplebar class="h-100">

        <div class="rightbar-title d-flex align-items-center bg-dark p-3">

            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">

                <i class="mdi mdi-close noti-icon"></i>

            </a>

        </div>

        <!-- Settings -->
        <hr class="m-0" />

        <div class="p-4">

            <h6 class="mb-3">Layout</h6>

            <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">

                <label class="form-check-label" for="layout-vertical">Vertical</label>

            </div>

            <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">

                <label class="form-check-label" for="layout-horizontal">Horizontal</label>

            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

            <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">

                <label class="form-check-label" for="layout-mode-light">Light</label>

            </div>

            <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">

                <label class="form-check-label" for="layout-mode-dark">Dark</label>

            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

            <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild"
                    value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">

                <label class="form-check-label" for="layout-width-fuild">Fluid</label>

            </div>

            <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed"
                    value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">

                <label class="form-check-label" for="layout-width-boxed">Boxed</label>

            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
                    value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                <label class="form-check-label" for="layout-position-fixed">Fixed</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable"
                    value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light"
                    value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark"
                    value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                    value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                <label class="form-check-label" for="sidebar-size-default">Default</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                    value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                <label class="form-check-label" for="sidebar-size-compact">Compact</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small"
                    value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light"
                    value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                <label class="form-check-label" for="sidebar-color-light">Light</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark"
                    value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                <label class="form-check-label" for="sidebar-color-dark">Dark</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand"
                    value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                <label class="form-check-label" for="sidebar-color-brand">Brand</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Direction</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                    value="ltr">
                <label class="form-check-label" for="layout-direction-ltr">LTR</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                    value="rtl">
                <label class="form-check-label" for="layout-direction-rtl">RTL</label>
            </div>

        </div>

    </div> <!-- end slimscroll-menu-->
</div>
{{-- @include('admin.deleteModel') --}}

<!-- Right bar overlay-->

<div class="rightbar-overlay"></div>

<!-- /Right-bar -->

<!-- JAVASCRIPT -->





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
<!-- apexcharts -->
<script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>
<!-- pace js -->
<script src="{{ asset('assets/admin/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
{{-- <script src="{{ asset('assets/admin/libs/pace-js/pace.min.js') }}"></script> --}}
<script src="{{ asset('assets/admin/libs/@simonwep/pickr/pickr.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ asset('assets/admin/libs/flatpickr/flatpickr.min.js') }}"></script>
<!-- dashboard init -->
<script src="{{ asset('assets/admin/js/pages/dashboard.init.js') }}"></script>

<!-- glightbox js -->
<script src="{{ asset('assets/admin/libs/glightbox/js/glightbox.min.js')}}"></script>
<!-- choices js -->
<script src="{{asset('assets/admin/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<!-- lightbox init -->
<script src="{{ asset('assets/admin//js/pages/lightbox.init.js')}}"></script>
<!-- App js -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script>
    //Classic editors
    $(document).ready(function() {

        // var dataTable =
        // var productsData = {!! isset($data['products']) ? json_encode($data['products']) : '[]' !!};
        
        










        $('.discount input[type=checkbox]').change(function() {
            if ($(this).prop('checked')) {
                $('.discount_percent').show();
            } else {
                $('.discount_percent').hide();
            }
        });
        $('.discount input[type=checkbox]').trigger('change');

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageInput").change(function() {
            readURL(this);
        });


        var multipleCancelButton = new Choices(
            '#tags', {
                removeItemButton: true,
            }
        );



        ClassicEditor
            .create(document.querySelector('#description'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#small_description'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#tnc'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });
        flatpickr('#publish_date', {
            enableTime: false,
            minDate: "today",
            dateFormat: "Y-m-d"
        });



        

        




    })
</script>


</body>

</html>
