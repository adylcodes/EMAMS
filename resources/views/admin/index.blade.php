@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Admin Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Admin Dashboard
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
    <div class="container-fluid">

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
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->

    <script>
        var canvas = document.getElementById('myChart');

        var data = {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            datasets: [{
                label: 'Ahmed',
                data: [12, 19, 3, 17, 6, 3, 7],
                backgroundColor: "rgba(153,255,51,0.4)"
            }, {
                label: 'Ali',
                data: [2, 29, 5, 5, 2, 3, 10],
                backgroundColor: "rgba(255,153,0,0.4)"
            }]
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
                ['Ahmed', 'Mhl'],
                ['Faizan',54.8],
                ['Ali',48.6],
                ['Hamza',44.4],
                ['Usman',23.9],
                ['Talha',14.5]
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
