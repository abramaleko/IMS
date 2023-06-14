@extends('layouts.app')
@section('title')
  <title>Dashboard</title>
@endsection
@section('page-name')
  Dashboard
@endsection

@section('styles')
<link href="{{asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
<link href="{{asset('vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

@livewireStyles
@endsection

@section('main-content')
   @livewire('dashboards.admin-dashboard')

@endsection

@section('scripts')
   @livewireScripts
 	<!-- Apex Chart -->
     <script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>

           <!-- Chart ChartJS plugin files -->
     <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
     {{-- <script src="{{asset('js/plugins-init/chartjs-init.js')}}"></script> --}}

     <!-- Chart piety plugin files -->
     <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>

       <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{asset('vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>
    $(document).ready(function() {

      var counters = $(".count");
      var countersQuantity = counters.length;
      var counter = [];

      for (i = 0; i < countersQuantity; i++) {
        counter[i] = parseInt(counters[i].innerHTML);
      }

      var count = function(start, value, id) {
        var localStart = start;
        setInterval(function() {
          if (localStart < value) {
            localStart++;
            counters[id].innerHTML = localStart;
          }
        }, 40);
      }

      for (j = 0; j < countersQuantity; j++) {
        count(0, counter[j], j);
      }
    });
</script>


@endsection


