@extends('layouts.app')

@section('title')
  <title>IMS| Shared Documents</title>
@endsection

@section('page-name')
   Shared Documents
@endsection


@section('main-content')
  @livewire('shared.admin.index')
@endsection

@section('scripts')

  @livewireScripts
@endsection
