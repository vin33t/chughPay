<?php

/* Cybersource Secure Acceptance W/M Profile Config*/
define('MERCHANT_ID', 'wfgchughfirm01');
define('PROFILE_ID',  'wfgchughfirm01_acct');
define('ACCESS_KEY',  'c81461acc778352cbb73163b1ff92551');
define('SECRET_KEY',  '300e9d070842406ab1e188ebb3d30148216e964226694c25a74af44c7899c56666bbdcdfb7674e519e3a688a2a2c881fd512a6083d3b4993a2b3dd9b8cf6b47a3ada57632fcf4bca8621ff1b6a2bb9c562e26705e6ab4ab4920d451213e51182ca8231044836456abdee05fc021f59d8f446a012e6964bb0b0d2cd5aebcabfab');

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