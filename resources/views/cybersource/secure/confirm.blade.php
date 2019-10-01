<?php 
use \JustGeeky\LaravelCybersource\CybersourceHelper;

session_start();
$sess_id  = session_id();
$df_param = 'org_id=' . DF_ORG_ID . '&amp;session_id=' . MERCHANT_ID . $sess_id;

$endpoint_url = PAYMENT_URL;
if ($_POST['transaction_type'] === 'create_payment_token') {
    $endpoint_url = TOKEN_CREATE_URL;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Confirm Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

            <a class="navbar-brand text-center" href="{{route('home')}}"><img src="https://3n798845yy6aq6maz3v5eg91-wpengine.netdna-ssl.com/wp-content/uploads/2019/01/chugh-logo-160x59.jpg" alt=""></a>
        </div>
    </nav>
</header>
<form id="payment_confirmation" action="<?php echo $endpoint_url; ?>" method="post"/>
    <?php
    foreach($data as $name => $value) {
        $params[$name] = $value;
    }
    ?>
    <div class="container mt-4  text-center" style="padding-top: 11%">
        <h2>Confirm Payment Details</h2>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <label for="tabs_id"><h3>TABS ID</h3></label>
                <input type="text" name="tabs_id" class="form-control" value="{{ $params['tabs_id'] }}" readonly required>
                <label for="amount"><h3>Amount</h3></label>
                <input type="text" name="amount" class="form-control" value="{{ $params['amount'] }}" readonly required>
                <br>
                <button type="submit" class="btn btn-lg" style="background-color: #830d10; color: white; border-radius: 6%">Confirm </button>
                <input type="hidden" name="device_fingerprint_id" value="<?php echo $sess_id; ?>" />
                <input type="hidden" name="signature" value="<?php echo CybersourceHelper::sign($params, SECRET_KEY); ?>" />
{{--                <button type="submit" class="btn btn-lg" style="background-color: #830d10; color: white; border-radius: 6%">Submit</button>--}}
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>



    <div>
        <?php
            foreach($params as $name => $value) {
                if($name == 'tabs_id' or $name == 'amount'){
                    echo "<div style='display: none'>";
                    echo "<span class=\"fieldName\">" . $name . "</span><span class=\"fieldValue\">" . $value . "</span>";
                    echo "</div>\n";
                }

            }
        ?>
    </div>
    <?php
        foreach($params as $name => $value) {
            echo "<input type=\"hidden\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
        }
    ?>



</form>

<!-- DF START -->
<div STYLE="display: NONE">

device_fingerprint_param: <?php echo $df_param; ?>
</div>
<p style="background:url(https://h.online-metrix.net/fp/clear.png?<?php echo $df_param; ?>&amp;m=1)"></p>
<img src="https://h.online-metrix.net/fp/clear.png?<?php echo $df_param; ?>&amp;m=2" width="1" height="1" />
<!-- DF END -->

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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
