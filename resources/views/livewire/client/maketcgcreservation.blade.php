
<!--Editing Items-->

<div class="modal fade" wire:ignore.self id="MakeTCGCReservation" tabindex="-1" aria-labelledby="MakeTCGCReservationLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="MakeTCGCReservationLabel">Make Reservation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="bookNowTCGC" wire:key="bookNowTCGC">
            @csrf
            <div class="modal-body">
                <div class="row">
                  @if (auth()->check())
                    @if (auth()->user()->usertype == 2)

                      @if(session()->has('error'))
                        <div class="form-group p-2">
                          <div class="alert alert-danger alert-dismissible fade show " id="message" role="alert">
                            {{ session()->get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </div>
                      @endif
                      @if(session()->has('fail'))
                        <div class="form-group p-2">
                          <div class="alert alert-danger alert-dismissible fade show " id="message" role="alert">
                            {{ session()->get('fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </div>
                      @endif
                      @if (auth()->user()->role == 'tcgc' || auth()->user()->role == 'admin-tcgc')
                          <div class="form-group p-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary rounded-0 m-1 reservation-btn {{ $state == 0 ? 'active disabled':'' }}" wire:click.prevent="changeBooker({{ 0 }})">User</button>
                            <button type="button" class="btn btn-primary rounded-0 m-1 reservation-btn {{ $state == 0 ? '':'active disabled' }}" wire:click.prevent="changeBooker({{ 1 }})">Walkin</button>
                          </div>
                      @endif
                        <div class="form-group p-2">
                          <label for="item-name mb-1">Item Name</label>
                          <input id="item-name" wire:model="item_name" class="w-100 p-2" disabled>
                        </div>
                        <div class="form-group mb-1 p-2">
                          <label for="institute mb-1">Institute</label>
                          <input type="text" wire:model="institute" id="institute" class="p-2 w-100" placeholder="Enter Institute">
                          @error('institute')
                            <div class="text-danger message">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group p-2">
                            <label for="activity mb-1">Activity</label>
                            <textarea id="activity" wire:model="activity" class="w-100 p-2" ></textarea>
                            @error('activity')
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
                        <div class="form-group mb-1 p-2">
                          <label for="number_of_person mb-1">No. of person/s</label>
                          <input type="number" wire:model="number_of_person" id="number_of_person" class="p-2 w-100" placeholder="Enter How Many Person/s">
                          @error('number_of_person')
                            <div class="text-danger message">{{ $message }}</div>
                          @enderror
                        </div>

                        @switch($this->item_id)
                          @case(673473)
                          @case(947035)
                          @case(269901)
                          @case(162512)
                          @case(100024)
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="chair-check" class="p-2 mb-1 me-2">Chair
                              <input type="hidden" wire:model="chair" id="chair_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="speaker-check" class="p-2 mb-1 me-2">Speaker
                              <input type="hidden" wire:model="speaker" id="speaker_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="projector-check" class="p-2 mb-1 me-2">Projector
                              <input type="hidden" wire:model="projector" id="projector_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="microphone-check" class="p-2 mb-1 me-2">Microphone
                              <input type="hidden" wire:model="microphone" id="microphone_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="electricfan-check" class="p-2 mb-1 me-2">Electricfan
                              <input type="hidden" wire:model="electricfan" id="electricfan_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="rostrum-check" class="p-2 mb-1 me-2">Rostrum
                              <input type="hidden" wire:model="rostrum" id="rostrum_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                            </div>
                            @break
                          
                          @case(891321)
                          @case(100026)
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="chair-check" class="p-2 mb-1 me-2">Chair
                              <input type="hidden" wire:model="chair" id="chair_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="table-check" class="p-2 mb-1 me-2">Table
                              <input type="hidden" wire:model="table" id="table_input" class="p-2 w-100" placeholder="Enter Table Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="strobing_light-check" class="p-2 mb-1 me-2">Strobing Light
                              <input type="hidden" wire:model="strobing_light" id="strobing_light_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="electricfan-check" class="p-2 mb-1 me-2">Electricfan
                              <input type="hidden" wire:model="electricfan" id="electricfan_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                            </div>
                            <div class="form-group mb-1 p-2">
                              <input type="checkbox" id="microphone-check" class="p-2 mb-1 me-2">Microphone
                              <input type="hidden" wire:model="microphone" id="microphone_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                            </div>
                            @break
                            
                          @case(100022)
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="chair-check" class="p-2 mb-1 me-2">Chair
                            <input type="hidden" wire:model="chair" id="chair_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="table-check" class="p-2 mb-1 me-2">Table
                            <input type="hidden" wire:model="table" id="table_input" class="p-2 w-100" placeholder="Enter Table Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="strobing_light-check" class="p-2 mb-1 me-2">Strobing Light
                            <input type="hidden" wire:model="strobing_light" id="strobing_light_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="electricfan-check" class="p-2 mb-1 me-2">Electricfan
                            <input type="hidden" wire:model="electricfan" id="electricfan_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="microphone-check" class="p-2 mb-1 me-2">Microphone
                            <input type="hidden" wire:model="microphone" id="microphone_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="basketball_ball-check" class="p-2 mb-1 me-2">Basketball Ball
                            <input type="hidden" wire:model="basketball_ball" id="basketball_ball_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="volleyball_ball-check" class="p-2 mb-1 me-2">volleyball Ball
                            <input type="hidden" wire:model="volleyball_ball" id="volleyball_ball_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="volleyball_net-check" class="p-2 mb-1 me-2">volleyball Net
                            <input type="hidden" wire:model="volleyball_net" id="volleyball_net_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                            @break

                          @case(100023)
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="speaker-check" class="p-2 mb-1 me-2">Speaker
                            <input type="hidden" wire:model="speaker" id="speaker_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="projector-check" class="p-2 mb-1 me-2">Projector
                            <input type="hidden" wire:model="projector" id="projector_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="microphone-check" class="p-2 mb-1 me-2">Microphone
                            <input type="hidden" wire:model="microphone" id="microphone_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          @break

                          @case(100027)
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="javelin-check" class="p-2 mb-1 me-2">Javelin
                            <input type="hidden" wire:model="javelin" id="javelin_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="discus_throw-check" class="p-2 mb-1 me-2">Discus Throw
                            <input type="hidden" wire:model="discus_throw" id="discus_throw_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="shotput-check" class="p-2 mb-1 me-2">Shotput
                            <input type="hidden" wire:model="shotput" id="shotput_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="soccer_ball-check" class="p-2 mb-1 me-2">Soccer Ball
                            <input type="hidden" wire:model="soccer_ball" id="soccer_ball_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          @break

                          @case(100030)
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="chair-check" class="p-2 mb-1 me-2">Chair
                            <input type="hidden" wire:model="chair" id="chair_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="swimming_cap-check" class="p-2 mb-1 me-2">Swimming Cap
                            <input type="hidden" wire:model="swimming_cap" id="swimming_cap_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="goggles-check" class="p-2 mb-1 me-2">Goggles
                            <input type="hidden" wire:model="goggles" id="goggles_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          @break

                        @case(100028)
                        @case(100025)
                        @case(100019)
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="chair-check" class="p-2 mb-1 me-2">Chair
                            <input type="hidden" wire:model="chair" id="chair_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="speaker-check" class="p-2 mb-1 me-2">Speaker
                            <input type="hidden" wire:model="speaker" id="speaker_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="projector-check" class="p-2 mb-1 me-2">Projector
                            <input type="hidden" wire:model="projector" id="projector_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="microphone-check" class="p-2 mb-1 me-2">Microphone
                            <input type="hidden" wire:model="microphone" id="microphone_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="electricfan-check" class="p-2 mb-1 me-2">Electricfan
                            <input type="hidden" wire:model="electricfan" id="electricfan_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="rostrum-check" class="p-2 mb-1 me-2">Rostrum
                            <input type="hidden" wire:model="rostrum" id="rostrum_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="table-check" class="p-2 mb-1 me-2">Table
                            <input type="hidden" wire:model="table" id="table_input" class="p-2 w-100" placeholder="Enter table Quantity" disabled>
                          </div>
                        @break

                        @case(100029)
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="speaker-check" class="p-2 mb-1 me-2">Speaker
                            <input type="hidden" wire:model="speaker" id="speaker_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="microphone-check" class="p-2 mb-1 me-2">Microphone
                            <input type="hidden" wire:model="microphone" id="microphone_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                        @break

                        @case(100020)
                        @case(100021)
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="chair-check" class="p-2 mb-1 me-2">Chair
                            <input type="hidden" wire:model="chair" id="chair_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="speaker-check" class="p-2 mb-1 me-2">Speaker
                            <input type="hidden" wire:model="speaker" id="speaker_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="projector-check" class="p-2 mb-1 me-2">Projector
                            <input type="hidden" wire:model="projector" id="projector_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="microphone-check" class="p-2 mb-1 me-2">Microphone
                            <input type="hidden" wire:model="microphone" id="microphone_input" class="p-2 w-100" placeholder="Enter Chair Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="table-check" class="p-2 mb-1 me-2">Table
                            <input type="hidden" wire:model="table" id="table_input" class="p-2 w-100" placeholder="Enter table Quantity" disabled>
                          </div>
                          <div class="form-group mb-1 p-2">
                            <input type="checkbox" id="strobing_light-check" class="p-2 mb-1 me-2">Strobing Light
                            <input type="hidden" wire:model="strobing_light" id="strobing_light_input" class="p-2 w-100" placeholder="Enter Rostrum Quantity" disabled>
                          </div>
                        @break
                            
                      @endswitch

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
                    @elseif (auth()->user()->usertype == 1)
                      <div class="form-group p-2">
                          <div class="text-center">Your account is not yet approved by TCGC Admin</div>
                      </div>
                    @else
                      <div class="form-group p-2">
                        <div class="text-center">Your account have been blocked by TCGC Admin.</div>
                      </div>
                    @endif
                  @endif
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal" wire:click="CloseModal">Cancel</button>
              @if(auth()->user()->usertype == 2)
                @if ($state == 0)
                  <button type="submit" class="btn btn-success" {{ $isBooked == true ? 'disabled':'' }}>
                    <div wire:loading wire:target="BookNowTCGC">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      <span class="visually-hidden">Booking...</span>
                    </div>
                    @if ($isBooked)
                      Currently Booked
                    @else
                      Book Now
                    @endif
                  </button>
                @else
                  <button type="submit" class="btn btn-success">
                    <div wire:loading wire:target="BookNowTCGC">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      <span class="visually-hidden">Booking...</span>
                    </div>
                    Book Now
                  </button>
                @endif
              @endif
            </div>
        </form>
      </div>
    </div>
    
    @if(session()->has('success'))
    <div id="notification">
        <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
            <span class="text-dark me-2"><i class="bi bi-cart-check"></i></span>
            {{ session()->get('success') }}
        </div>
    </div>
    @endif
  </div>

<script src="{{ asset('js\equipment.js') }}"></script>
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


        window.addEventListener('hide:book-modal', function(){
          $('#MakeTCGCReservation .close-modal').click();
        });

    });
</script>

<script>
  function change(img){
      img.classList.toggle('fullsize');
  }
</script>