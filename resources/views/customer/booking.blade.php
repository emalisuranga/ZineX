<!DOCTYPE html>
<html>

<head>
    <title>ZineX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <div class="container">


        <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
            <div class="col">
                <h2> {{ $vehicle->vehicle_no }} Vehicale Detailes</h2>
            </div>
            <div class="col">
                <div class="pull-right" style="margin-left: 500px;">
                    <a class="btn btn-primary" href="{{ route('vehicle.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="col-xs-3 col-sm-3 col-md-3"><strong>Vehicle No:</strong></div>
                </div>
            </div>
            <div class="col">
                <div class="pull-right">
                    {{ $vehicle->vehicle_no }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="col-xs-3 col-sm-3 col-md-3"><strong>Owner Name:</strong></div>
                </div>
            </div>
            <div class="col">
                <div class="pull-right">
                    {{ $vehicle->owner_name }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="col-xs-3 col-sm-3 col-md-3"><strong>Rate Per km:</strong></div>
                </div>
            </div>
            <div class="col">
                <div class="pull-right">
                    Rs: {{ $vehicle->rent_per_km }}
                    <input name="2" id="num1" value="{{ $vehicle->rent_per_km }}" hidden>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="col-xs-3 col-sm-6 col-md-6"><strong>Telephone Number:</strong></div>
                </div>
            </div>
            <div class="col">
                <div class="pull-right">
                    {{ $vehicle->telephone_number }}
                </div>
            </div>
        </div>

        <form class="form-inline" style="margin-top: 10px;">
            <label for="email" class="mr-sm-2">Enter Trip Duration:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Trip Duration" id="num2" name="duration" value="" style="margin-left: 40px;">
            <button class="btn btn-primary mb-2 flip">Cost Calculation</button>
        </form>

        <div class="panel">
            <p>Invoice</p>
            <form action="/test" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="col-xs-3 col-sm-3 col-md-3"><strong>Date:</strong></div>
                            <input type="text" name="id" class="form-control" value="{{ $vehicle->id }}" hidden>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pull-right">
                            <span id="date"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="col-xs-3 col-sm-3 col-md-6"><strong>Rate Per km:</strong></div>
                            <input type="text" name="rent_per_km" class="form-control" value="{{ $vehicle->rent_per_km }}" hidden>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pull-right">
                            Rs: {{ $vehicle->rent_per_km }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="col-xs-3 col-sm-6 col-md-6"><strong>Trip Duration:</strong></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pull-right">
                            <label class="sum"></label>
                            <input type="text" name="duration" id="duration" class="form-control" value="" hidden>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="col-xs-3 col-sm-6 col-md-6">
                                <h3>Total :</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pull-right">
                            <h3 class="sum"></h3>
                            <input type="text" name="total" id="total" class="form-control" value="" hidden>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mb-2 flip">Request</button>
            </form>
        </div>
        <br>
        <br>
        <br>

        <style>
            div.panel,
            p.flip {
                margin: 0px;
                padding: 5px;
                text-align: center;
                background: #888a8a;
                border: solid 1px #fff;
            }

            div.panel {
                width: 100%;
                display: none;
                background: #dffdc1;
            }
        </style>

        <script>
            $(document).ready(function() {
                $(".flip").click(function() {
                    $(".panel").slideToggle("slow");
                });
            });

            var d = new Date();

            var month = d.getMonth() + 1;
            var day = d.getDate();
            var output = d.getFullYear() + '/' +
                (('' + month).length < 2 ? '0' : '') + month + '/' +
                (('' + day).length < 2 ? '0' : '') + day;
            $('#date').append(output);

            $(".form-inline").submit(function(e) {
                e.preventDefault();
            });

            $(document).ready(function() {
                $('#num1, #num2').keyup(function() {
                    var num1 = parseInt($('#num1').val(), 10) || 0;
                    var num2 = parseInt($('#num2').val(), 10) || 0;
                    $('label.sum').text((num2) || '0');
                    $('h3.sum').text((num1 * num2) || '0');
                    $('#duration').val((num2) || '0');
                    $('#total').val((num1 * num2) || '0');
                });
            });
        </script>

</body>

</html>