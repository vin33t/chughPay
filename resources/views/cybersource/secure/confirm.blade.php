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
    <title>Confirm Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .bg-dark{
            background-color: #434343 !important;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            height: 98px !important;
            padding: 35px;
            opacity: 1;
        }
        .navbar-brand{
            margin-left: 42% !important;
        }
        .above-navbar{
            padding: 5px;
            background-color: #292929 !important;
            color: #8d8d8d;
        }
        a{
            color: white;
        }

    </style>
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="all">
    <div class="row above-navbar">
        <div class="col-md-11">

        </div>
        <div class="col-md-1">
            <a href="https://www.chugh.com/payment/#elementor-action%3Aaction%3Dpopup%3Aopen%20settings%3DeyJpZCI6IjI3NjAiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D" style="color: #8d8d8d;">Free Consultation</a>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-center">
        <a href="#" class="navbar-brand"><img src="https://3n798845yy6aq6maz3v5eg91-wpengine.netdna-ssl.com/wp-content/uploads/2019/01/chugh-logo-160x59.jpg" alt=""> PAYMENT</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{--        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">--}}
        {{--            <div class="navbar-nav">--}}
        {{--                <a href="https://chugh.com" class="nav-item nav-link active">Home</a>--}}
        {{--                <div class="nav-item dropdown">--}}
        {{--                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About  Us</a>--}}
        {{--                    <div class="dropdown-menu">--}}
        {{--                        <a href="https://www.chugh.com/diversity/" class="dropdown-item">DIVERSITY & INCLUSION AT CHUGH, LLP</a>--}}
        {{--                        <a href="https://www.chugh.com/awards/" class="dropdown-item">AWARDS & RECOGNITIONS</a>--}}
        {{--                        <a href="https://www.chugh.com/press-coverage/" class="dropdown-item">PRESS COVERAGE</a>--}}
        {{--                        <a href="https://www.chugh.com/community/" class="dropdown-item">COMMUNITY</a>--}}
        {{--                        <a href="https://www.chugh.com/events/" class="dropdown-item">EVENTS</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            </div>--}}
        {{--        </div>--}}
    </nav>
</div>
<form id="payment_confirmation" action="<?php echo $endpoint_url; ?>" method="post"/>
<div class="container mt-4  text-center">
    <h2>Confirm Payment Details</h2>
    <hr>
    <br>
    <?php
    foreach($data as $name => $value) {
        $params[$name] = $value;
    }
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="tabs_id"><h3>TABS ID</h3></label>
            <input type="text" name="tabs_id" class="form-control" value="{{ $params['tabs_id'] }}" readonly required>
            <label for="amount"><h3>Amount</h3></label>
            <input type="text" name="amount" value="{{ $params['amount'] }}" class="form-control" readonly required>
            <br>
            <button type="submit" class="btn btn-lg" style="background-color: #830d10; color: white; border-radius: 6%">Confirm </button>
            <input type="hidden" name="device_fingerprint_id" value="<?php echo $sess_id; ?>" />
            <input type="hidden" name="signature" value="<?php echo CybersourceHelper::sign($params, SECRET_KEY); ?>" />
{{--            <input type="submit" id="btn_submit" value="Confirm"/>--}}
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
<div class="footer">
    <div  style="background-color: #830d10; height: 250px;">
        <div class="row" style="padding-top: 50px">
            <div class="col-md-5">
                <h2 style="margin-left: 60px">CONTACT US</h2>
            </div>
            <div class="col-md-7">

            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <a href="https://chughdigitalde.wpengine.com/contact-us/" class="btn btn-lg" style="background-color: white; color: #830d10; border-radius: 0%; width: 600px;"> GET IN TOUCH</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="https://www.chugh.com/payment/#elementor-action%3Aaction%3Dpopup%3Aopen%20settings%3DeyJpZCI6IjI3NjAiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D" class="btn btn-lg" style="background-color: white; color: #830d10; border-radius: 0%; width: 600px;">Schedule Consultation</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div style="background-color: #434343; height: 50px;">
        <div class="row">
            <div class="col-md-6" style="padding-top: 10px">
                © 2019 Chugh Affiliate Network. All Rights Reserved
            </div>
            <div class="col-md-6" style="padding-top: 10px">
                <a href="https://www.chugh.com/disclaimer/"> DISCLAIMER </a>&nbsp; &nbsp;
                <a href="#"> PRIVACY POLICY</a> &nbsp; &nbsp;
                <a href=""> TERMS AND CONDITIONS </a> &nbsp; &nbsp;
                <a href="https://www.chugh.com/sitemap/"> SITEMAP</a>&nbsp; &nbsp;
            </div>
        </div>
    </div>
</div>
</body>
</html>
