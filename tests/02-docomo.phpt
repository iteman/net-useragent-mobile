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
               array('DoCoMo/1.0/F661i/c10/TB', '1.0', '4.0', 'F661i', 10, false, 'F', '661i', array('status' => 'TB'))
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
                     'DoCoMo/1.0/F661i/c10/TB'
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
561: 1
562: net_useragent_mobile_common
563: net_useragent_mobile_docomo
564: DoCoMo
565: 1
566: 
567: 
568: 1
569: net_useragent_mobile_common
570: net_useragent_mobile_docomo
571: DoCoMo
572: 1
573: 
574: 
575: 1
576: net_useragent_mobile_common
577: net_useragent_mobile_docomo
578: DoCoMo
579: 1
580: 
581: 
582: 1
583: net_useragent_mobile_common
584: net_useragent_mobile_docomo
585: DoCoMo
586: 1
587: 
588: 
589: 1
590: net_useragent_mobile_common
591: net_useragent_mobile_docomo
592: DoCoMo
593: 1
594: 
595: 
596: 1
597: net_useragent_mobile_common
598: net_useragent_mobile_docomo
599: DoCoMo
600: 1
601: 
602: 
603: 1
604: net_useragent_mobile_common
605: net_useragent_mobile_docomo
606: DoCoMo
607: 1
608: 
609: 
610: 1
611: net_useragent_mobile_common
612: net_useragent_mobile_docomo
613: DoCoMo
614: 1
615: 
616: 
617: 1
618: net_useragent_mobile_common
619: net_useragent_mobile_docomo
620: DoCoMo
621: 1
622: 
623: 
624: 1
625: net_useragent_mobile_common
626: net_useragent_mobile_docomo
627: DoCoMo
628: 1
629: 
630: 
631: 1
632: net_useragent_mobile_common
633: net_useragent_mobile_docomo
634: DoCoMo
635: 1
636: 
637: 
638: 1
639: net_useragent_mobile_common
640: net_useragent_mobile_docomo
641: DoCoMo
642: 1
643: 
644: 
645: 1
646: net_useragent_mobile_common
647: net_useragent_mobile_docomo
648: DoCoMo
649: 1
650: 
651: 
652: 1
653: net_useragent_mobile_common
654: net_useragent_mobile_docomo
655: DoCoMo
656: 1
657: 
658: 
659: 1
660: net_useragent_mobile_common
661: net_useragent_mobile_docomo
662: DoCoMo
663: 1
664: 
665: 
666: 1
667: net_useragent_mobile_common
668: net_useragent_mobile_docomo
669: DoCoMo
670: 1
671: 
672: 
673: 1
674: net_useragent_mobile_common
675: net_useragent_mobile_docomo
676: DoCoMo
677: 1
678: 
679: 
680: 1
681: net_useragent_mobile_common
682: net_useragent_mobile_docomo
683: DoCoMo
684: 1
685: 
686: 
687: 1
688: net_useragent_mobile_common
689: net_useragent_mobile_docomo
690: DoCoMo
691: 1
692: 
693: 
694: 1
695: net_useragent_mobile_common
696: net_useragent_mobile_docomo
697: DoCoMo
698: 1
699: 
700: 
701: 1
702: net_useragent_mobile_common
703: net_useragent_mobile_docomo
704: DoCoMo
705: 1
706: 
707: 
708: 1
709: net_useragent_mobile_common
710: net_useragent_mobile_docomo
711: DoCoMo
712: 1
713: 
714: 
715: 1
716: net_useragent_mobile_common
717: net_useragent_mobile_docomo
718: DoCoMo
719: 1
720: 
721: 
722: 1
723: net_useragent_mobile_common
724: net_useragent_mobile_docomo
725: DoCoMo
726: 1
727: 
728: 
729: 1
730: net_useragent_mobile_common
731: net_useragent_mobile_docomo
732: DoCoMo
733: 1
734: 
735: 
736: 1
737: net_useragent_mobile_common
738: net_useragent_mobile_docomo
739: DoCoMo
740: 1
741: 
742: 
743: 1
744: net_useragent_mobile_common
745: net_useragent_mobile_docomo
746: DoCoMo
747: 1
748: 
749: 
750: 1
751: net_useragent_mobile_common
752: net_useragent_mobile_docomo
753: DoCoMo
754: 1
755: 
756: 
757: 1
758: net_useragent_mobile_common
759: net_useragent_mobile_docomo
760: DoCoMo
761: 1
762: 
763: 
764: 1
765: net_useragent_mobile_common
766: net_useragent_mobile_docomo
767: DoCoMo
768: 1
769: 
770: 
771: 1
772: net_useragent_mobile_common
773: net_useragent_mobile_docomo
774: DoCoMo
775: 1
776: 
777: 
778: 1
779: net_useragent_mobile_common
780: net_useragent_mobile_docomo
781: DoCoMo
782: 1
783: 
784: 
785: 1
786: net_useragent_mobile_common
787: net_useragent_mobile_docomo
788: DoCoMo
789: 1
790: 
791: 
792: 1
793: net_useragent_mobile_common
794: net_useragent_mobile_docomo
795: DoCoMo
796: 1
797: 
798: 
799: 1
800: net_useragent_mobile_common
801: net_useragent_mobile_docomo
802: DoCoMo
803: 1
804: 
805: 
806: 1
807: net_useragent_mobile_common
808: net_useragent_mobile_docomo
809: DoCoMo
810: 1
811: 
812: 
813: 1
814: net_useragent_mobile_common
815: net_useragent_mobile_docomo
816: DoCoMo
817: 1
818: 
819: 
820: 1
821: net_useragent_mobile_common
822: net_useragent_mobile_docomo
823: DoCoMo
824: 1
825: 
826: 
827: 1
828: net_useragent_mobile_common
829: net_useragent_mobile_docomo
830: DoCoMo
831: 1
832: 
833: 
834: 1
835: net_useragent_mobile_common
836: net_useragent_mobile_docomo
837: DoCoMo
838: 1
839: 
840: 
841: 1
842: net_useragent_mobile_common
843: net_useragent_mobile_docomo
844: DoCoMo
845: 1
846: 
847: 
848: 1
849: net_useragent_mobile_common
850: net_useragent_mobile_docomo
851: DoCoMo
852: 1
853: 
854: 
855: 1
856: net_useragent_mobile_common
857: net_useragent_mobile_docomo
858: DoCoMo
859: 1
860: 
861: 
862: 1
863: net_useragent_mobile_common
864: net_useragent_mobile_docomo
865: DoCoMo
866: 1
867: 
868: 
869: 1
870: net_useragent_mobile_common
871: net_useragent_mobile_docomo
872: DoCoMo
873: 1
874: 
875: 
876: 1
877: net_useragent_mobile_common
878: net_useragent_mobile_docomo
879: DoCoMo
880: 1
881: 
882: 
883: 1
884: net_useragent_mobile_common
885: net_useragent_mobile_docomo
886: DoCoMo
887: 1
888: 
889: 
890: 1
891: net_useragent_mobile_common
892: net_useragent_mobile_docomo
893: DoCoMo
894: 1
895: 
896: 
897: 1
898: net_useragent_mobile_common
899: net_useragent_mobile_docomo
900: DoCoMo
901: 1
902: 
903: 
904: 1
905: net_useragent_mobile_common
906: net_useragent_mobile_docomo
907: DoCoMo
908: 1
909: 
910: 
911: 1
912: net_useragent_mobile_common
913: net_useragent_mobile_docomo
914: DoCoMo
915: 1
916: 
917: 
918: 1
919: net_useragent_mobile_common
920: net_useragent_mobile_docomo
921: DoCoMo
922: 1
923: 
924: 
925: 1
926: net_useragent_mobile_common
927: net_useragent_mobile_docomo
928: DoCoMo
929: 1
930: 
931: 
932: 1
933: net_useragent_mobile_common
934: net_useragent_mobile_docomo
935: DoCoMo
936: 1
937: 
938: 
939: 1
940: net_useragent_mobile_common
941: net_useragent_mobile_docomo
942: DoCoMo
943: 1
944: 
945: 
946: 1
947: net_useragent_mobile_common
948: net_useragent_mobile_docomo
949: DoCoMo
950: 1
951: 
952: 
953: 1
954: net_useragent_mobile_common
955: net_useragent_mobile_docomo
956: DoCoMo
957: 1
958: 
959: 
960: 1
961: net_useragent_mobile_common
962: net_useragent_mobile_docomo
963: DoCoMo
964: 1
965: 
966: 
967: 1
968: net_useragent_mobile_common
969: net_useragent_mobile_docomo
970: DoCoMo
971: 1
972: 
973: 
974: 1
975: net_useragent_mobile_common
976: net_useragent_mobile_docomo
977: DoCoMo
978: 1
979: 
980: 
981: 1
982: net_useragent_mobile_common
983: net_useragent_mobile_docomo
984: DoCoMo
985: 1
986: 
987: 
988: 1
989: net_useragent_mobile_common
990: net_useragent_mobile_docomo
991: DoCoMo
992: 1
993: 
994: 
995: 1
996: net_useragent_mobile_common
997: net_useragent_mobile_docomo
998: DoCoMo
999: 1
1000: 
1001: 
1002: 1
1003: net_useragent_mobile_common
1004: net_useragent_mobile_docomo
1005: DoCoMo
1006: 1
1007: 
1008: 
1009: 1
1010: net_useragent_mobile_common
1011: net_useragent_mobile_docomo
1012: DoCoMo
1013: 1
1014: 
1015: 
1016: 1
1017: net_useragent_mobile_common
1018: net_useragent_mobile_docomo
1019: DoCoMo
1020: 1
1021: 
1022: 
1023: 1
1024: net_useragent_mobile_common
1025: net_useragent_mobile_docomo
1026: DoCoMo
1027: 1
1028: 
1029: 
1030: 1
1031: net_useragent_mobile_common
1032: net_useragent_mobile_docomo
1033: DoCoMo
1034: 1
1035: 
1036: 
1037: 1
1038: net_useragent_mobile_common
1039: net_useragent_mobile_docomo
1040: DoCoMo
1041: 1
1042: 
1043: 
1044: 1
1045: net_useragent_mobile_common
1046: net_useragent_mobile_docomo
1047: DoCoMo
1048: 1
1049: 
1050: 
1051: 1
1052: net_useragent_mobile_common
1053: net_useragent_mobile_docomo
1054: DoCoMo
1055: 1
1056: 
1057: 
1058: 1
1059: net_useragent_mobile_common
1060: net_useragent_mobile_docomo
1061: DoCoMo
1062: 1
1063: 
1064: 
1065: 1
1066: net_useragent_mobile_common
1067: net_useragent_mobile_docomo
1068: DoCoMo
1069: 1
1070: 
1071: 
1072: 1
1073: net_useragent_mobile_common
1074: net_useragent_mobile_docomo
1075: DoCoMo
1076: 1
1077: 
1078: 
1079: 1
1080: net_useragent_mobile_common
1081: net_useragent_mobile_docomo
1082: DoCoMo
1083: 1
1084: 
1085: 
1086: 1
1087: net_useragent_mobile_common
1088: net_useragent_mobile_docomo
1089: DoCoMo
1090: 1
1091: 
1092: 
1093: 1
1094: net_useragent_mobile_common
1095: net_useragent_mobile_docomo
1096: DoCoMo
1097: 1
1098: 
1099: 
1100: 1
1101: net_useragent_mobile_common
1102: net_useragent_mobile_docomo
1103: DoCoMo
1104: 1
1105: 
1106: 
1107: 1
1108: net_useragent_mobile_common
1109: net_useragent_mobile_docomo
1110: DoCoMo
1111: 1
1112: 
1113: 
1114: 1
1115: net_useragent_mobile_common
1116: net_useragent_mobile_docomo
1117: DoCoMo
1118: 1
1119: 
1120: 
1121: 1
1122: net_useragent_mobile_common
1123: net_useragent_mobile_docomo
1124: DoCoMo
1125: 1
1126: 
1127: 
1128: 1
1129: net_useragent_mobile_common
1130: net_useragent_mobile_docomo
1131: DoCoMo
1132: 1
1133: 
1134: 
1135: 1
1136: net_useragent_mobile_common
1137: net_useragent_mobile_docomo
1138: DoCoMo
1139: 1
1140: 
1141: 
1142: 1
1143: net_useragent_mobile_common
1144: net_useragent_mobile_docomo
1145: DoCoMo
1146: 1
1147: 
1148: 
1149: 1
1150: net_useragent_mobile_common
1151: net_useragent_mobile_docomo
1152: DoCoMo
1153: 1
1154: 
1155: 
1156: 1
1157: net_useragent_mobile_common
1158: net_useragent_mobile_docomo
1159: DoCoMo
1160: 1
1161: 
1162: 
1163: 1
1164: net_useragent_mobile_common
1165: net_useragent_mobile_docomo
1166: DoCoMo
1167: 1
1168: 
1169: 
1170: 1
1171: net_useragent_mobile_common
1172: net_useragent_mobile_docomo
1173: DoCoMo
1174: 1
1175: 
1176: 
1177: 1
1178: net_useragent_mobile_common
1179: net_useragent_mobile_docomo
1180: DoCoMo
1181: 1
1182: 
1183: 
1184: 1
1185: net_useragent_mobile_common
1186: net_useragent_mobile_docomo
1187: DoCoMo
1188: 1
1189: 
1190: 
1191: 1
1192: net_useragent_mobile_common
1193: net_useragent_mobile_docomo
1194: DoCoMo
1195: 1
1196: 
1197: 
1198: 1
1199: net_useragent_mobile_common
1200: net_useragent_mobile_docomo
1201: DoCoMo
1202: 1
1203: 
1204: 
1205: 1
1206: net_useragent_mobile_common
1207: net_useragent_mobile_docomo
1208: DoCoMo
1209: 1
1210: 
1211: 
1212: 1
1213: net_useragent_mobile_common
1214: net_useragent_mobile_docomo
1215: DoCoMo
1216: 1
1217: 
1218: 
1219: 1
1220: net_useragent_mobile_common
1221: net_useragent_mobile_docomo
1222: DoCoMo
1223: 1
1224: 
1225: 
1226: 1
1227: net_useragent_mobile_common
1228: net_useragent_mobile_docomo
1229: DoCoMo
1230: 1
1231: 
1232: 
1233: 1
1234: net_useragent_mobile_common
1235: net_useragent_mobile_docomo
1236: DoCoMo
1237: 1
1238: 
1239: 
1240: 1
1241: net_useragent_mobile_common
1242: net_useragent_mobile_docomo
1243: DoCoMo
1244: 1
1245: 
1246: 
1247: 1
1248: net_useragent_mobile_common
1249: net_useragent_mobile_docomo
1250: DoCoMo
1251: 1
1252: 
1253: 
1254: 1
1255: net_useragent_mobile_common
1256: net_useragent_mobile_docomo
1257: DoCoMo
1258: 1
1259: 
1260: 
1261: 1
1262: net_useragent_mobile_common
1263: net_useragent_mobile_docomo
1264: DoCoMo
1265: 1
1266: 
1267: 
1268: 1
1269: net_useragent_mobile_common
1270: net_useragent_mobile_docomo
1271: DoCoMo
1272: 1
1273: 
1274: 
1275: 1
1276: net_useragent_mobile_common
1277: net_useragent_mobile_docomo
1278: DoCoMo
1279: 1
1280: 
1281: 
1282: 1
1283: net_useragent_mobile_common
1284: net_useragent_mobile_docomo
1285: DoCoMo
1286: 1
1287: 
1288: 
1289: 1
1290: net_useragent_mobile_common
1291: net_useragent_mobile_docomo
1292: DoCoMo
1293: 1
1294: 
1295: 
1296: 1
1297: net_useragent_mobile_common
1298: net_useragent_mobile_docomo
1299: DoCoMo
1300: 1
1301: 
1302: 
1303: 1
1304: net_useragent_mobile_common
1305: net_useragent_mobile_docomo
1306: DoCoMo
1307: 1
1308: 
1309: 
1310: 1
1311: net_useragent_mobile_common
1312: net_useragent_mobile_docomo
1313: DoCoMo
1314: 1
1315: 
1316: 
1317: 1
1318: net_useragent_mobile_common
1319: net_useragent_mobile_docomo
1320: DoCoMo
1321: 1
1322: 
1323: 
1324: 1
1325: net_useragent_mobile_common
1326: net_useragent_mobile_docomo
1327: DoCoMo
1328: 1
1329: 
1330: 
1331: 1
1332: net_useragent_mobile_common
1333: net_useragent_mobile_docomo
1334: DoCoMo
1335: 1
1336: 
1337: 
1338: 1
1339: net_useragent_mobile_common
1340: net_useragent_mobile_docomo
1341: DoCoMo
1342: 1
1343: 
1344: 
1345: 1
1346: net_useragent_mobile_common
1347: net_useragent_mobile_docomo
1348: DoCoMo
1349: 1
1350: 
1351: 
1352: 1
1353: net_useragent_mobile_common
1354: net_useragent_mobile_docomo
1355: DoCoMo
1356: 1
1357: 
1358: 
1359: 1
1360: net_useragent_mobile_common
1361: net_useragent_mobile_docomo
1362: DoCoMo
1363: 1
1364: 
1365: 
1366: 1
1367: net_useragent_mobile_common
1368: net_useragent_mobile_docomo
1369: DoCoMo
1370: 1
1371: 
1372: 
1373: 1
1374: net_useragent_mobile_common
1375: net_useragent_mobile_docomo
1376: DoCoMo
1377: 1
1378: 
1379: 
1380: 1
1381: net_useragent_mobile_common
1382: net_useragent_mobile_docomo
1383: DoCoMo
1384: 1
1385: 
1386: 
1387: 1
1388: net_useragent_mobile_common
1389: net_useragent_mobile_docomo
1390: DoCoMo
1391: 1
1392: 
1393: 
1394: 1
1395: net_useragent_mobile_common
1396: net_useragent_mobile_docomo
1397: DoCoMo
1398: 1
1399: 
1400: 
1401: 1
1402: net_useragent_mobile_common
1403: net_useragent_mobile_docomo
1404: DoCoMo
1405: 1
1406: 
1407: 
1408: 1
1409: net_useragent_mobile_common
1410: net_useragent_mobile_docomo
1411: DoCoMo
1412: 1
1413: 
1414: 
1415: 1
1416: net_useragent_mobile_common
1417: net_useragent_mobile_docomo
1418: DoCoMo
1419: 1
1420: 
1421: 
1422: 1
1423: net_useragent_mobile_common
1424: net_useragent_mobile_docomo
1425: DoCoMo
1426: 1
1427: 
1428: 
1429: 1
1430: net_useragent_mobile_common
1431: net_useragent_mobile_docomo
1432: DoCoMo
1433: 1
1434: 
1435: 
1436: 1
1437: net_useragent_mobile_common
1438: net_useragent_mobile_docomo
1439: DoCoMo
1440: 1
1441: 
1442: 
1443: 1
1444: net_useragent_mobile_common
1445: net_useragent_mobile_docomo
1446: DoCoMo
1447: 1
1448: 
1449: 
1450: 1
1451: net_useragent_mobile_common
1452: net_useragent_mobile_docomo
1453: DoCoMo
1454: 1
1455: 
1456: 
1457: 1
1458: net_useragent_mobile_common
1459: net_useragent_mobile_docomo
1460: DoCoMo
1461: 1
1462: 
1463: 
1464: 1
1465: net_useragent_mobile_common
1466: net_useragent_mobile_docomo
1467: DoCoMo
1468: 1
1469: 
1470: 
1471: 1
1472: net_useragent_mobile_common
1473: net_useragent_mobile_docomo
1474: DoCoMo
1475: 1
1476: 
1477: 
1478: 1
1479: net_useragent_mobile_common
1480: net_useragent_mobile_docomo
1481: DoCoMo
1482: 1
1483: 
1484: 
1485: 1
1486: net_useragent_mobile_common
1487: net_useragent_mobile_docomo
1488: DoCoMo
1489: 1
1490: 
1491: 
1492: 1
1493: net_useragent_mobile_common
1494: net_useragent_mobile_docomo
1495: DoCoMo
1496: 1
1497: 
1498: 
1499: 1
1500: net_useragent_mobile_common
1501: net_useragent_mobile_docomo
1502: DoCoMo
1503: 1
1504: 
1505: 
1506: 1
1507: net_useragent_mobile_common
1508: net_useragent_mobile_docomo
1509: DoCoMo
1510: 1
1511: 
1512: 
1513: 1
1514: net_useragent_mobile_common
1515: net_useragent_mobile_docomo
1516: DoCoMo
1517: 1
1518: 
1519: 
1520: 1
1521: net_useragent_mobile_common
1522: net_useragent_mobile_docomo
1523: DoCoMo
1524: 1
1525: 
1526: 
1527: 1
1528: net_useragent_mobile_common
1529: net_useragent_mobile_docomo
1530: DoCoMo
1531: 1
1532: 
1533: 
1534: 1
1535: net_useragent_mobile_common
1536: net_useragent_mobile_docomo
1537: DoCoMo
1538: 1
1539: 
1540: 
1541: 1
1542: net_useragent_mobile_common
1543: net_useragent_mobile_docomo
1544: DoCoMo
1545: 1
1546: 
1547: 
1548: 1
1549: net_useragent_mobile_common
1550: net_useragent_mobile_docomo
1551: DoCoMo
1552: 1
1553: 
1554: 
1555: 1
1556: net_useragent_mobile_common
1557: net_useragent_mobile_docomo
1558: DoCoMo
1559: 1
1560: 
1561: 
1562: 1
1563: net_useragent_mobile_common
1564: net_useragent_mobile_docomo
1565: DoCoMo
1566: 1
1567: 
1568: 
1569: 1
1570: net_useragent_mobile_common
1571: net_useragent_mobile_docomo
1572: DoCoMo
1573: 1
1574: 
1575: 
1576: 1
1577: net_useragent_mobile_error
1578: Net_UserAgent_Mobile Error: no match
1579: 1
1580: net_useragent_mobile_error
1581: Net_UserAgent_Mobile Error: no match
1582: 1
1583: net_useragent_mobile_error
1584: Net_UserAgent_Mobile Error: no match
