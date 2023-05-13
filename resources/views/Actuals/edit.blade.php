@extends('layouts.app')

@section('title')
  <title>IMS| Actual Edit</title>
@endsection

@section('page-name')
  Edit Actual Info
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
  @livewire('actuals.edit', ['actual' => $actual])
@endsection

@section('scripts')

  @livewireScripts
  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>

@endsection
