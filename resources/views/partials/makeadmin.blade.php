<!-- Modal -->
<div class="modal fade" wire:ignore.self id="makeAdmin" tabindex="-1" aria-labelledby="makeAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="makeAdminLabel">{{ $name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-md-12 p-3">
                <div class="row">
                    <div class="form-group">
                        <label for="new_role" class="mb-1">Change Role</label>
                        <br>
                        <select wire:model="new_userrole" id="new_role" class="w-50 w-md-100 p-2">
                            <option selected disabled>Select</option>
                            @if (auth()->user()->role == 'admin-tcgc' || auth()->user()->role == 'tcgc')
                                <option value="2">Admin</option>
                                <option value="4">Staff</option>
                            @elseif (auth()->user()->role == 'admin-tourism' || auth()->user()->role == 'tourism')
                                <option value="1">Admin</option>
                                <option value="3">Staff</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="addAdmin()" wire:confirm="Confirm Changes?">Save changes</button>
        </div>
    </div>
    </div>
</div>