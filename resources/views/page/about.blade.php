@extends('page.layouts.master2')

@section('content')
@forelse($data as $item )
<section class="section section-padding pb-0 " >
  <div class="container animate__animated  animate__zoomIn">

    <div class="row learts-mb-n30 ">

      <div class="col-md-6 col-12 align-self-center learts-mb-30">
        <div class="section-title mb-30">
          <h2>
            {{ __('About Us')}}
          </h2>
          <p>
            {{ __('AL-Nezari')}}
          </p>
        </div>
        <div class="about-us3">

          <div class="desc">
            <p class="">
              {{ $item->{app()->getLocale().('_intro')} }}
            </p>
          </div>

        </div>
      </div>

      <div class="col-md-6 imgdd col-12 text-center learts-mb-30 ">
        <img src='{{ asset('img/LL.png')}}' alt="" style="width: 100%;" class="">

      </div>

    </div>
  </div>

</section>
<!--end about-->
<!-- ======= Featured Section ======= -->
<section id="featured" class="featured animate__animated animate__fadeInUp" >
  <div class="container mb-4 mt-4">

    <div class="row text-center ">

      <div class="col-lg-4 mt-4 ">
        <div class="icon-box">

          <i style="font-size: 40px;" class="fas fa-bullseye"></i>
          <h3 class="m-4">
            {{ __('Target')}}
          </h3>
          {{ $item->{app()->getLocale().('_target')} }}
        </div>
      </div>
      <div class="col-lg-4 mt-4 ">
        <div class="icon-box">

          <i style="font-size: 40px;" class="fa-solid fa-eye"></i>
          <h3 class="m-4">
            {{ __('Vision')}}
          </h3>
          {{ $item->{app()->getLocale().('_vision')} }}
        </div>
      </div>
      <div class="col-lg-4 mt-4 ">
        <div class="icon-box">

          <i style="font-size: 40px;" class="fa-solid fa-circle-check"></i>
          <h3 class="m-4">
            {{ __('Mission')}}
          </h3>
          {{ $item->{app()->getLocale().('_mision')} }}
        </div>
      </div>

    </div>

  </div>
</section>
@endforeach
@endsection