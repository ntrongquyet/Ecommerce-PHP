@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col mt-3 pt-3 pb-3 bg-white">
        <div class="btn-group-vertical">
            @foreach($categoryList as $itemCat)
            <div class="btn-group dropright">
                <a type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    {{$itemCat->name}}
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-9 mt-3 pt-3 pb-3 bg-white">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://lenxetv.com/wp-content/uploads/2020/05/Xe-VinFast-Power-wallpaper-len-xe-tv-1.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://lenxetv.com/wp-content/uploads/2020/05/Xe-VinFast-Power-wallpaper-len-xe-tv-1.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://lenxetv.com/wp-content/uploads/2020/05/Xe-VinFast-Power-wallpaper-len-xe-tv-1.jpg"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <section class="latest-blog-posts bg-white pt60 pb60">
        <div class="container-fluid">
            <div id="owl-demo-2" class="owl-carousel owl-theme">
                <article class="thumbnail item" itemscope="" itemtype="http://schema.org/CreativeWork">
                    <a class="blog-thumb-img" href="/5-ways-baby-boomers-changing-healthcare/" title="">
                        <img src="http://placehold.it/500x250" class="img-responsive" />
                    </a>
                    <div class="caption">
                        <h4 itemprop="headline">
                            <a href="#" rel="bookmark">5 Ways Baby Boomers Are Changing Healthcare</a>
                        </h4>
                        <p itemprop="text" class="flex-text text-muted">5 ways baby boomers are changing healthcare
                            Starting in 2011, 3 million baby boomers each year reach retirement age....</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endforeach


<!-- <div class="card bg-dark text-white">
                <img src="https://vinfast.vn/themes/custom/vinfast/static//images/logo/logo.png" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title">Tập Đoàn VinFast</h5>
                    <p class="card-text"></p>
                    <p class="card-text">Last updated 3 mins ago</p>
                </div>
            </div> -->

</div>
@endsection