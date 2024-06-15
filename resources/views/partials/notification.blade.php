@if(session()->has('success'))
    <div id="notification">
        <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
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