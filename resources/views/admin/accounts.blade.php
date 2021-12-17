@extends('layouts.master')
@section('content')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('panel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>حساب ها </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active">حساب ها </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">دیتاتیبل با ویژگی های پیش فرض</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>نام </th>
                                            <th>نام خانوادگی</th>
                                            <th>ایمیل</th>
                                            <th>تلفن همراه</th>
                                            <th>اولین پرداخت</th>
                                            <th>موجودی حساب</th>
                                            <th>تعداد وام</th>
                                            <th>میزان وام</th>
                                            <th>آدرس</th>
                                            <th>شماره کارت بانک</th>
                                            <th>توضیحات</th>
                                            <th>تاریخ ایجاد حساب</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->name }}</td>
                                                <td>{{ $account->last_name }}</td>
                                                <td>{{ $account->email }}</td>
                                                <td>{{ $account->phone }}</td>
                                                <td>{{ $account->first_pay }}</td>
                                                <td>{{ $account->AccountDeposit() }}</td>
                                                <td>{{ $account->AccountLoanCount() }}</td>
                                                <td>{{ $account->AccountLoanSum() }}</td>
                                                <td>{{ $account->address }}</td>
                                                <td>{{ $account->bank_account_number }}</td>
                                                <td>{{ $account->other_info }}</td>
                                                <td>{{ $account->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('accounts.edit', $account) }}" title="ویرایش">
                                                       <i class="fas fa-edit"></i>
                                                    </a>   
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>نام </th>
                                            <th>نام خانوادگی</th>
                                            <th>ایمیل</th>
                                            <th>تلفن همراه</th>
                                            <th>اولین پرداخت</th>
                                            <th>موجودی حساب</th>
                                            <th>تعداد وام</th>
                                            <th>میزان وام</th>
                                            <th>آدرس</th>
                                            <th>شماره کارت بانک</th>
                                            <th>توضیحات</th>
                                            <th>تاریخ ایجاد حساب</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->


    <!-- DataTables  & Plugins -->
    <script src="{{ asset('panel/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endsection
