<div>

    
    <div class="container p-2" wire:ignore.self>
        <div class="row">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 shadow p-4 m-1">
                    <div class="form-group mb-2">
                        <span class="mb-1">Name</span>
                        <div class="border disabled p-2 w-100">{{ ucfirst($profile->first_name).' '.ucfirst($profile->last_name) }}</div>
                    </div>
                    <div class="form-group mb-2">
                        <span class="mb-1">Username</span>
                        <div class="border disabled p-2 w-100">{{ $profile->username }}</div>
                    </div>
                    <div class="form-group mb-2">
                        <span class="mb-1">Email</span>
                        <div class="border disabled p-2 w-100">{{ $profile->email }}</div>
                    </div>
                    <div class="form-group mb-2">
                        <div>
                            <a href="#" class="text-decoration-none" wire:click.prevent="clickPasswordUpdate">Update Password</a>
                        </div>
                        <div>
                            <a href="#" class="text-decoration-none" wire:click.prevent="clickEmailUpdate">Update Email</a>
                        </div>
                    </div>
                </div>

                @if ($isPasswordUpdate == true)
                    <div class="col-md-4 shadow p-4 m-1">
                        <div class="form-group mb-2 text-center">
                            <span class="mb-1">Update Password</span>
                        </div>
                        <form wire:submit.prevent="UpdatePassword">
                            @csrf
                            <div class="form-group mb-2">
                                <span class="mb-1">Old Password</span>
                                <input type="password" wire:model="old_password" id="old-password" class="p-2 w-100">
                                @error('old_password')
                                    <div class="text-danger message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <span class="mb-1">New Password</span>
                                <input type="password" wire:model="new_password" id="new-password" class="p-2 w-100">
                                @error('new_password')
                                    <div class="text-danger message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <span class="mb-1">Confirm Password</span>
                                <input type="password" wire:model="confirm_password" id="confirm-password" class="p-2 w-100">
                                @error('confirm_password')
                                    <div class="text-danger message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2 d-flex justify-content-end px-2">
                                <button type="button" class="btn btn-secondary mx-1" wire:click="CancelUpdate">Cancel</button>
                                <button type="submit" class="btn btn-primary mx-1">Update</button>
                            </div>
                        </form>
                    </div>
                @endif

                @if ($isEmailUpdate == true)
                    <div class="col-md-4 shadow p-4 m-1" id="update-email-form" wire:key="update-email-form">
                        <div class="form-group mb-2 text-center">
                            <span class="mb-1">Update Email</span>
                        </div>
                        <form wire:submit.prevent="UpdateEmail">
                            <div class="form-group mb-2">
                                <span class="mb-1">New Email</span>
                                <input type="email" wire:model="new_email" id="new-email" class="p-2 w-100">
                                @error('new_email')
                                    <div class="text-danger message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <span class="mb-1">Enter Password</span>
                                <input type="password" wire:model="password" id="password" class="p-2 w-100">
                                @error('password')
                                    <div class="text-danger message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2 d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary mx-1" wire:click="CancelUpdate">Cancel</button>
                                <button type="submit" class="btn btn-primary mx-1">Update</button>
                            </div>
                        </form>
                    </div>
                @endif
                
            </div>
        </div>
    </div>

    @include('partials.notification')
</div>
