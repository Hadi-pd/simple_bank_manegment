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
                        <h1>دیتاتیبل</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active">دیتاتیبل</li>
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
                                            <th>نام و نام خانوادگی </th>
                                            <th> شماره وام </th>
                                            <th>ضامن اول</th>
                                            <th>ضامن دوم</th>
                                            <th>مبلغ وام</th>
                                            <th>درصد کارمزد</th>
                                            <th>مبلغ قابل پرداخت</th>
                                            <th>وضعیت</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>تاریخ بروزرسانی</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loans as $loan)
                                            <tr>
                                                <td>{{ $loan->AccountName['name'].' '.$loan->AccountName['last_name'] }}</td>
                                                <td>{{ $loan->id}}</td>
                                                <td>{{ $loan->AccountNameG1['name'].' '.$loan->AccountNameG1['last_name'] }}</td>
                                                <td>{{ $loan->AccountNameG2['name'].' '.$loan->AccountNameG2['last_name'] }}</td>
                                                @php
                                                    $percentedAmount = round(($loan->l_amount*$loan->l_percentage)/100) + $loan->l_amount;
                                                    $payedAmount = $loan->DepositsLoan();
                                                @endphp

                                                <td>{{ $loan->l_amount }}</td>
                                                <td>{{ $loan->l_percentage }}</td>
                                                <td>{{ $percentedAmount }}</td>
                                                <td>
                                                    @if ($loan->is_clear)
                                                        تسویه کامل {{  $payedAmount  }} ریال پرداخت شده
                                                    @else
                                                    مبلغ {{  $payedAmount  }} تا کنون پرداخت شده
                                                    <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar bg-success" style="width: {{ round(($loan->DepositsLoan()*100)/$percentedAmount , 0) }}%"> {{ round(($loan->DepositsLoan()*100)/$percentedAmount , 0) }}%</div>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td>{{ $loan->created_at }}</td>
                                                <td>{{ $loan->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('loans.edit', $loan) }}" title="ویرایش">
                                                       <i class="fas fa-edit"></i>
                                                    </a>   
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>نام و نام خانوادگی </th>
                                            <th> شماره وام </th>
                                            <th>ضامن اول</th>
                                            <th>ضامن دوم</th>
                                            <th>مبلغ وام</th>
                                            <th>درصد کارمزد</th>
                                            <th>مبلغ قابل پرداخت</th>
                                            <th>وضعیت</th>
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
