<div class="col-xl-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ingame Conversion Rate </h4>
        </div>
        <div class="card-body">
            @if (session()->has('updatedClaimMessage'))
            <div class="alert alert-success alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <strong>Success!</strong> {{ session('updatedClaimMessage') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
              </button>
          </div>
            @endif
        <h6>
           Specify the UI HERE
        </h6>
        </div>
        <div class="card-footer d-sm-flex justify-content-between align-items-center">
            <div>
                <button type="button" class="mb-2 btn btn-primary"
                >
                 Update Current Rate
                </button>
                {{-- <div class="modal fade bd-example-modal-sm" id="claim-message" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change Claim Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-4">
                                    <label class="form-label font-w600">Link<span class="text-danger scale5 ms-2">*</span></label>
                                      <input type="text" wire:model.defer="claim_link" class="mb-2 form-control solid"  aria-label="name">
                                      @error('claim_link')
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                      @enderror
                                  </div>
                                  <div class="mb-4 ">
                                    <label for="claim-message" class="form-label font-w600">Claim Message</label>
                                      <textarea wire:model.defer="claim_message" class="py-2 form-control solid" rows="5" id="claim-message"></textarea>
                                      @error('claim_message')
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                      @enderror
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                <button type="button" wire:click='updateClaimMessage'  class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
              </div>
        </div>
    </div>
</div>
