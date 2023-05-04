@extends('layouts.app')

@section('title')
  <title>IMS| Shared Documents</title>
@endsection

@section('page-name')
   View Document
@endsection


@section('main-content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$doc->title}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <strong>Description:</strong> {{$doc->description ?? 'No description found'}}
                </p>


            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <div class="mb-4 card-footer-link mb-sm-0">
                    <p class="card-text text-dark d-inline">Valid untill {{$doc->valid_untill}}</p>
                </div>

                <a href="{{route('shared-document.download',$doc->id)}}" class="btn btn-primary">DOWNLOAD</a>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
