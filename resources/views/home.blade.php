  @extends('frontend.master_home')
  @section('main_content')
  
  <!-- about -->
     @include('frontend.body.about')
      <!-- about -->
      <!-- best -->
   @include('frontend.body.best')
      <!-- end best -->
      <!-- request -->
     @include('frontend.body.request')
      <!-- end request -->
      <!-- two_box section -->
     @include('frontend.body.offer')
      <!-- end two_box section -->
      <!-- testimonial -->
     @include('frontend.body.testimoni')
      <!-- end testimonial -->

      @endsection