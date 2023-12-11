@extends('admin.admin_dashboard')
@section('admin')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Normal Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Normal Users</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->

        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>phone</th>

                            <th>Type</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $NormalUser as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>

                                <td><span class="btn btn-success">{{ $item->type }}</span></td>
                                <td class="d-flex">
                                    <a href="{{ route('normal.User.details',$item->id) }}" class="btn btn-info mx-1">Details</a>




                                    {{--                                <a href="{{ route('delete.brand',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>--}}

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th> Name</th>
                            <th>email</th>
                            <th>phone</th>

                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
