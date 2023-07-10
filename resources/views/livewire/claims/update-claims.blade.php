<div class="row">
    <div class="col-lg-12">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
          </button>
      </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Reward Claims List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" x-data="{selectedClaim: @entangle('selectedClaim')}">
                        <thead>
                            <tr>
                                <th style="width:80px;"><strong>#</strong></th>
                                <th><strong>Investor Name</strong></th>
                                <th><strong>Amount($)</strong></th>
                                <th><strong>Claimed On</strong></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($claims as $claim)
                            <tr>
                                <td><strong>{{ $loop->iteration }}</strong></td>
                                <td >{{ $claim->investor->investor_name }}</td>
                                <td >{{ $claim->amount }}</td>
                                <td >{{ $claim->claim_period }}</td>
                                <td>
                                    <div class="d-flex">
                                         <button type="button" data-bs-toggle="modal" data-bs-target="#viewModal"
                                         class="btn-primary btn-sm btn">
                                            View
                                         </button>

                                         <button type="button" class="btn-secondary btn-sm btn" style="margin-left: 10px;"
                                         @click="
                                         selectedClaim= @js($claim);
                                         $('#editModal').modal('show');
                                         ">
                                            Edit
                                         </button>
                                    </div>
                                </td>
                            </tr>
                              <!--view modal-->
                              <div class="modal fade" id="viewModal" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Claim Info</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Investor Name :</strong> {{$claim->investor->investor_name }} </p>
                                            <p><strong>Amount :</strong> {{$claim->amount}}$ </p>
                                            <p><strong>Reward Address :</strong> {{$claim->reward_address }} </p>
                                            <p><strong>Claim Period :</strong> {{$claim->claim_period }} </p>
                                            <p><strong>Claim On :</strong> {{ $claim->created_at->format('Y-m-d') }} </p>

                                            <div class="row">
                                                <div class="mb-3 input-success-o input-group">
                                                    <span class="input-group-text" style="background: #3b5998;
                                                    border-color: #3b5998;
                                                    color: #fff;"><i class="fab fa-facebook-f"></i></span>
                                                    <input type="text"  value="{{$claim->facebook}}" class="form-control form-control-xs solid" placeholder="Enter the link to your facebook post">
                                                  </div>


                                                  <div class="mb-3 input-success-o input-group">
                                                      <span class="input-group-text" style="background: #007bb6;
                                                      border-color: #007bb6;
                                                      color: #fff;"><i class="fab fa-linkedin-in"></i></span>
                                                      <input type="text"  value="{{$claim->linkedin}}" class="form-control form-control-xs solid" placeholder="Link to linkedIn post">
                                                    </div>


                                                  <div class="mb-3 input-success-o input-group">
                                                      <span class="input-group-text" style="background: #1da1f2;
                                                      border-color: #1da1f2;
                                                      color: #fff;"><i class="fab fa-twitter"></i></span>
                                                      <input type="text" value="{{$claim->twitter}}" class="form-control form-control-xs solid" placeholder="Link to twitter post">
                                                    </div>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!--edit modal-->
                            <div class="modal fade" id="editModal" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Claim Info</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="py-2">Social Media Links</h5>

                                            <div class="row">
                                                <div class="mb-3 input-success-o input-group">
                                                    <span class="input-group-text" style="background: #3b5998;
                                                    border-color: #3b5998;
                                                    color: #fff;"><i class="fab fa-facebook-f"></i></span>
                                                    <input type="text"  wire:model.defer="selectedClaim.facebook" class="form-control form-control-xs solid" placeholder="Enter the link to your facebook post">
                                                  </div>


                                                  <div class="mb-3 input-success-o input-group">
                                                      <span class="input-group-text" style="background: #007bb6;
                                                      border-color: #007bb6;
                                                      color: #fff;"><i class="fab fa-linkedin-in"></i></span>
                                                      <input type="text"  wire:model.defer="selectedClaim.linkedin" class="form-control form-control-xs solid" placeholder="Link to linkedIn post">
                                                    </div>


                                                  <div class="mb-3 input-success-o input-group">
                                                      <span class="input-group-text" style="background: #1da1f2;
                                                      border-color: #1da1f2;
                                                      color: #fff;"><i class="fab fa-twitter"></i></span>
                                                      <input type="text" vwire:model.defer="selectedClaim.twitter" class="form-control form-control-xs solid" placeholder="Link to twitter post">
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" wire:click='updateClaim' class="btn btn-primary" wire:loading.remove>Update changes</button>

                                            <div wire:loading wire:target="updateClaim">
                                                <p class="text-success fw-bold" style="font-size: 15px">Updating ...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
