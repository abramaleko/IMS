<div>
    <div class="row">
        <h4 class="mb-2 fs-20 font-w600 me-auto">Contract Details</h4>
          <div class="col-xl-12">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Investor Name:<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" value="{{$investor_name}}"  class="mb-2 form-control solid disabled"  aria-label="name" disabled>
                        </div>

                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Project Name:<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" value="{{$project_name}}"  class="mb-2 form-control solid disabled"  aria-label="name" disabled>
                        </div>

                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Contract Start Date (months)<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" value="{{$start_date}}" class="form-control disabled" disabled>

                          </div>

                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Contract End Date (months)<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" value="{{$end_date}}" class="form-control disabled" disabled>

                          </div>

                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Amount (Tshs)<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="number" wire:model.debounce.500ms="amount"   class="mb-2 form-control solid"  aria-label="name">
                              <small class="text-muted">{{$amount > 0 ? number_format($amount) : $amount}} Tshs</small>
                              @error('amount')
                                <span class="text-danger fw-bold d-block">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">ROI period (months)<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="number" wire:model.defer="roi_period"  min="0" max="12"  class="mb-2 form-control solid"  aria-label="name">
                              @error('roi_period')
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
                          <a href="javascript:void(0);" wire:loading.remove wire:click='editContract' class="btn btn-secondary">Save</a>

                          <div wire:loading wire:target="editContract">
                            <p class="text-success fw-bold" style="font-size: 16px">Saving ...</p>
                        </div>
                      </div>
                  </div>
                  </div>
              </div>
          </div>
      </div>
</div>