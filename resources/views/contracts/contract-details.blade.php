@extends('layouts.app')

@section('title')
  <title>Contract Details</title>
@endsection

@section('page-name')
  Contract Details
@endsection

@section('styles')
    <style>
        textarea {
        height: 150px !important;
        }
    </style>

@endsection

@section('main-content')
    <!-- row -->
    <div>
        <div class="row">
            <div class="col-xl-3 col-xxl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="pb-0 border-0 card-header">
                                <h4 class="mb-0 fs-20">Investor Details</h4>
                            </div>
                            <div class="pt-4 card-body">
                                <div class="mb-3 d-flex">
                                    <h5 class="mb-1 fs-14 custom-label">Investor Name:</h5>
                                    <span>{{$contract->investor->investor_name}}</span>
                                </div>
                                <div class="mb-3 d-flex">
                                    <h5 class="mb-1 fs-14 custom-label">Gender:</h5>
                                    <span>{{$contract->investor->gender}}</span>
                                </div>
                                <div class="mb-3 d-flex">
                                    <h5 class="mb-1 fs-14 custom-label">Residence:</h5>
                                    <span>{{$contract->investor->residence_area}}</span>
                                </div>
                                <div class="mb-3 d-flex">
                                    <h5 class="mb-1 fs-14 custom-label">Phone #:</h5>
                                    <span>{{$contract->investor->phone_number}}</span>
                                </div>
                                <div class="mb-3 d-flex">
                                    <h5 class="mb-1 fs-14 custom-label">Email</h5>
                                    <span>{{$contract->investor->email}}</span>
                                </div>
                            </div>
                            <div class="pt-0 border-0 card-footer ">
                                <div class="flex-wrap d-flex justify-content-between">
                                    <a href="{{route('investor.details',$contract->investor_id)}}" class="mb-3 btn btn-outline-primary btn-sm">Investor Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="fs-20 d-block"><a href="javascript:void(0);">{{$contract->investor->investor_name}} {{$contract->project->name}} Contract</a></h4>
                                <div class="d-block">
                                    @if ($contract->modified_by)
                                    <p class="me-2">Last Modified By: {{$contract->modifier->name}} on <span class="text-sm text-muted"></span>{{$contract->updated_at->format('d/M/Y h:i:s')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="mb-3 fs-20">Contract Info</h4>
                                <div class="mb-3 row">
                                    <div class="col-xl-6">
                                        <div class="ms-4">
                                            <p class="mb-3 font-w500"><span class="custom-label">Project Name :</span><span class="font-w400"> {{$contract->project->name}} </span></p>
                                            <p class="mb-3 font-w500"><span class="custom-label">Amount Invested($) :</span><span class="font-w400">{{number_format($contract->amount)}}</span></p>
                                            <p class="mb-3 font-w500"><span class="custom-label"> Start Date :</span><span class="font-w400"> {{$contract->start_date}}</span></p>
                                            <p class="mb-3 font-w500"><span class="custom-label"> End Date :</span><span class="font-w400">{{$contract->end_date}}</span></p>
                                            <p class="mb-3 font-w500"><span class="custom-label">ROI Period :</span><span class="font-w400">{{$contract->roi_period}} Months</span></p>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="ms-4">
                                            <p class="mb-3 font-w500"><span class="custom-label">Contract Status :</span><span class="font-w400">{{$contract->status ? 'Active' : 'Terminated'}}</span></p>
                                            <p class="mb-3 font-w500"><span class="custom-label">Payment Slips:</span><span class="font-w400"> <a href="{{route('contract.download',[$contract->id,'payment_slips'])}}" class="badge badge-primary">Download</a></span></p>
                                            <p class="mb-3 font-w500"><span class="custom-label">Contract :</span><span class="font-w400"> <a href="{{route('contract.download',[$contract->id,'contract_documents'])}}" class="badge badge-primary">Download</a></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <h4 class="mb-3 fs-20">Contract Assets</h4>
                                    @foreach ($contract->assets as $asset)
                                    <span class="mb-1 d-block"><i class="fas fa-circle me-2"></i>
                                        Asset Name: <strong>{{$asset->assetInfo->asset_name}},</strong>
                                        Asset Address: <strong>{{$asset->asset_address}}</strong>
                                        @if ($asset->verified)
                                        <span class="badge badge-pill badge-success">Verified</span>
                                        @else
                                        <span class="badge badge-pill badge-primary">Not verified</span>
                                        @endif
                                    </span>
                                    @endforeach

                                </div>
                                @if ($contract->additional_description || $contract->termination_description)
                                <hr>

                                @if ($contract->additional_description)
                                <h4 class="mb-3 fs-20">Additional Description</h4>
                                <div class="ms-4">
                                    <p><i class="fas fa-dot-circle me-2"></i>{{$contract->additional_description}}</p>
                                    @if ($contract->additional_attachments)
                                    <p><i class="fas fa-dot-circle me-2 "></i>Additional Attachment <a href="" class="badge badge-primary">Download</a></p>
                                    @endif
                                </div>
                                @endif

                                @if ($contract->termination_description)
                                <h4 class="mb-3 fs-20">Termination Description</h4>
                                <div class="ms-4">
                                    <p><i class="fas fa-dot-circle me-2"></i>{{$contract->termination_description}}</p>
                                    <p><i class="fas fa-dot-circle me-2 "></i>Terminated On :  <strong> {{ \Carbon\Carbon::parse($contract->terminated_on)->format('d M Y')}}</strong></p>
                                </div>
                                @endif


                                @endif
                                <div class="flex-wrap py-4 d-flex justify-content-between border-bottom border-top">
                                    {{-- <span>Job ID: #8976542</span> --}}
                                    <p class="me-2">Uploaded By: <strong>{{$contract->uploadedBy->name}} on</strong> <span class="text-sm text-muted"></span>{{$contract->created_at->format('d/M/Y h:i:s')}}</p>
                                </div>
                            </div>
                            <div class="border-0 card-footer">
                                <form action="{{route('contract.delete',$contract->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                <div>
                                    <a href="{{route('contract.edit',$contract->id)}}" class="mb-3 btn btn-primary btn-md me-2">Edit Contract</a>
                                        <button type="submit" class="mb-3 btn btn-warning btn-md me-2">Delete Contract</button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#endContract" class="mb-3 btn btn-secondary btn-md">End Contract</button>
                                </div>
                            </form>

                            </div>
                            <!-- end contract modal-->
                            <div class="modal fade" id="endContract" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('contract.end')}}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">End Contract</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="contract_id" value="{{$contract->id}}">
                                                <div class="mb-3">
                                                    <label for="terminating_reason" class="form-label font-w600">Reason For Ending Contract</label>
                                                    <textarea class="form-control solid" rows="4" id="terminating_reason" name="contract_termination" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">End Contract</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
