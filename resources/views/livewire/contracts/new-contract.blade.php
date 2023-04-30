    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div>
     <!--first page -->
     <div class="row">
        <h4 class="mb-2 fs-20 font-w600 me-auto">Contract Details</h4>
          <div class="col-xl-12">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Investor Name:<span class="text-danger scale5 ms-2">*</span></label>
                            <select wire:model.defer="investor_id" class="form-select" id="investor_name">
                                <option value="" selected disabled>Choose ..</option>
                                @foreach ($investors as $investor)
                                <option value="{{$investor->id}}">{{$investor->investor_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Project Name:<span class="text-danger scale5 ms-2">*</span></label>
                            <select wire:model.defer="project_id" class="form-select" id="project_name">
                                <option value="" selected disabled>Choose ..</option>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Amount (Tshs)<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="number" wire:model.debounce.500ms="amount"  class="mb-2 form-control solid"  aria-label="name">
                              <small class="text-muted">{{$amount > 0 ? number_format($amount) : $amount}} Tshs</small>
                              @error('amount')
                                <span class="text-danger fw-bold d-block">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">ROI period (months)<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="number" wire:model.defer="roi_period" min="0" max="12"  class="mb-2 form-control solid"  aria-label="name">
                              @error('roi_period')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Contract Start Date (months)<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" wire:model.defer="start_date" class="form-control" placeholder="2017-06-04" id="mdate" onchange="this.dispatchEvent(new InputEvent('input'))">
                              @error('start_date')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Contract Duration (months)<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="number" wire:model.defer="contract_duration" min="0" max="12"  class="mb-2 form-control solid"  aria-label="name">
                              @error('contract_duration')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Asset<span class="text-danger scale5 ms-2">*</span></label>
                            <select wire:model="asset" class="default-select form-control wide solid" >
                                <option value="" selected disabled>Choose ..</option>
                                @foreach ($assets as $asset)
                                  <option value="{{$asset->id}}">{{$asset->asset_name}}</option>
                                @endforeach
                            </select>
                            @error('asset')
                            <span class="text-danger fw-bold">{{$message}}</span>
                          @enderror
                        </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Asset address<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" wire:model.defer="asset_address" class="form-control solid">
                              @error('asset_address')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-12 col-md-12">
                            <label class="form-label font-w600">Payment Slips Upload<span class="text-danger scale5 ms-2">*</span></label>
                            <small class="text-muted">(Allowed files formarts are pdf and images each not exceeding 5Mb)</small>
                            <div class="form-file">
                              <input type="file" wire:model="payment_slips"  class="form-file-input form-control solid" multiple>
                          </div>
                                @error('payment_slips.*')
                                <span class="text-danger fw-bold">{{$message}}</span>
                               @enderror

                              @error('payment_slips')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror

                          </div>
                          <div class="mb-4 col-xl-12 col-md-12">
                            <label class="form-label font-w600">Contract Upload<span class="text-danger scale5 ms-2">*</span></label>
                            <small class="text-muted">(Allowed files formarts are pdf and images each not exceeding 5Mb)</small>
                            <div class="form-file">
                              <input type="file" wire:model="contracts"  class="form-file-input form-control solid" multiple>
                          </div>
                                @error('contracts.*')
                                <span class="text-danger fw-bold">{{$message}}</span>
                               @enderror

                              @error('contracts')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror

                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label for="additional_description" class="form-label font-w600">Additional Descriptions</label>
                              <textarea wire:model.defer="additional_description" class="py-2 form-control solid" rows="6" id="additional_description"></textarea>
                              @error('additional_description')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-12 col-md-12">
                            <label class="form-label font-w600">Additional Attachments</label>
                            <small class="text-muted">(Allowed files formarts are pdf and images each not exceeding 5Mb)</small>
                            <div class="form-file">
                              <input type="file" wire:model.defer="additional_attachments"  class="form-file-input form-control solid" multiple>
                          </div>
                                @error('additional_attachments')
                                <span class="text-danger fw-bold">{{$message}}</span>
                              @enderror
                          </div>



                  </div>
                  <div class="card-footer text-end">
                      <div>
                          <a href="javascript:void(0);" wire:click="resetForm" class="btn btn-primary me-3">Reset</a>
                          <a href="javascript:void(0);" wire:loading.remove wire:click='uploadContract' class="btn btn-secondary">Upload</a>

                          <div wire:loading wire:target="uploadContract">
                            <p class="text-success fw-bold" style="font-size: 16px">Processing ...</p>
                        </div>
                      </div>
                  </div>
                  </div>
              </div>
          </div>
      </div>
</div>
