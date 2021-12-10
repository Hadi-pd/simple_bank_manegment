@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>پرداخت جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                        <li class="breadcrumb-item active">ایجاد پرداخت جدید</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">فرم واریز وجه</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ $edit ? route('deposits.update', $deposits) : url('deposits') }}">
                    @csrf
                    @if ($edit)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label>انتخاب حساب</label>
                            <select class="form-control" name="account_id">
                                @if ($edit)
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"
                                            {{ $account->id == $deposits->account_id ? 'selected' : '' }}>
                                            {{ $account->name . ' ' . $account->last_name }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"> {{ $account->name . ' ' . $account->last_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>نوع پرداخت</label>
                            <select class="form-control" name="deposit_type">
                                @if ($edit)
                                    <option value="loan" {{ $deposits->deposit_type == 'loan' ? 'selected' : '' }}>
                                        وام
                                    </option>
                                    <option value="deposit" {{ $deposits->deposit_type == 'deposit' ? 'selected' : '' }}>
                                        سپرده
                                    </option>
                                    <option value="bank" {{ $deposits->deposit_type == 'bank' ? 'selected' : '' }}>
                                        کمکی بانک
                                    </option>
                                @else
                                    <option value="loan">
                                        وام
                                    </option>
                                    <option value="deposit">
                                        سپرده
                                    </option>
                                    <option value="bank">
                                        کمکی بانک
                                    </option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">شماره وام</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="loan_id"
                                value="{{ $edit ? $deposits->loan_id : '' }}" placeholder="شماره وام">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">کد پیگیری</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tracking_code"
                                value="{{ $edit ? $deposits->tracking_code : '' }}" placeholder="کدپیگیری">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">زمان رسید پرداخت</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="deposit_date"
                                value="{{ $edit ? $deposits->deposit_date : '' }}" placeholder="زمان پرداخت رسید">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">مبلغ واریز</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="deposit_amount"
                                value="{{ $edit ? $deposits->deposit_amount : '' }}" placeholder="مبلغ واریز به ریال">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">توضیحات</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="other_info"
                                value="{{ $edit ? $deposits->other_info : '' }}" placeholder="توضیحات">
                        </div>
                        <input type="hidden" class="form-control" id="exampleInputEmail1" name="is_deposit" value="1">
    
                        <div class="form-group"> 
                            <div style="padding-right: 1.25rem;" class="form-check">
                                @if ($edit && $deposit->is_accepted)    
                                <input class="form-check-input" type="checkbox" name="is_accepted" checked="checked" />
                                @else
                                <input class="form-check-input" type="checkbox" name="is_accepted">
                                @endif
                                <label class="form-check-label">این واریز را تایید می کنید؟</label>
                            </div>
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
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">فرم دریافت وجه</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ $edit ? route('deposits.update', $deposits) : url('deposits') }}">
                    @csrf
                    @if ($edit)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label>انتخاب حساب</label>
                            <select class="form-control" name="account_id">
                                @if ($edit)
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"
                                            {{ $account->id == $deposits->account_id ? 'selected' : '' }}>
                                            {{ $account->name . ' ' . $account->last_name }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"> {{ $account->name . ' ' . $account->last_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>نوع برداشت</label>
                            <select class="form-control" name="deposit_type">
                                @if ($edit)
                                    <option value="loan" {{ $deposits->deposit_type == 'loan' ? 'selected' : '' }}>
                                        وام
                                    </option>
                                    <option value="deposit" {{ $deposits->deposit_type == 'deposit' ? 'selected' : '' }}>
                                        سپرده
                                    </option>
                                @else
                                    <option value="loan">
                                        وام
                                    </option>
                                    <option value="deposit">
                                        سپرده
                                    </option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">شماره وام</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="loan_id"
                                value="{{ $edit ? $deposits->loan_id : '' }}" placeholder="شماره وام">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">مبلغ برداشت</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="deposit_amount"
                                value="{{ $edit ? $deposits->deposit_amount : '' }}" placeholder="مبلغ برداشت به ریال">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">توضیحات</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="other_info"
                                value="{{ $edit ? $deposits->other_info : '' }}" placeholder="توضیحات">
                        </div>
                        <input type="hidden" class="form-control" id="exampleInputEmail1" name="is_deposit" value="0">
                        <div class="form-group">
                            <div style="padding-right: 1.25rem;" class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_accepted">
                                <label class="form-check-label">این برداشت را تایید می کنید؟</label>
                            </div>
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
    </div>
@endsection
