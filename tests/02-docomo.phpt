--TEST--
Net_UserAgent_Mobile: DoCoMo
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - DoCoMo
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$tests = array(
               // ua, version, html_version, model, cache_size, is_foma, vendor, series, options
               array('DoCoMo/1.0/D501i', '1.0', '1.0', 'D501i', 5, false, 'D', '501i'),
               array('DoCoMo/1.0/D502i', '1.0', '2.0', 'D502i', 5, false, 'D', '502i'),
               array('DoCoMo/1.0/D502i/c10', '1.0', '2.0', 'D502i', 10, false, 'D', '502i'),
               array('DoCoMo/1.0/D210i/c10', '1.0', '3.0', 'D210i', 10, false, 'D', '210i'),
               array('DoCoMo/1.0/SO503i/c10', '1.0', '3.0', 'SO503i', 10, false, 'SO', '503i'),
               array('DoCoMo/1.0/D211i/c10', '1.0', '3.0', 'D211i', 10, false, 'D', '211i'),
               array('DoCoMo/1.0/SH251i/c10', '1.0', '3.0', 'SH251i', 10, false, 'SH', '251i'),
               array('DoCoMo/1.0/R692i/c10', '1.0', '3.0', 'R692i', 10, false, 'R', '692i'),
               array('DoCoMo/2.0 P2101V(c100)', '2.0', '3.0', 'P2101V', 100, true, 'P', 'FOMA'),
               array('DoCoMo/2.0 N2001(c10)', '2.0', '3.0', 'N2001', 10, true, 'N', 'FOMA'),
               array('DoCoMo/2.0 N2002(c100)', '2.0', '3.0', 'N2002', 100, true, 'N', 'FOMA'),
               array('DoCoMo/2.0 D2101V(c100)', '2.0', '3.0', 'D2101V', 100, true, 'D', 'FOMA'),
               array('DoCoMo/2.0 P2002(c100)', '2.0', '3.0', 'P2002', 100, true, 'P', 'FOMA'),
               array('DoCoMo/2.0 MST_v_SH2101V(c100)', '2.0', '3.0', 'SH2101V', 100, true, 'SH', 'FOMA'),
               array('DoCoMo/2.0 T2101V(c100)', '2.0', '3.0', 'T2101V', 100, true, 'T', 'FOMA'),
               array('DoCoMo/1.0/D504i/c10', '1.0', '4.0', 'D504i', 10, false, 'D', '504i'),
               array('DoCoMo/1.0/D504i/c30/TD', '1.0', '4.0', 'D504i', 30, false, 'D', '504i', array('status' => 'TD')),
               array('DoCoMo/1.0/D504i/c10/TJ', '1.0', '4.0', 'D504i', 10, false, 'D', '504i', array('status' => 'TJ')),
               array('DoCoMo/1.0/F504i/c10/TB', '1.0', '4.0', 'F504i', 10, false, 'F', '504i', array('status' => 'TB')),
               array('DoCoMo/1.0/D251i/c10', '1.0', '4.0', 'D251i', 10, false, 'D', '251i'),
               array('DoCoMo/1.0/F251i/c10/TB', '1.0', '4.0', 'F251i', 10, false, 'F', '251i', array('status' => 'TB')),
               array('DoCoMo/1.0/F671iS/c10/TB', '1.0', '4.0', 'F671iS', 10, false, 'F', '671i', array('status' => 'TB')),
               array('DoCoMo/1.0/P503i/c10/serNMABH200331', '1.0', '3.0', 'P503i', 10, false, 'P', '503i', array('serial_number' => 'NMABH200331')),
               array('DoCoMo/2.0 N2001(c10;ser0123456789abcde;icc01234567890123456789)', '2.0', '3.0', 'N2001', 10, 1, 'N', 'FOMA', array('serial_number' => '0123456789abcde', 'card_id' => '01234567890123456789')),
               array('DoCoMo/1.0/eggy/c300/s32/kPHS-K', '1.0', '3.2', 'eggy', 300, false, null, null, array('bandwidth' => 32)),
               array('DoCoMo/1.0/P751v/c100/s64/kPHS-K', '1.0', '3.2', 'P751v', 100, false, 'P', null, array('bandwidth' => 64)),
               array('DoCoMo/1.0/P209is (Google CHTML Proxy/1.0)', '1.0', '2.0', 'P209is', 5, false, 'P', '209i', array('comment' => 'Google CHTML Proxy/1.0')),
               array('DoCoMo/1.0/F212i/c10/TB', '1.0', '4.0', 'F212i', 10, false, 'F', '212i', array('status' => 'TB')),
               array('DoCoMo/2.0 F2051(c100;TB)', '2.0', '4.0', 'F2051', 100, true, 'F', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/2.0 N2051(c100;TB)', '2.0', '4.0', 'N2051', 100, true, 'N', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/2.0 P2102V(c100;TB)', '2.0', '4.0', 'P2102V', 100, true, 'P', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/1.0/N211iS/c10', '1.0', '3.0', 'N211iS', 10, false, 'N', '211i'),
               array('DoCoMo/1.0/P211iS/c10', '1.0', '3.0', 'P211iS', 10, false, 'P', '211i'),
               array('DoCoMo/1.0/N251iS/c10/TB', '1.0', '4.0', 'N251iS', 10, false, 'N', '251i', array('status' => 'TB')),
               array('DoCoMo/1.0/F661i/c10/TB', '1.0', '4.0', 'F661i', 10, false, 'F', '661i', array('status' => 'TB', 'is_gps' => true)),
               array('DoCoMo/1.0/D505i/c20/TC/W20H10', '1.0', '5.0', 'D505i', 20, false, 'D', '505i', array('status' => 'TC'))
               );

$test_agents = array(
                     'DoCoMo/1.0/633S/c20',
                     'DoCoMo/1.0/641P/c10',
                     'DoCoMo/1.0/641S/c10',
                     'DoCoMo/1.0/642S/c20',
                     'DoCoMo/1.0/Agent',
                     'DoCoMo/1.0/D209i',
                     'DoCoMo/1.0/D209i/c10',
                     'DoCoMo/1.0/D210i/c10',
                     'DoCoMo/1.0/D211i/c10',
                     'DoCoMo/1.0/D251i/c10',
                     'DoCoMo/1.0/D501i',
                     'DoCoMo/1.0/D501i/c5',
                     'DoCoMo/1.0/D502i',
                     'DoCoMo/1.0/D502i/c10',
                     'DoCoMo/1.0/D503i',
                     'DoCoMo/1.0/D503i/c10',
                     'DoCoMo/1.0/D503i/c5',
                     'DoCoMo/1.0/D503iS/c10',
                     'DoCoMo/1.0/D503iS/c5',
                     'DoCoMo/1.0/D504i/c10',
                     'DoCoMo/1.0/ER209i',
                     'DoCoMo/1.0/ER209i/c15',
                     'DoCoMo/1.0/F209i',
                     'DoCoMo/1.0/F209i/c10',
                     'DoCoMo/1.0/F210i/c10',
                     'DoCoMo/1.0/F211i/c10',
                     'DoCoMo/1.0/F251i/c10/TB',
                     'DoCoMo/1.0/F501i',
                     'DoCoMo/1.0/F502i',
                     'DoCoMo/1.0/F502i/c10',
                     'DoCoMo/1.0/F502it',
                     'DoCoMo/1.0/F502it/c10',
                     'DoCoMo/1.0/F503i',
                     'DoCoMo/1.0/F503i/c10',
                     'DoCoMo/1.0/F503i/c32',
                     'DoCoMo/1.0/F503iS',
                     'DoCoMo/1.0/F503iS/c10',
                     'DoCoMo/1.0/F504i/c10/TB',
                     'DoCoMo/1.0/F504i/c10/TJ',
                     'DoCoMo/1.0/F671i/c10',
                     'DoCoMo/1.0/GigaCode (http://gigacode.net/)',
                     'DoCoMo/1.0/KO209i',
                     'DoCoMo/1.0/KO210i',
                     'DoCoMo/1.0/KO210i/c10',
                     'DoCoMo/1.0/N209i',
                     'DoCoMo/1.0/N209i/c08',
                     'DoCoMo/1.0/N210i',
                     'DoCoMo/1.0/N210i/c10',
                     'DoCoMo/1.0/N211i/c10',
                     'DoCoMo/1.0/N501i',
                     'DoCoMo/1.0/N502i',
                     'DoCoMo/1.0/N502i/c08',
                     'DoCoMo/1.0/N502it',
                     'DoCoMo/1.0/N502it/c10',
                     'DoCoMo/1.0/N503i',
                     'DoCoMo/1.0/N503i/c10',
                     'DoCoMo/1.0/N503i/c30',
                     'DoCoMo/1.0/N503i/c5',
                     'DoCoMo/1.0/N503i/c5/serNNEBJ608187',
                     'DoCoMo/1.0/N503iS',
                     'DoCoMo/1.0/N503iS/c10',
                     'DoCoMo/1.0/N503iS/c5',
                     'DoCoMo/1.0/N504i/c10',
                     'DoCoMo/1.0/N504i/c10/TB',
                     'DoCoMo/1.0/N504i/c10/TJ',
                     'DoCoMo/1.0/N504i/c10/TJ/c0',
                     'DoCoMo/1.0/N821i',
                     'DoCoMo/1.0/N821i/c08',
                     'DoCoMo/1.0/NM502i',
                     'DoCoMo/1.0/NM502i/c10',
                     'DoCoMo/1.0/P209i',
                     'DoCoMo/1.0/P209i/c10',
                     'DoCoMo/1.0/P209is',
                     'DoCoMo/1.0/P209is (Google CHTML Proxy/1.0)',
                     'DoCoMo/1.0/P209is/c10',
                     'DoCoMo/1.0/P210i',
                     'DoCoMo/1.0/P210i/c10',
                     'DoCoMo/1.0/P211i/c10',
                     'DoCoMo/1.0/P501i',
                     'DoCoMo/1.0/P502i',
                     'DoCoMo/1.0/P502i/c10',
                     'DoCoMo/1.0/P502i/c10 (Google CHTML Proxy/1.0)',
                     'DoCoMo/1.0/P502i_mEB-PD555',
                     'DoCoMo/1.0/P503i',
                     'DoCoMo/1.0/P503i/c10',
                     'DoCoMo/1.0/P503i/c10/',
                     'DoCoMo/1.0/P503iS',
                     'DoCoMo/1.0/P503iS/c10',
                     'DoCoMo/1.0/P503iS/c10/serNMAUA482012',
                     'DoCoMo/1.0/P504i/c10',
                     'DoCoMo/1.0/P504i/c10/TB',
                     'DoCoMo/1.0/P751v/c100/s64/kPHS-K',
                     'DoCoMo/1.0/P821i',
                     'DoCoMo/1.0/P821i/c08',
                     'DoCoMo/1.0/PacketMeter/c10',
                     'DoCoMo/1.0/R209i',
                     'DoCoMo/1.0/R211i/c10',
                     'DoCoMo/1.0/R691i',
                     'DoCoMo/1.0/SH251i/c10',
                     'DoCoMo/1.0/SH712m/c10',
                     'DoCoMo/1.0/SH821i',
                     'DoCoMo/1.0/SH821i/c10',
                     'DoCoMo/1.0/SO210i/c10',
                     'DoCoMo/1.0/SO211i/c10',
                     'DoCoMo/1.0/SO502i',
                     'DoCoMo/1.0/SO502iWM/c10',
                     'DoCoMo/1.0/SO503i',
                     'DoCoMo/1.0/SO503i/c10',
                     'DoCoMo/1.0/SO503i/c10/serNSOBD506895',
                     'DoCoMo/1.0/SO503i/c10/serNSOBD597705',
                     'DoCoMo/1.0/SO503iS/c10',
                     'DoCoMo/1.0/SO504i/c10',
                     'DoCoMo/1.0/SO504i/c10/TB',
                     'DoCoMo/1.0/TEST/c10',
                     'DoCoMo/1.0/TF502i',
                     'DoCoMo/1.0/X503i/c10',
                     'DoCoMo/1.0/eggy/c300/s32/kPHS-K',
                     'DoCoMo/1.0/eggy/c300/s64/kPHS-K',
                     'DoCoMo/1.0/ex_idisplay/c10',
                     'DoCoMo/1.0/ex_ps_test00/c10',
                     'DoCoMo/1.0/iYappo',
                     'DoCoMo/1.0/p503is/c10',
                     'DoCoMo/1.0/test',
                     'DoCoMo/1.0/test/c10',
                     'DoCoMo/1.0/test/c10/TB',
                     'DoCoMo/1.1/P711m/c10',
                     'DoCoMo/2.0 D2101V(c100)',
                     'DoCoMo/2.0 MST_v_P2101V(c100)',
                     'DoCoMo/2.0 N2001(c10)',
                     'DoCoMo/2.0 N2001(c10;ser350200000307969;icc8981100000200188565F)',
                     'DoCoMo/2.0 N2002(c100)',
                     'DoCoMo/2.0 P2002(c100)',
                     'DoCoMo/2.0 P2101V',
                     'DoCoMo/2.0 P2101V(c100)',
                     'DoCoMo/2.0/N502i',
                     'DoCoMo/2.0/N502it',
                     'DoCoMo/2.0/N503i',
                     'DoCoMo/3.0/N503',
                     'DoCoMo/2.0 F2051(c100;TB)',
                     'DoCoMo/2.0 N2051(c100;TB)',
                     'DoCoMo/2.0 P2102V(c100;TB)',
                     'DoCoMo/1.0/N211iS/c10',
                     'DoCoMo/1.0/P211iS/c10',
                     'DoCoMo/1.0/N251iS/c10/TB',
                     'DoCoMo/1.0/F661i/c10/TB',
                     'DoCoMo/1.0/D505i/c20/TC/W20H10'
                     );

$test_error_agents = array(
                           'DoCoMo/1.0/SO504i/abc/TB',
                           'DoCoMo/2.0 N2001(c10;ser35020000030796;icc8981100000200188565F)',
                           'DoCoMo/2.0 N2001(c10;ser350200000307969;icc8981100000200188565)'
                           );

$line = 0;

++$line;
print "$line: " . "Testing DoCoMo ...\n";

foreach ($tests as $value1) {
    $ua = array_shift($value1);
    $data = $value1;
    $agent = &Net_UserAgent_Mobile::factory($ua);
    ++$line;
    print "$line: " . is_object($agent) . "\n";
    ++$line;
    print "$line: " . get_parent_class($agent) . "\n";
    ++$line;
    print "$line: " . get_class($agent) . "\n";
    ++$line;
    print "$line: " . $agent->isDoCoMo() . "\n";
    ++$line;
    print "$line: " . $agent->isJPhone() . "\n";
    ++$line;
    print "$line: " . $agent->isEZweb() . "\n";
    ++$line;
    print "$line: " . $agent->getName() . "\n";
    ++$line;
    print "$line: " . $agent->getUserAgent() . "\n";
    ++$line;
    print "$line: " . $agent->getVersion() . "\n";
    ++$line;
    print "$line: " . $agent->getHTMLVersion() . "\n";
    ++$line;
    print "$line: " . $agent->getModel() . "\n";
    ++$line;
    print "$line: " . $agent->getCacheSize() . "\n";
    ++$line;
    print "$line: " . $agent->isFOMA() . "\n";
    ++$line;
    print "$line: " . $agent->getVendor() . "\n";
    ++$line;
    print "$line: " . $agent->getSeries() . "\n";
    if (count($data) == 8) {
        foreach ($data[7] as $key2 => $value2) {
            ++$line;
            print "$line: " . "Testing $key2 ...\n";
            switch ($key2) {
            case 'status':
                ++$line;
                print "$line: " . $agent->getStatus() . "\n";
                break;
            case 'serial_number':
                ++$line;
                print "$line: " . $agent->getSerialNumber() . "\n";
                break;
            case 'card_id':
                ++$line;
                print "$line: " . $agent->getCardID() . "\n";
                break;
            case 'bandwidth':
                ++$line;
                print "$line: " . $agent->getBandwidth() . "\n";
                break;
            case 'comment':
                ++$line;
                print "$line: " . $agent->getComment() . "\n";
                break;
            case 'is_gps':
                ++$line;
                print "$line: " . $agent->isGPS() . "\n";
                break;
            }
        }
    }
}

foreach ($test_agents as $value) {
    $_SERVER['HTTP_USER_AGENT'] = $value;
    $agent = &Net_UserAgent_Mobile::factory();
    ++$line;
    print "$line: " . is_object($agent) . "\n";
    ++$line;
    print "$line: " . get_parent_class($agent) . "\n";
    ++$line;
    print "$line: " . get_class($agent) . "\n";
    ++$line;
    print "$line: " . $agent->getName() . "\n";
    ++$line;
    print "$line: " . $agent->isDoCoMo() . "\n";
    ++$line;
    print "$line: " . $agent->isJPhone() . "\n";
    ++$line;
    print "$line: " . $agent->isEZweb() . "\n";
}

foreach ($test_error_agents as $value) {
    $_SERVER['HTTP_USER_AGENT'] = $value;
    $agent = &Net_UserAgent_Mobile::factory();
    ++$line;
    print "$line: " . is_object($agent) . "\n";
    ++$line;
    print "$line: " . get_class($agent) . "\n";
    if (Net_UserAgent_Mobile::isError($agent)) {
        ++$line;
        print "$line: " . $agent->getMessage() . "\n";
    }
}
?>
--POST--
--GET--
--EXPECT--
1: Testing DoCoMo ...
2: 1
3: net_useragent_mobile_common
4: net_useragent_mobile_docomo
5: 1
6: 
7: 
8: DoCoMo
9: DoCoMo/1.0/D501i
10: 1.0
11: 1.0
12: D501i
13: 5
14: 
15: D
16: 501i
17: 1
18: net_useragent_mobile_common
19: net_useragent_mobile_docomo
20: 1
21: 
22: 
23: DoCoMo
24: DoCoMo/1.0/D502i
25: 1.0
26: 2.0
27: D502i
28: 5
29: 
30: D
31: 502i
32: 1
33: net_useragent_mobile_common
34: net_useragent_mobile_docomo
35: 1
36: 
37: 
38: DoCoMo
39: DoCoMo/1.0/D502i/c10
40: 1.0
41: 2.0
42: D502i
43: 10
44: 
45: D
46: 502i
47: 1
48: net_useragent_mobile_common
49: net_useragent_mobile_docomo
50: 1
51: 
52: 
53: DoCoMo
54: DoCoMo/1.0/D210i/c10
55: 1.0
56: 3.0
57: D210i
58: 10
59: 
60: D
61: 210i
62: 1
63: net_useragent_mobile_common
64: net_useragent_mobile_docomo
65: 1
66: 
67: 
68: DoCoMo
69: DoCoMo/1.0/SO503i/c10
70: 1.0
71: 3.0
72: SO503i
73: 10
74: 
75: SO
76: 503i
77: 1
78: net_useragent_mobile_common
79: net_useragent_mobile_docomo
80: 1
81: 
82: 
83: DoCoMo
84: DoCoMo/1.0/D211i/c10
85: 1.0
86: 3.0
87: D211i
88: 10
89: 
90: D
91: 211i
92: 1
93: net_useragent_mobile_common
94: net_useragent_mobile_docomo
95: 1
96: 
97: 
98: DoCoMo
99: DoCoMo/1.0/SH251i/c10
100: 1.0
101: 3.0
102: SH251i
103: 10
104: 
105: SH
106: 251i
107: 1
108: net_useragent_mobile_common
109: net_useragent_mobile_docomo
110: 1
111: 
112: 
113: DoCoMo
114: DoCoMo/1.0/R692i/c10
115: 1.0
116: 3.0
117: R692i
118: 10
119: 
120: R
121: 692i
122: 1
123: net_useragent_mobile_common
124: net_useragent_mobile_docomo
125: 1
126: 
127: 
128: DoCoMo
129: DoCoMo/2.0 P2101V(c100)
130: 2.0
131: 3.0
132: P2101V
133: 100
134: 1
135: P
136: FOMA
137: 1
138: net_useragent_mobile_common
139: net_useragent_mobile_docomo
140: 1
141: 
142: 
143: DoCoMo
144: DoCoMo/2.0 N2001(c10)
145: 2.0
146: 3.0
147: N2001
148: 10
149: 1
150: N
151: FOMA
152: 1
153: net_useragent_mobile_common
154: net_useragent_mobile_docomo
155: 1
156: 
157: 
158: DoCoMo
159: DoCoMo/2.0 N2002(c100)
160: 2.0
161: 3.0
162: N2002
163: 100
164: 1
165: N
166: FOMA
167: 1
168: net_useragent_mobile_common
169: net_useragent_mobile_docomo
170: 1
171: 
172: 
173: DoCoMo
174: DoCoMo/2.0 D2101V(c100)
175: 2.0
176: 3.0
177: D2101V
178: 100
179: 1
180: D
181: FOMA
182: 1
183: net_useragent_mobile_common
184: net_useragent_mobile_docomo
185: 1
186: 
187: 
188: DoCoMo
189: DoCoMo/2.0 P2002(c100)
190: 2.0
191: 3.0
192: P2002
193: 100
194: 1
195: P
196: FOMA
197: 1
198: net_useragent_mobile_common
199: net_useragent_mobile_docomo
200: 1
201: 
202: 
203: DoCoMo
204: DoCoMo/2.0 MST_v_SH2101V(c100)
205: 2.0
206: 3.0
207: SH2101V
208: 100
209: 1
210: SH
211: FOMA
212: 1
213: net_useragent_mobile_common
214: net_useragent_mobile_docomo
215: 1
216: 
217: 
218: DoCoMo
219: DoCoMo/2.0 T2101V(c100)
220: 2.0
221: 3.0
222: T2101V
223: 100
224: 1
225: T
226: FOMA
227: 1
228: net_useragent_mobile_common
229: net_useragent_mobile_docomo
230: 1
231: 
232: 
233: DoCoMo
234: DoCoMo/1.0/D504i/c10
235: 1.0
236: 4.0
237: D504i
238: 10
239: 
240: D
241: 504i
242: 1
243: net_useragent_mobile_common
244: net_useragent_mobile_docomo
245: 1
246: 
247: 
248: DoCoMo
249: DoCoMo/1.0/D504i/c30/TD
250: 1.0
251: 4.0
252: D504i
253: 30
254: 
255: D
256: 504i
257: Testing status ...
258: TD
259: 1
260: net_useragent_mobile_common
261: net_useragent_mobile_docomo
262: 1
263: 
264: 
265: DoCoMo
266: DoCoMo/1.0/D504i/c10/TJ
267: 1.0
268: 4.0
269: D504i
270: 10
271: 
272: D
273: 504i
274: Testing status ...
275: TJ
276: 1
277: net_useragent_mobile_common
278: net_useragent_mobile_docomo
279: 1
280: 
281: 
282: DoCoMo
283: DoCoMo/1.0/F504i/c10/TB
284: 1.0
285: 4.0
286: F504i
287: 10
288: 
289: F
290: 504i
291: Testing status ...
292: TB
293: 1
294: net_useragent_mobile_common
295: net_useragent_mobile_docomo
296: 1
297: 
298: 
299: DoCoMo
300: DoCoMo/1.0/D251i/c10
301: 1.0
302: 4.0
303: D251i
304: 10
305: 
306: D
307: 251i
308: 1
309: net_useragent_mobile_common
310: net_useragent_mobile_docomo
311: 1
312: 
313: 
314: DoCoMo
315: DoCoMo/1.0/F251i/c10/TB
316: 1.0
317: 4.0
318: F251i
319: 10
320: 
321: F
322: 251i
323: Testing status ...
324: TB
325: 1
326: net_useragent_mobile_common
327: net_useragent_mobile_docomo
328: 1
329: 
330: 
331: DoCoMo
332: DoCoMo/1.0/F671iS/c10/TB
333: 1.0
334: 4.0
335: F671iS
336: 10
337: 
338: F
339: 671i
340: Testing status ...
341: TB
342: 1
343: net_useragent_mobile_common
344: net_useragent_mobile_docomo
345: 1
346: 
347: 
348: DoCoMo
349: DoCoMo/1.0/P503i/c10/serNMABH200331
350: 1.0
351: 3.0
352: P503i
353: 10
354: 
355: P
356: 503i
357: Testing serial_number ...
358: NMABH200331
359: 1
360: net_useragent_mobile_common
361: net_useragent_mobile_docomo
362: 1
363: 
364: 
365: DoCoMo
366: DoCoMo/2.0 N2001(c10;ser0123456789abcde;icc01234567890123456789)
367: 2.0
368: 3.0
369: N2001
370: 10
371: 1
372: N
373: FOMA
374: Testing serial_number ...
375: 0123456789abcde
376: Testing card_id ...
377: 01234567890123456789
378: 1
379: net_useragent_mobile_common
380: net_useragent_mobile_docomo
381: 1
382: 
383: 
384: DoCoMo
385: DoCoMo/1.0/eggy/c300/s32/kPHS-K
386: 1.0
387: 3.2
388: eggy
389: 300
390: 
391: 
392: 
393: Testing bandwidth ...
394: 32
395: 1
396: net_useragent_mobile_common
397: net_useragent_mobile_docomo
398: 1
399: 
400: 
401: DoCoMo
402: DoCoMo/1.0/P751v/c100/s64/kPHS-K
403: 1.0
404: 3.2
405: P751v
406: 100
407: 
408: P
409: 
410: Testing bandwidth ...
411: 64
412: 1
413: net_useragent_mobile_common
414: net_useragent_mobile_docomo
415: 1
416: 
417: 
418: DoCoMo
419: DoCoMo/1.0/P209is (Google CHTML Proxy/1.0)
420: 1.0
421: 2.0
422: P209is
423: 5
424: 
425: P
426: 209i
427: Testing comment ...
428: Google CHTML Proxy/1.0
429: 1
430: net_useragent_mobile_common
431: net_useragent_mobile_docomo
432: 1
433: 
434: 
435: DoCoMo
436: DoCoMo/1.0/F212i/c10/TB
437: 1.0
438: 4.0
439: F212i
440: 10
441: 
442: F
443: 212i
444: Testing status ...
445: TB
446: 1
447: net_useragent_mobile_common
448: net_useragent_mobile_docomo
449: 1
450: 
451: 
452: DoCoMo
453: DoCoMo/2.0 F2051(c100;TB)
454: 2.0
455: 4.0
456: F2051
457: 100
458: 1
459: F
460: FOMA
461: Testing status ...
462: TB
463: 1
464: net_useragent_mobile_common
465: net_useragent_mobile_docomo
466: 1
467: 
468: 
469: DoCoMo
470: DoCoMo/2.0 N2051(c100;TB)
471: 2.0
472: 4.0
473: N2051
474: 100
475: 1
476: N
477: FOMA
478: Testing status ...
479: TB
480: 1
481: net_useragent_mobile_common
482: net_useragent_mobile_docomo
483: 1
484: 
485: 
486: DoCoMo
487: DoCoMo/2.0 P2102V(c100;TB)
488: 2.0
489: 4.0
490: P2102V
491: 100
492: 1
493: P
494: FOMA
495: Testing status ...
496: TB
497: 1
498: net_useragent_mobile_common
499: net_useragent_mobile_docomo
500: 1
501: 
502: 
503: DoCoMo
504: DoCoMo/1.0/N211iS/c10
505: 1.0
506: 3.0
507: N211iS
508: 10
509: 
510: N
511: 211i
512: 1
513: net_useragent_mobile_common
514: net_useragent_mobile_docomo
515: 1
516: 
517: 
518: DoCoMo
519: DoCoMo/1.0/P211iS/c10
520: 1.0
521: 3.0
522: P211iS
523: 10
524: 
525: P
526: 211i
527: 1
528: net_useragent_mobile_common
529: net_useragent_mobile_docomo
530: 1
531: 
532: 
533: DoCoMo
534: DoCoMo/1.0/N251iS/c10/TB
535: 1.0
536: 4.0
537: N251iS
538: 10
539: 
540: N
541: 251i
542: Testing status ...
543: TB
544: 1
545: net_useragent_mobile_common
546: net_useragent_mobile_docomo
547: 1
548: 
549: 
550: DoCoMo
551: DoCoMo/1.0/F661i/c10/TB
552: 1.0
553: 4.0
554: F661i
555: 10
556: 
557: F
558: 661i
559: Testing status ...
560: TB
561: Testing is_gps ...
562: 1
563: 1
564: net_useragent_mobile_common
565: net_useragent_mobile_docomo
566: 1
567: 
568: 
569: DoCoMo
570: DoCoMo/1.0/D505i/c20/TC/W20H10
571: 1.0
572: 5.0
573: D505i
574: 20
575: 
576: D
577: 505i
578: Testing status ...
579: TC
580: 1
581: net_useragent_mobile_common
582: net_useragent_mobile_docomo
583: DoCoMo
584: 1
585: 
586: 
587: 1
588: net_useragent_mobile_common
589: net_useragent_mobile_docomo
590: DoCoMo
591: 1
592: 
593: 
594: 1
595: net_useragent_mobile_common
596: net_useragent_mobile_docomo
597: DoCoMo
598: 1
599: 
600: 
601: 1
602: net_useragent_mobile_common
603: net_useragent_mobile_docomo
604: DoCoMo
605: 1
606: 
607: 
608: 1
609: net_useragent_mobile_common
610: net_useragent_mobile_docomo
611: DoCoMo
612: 1
613: 
614: 
615: 1
616: net_useragent_mobile_common
617: net_useragent_mobile_docomo
618: DoCoMo
619: 1
620: 
621: 
622: 1
623: net_useragent_mobile_common
624: net_useragent_mobile_docomo
625: DoCoMo
626: 1
627: 
628: 
629: 1
630: net_useragent_mobile_common
631: net_useragent_mobile_docomo
632: DoCoMo
633: 1
634: 
635: 
636: 1
637: net_useragent_mobile_common
638: net_useragent_mobile_docomo
639: DoCoMo
640: 1
641: 
642: 
643: 1
644: net_useragent_mobile_common
645: net_useragent_mobile_docomo
646: DoCoMo
647: 1
648: 
649: 
650: 1
651: net_useragent_mobile_common
652: net_useragent_mobile_docomo
653: DoCoMo
654: 1
655: 
656: 
657: 1
658: net_useragent_mobile_common
659: net_useragent_mobile_docomo
660: DoCoMo
661: 1
662: 
663: 
664: 1
665: net_useragent_mobile_common
666: net_useragent_mobile_docomo
667: DoCoMo
668: 1
669: 
670: 
671: 1
672: net_useragent_mobile_common
673: net_useragent_mobile_docomo
674: DoCoMo
675: 1
676: 
677: 
678: 1
679: net_useragent_mobile_common
680: net_useragent_mobile_docomo
681: DoCoMo
682: 1
683: 
684: 
685: 1
686: net_useragent_mobile_common
687: net_useragent_mobile_docomo
688: DoCoMo
689: 1
690: 
691: 
692: 1
693: net_useragent_mobile_common
694: net_useragent_mobile_docomo
695: DoCoMo
696: 1
697: 
698: 
699: 1
700: net_useragent_mobile_common
701: net_useragent_mobile_docomo
702: DoCoMo
703: 1
704: 
705: 
706: 1
707: net_useragent_mobile_common
708: net_useragent_mobile_docomo
709: DoCoMo
710: 1
711: 
712: 
713: 1
714: net_useragent_mobile_common
715: net_useragent_mobile_docomo
716: DoCoMo
717: 1
718: 
719: 
720: 1
721: net_useragent_mobile_common
722: net_useragent_mobile_docomo
723: DoCoMo
724: 1
725: 
726: 
727: 1
728: net_useragent_mobile_common
729: net_useragent_mobile_docomo
730: DoCoMo
731: 1
732: 
733: 
734: 1
735: net_useragent_mobile_common
736: net_useragent_mobile_docomo
737: DoCoMo
738: 1
739: 
740: 
741: 1
742: net_useragent_mobile_common
743: net_useragent_mobile_docomo
744: DoCoMo
745: 1
746: 
747: 
748: 1
749: net_useragent_mobile_common
750: net_useragent_mobile_docomo
751: DoCoMo
752: 1
753: 
754: 
755: 1
756: net_useragent_mobile_common
757: net_useragent_mobile_docomo
758: DoCoMo
759: 1
760: 
761: 
762: 1
763: net_useragent_mobile_common
764: net_useragent_mobile_docomo
765: DoCoMo
766: 1
767: 
768: 
769: 1
770: net_useragent_mobile_common
771: net_useragent_mobile_docomo
772: DoCoMo
773: 1
774: 
775: 
776: 1
777: net_useragent_mobile_common
778: net_useragent_mobile_docomo
779: DoCoMo
780: 1
781: 
782: 
783: 1
784: net_useragent_mobile_common
785: net_useragent_mobile_docomo
786: DoCoMo
787: 1
788: 
789: 
790: 1
791: net_useragent_mobile_common
792: net_useragent_mobile_docomo
793: DoCoMo
794: 1
795: 
796: 
797: 1
798: net_useragent_mobile_common
799: net_useragent_mobile_docomo
800: DoCoMo
801: 1
802: 
803: 
804: 1
805: net_useragent_mobile_common
806: net_useragent_mobile_docomo
807: DoCoMo
808: 1
809: 
810: 
811: 1
812: net_useragent_mobile_common
813: net_useragent_mobile_docomo
814: DoCoMo
815: 1
816: 
817: 
818: 1
819: net_useragent_mobile_common
820: net_useragent_mobile_docomo
821: DoCoMo
822: 1
823: 
824: 
825: 1
826: net_useragent_mobile_common
827: net_useragent_mobile_docomo
828: DoCoMo
829: 1
830: 
831: 
832: 1
833: net_useragent_mobile_common
834: net_useragent_mobile_docomo
835: DoCoMo
836: 1
837: 
838: 
839: 1
840: net_useragent_mobile_common
841: net_useragent_mobile_docomo
842: DoCoMo
843: 1
844: 
845: 
846: 1
847: net_useragent_mobile_common
848: net_useragent_mobile_docomo
849: DoCoMo
850: 1
851: 
852: 
853: 1
854: net_useragent_mobile_common
855: net_useragent_mobile_docomo
856: DoCoMo
857: 1
858: 
859: 
860: 1
861: net_useragent_mobile_common
862: net_useragent_mobile_docomo
863: DoCoMo
864: 1
865: 
866: 
867: 1
868: net_useragent_mobile_common
869: net_useragent_mobile_docomo
870: DoCoMo
871: 1
872: 
873: 
874: 1
875: net_useragent_mobile_common
876: net_useragent_mobile_docomo
877: DoCoMo
878: 1
879: 
880: 
881: 1
882: net_useragent_mobile_common
883: net_useragent_mobile_docomo
884: DoCoMo
885: 1
886: 
887: 
888: 1
889: net_useragent_mobile_common
890: net_useragent_mobile_docomo
891: DoCoMo
892: 1
893: 
894: 
895: 1
896: net_useragent_mobile_common
897: net_useragent_mobile_docomo
898: DoCoMo
899: 1
900: 
901: 
902: 1
903: net_useragent_mobile_common
904: net_useragent_mobile_docomo
905: DoCoMo
906: 1
907: 
908: 
909: 1
910: net_useragent_mobile_common
911: net_useragent_mobile_docomo
912: DoCoMo
913: 1
914: 
915: 
916: 1
917: net_useragent_mobile_common
918: net_useragent_mobile_docomo
919: DoCoMo
920: 1
921: 
922: 
923: 1
924: net_useragent_mobile_common
925: net_useragent_mobile_docomo
926: DoCoMo
927: 1
928: 
929: 
930: 1
931: net_useragent_mobile_common
932: net_useragent_mobile_docomo
933: DoCoMo
934: 1
935: 
936: 
937: 1
938: net_useragent_mobile_common
939: net_useragent_mobile_docomo
940: DoCoMo
941: 1
942: 
943: 
944: 1
945: net_useragent_mobile_common
946: net_useragent_mobile_docomo
947: DoCoMo
948: 1
949: 
950: 
951: 1
952: net_useragent_mobile_common
953: net_useragent_mobile_docomo
954: DoCoMo
955: 1
956: 
957: 
958: 1
959: net_useragent_mobile_common
960: net_useragent_mobile_docomo
961: DoCoMo
962: 1
963: 
964: 
965: 1
966: net_useragent_mobile_common
967: net_useragent_mobile_docomo
968: DoCoMo
969: 1
970: 
971: 
972: 1
973: net_useragent_mobile_common
974: net_useragent_mobile_docomo
975: DoCoMo
976: 1
977: 
978: 
979: 1
980: net_useragent_mobile_common
981: net_useragent_mobile_docomo
982: DoCoMo
983: 1
984: 
985: 
986: 1
987: net_useragent_mobile_common
988: net_useragent_mobile_docomo
989: DoCoMo
990: 1
991: 
992: 
993: 1
994: net_useragent_mobile_common
995: net_useragent_mobile_docomo
996: DoCoMo
997: 1
998: 
999: 
1000: 1
1001: net_useragent_mobile_common
1002: net_useragent_mobile_docomo
1003: DoCoMo
1004: 1
1005: 
1006: 
1007: 1
1008: net_useragent_mobile_common
1009: net_useragent_mobile_docomo
1010: DoCoMo
1011: 1
1012: 
1013: 
1014: 1
1015: net_useragent_mobile_common
1016: net_useragent_mobile_docomo
1017: DoCoMo
1018: 1
1019: 
1020: 
1021: 1
1022: net_useragent_mobile_common
1023: net_useragent_mobile_docomo
1024: DoCoMo
1025: 1
1026: 
1027: 
1028: 1
1029: net_useragent_mobile_common
1030: net_useragent_mobile_docomo
1031: DoCoMo
1032: 1
1033: 
1034: 
1035: 1
1036: net_useragent_mobile_common
1037: net_useragent_mobile_docomo
1038: DoCoMo
1039: 1
1040: 
1041: 
1042: 1
1043: net_useragent_mobile_common
1044: net_useragent_mobile_docomo
1045: DoCoMo
1046: 1
1047: 
1048: 
1049: 1
1050: net_useragent_mobile_common
1051: net_useragent_mobile_docomo
1052: DoCoMo
1053: 1
1054: 
1055: 
1056: 1
1057: net_useragent_mobile_common
1058: net_useragent_mobile_docomo
1059: DoCoMo
1060: 1
1061: 
1062: 
1063: 1
1064: net_useragent_mobile_common
1065: net_useragent_mobile_docomo
1066: DoCoMo
1067: 1
1068: 
1069: 
1070: 1
1071: net_useragent_mobile_common
1072: net_useragent_mobile_docomo
1073: DoCoMo
1074: 1
1075: 
1076: 
1077: 1
1078: net_useragent_mobile_common
1079: net_useragent_mobile_docomo
1080: DoCoMo
1081: 1
1082: 
1083: 
1084: 1
1085: net_useragent_mobile_common
1086: net_useragent_mobile_docomo
1087: DoCoMo
1088: 1
1089: 
1090: 
1091: 1
1092: net_useragent_mobile_common
1093: net_useragent_mobile_docomo
1094: DoCoMo
1095: 1
1096: 
1097: 
1098: 1
1099: net_useragent_mobile_common
1100: net_useragent_mobile_docomo
1101: DoCoMo
1102: 1
1103: 
1104: 
1105: 1
1106: net_useragent_mobile_common
1107: net_useragent_mobile_docomo
1108: DoCoMo
1109: 1
1110: 
1111: 
1112: 1
1113: net_useragent_mobile_common
1114: net_useragent_mobile_docomo
1115: DoCoMo
1116: 1
1117: 
1118: 
1119: 1
1120: net_useragent_mobile_common
1121: net_useragent_mobile_docomo
1122: DoCoMo
1123: 1
1124: 
1125: 
1126: 1
1127: net_useragent_mobile_common
1128: net_useragent_mobile_docomo
1129: DoCoMo
1130: 1
1131: 
1132: 
1133: 1
1134: net_useragent_mobile_common
1135: net_useragent_mobile_docomo
1136: DoCoMo
1137: 1
1138: 
1139: 
1140: 1
1141: net_useragent_mobile_common
1142: net_useragent_mobile_docomo
1143: DoCoMo
1144: 1
1145: 
1146: 
1147: 1
1148: net_useragent_mobile_common
1149: net_useragent_mobile_docomo
1150: DoCoMo
1151: 1
1152: 
1153: 
1154: 1
1155: net_useragent_mobile_common
1156: net_useragent_mobile_docomo
1157: DoCoMo
1158: 1
1159: 
1160: 
1161: 1
1162: net_useragent_mobile_common
1163: net_useragent_mobile_docomo
1164: DoCoMo
1165: 1
1166: 
1167: 
1168: 1
1169: net_useragent_mobile_common
1170: net_useragent_mobile_docomo
1171: DoCoMo
1172: 1
1173: 
1174: 
1175: 1
1176: net_useragent_mobile_common
1177: net_useragent_mobile_docomo
1178: DoCoMo
1179: 1
1180: 
1181: 
1182: 1
1183: net_useragent_mobile_common
1184: net_useragent_mobile_docomo
1185: DoCoMo
1186: 1
1187: 
1188: 
1189: 1
1190: net_useragent_mobile_common
1191: net_useragent_mobile_docomo
1192: DoCoMo
1193: 1
1194: 
1195: 
1196: 1
1197: net_useragent_mobile_common
1198: net_useragent_mobile_docomo
1199: DoCoMo
1200: 1
1201: 
1202: 
1203: 1
1204: net_useragent_mobile_common
1205: net_useragent_mobile_docomo
1206: DoCoMo
1207: 1
1208: 
1209: 
1210: 1
1211: net_useragent_mobile_common
1212: net_useragent_mobile_docomo
1213: DoCoMo
1214: 1
1215: 
1216: 
1217: 1
1218: net_useragent_mobile_common
1219: net_useragent_mobile_docomo
1220: DoCoMo
1221: 1
1222: 
1223: 
1224: 1
1225: net_useragent_mobile_common
1226: net_useragent_mobile_docomo
1227: DoCoMo
1228: 1
1229: 
1230: 
1231: 1
1232: net_useragent_mobile_common
1233: net_useragent_mobile_docomo
1234: DoCoMo
1235: 1
1236: 
1237: 
1238: 1
1239: net_useragent_mobile_common
1240: net_useragent_mobile_docomo
1241: DoCoMo
1242: 1
1243: 
1244: 
1245: 1
1246: net_useragent_mobile_common
1247: net_useragent_mobile_docomo
1248: DoCoMo
1249: 1
1250: 
1251: 
1252: 1
1253: net_useragent_mobile_common
1254: net_useragent_mobile_docomo
1255: DoCoMo
1256: 1
1257: 
1258: 
1259: 1
1260: net_useragent_mobile_common
1261: net_useragent_mobile_docomo
1262: DoCoMo
1263: 1
1264: 
1265: 
1266: 1
1267: net_useragent_mobile_common
1268: net_useragent_mobile_docomo
1269: DoCoMo
1270: 1
1271: 
1272: 
1273: 1
1274: net_useragent_mobile_common
1275: net_useragent_mobile_docomo
1276: DoCoMo
1277: 1
1278: 
1279: 
1280: 1
1281: net_useragent_mobile_common
1282: net_useragent_mobile_docomo
1283: DoCoMo
1284: 1
1285: 
1286: 
1287: 1
1288: net_useragent_mobile_common
1289: net_useragent_mobile_docomo
1290: DoCoMo
1291: 1
1292: 
1293: 
1294: 1
1295: net_useragent_mobile_common
1296: net_useragent_mobile_docomo
1297: DoCoMo
1298: 1
1299: 
1300: 
1301: 1
1302: net_useragent_mobile_common
1303: net_useragent_mobile_docomo
1304: DoCoMo
1305: 1
1306: 
1307: 
1308: 1
1309: net_useragent_mobile_common
1310: net_useragent_mobile_docomo
1311: DoCoMo
1312: 1
1313: 
1314: 
1315: 1
1316: net_useragent_mobile_common
1317: net_useragent_mobile_docomo
1318: DoCoMo
1319: 1
1320: 
1321: 
1322: 1
1323: net_useragent_mobile_common
1324: net_useragent_mobile_docomo
1325: DoCoMo
1326: 1
1327: 
1328: 
1329: 1
1330: net_useragent_mobile_common
1331: net_useragent_mobile_docomo
1332: DoCoMo
1333: 1
1334: 
1335: 
1336: 1
1337: net_useragent_mobile_common
1338: net_useragent_mobile_docomo
1339: DoCoMo
1340: 1
1341: 
1342: 
1343: 1
1344: net_useragent_mobile_common
1345: net_useragent_mobile_docomo
1346: DoCoMo
1347: 1
1348: 
1349: 
1350: 1
1351: net_useragent_mobile_common
1352: net_useragent_mobile_docomo
1353: DoCoMo
1354: 1
1355: 
1356: 
1357: 1
1358: net_useragent_mobile_common
1359: net_useragent_mobile_docomo
1360: DoCoMo
1361: 1
1362: 
1363: 
1364: 1
1365: net_useragent_mobile_common
1366: net_useragent_mobile_docomo
1367: DoCoMo
1368: 1
1369: 
1370: 
1371: 1
1372: net_useragent_mobile_common
1373: net_useragent_mobile_docomo
1374: DoCoMo
1375: 1
1376: 
1377: 
1378: 1
1379: net_useragent_mobile_common
1380: net_useragent_mobile_docomo
1381: DoCoMo
1382: 1
1383: 
1384: 
1385: 1
1386: net_useragent_mobile_common
1387: net_useragent_mobile_docomo
1388: DoCoMo
1389: 1
1390: 
1391: 
1392: 1
1393: net_useragent_mobile_common
1394: net_useragent_mobile_docomo
1395: DoCoMo
1396: 1
1397: 
1398: 
1399: 1
1400: net_useragent_mobile_common
1401: net_useragent_mobile_docomo
1402: DoCoMo
1403: 1
1404: 
1405: 
1406: 1
1407: net_useragent_mobile_common
1408: net_useragent_mobile_docomo
1409: DoCoMo
1410: 1
1411: 
1412: 
1413: 1
1414: net_useragent_mobile_common
1415: net_useragent_mobile_docomo
1416: DoCoMo
1417: 1
1418: 
1419: 
1420: 1
1421: net_useragent_mobile_common
1422: net_useragent_mobile_docomo
1423: DoCoMo
1424: 1
1425: 
1426: 
1427: 1
1428: net_useragent_mobile_common
1429: net_useragent_mobile_docomo
1430: DoCoMo
1431: 1
1432: 
1433: 
1434: 1
1435: net_useragent_mobile_common
1436: net_useragent_mobile_docomo
1437: DoCoMo
1438: 1
1439: 
1440: 
1441: 1
1442: net_useragent_mobile_common
1443: net_useragent_mobile_docomo
1444: DoCoMo
1445: 1
1446: 
1447: 
1448: 1
1449: net_useragent_mobile_common
1450: net_useragent_mobile_docomo
1451: DoCoMo
1452: 1
1453: 
1454: 
1455: 1
1456: net_useragent_mobile_common
1457: net_useragent_mobile_docomo
1458: DoCoMo
1459: 1
1460: 
1461: 
1462: 1
1463: net_useragent_mobile_common
1464: net_useragent_mobile_docomo
1465: DoCoMo
1466: 1
1467: 
1468: 
1469: 1
1470: net_useragent_mobile_common
1471: net_useragent_mobile_docomo
1472: DoCoMo
1473: 1
1474: 
1475: 
1476: 1
1477: net_useragent_mobile_common
1478: net_useragent_mobile_docomo
1479: DoCoMo
1480: 1
1481: 
1482: 
1483: 1
1484: net_useragent_mobile_common
1485: net_useragent_mobile_docomo
1486: DoCoMo
1487: 1
1488: 
1489: 
1490: 1
1491: net_useragent_mobile_common
1492: net_useragent_mobile_docomo
1493: DoCoMo
1494: 1
1495: 
1496: 
1497: 1
1498: net_useragent_mobile_common
1499: net_useragent_mobile_docomo
1500: DoCoMo
1501: 1
1502: 
1503: 
1504: 1
1505: net_useragent_mobile_common
1506: net_useragent_mobile_docomo
1507: DoCoMo
1508: 1
1509: 
1510: 
1511: 1
1512: net_useragent_mobile_common
1513: net_useragent_mobile_docomo
1514: DoCoMo
1515: 1
1516: 
1517: 
1518: 1
1519: net_useragent_mobile_common
1520: net_useragent_mobile_docomo
1521: DoCoMo
1522: 1
1523: 
1524: 
1525: 1
1526: net_useragent_mobile_common
1527: net_useragent_mobile_docomo
1528: DoCoMo
1529: 1
1530: 
1531: 
1532: 1
1533: net_useragent_mobile_common
1534: net_useragent_mobile_docomo
1535: DoCoMo
1536: 1
1537: 
1538: 
1539: 1
1540: net_useragent_mobile_common
1541: net_useragent_mobile_docomo
1542: DoCoMo
1543: 1
1544: 
1545: 
1546: 1
1547: net_useragent_mobile_common
1548: net_useragent_mobile_docomo
1549: DoCoMo
1550: 1
1551: 
1552: 
1553: 1
1554: net_useragent_mobile_common
1555: net_useragent_mobile_docomo
1556: DoCoMo
1557: 1
1558: 
1559: 
1560: 1
1561: net_useragent_mobile_common
1562: net_useragent_mobile_docomo
1563: DoCoMo
1564: 1
1565: 
1566: 
1567: 1
1568: net_useragent_mobile_common
1569: net_useragent_mobile_docomo
1570: DoCoMo
1571: 1
1572: 
1573: 
1574: 1
1575: net_useragent_mobile_common
1576: net_useragent_mobile_docomo
1577: DoCoMo
1578: 1
1579: 
1580: 
1581: 1
1582: net_useragent_mobile_common
1583: net_useragent_mobile_docomo
1584: DoCoMo
1585: 1
1586: 
1587: 
1588: 1
1589: net_useragent_mobile_common
1590: net_useragent_mobile_docomo
1591: DoCoMo
1592: 1
1593: 
1594: 
1595: 1
1596: net_useragent_mobile_common
1597: net_useragent_mobile_docomo
1598: DoCoMo
1599: 1
1600: 
1601: 
1602: 1
1603: net_useragent_mobile_error
1604: Net_UserAgent_Mobile Error: no match
1605: 1
1606: net_useragent_mobile_error
1607: Net_UserAgent_Mobile Error: no match
1608: 1
1609: net_useragent_mobile_error
1610: Net_UserAgent_Mobile Error: no match
