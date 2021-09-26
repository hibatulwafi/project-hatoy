@extends('layouts.master')

@section('css')
        <!-- DataTables -->
        <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ URL::asset('assets/plugins/ion-rangeslider/ion.rangeSlider.skinModern.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
<div class="container-fluid">

<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Grafik</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Grafik</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0);">Grafik Produksi</a></li>
			</ol>

		</div>
	</div>
</div>
<!-- end row -->

<div class="row">
	<div class="col-lg-6">
		<div class="card m-b-20">
			<div class="card-body">
				<canvas id="myChart" height="300"></canvas>
			</div>
		</div>
	</div> <!-- end col -->

	<div class="col-lg-6">
		<div class="card m-b-20">
			<div class="card-body">
				<canvas id="myChart1" height="300"></canvas>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->


<div class="row">
	<div class="col-lg-6">
		<div class="card m-b-20">
			<div class="card-body">
				<canvas id="myChart2" height="300"></canvas>
			</div>
		</div>
	</div> <!-- end col -->
	
	<div class="col-lg-6">
		<div class="card m-b-20">
			<div class="card-body">
				<canvas id="myChart3" height="300"></canvas>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->



</div> <!-- container-fluid -->
@endsection
                                   
@section('script')
     
        <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [@foreach($gra as $p){{$p->tahun_pr.","}}@endforeach],
				datasets: [{
					label: 'Aren',
					data: [@foreach($gra as $p){{$p->jml_produksi.","}}@endforeach],
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChart1").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [@foreach($ce as $p){{$p->tahun_pr.","}}@endforeach],
				datasets: [{
					label: 'Cengkeh',
					data: [@foreach($ce as $p){{$p->jml_produksi.","}}@endforeach],
					backgroundColor: 'rgba(153, 102, 255, 0.2)',
					borderColor: 'rgba(153, 102, 255, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [@foreach($ke as $p){{$p->tahun_pr.","}}@endforeach],
				datasets: [{
					label: 'Kelapa Dalam',
					data: [@foreach($ke as $p){{$p->jml_produksi.","}}@endforeach],
					backgroundColor: 'rgba(255, 159, 64, 0.2)',
					borderColor:	'rgba(255, 159, 64, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

	
<script>
		var ctx = document.getElementById("myChart3").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [@foreach($sa as p$p){{$p->tahun_pr.","}}@endforeach],
				datasets: [{
					label: 'Sakura ',
					data: [@foreach($sa as $p){{$p->jml_produksi.","}}@endforeach],
					backgroundColor: 'rgba(255, 159, 64, 0.2)',
					borderColor:	'rgba(255, 159, 64, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
@endsection