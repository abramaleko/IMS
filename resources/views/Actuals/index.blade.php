@extends('layouts.app')

@section('title')
  <title>IMS| Actuals</title>
@endsection

@section('page-name')
   Actuals
@endsection

@section('styles')
  <style>
        .form-control{
            background: #f0ebeb;
        }
  </style>
@livewireStyles

@endsection

@section('main-content')
  @livewire('actuals.index')
@endsection

@section('scripts')

  @livewireScripts
  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>

  <script>
    window.addEventListener('closeRoleModal', event => {
      $("#newRoleModal").modal('toggle');
})

</script>
@endsection
