@extends('layouts.app')
@section('aditional')
<style type="text/css">
  body {
  padding-top: 50px;
}
</style>
<link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/front/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/front/css/styles.css?v=1.6" rel="stylesheet">
<!-- js -->
<script src="/front/js/jquery-1.11.1.min.js"></script>
<script src="/front/js/scripts.js?v=1.7"></script>
<!-- //js -->
<!--FlexSlider-->
    <link rel="stylesheet" href="/front/css/flexslider.css" type="text/css" media="screen" />
    <script defer src="/front/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
      animation: "slide",
      start: function(slider){
        $('body').removeClass('loading');
      }
      });
    });
    </script>
<!--End-slider-script-->
<!-- pop-up-script -->
    <script src="/front/js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="/front/css/chocolat.css" type="text/css" media="screen" charset="utf-8">
    <!--light-box-files -->
    <script type="text/javascript" charset="utf-8">
    (function($) {
      $('.view-seventh a').Chocolat();
    })(jQuery);
    </script>
<!-- //pop-up-script -->
<script src="/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="/front/js/move-top.js"></script>
<script type="text/javascript" src="/front/js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Comfortaa:400,300,700' rel='stylesheet' type='text/css'>
@endsection

@section('content')
<!-- banner -->
  <div class="banner">
    <div class="header-top">
      <div class="container">
        <div class="head-logo">
          <a href="index.html"><span>L</span>ara Travel<i>Feeling Amazing Tour</i></a>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="banner-info">
      <div class="container">
        <h1>Book Your Best Trip</h1>
        <div class="sap_tabs">  
          <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
              <ul class="resp-tabs-list">
                <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span><i class="glyphicon glyphicon-usd" aria-hidden="true"></i>Budget</span></li>
                <li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span><i class="glyphicon glyphicon-bed" aria-hidden="true"></i>Cars</span></li>
                <li class="resp-tab-item grid5" aria-controls="tab_item-3" role="tab"><span><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Destinations</span></li>
                <div class="clear"></div>
              </ul>            
              <div class="resp-tabs-container">
    
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                  <div class="facts">
                    <div class="budget">
                      <div class="reservation">
                        <ul>    
                          <li class="span1_of_1 desti">
                             <div class="book_date">
                               <form>
                                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                <input type="text" placeholder="RP 2.000.000,00 / 1.500.000,00 dll" class="typeahead1 input-md form-control tt-input" required="">
                               </form>
                             </div>         
                           </li>
                        </ul>
                      </div>
                      <div class="reservation">
                        <ul>  
                           <li class="span1_of_3">
                            <div class="date_btn date_car">
                              <form>
                                <input type="submit" value="Search" />
                              </form>
                            </div>
                           </li>
                           <div class="clearfix"></div>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                  <div class="facts">
                    <div class="cars">
                      <div class="reservation">
                        <ul>    
                          <li  class="span1_of_1 desti1">
                             <div class="book_date">
                               <form>
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                <input type="text" placeholder="Pick Up Location" class="typeahead1 input-md form-control tt-input" required="">
                               </form>
                             </div>         
                           </li>
                           <li  class="span1_of_1 desti1">
                             <div class="book_date">
                               <form>
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                <input type="text" placeholder="Drop Off Location" class="typeahead1 input-md form-control tt-input" required="">
                               </form>
                             </div>         
                           </li>
                           <div class="clearfix"> </div>
                        </ul>
                      </div>
                      <div class="reservation">
                        <ul>  
                           <li  class="span1_of_1">
                             <h5>Pick Up Date</h5>
                             <div class="book_date">
                            <form>
                              <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                              <input class="date" id="datepicker" type="text" value="19/10/2016" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2016';}" required="">
                             </form>
                             </div>   
                           </li>
                           <li  class="span1_of_1 left">
                             <h5>Drop Off Date</h5>
                             <div class="book_date">
                              <form>
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                <input class="date" id="datepicker" type="text" value="19/10/2016" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2016';}" required="">
                              </form>
                             </div>         
                           </li>
                           <div class="clearfix"> </div>
                        </ul>
                      </div>
                      <div class="reservation">
                        <ul>  
                           <li class="span1_of_3">
                              <div class="date_btn date_car">
                                <form>
                                  <input type="submit" value="Search Cars" />
                                </form>
                              </div>
                           </li>
                           <div class="clearfix"></div>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
                  <div class="facts">
                    <div class="destination">
                      <div class="reservation">
                        <ul>    
                          <li  class="span1_of_1 desti">
                             <div class="book_date">
                               <form>
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                <input type="text" placeholder="City ,Region Or Country" class="typeahead1 input-md form-control tt-input" required="">
                               </form>
                             </div>         
                           </li>
                        </ul>
                      </div>
                      <div class="reservation">
                        <ul>  
                           <li class="span1_of_3">
                              <div class="date_btn date_car">
                                <form>
                                  <input type="submit" value="Reach Destinations" />
                                </form>
                              </div>
                           </li>
                           <div class="clearfix"></div>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <script type="text/javascript">
              (function ($) {
              $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                  type: 'default', //Types: default, vertical, accordion           
                  width: 'auto', //auto or any width like 600px
                  fit: true   // 100% fit in a container
                });
              });
              })(jQuery);
            </script>
        <div class="login">
          <a href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </div>
