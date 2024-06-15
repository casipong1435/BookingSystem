<div>
    <div class="col-md-12 p-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>
    <div class="col-md-12 text-center p-2">
        <div class="row p-2">
            <h2 class="m-2">{{ $item_name }}</h2>
            <hr>
            @if (count($images) > 0)
                @foreach ($images as $image)
                    <div class="col-md-3 p-1">
                        <div class="p-2 d-flex justify-content-center">
                            @if ($in_charge == 'city')
                                <img src="{{ asset('images/tourism-more-images/'.$image->image_name) }}" class="rounded item_image" alt="" height="200" width="300">
                            @else
                                <img src="{{ asset('images/tcgc-more-images/'.$image->image_name) }}" class="rounded item_image" alt="" height="200" width="300">
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
            <div class="col-md-12 text-center p-4">
                <h3>No Images Added!</h3>
            </div>
            @endif
        </div>
   </div>
    
</div>
