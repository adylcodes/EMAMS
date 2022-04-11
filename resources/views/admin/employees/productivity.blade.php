@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->

<style>
    .c-dashboardInfo {
        margin-bottom: 15px;
    }
    .c-dashboardInfo .wrap {
        background: #ffffff;
        box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.1);
        border-radius: 7px;
        text-align: center;
        position: relative;
        overflow: hidden;
        padding: 40px 25px 20px;
        height: 100%;
    }
    .c-dashboardInfo__title,
    .c-dashboardInfo__subInfo {
        color: #6c6c6c;
        font-size: 1.18em;
    }
    .c-dashboardInfo span {
        display: block;
    }
    .c-dashboardInfo__count {
        font-weight: 600;
        font-size: 2.5em;
        line-height: 64px;
        color: #323c43;
    }
    .c-dashboardInfo .wrap:after {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 10px;
        content: "";
    }

    .c-dashboardInfo:nth-child(1) .wrap:after {
        background: linear-gradient(82.59deg, #00c48c 0%, #00a173 100%);
    }
    .c-dashboardInfo:nth-child(2) .wrap:after {
        background: linear-gradient(81.67deg, #0084f4 0%, #1a4da2 100%);
    }
    .c-dashboardInfo:nth-child(3) .wrap:after {
        background: linear-gradient(69.83deg, #0084f4 0%, #00c48c 100%);
    }
    .c-dashboardInfo:nth-child(4) .wrap:after {
        background: linear-gradient(81.67deg, #ff647c 0%, #1f5dc5 100%);
    }
    .c-dashboardInfo__title svg {
        color: #d7d7d7;
        margin-left: 5px;
    }
    .MuiSvgIcon-root-19 {
        fill: currentColor;
        width: 1em;
        height: 1em;
        display: inline-block;
        font-size: 24px;
        transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
        user-select: none;
        flex-shrink: 0;
    }

</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Productivity</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Productivity <a href="{{route('admin.employees.gen.pdf',['employee_id'=>$employee->id])}}"> Print</a>
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="cards">
            <div id="root">
                <div class="container pt-5">
                    <div class="row align-items-stretch">

                        <div class="c-dashboardInfo col-lg-3 col-md-6">
                            <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Leaves<svg
                                        class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                        </path>
                                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{$leaves}}</span>
                            </div>
                        </div>
                        <div class="c-dashboardInfo col-lg-3 col-md-6">
                            <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Tasks<svg
                                        class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                        </path>
                                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{$totalTasks}}</span>
                            </div>
                        </div>

                        <div class="c-dashboardInfo col-lg-3 col-md-6">
                            <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Completed Tasks<svg
                                        class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                        </path>
                                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{$completedTasks}}</span>
                            </div>
                        </div>
                        <div class="c-dashboardInfo col-lg-3 col-md-6">
                            <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Pending Tasks<svg
                                        class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                        </path>
                                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{$pendingTasks}}</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Productivity</h5>
                    </div>
                    <div class="card-body">
                        @include('messages.alerts')
                        <div class="row mb-3">
                            <div class="col text-center mx-auto">
                                <img src="/storage/employee_photos/{{ $employee->photo }}" class="rounded-circle img-fluid" alt=""
                                style="box-shadow: 2px 4px rgba(0,0,0,0.1)"
                                >
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class=" text-center">
            <div>
                <div>
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                    <div align="left"><h3>Employee Performance</h3></div>
                </div>

                <div
                    id="myChart2" style="width:100%; max-width:600px; height:500px;">
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

<script>
    var canvas = document.getElementById('myChart');

    var data = {
        labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July'],
        @foreach($dataset as $employee)
        datasets: [{
            label: '{{$employee["employee"]}}',
            data: [{{$employee["tasks"]->jan}}, {{$employee["tasks"]->feb}}, {{$employee["tasks"]->mar}}, {{$employee["tasks"]->apr}},{{$employee["tasks"]->may}} , {{$employee["tasks"]->jun}}, {{$employee["tasks"]->jul}}],
            backgroundColor: "{{$employee['color']}}"
        }],
        @endforeach
    };
    var option = {
        scales: {
            yAxes:[{
                stacked:true,
                gridLines: {
                    display:true,
                    color:"rgba(255,99,132,0.2)"
                }
            }],
            xAxes:[{
                gridLines: {
                    display:true
                }
            }]
        }
    };

    var myBarChart = Chart.Line(canvas,{
        data:data,
        options:option
    });


    // multi lines chart


    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Name','Percentage'],
                @foreach($dataset as $employee)
            ['{{$employee["employee"]}}','{{$totalTasks}}'],
            @endforeach

        ]);

        var options = {
            title:'Employee Task Assignment ',
            is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
        chart.draw(data, options);
    }
</script>

@endsection
