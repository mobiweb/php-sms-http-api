<?
/*
.---------------------------------------------------------------------------.
|  Software: 	HTTP API - Send SMS Example: SMS with Delivery Report		|
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
* SMS with Delivery Report Example
* @copyright 1999 - 2014 Mobiweb Ltd.
* 
*/

require_once('sms.php');											// Include SMS class file.
$sol4mob_sms= new sms();											// Create SMS object.
$sol4mob_sms->$send_url= 'http://IPADDRESS/send_script';			// The HTTP request URL used for messaging.
$sol4mob_sms->username=	'username';									// The HTTP API username of your account. 
$sol4mob_sms->password= 'password';									// The HTTP API password of your account.
$sol4mob_sms->showDLR= 1;											// Set to 1 for requesting delivery report 
																	// of this sms. A unique id is returned to use
																	// with your delivery report request.
$sol4mob_sms->msgtext= "Hello World";								// The SMS Message text.
$sol4mob_sms->originator= 'TestAccount';							// The desired Originator of your message. 
$sol4mob_sms->phone= 'recipient';									// The full International mobile number of the
																	// recipient excluding the leeding +.
echo $sol4mob_sms->send();											// Call method send() to send SMS Message.

/**
* IMPORTANT: Store the unique id and use it with Automatic DLR Forwarding.
*/
?>