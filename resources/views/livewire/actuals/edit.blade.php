    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div>
        <div class="row">
           <h4 class="mb-2 fs-20 font-w600 me-auto">Actual Details</h4>
           @if (Session::has('success'))
           <div class="mb-3 alert alert-secondary alert-dismissible fade show">
               <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
               <strong>Success!</strong> {{Session::get('success')}}.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
               </button>
           </div>
           @endif
             <div class="col-xl-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                           <div class="mb-4 col-xl-6 col-md-6">
                               <label class="form-label font-w600">Projects :<span class="text-danger scale5 ms-2">*</span></label>
                               <select wire:model.defer="project" class="form-select" id="projects">
                                   <option value="" selected disabled>Choose ..</option>
                                   @foreach ($projects as $project)
                                   <option value="{{$project->id}}">{{$project->name}}</option>
                                   @endforeach
                               </select>
                               @error('project')
                               <span class="text-danger fw-bold d-block">{{$message}}</span>
                             @enderror
                           </div>

                             <div class="mb-4 col-xl-6 col-md-6">
                               <label class="form-label font-w600">Year<span class="text-danger scale5 ms-2">*</span></label>
                                 <input type="number" wire:model.defer="year"  class="mb-2 form-control solid"  aria-label="year">
                                 @error('year')
                                   <span class="text-danger fw-bold">{{$message}}</span>
                                 @enderror
                             </div>

                             <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">Month<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="month" min="0" max="12"  class="mb-2 form-control solid"  aria-label="month">
                                  @error('month')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">GS NGR<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="gs_ngr"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('gs_ngr')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>


                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">GS COMMUNITY ALLOCATION<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="gs_community_allocation"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('gs_community_allocation')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>


                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">CC NGR<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="cc_ngr"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('cc_ngr')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">CC COMMUNITY ALLOCATION<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="cc_community_allocation"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('cc_community_allocation')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">EX NGR<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="ex_ngr"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('ex_ngr')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">EX COMMUNITY ALLOCATION<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="ex_community_allocation"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('ex_community_allocation')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">UK NGR<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="uk_ngr"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('uk_ngr')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="mb-4 col-xl-6 col-md-6">
                                <label class="form-label font-w600">UK COMMUNITY ALLOCATION<span class="text-danger scale5 ms-2">*</span></label>
                                  <input type="number" wire:model.defer="uk_community_allocation"   class="mb-2 form-control solid"  aria-label="month">
                                  @error('uk_community_allocation')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                              </div>


                     </div>
                     <div class="card-footer text-end">
                         <div>
                             <a href="javascript:void(0);" wire:click="resetForm" class="btn btn-primary me-3">Reset</a>
                             <a href="javascript:void(0);" wire:loading.remove wire:click='submit' class="btn btn-secondary">Update</a>

                             <div wire:loading wire:target="submit">
                               <p class="text-success fw-bold" style="font-size: 16px">Updating ...</p>
                           </div>
                         </div>
                     </div>
                     </div>
                 </div>
             </div>
         </div>
   </div>
