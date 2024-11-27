@extends('web.app')

@section('title' , 'Contact Us')

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

        #submit {
            color: black;
            display: block;
            margin: auto;
        }
    </style>
    <!-- start landing -->
    <section class="landing col-12">


        <div class="col-6">
            <span class="title">
                <h1>Let's Connect
                </h1>
            </span>

        </div>
    </section>
</section>


<!-- End landing -->

<main class="container col-12">
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
                            <a href=""><i class="fa-brands fa-twitter"></i> Follow us on Twitter</a>
                            <a href=""><i class="fa-brands fa-facebook"></i>Like us on facebook</a>
                            <a href=""><i class="fa-brands fa-instagram"></i>Follow us on instagram</a>

                        </div>
                    </div>
                    <div class="left col-12">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-groupe">
                                <h3 class="col-12">Send a Request</h3>
                                <div class="col-12">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Your name" class="form-control">
                                </div>
                                <div class="col-12">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="email">Email Address:</label>
                                    <input type="email" name="email" id="email" placeholder="Enter Your Email " class="form-control">
                                </div>
                                <div class="col-12">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number" class="form-control">
                                </div>
                                <div class="col-12">
                                    @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="subject">Subject:</label>
                                    <input type="text" name="subject" id="subject" placeholder="Enter Your Subject" class="form-control">
                                </div>
                                <div class="col-12">
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="message">Message:</label>
                                    <textarea name="message" id="message" rows="4" placeholder="Say what you need to say" class="form-control col-12"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success" id="submit">Submit</button>
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

@push('scripts')
<script>
    var success = "{{ session('success') }}";
    if (success) {
        alert(success);
    }
</script>
@endpush
