<?
/*
.---------------------------------------------------------------------------.
|  Software: 	HTTP API - Send SMS Example: Get SMS Account Balance Example|
|  Version: 	3.10														|
|  Email: 		sales@solutions4mobiles.com									|
|  Info: 		http://www.solutions4mobiles.com							|
|  Phone:		+44 203 318 3618											|
| ------------------------------------------------------------------------- |
| Copyright (c) 1999-2014, Mobiweb Ltd. All Rights Reserved.                |
| ------------------------------------------------------------------------- |
| LICENSE:																	|
| Distributed under the General Public License v3 (GPLv3)					|
| http://www.gnu.org/licenses/gpl-3.0.html									|
| This program is distributed AS IS and in the hope that it will be useful 	|
| WITHOUT ANY WARRANTY; without even the implied warranty of				|
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                      |
| ------------------------------------------------------------------------- |
| SERVICES:																	|
| We offer a number of paid services at http//www.solutions4mobiles.com:    |
| - Bulk SMS / MMS / Premium SMS Services / HLR Lookup Service				|
| ------------------------------------------------------------------------- |
| HELP:																		|
| - This class requires a valid HTTP API Account. Please email to			|
| sales@solutions4mobiles.com to get one									|
'---------------------------------------------------------------------------'

/**
* Get SMS Account Balance Example
* @copyright 1999 - 2014 Mobiweb Ltd.
* 
*/

require_once('sms.php');											// Include SMS class file.
$sol4mob_sms= new sms();											// Create SMS object.
$sol4mob_sms->$balance_url= 'http://IPADDRESS/balance_script';		// The HTTP request URL used for account balance information.
$sol4mob_sms->username=	'username';									// The HTTP API username of your account. 
$sol4mob_sms->password=	'password';									// The HTTP API password of your account.
echo 'Your account balance is '.$sol4mob_sms->getBalance();			// Call method getBalance() to get account
																	// balance.
?>