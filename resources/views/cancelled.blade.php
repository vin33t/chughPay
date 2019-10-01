
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Make Payment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        setTimeout(function() {
            @if(session('notify'))
            swal({
                title: '{{session('notify_title')}}',
                text: '{{session('notify_text')}}',
                icon: '{{session('notify_type')}}'
            });
            @endif

        }, 200);
    </script>
    <style>
        /* Sticky footer styles
-------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }
        @media only screen and (max-width : 450px) {
            html {
                position: relative;
                min-height: 90%;
                margin-top: 25%;
            }
        }
        @media only screen and (min-width : 1200px) {
            html {
                position: relative;
                min-height: 90%;
            }
        }
        body {
            /* Margin bottom by footer height */

        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }


        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        body > .container {
            padding: 60px 15px 0;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }
        .navbar-header {
            float: left;
            padding: 15px;
            text-align: center;
            width: 100%;
        }
        .navbar-brand {float:none;}
        .bg-dark{
            background-color: #434343 !important;
            opacity: 1;
        }

    </style>
</head>

<body>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="navbar-header">

            <a class="navbar-brand text-center" href="{{route('secure.payment.form')}}"><img src="https://3n798845yy6aq6maz3v5eg91-wpengine.netdna-ssl.com/wp-content/uploads/2019/01/chugh-logo-160x59.jpg" alt=""></a>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<div class="container mt-4  text-center" style="padding-top: 20%">
    <h3>
        @if($message == 'cancelled')
        Transaction has been Cancelled
        @endif
        @if($message == 'expired')
        Session Expired. Please try again.
        @endif

    </h3>
    Redirecting to home in
    <span id="countdown">10</span> seconds
    <!-- JavaScript part -->
    <!-- JavaScript part -->
    <script type="text/javascript">

        // Total seconds to wait
        var seconds = 10;

        function countdown() {
            seconds = seconds - 1;
            if (seconds < 0) {
                // Chnage your redirection link here
                window.location = "{{route('secure.payment.form')}}";
            } else {
                // Update remaining seconds
                document.getElementById("countdown").innerHTML = seconds;
                // Count down using javascript
                window.setTimeout("countdown()", 1000);
            }
        }

        // Run countdown function
        countdown();

    </script>
</div>

<footer class="footer">
    <div style="background-color: #A3211F;">
        <div class="row text-center">
            <div class="col-md-12 mt-4" style="color: white;">
                <h3>CONTACT US</h3>
            </div>
            <div class="col-md-12">
                <a href="https://chughdigitalde.wpengine.com/contact-us/" class="btn" style="background-color: white; color: #830d10; border-radius: 0%; width: 40%">GET IN TOUCH</a>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #434343; padding-top: 10px">
        <div class="col-md-6 col-sm-12 text-center" style="padding-top: 4px; color: white;" >
            © 2019 Chugh Affiliate Network. All Rights Reserved
        </div>
        <div class="col-md-6 col-sm-12 text-center" style="padding-top: 4px">
            <a href="https://www.chugh.com/disclaimer/"> DISCLAIMER </a>&nbsp; &nbsp;
            <a href="#"> PRIVACY POLICY</a> &nbsp; &nbsp;
            <a href=""> TERMS AND CONDITIONS </a> &nbsp; &nbsp;
            <a href="https://www.chugh.com/sitemap/"> SITEMAP</a>&nbsp; &nbsp;
        </div>
    </div>


</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{ forgetNotification() }}

</body>
</html>
