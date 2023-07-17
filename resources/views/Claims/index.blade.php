@extends('layouts.app')

@section('title')
  <title>IMS| Claims</title>
@endsection

@section('page-name')
   Reward Claims
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
  @livewire('claims.update-claims')
@endsection

@section('scripts')

  @livewireScripts
  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>

  <script>
    window.addEventListener('closeClaimModal', event => {
      $("#editModal").modal('toggle');
})

</script>
@endsection
