<link rel="stylesheet" href="admin/assets/css/maps/home.css">
<link rel="stylesheet" href="admin/assets/css/maps/product.css">

<section class="content">
    <div class="container-fluid">
        <div class="products">
            @foreach ($data as $product)
                <div class="card border-0">
                    <a href="{{url('product_details',$product->id)}}">
                        <img class="card-img-top" src="/productimage/{{$product->image}}" alt="{{$product->title}}">
                        <div class="card-body text-center mx-auto">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">₱{{$product->price}}</p>
                        </div>
                    <form action="{{url('add_cart', $product->id)}}" method="Post">
                        @csrf
                    </form>
                </a>
                </div>
            @endforeach    
        </div>
    </div>
  

    <div class="paginate">
        @if (method_exists($data,'links'))
        <div class="d-flex justify-content-center mt-4">
            {!! $data->links() !!}
        </div>
        @endif
    </div>
</section>    


