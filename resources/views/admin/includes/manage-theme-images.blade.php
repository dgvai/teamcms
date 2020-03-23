<div class="row">
    <div class="col-md-4">
        <img src="{{asset('storage/sitebasics/'.$site->home_banner)}}" class="img-responsive" width="100%">
        <p class="text-center">Home Banner</p>
    </div>
    <div class="col-md-4">
        <img src="{{asset('storage/sitebasics/'.$site->about_banner)}}" class="img-responsive" width="100%">
        <p class="text-center">About Banner</p>
    </div>
    <div class="col-md-4">
        <img src="{{asset('storage/sitebasics/'.$site->home_counter_bg)}}" class="img-responsive" width="100%">
        <p class="text-center">Home Counter Background</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form role="form" action="{{route('change.banner')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="home_banner">Home Banner</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="home_banner" name="home_banner">
                        <label class="custom-file-label" for="home_banner">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="about_banner">About Banner</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="about_banner" name="about_banner">
                        <label class="custom-file-label" for="about_banner">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="home_counter_bg">Home Counter Background</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="home_counter_bg" name="home_counter_bg">
                        <label class="custom-file-label" for="home_counter_bg">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="Change Images" />
        </form>
    </div>
</div>

@section('js')
    @parent 
    <script>
        $(()=>{
            bsCustomFileInput.init();
        })
    </script>
@endsection