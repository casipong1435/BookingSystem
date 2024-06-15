<div>
    
  <nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">

      <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/">Tangub City Booking</a>
      
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <input type="checkbox" class="d-none" id="menu-check">
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link {{ Route::currentRouteName() == 'index'  ? 'active fw-bold' : ' '  }}" wire:navigate aria-current="page" href="{{route("index")}}">Home</a>
          </li>
          <li class="nav-item">
            @if (session()->has('item_type'))
              <a class="nav-link me-2 {{ Route::currentRouteName() == 'client-city-facilities' || Route::currentRouteName() == 'client-tcgc-facilities' || session()->get('item_type') == 'facility' ? 'active fw-bold' : ' '  }}" wire:navigate href="{{route("client-city-facilities")}}">Facilities</a>
            @else
              <a class="nav-link me-2 {{ Route::currentRouteName() == 'client-city-facilities' || Route::currentRouteName() == 'client-tcgc-facilities' ? 'active fw-bold' : ' '  }}" wire:navigate href="{{route("client-city-facilities")}}">Facilities</a>
            @endif
          </li>
           <li class="nav-item">
            @if (session()->has('item_type'))
              <a class="nav-link me-2 {{ Route::currentRouteName() == 'client-city-equipment' || Route::currentRouteName() == 'client-tcgc-equipment' || session()->get('item_type') == 'equipment' ? 'active fw-bold' : ' '  }}" wire:navigate href="{{route("client-city-equipment")}}">Equipments</a>
            @else
              <a class="nav-link me-2 {{ Route::currentRouteName() == 'client-city-equipment' || Route::currentRouteName() == 'client-tcgc-equipment' ? 'active fw-bold' : ' '  }}" wire:navigate href="{{route("client-city-equipment")}}">Equipments & Others</a>
            @endif
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 {{ Route::currentRouteName() == 'contact' ? 'active fw-bold' : ' '  }}" wire:navigate href="{{route("contact")}}">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 {{ Route::currentRouteName() == 'about' ? 'active fw-bold' : ' '  }}" wire:navigate href="{{route("about")}}">About</a>
          </li>
        </ul>
        
        @if (auth()->check())
          <?php
            $username = [
                'username' => Crypt::encrypt(auth()->user()->username)
            ]
          ?>
        @endif
            
        <div class="d-flex" role="search">
          @if (auth()->check())
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item-dropdown">
                  <a href="#" class="nav-link dropdown-toggle fw-bold text-dark" id="navbarDropdown" role="button" aria-expanded="false">
                      <i class="bi bi-person-circle me-2"></i>{{ ucfirst($userdata->first_name).' '.ucfirst($userdata->last_name) }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      @if (auth()->user()->role != 'client')
                        @switch(auth()->user()->role)
                          @case('admin-tourism')
                              <li><a href="{{ route('admintourismhome') }}" class="dropdown-item">Admin Portal</a></li>
                            @break
                          @case('admin-tcgc')
                              <li><a href="{{ route('admintcgchome') }}" class="dropdown-item">Admin Portal</a></li>
                            @break
                          @case('tourism')
                              <li><a href="{{ route('tourismhome') }}" class="dropdown-item">Staff Portal</a></li>
                            @break
                          @case('tcgc')
                              <li><a href="{{ route('tcgchome') }}" class="dropdown-item">Staff Portal</a></li>
                            @break

                        @endswitch
                      @endif
                      <li><a href="{{ route('myprofile') }}" class="dropdown-item">Account Details</a></li>
                      <li><a href="{{ route('myreservation', $username) }}" class="dropdown-item">Reservation</a></li>
                      <li><a href="{{ route('mycart', $username) }}" class="dropdown-item">My Cart</a></li>
                      <li>
                          <form method="POST" action="{{ route('logout') }}" id="submit-logout">
                              @csrf
                              <input type="submit" class="dropdown-item border-0 text-danger" value="Logout">
                          </form>
                      </li>
                  </ul>
              </li>
          </ul>
          @else
            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModel">Login	</button>
            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModel">Register	</button>
          @endif
        </div>

      </div>

    </div>
  </nav>
  
  <div class="modal fade" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <form action="{{ route('login') }}" method="POST">
          @csrf 
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-circle fs-3 me-2">User Login</i>
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input name="username" type="text" class="form-control shadow-none" required>
            </div>
            <div class="mb-4">
              <label class="form-label">Password</label>
              <input name="password" type="password" class="form-control shadow-none" required>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <input type="submit" class="btn btn-dark shadow-none" value="LOGIN">
              <a href="JavaScript: void(0)" class="text-secondary text-decoration-none" >Forgot Password</a>
            </div>
            @if (session()->has('failed'))
            <div class="alert alert-danger fade show">
                <strong>Error! </strong><span>{{session()->get('failed')}}</span>
            </div>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade" id="registerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-lines-fill fs-3 me-2">User Registration</i>
            </h5>
            <button type="reset" class="btn-close shadow-none close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note: Your details must match with your ID (Barangay ID, passport, driving license, etc.) that will be required during the booking.</span>
            <div class="container-fluid">
              <form wire:submit.prevent="Register">
                @csrf
                <div class="row">
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">First Name</label>
                    <input wire:model="first_name" type="text" class="form-control shadow-none">
                    @error('first_name')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Last Name</label>
                    <input wire:model="last_name" type="text" class="form-control shadow-none">
                    @error('last_name')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input wire:model="date_of_birth" type="date" class="form-control shadow-none">
                    @error('date_of_birth')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0">
                    <label class="form-label">Email</label>
                    <input wire:model="email" type="email" class="form-control shadow-none">
                    @error('email')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Address</label>
                    <textarea wire:model="address" class="form-control shadow-none" rows="1"></textarea>
                    @error('address')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Contact Number</label>
                    <input type="text" wire:model="contact_number" class="form-control shadow-none">
                    @error('contact_number')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Zip Code</label>
                    <input wire:model="zipcode" type="text" class="form-control shadow-none">
                    @error('zipcode')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Username</label>
                    <input wire:model="username" type="text" class="form-control shadow-none">
                    @error('username')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Are you a TCGC Staff?</label>
                    <br>
                    <input wire:model="usertype" value="1" type="radio" class="shadow-none" id="yes">
                    <label for="yes" class="me-4">Yes</label>
                    <input wire:model="usertype" value="0" type="radio" class="shadow-none" id="no" checked>
                    <label for="no">No</label>
                    @error('usertype')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                    <br>
                    <label class="form-label">Upload ID (TCGC Staff ID if staff)</label>
                    <div>
                      <label for="front">Front</label>
                      <input wire:model="img_id" type="file" accept=".png, .jpg, .jpeg" id="front" class="form-control shadow-none">
                      <label for="back">Back</label>
                      <input wire:model="back_id" type="file" accept=".png, .jpg, .jpeg" id="back" class="form-control shadow-none">
                    </div>
                    @error('img_id')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                    @error('back_id')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Password</label>
                    <input wire:model="password" type="password" class="form-control shadow-none">
                    @error('password')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                    <br>
                    <label class="form-label">Confirm Password</label>
                    <input wire:model="confirm_password" type="password" class="form-control shadow-none">
                    @error('confirm_password')
                        <div class="text-danger message">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-12">
                    <div class="text-center my-1">
                      <button type="submit" class="btn btn-dark shadow-none">
                        <div wire:loading wire:target="img_id">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Saving...</span>
                        </div>
                        Register
                      </button>
                    </div>
                  </div>
                  <div class="col-md-12 mt-2">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show message" id="message" role="alert">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                  </div>
                </div>
            </form>
            </div>	
          </div>
      </div>
    </div>
  </div>
<script>
    window.addEventListener('hide:modal', function(){
        $('#registerModel .close-modal').click();
    });
</script>
</div>
