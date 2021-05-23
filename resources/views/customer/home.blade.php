<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZineX</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://images.unsplash.com/photo-1545609904-f2f11654638d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80)">
                <div class="container">
                    <h1 class="display-4">Hello, welcome to
                        Zinex rent-a-car!</h1>
                    <p class="lead">With over 30 years of experience in the industry, we strive to offer the highest levels of customer service and a highly personalised service to all our customers who are on the lookout for Sri Lanka car rental opportunities. With one of the largest and most modern and varied fleets in Sri Lanka, our service is backed by a networked front office, fully-fledged mechanical servicing and valet servicing onsite.</p>
                    <hr class="my-4">
                    <p>Premier Car Rental Services in Sri Lanka.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">More Details</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 100px;">
        <h2>Search Rent Car</h2><br>
        <form action="filterSearch" method="POST" class="login100-form validate-form">
            @csrf
            <div class="form-row">
                <div class="col" style="width: 276px;margin-left: 200px;">
                    <input id="datepicker" width="276" />
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4'
                        });
                    </script>
                </div>
                <div class="col">
                    <select name="type" class="custom-select">
                        <option selected>Vehical Select Menu</option>
                        <option value="CAR">Car</option>
                        <option value="VAN">Van</option>
                        <option value="BUS">Bus</option>
                        <option value="SUV">SUV</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
        </form>

    </div>

</body>

</html>