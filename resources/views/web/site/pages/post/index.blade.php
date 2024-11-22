@extends('web.app')

<!-- End landing -->

@section('content')
<section class="LandingPage col-12">
    <!-- start landing -->
     <style>
        .landing {
            background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.82) 1%, rgba(32, 32, 32, 0) 0),
            url("{{asset('site/Style/image/categories/landing.jpg')}}");
            height: 45vh;
            background-position: 0px 0px, 50% 50%;
            background-size: auto, cover;
        }
    </style>
 
  
 
</section>
<section class="LandingPage col-12">
  <!-- start landing -->
<section class="landing col-12">
  

  <div class="col-6">
    <span class="title"><h1>post</h1></span>
 
  </div>
</section></section>
  
  
  <!-- End landing -->
 
  <main class="container col-11" >
    <div class="recent col-11">

        <div class="container col-12">
          <div class="row  col-12">
          <div class="title2">

            <h1  class="col-12">Sunny Side Up  </h1>
            <p >September 25, 2015 |  PHOTOGRAPHY </p>
          </div>

    <div class="col-10   row-2s">

<div class="title-paragraph">
  <h1>
    Travel? Yeah, okay.
  </h1>

</div>

<div class="paragraph">
  <p>
    He oppose at thrown desire of no. Announcing impression unaffected day his are unreserved indulgence. Him hard find read are you sang. Parlors visited noisier how explain pleased his see suppose. Do ashamed assured on related offence at equally totally. Use mile her whom they its. Kept hold an want as he bred of. Was dashwood landlord cheerful husbands two. Estate why theirs indeed him polite old settle though she. In as at regard easily narrow.
  </p>
</div>


<div class="image-paragraph col-12">
<div class="theImg col-sm-12 col-md-7">
<img src="../../Style/image/post.jpg" alt="">

</div>
</div>

<div class="author">
<div class="cont_author col-lg-12">
  <div class="authorImg">
    <img src="../../Style/image/home/oo.jpg" alt="">
    <h6>Name</h6>
  </div>
  <div class="paragraph_2">
    <p>My name is Mat Vogels and I’m a freelance designer from Denver, Colorado. After graduating college with a degree in Finance, I started working at Webflow as a designer and my career was changed forever!</p>

  </div>
  <div class="links_author">
    <a href="">
    <i class="fa-brands fa-twitter"></i>

    </a>
    <a href="">
<i class="fa-brands fa-facebook"></i>

    </a>
    <a href="">
<i class="fa-brands fa-instagram"></i>

    </a>
  </div>
</div>
</div>
</div>


      </div>




      </div>
      </div>
</main>



<!-- start content -->
 

<!-- End content -->

@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/post/index.css') }}">
@endpush