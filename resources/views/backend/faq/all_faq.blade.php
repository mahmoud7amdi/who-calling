@extends('admin.admin_dashboard')
@section('admin')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Faq</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Faq</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.faq') }}" class="btn btn-primary">Add Faq</a>

                </div>
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
                            <th>question ar</th>
                            <th>question en</th>
                            <th>answer ar</th>
                            <th>answer en</th>

                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allfaq as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->question_ar }}</td>
                                <td>{{ $item->question_en }}</td>
                                <td>{{ $item->answer_ar }}</td>
                                <td>{{ $item->answer_en }}</td>

                                <td class="d-flex">
                                    <a href="{{ route('edit.faq',$item->id) }}" class="btn btn-info mx-1">Edit</a>
                                    <form action="{{ route('delete.faq',$item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger" type="submit"  value="Delete"  />
                                    </form>


                                    {{--                                <a href="{{ route('delete.brand',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>--}}

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>question ar</th>
                            <th>question en</th>
                            <th>answer ar</th>
                            <th>answer en</th>

                            <th>Action</th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
