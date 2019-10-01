<?php
$response_page = route('cybersource.payment.response');
$cancel_page = route('cybersource.payment.cancel');
?>
<!DOCTYPE html>
<html>
<head>
    <title>ChughPay</title>
    <link rel="stylesheet" type="text/css" href="{{url('cybersource/assets/css/payment.css')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

{{--<h2>Payment Form</h2>--}}

<form id="payment_form" action="{{route('secure.payment.confirm')}}" method="post">
    <input type="hidden" name="profile_id" value="<?php echo PROFILE_ID; ?>">
    <input type="hidden" name="access_key" value="<?php echo ACCESS_KEY; ?>">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid(); ?>">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">

    <input type="hidden" name="signed_field_names" value="profile_id,access_key,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,auth_trans_ref_no,amount,currency,merchant_descriptor,override_custom_cancel_page,override_custom_receipt_page">
    
    <input type="hidden" name="unsigned_field_names" value="device_fingerprint_id,signature,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_line2,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code,customer_ip_address,line_item_count,item_0_code,item_0_sku,item_0_name,item_0_quantity,item_0_unit_price,item_1_code,item_1_sku,item_1_name,item_1_quantity,item_1_unit_price,merchant_defined_data1,merchant_defined_data2,merchant_defined_data3,merchant_defined_data4">
    <fieldset>
        <div class="container">
            <div class="card" >
                <div class="card-head text-center">
                    <h4>Payment Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                    <label for="tabs_id">Tabs ID</label>
                    <input type="text" name="tabs_id" class="form-control">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" class="form-control">
                    <input type="submit" id="btn_submit" value="Submit">
                        </div>
                        <div class="col-md-4"></div>

                    </div>
                </div>
            </div>
        </div>
{{--        <legend>Payment Details</legend>--}}
        <div id="paymentDetailsSection" class="section">
                    <div style="display:none;">
                    <input type="text" name="transaction_type" value="sale">
                          <input type="checkbox" id="create_token" onclick="createToken(this)">
                       <input type="hidden" name="reference_number" value="wfgchughfirm01">
                       </div>
         <input type="hidden" name="auth_trans_ref_no" value="wfgchughfirm01">
{{--            <span>amount:</span>                      <input type="text" name="amount">--}}
                              <input type="hidden" name="currency" value="USD">
                              <input type="hidden" name="locale" value="en-us"><br/>
                   <input type="hidden" name="merchant_descriptor" value="ChughPay">
    </fieldset>
    <p>
    <fieldset>
{{--        <legend>Tabs ID</legend>--}}
{{--            <h3>Billing Information</h3>--}}
{{--            <span>Tabs ID:</span>            <input type="text" name="tabs_id" placeholder="Tabs ID"><br/>--}}
        <div style="display:none;">
            <span>bill_to_forename:</span>            <input type="text" name="bill_to_forename" value=" "><br/>
            <span>bill_to_surname:</span>             <input type="text" name="bill_to_surname" value=" "><br/>
            <span>bill_to_email:</span>               <input type="text" name="bill_to_email" value=" "><br/>
            <span>bill_to_phone:</span>               <input type="text" name="bill_to_phone" value=" "><br/>
            <span>bill_to_address_line1:</span>       <input type="text" name="bill_to_address_line1" maxlength="60" value=" "><br/>
            <span>bill_to_address_line2:</span>       <input type="text" name="bill_to_address_line2" maxlength="60" value=" "><br/>
            <span>bill_to_address_city:</span>        <input type="text" name="bill_to_address_city" value=" "><br/>
            <span>bill_to_address_state:</span>       <input type="text" name="bill_to_address_state" value=" "><br/>
            <span>bill_to_address_country:</span>     <input type="text" name="bill_to_address_country" value=" "><br/>
            <span>bill_to_address_postal_code:</span> <input type="text" name="bill_to_address_postal_code" value=" "><br/>
            
            <!--<input type="text" name="payment_method" value="card"><br/>-->
            <!--<input type="text" name="card_type" value="001"><br/>-->
            <!--<input type="text" name="card_number" value="4111111111111111"><br/>-->
            <!--<input type="text" name="card_expiry_date" value="12-2022"><br/>-->
            <!--<input type="text" name="card_cvn" value="005"><br/>-->
            </div>
            
        </div>
        </div>
    </fieldset>

    <input type="hidden" name="override_custom_cancel_page" value="<?php echo $response_page; ?>">
    <input type="hidden" name="override_custom_receipt_page" value="<?php echo $response_page; ?>">

    <!-- MDD START -->
    <input type="hidden" name="customer_ip_address" value="<?php echo @$_SERVER['REMOTE_ADDR']; ?>">

    <input type="hidden" name="line_item_count" value="2"/>

    <input type="hidden" name="item_0_sku" value="sku001"/>
    <input type="hidden" name="item_0_code" value="KFLTFDIV">
    <input type="hidden" name="item_0_name" value="KFLTFDIV">
    <input type="hidden" name="item_0_quantity" value="100">
    <input type="hidden" name="item_0_unit_price" value="15.72">

    <input type="hidden" name="item_1_sku" value="sku002"/>
    <input type="hidden" name="item_1_code" value="KFLTFD70">
    <input type="hidden" name="item_1_name" value="KFLTFD70">
    <input type="hidden" name="item_1_quantity" value="100">
    <input type="hidden" name="item_1_unit_price" value="10.00">

    <input type="hidden" name="merchant_defined_data1" value="MDD#1">
    <input type="hidden" name="merchant_defined_data2" value="MDD#2">
    <input type="hidden" name="merchant_defined_data3" value="MDD#3">
    <input type="hidden" name="merchant_defined_data4" value="MDD#4">
    <!-- MDD END -->

<script type="text/javascript" src="{{url('cybersource/assets/js/jquery-1.7.min.js')}}"></script>
<!--<script type="text/javascript" src="{{url('cybersource/assets/js/payment_form.js')}}"></script>-->
    <script type="text/javascript">
        
        function createToken(create_token) {

            var type = 'sale';

            if (create_token.checked) {
                type += ',create_payment_token';
            }

            $("input[name='transaction_type']").val(type);
        }
        
        window.onload = function(){
            var type = 'sale';
    $('#create_token').click();
            if (create_token.checked) {
                type += ',create_payment_token';
            }

            $("input[name='transaction_type']").val(type);
        
        }
    </script>
    
    

</form>

</body>
</html>
