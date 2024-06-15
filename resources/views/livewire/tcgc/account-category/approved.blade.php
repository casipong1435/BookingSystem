<div class="col-md-12 p-1 text-center">
    <h2 class="mb-2">Approved Accounts</h2>
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
            @if (count($approved_users) > 0)
                <?php $i = 1; ?>
                @foreach ($approved_users as $user)
                    <tr>
                        <td data-label="No.">{{ $i++ }}</td>
                        <td data-label="Username">{{ $user->username }}</td>
                        <td data-label="Name">{{ ucfirst($user->first_name).' '.ucfirst($user->last_name) }}</td>
                        <td data-label="Address">{{ $user->address }}</td>
                        <td data-label="Action">
                            @if (auth()->user()->role == 'admin-tcgc')
                                <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#makeAdmin"  wire:click="userInfo('{{ $user->username }}')"><i class="bi bi-person-check"></i></button>
                            @endif
                            <button type="button" class="btn btn-danger mx-1" wire:click.prevent="updateUserType('{{ $user->username }}',{{ 3 }}, 'ban')" wire:confirm="Are you sure you want to ban this user?">
                                <div wire:loading wire:target="updateUserType('{{ $user->username }}',{{ 3 }}, 'ban')" wire:key="updateUserType">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                              </svg>
                            </button>
                            <button type="button" class="btn btn-danger mx-1" wire:click.prevent="DeleteUser('{{ $user->username }}')" wire:confirm="Are you sure you want to delete this account?"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td data-label="State" colspan="5" class="text-center p-2">No Approved Users</td>
            </tr>
            @endif
        </tbody>
    </table>
    @include('partials.makeadmin')
</div>