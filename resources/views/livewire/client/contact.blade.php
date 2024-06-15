<div>
    
<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">CONTACT US</h2>
  
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Questions or ready to book? Reach out to Tangub City for prompt assistance. 
      Let's make your event unforgettable. Contact us today!
    </p>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="bg-white rounded shadow p-4">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126400.3431388586!2d123.6234582018513!3d8.10038769448597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32544dd6b65b85bf%3A0x3db69bf9bd604080!2sTangub%20City%2C%20Misamis%20Occidental%2C%20Philippines!5e0!3m2!1sen!2slk!4v1694145662767!5m2!1sen!2slk" width="470" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <h5>Address</h5>
          <a href="https://goo.gl/maps/jFdoRUnTvq314zJy6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
            <i class="bi bi-geo-alt-fill"></i> Tangub City Misamis Occidental, Philippines
          </a>
          <h5 class="mt-4">Call us</h5>
          <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
          <br>
          <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
          <h5 class="mt-4">Email</h5>
          <a href="mailto: dineshslweb@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-fill"></i> tangubcitybookingsystem@gmail.com</a>
  
          <h5 class="mt-4">Follow us</h5>
          <a href="#" class="d-inline-block text-dark fs-5 me-2">
              <i class="bi bi-twitter me-1"></i>
          </a>
          
          <a href="#" class="d-inline-block text-dark fs-5 me-2">
              <i class="bi bi-facebook me-1"></i>
          </a>
          
          <a href="#" class="d-inline-block text-dark fs-5">
            <i class="bi bi-instagram me-1"></i>
            
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="bg-white rounded shadow p-4">
          <form wire:submit.prevent="SendMessage">
            <h5>Send a message</h5>
            <div class="mb-3">
            <label class="form-label" style="font-weight: 500;">Name</label>
            <input type="text" wire:model="name" class="form-control shadow-none">
            @error('name')
              <div class="text-danger message">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label class="form-label" style="font-weight: 500;">Email</label>
            <input type="email" wire:model="email" class="form-control shadow-none">
            @error('email')
              <div class="text-danger message">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label class="form-label" style="font-weight: 500;">Subject</label>
            <input type="text" wire:model="subject" class="form-control shadow-none">
            @error('subject')
              <div class="text-danger message">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label class="form-label" style="font-weight: 500;">Message</label>
            <textarea class="form-control shadow-none" rows="5" style="resize: none;" wire:model="description"></textarea>
            @error('description')
              <div class="text-danger message">{{ $message }}</div>
            @enderror
            </div>
            <button type="submit" class="btn text-white btn-primary mt-3">
              <div wire:loading wire:target="SendMessage" wire:key="SendMessage">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              </div>
              Send
            </button>
          </form>
          
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              <strong>Success: </strong>{{ session()->get('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error: </strong>{{ session()->get('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>
      </div>
  </div>
      
    </div>
  </div>
</div>
