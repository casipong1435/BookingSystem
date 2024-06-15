<div class="col-md-12 mt-3 p-1 text-center">
    <h2 class="mb-2">Admin & Staff Accounts</h2>
    <div class="m-2 d-flex justify-content-end">
        <input type="text" wire:model.live="search_data" class="p-1" placeholder="Search User">
    </div>
    <table cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Role</th>
                <th>Username</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($official_users) > 0)
                <?php $i = 1; ?>
                @foreach ($official_users as $user)
                    <tr>
                        <td data-label="No.">{{ $i++ }}</td>
                        <td data-label="Role">
                            @if ($user->role == 'admin-tourism')
                                Admin
                            @else
                                Staff
                            @endif
                        </td>
                        <td data-label="Username">{{ $user->username }}</td>
                        <td data-label="Name">{{ ucfirst($user->first_name).' '.ucfirst($user->last_name) }}</td>
                        <td data-label="Address">{{ $user->address }}</td>
                        <td data-label="Action">
                            @if ($user->username != auth()->user()->username)
                                @if (auth()->user()->role == 'admin-tourism')
                                    <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#makeAdmin"  wire:click="userInfo('{{ $user->username }}')"><i class="bi bi-person-check"></i></button>
                                @endif
                                <button type="button" class="btn btn-danger mx-1" wire:click.prevent="DeleteUser('{{ $user->username }}')"><i class="bi bi-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td data-label="State" colspan="6" class="text-center p-2">No Official Users</td>
            </tr>
            @endif
        </tbody>
    </table>
    @include('partials.makeadmin')
</div>