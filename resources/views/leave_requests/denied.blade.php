@extends('layouts.master')
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
                            <th>الموظف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $_SESSION['i'] = 0 ?>
                        @foreach($leaveRequests as $leaveRequest)
                                <?php $_SESSION['i'] = $_SESSION['i'] + 1 ?>
                            <tr>
                                <td>{{$_SESSION['i']}}</td>
                                <td>{{$leaveRequest->leaveType->name ?? ''}}</td>

                                <td>
                                    <a href="javascript:void(0)" class="bg-success btn btn-sm btn-success">
                                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                        Approve
                                    </a>
                                </td>

                                <td>{{$leaveRequest->user->name ?? '' }}</td>

                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>
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
  @endsection
