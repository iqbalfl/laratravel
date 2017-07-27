@extends('layouts.app')
@section('aditional')
  <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/mystyles.css')}}">
    <script src="{{asset('/front/js/modernizr.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/typeahead.js/0.10.5/typeahead.jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/schemes/bright-turquoise.css')}}" title="bright-turquoise" media="all" />
    <style type="text/css">
      body {
      padding-top: 50px;
    }
    </style>
@endsection

@section('content')
<!-- TOP AREA -->
<div class="top-area show-onload">
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <div class="bg-parallax" style="background-image:url({{asset('/front/img/196_365_2048x1365.jpg')}});"></div>
        <div class="bg-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="search-tabs search-tabs-bg mt50">
                            <h1>Find Your Perfect Trip</h1>
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-money"></i> <span >Budget</span></a>
                                    </li>
                                    <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-car"></i> <span >Cars</span></a>
                                    </li>
                                    <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-map-marker"></i> <span >Destinations</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-1">
                                        <h2>Search destination by budget</h2>
                                        <form method="GET" action="{{ route('search-budget') }}">
                                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-money input-icon"></i>
                                                <label>Budget</label>
                                                <input id="typeahead-budget" name="budget" class="typeahead form-control" placeholder="1.000.000, 2.000.000 etc" type="number" value="{{ old('budget') }}" />
                                            </div>
                                             <script type="text/javascript">
                                               jQuery(document).ready(function($) {
                                                var client = algoliasearch("1POBCW5OBL", "bbcd6d3debaa5f3a30baebf7d461569c");
                                                var index = client.initIndex('places_index');

                                                $('#typeahead-budget').typeahead(null, {
                                                  source: index.ttAdapter({ "hitsPerPage": 10 }),
                                                  displayKey: 'cost'
                                                });
                                              });
                                            </script>
                                            <button class="btn btn-primary btn-lg" type="submit">Search</button>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="tab-2">
                                        <h2>Search for Cheap Cars</h2>
                                        <form method="GET" action="{{ route('search-car') }}">
                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-car input-icon"></i>
                                            <label>Type the car what you want</label>
                                            <input id="typeahead-cars" name="car" class="typeahead form-control" placeholder="Avanza, Inova, Fortuner, Pajero Sport etc" type="text" value="{{ old('car') }}" />
                                        </div>
                                        <script type="text/javascript">
                                               jQuery(document).ready(function($) {
                                                var client = algoliasearch("1POBCW5OBL", "bbcd6d3debaa5f3a30baebf7d461569c");
                                                var index = client.initIndex('cars_index');

                                                $('#typeahead-cars').typeahead(null, {
                                                  source: index.ttAdapter({ "hitsPerPage": 10 }),
                                                  displayKey: 'name'
                                                });
                                              });
                                            </script>
                                            <button class="btn btn-primary btn-lg" type="submit">Search Cars</button>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="tab-3">
                                        <h2>Search for Destination</h2>
                                        <form method="GET" action="{{ route('search-destination') }}">
                                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                <label>Where are you going?</label>
                                                <input id="typeahead-destinations" name="destination" class="typeahead form-control" placeholder="Bali, Lombok, Bromo, Pangandaran etc" type="text" value="{{ old('destination') }}" />
                                            </div>
                                             <script type="text/javascript">
                                               jQuery(document).ready(function($) {
                                                var client = algoliasearch("1POBCW5OBL", "bbcd6d3debaa5f3a30baebf7d461569c");
                                                var index = client.initIndex('places_index');

                                                $('#typeahead-destinations').typeahead(null, {
                                                  source: index.ttAdapter({ "hitsPerPage": 10 }),
                                                  displayKey: 'name'
                                                });
                                              });
                                            </script>
                                            <button class="btn btn-primary btn-lg" type="submit">Search for Destination</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="loc-info text-right hidden-xs hidden-sm">
                            <h3 class="loc-info-title"><img src="{{asset('/front/img/flags/32/id.png')}}" alt="Image Alternative text" title="Indonesian Flag" />Indonesia</h3>
                            <p class="loc-info-weather"><span class="loc-info-weather-num">+31</span><i class="im im-rain loc-info-weather-icon"></i>
                            </p>
                            <a class="btn btn-white btn-ghost mt10" href="#"><i class="fa fa-angle-right"></i> Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END TOP AREA  -->

