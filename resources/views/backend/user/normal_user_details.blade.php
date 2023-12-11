@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Normal User Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Normal User Details</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="{{ route('premium.user.approve') }}" enctype="multipart/form-data">
                                    @method('Put')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $NormalUserDetails->id }}">




                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $NormalUserDetails->first_name }}" name="first_name" disabled/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Last Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input  type="text" class="form-control" value="{{ $NormalUserDetails->last_name }}" name="last_name" disabled/>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="email" class="form-control" value="{{  $NormalUserDetails->email }}" disabled/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input  name="phone" class="form-control" value="{{ $NormalUserDetails->phone }}" disabled/>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">company</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $NormalUserDetails->company }}" name="company" disabled/>
                                        </div>

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">User Image</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <img id="showImage" src=" {{ (!empty($NormalUserDetails->photo)) ? url('uploads/profile_image/'.$NormalUserDetails->photo):url('uploads/no_image.jpg') }}" alt="Admin" style="width: 100px; height: 100px;" width="110">

                                            </div>
                                        </div>




                                        <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-danger px-4" value="Premium User" />
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function (){--}}
{{--            $('#image').change(function (e){--}}
{{--                var reader = new FileReader();--}}
{{--                reader.onload = function (e){--}}
{{--                    $('#showImage').attr('src',e.target.result)--}}
{{--                }--}}
{{--                reader.readAsDataURL(e.target.files['0']);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


@endsection
