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
                            @error('investor_id')
                            <span class="text-danger fw-bold d-block">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-4 col-xl-6 col-md-6">
                            <label class="form-label font-w600">Project Name:<span class="text-danger scale5 ms-2">*</span></label>
                            <select wire:model.defer="project" class="form-select" id="project_name">
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
                            <label class="form-label font-w600">Amount ($)<span class="text-danger scale5 ms-2">*</span></label>
                              <input type="number" wire:model.debounce.500ms="amount"  class="mb-2 form-control solid"  aria-label="name">
                              <small class="text-muted">{{$amount > 0 ? number_format($amount) : $amount}} $</small>
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
                          <div class="col-xl-12">
                            <div class="card" style="max-height: 25rem;">
                                <div class="card-header">
                                    <h4 class="card-title">Contract Assets</h4>
                                    <div>
                                        <button type="button" class="mb-2 btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newContractAsset">
                                            <i class="fas fa-plus me-2"></i>
                                            Add Asset
                                        </button>
                                        <!--add new project-->
                                        <div class="modal fade" id="newContractAsset"  aria-hidden="true" wire:ignore.self>
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Contract Asset</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="mb-4">
                                                            <label class="form-label font-w600">Asset Name<span class="text-danger scale5 ms-2">*</span></label>
                                                            <select wire:model="newAsset" class=" form-control wide solid" >
                                                                <option value="" selected disabled>Choose ..</option>
                                                                @foreach ($assets as $asset)
                                                                  <option value="{{$asset}}">{{$asset->asset_name}} - {{$asset->project->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('newAsset')
                                                            <span class="text-danger fw-bold">{{$message}}</span>
                                                          @enderror
                                                        </div>

                                                        <div class="mt-4">
                                                            <label class="form-label font-w600">Asset Type</label>
                                                            <input type="text" wire:model.defer="newAssetType" class="form-control solid" disabled>
                                                        </div>

                                                        <div class="mt-4">
                                                            <label class="form-label font-w600">Asset Reward Level</label>
                                                            <input type="text" wire:model.defer="newRewardLevel" class="form-control solid" disabled>
                                                        </div>

                                                        <div class="mt-4">
                                                            <label class="form-label font-w600">Asset Payout Amount</label>
                                                            <input type="text" wire:model.defer="newPayoutAmout" class="form-control solid" disabled>
                                                        </div>

                                                        <div class="mt-4">
                                                            <label class="form-label font-w600">Asset address<span class="text-danger scale5 ms-2">*</span></label>
                                                            <input type="text" wire:model.defer="newAssetAddress" class="form-control solid">
                                                              @error('newAssetAddress')
                                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                              @enderror
                                                        </div>

                                                        <div class="mt-4">
                                                            <label class="form-label font-w600">Staked<span class="text-danger scale5 ms-2">*</span></label>
                                                            <select wire:model.defer="newStakeOption" class="form-control">
                                                                <option value="" selected disabled>Choose ..</option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                              @error('newStakeOption')
                                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                              @enderror
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" wire:click="addContractAsset" wire:loading.remove>Save changes</button>

                                                        <div wire:loading wire:target="addContractAsset">
                                                            <p class="text-success fw-bold" style="font-size: 15px">saving ...</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                                <div class="card-body"style="overflow-y: auto;">
                                    @error('contractAssets')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                  @enderror
                                    <div class="">
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th style="width:80px;"><strong>#</strong></th>
                                                    <th><strong>Asset Name</strong></th>
                                                    <th><strong>Asset Type</strong></th>
                                                    <th><strong>Reward Level</strong></th>
                                                    <th><strong>Payout Amount</strong></th>
                                                    <th><strong>Asset Address</strong></th>
                                                    <th><strong>Staked</strong></th>


                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($contractAssets as $asset)
                                              <tr>
                                                <td><strong>{{$loop->iteration}}</strong></td>
                                                <td>{{$asset['asset_name']}}</td>
                                                <td>{{$asset['asset_type']}}</td>
                                                <td>{{$asset['reward_level']}}</td>
                                                <td>{{$asset['payout_amount']}}</td>
                                                <td>{{$asset['asset_address']}}</td>
                                                <td>{{$asset['staked'] ? 'True' : 'False'}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#" wire:click="removeContractAsset({{$loop->iteration}})" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
