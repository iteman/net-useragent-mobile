--TEST--
Net_UserAgent_Mobile: EZweb
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - EZweb
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$tests = array(
               // ua, version, device_id, server, xhtml_compliant, comment, is_wap1, is_wap2
               array('UP.Browser/3.01-HI01 UP.Link/3.4.5.2', '3.01', 'HI01', 'UP.Link/3.4.5.2', false, null, true, false),
               array('KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1', '6.0.2.276 (GUI)', 'TS21', 'MMP/1.1', true, null, false, true),
               array('UP.Browser/3.04-TS14 UP.Link/3.4.4 (Google WAP Proxy/1.0)', '3.04', 'TS14', 'UP.Link/3.4.4', false, 'Google WAP Proxy/1.0', true, false)
               );

print "Testing EZweb ...\n";

foreach ($tests as $value1) {
    $ua = array_shift($value1);
    $data = $value1;
    $agent = &Net_UserAgent_Mobile::factory($ua);
    print is_object($agent) . "\n";
    print get_parent_class($agent) . "\n";
    print get_class($agent) . "\n";
    print $agent->isDoCoMo() . "\n";
    print $agent->isJPhone() . "\n";
    print $agent->isEZweb() . "\n";
    print $agent->getName() . "\n";
    print $agent->getUserAgent() . "\n";
    print $agent->getVersion() . "\n";
    print $agent->getDeviceID() . "\n";
    print $agent->getServer() . "\n";
    print $agent->isXHTMLCompliant() . "\n";
    print $agent->getComment() . "\n";
    print $agent->isWAP1() . "\n";
    print $agent->isWAP2() . "\n";
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
UP.Link/3.4.4

Google WAP Proxy/1.0
1
