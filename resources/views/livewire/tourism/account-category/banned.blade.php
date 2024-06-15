<div class="col-md-12 mt-3 p-1 text-center">
    <h2 class="mb-2">Banned Accounts</h2>
    <div class="m-2 d-flex justify-content-end">
        <input type="text" wire:model.live="search_data" class="p-1" placeholder="Search User">
    </div>
    <table cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($banned_users) > 0)
                <?php $i = 1; ?>
                @foreach ($banned_users as $user)
                    <tr>
                        <td data-label="No.">{{ $i++ }}</td>
                        <td data-label="Username">{{ $user->username }}</td>
                        <td data-label="Name">{{ ucfirst($user->first_name).' '.ucfirst($user->last_name) }}</td>
                        <td data-label="Address">{{ $user->address }}</td>
                        <td data-label="Action">
                            <button type="button" class="btn btn-secondary mx-1" wire:click.prevent="updateUserStatus('{{ $user->username }}',{{ 1 }}, 'unban')" wire:confirm="Are you sure you want to unban this user?">
                                <div wire:loading wire:target="updateUserStatus('{{ $user->username }}',{{ 1 }}, 'unban')" wire:key="updateUserStatus">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </div>
                                <i class="bi bi-x-circle"></i>
                            </button>
                            <button type="button" class="btn btn-danger mx-1" wire:click.prevent="DeleteUser('{{ $user->username }}')" wire:confirm="Are you sure you want to delete this account?"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td data-label="State" colspan="5" class="text-center p-2">No banned Users</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>