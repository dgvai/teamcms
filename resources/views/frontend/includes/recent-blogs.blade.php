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

            @for($i = 0; $i< 3; $i++)
            @include('frontend.components.blog-card',['i' => $i])
            @endfor

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Blog -->