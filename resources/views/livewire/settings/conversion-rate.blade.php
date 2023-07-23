<div class="col-xl-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ingame Conversion Rate </h4>
        </div>
        <div class="card-body">
            @if (session()->has('ConversionRate'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> {{ session('ConversionRate') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
              </button>
          </div>
            @endif
        <p class="card-text">
           <strong>1 CAYC TOKEN :</strong> {{number_format($rate)}} Ingame tokens
        </p>

        </div>
        <div class="card-footer d-sm-flex justify-content-between align-items-center">
            <div>
                <button type="button" class="mb-2 btn btn-primary"
                data-bs-toggle="modal" data-bs-target="#rate-modal">
                 Update Current Rate
                </button>
                <div class="modal fade bd-example-modal-sm" id="rate-modal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change Current Conversion Rate</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="card-text">
                                     Specify how many In Game Tokens is equal to 1 CAYC
                                </p>
                                <div class="mb-4">
                                    <label class="form-label font-w600">Conversion Rate<span class="text-danger scale5 ms-2">*</span></label>
                                      <input type="number" wire:model.defer="newRateInput" class="mb-2 form-control solid"  aria-label="name">
                                      @error('newRateInput')
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                      @enderror
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                <button type="button" wire:click='updateRate'  class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
