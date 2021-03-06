<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>BikeWise Rentals</title>

    <!-- Custom styles for this template -->
    <!--<script src=
            "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <link href="starter-template.css" rel="stylesheet">
    <!--<link rel="stylesheet" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--<script src=
            "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="{{ asset('css/rentalForm.css') }}">-->
    <!-- Custom fonts for this template-->
    <link href="/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Rental Form Custom Scripts -->
    <script src="js/rentalForm.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="theme/vendor/jquery/jquery.min.js"></script>
    <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="theme/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="theme/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rentalForm.css') }}" rel="stylesheet">
    <script>
        var bikeArray = ["0", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        var placeB;
        @foreach($bicycles as $b)
            placeB = Number("" + <?php echo $b->id;?> +"");
        bikeArray[placeB] = "" + <?php echo $b->price;?> +"";
                @endforeach

        var packArray = ["0", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        var placeP;
        @foreach($packages as $p)
            placeP = Number("" + <?php echo $p->id;?> +"");
        packArray[placeP] = "" + <?php echo $p->price;?> +"";
                @endforeach

        var lightArray = ["0", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        var placeL;
        @foreach($lights as $l)
            placeL = Number("" + <?php echo $l->id;?> +"");
        lightArray[placeL] = "" + <?php echo $l->price;?> +"";
                @endforeach

        var backArray = ["0", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        var placeBack;
        @foreach($backs as $ba)
            placeBack = Number("" + <?php echo $ba->id;?> +"");
        backArray[placeBack] = "" + <?php echo $ba->price;?> +"";
                @endforeach

        var kickArray = ["0", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        var placeK;
        @foreach($kickstands as $k)
            placeK = Number("" + <?php echo $k->id;?> +"");
        kickArray[placeK] = "" + <?php echo $k->price;?> +"";
                @endforeach

        var lockArray = ["0", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        var placeLo;
        @foreach($locks as $lo)
            placeLo = Number("" + <?php echo $lo->id;?> +"");
        lockArray[placeLo] = "" + <?php echo $lo->price;?> +"";
                @endforeach

        var otherArray = ["0", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        var placeOt;
        @foreach($otherAccessories as $ot)
            placeOt = Number("" + <?php echo $ot->id;?> +"");
        otherArray[placeOt] = "" + <?php echo $ot->price;?> +"";
                @endforeach

        var otherPrices = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];


        $(document).ready(function () {
            hide();
            $("#default").show();

            $('.card').not('#paymentTotalCard, .accesDrop').hover(
                function () {
                    $(this).addClass('transition');
                },
                function () {
                    $(this).removeClass('transition');
                }
            );
            $('#formid').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

        });

    </script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/rentalForm') }}">
            Bikewise
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li><a href="" class="nav-link">Home</a></li>
                <li><a href="" class="nav-link">About Us</a></li>
                <li class="active"><a href="" class="nav-link">Rentals</a></li>
            </ul>
        </div>
    </div>
</nav>

<br>

<div id="form" class="container-fluid mx-1">

    <div id="paymentCard">
        <div class="row justify-content-end align-items-end">
            <div class="col-md-3 col-xs-5 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="paymentTotalCard">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Price</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="runningTotal"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <form name="custom" method="POST" action="/rentalForm" id="formid">
            {{ csrf_field() }}
            <div id="permahide">
                <input type="text" name="price" id="price" value=""></input>
                <input type="text" name="package" id="package" value="0"></input>
                <input type="text" name="bikeSelected" id="bikeSelected" value="0"></input>

                <input type="text" name="lightSel" id="lightSel" value="0"></input>
                <input type="text" name="backSel" id="backSel" value="0"></input>
                <input type="text" name="kickstandSel" id="kickstandSel" value="0"></input>
                <input type="text" name="lockSel" id="lockSel" value="0"></input>

{{--                @foreach($otherAccessories as $other)--}}
{{--                    <input type="text" name={{'other' . $other->id}} id={{'otherSel' . $other->id}} value=""></input>--}}
{{--                @endforeach--}}
                @foreach($otherAccessories as $otherAccessory)
                    <input type="checkbox" name="accessoryOthers[]" id={{'otherSel' . $otherAccessory->id}}  value={{$otherAccessory->id}}>{{$otherAccessory->name}}
                    <br>
                @endforeach

                @foreach($otherAccessories as $otherAccessory)
                    <input type="text" name="accessoryOthers[]" value={{$otherAccessory->id}}>
                @endforeach
            </div>

            <div id="rentalLength">
                <div class="h1">How long do you want to rent your bicycle?</div>
                <br>
                <h4>I want to pick up my bicycle during</h4>
                <select id="semesterStart" name="semesterStart">
                    @foreach($semesters as $semester)
                        <option value={{$semester->startDate}}>{{$semester->season . " " . $semester->year}}</option>
                    @endforeach
                </select>
                <br>
                <h4>I want to return my bicycle at the end of</h4>
                <select id="semesterEnd" name="semesterEnd">
                    @foreach($semesters as $semester)
                        <option value={{$semester->endDate}}>{{$semester->season . " " . $semester->year}}</option>
                    @endforeach
                </select>

                <br><br>

                <div class="row d-flex p-2 mb-0">
                    <div class="col-3 d-flex justify-content-start mb-0">
                        <a class="btn btn-outline-secondary" onclick=hideDefaultRev()>Previous</a>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3 d-flex justify-content-end mb-0">
                        <a class="btn btn-primary" onclick=hideRentalLength()>Next</a>
                    </div>
                </div>
            </div>

            <div id="pageAccs">


                <div class="h1">Select the accessories for your custom package</div>
                <br><br>

                <div class="h3">
                    Lights
                </div>
                <div class="row">
                    @foreach($lights as $light)
                        <div class="col-xl-3 col-md-auto mb-4" onclick=setLightSelected({{$light->id}})
                             style="cursor: pointer">
                            <div class="card border-left-primary shadow h-100 py-2 light" id={{'light' . $light->id}}>
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <img class="img-responsive"
                                                 src={{'/images/' . $light->pictureFileName}} width="100"
                                                 height="100">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$light->name}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{'$' . $light->price}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <!-- Kickstands -->
                <div class="card shadow mb-4 accesDrop">
                    <!-- Card Header - Accordion -->
                    <a href="" class="d-block card-header py-3" data-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="Kickstands" data-target="#collapseKickstand">
                        <div class="m-0 h4">Kickstands</div>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseKickstand" style="">
                        <div class="card-body">
                            <div class="row">
                                @foreach($kickstands as $kickstand)
                                    <div class="col-xl-3 col-md-auto mb-4"
                                         onclick=setKickstandSelected({{$kickstand->id}}) style="cursor: pointer">
                                        <div class="card border-left-primary shadow h-100 py-2 kick"
                                             id={{'kick' . $kickstand->id}}>
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <img class="img-responsive"
                                                             src={{'/images/' . $kickstand->pictureFileName}} width="100"
                                                             height="100">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$kickstand->name}}</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{'$' . $kickstand->price}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Wheel Accessories -->
                <div class="card shadow mb-4 accesDrop">
                    <!-- Card Header - Accordion -->
                    <a href="" class="d-block card-header py-3" data-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="Backs" data-target="#collapseBack">
                        <h6 class="m-0 font-weight-bold text-primary">Back Wheel Accessories</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseBack" style="">
                        <div class="card-body">
                            <div class="row">
                                @foreach($backs as $back)

                                    <div class="col-xl-3 col-md-auto mb-4"
                                         onclick=setBackSelected({{$back->id}})
                                         style="cursor: pointer">
                                        <div class="card border-left-primary shadow h-100 py-2 back"
                                             id={{'back' . $back->id}}>
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <img class="img-responsive"
                                                             src={{'/images/' . $back->pictureFileName}} width="100"
                                                             height="100">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$back->name}}</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{'$' . $back->price}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Locks -->
                <div class="card shadow mb-4 accesDrop">
                    <!-- Card Header - Accordion -->
                    <a href="" class="d-block card-header py-3" data-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="Locks" data-target="#collapseLock">
                        <div class="m-0 h4">Locks</div>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseLock" style="">
                        <div class="card-body">
                            <div class="row">
                                @foreach($locks as $lock)
                                    <div class="col-xl-3 col-md-auto mb-4"
                                         onclick=setLockSelected({{$lock->id}})
                                         style="cursor: pointer">
                                        <div class="card border-left-primary shadow h-100 py-2 lock"
                                             id={{'lock' . $lock->id}}>
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <img class="img-responsive"
                                                             src={{'/images/' . $lock->pictureFileName}} width="100"
                                                             height="100">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$lock->name}}</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{'$' . $lock->price}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h3">
                    Other Accessories
                </div>
                <div class="row">
                    @foreach($otherAccessories as $other)
                        <div class="col-xl-3 col-md-auto mb-4" onclick=setOthersSelected({{$other->id}})
                             style="cursor: pointer">
                            <div class="card border-left-primary shadow h-100 py-2 other" id="{{'other' . $other->id}}">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <img class="img-responsive"
                                                 src={{'/images/' . $other->pictureFileName}} width="100"
                                                 height="100">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$other->name}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{'$' . $other->price}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <br>
                <div class="flex-row d-flex p-2">
                    <div class="col-xl-3 d-flex justify-content-start">
                        <a class="btn btn-outline-secondary" onclick=hideRev1()>Previous</a>
                    </div>
                    <div class="col-xl-6"></div>
                    <div class="col-xl-3 d-flex justify-content-end">
                        <a class="btn btn-primary" onclick=hide2()>Next</a>
                    </div>
                </div>
                <br><br>
            </div>

            <div class="userData">
                Home Address:<br>
                <input type="text" id="userHomeAddr" name="userHomeAddr" placeholder="Address"><br>
                <input type="text" id="userHomeCity" name="userHomeCity" placeholder="City">
                <input type="text" id="userHomeState" name="userHomeState" placeholder="State">
                <input type="text" id="userHomeZip" name="userHomeZip" placeholder="Zip Code"><br><br>

                Home Phone:<br>
                <input type="tel" id="userHomePhone" name="userHomePhone"><br><br>

                Local Address:<br>
                <input type="text" id="userLocalAddr" name="userLocalAddr"><br><br>

                Local Phone:<br>
                <input type="tel" id="userLocalPhone" name="userLocalPhone"><br><br>

                Cell Phone:<br>
                <input type="tel" id="cellPhone" name="cellPhone"><br><br>

                Drivers License Number:<br>
                <input type="text" id="driversLicenseNumber" name="driversLicenseNumber"><br><br>

                Drivers License State:<br>
                <select id="stateOfDriversLicense" name="stateOfDriversLicense">
                    <option value=""></option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select><br><br>

                Email:<br>
                <input type="email" id="userEmail" name="userEmail"><br><br>
                <div class="row d-flex p-2">
                    <div class="col-3 d-flex justify-content-start">
                        <a class="btn btn-outline-secondary" onclick=hideRev4()>Previous</a>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3 d-flex justify-content-end">
                        <a class="btn btn-primary" onclick=hide5()>Next</a>
                    </div>
                </div>
            </div>

            <div id="userInfo">
                <div class="h1">Tell us a bit about yourself!</div>
                <br><br>

                First Name:<br>
                <input type="text" id="fstName" name="fstName" value=""></input><br>
                Last Name:<br>
                <input type="text" id="lstName" name="lstName" value=""></input><br>
                <br>

                <div class="h5">To ensure that we size your bike accordingly please enter your height:</div>
                <select id="height" name="height">
                    <option value=""></option>
                    <option value="1">Less than 5'</option>
                    <option value="2">5' - 5'6"</option>
                    <option value="3">5'7" - 6'</option>
                    <option value="4">6'1" - 6'6"</option>
                    <option value="5">6'6" +</option>
                </select><br><br>

                <div class="h5">Which style of bike would you like?<br>
                    <select id="gender" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select><br><br>

                    <div class="flex-row d-flex p-2">
                        <div class="col-xl-3 d-flex justify-content-start">
                            <a class="btn btn-outline-secondary" onclick=hideRev2()>Previous</a>
                        </div>
                        <div class="col-xl-6"></div>
                        <div class="col-xl-3 d-flex justify-content-end">
                            <a class="btn btn-primary" onclick=hide3()>Next</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="sign">

                <div class="h1">Go ahead and check those boxes below</div>

                <input type="checkbox" name="priceAgreement" id="priceAgreement" value="priceAgreement"> I agree that the price
                shown to me
                is correct for the bike and any accessories I have chosen</input>
                <br><br>

                <input type="checkbox" name="termAgree" id="termAgree" value="termAgree"> I have read and agree to the <a href="/terms" target="_blank">terms and
                    conditions</a></input><br><br>

                <p class="h4">By signing your name here you agree to all of the above terms and
                    conditions</p><br>
                <input type="text" name="userName" placeholder="Customer's Name"><br><br>
                <div class="flex-row d-flex p-2">
                    <div class="col-xl-3 d-flex justify-content-start">
                        <a class="btn btn-outline-secondary" onclick=hideRev5()>Previous</a>
                    </div>
                    <div class="col-xl-6"></div>
                    <div class="col-xl-3 d-flex justify-content-end">
                        <a class="btn btn-success" onclick=validateSignature()>Submit</a>
                        {{--<input type="submit" class="btn btn-success" onclick=validateSignature() value="Submit"></input>--}}
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>

