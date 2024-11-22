<!-- End content -->
<style>
  .footer{
     background-image: linear-gradient(180deg, rgba(35, 47, 56, 0.47), rgba(35, 47, 56, 0.31) 99%),  url("{{asset('site/Style/image/img/footer.jpg')}}");

  }
</style>
<footer class="footer col-12">
  <div class="container">
    <div class="row col-6 ">
    
 
      <div class="col-md-10 t-center">
        <h5>Stay in Touch</h5>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter Your Email Address" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
        </div>
      </div>
    </div>
  </div>
  <div class="top-navbar col-12">
    <div class="container">
      <div class="nav-links">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Category</a>
        <a href="#">Contact</a>
      </div>
    </div>
  </div>
  
</footer>




    <script src="{{asset('site/Style/js/WOW/dist/wow.min.js')}}"></script>
  @stack('before-scripts')

    <script>

      new WOW().init();
    </script>
  </body>
</html>