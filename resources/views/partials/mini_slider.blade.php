<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($caty_menu as $value)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{url('admin/img/categories/',$value->image)}}">
                        <h5><a href="{{route('category.show',$value->id)}}">{{$value->name}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->