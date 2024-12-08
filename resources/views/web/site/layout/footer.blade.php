<footer class="footer col-12">
    <div class="container">
        <div class="row col-6 ">


            <div class="col-md-10 t-center">
                <h5>Stay in Touch</h5>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter Your Email Address" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
    <div class="top-navbar col-12">
        <div class="container">
            <div class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('article.index') }}">Articles</a>
                <a href="{{ route('category.index') }}">Category</a>
                <a href="{{ route('contact.index') }}">Contact</a>
            </div>
        </div>
    </div>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('scripts')


</body>

</html>