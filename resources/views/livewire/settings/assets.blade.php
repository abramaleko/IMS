<div class="row">
    <div class="col-xl-12">
        <div class="card" style="max-height: 25rem;">
           <div class="card-header">
               <h4 class="card-title">Assets</h4>
               <div>
                   <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAsset">
                       <i class="fas fa-plus me-2"></i>
                       Add Asset
                   </button>
                   <!--add asset-->
                   <div class="modal fade" id="newAsset"  aria-hidden="true" wire:ignore.self>
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title">Add Asset</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal">
                                   </button>
                               </div>
                               <div class="modal-body">

                                   <div class="mb-3">
                                       <label class="form-label">Asset Name</label>
                                       <input type="text" class="form-control" wire:model.defer="new_asset.asset_name">

                                       @error('new_asset.asset_name')
                                       <div class="mt-2">
                                           <span class="text-danger fw-bold">{{$message}}</span>
                                       </div>
                                       @enderror
                                   </div>

                                   <div class="mb-3">
                                    <label class="form-label">Asset Type</label>
                                    <input type="text" class="form-control" wire:model.defer="new_asset.asset_type">

                                    @error('new_asset.asset_type')
                                    <div class="mt-2">
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Reward Level</label>
                                    <input type="text" class="form-control" wire:model.defer="new_asset.reward_level">

                                    @error('new_asset.reward_level')
                                    <div class="mt-2">
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Payout Amount</label>
                                    <input type="number" class="form-control" wire:model.defer="new_asset.payout_amount">

                                    @error('new_asset.payout_amount')
                                    <div class="mt-2">
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>


                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                   <button type="button" class="btn btn-primary" wire:click="saveAsset" wire:loading.remove>Create</button>

                                   <div wire:loading wire:target="saveAsset">
                                       <p class="text-success fw-bold" style="font-size: 15px">saving ...</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!--edit asset-->
                   <div class="modal fade" id="editAsset"  aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Asset</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Asset Name</label>
                                    <input type="text" class="form-control" wire:model.defer="selectedAsset.asset_name">

                                    @error('selectedAsset.asset_name')
                                    <div class="mt-2">
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Asset Type</label>
                                    <input type="text" class="form-control" wire:model.defer="selectedAsset.asset_type">

                                    @error('selectedAsset.asset_type')
                                    <div class="mt-2">
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Reward Level</label>
                                    <input type="text" class="form-control" wire:model.defer="selectedAsset.reward_level">

                                    @error('selectedAsset.reward_level')
                                    <div class="mt-2">
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Payout Amount</label>
                                    <input type="text" class="form-control" wire:model.defer="selectedAsset.payout_amount">

                                    @error('selectedAsset.payout_amount')
                                    <div class="mt-2">
                                        <span class="text-danger fw-bold">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" wire:click="updateAsset" wire:loading.remove>Update changes</button>

                                <div wire:loading wire:target="updateProject">
                                    <p class="text-success fw-bold" style="font-size: 15px">updating ...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
           </div>
           <div class="card-body" style="overflow-y: auto;" x-data="{selectedAsset: @entangle('selectedAsset')}">

            @if (session()->has('AssetCreate'))
            <div class="alert alert-success alert-dismissible fade show">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
              {{ session('AssetCreate') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
              </button>
          </div>
            @endif
            @if (session()->has('AssetUpdated'))
            <div class="alert alert-success alert-dismissible fade show">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
              {{ session('AssetUpdated') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
              </button>
          </div>
            @endif

            @if (session()->has('AssetDelete'))
            <div class="alert alert-danger alert-dismissible fade show">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
              {{ session('AssetDelete') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
              </button>
          </div>
            @endif

               <div class="">
                   <table class="table table-responsive-md">
                       <thead>
                           <tr>
                               <th><strong>#</strong></th>
                               <th><strong>Name</strong></th>
                               <th><strong>Type</strong></th>
                               <th><strong>Reward Level</strong></th>
                               <th><strong>Payout Amount ($)</strong></th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($assets as $asset)
                           <tr>
                               <td><strong>{{$loop->iteration}}</strong></td>
                               <td>{{$asset->asset_name}}</td>
                               <td>{{$asset->asset_type}}</td>
                               <td>{{$asset->reward_level}}</td>
                               <td>{{number_format($asset->payout_amount)}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button @click="
                                        selectedAsset= @js($asset);
                                        $('#editAsset').modal('show');
                                        "
                                        type="button" class="me-3 btn-xs sharp btn-secondary light">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </button>
                                        <a href="#" wire:click="deleteAsset({{$asset->id}})"  class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a></td>
                                    </div>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
        </div>
     </div>
</div>
