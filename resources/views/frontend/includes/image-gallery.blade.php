<?php 
    $galleries = App\Models\Entities\SiteGallery::all();
?>
<div id="portfolio" class="section md-padding bg-grey">
<div class="container">
    <div class="row">
        <div class="section-header text-center">
            <h2 class="title">{{__('Image Gallery')}}</h2>
        </div>  
        @foreach($galleries as $image)
        <div class="col-md-4 col-xs-6 work">
            <img class="img-responsive" src="{{asset('storage/gallery/'.$image->image)}}" alt="{{$image->caption}}">
            <div class="overlay"></div>
            <div class="work-content">
                <span>Caption</span>
                <h3>{{$image->caption}}</h3>
                <div class="work-link">
                    <a class="lightbox" href="{{asset('storage/gallery/'.$image->image)}}"><i class="fa fa-search-plus"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>