<?php 

?>
<!-- Blog -->
<div id="blog" class="section md-padding bg-grey-deep">
    <!-- Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">{{__('home.rcevs')}}</h2>
            </div>
            <!-- /Section header -->

            @for($i = 0; $i< 1; $i++)
            @include('frontend.components.event-card',['i' => $i])
            @endfor

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Blog -->