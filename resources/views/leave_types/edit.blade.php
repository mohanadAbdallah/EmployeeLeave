@extends('layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">تعديل نوع إجازة</h6>
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
                    <form dir="rtl" class="p-1 p-sm-5 setting-form text-right mb-5" enctype="multipart/form-data"
                          action="{{route('leave-types.update', $leaveType->id)}}" method="post">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name" class="form-label">الاسم</label>
                                <input type="text" class="form-control" id="name" value="{{$leaveType->name ?? ''}}" name="name">
                            </div>
                            <div class="col-sm-6">
                                <label for="description" class="form-label">الوصف</label>
                                <textarea class="form-control text-left" name="description">
                                    {{$leaveType->description ?? ''}}
                                </textarea>
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
