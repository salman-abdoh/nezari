@extends('page.layouts.master')

@section('content')

<section class="prod " id="products">
  <div class="container">

    <div class="section-title">
      <h2>{{__('Products')}}</h2>
      <p>{{__('our new')}}</p>
    </div>

    <div class="row  pb-3">
      @forelse($products as $item )
      <div class="col-12 col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-3 " >
        <div class="card col-sm-12  h-100 mb-4  " data-wow-offset="150" style="overflow: hidden; background :#f0f4f8;">
          <img class="card-img-top" src='{{ asset('storage/'.$item->image)}}' alt="Card image cap">
          <div class="card-body" >
            <h4 class="card-title">
              {{ $item->{app()->getLocale().('_title')} }}
            </h4>
            <div class="underlinedive text-center mb-3 " style="width: 50px;"></div>
            <p class="card-text" style="      text-align: justify;  height: 142px;
              overflow: hidden;
              text-overflow: clip;">
              {{ $item->{app()->getLocale().('_description')} }}
            </p>

            <a href="{{ asset ('show')}}{{ '/' }}{{ $item['id']}}" class="nav-link   text-right">{{__('More Details')}}
              <?php
                 $cssf=app()->getLocale() == "ar" ?'fas fa-angle-double-left':'fas fa-angle-double-right';
                 ?>
              <i class="{{ $cssf }}" style=" color: #1d4c84;"></i></a>
          </div>
        </div>
      </div>
      @empty
      <div style="text-align: center; color: #1d4c84;       ">
        <h2 class="alert-heading"><i class="bi-exclamation-octagon-fill"></i> </h2>
        <h2 class="mb-0">{{__('No Product')}}.</h2>

      </div>
      @endforelse
    
</section>
<!-- ======= Clients Section ======= -->
<!-- End Clients Section -->
<section id="services" class="services section-bg ">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>{{__('services')}}</h2>
      <p> {{__('our services')}}</p>
    </div>

    <div class="row">
      @forelse($services as $item )
      <div class="col-lg-6 d-flex align-items-stretch mb-3  mt-3 mt-md-0 " >
        <div class="icon-box card  h-100 " data-wow-delay=".5s">
          <i class="{{$item->image }}"></i>
          <h4>{{$item->{app()->getLocale().('_title')} }}</h4>
          <p class="card-text">{{$item->{app()->getLocale().('_description')} }}</p>
        </div>
      </div>
      @empty
      <div style="text-align: center ; color: #1d4c84;" class="mb-3">
        <h2 class="alert-heading"><i class="bi-exclamation-octagon-fill"> </h2>
        <h2 class="mb-1">{{__('No Services')}}.</h2>

      </div>
      @endforelse

    </div>

  </div>
</section>
<!--end services-->

<!--company-->
<!-- <section id="clients" class="clients mb-1 ">
      
        <div class="container-fluid" >
          <div class="section-title container" style="text-align: left">
        <h2>{{ __("Companies") }}</h2>
        <p> {{__("Our Companies")}}</p>
      </div>
            <div class="row d-flex justify-content-center mb-2 mt-3 align-items-center text-center">
                @forelse($company as $item )
                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('storage/'.$item->image)}}" class="img-fluid" alt="">
                </div>
                @empty
       <div   style="text-align: center; color: #1d4c84;       " >
          <h2 class="alert-heading"><i class="bi-exclamation-octagon-fill"></i> </h2>
          <h2 class="mb-0">{{__('No Companies')}}.</h2>
       
      </div>

                @endforelse


            </div>

        </div>
    </section>-->
<!--end company-->
<!--contact us-->
<section id="contact m-0 p-0" style="margin-top: 0px;" class="contact ">
  <div class="container">

    <div class="section-title">
      <h2>{{__('Contact')}}</h2>
      <p> {{__('contact us here')}}</p>
    </div>

    <div class="row mt-1 d-flex justify-content-end ">

      <div class="col-lg-5  " data-wow-delay=".5s">
        <div class="info">
          <div class="address">
            <i class="fa-solid fa-street-view"></i>
            <h4>{{__('Location')}}:</h4>
            <p>{{__("60TH St. ,Beside UN Head Office , Sana’a ,Yemen")}}</p>
          </div>

          <div class="email">
            <i class="fa-solid fa-at"></i>
            <h4>{{__('Email')}}:</h4>
            <p>Mustafa.nezari@gmail.com</p>
          </div>

          <div class="phone">
            <i class="fas fa-phone "></i>
            <h4>{{__('Call')}}:</h4>
            <p>{{__("+967 773 234 777 – +967 711 234 777")}}</p>
          </div>


        </div>

      </div>

      <div class="col-lg-6 mt-5 mt-lg-0 " data-wow-delay=".5s" data-aos="fade-left" data-aos-delay="100">

        <form method="POST" action="{{ route('index.store') }}" class="php-email-form">
          @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder={{ __('Name') }}>
              @error('name')
              <small class="text-danger">{{$message }}</small>
              @enderror
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder={{ __("Email")}}>
              @error('email')
              <small class="text-danger">{{$message }}</small>
              @enderror
            </div>



          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="phone" id="subject" placeholder={{__("Phone Number")}}>
            @error('phone')
            <small class="text-danger">{{$message }}</small>
            @enderror
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="title" id="subject" placeholder={{ __("Subject")}}>
            @error('title')
            <small class="text-danger">{{$message }}</small>
            @enderror
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder={{ __("Message")}}></textarea>
            @error('message')
            <small class="text-danger">{{$message }}</small>
            @enderror
          </div>
          
          <div class="text-center"><button type="submit" >{{__('Send Message')}}</button></div>
        </form>


      </div>

    </div>
    <div class="row mt-3 ">

      <div class="col-lg-12 animate__animated  animate__zoomIn">
        <iframe class="mb-4 mb-lg-0 animate__animated  animate__zoomIn" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
      </div>





    </div>
  </div>

</section>
<!--end contact us-->
@endsection