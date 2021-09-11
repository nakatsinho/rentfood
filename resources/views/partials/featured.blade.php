<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Todos Produtos</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Todos</li>
                        @foreach($caty_menu as $value)
                        <li data-filter=".{{$value->filter}}">{{$value->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($products as $value)
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood {{$value->filter}}">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{url('admin/img/product',$value->image)}}">
                        <ul class="featured__item__pic__hover">
                            <li>
                                <form action="{{route('addDesejo')}}" method="post" role="form">
                                    @method('POST')
                                    @csrf
                                    <input type="hidden" value="{{$value->id}}" name="product_id">
                                    <button type="submit" class="heart-icon btn btn-xs"><a><i class="fa fa-heart"></i></a> </button>
                                </form>
                            </li>
                            <li><a href="{{route('product.show',$value->id)}}"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="{{route('cart.show',$value->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('product.show',$value->id)}}">{{$value->name}}</a></h6>
                        <h5>{{$value->price}} MZN</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->