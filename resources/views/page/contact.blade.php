@extends('page.layouts.master2')

@section('content')

  <!--end header-->

  <!--start slides-->

  <!--end slides-->
  <!--اعلانات-->

  <!--last jobs-->
  @if(session('error'))
      <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
          <i class="bi-check-circle-fill"></i>
          <strong class="mx-2">Success!</strong> >{{ session('error')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <div class="alert alert-danger alert-dismissible fade show">
          >{{ session('error')}}

      </div>
  @endif

  <section  id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{ __('Contact')}}</h2>
            <p>  {{ __('contact us here')}}</p>
          </div>

      <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

        <div class="col-lg-6">
          <div class="info">
            <div class="address" >
                <i class="fa-solid fa-street-view"></i>
              <h4>{{ __('Location')}}:</h4>
              <p>{{__("60TH St. ,Beside UN Head Office , Sana’a ,Yemen")}}</p>
            </div>
            <div class="email">
              <i class="fas fa-envelope me-3"></i>
            <h4>{{ __('Information')}}:</h4>
            <p>info@alnezari.com</p>
          </div>

            <div class="email">
                <i class="fa-solid fa-at"></i>
              <h4>{{ __('Email')}}:</h4>
              <p>Mustafa.nezari@gmail.com</p>
            </div>

            <div class="phone">
                <i class="fas fa-phone me-3"></i>
              <h4>{{ __('Call')}}:</h4>
              <p>{{__("+967 773 234 777 – +967 711 234 777")}}</p>
            </div>


          </div>

        </div>

        <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

          <form method="POST" action="{{ route('contact.store') }}"  class="php-email-form">
              @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder={{ __("Name")}} >
                  @error('name')
                  <small class="text-danger">{{$message }}</small>
                  @enderror
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder={{ __('Email')}} >
                  @error('email')
                  <small class="text-danger">{{$message }}</small>
                  @enderror
              </div>



            </div>
              <div class="form-group mt-3">
                  <input type="text" class="form-control" name="phone" id="subject" placeholder={{ __('Phone Number')}} >
                  @error('phone')
                  <small class="text-danger">{{$message }}</small>
                  @enderror
              </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="title" id="subject" placeholder={{ __('Subject')}} >
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
            <div class="text-center"><button type="submit">{{ __('Send Message')}}</button></div>
          </form>

        </div>

      </div>
      <div class="row mt-3" data-aos="fade-up">

        <div class="col-lg-12 ">
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d240.49557478222275!2d44.18678725991808!3d15.326082500425235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603db8d2ec286cf%3A0xb26e0778f9502306!2z2YXYsdmD2LIg2KfZhNiv2YPYqtmI2LEg2YbYrNmFINin2YTYr9mK2YYg2YLZhdit2KfZhg!5e0!3m2!1sar!2s!4v1663023765700!5m2!1sar!2s" width="100%" height="384PX" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
          <iframe class="mb-4 mb-lg-0"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15391.723994153856!2d44.2025175690651!3d15.325984593343938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603db4592bdddf1%3A0xc98618709628bb15!2z2KzYp9mF2LnYqSDYp9mE2YXZhNmD2Kkg2KPYsdmI2Yk!5e0!3m2!1sar!2s!4v1663779406182!5m2!1sar!2s" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>





    </div>
    </div>

  </section>




  <!--end jobs-->
  <!--company-->

  <!--end company-->

  <!--footetr-->
@endsection
