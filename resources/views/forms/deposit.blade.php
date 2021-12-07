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

    {{-- <tr>
        <th>پرداخت کننده</th>
        <th>نوع پرداخت</th>
        <th>شماره وام</th>
        <th>شماره پیگیری</th>
        <th>تاریخ و زمان پرداخت</th>
        <th>تاریخ ایجاد</th>
        <th>تاریخ بروزرسانی</th>
    </tr> --}}

    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">فرم پرداخت</h3>
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
                                <option value="loan" {{ ($deposits->deposit_type == 'loan') ? 'selected' : '' }}>
                                    وام
                                </option>
                                <option value="deposit" {{ ($deposits->deposit_type == 'deposit') ? 'selected' : '' }}>
                                    سپرده
                                </option>
                                <option value="bank" {{ ($deposits->deposit_type == 'bank') ? 'selected' : '' }}>
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
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            value="{{ $edit ? $deposits->loan_id : '' }}" placeholder="شماره وام">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">کد پیگیری</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            value="{{ $edit ? $deposits->tracking_code : '' }}" placeholder="کدپیگیری">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">زمان رسید پرداخت</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            value="{{ $edit ? $deposits->deposit_date : '' }}" placeholder="زمان پرداخت رسید">
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
