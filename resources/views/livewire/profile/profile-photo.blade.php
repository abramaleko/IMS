<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Photo</h4>
            </div>
            <div class="card-body">
                @if (session()->has('profileUpdated'))
                <div class="alert alert-success alert-dismissible fade show">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                  <strong>Success!</strong> {{ session('profileUpdated') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                  </button>
              </div>
                @endif
                <div class="row" x-data="{ photoName: null, photoPreview: null }">
                   <div class="col-xl-2">
                    <!-- Current Profile Photo -->
                    <div x-show="! photoPreview" class="fileinput-new thumbnail img-circle">
                        <img src="{{ auth()->user()->profilePhotoUrl()}}" class="profile-image" alt="profile-image"/>
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div x-show="photoPreview" class="fileinput-new thumbnail img-circle profile-image" style="display: none;">
                        <span class="d-block"
                        x-bind:style="`background-image: url(${photoPreview}); width: 110pxrem; height: 110px; background-position: center; background-repeat: no-repeat; background-size: cover;`" style="">
                        </span>
                    </div>

                     <!-- Profile Photo File Input -->
                     <input type="file" class="d-none" wire:model="photo" x-ref="photo"
                     x-on:change="
                         photoName = $refs.photo.files[0].name;
                         const reader = new FileReader();
                         reader.onload = (e) => {
                             photoPreview = e.target.result;
                         };
                         reader.readAsDataURL($refs.photo.files[0]);
                     " />
                   </div>

                   <div class="mt-4 col-xl-10">
                    <button type="button" x-on:click.prevent="$refs.photo.click()"
                    class="btn btn-dark btn-sm">Select A New Photo</button>
                    @if (auth()->user()->profile_path)
                      <button wire:click='deletePhoto'
                      type="button" class="ml-2 btn btn-warning btn-sm">Delete Image</button>
                    @endif
                   </div>
                </div>
               @error('photo')
               <div class="mt-2">
                <span class="text-danger fw-bold">{{$message}}</span>
                </div>
               @enderror

              @if ($photo)
              <div class="mt-5">
                <button wire:click='updatePhoto'
                type="button" class="ml-2 btn btn-primary">Save
               </button>
              </div>
              @endif

            </div>
        </div>
    </div>
</div>
