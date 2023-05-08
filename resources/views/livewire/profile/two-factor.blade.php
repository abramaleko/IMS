<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Two Factor Authentication</h4>
            </div>
            <div class="card-body">
                @if (session()->has('two-factor'))
                <div class="alert alert-success alert-dismissible fade show">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                  <strong>Success!</strong> {{ session('two-factor') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                  </button>
              </div>
                @endif
                <h4>
                    @if ($user->two_factor)
                       You have enabled two factor authentication.
                       @else
                      Two factor authentication has been disabled
                    @endif
                </h4>
                <p class="card-text">
                    When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your email address registered here
                </p>
            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <div>
                    <button wire:click='toggleTwoFactorAuth'
                    type="button" class="btn me-2 {{$user->two_factor ? 'btn-secondary' : 'btn-primary '}}">
                    {{$user->two_factor ? 'Disable' : 'Enable'}}
                </button>
                  </div>
            </div>
        </div>
    </div>
</div>
