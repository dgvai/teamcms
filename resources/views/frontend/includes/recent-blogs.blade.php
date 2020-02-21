<?php 

?>
<!-- Blog -->
<div id="blog" class="section md-padding bg-grey">
    <!-- Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">{{__('home.rcblogs')}}</h2>
            </div>
            <!-- /Section header -->

            @foreach($blogs as $blog)
            @include('frontend.components.blog-card',['blog' => $blog])
            @endforeach

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Blog -->