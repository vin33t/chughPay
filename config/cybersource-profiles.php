<?php

/* Cybersource Secure Acceptance W/M Profile Config*/
define('MERCHANT_ID', 'wfgchughfirm01');
define('PROFILE_ID',  'wfgchughfirm01_acct');
define('ACCESS_KEY',  '48cce8428ee33f0cb656a743d5950248');
define('SECRET_KEY',  'abec09268fda4722b8c90ef968f9b6a47504b9ccb893470d8ab363aa1c840de84cb4d34cca7b405a92bb8abf891ae5bfe4568aa00e5a40e7aecac8d63c5351c79a672d2ce4644a088d1a99924b13a753e81214a8d51e43ff96598cc5a5e30df9b15e5ec0f33c4b2882e90f72ca3c7a8c2a0bb661da3b4118b1121f30089868fe');

// DF TEST: 1snn5n9w, LIVE: k8vif92e 
define('DF_ORG_ID', '1snn5n9w');

// PAYMENT URL
define('CYBS_BASE_URL', 'https://testsecureacceptance.cybersource.com');

define('PAYMENT_URL', CYBS_BASE_URL . '/pay');
// define('PAYMENT_URL', '/sa-sop/debug.php');

define('TOKEN_CREATE_URL', CYBS_BASE_URL . '/token/create');
define('TOKEN_UPDATE_URL', CYBS_BASE_URL . '/token/update');

// EOF Secure Acceptance W/M

 /* Cybersource Silnet Order Profile Config*/
// define('MERCHANT_ID', ''); Merchant Id is Unique in two cases
define('PROFILE_ID_S',  '');
define('ACCESS_KEY_S',  '');
define('SECRET_KEY_S',  '');

// DF TEST: 1snn5n9w, LIVE: k8vif92e 
define('DF_ORG_ID_S', '1snn5n9w');

// PAYMENT URL
define('CYBS_BASE_URL_S', 'https://testsecureacceptance.cybersource.com/silent');

define('PAYMENT_URL_S', CYBS_BASE_URL_S . '/pay');
// define('PAYMENT_URL', '/sa-sop/debug.php');

define('TOKEN_CREATE_URL_S', CYBS_BASE_URL_S . '/token/create');
define('TOKEN_UPDATE_URL_S', CYBS_BASE_URL_S . '/token/update');

// EOF Silnet Order