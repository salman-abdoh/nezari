@extends('page.layouts.master')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <h4 class="alert-heading"><i class="bi-exclamation-octagon-fill"></i> Oops! </h4>
            <p class="mb-0">{{ session('success') }}.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <h4 class="alert-heading"><i class="bi-exclamation-octagon-fill"></i> Oops! </h4>
            <p class="mb-0">{{ session('error')}}.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <section class="prod " id="products">
    <div class="container">

      <div class="section-title">
        <h2>{{__('Products')}}</h2>
        <p>{{__('our new products')}}</p>
      </div>

      <div class="row  pb-3">
          @forelse($products as $item )
        <div class="col-12 col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-3">
          <div class="card col-sm-12  h-100 mb-4 " style="overflow: hidden; background :#f0f4f8;">
            <img class="card-img-top" src='{{ asset('storage/'.$item->image)}}' alt="Card image cap">
            <div class="card-body ">
              <h4 class="card-title">{{ $item->{app()->getLocale().('_title')} }}</h4>
              <div class="underlinedive text-center mb-3 " style="width: 50px;"></div>
              <p class="card-text" style="    height: 142px;
              overflow: hidden;
              text-overflow: clip;">{{ $item->{app()->getLocale().('_description')} }}</p>
  
              <a href="/show/{{$item['id']}}" class="nav-link   text-right">{{__('Read More')}}
                <?php
                 $cssf=app()->getLocale() == "ar" ?'fas fa-angle-double-left':'fas fa-angle-double-right';
                 ?>
                 <i class="{{ $cssf }}"  style=" color: #1d4c84;"></i></a></div>
          </div>
        </div>
        @empty
       <div   style="text-align: center; color: #1d4c84;       " >
          <h2 class="alert-heading"><i class="bi-exclamation-octagon-fill"></i> </h2>
          <h2 class="mb-0">{{__('No Product')}}.</h2>
       
      </div>
          @endforelse
              {{-- Pagination --}}

{{--        <div class="col col-md-3 ">--}}
{{--          <div class="card  h-100 mb-4  border-dark" style="background :#1d4c84 ; color: #f8f9fa;" >--}}
{{--            <img class="card-img-top" src='{{ asset('img/IMG_4102.JPG')}}' alt="Card image cap">--}}
{{--            <div class="card-body ">--}}
{{--              <h4 class="card-title">Card title</h4>--}}
{{--              <div class="underlinedive text-center mb-3 " style="background-color: #d62626; width: 50px;"></div>--}}
{{--              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--              <a href="#" class="nav-link " >Read more--}}
{{--                 <i class="fas fa-angle-double-right " style=" color: #d62626;"></i></a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col col-md-3 ">--}}
{{--          <div class="card  h-100 mb-4 " style="background :#deedff;">--}}
{{--            <img class="card-img-top" src="../img/bodycare.jpg" alt="Card image cap">--}}
{{--            <div class="card-body ">--}}
{{--              <h4 class="card-title">Card title</h4>--}}
{{--              <div class="underlinedive text-center mb-3 " style="width: 50px;"></div>--}}

{{--              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--              <a href="#" class="nav-link text-right" >Read more--}}
{{--                <i class="fas fa-angle-double-right"  style=" color: #1d4c84;"></i></a>            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col col-md-3 ">--}}
{{--          <div class="card  h-100 mb-4  text-white bg-dark">--}}
{{--            <div class="card-img">--}}
{{--            <img class="card-img-top" src="../img/pexels-anamul-rezwan-1216544.jpg" alt="Card image cap">--}}
{{--            <div class="card-body ">--}}
{{--              <h4 class="card-title">Card title</h4>--}}
{{--              <div class="underlinedive text-center mb-3 " style="background: #d62626;width: 50px;"></div>--}}

{{--              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--              <a href="#" class="nav-link text-right" >Read more--}}
{{--               <i class="fas fa-angle-double-right" style=" color: #d62626;"></i></a>  </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

      </div>
    </div>
    <!--campny start-->
  </section>
  <!-- ======= Clients Section ======= -->
  <!-- End Clients Section -->
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>{{__('services')}}</h2>
        <p> {{__('our services')}}</p>
      </div>

      <div class="row">
          @forelse($services as $item )
        <div class="col-lg-6 d-flex align-items-stretch mb-3  mt-3 mt-md-0 " data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box card  h-100 ">
            <i class="{{$item->image }}"></i> <h4>{{$item->{app()->getLocale().('_title')} }}</h4>
            <p class="card-text" >{{$item->{app()->getLocale().('_description')} }}</p>
          </div>
        </div>
        @empty
       <div   style="text-align: center ; color: #1d4c84;" class="mb-3" >
          <h2 class="alert-heading"><i class="bi-exclamation-octagon-fill"> </h2>
          <h2 class="mb-1">{{__('No Services')}}.</h2>
       
      </div>
          @endforelse

      </div>

    </div>
  </section>
    <!--end services-->

    <!--company-->
    <!-- <section id="clients" class="clients mb-1">
      
        <div class="container-fluid" data-aos="zoom-in">
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
  <section id="contact m-0 p-0" style="margin-top: 0px;" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{__('Contact')}}</h2>
            <p>  {{__('contact us here')}}</p>
          </div>

      <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

        <div class="col-lg-5">
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

        <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

            <form method="POST" action="{{ route('index.store') }}"  class="php-email-form">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder={{ __('Name') }} >
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
                    <input type="text" class="form-control" name="phone" id="subject" placeholder={{__("Phone Number")}} >
                    @error('phone')
                    <small class="text-danger">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="title" id="subject" placeholder={{ __("Subject")}} >
                    @error('title')
                    <small class="text-danger">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder={{ __("Message")}} ></textarea>
                    @error('message')
                    <small class="text-danger">{{$message }}</small>
                    @enderror
                </div>
                {{--            <div class="my-3">--}}
                {{--              <div class="loading">Loading</div>--}}
                {{--              <div class="error-message"></div>--}}
                {{--              <div class="sent-message">Your message has been sent. Thank you!</div>--}}
                {{--            </div>--}}
                <div class="text-center"><button type="submit">{{__('Send Message')}}</button></div>
            </form>


        </div>

      </div>
      <div class="row mt-3" data-aos="fade-up">

        <div class="col-lg-12 ">
          <iframe class="mb-4 mb-lg-0"
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>





    </div>
    </div>

  </section>
  <!--end contact us-->
@endsection
