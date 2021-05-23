<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZineX</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../css/style.css') }}" rel="stylesheet">
</head>

<body style="margin-top: 0px;">
    <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
        <a class="navbar-brand" href="#" style="font-size: xx-large;">ZineX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col">
                <h2> Search Detailes</h2>
            </div>
            <div class="col">
                <div class="pull-right" style="margin-left: 500px;">
                    <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row ng-scope" style="margin-top: 3rem; ">
            <div class="col-md-9 col-md-pull-3">
                @foreach ($result as $key => $value)
                <section class="search-result-item">
                    <a class="image-link" href="#"><img class="image" src="https://image.shutterstock.com/image-vector/car-cartoon-sticker-retro-style-260nw-566814880.jpg">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="search-result-item-heading"><a href="#">{{ $value->vehicle_name }}</a></h4>
                                <p class="info">{{ $value->vehicle_no }}</p>
                                <p class="description">Not just usual Metro. But something bigger. Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <p class="value3 mt-sm">RS. {{ $value->rent_per_km }}</p>
                                <p class="fs-mini text-muted">PER KM</p>
                                <a class="btn btn-primary btn-info btn-sm" href="booking/{{$value->id}}">View</a>
                            </div>
                        </div>
                    </div>
                </section>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>