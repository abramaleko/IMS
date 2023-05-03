@extends('layouts.app')

@section('title')
  <title>IMS| Upload Document</title>
@endsection

@section('page-name')
  Upload Document
@endsection


@section('main-content')
  @livewire('shared.admin.upload')
@endsection

@section('scripts')

  @livewireScripts
  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>
@endsection
