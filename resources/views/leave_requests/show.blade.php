@extends('layouts.employee')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">طلبات الإجازة</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive" dir="rtl">
                    <table class="table table-bordered text-right" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نوع الإجازة</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $_SESSION['i'] = 0 ?>
                        @foreach($leave_request as $item)
                                <?php $_SESSION['i'] = $_SESSION['i'] + 1 ?>
                            <tr>
                                <td>{{$_SESSION['i']}}</td>
                                <td>{{$item->leaveType->name ?? ''}}</td>
                                <td>
                                    <span class="{{$item->status_badge ?? ''}}">
                                        {{$item->LeaveRequestStatus ?? ''}}
                                    </span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="bg-danger btn btn-sm btn-danger"
                                       onclick="cancel({{$item->id}})"
                                       data-toggle="modal" data-target="#cancel_modal"
                                    >
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        Cancel
                                    </a>

                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    {{--    Deny Modal--}}
    <div class="modal fade" id="cancel_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="cancel_form" method="post" action="">
                    @csrf
                    @method('delete')
                    <input name="id" id="leave_request_id" class="form-control" type="hidden">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Cancel.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Confirm Cancel the Leave Request.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary bg-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary bg-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: -30rem;
            display: inline-block;
            width: auto;
        }

        div.dataTables_wrapper div.dataTables_length label {
            font-weight: normal;
            text-align: left;
            margin-left: 36rem;
            margin-top: 0.6rem;
            white-space: nowrap;
        }

        div.dataTables_wrapper div.dataTables_info {
            padding-top: 0.85em;
            margin: 0px 0px 0px 201px;
        }
    </style>
    <script>
        function cancel(id) {
            $('#leave_request_id').val(id);
            var url = "{{url('employee-leave-request')}}/" + id;
            $('#cancel_form').attr('action', url);
        }

    </script>
    <!-- /.container-fluid -->
@endsection
