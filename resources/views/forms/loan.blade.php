@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>وام جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                        <li class="breadcrumb-item active">ایجاد وام جدید</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">فرم ایجاد وام</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ $edit ? route('loans.update', $loans) : url('loans') }}">
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
                                        {{ $account->id == $loans->account_id ? 'selected' : '' }}>
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
                        <label>انتخاب ضامن اول</label>
                        <select class="form-control" name="l_guarantor1_id">
                            @if ($edit)
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                        {{ $account->id == $loans->l_guarantor1_id ? 'selected' : '' }}>
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
                        <label>انتخاب ضامن دوم</label>
                        <select class="form-control" name="l_guarantor2_id">
                            @if ($edit)
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                        {{ $account->id == $loans->l_guarantor2_id ? 'selected' : '' }}>
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
                        <label for="exampleInputEmail1">(ریال) مقدار وام</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="l_amount"
                            value="{{ $edit ? $loans->l_amount : '' }}" placeholder="مقدار به ریال">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">درصد کارمزد</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="l_percentage"
                            value="{{ $edit ? $loans->l_percentage : '' }}" placeholder="عدد درصد کارمزد">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">تعداد قسط</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Installments"
                            value="{{ $edit ? $loans->Installments : '' }}" placeholder="تعداد قسط">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">مبلغ هر قسط</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Installment_amount"
                            value="{{ $edit ? $loans->Installment_amount : '' }}" placeholder="مبلغ هر قسط">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">زمان شروع پرداخت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="start_date"
                            value="{{ $edit ? $loans->start_date : '' }}" placeholder="زمان شروع پرداخت">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">زمان اتمام پرداخت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="end_date"
                            value="{{ $edit ? $loans->end_date : '' }}" placeholder="زمان اتمام پرداخت">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">توضیحات</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="other_info"
                            value="{{ $edit ? $loans->other_info : '' }}" placeholder="توضیحات">
                    </div>
                    <div class="form-group">
                        @if ($edit && $loans->is_clear==1 )    
                        <div style="padding-right: 1.25rem;" class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_clear" checked="checked" />
                            <label class="form-check-label">تسویه کامل</label>
                        </div>
                        @else
                        <div style="padding-right: 1.25rem;" class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_clear">
                            <label class="form-check-label">تسویه کامل</label>
                        </div>
                        @endif
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
