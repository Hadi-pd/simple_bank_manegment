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
                        <h1>لیست واریز ها و برداشت ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active">لیست واریز ها و برداشت ها</li>
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
                            <div style="background-color: #004cff70;" class="card-header">
                                <h3 class="card-title">لیست کل واریزی ها به بانک</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>پرداخت کننده</th>
                                            <th>نوع پرداخت</th>
                                            <th>مبلغ پرداخت شده</th>
                                            <th>شماره وام</th>
                                            <th>شماره پیگیری</th>
                                            <th>تاریخ و زمان پرداخت</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>تاریخ بروزرسانی</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deposits as $deposit)
                                        @if ($deposit->is_deposit)    
                                        <tr>
                                            <td>{{ $deposit->AccountName['name'].' '.$deposit->AccountName['last_name'] }}</td>
                                            <td>{{ $deposit->deposit_type }}</td>
                                            <td>{{ $deposit->deposit_amount }}</td>
                                            <td>{{ $deposit->loan_id }}</td>
                                            <td>{{ $deposit->tracking_code }}</td>
                                            <td>{{ $deposit->deposit_date }}</td>
                                            <td>{{ $deposit->created_at }}</td>
                                            <td>{{ $deposit->updated_at }}</td>
                                            <td>
                                             <a href="{{ route('deposits.edit', $deposit) }}" title="ویرایش">
                                                <i class="fas fa-edit"></i>
                                             </a> 
                                             @if ($deposit->is_accepted)
                                             <a style="color:rgb(0, 177, 9)" href="{{ route('deposits.edit', $deposit->is_accepted) }}" title="تایید شده">
                                                <i class="fas fa-clipboard-check"></i>
                                             </a>   
                                             @else
                                             <a style="color:rgb(255, 0, 0)" href="{{ route('deposits.edit', $deposit->is_accepted) }}" title="تایید نشده">
                                                <i class="fas fa-clipboard"></i>
                                             </a>   
                                             @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>پرداخت کننده</th>
                                            <th>نوع پرداخت</th>
                                            <th>شماره وام</th>
                                            <th>شماره پیگیری</th>
                                            <th>تاریخ و زمان پرداخت</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>تاریخ بروزرسانی</th>
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

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div style="background-color: #ff0000b3; color: #fff;" class="card-header">
                                        <h3 class="card-title">لیست کل برداشت ها از بانک</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>برداشت کننده</th>
                                                    <th>نوع برداشت</th>
                                                    <th>مبلغ برداشت شده</th>
                                                    <th>شماره وام</th>
                                                    <th>تاریخ ایجاد</th>
                                                    <th>تاریخ بروزرسانی</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deposits as $deposit)
                                                @if (!$deposit->is_deposit)                                                    
                                                <tr>
                                                    <td>{{ $deposit->AccountName['name'].' '.$deposit->AccountName['last_name'] }}</td>
                                                    <td>{{ $deposit->deposit_type }}</td>
                                                    <td>{{ $deposit->deposit_amount }}</td>
                                                    <td>{{ $deposit->loan_id }}</td>
                                                    <td>{{ $deposit->created_at }}</td>
                                                    <td>{{ $deposit->updated_at }}</td>
                                                    <td>
                                                     <a href="{{ route('deposits.edit', $deposit) }}" title="ویرایش">
                                                        <i class="fas fa-edit"></i>
                                                     </a> 
                                                     @if ($deposit->is_accepted)
                                                     <a style="color:rgb(0, 177, 9)" href="{{ route('deposits.edit', $deposit->is_accepted) }}" title="تایید شده">
                                                        <i class="fas fa-clipboard-check"></i>
                                                     </a>   
                                                     @else
                                                     <a style="color:rgb(255, 0, 0)" href="{{ route('deposits.edit', $deposit->is_accepted) }}" title="تایید نشده">
                                                        <i class="fas fa-clipboard"></i>
                                                     </a>   
                                                     @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>برداشت کننده</th>
                                                    <th>نوع برداشت</th>
                                                    <th>مبلغ برداشت شده</th>
                                                    <th>شماره وام</th>
                                                    <th>تاریخ ایجاد</th>
                                                    <th>تاریخ بروزرسانی</th>
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
