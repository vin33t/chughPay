<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $referenceCode = 'wfgchughfirm01';

    $client = new CybsSoapClient();
    $request = $client->createRequest($referenceCode);

// Build a sale request (combining an auth and capture). In this example only
// the amount is provided for the purchase total.
    $ccAuthService = new stdClass();
    $ccAuthService->run = 'true';
    $request->ccAuthService = $ccAuthService;

    $ccCaptureService = new stdClass();
    $ccCaptureService->run = 'true';
    $request->ccCaptureService = $ccCaptureService;

    $billTo = new stdClass();
    $billTo->firstName = 'John';
    $billTo->lastName = 'Doe';
    $billTo->street1 = '1295 Charleston Road';
    $billTo->city = 'Mountain View';
    $billTo->state = 'CA';
    $billTo->postalCode = '94043';
    $billTo->country = 'US';
    $billTo->email = 'null@cybersource.com';
    $billTo->ipAddress = '10.7.111.111';
    $request->billTo = $billTo;

    $card = new stdClass();
    $card->accountNumber = '4111111111111111';
    $card->expirationMonth = '12';
    $card->expirationYear = '2020';
    $request->card = $card;

    $purchaseTotals = new stdClass();
    $purchaseTotals->currency = 'USD';
    $purchaseTotals->grandTotalAmount = '90.01';
    $request->purchaseTotals = $purchaseTotals;

    $reply = $client->runTransaction($request);

// This section will show all the reply fields.
    echo '<pre>';
    print("\nRESPONSE: " . print_r($reply, true));
    echo '</pre>';
//    return view('welcome');
});
