@extends('page.layouts.master2')

@section('content')
<section id="products-details" class="products-details mt-3">

  <div class="container">
    <div class="section-title">
      <h2>{{__("Product Details")}} </h2>
      <p>
        {{ $data->{app()->getLocale().('_title')} }}
      </p>
    </div>
    <div class="row gy-4">

      <div class="col-lg-7">

        <!--Bootstrap modal -->
        <div id="carouselExampleControls h-50" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner h-50">
            <div class="carousel-item active h-50">
              <img id="myImg" src="{{ asset('storage/'.$data->image)}}" alt="nezari" class="d-block" style="width:100%">
            </div>
            @foreach(($data->images) as $path)
            <div class="carousel-item h-50">
              <img id="myImg2" src="{{ asset('storage/'.$path)}}" alt="nezari" class="d-block" style="width:100%">
            </div>
            @endforeach
            <div id="myModal" class="modal">

              <!-- The Close Button -->
              <div class="modal-header">
                <button type="button" class="btn-close button-danger" style=" font-size: 44px; " data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- Modal Content (The Image) -->
              <img class="modal-content" id="img01" style="width:40%;    height: 84%;
              ">

              <!-- Modal Caption (Image Text) -->
              <div id="caption">{{ $data->{app()->getLocale().('_title')} }}</div>
            </div>
            <div id="myModal2" class="modal">

                <!-- The Close Button -->
                <div class="modal-header">
                  <button type="button" class="bb btn-close button-danger" style=" font-size: 44px;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img02" style="width:40% ;    height: 80%;
                ">
  
                <!-- Modal Caption (Image Text) -->
                <div id="caption2">{{ $data->{app()->getLocale().('_title')} }}</div>
              </div>
          </div>

        </div>

        <!-- The Modal -->





        <!-- Left and right controls/icons -->





      </div>

      <div class="col-lg-5 ">
        <div class="products-info">
          <h3>{{__("Product Information")}}</h3>
          <ul>
            <li><strong>{{__("Category")}} </strong> : {{$data->category->{app()->getLocale().('_title')} }}</li>
            <li><strong>{{__("Country")}} </strong> :
              {{ $data->company->{app()->getLocale().('_country')} }}
            </li>

          </ul>
        </div>
        <div class="products-description">
          <h2>{{__("Product Details")}} </h2>
          <p>
            {{ $data->{app()->getLocale().('_description')} }}
          </p>
        </div>
        <div class="products-description">
          <h3>{{__("Product Usage")}} </h3>
          <p>
            {{ $data->{app()->getLocale().('_usage')} }}
          </p>
        </div>
      </div>

    </div>

  </div>

</section>
@endsection