<!-- //banner -->
<!-- about-us -->
  <div id="about" class="about">
    <div class="container">
      <h3>About Us</h3>
      <p class="ever">To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
      <div class="about-grids">
        <div class="col-md-6 about-grid">
          <div class="about-grid1">
            <div class="itis">
              <h4>voluptas nulla pariatur</h4>
            </div>
            <div class="hji">
              <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
            </div>
            <div class="about-grid1-pos">
              <img src="front/images/1.jpg" alt=" " class="img-responsive" />
            </div>
          </div>
        </div>
        <div class="col-md-6 about-grid">
          <div class="about-grid2">
            <div class="col-xs-2 about-grid2-left">
              <p>01.</p>
            </div>
            <div class="col-xs-10 about-grid2-right">
              <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus 
                maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="about-grids">
        <div class="col-md-6 about-grid">
          <div class="about-grid2">
            <div class="col-xs-2 about-grid2-left">
              <p>02.</p>
            </div>
            <div class="col-xs-10 about-grid2-right">
              <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus 
                maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-6 about-grid">
          <div class="about-grid1 about-grd1">
            <div class="itis">
              <h4>voluptas nulla pariatur</h4>
            </div>
            <div class="hji">
              <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
            </div>
            <div class="about-grid1-pos1">
              <img src="front/images/2.jpg" alt=" " class="img-responsive" />
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
<!-- //about-us -->
<!-- about-bottom -->
  <div class="about-bottom">
    <div class="container">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li>
              <div class="about-bottom-grids">
                <div class="col-md-4 about-bottom-grid-left">
                  <h3>ea commodi consequatur</h3>
                  <p>Quibusdam et aut officiis debitis<span>Lara Travel</span></p>
                </div>
                <div class="col-md-8 about-bottom-grid-right">
                  <div class="col-md-4 about-bottom-grid-right-grid">
                    <div class="about-bottom-grid-right-grid1">
                      <img src="front/images/4.jpg" alt=" " class="img-responsive" />
                      <div class="about-bottom-pos">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                      </div>
                      <p>officiis debitis</p>
                    </div>
                  </div>
                  <div class="col-md-4 about-bottom-grid-right-grid">
                    <div class="about-bottom-grid-right-grid1">
                      <img src="front/images/5.jpg" alt=" " class="img-responsive" />
                      <div class="about-bottom-pos">
                        <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                      </div>
                      <p>officiis debitis</p>
                    </div>
                  </div>
                  <div class="col-md-4 about-bottom-grid-right-grid">
                    <div class="about-bottom-grid-right-grid1">
                      <img src="front/images/6.jpg" alt=" " class="img-responsive" />
                      <div class="about-bottom-pos">
                        <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                      </div>
                      <p>officiis debitis</p>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </li>
            <li>
              <div class="about-bottom-grids">
                <div class="col-md-4 about-bottom-grid-left">
                  <h3>ea commodi consequatur</h3>
                  <p>Quibusdam et aut officiis debitis<span>Lara Travel</span></p>
                </div>
                <div class="col-md-8 about-bottom-grid-right">
                  <div class="col-md-4 about-bottom-grid-right-grid">
                    <div class="about-bottom-grid-right-grid1">
                      <img src="front/images/8.jpg" alt=" " class="img-responsive" />
                      <div class="about-bottom-pos">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                      </div>
                      <p>officiis debitis</p>
                    </div>
                  </div>
                  <div class="col-md-4 about-bottom-grid-right-grid">
                    <div class="about-bottom-grid-right-grid1">
                      <img src="front/images/9.jpg" alt=" " class="img-responsive" />
                      <div class="about-bottom-pos">
                        <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                      </div>
                      <p>officiis debitis</p>
                    </div>
                  </div>
                  <div class="col-md-4 about-bottom-grid-right-grid">
                    <div class="about-bottom-grid-right-grid1">
                      <img src="front/images/7.jpg" alt=" " class="img-responsive" />
                      <div class="about-bottom-pos">
                        <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                      </div>
                      <p>officiis debitis</p>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </div>
