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
               array('DoCoMo/1.0/F212i/c10/TB', '1.0', '4.0', 'F212i', 10, false, 'F', '212i'),
               array('DoCoMo/2.0 F2051(c100;TB)', '2.0', '4.0', 'F2051', 100, true, 'F', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/2.0 N2051(c100;TB)', '2.0', '4.0', 'N2051', 100, true, 'N', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/2.0 P2102V(c100;TB)', '2.0', '4.0', 'P2102V', 100, true, 'P', 'FOMA', array('status' => 'TB'))
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
                     'DoCoMo/2.0 P2102V(c100;TB)'
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
444: 1
445: net_useragent_mobile_common
446: net_useragent_mobile_docomo
447: 1
448: 
449: 
450: DoCoMo
451: DoCoMo/2.0 F2051(c100;TB)
452: 2.0
453: 4.0
454: F2051
455: 100
456: 1
457: F
458: FOMA
459: Testing status ...
460: TB
461: 1
462: net_useragent_mobile_common
463: net_useragent_mobile_docomo
464: 1
465: 
466: 
467: DoCoMo
468: DoCoMo/2.0 N2051(c100;TB)
469: 2.0
470: 4.0
471: N2051
472: 100
473: 1
474: N
475: FOMA
476: Testing status ...
477: TB
478: 1
479: net_useragent_mobile_common
480: net_useragent_mobile_docomo
481: 1
482: 
483: 
484: DoCoMo
485: DoCoMo/2.0 P2102V(c100;TB)
486: 2.0
487: 4.0
488: P2102V
489: 100
490: 1
491: P
492: FOMA
493: Testing status ...
494: TB
495: 1
496: net_useragent_mobile_common
497: net_useragent_mobile_docomo
498: DoCoMo
499: 1
500: 
501: 
502: 1
503: net_useragent_mobile_common
504: net_useragent_mobile_docomo
505: DoCoMo
506: 1
507: 
508: 
509: 1
510: net_useragent_mobile_common
511: net_useragent_mobile_docomo
512: DoCoMo
513: 1
514: 
515: 
516: 1
517: net_useragent_mobile_common
518: net_useragent_mobile_docomo
519: DoCoMo
520: 1
521: 
522: 
523: 1
524: net_useragent_mobile_common
525: net_useragent_mobile_docomo
526: DoCoMo
527: 1
528: 
529: 
530: 1
531: net_useragent_mobile_common
532: net_useragent_mobile_docomo
533: DoCoMo
534: 1
535: 
536: 
537: 1
538: net_useragent_mobile_common
539: net_useragent_mobile_docomo
540: DoCoMo
541: 1
542: 
543: 
544: 1
545: net_useragent_mobile_common
546: net_useragent_mobile_docomo
547: DoCoMo
548: 1
549: 
550: 
551: 1
552: net_useragent_mobile_common
553: net_useragent_mobile_docomo
554: DoCoMo
555: 1
556: 
557: 
558: 1
559: net_useragent_mobile_common
560: net_useragent_mobile_docomo
561: DoCoMo
562: 1
563: 
564: 
565: 1
566: net_useragent_mobile_common
567: net_useragent_mobile_docomo
568: DoCoMo
569: 1
570: 
571: 
572: 1
573: net_useragent_mobile_common
574: net_useragent_mobile_docomo
575: DoCoMo
576: 1
577: 
578: 
579: 1
580: net_useragent_mobile_common
581: net_useragent_mobile_docomo
582: DoCoMo
583: 1
584: 
585: 
586: 1
587: net_useragent_mobile_common
588: net_useragent_mobile_docomo
589: DoCoMo
590: 1
591: 
592: 
593: 1
594: net_useragent_mobile_common
595: net_useragent_mobile_docomo
596: DoCoMo
597: 1
598: 
599: 
600: 1
601: net_useragent_mobile_common
602: net_useragent_mobile_docomo
603: DoCoMo
604: 1
605: 
606: 
607: 1
608: net_useragent_mobile_common
609: net_useragent_mobile_docomo
610: DoCoMo
611: 1
612: 
613: 
614: 1
615: net_useragent_mobile_common
616: net_useragent_mobile_docomo
617: DoCoMo
618: 1
619: 
620: 
621: 1
622: net_useragent_mobile_common
623: net_useragent_mobile_docomo
624: DoCoMo
625: 1
626: 
627: 
628: 1
629: net_useragent_mobile_common
630: net_useragent_mobile_docomo
631: DoCoMo
632: 1
633: 
634: 
635: 1
636: net_useragent_mobile_common
637: net_useragent_mobile_docomo
638: DoCoMo
639: 1
640: 
641: 
642: 1
643: net_useragent_mobile_common
644: net_useragent_mobile_docomo
645: DoCoMo
646: 1
647: 
648: 
649: 1
650: net_useragent_mobile_common
651: net_useragent_mobile_docomo
652: DoCoMo
653: 1
654: 
655: 
656: 1
657: net_useragent_mobile_common
658: net_useragent_mobile_docomo
659: DoCoMo
660: 1
661: 
662: 
663: 1
664: net_useragent_mobile_common
665: net_useragent_mobile_docomo
666: DoCoMo
667: 1
668: 
669: 
670: 1
671: net_useragent_mobile_common
672: net_useragent_mobile_docomo
673: DoCoMo
674: 1
675: 
676: 
677: 1
678: net_useragent_mobile_common
679: net_useragent_mobile_docomo
680: DoCoMo
681: 1
682: 
683: 
684: 1
685: net_useragent_mobile_common
686: net_useragent_mobile_docomo
687: DoCoMo
688: 1
689: 
690: 
691: 1
692: net_useragent_mobile_common
693: net_useragent_mobile_docomo
694: DoCoMo
695: 1
696: 
697: 
698: 1
699: net_useragent_mobile_common
700: net_useragent_mobile_docomo
701: DoCoMo
702: 1
703: 
704: 
705: 1
706: net_useragent_mobile_common
707: net_useragent_mobile_docomo
708: DoCoMo
709: 1
710: 
711: 
712: 1
713: net_useragent_mobile_common
714: net_useragent_mobile_docomo
715: DoCoMo
716: 1
717: 
718: 
719: 1
720: net_useragent_mobile_common
721: net_useragent_mobile_docomo
722: DoCoMo
723: 1
724: 
725: 
726: 1
727: net_useragent_mobile_common
728: net_useragent_mobile_docomo
729: DoCoMo
730: 1
731: 
732: 
733: 1
734: net_useragent_mobile_common
735: net_useragent_mobile_docomo
736: DoCoMo
737: 1
738: 
739: 
740: 1
741: net_useragent_mobile_common
742: net_useragent_mobile_docomo
743: DoCoMo
744: 1
745: 
746: 
747: 1
748: net_useragent_mobile_common
749: net_useragent_mobile_docomo
750: DoCoMo
751: 1
752: 
753: 
754: 1
755: net_useragent_mobile_common
756: net_useragent_mobile_docomo
757: DoCoMo
758: 1
759: 
760: 
761: 1
762: net_useragent_mobile_common
763: net_useragent_mobile_docomo
764: DoCoMo
765: 1
766: 
767: 
768: 1
769: net_useragent_mobile_common
770: net_useragent_mobile_docomo
771: DoCoMo
772: 1
773: 
774: 
775: 1
776: net_useragent_mobile_common
777: net_useragent_mobile_docomo
778: DoCoMo
779: 1
780: 
781: 
782: 1
783: net_useragent_mobile_common
784: net_useragent_mobile_docomo
785: DoCoMo
786: 1
787: 
788: 
789: 1
790: net_useragent_mobile_common
791: net_useragent_mobile_docomo
792: DoCoMo
793: 1
794: 
795: 
796: 1
797: net_useragent_mobile_common
798: net_useragent_mobile_docomo
799: DoCoMo
800: 1
801: 
802: 
803: 1
804: net_useragent_mobile_common
805: net_useragent_mobile_docomo
806: DoCoMo
807: 1
808: 
809: 
810: 1
811: net_useragent_mobile_common
812: net_useragent_mobile_docomo
813: DoCoMo
814: 1
815: 
816: 
817: 1
818: net_useragent_mobile_common
819: net_useragent_mobile_docomo
820: DoCoMo
821: 1
822: 
823: 
824: 1
825: net_useragent_mobile_common
826: net_useragent_mobile_docomo
827: DoCoMo
828: 1
829: 
830: 
831: 1
832: net_useragent_mobile_common
833: net_useragent_mobile_docomo
834: DoCoMo
835: 1
836: 
837: 
838: 1
839: net_useragent_mobile_common
840: net_useragent_mobile_docomo
841: DoCoMo
842: 1
843: 
844: 
845: 1
846: net_useragent_mobile_common
847: net_useragent_mobile_docomo
848: DoCoMo
849: 1
850: 
851: 
852: 1
853: net_useragent_mobile_common
854: net_useragent_mobile_docomo
855: DoCoMo
856: 1
857: 
858: 
859: 1
860: net_useragent_mobile_common
861: net_useragent_mobile_docomo
862: DoCoMo
863: 1
864: 
865: 
866: 1
867: net_useragent_mobile_common
868: net_useragent_mobile_docomo
869: DoCoMo
870: 1
871: 
872: 
873: 1
874: net_useragent_mobile_common
875: net_useragent_mobile_docomo
876: DoCoMo
877: 1
878: 
879: 
880: 1
881: net_useragent_mobile_common
882: net_useragent_mobile_docomo
883: DoCoMo
884: 1
885: 
886: 
887: 1
888: net_useragent_mobile_common
889: net_useragent_mobile_docomo
890: DoCoMo
891: 1
892: 
893: 
894: 1
895: net_useragent_mobile_common
896: net_useragent_mobile_docomo
897: DoCoMo
898: 1
899: 
900: 
901: 1
902: net_useragent_mobile_common
903: net_useragent_mobile_docomo
904: DoCoMo
905: 1
906: 
907: 
908: 1
909: net_useragent_mobile_common
910: net_useragent_mobile_docomo
911: DoCoMo
912: 1
913: 
914: 
915: 1
916: net_useragent_mobile_common
917: net_useragent_mobile_docomo
918: DoCoMo
919: 1
920: 
921: 
922: 1
923: net_useragent_mobile_common
924: net_useragent_mobile_docomo
925: DoCoMo
926: 1
927: 
928: 
929: 1
930: net_useragent_mobile_common
931: net_useragent_mobile_docomo
932: DoCoMo
933: 1
934: 
935: 
936: 1
937: net_useragent_mobile_common
938: net_useragent_mobile_docomo
939: DoCoMo
940: 1
941: 
942: 
943: 1
944: net_useragent_mobile_common
945: net_useragent_mobile_docomo
946: DoCoMo
947: 1
948: 
949: 
950: 1
951: net_useragent_mobile_common
952: net_useragent_mobile_docomo
953: DoCoMo
954: 1
955: 
956: 
957: 1
958: net_useragent_mobile_common
959: net_useragent_mobile_docomo
960: DoCoMo
961: 1
962: 
963: 
964: 1
965: net_useragent_mobile_common
966: net_useragent_mobile_docomo
967: DoCoMo
968: 1
969: 
970: 
971: 1
972: net_useragent_mobile_common
973: net_useragent_mobile_docomo
974: DoCoMo
975: 1
976: 
977: 
978: 1
979: net_useragent_mobile_common
980: net_useragent_mobile_docomo
981: DoCoMo
982: 1
983: 
984: 
985: 1
986: net_useragent_mobile_common
987: net_useragent_mobile_docomo
988: DoCoMo
989: 1
990: 
991: 
992: 1
993: net_useragent_mobile_common
994: net_useragent_mobile_docomo
995: DoCoMo
996: 1
997: 
998: 
999: 1
1000: net_useragent_mobile_common
1001: net_useragent_mobile_docomo
1002: DoCoMo
1003: 1
1004: 
1005: 
1006: 1
1007: net_useragent_mobile_common
1008: net_useragent_mobile_docomo
1009: DoCoMo
1010: 1
1011: 
1012: 
1013: 1
1014: net_useragent_mobile_common
1015: net_useragent_mobile_docomo
1016: DoCoMo
1017: 1
1018: 
1019: 
1020: 1
1021: net_useragent_mobile_common
1022: net_useragent_mobile_docomo
1023: DoCoMo
1024: 1
1025: 
1026: 
1027: 1
1028: net_useragent_mobile_common
1029: net_useragent_mobile_docomo
1030: DoCoMo
1031: 1
1032: 
1033: 
1034: 1
1035: net_useragent_mobile_common
1036: net_useragent_mobile_docomo
1037: DoCoMo
1038: 1
1039: 
1040: 
1041: 1
1042: net_useragent_mobile_common
1043: net_useragent_mobile_docomo
1044: DoCoMo
1045: 1
1046: 
1047: 
1048: 1
1049: net_useragent_mobile_common
1050: net_useragent_mobile_docomo
1051: DoCoMo
1052: 1
1053: 
1054: 
1055: 1
1056: net_useragent_mobile_common
1057: net_useragent_mobile_docomo
1058: DoCoMo
1059: 1
1060: 
1061: 
1062: 1
1063: net_useragent_mobile_common
1064: net_useragent_mobile_docomo
1065: DoCoMo
1066: 1
1067: 
1068: 
1069: 1
1070: net_useragent_mobile_common
1071: net_useragent_mobile_docomo
1072: DoCoMo
1073: 1
1074: 
1075: 
1076: 1
1077: net_useragent_mobile_common
1078: net_useragent_mobile_docomo
1079: DoCoMo
1080: 1
1081: 
1082: 
1083: 1
1084: net_useragent_mobile_common
1085: net_useragent_mobile_docomo
1086: DoCoMo
1087: 1
1088: 
1089: 
1090: 1
1091: net_useragent_mobile_common
1092: net_useragent_mobile_docomo
1093: DoCoMo
1094: 1
1095: 
1096: 
1097: 1
1098: net_useragent_mobile_common
1099: net_useragent_mobile_docomo
1100: DoCoMo
1101: 1
1102: 
1103: 
1104: 1
1105: net_useragent_mobile_common
1106: net_useragent_mobile_docomo
1107: DoCoMo
1108: 1
1109: 
1110: 
1111: 1
1112: net_useragent_mobile_common
1113: net_useragent_mobile_docomo
1114: DoCoMo
1115: 1
1116: 
1117: 
1118: 1
1119: net_useragent_mobile_common
1120: net_useragent_mobile_docomo
1121: DoCoMo
1122: 1
1123: 
1124: 
1125: 1
1126: net_useragent_mobile_common
1127: net_useragent_mobile_docomo
1128: DoCoMo
1129: 1
1130: 
1131: 
1132: 1
1133: net_useragent_mobile_common
1134: net_useragent_mobile_docomo
1135: DoCoMo
1136: 1
1137: 
1138: 
1139: 1
1140: net_useragent_mobile_common
1141: net_useragent_mobile_docomo
1142: DoCoMo
1143: 1
1144: 
1145: 
1146: 1
1147: net_useragent_mobile_common
1148: net_useragent_mobile_docomo
1149: DoCoMo
1150: 1
1151: 
1152: 
1153: 1
1154: net_useragent_mobile_common
1155: net_useragent_mobile_docomo
1156: DoCoMo
1157: 1
1158: 
1159: 
1160: 1
1161: net_useragent_mobile_common
1162: net_useragent_mobile_docomo
1163: DoCoMo
1164: 1
1165: 
1166: 
1167: 1
1168: net_useragent_mobile_common
1169: net_useragent_mobile_docomo
1170: DoCoMo
1171: 1
1172: 
1173: 
1174: 1
1175: net_useragent_mobile_common
1176: net_useragent_mobile_docomo
1177: DoCoMo
1178: 1
1179: 
1180: 
1181: 1
1182: net_useragent_mobile_common
1183: net_useragent_mobile_docomo
1184: DoCoMo
1185: 1
1186: 
1187: 
1188: 1
1189: net_useragent_mobile_common
1190: net_useragent_mobile_docomo
1191: DoCoMo
1192: 1
1193: 
1194: 
1195: 1
1196: net_useragent_mobile_common
1197: net_useragent_mobile_docomo
1198: DoCoMo
1199: 1
1200: 
1201: 
1202: 1
1203: net_useragent_mobile_common
1204: net_useragent_mobile_docomo
1205: DoCoMo
1206: 1
1207: 
1208: 
1209: 1
1210: net_useragent_mobile_common
1211: net_useragent_mobile_docomo
1212: DoCoMo
1213: 1
1214: 
1215: 
1216: 1
1217: net_useragent_mobile_common
1218: net_useragent_mobile_docomo
1219: DoCoMo
1220: 1
1221: 
1222: 
1223: 1
1224: net_useragent_mobile_common
1225: net_useragent_mobile_docomo
1226: DoCoMo
1227: 1
1228: 
1229: 
1230: 1
1231: net_useragent_mobile_common
1232: net_useragent_mobile_docomo
1233: DoCoMo
1234: 1
1235: 
1236: 
1237: 1
1238: net_useragent_mobile_common
1239: net_useragent_mobile_docomo
1240: DoCoMo
1241: 1
1242: 
1243: 
1244: 1
1245: net_useragent_mobile_common
1246: net_useragent_mobile_docomo
1247: DoCoMo
1248: 1
1249: 
1250: 
1251: 1
1252: net_useragent_mobile_common
1253: net_useragent_mobile_docomo
1254: DoCoMo
1255: 1
1256: 
1257: 
1258: 1
1259: net_useragent_mobile_common
1260: net_useragent_mobile_docomo
1261: DoCoMo
1262: 1
1263: 
1264: 
1265: 1
1266: net_useragent_mobile_common
1267: net_useragent_mobile_docomo
1268: DoCoMo
1269: 1
1270: 
1271: 
1272: 1
1273: net_useragent_mobile_common
1274: net_useragent_mobile_docomo
1275: DoCoMo
1276: 1
1277: 
1278: 
1279: 1
1280: net_useragent_mobile_common
1281: net_useragent_mobile_docomo
1282: DoCoMo
1283: 1
1284: 
1285: 
1286: 1
1287: net_useragent_mobile_common
1288: net_useragent_mobile_docomo
1289: DoCoMo
1290: 1
1291: 
1292: 
1293: 1
1294: net_useragent_mobile_common
1295: net_useragent_mobile_docomo
1296: DoCoMo
1297: 1
1298: 
1299: 
1300: 1
1301: net_useragent_mobile_common
1302: net_useragent_mobile_docomo
1303: DoCoMo
1304: 1
1305: 
1306: 
1307: 1
1308: net_useragent_mobile_common
1309: net_useragent_mobile_docomo
1310: DoCoMo
1311: 1
1312: 
1313: 
1314: 1
1315: net_useragent_mobile_common
1316: net_useragent_mobile_docomo
1317: DoCoMo
1318: 1
1319: 
1320: 
1321: 1
1322: net_useragent_mobile_common
1323: net_useragent_mobile_docomo
1324: DoCoMo
1325: 1
1326: 
1327: 
1328: 1
1329: net_useragent_mobile_common
1330: net_useragent_mobile_docomo
1331: DoCoMo
1332: 1
1333: 
1334: 
1335: 1
1336: net_useragent_mobile_common
1337: net_useragent_mobile_docomo
1338: DoCoMo
1339: 1
1340: 
1341: 
1342: 1
1343: net_useragent_mobile_common
1344: net_useragent_mobile_docomo
1345: DoCoMo
1346: 1
1347: 
1348: 
1349: 1
1350: net_useragent_mobile_common
1351: net_useragent_mobile_docomo
1352: DoCoMo
1353: 1
1354: 
1355: 
1356: 1
1357: net_useragent_mobile_common
1358: net_useragent_mobile_docomo
1359: DoCoMo
1360: 1
1361: 
1362: 
1363: 1
1364: net_useragent_mobile_common
1365: net_useragent_mobile_docomo
1366: DoCoMo
1367: 1
1368: 
1369: 
1370: 1
1371: net_useragent_mobile_common
1372: net_useragent_mobile_docomo
1373: DoCoMo
1374: 1
1375: 
1376: 
1377: 1
1378: net_useragent_mobile_common
1379: net_useragent_mobile_docomo
1380: DoCoMo
1381: 1
1382: 
1383: 
1384: 1
1385: net_useragent_mobile_common
1386: net_useragent_mobile_docomo
1387: DoCoMo
1388: 1
1389: 
1390: 
1391: 1
1392: net_useragent_mobile_common
1393: net_useragent_mobile_docomo
1394: DoCoMo
1395: 1
1396: 
1397: 
1398: 1
1399: net_useragent_mobile_common
1400: net_useragent_mobile_docomo
1401: DoCoMo
1402: 1
1403: 
1404: 
1405: 1
1406: net_useragent_mobile_common
1407: net_useragent_mobile_docomo
1408: DoCoMo
1409: 1
1410: 
1411: 
1412: 1
1413: net_useragent_mobile_common
1414: net_useragent_mobile_docomo
1415: DoCoMo
1416: 1
1417: 
1418: 
1419: 1
1420: net_useragent_mobile_common
1421: net_useragent_mobile_docomo
1422: DoCoMo
1423: 1
1424: 
1425: 
1426: 1
1427: net_useragent_mobile_common
1428: net_useragent_mobile_docomo
1429: DoCoMo
1430: 1
1431: 
1432: 
1433: 1
1434: net_useragent_mobile_common
1435: net_useragent_mobile_docomo
1436: DoCoMo
1437: 1
1438: 
1439: 
1440: 1
1441: net_useragent_mobile_common
1442: net_useragent_mobile_docomo
1443: DoCoMo
1444: 1
1445: 
1446: 
1447: 1
1448: net_useragent_mobile_common
1449: net_useragent_mobile_docomo
1450: DoCoMo
1451: 1
1452: 
1453: 
1454: 1
1455: net_useragent_mobile_common
1456: net_useragent_mobile_docomo
1457: DoCoMo
1458: 1
1459: 
1460: 
1461: 1
1462: net_useragent_mobile_common
1463: net_useragent_mobile_docomo
1464: DoCoMo
1465: 1
1466: 
1467: 
1468: 1
1469: net_useragent_mobile_common
1470: net_useragent_mobile_docomo
1471: DoCoMo
1472: 1
1473: 
1474: 
1475: 1
1476: net_useragent_mobile_common
1477: net_useragent_mobile_docomo
1478: DoCoMo
1479: 1
1480: 
1481: 
1482: 1
1483: net_useragent_mobile_error
1484: Net_UserAgent_Mobile Error: no match
1485: 1
1486: net_useragent_mobile_error
1487: Net_UserAgent_Mobile Error: no match
1488: 1
1489: net_useragent_mobile_error
1490: Net_UserAgent_Mobile Error: no match
