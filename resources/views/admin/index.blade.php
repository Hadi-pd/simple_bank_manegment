@extends('layouts.master')
@section('content')

        <div class="content-header">
          <div class="container-fluid ">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">داشبورد</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                  <li class="breadcrumb-item active">داشبورد ۱</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{$acc_count}}</h3>
  
                    <p>تعداد کل حساب ها</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{$loans_count}}</h3>
                    <p>وام های پرداخت شده تا کنون</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{$deposits_sum_no_loan}}</h3>
                    <p>موجودی کل بانک</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{$loans_sum_mony}}</h3>
  
                    <p>مبلغ کل وام های پرداختی</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر<i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{$deposits_sum}}</h3>
                    <p> موجودی فعلی بانک</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ $now_loans_count }}</h3>
                    <p>وام های جاری </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{ $now_loans_sum }}</h3>
                    <p>میزان وام جاری</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>65,000,000</h3>
                    <p>کل کارمزد بانک</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">اطلاعات بیشتر<i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
  
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">نمودار دایره ای</h3>
  
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              @php
                $deposits_sum_persent = round(($deposits_sum * 100)/$deposits_sum_no_loan , 0) ;
                $loans_sum_persent = round(($now_loans_sum * 100)/$deposits_sum_no_loan, 0) ;
              @endphp
              <div class="card-body">
  
                {{$deposits_sum_persent .'/// ' .$loans_sum_persent }}

                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
  
                <script>
                  var xValues = ["موجودی فعلی", "میزان وام"];
                  var yValues = [ {{$deposits_sum_persent}} , {{$loans_sum_persent}} ];
                  var barColors = [
                    "#b91d47",
                    "#00aba9",
                  ];
  
                  new Chart("myChart", {
                    type: "pie",
                    data: {
                      labels: xValues,
                      datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                      }]
                    },
                    options: {
                      title: {
                        display: true,
                        text: "موجودی کل بانک"
                      }
                    }
                  });
                </script>
  
  
                <!-- <canvas id="pieChart"
                      style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div> -->
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      @endsection