<div class="gap"></div>


<div class="container">
    <div class="row row-wrap" data-gutter="60">
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header"><i class="fa fa-dollar box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">Best Price Guarantee</a></h5>
                    <p class="thumb-desc">Eu lectus non vivamus ornare lacinia elementum faucibus natoque parturient ullamcorper placerat</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header"><i class="fa fa-lock box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">Trust & Safety</a></h5>
                    <p class="thumb-desc">Imperdiet nisi potenti fermentum vehicula eleifend elementum varius netus adipiscing neque quisque</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header"><i class="fa fa-thumbs-o-up box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">Best Travel Agent</a></h5>
                    <p class="thumb-desc">Curae urna fusce massa a lacus nisl id velit magnis venenatis consequat</p>
                </div>
            </div>
        </div>
    </div>
    <div class="gap gap-small"></div>
</div>

<div class="container">
    <div class="gap"></div>
    <h2 class="text-center">Top Destinations</h2>
    <div class="gap">
        <div class="row row-wrap">
          @foreach ($place as $data)
            <div class="col-md-3">
                <div class="thumb">
                    <header class="thumb-header">
                        <a class="hover-img curved" href="{{ url('/place/view',$data->id) }}">
                            <img src="{{ asset('img/'.$data->image) }}" alt="Image Description" title="{{$data->name}}" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                        </a>
                    </header>
                    <div class="thumb-caption">
                        <h4 class="thumb-title">{{$data->name}}</h4>
                        <p class="thumb-desc">{{$data->description}}</p>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
        {{$place->links()}}
    </div>


</div>
<footer id="main-footer">
    <div class="container">
        <div class="row row-wrap">
            <div class="col-md-3">
                <a class="logo" href="{{url('/')}}">
                    <img src="{{asset('/front/img/logo.png')}}" alt="Image Alternative text" title="bdgtranservice.co.id" />
                </a>
                <p class="mb20">Booking, reviews and advices on hotels, resorts, flights, vacation rentals, travel packages, and lots more!</p>
                <ul class="list list-horizontal list-space">
                    <li>
                        <a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-pinterest box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3">
                <h4>Newsletter</h4>
                <form>
                    <label>Enter your E-mail Address</label>
                    <input type="text" class="form-control">
                    <p class="mt5"><small>*We Never Send Spam</small>
                    </p>
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </form>
            </div>
            <div class="col-md-2">
                <ul class="list list-footer">
                    <li><a href="{{ url('/about') }}">About US</a>
                    </li>
                    <li><a href="#">Travel News</a>
                    </li>
                    <li><a href="#">Jobs</a>
                    </li>
                    <li><a href="#">Privacy Policy</a>
                    </li>
                    <li><a href="#">Terms of Use</a>
                    </li>
                    <li><a href="#">Feedback</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Have Questions?</h4>
                <h4 class="text-color">+1-202-555-0173</h4>
                <h4><a href="#" class="text-color">support@bdgtranservice.co.id</a></h4>
                <p>24/7 Dedicated Customer Support</p>
            </div>

        </div>
    </div>
</footer>

<script src="{{asset('/front/js/bootstrap.js')}}"></script>
<script src="{{asset('/front/js/slimmenu.js')}}"></script>
<script src="{{asset('/front/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/front/js/bootstrap-timepicker.js')}}"></script>
<script src="{{asset('/front/js/nicescroll.js')}}"></script>
<script src="{{asset('/front/js/dropit.js')}}"></script>
<script src="{{asset('/front/js/ionrangeslider.js')}}"></script>
<script src="{{asset('/front/js/icheck.js')}}"></script>
<script src="{{asset('/front/js/fotorama.js')}}"></script>
<script src="{{asset('/front/js/typeahead.js')}}"></script>
<script src="{{asset('/front/js/card-payment.js')}}"></script>
<script src="{{asset('/front/js/magnific.js')}}"></script>
<script src="{{asset('/front/js/owl-carousel.js')}}"></script>
<script src="{{asset('/front/js/fitvids.js')}}"></script>
<script src="{{asset('/front/js/tweet.js')}}"></script>
<script src="{{asset('/front/js/gridrotator.js')}}"></script>
<script src="{{asset('/front/js/custom.js')}}"></script>
</div>
@endsection
