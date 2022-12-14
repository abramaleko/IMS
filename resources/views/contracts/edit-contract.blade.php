@extends('layouts.app')

@section('title')
<title> Edit Contract</title>
@endsection

@section('page-name')
  Edit Contract
@endsection

@section('styles')
    <style>
        .disabled{
            cursor: not-allowed;
        }
        textarea {
        height: 150px !important;
        }
    </style>

@livewireStyles

@endsection

@section('main-content')
  @livewire('contracts.edit-contract',['contract'=> $contract_id])
@endsection

@section('scripts')
  @livewireScripts
@endsection
