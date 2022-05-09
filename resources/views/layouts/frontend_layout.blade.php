<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend') }}/css/styles.css" rel="stylesheet" />
    <script src="{{ asset('common/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('common/toastr/toastr.css') }}" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            {{-- <a class="navbar-brand" href="#page-top"><img src="{{ asset('frontend') }}/assets/img/navbar-logo.svg"
                    alt="..." /></a> --}}
            <a class="navbar-brand" href="#page-top"><span style="text-transform: capitalize;"><i><span
                            class="text-danger">Po</span>rtfolio.</i></span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" style="background-image: url({{ asset($main->image) }});">
        <div class="container">
            <div class="masthead-subheading">{{ $main->sub_title }}</div>
            <div class="masthead-heading text-uppercase">{{ $main->title }}</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="{{ $main->resume }}">Download CV</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                @foreach ($services as $key => $service)
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="{{ $service->icon }} fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">{{ $service->title }}</h4>
                        <p class="text-muted">{!! Str::limit($service->description, 180) !!}</p>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Portfolio</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">

                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal"
                                href="#portfolioModal{{ $portfolio->id }}">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" style="width: 100%; height: 100%;"
                                    src="{{ asset($portfolio->small_image) }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $portfolio->client }}</div>
                                <div class="portfolio-caption-subheading text-muted">{{ $portfolio->category }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                @foreach ($abouts as $about)
                    @if ($about->id % 2 == 0)
                        <li>
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="{{ asset($about->image) }}" alt="..." /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ $about->date }}</h4>
                                    <h4 class="subheading">{{ $about->title }}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">{!! $about->description !!}</p>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="{{ asset($about->image) }}" alt="" /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ $about->date }}</h4>
                                    <h4 class="subheading">{{ $about->title }}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">{!! $about->description !!}</p>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>


            <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="Your Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="Your Phone *"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" name="message" placeholder="Your Message *"
                                data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit success message-->

                <!-- Submit Button-->
                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send
                        Message
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    @foreach ($portfolios as $portfolio)
        <div class="portfolio-modal modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img
                            src="{{ asset('frontend') }}/assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">{{ $portfolio->title }}</h2>
                                    <p class="item-intro text-muted">{{ $portfolio->sub_title }}</p>
                                    <a href="{{ @$portfolio->url ? $portfolio->url : '#' }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <img class="img-fluid d-block mx-auto"
                                            src="{{ asset($portfolio->big_image) }}" alt="..." />
                                    </a>
                                    <p>{!! $portfolio->description !!}</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Date:</strong>
                                            {{ date('d-M-Y', strtotime($portfolio->created_at)) }}
                                            {{-- {{ $portfolio->created_at->format('d/m/Y') }} --}}
                                        </li>
                                        <li>
                                            <strong>Client:</strong>
                                            {{ $portfolio->client }}
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            {{ $portfolio->category }}
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('frontend') }}/js/scripts.js"></script>

    <script src="{{ asset('common/toastr/toastr.min.js') }}"></script>
    {{-- Toastr Message start --}}
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    {{-- Toastr Message end --}}
</body>

</html>
