 

@extends('web.app') 

 
 
 
@section('content')
   

 

<section class="LandingPage col-12">


<style>
    .landing {
        background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.82) 1%, rgba(32, 32, 32, 0.14) 98%),
         url("{{asset('site/Style/image/contact/land.jpg')}}");

         display: flex;
    align-items: center;
    justify-content: center;
    align-content: flex-start;
    flex-wrap: wrap;
    flex-direction: row;
    position: relative;
    max-height: 300px;
    padding-top: 184px;
     background-position: 0px 0px, 50% 50%;
    background-size: auto, cover;
    }
</style>
<!-- start landing -->
<section class="landing col-12">


<div class="col-6">
  <span class="title"><h1>Let's Connect
  </h1></span>

</div>
</section></section>


<!-- End landing -->

<main class="container col-12" >
  <div class="recent col-12">

      <div class="container col-12">
        <div class="row  col-12">
        <div class="title2">
          
        </div>
    
    
    <div class="col-12   row-2s">
      <div class="right col-12">
        <div class="top">
          <h4>Connect with Us</h4>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.
</p>

        </div>
        <div class="button">
          <a href=""><i class="fa-brands fa-twitter"></i> Follow  us on Twitter</a>
          <a href=""><i class="fa-brands fa-facebook"></i>Like us on facebook</a>
          <a href=""><i class="fa-brands fa-instagram"></i>Follow  us on instagram</a>
     
        </div>
      </div>
      <div class="left col-12">
        <form action="">
          <div class="form-groupe">
          <h3  class="col-12">Send a Request</h3>

        <div class="col-12">
          <label for="Name:">name</label>
          <input type="text"  placeholder="Enter Your name" class="form-control">
        </div>
   <div class="col-12">
    <label for="Email Address:">Email Address:</label>
    <input type="text" placeholder="Enter Your Email " class="form-control">
   </div>
<div  class="col-12">
<label for="Message:">Message:</label>
<textarea name="" id="" rows="4" placeholder="Say what you need to say" class="form-control col-12"></textarea>
</div>
          </div>
        </form>
      </div>
     
    
      </div>
    </div>
    
    
    
    
    </div>
    </div>
</main>



<!-- start content -->


 @endsection
<!-- End content -->
@push('contact-css')
    <link rel="stylesheet" href="{{ asset('site/style/css/contact/index.css') }}">
@endpush