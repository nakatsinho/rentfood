<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Postagens Recentes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blog as $value)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{url('admin/img/blog/',$value->image)}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$value->updated_at->diffForHumans()}}</li>
                            <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                        </ul>
                        <h5><a href="{{route('blog.show',$value->id)}}">{{$value->title}}</a></h5>
                        <p>{{$value->body}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->