@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> ایجاد حساب جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                        <li class="breadcrumb-item active"> فرم ایجاد حساب جدید</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">فرم ایجاد حساب جدید</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ $edit ? route('accounts.update', $accounts) : url('accounts') }}">
                @csrf
                @if ($edit)
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                            value="{{ $edit ? $accounts->name : '' }}" placeholder="نام ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="last_name"
                            value="{{ $edit ? $accounts->last_name : '' }}" placeholder="نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ایمیل</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            value="{{ $edit ? $accounts->email : '' }}" placeholder="ایمیل">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">تلفن همراه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone"
                            value="{{ $edit ? $accounts->phone : '' }}" placeholder="تلفن همراه">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">مبلغ اولین پرداخت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="first_pay"
                            value="{{ $edit ? $accounts->first_pay : '' }}" placeholder="مبلغ اولین پرداختی">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">آدرس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                            value="{{ $edit ? $accounts->address : '' }}" placeholder="آدرس">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">اطلاعات بانکی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="bank_account_number"
                            value="{{ $edit ? $accounts->bank_account_number : '' }}" placeholder="اطلاعات بانکی">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">سایر توضیحات</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="other_info"
                            value="{{ $edit ? $accounts->other_info : '' }}" placeholder="توضیحات بیشتر">
                    </div>
                </div>
                <div class="card-footer">
                    @if ($edit)
                        <button type="submit" class="btn btn-primary me-2">بروزرسانی</button>
                    @else
                        <button type="submit" class="btn btn-primary me-2">ارسال</button>
                    @endif
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
