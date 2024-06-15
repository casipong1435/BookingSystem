@if(session()->has('delete'))
    <div id="notification">
        <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
            </i>{{ session()->get('delete') }}
        </div>
    </div>
@endif

@if(session()->has('success'))
    <div id="notification">
        <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
            <span class="text-dark me-2"><i class="bi bi-cart-check"></i></span>
            {{ session()->get('success') }}
        </div>
    </div>
@endif

@if(session()->has('error'))
<div id="notification">
    <div class="alert alert-danger alert-dismissible fade show message" id="message" role="alert">
        {{ session()->get('error') }}
    </div>
</div>
@endif

<script> 
    window.addEventListener('hide:book-modal', function(){
        $('#MakeReservation .close-modal').click();
    });

</script>