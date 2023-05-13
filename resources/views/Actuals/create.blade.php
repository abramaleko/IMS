@extends('layouts.app')

@section('title')
  <title>IMS| Actual Create</title>
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
  @livewire('actuals.create')
@endsection

@section('scripts')

  @livewireScripts
  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>

@endsection
