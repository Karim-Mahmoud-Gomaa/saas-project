@extends('layouts.app')

@section('seo')
<title>{{$page->name}}</title>
@endsection


@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">{{$page->content[39]}}</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="style-guide ptb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pe-lg-5">
                <!--color start-->
                <div class="row" id="color">
                    <div class="col-12">
                        <h2>{{$page->content[40]}}</h2>
                    </div>
                    
                    <div class="col-12">
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                @foreach ($cart->details as $detail)
                                <h4>{{$detail->package->name}} <span class="float-end">{{$detail->price>0?$detail->price:__('web.free')}}</span></h4>
                                <p class="ms-3">{{$detail->package->service->name}}</p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Select Your Term Length</label>
                                            <select class="custom-select">
                                                @foreach ($terms as $term)
                                                <option value="{{$term->id}}">{{getTermName($term->months)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>Background Color Palette</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-primary-soft">
                                                <span>.bg-primary-soft</span>
                                            </div>
                                            <div class="color bg-primary-light">
                                                <span>.bg-primary-light</span>
                                            </div>
                                            <div class="color bg-primary">
                                                <span>.bg-primary</span>
                                            </div>
                                            <div class="color bg-primary-dark">
                                                <span>.bg-primary-dark</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-info-soft">
                                                <span>.bg-info-soft</span>
                                            </div>
                                            <div class="color bg-info-light">
                                                <span>.bg-info-light</span>
                                            </div>
                                            <div class="color bg-info">
                                                <span>.bg-info</span>
                                            </div>
                                            <div class="color bg-info-dark">
                                                <span>.bg-info-dark</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-success-soft">
                                                <span>.bg-success-soft</span>
                                            </div>
                                            <div class="color bg-success-light">
                                                <span>.bg-success-light</span>
                                            </div>
                                            <div class="color bg-success">
                                                <span>.bg-success</span>
                                            </div>
                                            <div class="color bg-success-dark">
                                                <span>.bg-success-dark</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-warning-soft">
                                                <span>.bg-warning-soft</span>
                                            </div>
                                            <div class="color bg-warning-light">
                                                <span>.bg-warning-light</span>
                                            </div>
                                            <div class="color bg-warning">
                                                <span>.bg-warning</span>
                                            </div>
                                            <div class="color bg-warning-dark">
                                                <span>.bg-warning-dark</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-danger-soft">
                                                <span>.bg-danger-soft</span>
                                            </div>
                                            <div class="color bg-danger-light">
                                                <span>.bg-danger-light</span>
                                            </div>
                                            <div class="color bg-danger">
                                                <span>.bg-danger</span>
                                            </div>
                                            <div class="color bg-danger-dark">
                                                <span>.bg-danger-dark</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-dark-soft">
                                                <span>.bg-dark-soft</span>
                                            </div>
                                            <div class="color bg-dark-light">
                                                <span>.bg-dark-light</span>
                                            </div>
                                            <div class="color bg-dark">
                                                <span>.bg-dark</span>
                                            </div>
                                            <div class="color bg-dark-dark">
                                                <span>.bg-dark-dark</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-secondary-light">
                                                <span>.bg-secondary-light</span>
                                            </div>
                                            <div class="color bg-secondary">
                                                <span>.bg-secondary</span>
                                            </div>
                                            <div class="color bg-secondary-dark">
                                                <span>.bg-secondary-dark</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--background color-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>Gradient Color Palette</h4>
                                <hr>
                                <div class="row mb-5">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color primary-bg-gradient mt-4">
                                            <span>.primary-bg-gradient</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color info-bg-gradient mt-4">
                                            <span>.info-bg-gradient</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color success-bg-gradient mt-4">
                                            <span>.success-bg-gradient</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color warning-bg-gradient mt-4">
                                            <span>.warning-bg-gradient</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color danger-bg-gradient mt-4">
                                            <span>.danger-bg-gradient</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color dark-bg-gradient mt-4">
                                            <span>.dark-bg-gradient</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="color secondary-bg-gradient mt-4">
                                            <span>.secondary-bg-gradient</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="color-palette mt-4">
                                            <div class="color bg-gradient">
                                                <span>.gradient-bg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--color end-->
                
                <div class="row" id="typography">
                    <div class="col-12">
                        <h2>Typography</h2>
                    </div>
                    <div class="col-12">
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>Heading</h4>
                                <hr>
                                <div class="bd-example">
                                    <p class="h1">Heading H1 - Aa Bb Cc Dd</p>
                                    <p class="h2">Heading H2 - Aa Bb Cc Dd</p>
                                    <p class="h3">Heading H3 - Aa Bb Cc Dd</p>
                                    <p class="h4">Heading H4 - Aa Bb Cc Dd</p>
                                    <p class="h5">Heading H5 - Aa Bb Cc Dd</p>
                                    <p class="h6">Heading H6 - Aa Bb Cc Dd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>Display</h4>
                                <hr>
                                <div class="bd-example">
                                    <p class="display-1">Display-1 - Aa Bb</p>
                                    <p class="display-2">Display-2 - Aa Bb</p>
                                    <p class="display-3">Display-3 - Aa Bb Cc Dd</p>
                                    <p class="display-4">Display-4 - Aa Bb Cc Dd</p>
                                    <p class="display-5">Display-5 - Aa Bb Cc Dd</p>
                                    <p class="display-6">Display-6 - Aa Bb Cc Dd</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-12">
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>Paragraph</h4>
                                <hr>
                                <div class="bd-example">
                                    <p>
                                        This is a paragraph. It stands out from regular paragraphs.
                                        Proactively reintermediate interactive benefits whereas superior markets.
                                        Dramatically myocardinate impactful ROI and market-driven potentialities.
                                        Energistically matrix go forward vortals through alternative products.
                                        Dynamically initiate.
                                    </p>
                                    <p>Efficiently revolutionize next-generation collaboration and idea-sharing
                                        rather than process-centric initiatives. Credibly negotiate ubiquitous human
                                        capital with sustainable alignments. Proactively pontificate extensible
                                        methods of empowerment.</p>
                                    </div>
                                    
                                    <div class="bd-example">
                                        <h5>Lead Paragraph</h5>
                                        <p class="lead">
                                            This is a lead paragraph. It stands out from regular paragraphs.
                                            Proactively reintermediate interactive benefits whereas superior markets.
                                            Dramatically myocardinate impactful ROI and market-driven potentialities.
                                            Energistically matrix go forward vortals through alternative products.
                                            Dynamically initiate.
                                        </p>
                                    </div>
                                    
                                    <div class="bd-example">
                                        <p>You can use the mark tag to
                                            <mark>highlight</mark>
                                            text.
                                        </p>
                                        <p>
                                            <del>This line of text is meant to be treated as deleted text.</del>
                                        </p>
                                        <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                                        <p>
                                            <ins>This line of text is meant to be treated as an addition to the
                                                document.
                                            </ins>
                                        </p>
                                        <p><u>This line of text will render as underlined.</u></p>
                                        <p>
                                            <small>This line of text is meant to be treated as fine print.</small>
                                        </p>
                                        <p><strong>This line rendered as bold text.</strong></p>
                                        <p><em>This line rendered as italicized text.</em></p>
                                    </div>
                                    
                                    <div class="bd-example">
                                        <blockquote class="blockquote">
                                            <p>A well-known quote, contained in a blockquote element.</p>
                                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                        </blockquote>
                                    </div>
                                    
                                    <div class="bd-example">
                                        <ul class="list-unstyled">
                                            <li>This is a list.</li>
                                            <li>It appears completely unstyled.</li>
                                            <li>Structurally, it's still a list.</li>
                                            <li>However, this style only applies to immediate child elements.</li>
                                            <li>Nested lists:
                                                <ul>
                                                    <li>are unaffected by this style</li>
                                                    <li>will still show a bullet</li>
                                                    <li>and have appropriate left margin</li>
                                                </ul>
                                            </li>
                                            <li>This may still come in handy in some situations.</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="bd-example">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">This is a list item.</li>
                                            <li class="list-inline-item">And another one.</li>
                                            <li class="list-inline-item">But they're displayed inline.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" id="button">
                        <div class="col-12">
                            <h2>Buttons</h2>
                        </div>
                        <div class="col-12">
                            <div class="card rounded-custom mb-5">
                                <div class="card-body p-5">
                                    <h4>Button styles</h4>
                                    <hr>
                                    <div class="bd-example">
                                        <div class="button-style d-flex justify-content-between flex-wrap">
                                            <button type="button" class="btn btn-primary">.btn-primary</button>
                                            <button type="button" class="btn btn-info">.btn-info</button>
                                            <button type="button" class="btn btn-success">.btn-success</button>
                                            <button type="button" class="btn btn-warning">.btn-warning</button>
                                            <button type="button" class="btn btn-danger">.btn-danger</button>
                                            <button type="button" class="btn btn-dark">.btn-dark</button>
                                            <button type="button" class="btn btn-secondary">.btn-secondary</button>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <div class="button-style d-flex justify-content-between flex-wrap">
                                        <button type="button" class="btn btn-primary">.btn-primary</button>
                                        <button type="button" class="btn btn-info rounded-pill">.btn-info</button>
                                        <button type="button" class="btn btn-success rounded-pill">.btn-success</button>
                                        <button type="button" class="btn btn-warning rounded-pill">.btn-warning</button>
                                        <button type="button" class="btn btn-danger rounded-pill">.btn-danger</button>
                                        <button type="button" class="btn btn-dark rounded-pill">.btn-dark</button>
                                        <button type="button" class="btn btn-secondary rounded-pill">.btn-secondary
                                        </button>
                                    </div>
                                    <hr>
                                    <div class="button-style d-flex justify-content-between flex-wrap mt-4">
                                        <button type="button" class="btn btn-soft-primary">.btn-soft-primary</button>
                                        <button type="button" class="btn btn-soft-info">.btn-soft-info</button>
                                        <button type="button" class="btn btn-soft-success">.btn-soft-success</button>
                                        <button type="button" class="btn btn-soft-warning">.btn-soft-warning</button>
                                        <button type="button" class="btn btn-soft-danger">.btn-soft-danger</button>
                                        <button type="button" class="btn btn-soft-dark">.btn-soft-dark</button>
                                    </div>
                                    <hr>
                                    <div class="button-style d-flex justify-content-between flex-wrap mt-4">
                                        <button type="button" class="btn btn-outline-primary">.btn-outline-primary
                                        </button>
                                        <button type="button" class="btn btn-outline-info">.btn-outline-info</button>
                                        <button type="button" class="btn btn-outline-success">.btn-outline-success
                                        </button>
                                        <button type="button" class="btn btn-outline-warning">.btn-outline-warning
                                        </button>
                                        <button type="button" class="btn btn-outline-danger">.btn-outline-danger
                                        </button>
                                        <button type="button" class="btn btn-outline-dark">.btn-outline-dark</button>
                                        <button type="button" class="btn btn-outline-secondary">.btn-outline-secondary
                                        </button>
                                    </div>
                                    <hr>
                                    <div class="button-style d-flex justify-content-between flex-wrap mt-4">
                                        <button type="button" class="btn btn-primary btn-icon"><i
                                            class="fas fa-user"></i></button>
                                            <button type="button" class="btn btn-danger btn-icon"><i
                                                class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-success btn-icon"><i
                                                    class="fas fa-check"></i></button>
                                                    <button type="button" class="btn btn-dark btn-icon"><i
                                                        class="fas fa-arrow-right"></i></button>
                                                        
                                                        <button type="button" class="btn btn-primary btn-icon rounded-circle"><i
                                                            class="fas fa-user"></i></button>
                                                            <button type="button" class="btn btn-danger btn-icon rounded-circle"><i
                                                                class="fas fa-trash"></i></button>
                                                                <button type="button" class="btn btn-success btn-icon rounded-circle"><i
                                                                    class="fas fa-check"></i></button>
                                                                    <button type="button" class="btn btn-dark btn-icon rounded-circle"><i
                                                                        class="fas fa-arrow-right"></i></button>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="button-style d-flex justify-content-between flex-wrap mt-4">
                                                                        <button type="button" class="btn btn-soft-primary btn-icon"><i
                                                                            class="fas fa-user"></i></button>
                                                                            <button type="button" class="btn btn-soft-danger btn-icon"><i
                                                                                class="fas fa-trash"></i></button>
                                                                                <button type="button" class="btn btn-soft-success btn-icon"><i
                                                                                    class="fas fa-check"></i></button>
                                                                                    <button type="button" class="btn btn-soft-dark btn-icon"><i
                                                                                        class="fas fa-arrow-right"></i></button>
                                                                                        
                                                                                        <button type="button" class="btn btn-soft-primary btn-icon rounded-circle"><i
                                                                                            class="fas fa-user"></i></button>
                                                                                            <button type="button" class="btn btn-soft-danger btn-icon rounded-circle"><i
                                                                                                class="fas fa-trash"></i></button>
                                                                                                <button type="button" class="btn btn-soft-success btn-icon rounded-circle"><i
                                                                                                    class="fas fa-check"></i></button>
                                                                                                    <button type="button" class="btn btn-soft-dark btn-icon rounded-circle"><i
                                                                                                        class="fas fa-arrow-right"></i></button>
                                                                                                        
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <div class="button-style mt-4">
                                                                                                        <button type="button" class="btn btn-primary btn-sm">Small</button>
                                                                                                        <button type="button" class="btn btn-primary">Default</button>
                                                                                                        <button type="button" class="btn btn-primary btn-lg">Large</button>
                                                                                                        <button type="button" class="btn btn-primary btn-xl">Extra Large</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                    <div class="row" id="form">
                                                                                        <div class="col-12">
                                                                                            <h2>Forms</h2>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-control-label">First name</label>
                                                                                                        <input class="form-control" type="text" placeholder="Enter your first name">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group mb-3">
                                                                                                        <label class="form-control-label">Last name</label>
                                                                                                        <input class="form-control" type="text" placeholder="Also your last name">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group mb-3">
                                                                                                        <label class="form-control-label">Birthday</label>
                                                                                                        <input type="text" class="form-control" data-toggle="date" placeholder="Select your birth date">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group mb-3">
                                                                                                        <label class="form-control-label">Gender</label>
                                                                                                        <select class="custom-select">
                                                                                                            <option disabled selected>Select option</option>
                                                                                                            <option value="1">Female</option>
                                                                                                            <option value="2">Male</option>
                                                                                                            <option value="2">Rather not say</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group mb-3">
                                                                                                        <label class="form-control-label">Email</label>
                                                                                                        <input class="form-control" type="email" placeholder="name@exmaple.com">
                                                                                                        <small class="form-text text-muted mt-2">This is the main email address that
                                                                                                            we'll send notifications.
                                                                                                        </small>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group mb-3">
                                                                                                        <label class="form-control-label">Phone</label>
                                                                                                        <input class="form-control" type="text" placeholder="+40-777 245 549">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <div class="bg-light p-5 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                                                                                        <nav class="style-guide-nav">
                                                                                            <ul class="nav list-unstyled d-block">
                                                                                                <li class="nav-item"><a class="nav-link scroll" href="#color">Color</a></li>
                                                                                                <li class="nav-item"><a class="nav-link scroll active" href="#typography">Typography</a>
                                                                                                </li>
                                                                                                <li class="nav-item"><a class="nav-link scroll" href="#button">Button</a></li>
                                                                                                <li class="nav-item"><a class="nav-link scroll" href="#form">Form</a></li>
                                                                                            </ul>
                                                                                            <!-- /#sidebar -->
                                                                                        </nav>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!--style guide sections end-->
                                                                    
                                                                    @endsection
                                                                    