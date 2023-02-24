@extends('layouts.admin')
@section('admin')
    <section class="main-section">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-3">
                <div class="align-self-center">
                    <h2 class="common-title mb-0">Manage Practices</h2>
                </div>
                <div class="align-self-center">
                    <a href="#addPrac" class="btn btn-sm btn-primary" data-bs-toggle="modal"><i
                            class='ri-add-line align-middle me-1'></i>Add Practice</a>
                </div>
            </div>
            <!-- Add Records Modal -->
            <!-- modal -->
            <div class="modal fade" id="addPrac" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Practice Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <form action="{{route('admin.setting.practice.save')}}" method="post" id="practice_submit_frm">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Address 1</label>
                                        <input type="text" name="address_1" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Address 2</label>
                                        <input type="text" name="address_2" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="savePrac">Save
                                    <i class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="table-responsive patient_table ">
                <table class="table table-sm table-bordered c_table">
                    <thead>
                    <tr>
                        <th>Practice Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Contact Person</th>
                        <th>User Count</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="prc_tbl">

                    </tbody>
                </table>
            </div>



            <div class="modal fade" id="editPrac" data-bs-backdrop="static"
                 data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Practice Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <form action="{{route('admin.practice.update')}}" method="post" id="prc_update">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm prcname" required>
                                        <input type="hidden" name="prc_id" class="form-control form-control-sm prc_id" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Address 1</label>
                                        <input type="text" name="address_1" class="form-control form-control-sm prcaddress_1" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Address 2</label>
                                        <input type="text" name="address_2" class="form-control form-control-sm prcaddress_2" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm prcemail" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" class="form-control form-control-sm prcphone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save<i
                                        class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('js')
    <script>
        $('.bx-spin').hide();
        $(document).ready(function () {

            //load practice

            var ENDPOINT = "{{ url('/') }}";
            var page = 1;
            var current_page = 0;
            let bool = false;
            let lastPage;
            var currentscrollHeight = 0;


            $(window).scroll(function() {
                const scrollHeight = $(document).height();
                const scrollPos = Math.floor($(window).height() + $(window).scrollTop());
                const isBottom = scrollHeight - 100 < scrollPos;
                if (isBottom && currentscrollHeight < scrollHeight) {
                    page++;
                    //alert('calling...');
                    var myurl = ENDPOINT + '/admin/setting/practice/get/all?page=' + page
                    getData(myurl);
                    currentscrollHeight = scrollHeight;
                }
            });


            function getAllPractice(){
                page = 1;
                currentscrollHeight = 0;
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.get.all.practice')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'type' : 1
                    },
                    success: function (data) {
                        console.log(data);
                        $('.prc_tbl').empty();
                        if (data.count_prc > 0){
                            $('.prc_tbl').append(data.view);
                        }
                        $('.loading2').hide();
                    }
                });
            };

            getAllPractice();


            // create practice
            $(document).on('submit','#practice_submit_frm',function (e) {
                e.preventDefault();
                $('.bx-spin').show();

                var data = $(this).serialize();
                console.log(data);

                var formData = new FormData(this);
                $.ajax({
                    method:'POST',
                    url: "{{ route('admin.setting.practice.save') }}",
                    data: data,
                    success: (data) => {
                        console.log(data);
                        if (data == 'prac_created'){
                            $('.bx-spin').hide();
                        }else {
                            $('.bx-spin').hide();
                        }
                        $('#addPrac').modal('hide');
                        getAllPractice();
                        // toastr["success"]("Form Successfully Created", 'SUCCESS!');

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });


            //single practice
            $(document).on('click','.editPrc',function (e) {
                e.preventDefault();
                let prc_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.get.single.practice')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'prc_id' : prc_id
                    },
                    success: function (data) {
                        console.log(data);
                        $('#editPrac').modal('show');
                        $('.prc_id').val(data.id);
                        $('.prcname').val(data.name);
                        $('.prcaddress_1').val(data.address1);
                        $('.prcaddress_2').val(data.address2);
                        $('.prcemail').val(data.email_id);
                        $('.prcphone').val(data.phone);
                    }
                });
            });


            // update practice
            $(document).on('submit','#prc_update',function (e) {
                e.preventDefault();
                $('.bx-spin').show();

                var data = $(this).serialize();
                console.log(data);

                var formData = new FormData(this);
                $.ajax({
                    method:'POST',
                    url: "{{ route('admin.practice.update') }}",
                    data: data,
                    success: (data) => {
                        console.log(data);
                        if (data == 'prac_updated'){
                            $('.bx-spin').hide();
                        }else {
                            $('.bx-spin').hide();
                        }
                        $('#editPrac').modal('hide');
                        getAllPractice();
                        // toastr["success"]("Form Successfully Created", 'SUCCESS!');

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            //delete practice
            $(document).on('click','.deletePrc',function (e) {
                e.preventDefault();
                let prc_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.get.practice.delete')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'prc_id' : prc_id
                    },
                    success: function (data) {
                        console.log(data);
                        getAllPractice();
                    }
                });
            });



        });



        function getData(myurl) {
            $.ajax({
                url: myurl,
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'type': 1,
                },
                datatype: "html"
            }).done(function(data) {
                console.log(data)
                if (data.count_prc > 0){
                    $('.prc_tbl').append(data.view);
                }
                $('.loading2').hide();
                // location.hash = myurl;
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
                $('.loading2').hide();
            });
        }
    </script>
@endsection
