<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>


<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Offcanvas navbar</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Notifications</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>

        <form id="customerIndex" class="form-inline my-2 my-lg-0" type="get" action="{{route('todo.search') }}">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="searchby" style="color: white;">Search By</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="searchOption" class="searchOption" id="searchOption1" value="1" checked="checked" />
                <label class="form-check-label" for="searchOption1" style="color: white;">Name</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="searchOption" class="searchOption" id="searchOption2" value="2" @if (!empty($_REQUEST['searchOption']) && $_REQUEST['searchOption'] == '2') checked="checked" @endif />
                <label class="form-check-label" for="searchOption2" style="color: white;">Order No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="searchOption" class="searchOption" id="searchOption3" value="3" @if (!empty($_REQUEST['searchOption']) && $_REQUEST['searchOption'] == '3') checked="checked" @endif />
                <label class="form-check-label" for="searchOption3" style="color: white;">Phone</label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="start_date" style="color: white;">Start Date</label>
            </div>
            <input type="date" class="form-control mr-sm-2" id="start_date" name="start_date" value="@if (!empty($_GET['start_date'])) {{ trim($_GET['start_date']) }} @endif" />
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="end_date" style="color: white;">End Date</label>
            </div>
            <input type="date" class="form-control mr-sm-2" id="end_date" name="end_date" value="@if (!empty($_GET['end_date'])) {{ trim($_GET['end_date']) }} @endif" />
            <input class="form-control mr-sm-2" type="search" placeholder="Search" id="query" aria-label="Search" name="query" value=@if (!empty($_GET['query'])) {{ trim($_GET['query']) }} @endif>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-right: 5px;" onclick="validateSearch(); return false;">Search</button>
        </form>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="searchReset(); return false;">Reset Search</button>
    </div>
</nav>


<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        <img class="mr-3" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class="lh-100">

        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="container">
            @yield('content')
            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">© 2017-2018 Company Name</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Support</a></li>
                </ul>
            </footer>
        </div>
    </div>
</main>
</body>
</html>

<script>
    $(document).ready(function() {

        var url = window.location.pathname;
        if (url.indexOf("edit") > -1) {
            if ($('#refund_applied').is(":checked") == true) {
                $('#refund_reason').prop("readonly", false);
            } else {
                $('#refund_reason').prop("readonly", true);
            }
        }
    });

    //On clicking name or order no. automatically paste them in search textfield
    function pasteMe(val) {
        $('#query').val(val);
    }

    function validateSearch() {

        $error = true;

        /*if($('#query').val() == '') {
            switch($("input[name='searchOption']:checked").val()) {
                case '2':
                    alert("Please enter an order no to search");
                    break;
                case '3':
                    alert("Please enter a phone number to search");
                    break;
                default: alert("Please enter a name to search");
            }
        } else {
            $error = false;
        }*/

        // If validation returns no error
        //if ($error == false) {

            if($("#query").val()=="") {
                $("#query").remove();
            }
            $('#customerIndex').submit();
        //}
    }

    // Reset page back to index
    function searchReset() {
        var url = {!! json_encode(url('/todos')) !!}
        if (url != '' || typeof (url) != "undefined") {
            window.location.href = url;
        }
    }
</script>
