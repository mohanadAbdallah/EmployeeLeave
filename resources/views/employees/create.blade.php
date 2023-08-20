@extends('layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">إضافة موظف جديد</h6>
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
                          action="{{route('employees.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name" class="form-label">الاسم</label>
                                <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name">
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="form-label">الإيميل</label>
                                <input type="text" class="form-control" id="email" value="{{old('email')}}" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <img src="#" alt="Uploaded Image" id="previewImage"
                                     style="display: none;max-width: 75px;max-height: 75px;border-radius: 5px;margin: 18px 150px -37px 0;">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="f-name" class="form-label">رقم الجوال</label>
                                <input type="text" class="form-control" id="phone" value="{{old('phone')}}" name="phone">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <img src="#" alt="Uploaded Image" id="previewImage" style="display: none;width: 40px;">
                                <label for="formFile" class="form-label">الصورة الشخصية</label>
                                <input class="form-control" name="image" style="padding: 9px 22px 0px 1px;height: 48px;"
                                       type="file" id="imageInput">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="jop_title" class="form-label">المسمى الوظيفي</label>
                                <input type="text" class="form-control" id="jop_title" value="{{old('jop_title')}}" name="jop_title">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="parent_id">القسم</label>

                                <select name="department_id" class="form-control" dir="ltr">
                                    <option value="" disabled selected>None</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <input type="password" class="form-control" id="password"  name="password">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password_confirmation" class="form-label">كلمة المرور</label>
                                <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation">
                            </div>
                        </div>

                        <div class="text-left mt-5">
                            <button type="submit" class="btn btn-primary bg-primary">حفظ</button>
                            <a href="#" type="button" style="text-decoration: none;color: white" class="btn btn-danger bg-danger">الخلف</a>
                        </div>

                    </form>
                </div>

            </div>

            <hr>

        </div>
    </div>


    <script type="text/javascript">

        document.getElementById('imageInput').addEventListener('change', function (e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('previewImage').setAttribute('src', e.target.result);
                document.getElementById('previewImage').style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>
    <!-- /.container-fluid -->
@endsection
