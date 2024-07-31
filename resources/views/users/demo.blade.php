<div class="row">
    @foreach($promotionalProducts as $product)
        <div class="col-md-4 mt-3">
            <div class="collection-img position-relative">
                <a href="#">
                    <img style="max-height: 308px;" src="{{ Storage::url($product->image) }}" class="w-100 h-100 object-fit-cover ">
                </a>
            </div>
            <div class="mt-3">
                <div style="height: 47px;">
                    <a href="#" class="text-capitalize text-decoration-none text-product text-dark">{{ $product->name }}</a>
                </div>
                <div>
                    <span class="fw-bold text-primary">{{ number_format($product->price - ($product->price * ($product->promotions->first()->discount / 100)), 0, ',', '.') }}₫</span>
                    <span class="mx-2 compare-price text-decoration-line-through text-secondary fw-light">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
