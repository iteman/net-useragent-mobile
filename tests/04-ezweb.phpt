--TEST--
Net_UserAgent_Mobile: EZweb
--SKIPIF--
<?php if (!@include('../Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - EZweb
//

error_reporting(E_ALL);
require_once('../Mobile.php');

$tests = array(
               // ua, version, model, device_id, server, xhtml_compliant, comment, is_wap1, is_wap2
               array('UP.Browser/3.01-HI01 UP.Link/3.4.5.2', '3.01', 'HI01', 'HI01', 'UP.Link/3.4.5.2', false, null, true, false),
               array('KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1', '6.0.2.276 (GUI)', 'TS21', 'TS21', 'MMP/1.1', true, null, false, true),
               array('UP.Browser/3.04-TS14 UP.Link/3.4.4 (Google WAP Proxy/1.0)', '3.04', 'TS14', 'TS14', 'UP.Link/3.4.4', false, 'Google WAP Proxy/1.0', true, false),
               array('UP.Browser/3.04-TST4 UP.Link/3.4.5.6', '3.04', 'TST4', 'TST4', 'UP.Link/3.4.5.6', false, null, true, false),
               array('KDDI-KCU1 UP.Browser/6.2.0.5.1 (GUI) MMP/2.0', '6.2.0.5.1 (GUI)', 'KCU1', 'KCU1', 'MMP/2.0', true, null, false, true),
               );

print "Testing EZweb ...\n";

foreach ($tests as $value1) {
    $ua = array_shift($value1);
    $data = $value1;
    $agent = &Net_UserAgent_Mobile::factory($ua);
    print is_object($agent) . "\n";
    print strtolower(get_parent_class($agent)) . "\n";
    print strtolower(get_class($agent)) . "\n";
    print $agent->isDoCoMo() . "\n";
    print $agent->isVodafone() . "\n";
    print $agent->isJPhone() . "\n";
    print $agent->isEZweb() . "\n";
    print $agent->isTUKa() . "\n";
    print $agent->getName() . "\n";
    print $agent->getUserAgent() . "\n";
    print $agent->getVersion() . "\n";
    print $agent->getModel() . "\n";
    print $agent->getDeviceID() . "\n";
    print $agent->getServer() . "\n";
    print $agent->isXHTMLCompliant() . "\n";
    print $agent->getComment() . "\n";
    print $agent->isWAP1() . "\n";
    print $agent->isWAP2() . "\n";
    if ($agent->getCarrierShortName() != 'E') {
        print "Carrier short name isn't E\n";
    }
    if ($agent->getCarrierLongName() != 'EZweb') {
        print "Carrier long name isn't EZweb\n";
    }
}
?>
--POST--
--GET--
--EXPECT--
Testing EZweb ...
1
net_useragent_mobile_common
net_useragent_mobile_ezweb



1

UP.Browser
UP.Browser/3.01-HI01 UP.Link/3.4.5.2
3.01
HI01
HI01
UP.Link/3.4.5.2


1

1
net_useragent_mobile_common
net_useragent_mobile_ezweb



1

UP.Browser
KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1
6.0.2.276 (GUI)
TS21
TS21
MMP/1.1
1


1
1
net_useragent_mobile_common
net_useragent_mobile_ezweb



1

UP.Browser
UP.Browser/3.04-TS14 UP.Link/3.4.4 (Google WAP Proxy/1.0)
3.04
TS14
TS14
UP.Link/3.4.4

Google WAP Proxy/1.0
1

1
net_useragent_mobile_common
net_useragent_mobile_ezweb



1
1
UP.Browser
UP.Browser/3.04-TST4 UP.Link/3.4.5.6
3.04
TST4
TST4
UP.Link/3.4.5.6


1

1
net_useragent_mobile_common
net_useragent_mobile_ezweb



1
1
UP.Browser
KDDI-KCU1 UP.Browser/6.2.0.5.1 (GUI) MMP/2.0
6.2.0.5.1 (GUI)
KCU1
KCU1
MMP/2.0
1


1
