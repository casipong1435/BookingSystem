<!--Editing Items-->
<div class="modal fade" wire:ignore.self id="MakeReservation" tabindex="-1" aria-labelledby="MakeReservationLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="MakeReservationLabel">Make Reservation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="BookNow()" wire:key="BookNow">
            @csrf
            @if (auth()->check())
                @if (auth()->user()->status == 1)
                <div class="modal-body">
                    <div class="row">
                        @if(session()->has('fail'))
                          <div class="form-group p-2">
                            <div class="alert alert-danger alert-dismissible fade show message" id="message" role="alert">
                              {{ session()->get('fail') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          </div>
                        @endif
                        @if (auth()->user()->role == 'tourism' || auth()->user()->role == 'admin-tourism')
                            <div class="form-group p-2 d-flex justify-content-end">
                              <button type="button" class="btn btn-primary rounded-0 m-1 reservation-btn {{ $state == 0 ? 'active disabled':'' }}" wire:click.prevent="changeBooker({{ 0 }})">User</button>
                              <button type="button" class="btn btn-primary rounded-0 m-1 reservation-btn {{ $state == 0 ? '':'active disabled' }}" wire:click.prevent="changeBooker({{ 1 }})">Walkin</button>
                            </div>
                          @endif
                        <div class="form-group p-2">
                          <label for="item-name mb-1">Item Name</label>
                          <input id="item-name" wire:model="item_name" class="w-100 p-2" disabled>
                        </div>
                        <div class="form-group p-2">
                            <label for="purpose mb-1">Purpose</label>
                            <textarea id="purpose" wire:model="purpose" class="w-100 p-2" ></textarea>
                            @error('purpose')
                              <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-1 p-2">
                            <label for="starts_on" class="mb-2">Starts on</label>
                            <input type="datetime-local" wire:model="start_date" min="" id="starts_on" class="starts_on p-2 w-100">
                            @error('start_date')
                              <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-1 p-2">
                            <label for="ends_on" class="mb-1">Ends on</label>
                            <input type="datetime-local" wire:model="end_date" min="" id="ends_on" class="p-2 w-100">
                            @error('end_date')
                              <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ($client_item_type == 'equipment')
                          <div class="form-group mb-1 p-2">
                            <label for="quantity" class="mb-1">Quantity (Max = {{ $max_quantity }})</label>
                            <input type="number" wire:model="quantity" id="quantity" max="{{ $max_quantity }}" class="p-2 w-100">
                            @error('quantity')
                              <div class="text-danger message">{{ $message }}</div>
                            @enderror
                          </div>
                        @endif
                        @if ($state == 1)
                          <div class="form-group text-center p-2 border-bottom">
                            Reservee
                          </div>

                          <div class="form-group d-flex justify-content-end p-2">
                            <input type="search" wire:model.live="search_user" class="p-2 rounded" placeholder="Search Profile">
                          </div>
                          <div class="col-md-12">
                            <table>
                              <thead>
                                <tr>
                                  <th>Username</th>
                                  <th>Name</th>
                                  <th>Address</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if (count($profiles) > 0)
                                  @if ($search_user != '')
                                    @foreach ($profiles as $profile)
                                      <tr>
                                        <td data-label="Username">{{ $profile->username }}</td>
                                        <td data-label="Name">{{ ucfirst($profile->first_name).' '.ucfirst($profile->last_name) }}</td>
                                        <td data-label="Address">{{ $profile->address }}</td>
                                        <td>
                                          @if ($selected_user == false)
                                            <button type="button" class="btn btn-success" wire:click.prevent="getUsername('{{ $profile->username }}')">Select</button>
                                          @elseif ($selected_user == true && $username != $profile->username)
                                            <button type="button" class="btn btn-success {{ $selected_user == true ? 'disabled':'' }}">Select</button>
                                          @else
                                            @if ($username == $profile->username)
                                              <button type="button" class="btn btn-danger" wire:click.prevent="cancelSelect()">Cancel</button>
                                            @endif
                                          @endif
                                        </td>
                                      </tr>
                                    @endforeach
                                  @else
                                  <tr>
                                    <td colspan="4" class="text-center">Search a profile</td>
                                  </tr>
                                  @endif
                                @else
                                    <tr>
                                      <td colspan="4" class="text-center p-2">No Profile Found!</td>
                                    </tr>
                                @endif
                              </tbody>
                            </table>
                            <input type="hidden" wire:model="username">
                            @error('username')
                              <div class="text-danger message">Please select a profile.</div>
                            @enderror
                          </div>
                          @if ($selected_user == true)
                          <div class="col-md-12 mt-2">
                            <div class="form-group text-center p-2 border-bottom">
                              Reservee
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group p-1 text-center mb-2">
                                  <img src="{{ asset('images/id/'.$img_id) }}" alt="" width="100" height="100" onclick="change(this)">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group p-1 text-center mb-2">
                                  <img src="{{ asset('images/id/'.$back_id) }}" alt="" width="100" height="100" onclick="change(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group d-flex justify-content-between mb-2 p-2">
                                <div class="fw-bold">Name</div>
                                <div>{{ $name }}</div>
                              </div>
                              <div class="form-group d-flex justify-content-between mb-2 p-2">
                                <div class="fw-bold">Contact Number</div>
                                <div>{{ $contact_number }}</div>
                              </div>
                              <div class="form-group d-flex justify-content-between mb-2 p-2">
                                <div class="fw-bold">Email</div>
                                <div>{{ $email }}</div>
                              </div>
                              <div class="form-group d-flex justify-content-between mb-2 p-2">
                                <div class="fw-bold">Date of Birth</div>
                                <div>{{ $date_of_birth }}</div>
                              </div>
                              <div class="form-group d-flex justify-content-between mb-2 p-2">
                                <div class="fw-bold">Address</div>
                                <div>{{ $address }}</div>
                              </div>
                              <div class="form-group d-flex justify-content-between mb-2 p-2">
                                <div class="fw-bold">Zip Code</div>
                                <div>{{ $zipcode }}</div>
                              </div>
                            </div>
                          </div>
                          @endif
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal" wire:click="CloseModal">Cancel</button>
                  <button type="submit" class="btn btn-success">
                    <div wire:loading wire:target="BookNow">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      <span class="visually-hidden">Booking...</span>
                    </div>
                      Book Now
                  </button>
                </div>
              @else
              <div class="modal-body">
                <h3 class="p-4 text-center text-dark">Your account is not yet approved. Please wait for the admin approval. Thank You.</h3>
              </div>
              @endif
            @endif
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      var currentDate =   new Date();
        const year = currentDate.getFullYear().toString();
        const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
        const day = ('0' + currentDate.getDate()).slice(-2);
        const hours = ('0' + currentDate.getHours()).slice(-2);
        const minutes = ('0' + currentDate.getMinutes()).slice(-2);

        const formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;

        $('input#starts_on').click(function(){
          $(this).attr('min', formattedDate);
        });

        $('input#ends_on').click(function(){
          $(this).attr('min', formattedDate);
        });

        

        TCGCinclusion($('#chair-check'), $('#chair_input'));
        TCGCinclusion($('#table-check'), $('#table_input'));
        TCGCinclusion($('#rostrum-check'), $('#rostrum_input'));


        window.addEventListener('hide:book-modal', function(){
          $('#MakeTCGCReservation .close-modal').click();
        });

        
        function TCGCinclusion(check_id, input_id){

          check_id.click(function(){
            if (check_id.is(':checked')){

                input_id.attr('type', 'number');
                input_id.removeAttr('disabled', true);
            }else{

              input_id.attr('type', 'hidden');
              input_id.attr('disabled', true);
              
            }

          });
        }

    });
  </script>

<script>
  function change(img){
      img.classList.toggle('fullsize');
  }
</script>