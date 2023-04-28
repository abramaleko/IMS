<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Password</h4>
            </div>
            <div class="card-body">
                @if (session()->has('password-change-success'))
                <div class="alert alert-success alert-dismissible fade show">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                  <strong>Success!</strong> {{ session('password-change-success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                  </button>
              </div>
                @endif

               <div class="row">
                  <div class="col-12">
                        <label class="col-lg-4 col-form-label" for="current-password">Current Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control solid" id="current-password" wire:model='current_password'>
                        @error('current_password')
                        <div class="mt-2">
                            <span class="text-danger fw-bold">{{$message}}</span>
                        </div>
                        @enderror
                  </div>

                  <div class="col-12">
                    <label class="col-lg-4 col-form-label" for="password">New Password
                        <span class="text-danger">*</span>
                    </label>
                        <input type="password" class="form-control solid" id="password" wire:model='password'>

                        @error('password')
                        <div class="mt-2">
                            <span class="text-danger fw-bold">{{$message}}</span>
                        </div>
                        @enderror
                 </div>

              <div class="col-12">
                <label class="col-lg-4 col-form-label" for="password_confirmation">Confirm Password
                    <span class="text-danger">*</span>
                </label>
                <input type="password" class="form-control solid" id="password_confirmation" wire:model='password_confirmation'>
                @error('password_confirmation')
                <div class="mt-2">
                    <span class="text-danger fw-bold">{{$message}}</span>
                </div>
                @enderror
          </div>

               </div>

              <div class="mt-4">
                <button wire:click='updatePassword'
                type="button" class="btn me-2 btn-primary">Update Password</button>
              </div>
            </div>
        </div>
    </div>
</div>