<!-- //about-bottom -->
<!-- twitter-text -->
  <div id="dfg" class="twitter-text">
    <div class="container">
      <div class="twitter-txt">
        <h3><a href="mailto:info@example.com">info@example.com</a> Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero.</h3>
        <p>about 13 hours,12 minutes ago</p>
      </div>
    </div>
  </div>
<!--contact-->
  <div id="mail" class="contact">
    <div class="container">
      <h3>How to Find Us</h3>
      <p class="ever">To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
      <div class="contact-grids">
        <div class="col-md-7 contact-right">        
          <form>
            <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
            <input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
            <input type="text" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
            <textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
            <input type="submit" value="Submit" >
          </form>
        </div>
        <div class="col-md-5 contact-left">
          <p>"Lorem Ipsum"is the common name dummy text often used in the design, printing, and type setting industriescommon name dummy text often used in the design, printing, and type setting industries. "</p>
          <ul>
            <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
              756 globel Place, Indonesia.
            </li>         
            <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
              +123 2222 222
            </li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
              <a href="mailto:info@example.com">mail@example.com</a>
            </li>
          </ul>
        </div>            
        <div class="clearfix"> </div>
      </div>
    </div>      
  </div>
<!--//contact-->
<!-- footer-top -->
  <div class="footer-top">
    <div class="container">
      <div class="col-md-3 footer-top-grid">
        <h3>About <span>Travel</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque 
          id arcu neque, at convallis est felis.</p>
      </div>
      <div class="col-md-3 footer-top-grid">
        <h3>THE <span>TAGS</span></h3>
        <div class="unorder">
          <ul class="tag2">
            <li><a href="#">awesome</a></li>
            <li><a href="#">strategy</a></li>
            <li><a href="#">development</a></li>
          </ul>
          <ul class="tag2">
            <li><a href="#">css</a></li>
            <li><a href="#">photoshop</a></li>
            <li><a href="#">photography</a></li>
            <li><a href="#">html</a></li>
          </ul>
          <ul class="tag2">
            <li><a href="#">awesome</a></li>
            <li><a href="#">strategy</a></li>
            <li><a href="#">development</a></li>
          </ul>
          <ul class="tag2">
            <li><a href="#">css</a></li>
            <li><a href="#">photoshop</a></li>
            <li><a href="#">photography</a></li>
            <li><a href="#">html</a></li>
          </ul>
          <ul class="tag2">
            <li><a href="#">awesome</a></li>
            <li><a href="#">strategy</a></li>
            <li><a href="#">development</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 footer-top-grid">
        <h3>Latest <span>Tweets</span></h3>
        <ul class="twi">
          <li>I like this awesome freebie. Check it out <a href="mailto:info@example.com" class="mail">
          @http://t.co/9vslJFpW</a> <span>ABOUT 15 MINS</span></li>
          <li>I like this awesome freebie. You can view it online here<a href="mailto:info@example.com" class="mail">
          @http://t.co/9vslJFpW</a> <span>ABOUT 2 HOURS AGO</span></li>
        </ul>
      </div>
      <div class="col-md-3 footer-top-grid">
        <h3>Flickr <span>Feed</span></h3>
        <div class="flickr-grids">
          <div class="flickr-grid">
            <a href="#"><img src="front/images/11.jpg" alt=" " class="img-responsive" /></a>
          </div>
          <div class="flickr-grid">
            <a href="#"><img src="front/images/12.jpg" alt=" " class="img-responsive" /></a>
          </div>
          <div class="flickr-grid">
            <a href="#"><img src="front/images/13.jpg" alt=" " class="img-responsive" /></a>
          </div>
          <div class="clearfix"> </div>
          
          <div class="flickr-grid">
            <a href="#"><img src="front/images/16.jpg" alt=" " class="img-responsive" /></a>
          </div>
          <div class="flickr-grid">
            <a href="#"><img src="front/images/14.jpg" alt=" " class="img-responsive" /></a>
          </div>
          <div class="flickr-grid">
            <a href="#"><img src="front/images/15.jpg" alt=" " class="img-responsive" /></a>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
<!-- //footer-top -->
<!-- footer -->
  <div class="footer">
    <div class="container">
      <div class="footer-left">
        <ul>
          <li><a href="index.html"><i>L</i>ara Travel</a><span> |</span></li>
          <li><p>The awesome agency. <span>0800 (123) 4567 // Indonesia 746 PO</span></p></li>
        </ul>
      </div>
      <div class="footer-right">
        <p>© 2017 Lara Travel. All rights reserved</p>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
<!-- //footer -->
<!-- here stars scrolling icon -->
  <script type="text/javascript">
  (function ($) {
    $(document).ready(function() {            
      $().UItoTop({ easingType: 'easeOutQuart' });                
      });
    })(jQuery);
  </script>
<!-- //here ends scrolling icon -->
@endsection