<div id="default" class="container">
    <div class="row justify-content-center align-items-center">
        <br>
        <br>
        <div class="col-xl-3"></div>
        <div class="col-xl-6 d-flex justify-content-center">
            <div class="h1">Please select a bike</div>
        </div>
        <div class="col-xl-3"></div>
        <br>
        <br>
        @foreach($bicycles as $bike)
            <div class="col-xl-6 col-md-6 mb-4" onclick=setBikeSelected({{$bike->id}}) style="cursor: pointer">
                <div class="card border-left-primary shadow h-100 py-2 bike" id={{'bike' . $bike->id}}>
                    <div class="card-body">
                        <div class="row no-gutters float-left">
                            <div class="col mr-1">
                                <img class="img-responsive" src={{'/images/' . $bike->pictureFileName}} width="300"
                                     height="300">
                            </div>
                            <div class="col-auto ml-1">
                                <div class="h2 font-weight-bold text-success text-uppercase mb-1">{{$bike->name}}</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{'$' . $bike->price}}</div>
                                <br>
                                <div class="text-body text-gray-800" style="word-wrap:break-word;">{!!$bike->description!!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div id="pagePackage" class="container">

    <div class="row justify-content-center align-items-center">
        <div class="h1 col-12 d-flex justify-content-center">Choose some accessories to go with your bike</div>
        <br><br>

        @foreach($packages as $package)
            <div class="col-lg-8 col-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 package" id={{'package' . $package->id}}
                        onclick=setPackageSelected({{$package->id}})
                     style="cursor: pointer">
                    <div class="card-body">
                        <div class="row no-gutters float-left">
                            <div class="col-lg-7 mr-1">
                                <div class="h2 font-weight-bold text-success text-uppercase mb-1">
                                    {{$package->name}}
                                </div>
                                <div class="h3 mb-1 font-weight-bold text-gray-800">
                                    {{'$' . $package->price}}
                                </div>
                                <div class="font-weight-normal text-body">
                                    <ul>

                                        @if($package->accessoryLight)
                                            <li>Light: {{$keyedAccessories[$package->accessoryLight]}}</li>
                                        @endif
                                        @if($package->accessoryKickstand)
                                            <li>
                                                Kickstand: {{$keyedAccessories[$package->accessoryKickstand]}}</li>
                                        @endif
                                        @if($package->accessoryLock)
                                            <li>Lock: {{$keyedAccessories[$package->accessoryLock]}}</li>
                                        @endif
                                        @if($package->accessoryBack)
                                            <li>Back: {{$keyedAccessories[$package->accessoryBack]}}</li>
                                        @endif
                                        @if($package->accessory5)
                                            <li>{{$keyedAccessories[$package->accessory5]}}</li>
                                        @endif
                                        @if($package->accessory6)
                                            <li>{{$keyedAccessories[$package->accessory6]}}</li>
                                        @endif
                                        @if($package->accessory7)
                                            <li>{{$keyedAccessories[$package->accessory7]}}</li>
                                        @endif
                                        @if($package->accessory8)
                                            <li>{{$keyedAccessories[$package->accessory8]}}</li>
                                        @endif
                                        @if($package->accessory9)
                                            <li>{{$keyedAccessories[$package->accessory9]}}</li>
                                        @endif
                                        @if($package->accessory10)
                                            <li>{{$keyedAccessories[$package->accessory10]}}</li>
                                        @endif
                                        @if($package->accessory11)
                                            <li>{{$keyedAccessories[$package->accessory11]}}</li>
                                        @endif
                                        @if($package->accessory12)
                                            <li>{{$keyedAccessories[$package->accessory12]}}</li>
                                        @endif
                                        @if($package->accessory13)
                                            <li>{{$keyedAccessories[$package->accessory13]}}</li>
                                        @endif
                                        @if($package->accessory14)
                                            <li>{{$keyedAccessories[$package->accessory14]}}</li>
                                        @endif
                                        @if($package->accessory15)
                                            <li>{{$keyedAccessories[$package->accessory15]}}</li>
                                        @endif

                                    </ul>
                                </div>


                            </div>
                            <div class="col-lg-4 ml-1">
                                <div class="text-body text-gray-800" style="word-wrap:break-word;">{!!$package->description!!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-lg-8 mb-4" onclick=setCustomSelected()
             style="cursor: pointer">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-info text-uppercase mb-1">
                                Or, create your own package!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-8">
            <div class="d-flex flex-row mb-3 p-3">
                <div class="col-xl-3 d-flex  p-0 ml-0 mr-5 justify-content-start">
                    <a class="btn btn-outline-secondary" onclick=hideRentalLengthRev()>Previous</a>
                </div>
                <div class="col-xl-3 d-flex ml-5 mr-5"></div>
                <div class="col-xl-3 d-flex ml-5 mr-5"></div>
                <div class="col-xl-3 d-flex ml-5 mr-5"></div>

            </div>
        </div>
    </div>


</div>


</body>
</html>
