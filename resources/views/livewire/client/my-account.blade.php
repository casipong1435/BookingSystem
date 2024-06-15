<div>
    <div class="col-md-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="row g-0 d-flex justify-content-center align-items-center">
                    <div class="col-md-5 shadow p-3">
                        <div class="form-group mb-2 text-center">
                            <img src="{{ asset('images/id/'.$profile->img_id) }}" alt="ID" class="rounded-full" width="70" height="70">
                            <div>Uploaded ID</div>
                        </div>
                        <div class="form-group mb-2">
                            <span class="mb-1">Name</span>
                            <div class="border disabled p-2 w-100">{{ ucfirst($profile->first_name).' '.ucfirst($profile->last_name) }}</div>
                        </div>
                        <div class="form-group mb-2">
                            <span class="mb-1">Date of Birth</span>
                            <div class="border disabled p-2 w-100">{{ $profile->date_of_birth }}</div>
                        </div>
                        <div class="form-group mb-2">
                            <span class="mb-1">Address</span>
                            <div class="border disabled p-2 w-100">{{ $profile->address }}</div>
                        </div>
                        <div class="form-group mb-2">
                            <span class="mb-1">Zip Code</span>
                            <div class="border disabled p-2 w-100">{{ $profile->zipcode }}</div>
                        </div>
                        <form wire:submit.prevent="updateContact">
                            @csrf
                            <div class="form-group mb-2">
                                <span class="mb-1">Contact Number</span>
                                <div class="position-relative">
                                    <input type="text" class="p-2 w-100" wire:model="contact_number" {{ $state == 0 ? 'disabled':'' }}>
                                    <div class="update-icon position-absolute" style="top: 3px; right: 5px; cursor: pointer" wire:click="updateState({{ 1 }})"><i class="bi bi-pencil-square fs-3"></i></div>
                                </div>
                                @error('contact_number')
                                    <div class="text-danger message">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($state == 1)
                                <div class="form-group text-center mb-2">
                                    <button type="submit" class="btn btn-success w-100">Save</button>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-secondary w-100" wire:click="updateState({{ 0 }})">Cancel</button>
                                </div>
                            @endif
                        </form>
                        <div class="form-group">
                           @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                           @endif
                           @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show message" id="message" role="alert">
                                    {{ session()->get('error') }}
                                </div>
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
