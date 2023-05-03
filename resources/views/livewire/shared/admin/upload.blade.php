    {{-- In work, do what you enjoy. --}}
<div class="row">
    <h4 class="mb-2 fs-20 font-w600 me-auto">Document details Details</h4>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-4 col-xl-12 col-md-12">
                      <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" wire:model.defer="title"   class="mb-2 form-control solid" placeholder="Document Title" aria-label="name">
                        @error('title')
                          <span class="text-danger fw-bold">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-4 col-xl-12 col-md-12">
                        <label for="description" class="form-label font-w600">Description</label>
                          <textarea wire:model.defer="description" class="py-2 form-control solid" rows="6" id="description"></textarea>
                          @error('description')
                            <span class="text-danger fw-bold">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="mb-4 col-xl-12 col-md-12">
                        <label class="form-label font-w600">File Upload<span class="text-danger scale5 ms-2">*</span></label>
                        <small class="text-muted">(Allowed files formarts are pdf and images each not exceeding 5Mb)</small>
                        <div class="form-file">
                          <input type="file" wire:model="file"  class="form-file-input form-control solid">
                      </div>
                          @error('file')
                            <span class="text-danger fw-bold">{{$message}}</span>
                          @enderror
                      </div>
                    <div class="mb-4 col-xl-6 col-md-6">
                        <label class="form-label font-w600">Valid Untill <span class="text-danger scale5 ms-2">*</span></label>
                        <div class="input-group">
                             <div class="input-group-text"><i class="far fa-clock"></i></div>
                             <input type="date" wire:model.defer="valid_untill" class="mb-2 form-control solid " aria-label="name">
                         </div>
                         @error('valid_untill')
                          <span class="text-danger fw-bold">{{$message}}</span>
                        @enderror
                    </div>

            </div>
            <div class="card-footer text-end">
                <div>
                    <a href="javascript:void(0);" wire:click="resetForm" class="btn btn-primary me-3">Reset</a>
                    <a href="javascript:void(0);" wire:click='saveDocument' class="btn btn-secondary">Upload</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
