<div x-data="{open2: @entangle('open2'), final:@entangle('final')}">

    <!--first page -->
    <div class="row" x-show="!open2">
      <h4 class="mb-2 fs-20 font-w600 me-auto">Personal Details</h4>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-4 col-xl-6 col-md-6">
                          <label class="form-label font-w600">First Name<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" wire:model.defer="first_name"   class="mb-2 form-control solid" placeholder="First Name" aria-label="name">
                            @error('first_name')
                              <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Last Name<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="text" wire:model.defer="last_name"   class="mb-2 form-control solid" placeholder="Last Name" aria-label="name">
                              @error('last_name')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Date of Birth (DOB) <span class="text-danger scale5 ms-2">*</span></label>
                            <div class="input-group">
                                 <div class="input-group-text"><i class="far fa-clock"></i></div>
                                 <input type="date" wire:model.defer="dob" class="mb-2 form-control solid " aria-label="name">
                             </div>
                             @error('dob')
                              <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Select Gender:<span class="text-danger scale5 ms-2">*</span></label>
                            <select wire:model.defer="gender" class="mb-2 form-select form-control solid ">
                              <option value="" selected="" disabled>Choose...</option>
                              <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>
                            @error('gender')
                            <span class="text-danger fw-bold">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Residence Area<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="text" wire:model.defer="residence" class="mb-2 form-control solid " placeholder="i.e Tanzania, Kinondoni" aria-label="name">
                              @error('residence')
                             <span class="text-danger fw-bold">{{$message}}</span>
                             @enderror
                          </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                        <label class="form-label font-w600">Email<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="email" wire:model.defer="email" class="mb-2 form-control solid" placeholder="name@domain.com" aria-label="name">
                            @error('email')
                            <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                          <label class="form-label font-w600">Phone No<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="tel" wire:model.defer="phone_no" class="mb-2 form-control solid" placeholder="Phone number" aria-label="name">
                            @error('phone_no')
                            <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Upload Copy Id<span class="text-danger scale5 ms-2">*</span></label>
                            <div class="mb-3 input-group">
                                <div class="form-file">
                                    <input wire:model.defer="id_copy" type="file" class="form-file-input form-control">
                                </div>
                            </div>
                            @error('id_copy')
                              <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>

                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Upload Investor Image</label>
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" wire:model.defer="investor_image" class="form-file-input form-control">
                                </div>
                            </div>
                            @error('investor_image')
                            <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                          </div>

                </div>
                <div class="card-footer text-end">
                    <div>
                        <a href="javascript:void(0);" wire:click="resetForm" class="btn btn-primary me-3">Reset</a>
                        <a href="javascript:void(0);" wire:click='submitFirst' class="btn btn-secondary">Next</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- second page -->
    <div class="row" x-show="open2 && !final">
        <h4 class="mb-2 fs-20 font-w600 me-auto">Bank Details</h4>
          <div class="col-xl-12">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Account Name<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="text" wire:model.defer="account_name"   class="mb-2 form-control solid"  aria-label="name">
                              @error('account_name')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                              <label class="form-label font-w600">Account Number <span class="text-danger scale5 ms-2">*</span></label>
                              <input type="text" wire:model.defer="account_number" class="mb-2 form-control solid " aria-label="name">
                               @error('account_number')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Bank Name <span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" wire:model.defer="bank_name" class="mb-2 form-control solid " aria-label="name">
                             @error('bank_name')
                              <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Reward Address<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" wire:model.defer="reward_address" class="mb-2 form-control solid " aria-label="name">
                             @error('reward_address')
                              <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Chain</label>
                            <input type="text" wire:model.defer="chain" class="mb-2 form-control solid " aria-label="name">
                             @error('chain')
                              <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                  </div>
                  <div class="card-footer text-end">
                      <div>
                          <a href="javascript:void(0);" wire:click="resetForm" class="btn btn-primary me-3">Reset</a>
                          <a href="javascript:void(0);" wire:click='submitSecond' class="btn btn-secondary">Next</a>
                      </div>
                  </div>
                  </div>
              </div>
          </div>
      </div>

       <!-- final page -->
    <div class="row" x-show="final">
        <h4 class="mb-2 fs-20 font-w600 me-auto">Next of Kin Details</h4>
          <div class="col-xl-12">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Next Of Kin Name<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="text" wire:model.defer="next_kin_name"   class="mb-2 form-control solid"  aria-label="name">
                              @error('next_kin_name')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                              <label class="form-label font-w600">Relationship <span class="text-danger scale5 ms-2">*</span></label>
                              <input type="text" wire:model.defer="next_kin_relationship" class="mb-2 form-control solid " aria-label="name">
                               @error('next_kin_relationship')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Phone Number <span class="text-danger scale5 ms-2">*</span></label>
                            <input type="tel" wire:model.defer="next_kin_phone" class="mb-2 form-control solid " aria-label="name">
                             @error('next_kin_phone')
                              <span class="text-danger fw-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Upload Copy Id</label>
                            <div class="mb-3 input-group">
                                <div class="form-file">
                                    <input wire:model.defer="next_of_kin_id_copy" type="file" class="form-file-input form-control">
                                </div>
                            </div>
                            @error('next_of_kin_id_copy')
                              <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                  </div>
                  <div class="card-footer text-end">
                      <div>
                          <a href="javascript:void(0);" wire:click="resetForm" class="btn btn-primary me-3">Reset</a>
                          <a href="javascript:void(0);" wire:loading.remove wire:click='submitFinal' class="btn btn-success">Add Investor</a>

                            <div wire:loading wire:target="submitFinal">
                                <p class="text-success fw-bold" style="font-size: 16px">Processing ...</p>
                            </div>

                      </div>
                      {{-- <div class="mt-2">
                         <p class="text-muted" style="font-size: 16px">Processing ...</p>
                      </div> --}}
                  </div>
                  </div>
              </div>
          </div>
      </div>
</div>
