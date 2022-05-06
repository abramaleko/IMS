<div>
            {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">
        <!-- roles-->
        <div class="col-xl-6">
             <div class="card" style="max-height: 25rem;">
                <div class="card-header">
                    <h4 class="card-title">Organization  Roles</h4>
                    <div>
                        <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#newRoleModal">
                            <i class="fas fa-plus me-2"></i>
                            Add New Role
                        </button>
                        <div class="modal fade" id="newRoleModal"  aria-hidden="true" wire:ignore.self>
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Register Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label">Role Name</label>
                                            <input type="text" class="form-control" wire:model.defer="role_name">

                                            @error('role_name')
                                            <div class="mt-2">
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" wire:click="newRole" wire:loading.remove>Save changes</button>

                                        <div wire:loading wire:target="newRole">
                                            <p class="text-success fw-bold" style="font-size: 15px">saving ...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="card-body" style="overflow-y: auto;">
                    <div class="">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>#</strong></th>
                                    <th><strong>Roles</strong></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td><strong>{{$loop->iteration}}</strong></td>
                                    <td>{{$role->name}}</td>
                                     <td>
                                         <div class="d-flex">
                                            <a href="{{route('settings.role-permissions',$role->id)}}" class="me-3 btn-xs sharp btn-secondary light">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="#" wire:click="deleteRole({{$role->id}})" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                    {{-- <div class="modal fade bd-example-modal-lg" id="roleModal-{{$role->id}}"  aria-hidden="true" tabindex="-1" wire:ignore.self>
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pemissions for {{$role->name}} Role</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                     @foreach ($permissions as $permission)
                                                    <div class="col-xl-4 col-xxl-6 col-6">
                                                        <div class="mb-3 form-check custom-checkbox checkbox-danger">
                                                            <input type="checkbox" class="form-check-input"  id="checkbox-{{$permission->id}}" wire:model.defer="selectedPermissions" value="{{$permission->name}}">
                                                            <label class="form-check-label" for="checkbox-{{$permission->id}}">{{$permission->name}}</label>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" wire:click="savePermissions({{$role->id}})" wire:loading.remove>Save changes</button>

                                                    <div wire:loading wire:target="savePermissions">
                                                        <p class="text-success fw-bold" style="font-size: 15px">saving ...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            window.addEventListener('closePermissionModal', event => {
                                                $("#roleModal-{{$role->id}}").modal('hide');
                                            })
                                        </script>
                                    </div> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
          </div>
          <!-- end of roles-->
          <div class="col-xl-6">
            <div class="card" style="max-height: 25rem;">
                <div class="card-header">
                    <h4 class="card-title">Mr.Kuku Projects</h4>
                    <div>
                        <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProjectModal">
                            <i class="fas fa-plus me-2"></i>
                            Add Project
                        </button>
                        <div class="modal fade" id="newProjectModal"  aria-hidden="true" wire:ignore.self>
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Register Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label">Project Name</label>
                                            <input type="text" class="form-control" wire:model.defer="project_name">

                                            @error('project_name')
                                            <div class="mt-2">
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" wire:click="newProject" wire:loading.remove>Save changes</button>

                                        <div wire:loading wire:target="newProject">
                                            <p class="text-success fw-bold" style="font-size: 15px">saving ...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="card-body"style="overflow-y: auto;">
                    <div class="">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Project Name</strong></th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($projects as $project)
                              <tr>
                                <td><strong>{{$loop->iteration}}</strong></td>
                                <td>{{$project->name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="me-3 btn-xs sharp btn-secondary light">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="#" wire:click="deleteProject({{$project->id}})" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
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
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="max-height: 25rem;">
               <div class="card-header">
                   <h4 class="card-title">Office Locations</h4>
                   <div>
                       {{-- <a href="{{route('investors.index')}}" class="btn btn-primary me-3 btn-sm">Add New Role</a> --}}
                       <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#newLocationModal">
                           <i class="fas fa-plus me-2"></i>
                           Add Location
                       </button>
                       <div class="modal fade" id="newLocationModal"  aria-hidden="true" wire:ignore.self>
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title">Register Location</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal">
                                       </button>
                                   </div>
                                   <div class="modal-body">

                                       <div class="mb-3">
                                           <label class="form-label">Location Name</label>
                                           <input type="text" class="form-control" wire:model.defer="location">

                                           @error('location')
                                           <div class="mt-2">
                                               <span class="text-danger fw-bold">{{$message}}</span>
                                           </div>
                                           @enderror
                                       </div>

                                       <div class="mb-3">
                                        <label class="form-label">Contract Sign Minimum Amount</label>
                                        <input type="number" class="form-control" wire:model.defer="min_amount">

                                        @error('min_amount')
                                        <div class="mt-2">
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Contract Sign Maximum Amount</label>
                                        <input type="number" class="form-control" wire:model.defer="max_amount">

                                        @error('max_amount')
                                        <div class="mt-2">
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                        </div>
                                        @enderror
                                    </div>


                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary" wire:click="newLocation" wire:loading.remove>Save changes</button>

                                       <div wire:loading wire:target="newLocation">
                                           <p class="text-success fw-bold" style="font-size: 15px">saving ...</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       </div>
               </div>
               <div class="card-body" style="overflow-y: auto;">
                   <div class="">
                       <table class="table table-responsive-md">
                           <thead>
                               <tr>
                                   <th><strong>#</strong></th>
                                   <th><strong>Offices</strong></th>
                                   <th><strong>Min Amount</strong></th>
                                   <th><strong>Max Amount</strong></th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($offices as $office)
                               <tr>
                                   <td><strong>{{$loop->iteration}}</strong></td>
                                   <td>{{$office->location}}</td>
                                   <td>{{number_format($office->min_amount)}} Tshs</td>
                                   <td>{{number_format($office->max_amount)}} Tshs</td>
                                    <td><a href="#" wire:click="deleteOffice({{$office->id}})"  class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a></td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
            </div>
         </div>
    </div>
</div>