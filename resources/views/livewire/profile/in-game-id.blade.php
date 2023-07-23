<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Unreal Kingdoms In Game ID</h4>
            </div>
            <div class="card-body">

              @if (session()->has('updateGameInfo'))
              <div class="alert alert-success alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <strong>Success!</strong> {{ session('updateGameInfo') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>
              @endif

                <div class="form-validation">
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="email">Game Id
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control solid" id="game-id"  wire:model.defer="game_id" placeholder="Enter your Unreal Kingdoms Game Id">
                                        @error('game_id')
                                        <div class="mt-2">
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button wire:click='updateGameInfo'
                        type="button" class="btn me-2 btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
