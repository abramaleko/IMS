<div class="card" style="max-height: 25rem;">
    <div class="card-header">
        <h4 class="card-title">Asset Types</h4>
        <div>
            <button type="button" class="mb-2 btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#newAssetTypeName">
                <i class="fas fa-plus me-2"></i>
                 Asset Type
            </button>
            <!--add new asset-->
            <div class="modal fade" id="newAssetTypeName"  aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New Asset Type</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label class="form-label">Asset Type Name</label>
                                <input type="text" class="form-control" wire:model.defer="asset_name">

                                @error('asset_name')
                                <div class="mt-2">
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="newAssetType" wire:loading.remove>Save changes</button>

                            <div wire:loading wire:target="newAssetType">
                                <p class="text-success fw-bold" style="font-size: 15px">saving ...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
    </div>
    <div class="card-body"style="overflow-y: auto;">

        @if (session()->has('newAssetTypeSuccess'))
        <div class="alert alert-success alert-dismissible fade show">
          {{ session('newAssetTypeSuccess') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
          </button>
      </div>
        @endif

        @if (session()->has('assetTypeDelete'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('assetTypeDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>
        @endif
        <div class="">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th style="width:20px;"><strong>#</strong></th>
                        <th><strong>Type Name</strong></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($assetsTypes as $asset)
                  <tr>
                    <td><strong>{{$loop->iteration}}</strong></td>
                    <td>{{$asset->name}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="#" wire:click="deleteAsset({{$asset->id}})" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
