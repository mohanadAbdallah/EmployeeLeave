@extends('layouts.employee')

@section('content')
    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">تقديم طلب إجازة</h6>
        </div>
        <div class="container-fluid" dir="rtl">
            <div class="row">
                <div class="col-md-8">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    <form dir="rtl" class=" p-1 p-sm-5 setting-form text-right mb-5" enctype="multipart/form-data"
                          action="{{route('leave-requests.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="parent_id">نوع الإجازة</label>

                                <select name="leave_type_id" class="form-control" dir="ltr">
                                    <option value="" disabled selected>None</option>
                                    @foreach($leaveTypes as $leaveType)
                                        <option value="{{$leaveType->id}}">{{$leaveType->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="start_date" class="form-label">start date</label>
                                <input type="date" class="form-control" id="start_date"
                                       name="start_date">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="end_date" class="form-label">end date</label>
                                <input type="date" class="form-control" id="end_date"
                                       name="end_date">
                            </div>
                        </div>
                        <div class="text-left mt-5">
                            <button type="submit" class="btn btn-primary bg-primary">حفظ</button>
                            <a href="#" type="button" style="text-decoration: none;color: white"
                               class="btn btn-danger bg-danger">الخلف</a>
                        </div>

                    </form>
                </div>

            </div>

            <hr>

        </div>
    </div>
@endsection
