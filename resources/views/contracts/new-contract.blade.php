@extends('layouts.app')

@section('title')
  <title>New Contract</title>
@endsection

@section('page-name')
  Register Contract
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{asset('vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
<style>
    textarea {
  height: 150px !important;
}
</style>

@livewireStyles

@endsection

@section('main-content')
 @livewire('contracts.new-contract')
@endsection

@section('scripts')

  @livewireScripts

  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>
  <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
     <!-- momment js is must -->
 <script src="{{asset('vendor/moment/moment.min.js')}}"></script>
 <script src="{{asset('vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

  <script src="{{asset('js/plugins-init/material-date-picker-init.js')}}"></script>

  <script>
      const config = {
    search: true, // Toggle search feature. Default: false
    maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: 'lg', // Can be "sm" or "lg". Default ''
}
dselect(document.querySelector('#investor_name'), config)
dselect(document.querySelector('#project_name'), config)
window.addEventListener('closenewContractAssettModal', event => {
      $("#newContractAsset").modal('toggle');
})
  </script>
@endsection
