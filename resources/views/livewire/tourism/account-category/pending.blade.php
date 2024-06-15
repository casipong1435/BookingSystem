<div class="col-md-12 mt-3 p-1 text-center">
    <h2 class="mb-2">Pending Accounts</h2>
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
            @if (count($pending_users) > 0)
                <?php $i = 1; ?>
                @foreach ($pending_users as $user)
                    <tr>
                        <td data-label="No.">{{ $i++ }}</td>
                        <td data-label="Username">{{ $user->username }}</td>
                        <td data-label="Name">{{ ucfirst($user->first_name).' '.ucfirst($user->last_name) }}</td>
                        <td data-label="Address">{{ $user->address }}</td>
                        <td data-label="Action">
                            <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#UserInfo{{ $user->id }}"><i class="bi bi-eye"></i></button>
                            <button type="button" class="btn btn-success mx-1" wire:click.prevent="updateUserStatus('{{ $user->username }}',{{ 1 }}, 'accept')" wire:confirm="Are you sure you want to approved this user?">
                                <div wire:loading wire:target="updateUserStatus('{{ $user->username }}',{{ 1 }}, 'accept')" wire:key="updateUserStatus">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </div>
                                <i class="bi bi-check2-circle"></i>
                            </button>
                            <button type="button" class="btn btn-danger mx-1" wire:click.prevent="DeleteUser('{{ $user->username }}')" wire:confirm="Are you sure you want to delete this account?"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>

                    <div class="modal fade" wire:ignore.self id="UserInfo{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="UserInfoLabel">User Info</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="col-md-12 p-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <img src="{{ asset('images/id/'.$user->img_id) }}" alt="" width="200" height="200" onclick="change(this)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <img src="{{ asset('images/id/'.$user->back_id) }}" alt="" width="200" height="200" onclick="change(this)">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="fw-bold">{{ ucfirst($user->first_name).' '.ucfirst($user->last_name) }}</div>
                                    <div class="form-group mb-2 text-start">
                                        <div class="mb-1">Username</div>
                                        <div class="disabled border p-2">{{ $user->username }}</div>
                                    </div>
                                    <div class="form-group mb-2 text-start">
                                        <div class="mb-1">Date of Birth</div>
                                       <div class="disabled border p-2">{{ $user->date_of_birth }}</div>
                                    </div>
                                    <div class="form-group mb-2 text-start">
                                        <div class="mb-1">Contact</div>
                                       <div class="disabled border p-2">{{ $user->contact_number }}</div>
                                    </div>
                                    <div class="form-group mb-2 text-start">
                                        <div class="mb-1">Email</div>
                                       <div class="disabled border p-2">{{ $user->email }}</div>
                                    </div>
                                    <div class="form-group mb-2 text-start">
                                        <div class="mb-1">Address</div>
                                       <div class="disabled border p-2">{{ $user->address }}</div>
                                    </div>
                                    <div class="form-group mb-2 text-start">
                                        <div class="mb-1">Zip Code</div>
                                       <div class="disabled border p-2">{{ $user->zipcode }}</div>
                                    </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                @endforeach
            @else
            <tr>
                <td data-label="State" colspan="5" class="text-center p-2">No Pending Users</td>
            </tr>
            @endif
        </tbody>
    </table>

    <script>
        function change(img){
            img.classList.toggle('fullsize');
        }
    </script>
</div>