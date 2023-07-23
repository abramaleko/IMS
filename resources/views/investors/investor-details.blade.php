@extends('layouts.app')

@section('title')
  <title>Investor Details</title>
@endsection

@section('page-name')
  {{$investor->investor_name}} Details
@endsection


@section('main-content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="flex-wrap border-0 card-header align-items-start">
                <div class="col-md-8">
                    <div class="user d-sm-flex d-block pe-md-5 pe-0">
                        <img src="{{ $investor->user->profilePhotoUrl($investor->user->id)}}" alt="investor-image">
                        <div class="ms-sm-3 ms-0 me-md-5 md-0">
                            <h5 class="mb-1 font-w600"><a href="javascript:void(0);">{{$investor->investor_name}}</a></h5>
                            <div class="mb-2 listline-wrapper">
                                <span class="item"><i class="far fa-envelope"></i>{{$investor->email}}</span>
                                <span class="item"><i class="far fa-id-badge"></i>{{$investor->phone_number}}</span>
                                <span class="item"><i class="fas fa-map-marker-alt"></i>{{$investor->residence_area}}</span>
                            </div>
                            <p><strong>Registered On : </strong>{{$investor->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-0 card-body">
                <h4 class="fs-20">Details</h4>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Full Name : </span><span class="font-w400">{{$investor->investor_name}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Gender : </span><span class="font-w400">{{$investor->gender}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Resident Area : </span><span class="font-w400">{{$investor->residence_area}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Date of Birth : </span><span class="font-w400">{{ \Carbon\Carbon::parse($investor->dob)->format('d/M/Y')}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Phone Number : </span><span class="font-w400">{{$investor->phone_number}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Email : </span><span class="font-w400">{{$investor->email}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Id Copy :</span> <span class="font-w400"><a href="{{route('investor.download',[$investor->id,1])}}" class="badge badge-primary">Download</a></span></p>

                    </div>
                    <div class="col-xl-6 col-md-6">
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Reward Address :</span> <span class="font-w400">{{$investor->reward_address ?? '-'}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Chain :</span> <span class="font-w400">{{$investor->chain ?? '-'}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Next of Kin Name :</span> <span class="font-w400">{{$investor->nxt_kin_name}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Relationship :</span> <span class="font-w400">{{$investor->nxt_kin_relationship}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Phone : </span><span class="font-w400">{{$investor->nxt_kin_phone}}</span></p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Id Copy :</span>
                            @if ($investor->nxt_kin_id_path)
                            <span class="font-w400"><a href="{{route('investor.download',[$investor->id,2])}}" class="badge badge-primary">Download</a></span>
                            @else
                              Not Uploaded
                            @endif
                        </p>
                        <p class="mb-2 font-w600 d-flex"><span class="custom-label-2">Unreal Kingdoms In Game ID : </span><span class="font-w400" style="padding-left: 1rem;">{{$investor->ukuid ?? 'Not added'}}</span></p>

                    </div>
                </div>
            </div>
            <div class="flex-wrap card-footer d-flex justify-content-between">
                <div class="mb-3 mb-md-2">
                    <span class="mb-2 d-block"><i class="fas fa-circle me-2"></i>Bank Name  <strong>{{$investor->bank_name}} .</strong></span>
                    <span class="mb-2 d-block"><i class="fas fa-circle me-2"></i>Account Name  <strong>{{$investor->account_name}} .</strong></span>
                    <span class="mb-2 d-block"><i class="fas fa-circle me-2"></i>Account Number  <strong>{{$investor->account_number}} .</strong></span>
                </div>
                <div>
                    @role('Super Administrator')
                    <a href="{{route('investor.edit',$investor->id)}}" class="mb-2 btn btn-success btn-md me-2"><i class="bi bi-pen-fill me-2"></i>Edit Profile</a>
                    <a href="{{route('investor.delete',$investor->id)}}" class="mb-2 btn btn-warning btn-md me-2"><i class="bi bi-archive-fill me-2"></i>Delete Profile</a>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
