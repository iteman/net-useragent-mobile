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
               array('DoCoMo/1.0/F212i/c10/TB', '1.0', '4.0', 'F212i', 10, false, 'F', '212i')
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
                     'DoCoMo/3.0/N503'
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
447: DoCoMo
448: 1
449: 
450: 
451: 1
452: net_useragent_mobile_common
453: net_useragent_mobile_docomo
454: DoCoMo
455: 1
456: 
457: 
458: 1
459: net_useragent_mobile_common
460: net_useragent_mobile_docomo
461: DoCoMo
462: 1
463: 
464: 
465: 1
466: net_useragent_mobile_common
467: net_useragent_mobile_docomo
468: DoCoMo
469: 1
470: 
471: 
472: 1
473: net_useragent_mobile_common
474: net_useragent_mobile_docomo
475: DoCoMo
476: 1
477: 
478: 
479: 1
480: net_useragent_mobile_common
481: net_useragent_mobile_docomo
482: DoCoMo
483: 1
484: 
485: 
486: 1
487: net_useragent_mobile_common
488: net_useragent_mobile_docomo
489: DoCoMo
490: 1
491: 
492: 
493: 1
494: net_useragent_mobile_common
495: net_useragent_mobile_docomo
496: DoCoMo
497: 1
498: 
499: 
500: 1
501: net_useragent_mobile_common
502: net_useragent_mobile_docomo
503: DoCoMo
504: 1
505: 
506: 
507: 1
508: net_useragent_mobile_common
509: net_useragent_mobile_docomo
510: DoCoMo
511: 1
512: 
513: 
514: 1
515: net_useragent_mobile_common
516: net_useragent_mobile_docomo
517: DoCoMo
518: 1
519: 
520: 
521: 1
522: net_useragent_mobile_common
523: net_useragent_mobile_docomo
524: DoCoMo
525: 1
526: 
527: 
528: 1
529: net_useragent_mobile_common
530: net_useragent_mobile_docomo
531: DoCoMo
532: 1
533: 
534: 
535: 1
536: net_useragent_mobile_common
537: net_useragent_mobile_docomo
538: DoCoMo
539: 1
540: 
541: 
542: 1
543: net_useragent_mobile_common
544: net_useragent_mobile_docomo
545: DoCoMo
546: 1
547: 
548: 
549: 1
550: net_useragent_mobile_common
551: net_useragent_mobile_docomo
552: DoCoMo
553: 1
554: 
555: 
556: 1
557: net_useragent_mobile_common
558: net_useragent_mobile_docomo
559: DoCoMo
560: 1
561: 
562: 
563: 1
564: net_useragent_mobile_common
565: net_useragent_mobile_docomo
566: DoCoMo
567: 1
568: 
569: 
570: 1
571: net_useragent_mobile_common
572: net_useragent_mobile_docomo
573: DoCoMo
574: 1
575: 
576: 
577: 1
578: net_useragent_mobile_common
579: net_useragent_mobile_docomo
580: DoCoMo
581: 1
582: 
583: 
584: 1
585: net_useragent_mobile_common
586: net_useragent_mobile_docomo
587: DoCoMo
588: 1
589: 
590: 
591: 1
592: net_useragent_mobile_common
593: net_useragent_mobile_docomo
594: DoCoMo
595: 1
596: 
597: 
598: 1
599: net_useragent_mobile_common
600: net_useragent_mobile_docomo
601: DoCoMo
602: 1
603: 
604: 
605: 1
606: net_useragent_mobile_common
607: net_useragent_mobile_docomo
608: DoCoMo
609: 1
610: 
611: 
612: 1
613: net_useragent_mobile_common
614: net_useragent_mobile_docomo
615: DoCoMo
616: 1
617: 
618: 
619: 1
620: net_useragent_mobile_common
621: net_useragent_mobile_docomo
622: DoCoMo
623: 1
624: 
625: 
626: 1
627: net_useragent_mobile_common
628: net_useragent_mobile_docomo
629: DoCoMo
630: 1
631: 
632: 
633: 1
634: net_useragent_mobile_common
635: net_useragent_mobile_docomo
636: DoCoMo
637: 1
638: 
639: 
640: 1
641: net_useragent_mobile_common
642: net_useragent_mobile_docomo
643: DoCoMo
644: 1
645: 
646: 
647: 1
648: net_useragent_mobile_common
649: net_useragent_mobile_docomo
650: DoCoMo
651: 1
652: 
653: 
654: 1
655: net_useragent_mobile_common
656: net_useragent_mobile_docomo
657: DoCoMo
658: 1
659: 
660: 
661: 1
662: net_useragent_mobile_common
663: net_useragent_mobile_docomo
664: DoCoMo
665: 1
666: 
667: 
668: 1
669: net_useragent_mobile_common
670: net_useragent_mobile_docomo
671: DoCoMo
672: 1
673: 
674: 
675: 1
676: net_useragent_mobile_common
677: net_useragent_mobile_docomo
678: DoCoMo
679: 1
680: 
681: 
682: 1
683: net_useragent_mobile_common
684: net_useragent_mobile_docomo
685: DoCoMo
686: 1
687: 
688: 
689: 1
690: net_useragent_mobile_common
691: net_useragent_mobile_docomo
692: DoCoMo
693: 1
694: 
695: 
696: 1
697: net_useragent_mobile_common
698: net_useragent_mobile_docomo
699: DoCoMo
700: 1
701: 
702: 
703: 1
704: net_useragent_mobile_common
705: net_useragent_mobile_docomo
706: DoCoMo
707: 1
708: 
709: 
710: 1
711: net_useragent_mobile_common
712: net_useragent_mobile_docomo
713: DoCoMo
714: 1
715: 
716: 
717: 1
718: net_useragent_mobile_common
719: net_useragent_mobile_docomo
720: DoCoMo
721: 1
722: 
723: 
724: 1
725: net_useragent_mobile_common
726: net_useragent_mobile_docomo
727: DoCoMo
728: 1
729: 
730: 
731: 1
732: net_useragent_mobile_common
733: net_useragent_mobile_docomo
734: DoCoMo
735: 1
736: 
737: 
738: 1
739: net_useragent_mobile_common
740: net_useragent_mobile_docomo
741: DoCoMo
742: 1
743: 
744: 
745: 1
746: net_useragent_mobile_common
747: net_useragent_mobile_docomo
748: DoCoMo
749: 1
750: 
751: 
752: 1
753: net_useragent_mobile_common
754: net_useragent_mobile_docomo
755: DoCoMo
756: 1
757: 
758: 
759: 1
760: net_useragent_mobile_common
761: net_useragent_mobile_docomo
762: DoCoMo
763: 1
764: 
765: 
766: 1
767: net_useragent_mobile_common
768: net_useragent_mobile_docomo
769: DoCoMo
770: 1
771: 
772: 
773: 1
774: net_useragent_mobile_common
775: net_useragent_mobile_docomo
776: DoCoMo
777: 1
778: 
779: 
780: 1
781: net_useragent_mobile_common
782: net_useragent_mobile_docomo
783: DoCoMo
784: 1
785: 
786: 
787: 1
788: net_useragent_mobile_common
789: net_useragent_mobile_docomo
790: DoCoMo
791: 1
792: 
793: 
794: 1
795: net_useragent_mobile_common
796: net_useragent_mobile_docomo
797: DoCoMo
798: 1
799: 
800: 
801: 1
802: net_useragent_mobile_common
803: net_useragent_mobile_docomo
804: DoCoMo
805: 1
806: 
807: 
808: 1
809: net_useragent_mobile_common
810: net_useragent_mobile_docomo
811: DoCoMo
812: 1
813: 
814: 
815: 1
816: net_useragent_mobile_common
817: net_useragent_mobile_docomo
818: DoCoMo
819: 1
820: 
821: 
822: 1
823: net_useragent_mobile_common
824: net_useragent_mobile_docomo
825: DoCoMo
826: 1
827: 
828: 
829: 1
830: net_useragent_mobile_common
831: net_useragent_mobile_docomo
832: DoCoMo
833: 1
834: 
835: 
836: 1
837: net_useragent_mobile_common
838: net_useragent_mobile_docomo
839: DoCoMo
840: 1
841: 
842: 
843: 1
844: net_useragent_mobile_common
845: net_useragent_mobile_docomo
846: DoCoMo
847: 1
848: 
849: 
850: 1
851: net_useragent_mobile_common
852: net_useragent_mobile_docomo
853: DoCoMo
854: 1
855: 
856: 
857: 1
858: net_useragent_mobile_common
859: net_useragent_mobile_docomo
860: DoCoMo
861: 1
862: 
863: 
864: 1
865: net_useragent_mobile_common
866: net_useragent_mobile_docomo
867: DoCoMo
868: 1
869: 
870: 
871: 1
872: net_useragent_mobile_common
873: net_useragent_mobile_docomo
874: DoCoMo
875: 1
876: 
877: 
878: 1
879: net_useragent_mobile_common
880: net_useragent_mobile_docomo
881: DoCoMo
882: 1
883: 
884: 
885: 1
886: net_useragent_mobile_common
887: net_useragent_mobile_docomo
888: DoCoMo
889: 1
890: 
891: 
892: 1
893: net_useragent_mobile_common
894: net_useragent_mobile_docomo
895: DoCoMo
896: 1
897: 
898: 
899: 1
900: net_useragent_mobile_common
901: net_useragent_mobile_docomo
902: DoCoMo
903: 1
904: 
905: 
906: 1
907: net_useragent_mobile_common
908: net_useragent_mobile_docomo
909: DoCoMo
910: 1
911: 
912: 
913: 1
914: net_useragent_mobile_common
915: net_useragent_mobile_docomo
916: DoCoMo
917: 1
918: 
919: 
920: 1
921: net_useragent_mobile_common
922: net_useragent_mobile_docomo
923: DoCoMo
924: 1
925: 
926: 
927: 1
928: net_useragent_mobile_common
929: net_useragent_mobile_docomo
930: DoCoMo
931: 1
932: 
933: 
934: 1
935: net_useragent_mobile_common
936: net_useragent_mobile_docomo
937: DoCoMo
938: 1
939: 
940: 
941: 1
942: net_useragent_mobile_common
943: net_useragent_mobile_docomo
944: DoCoMo
945: 1
946: 
947: 
948: 1
949: net_useragent_mobile_common
950: net_useragent_mobile_docomo
951: DoCoMo
952: 1
953: 
954: 
955: 1
956: net_useragent_mobile_common
957: net_useragent_mobile_docomo
958: DoCoMo
959: 1
960: 
961: 
962: 1
963: net_useragent_mobile_common
964: net_useragent_mobile_docomo
965: DoCoMo
966: 1
967: 
968: 
969: 1
970: net_useragent_mobile_common
971: net_useragent_mobile_docomo
972: DoCoMo
973: 1
974: 
975: 
976: 1
977: net_useragent_mobile_common
978: net_useragent_mobile_docomo
979: DoCoMo
980: 1
981: 
982: 
983: 1
984: net_useragent_mobile_common
985: net_useragent_mobile_docomo
986: DoCoMo
987: 1
988: 
989: 
990: 1
991: net_useragent_mobile_common
992: net_useragent_mobile_docomo
993: DoCoMo
994: 1
995: 
996: 
997: 1
998: net_useragent_mobile_common
999: net_useragent_mobile_docomo
1000: DoCoMo
1001: 1
1002: 
1003: 
1004: 1
1005: net_useragent_mobile_common
1006: net_useragent_mobile_docomo
1007: DoCoMo
1008: 1
1009: 
1010: 
1011: 1
1012: net_useragent_mobile_common
1013: net_useragent_mobile_docomo
1014: DoCoMo
1015: 1
1016: 
1017: 
1018: 1
1019: net_useragent_mobile_common
1020: net_useragent_mobile_docomo
1021: DoCoMo
1022: 1
1023: 
1024: 
1025: 1
1026: net_useragent_mobile_common
1027: net_useragent_mobile_docomo
1028: DoCoMo
1029: 1
1030: 
1031: 
1032: 1
1033: net_useragent_mobile_common
1034: net_useragent_mobile_docomo
1035: DoCoMo
1036: 1
1037: 
1038: 
1039: 1
1040: net_useragent_mobile_common
1041: net_useragent_mobile_docomo
1042: DoCoMo
1043: 1
1044: 
1045: 
1046: 1
1047: net_useragent_mobile_common
1048: net_useragent_mobile_docomo
1049: DoCoMo
1050: 1
1051: 
1052: 
1053: 1
1054: net_useragent_mobile_common
1055: net_useragent_mobile_docomo
1056: DoCoMo
1057: 1
1058: 
1059: 
1060: 1
1061: net_useragent_mobile_common
1062: net_useragent_mobile_docomo
1063: DoCoMo
1064: 1
1065: 
1066: 
1067: 1
1068: net_useragent_mobile_common
1069: net_useragent_mobile_docomo
1070: DoCoMo
1071: 1
1072: 
1073: 
1074: 1
1075: net_useragent_mobile_common
1076: net_useragent_mobile_docomo
1077: DoCoMo
1078: 1
1079: 
1080: 
1081: 1
1082: net_useragent_mobile_common
1083: net_useragent_mobile_docomo
1084: DoCoMo
1085: 1
1086: 
1087: 
1088: 1
1089: net_useragent_mobile_common
1090: net_useragent_mobile_docomo
1091: DoCoMo
1092: 1
1093: 
1094: 
1095: 1
1096: net_useragent_mobile_common
1097: net_useragent_mobile_docomo
1098: DoCoMo
1099: 1
1100: 
1101: 
1102: 1
1103: net_useragent_mobile_common
1104: net_useragent_mobile_docomo
1105: DoCoMo
1106: 1
1107: 
1108: 
1109: 1
1110: net_useragent_mobile_common
1111: net_useragent_mobile_docomo
1112: DoCoMo
1113: 1
1114: 
1115: 
1116: 1
1117: net_useragent_mobile_common
1118: net_useragent_mobile_docomo
1119: DoCoMo
1120: 1
1121: 
1122: 
1123: 1
1124: net_useragent_mobile_common
1125: net_useragent_mobile_docomo
1126: DoCoMo
1127: 1
1128: 
1129: 
1130: 1
1131: net_useragent_mobile_common
1132: net_useragent_mobile_docomo
1133: DoCoMo
1134: 1
1135: 
1136: 
1137: 1
1138: net_useragent_mobile_common
1139: net_useragent_mobile_docomo
1140: DoCoMo
1141: 1
1142: 
1143: 
1144: 1
1145: net_useragent_mobile_common
1146: net_useragent_mobile_docomo
1147: DoCoMo
1148: 1
1149: 
1150: 
1151: 1
1152: net_useragent_mobile_common
1153: net_useragent_mobile_docomo
1154: DoCoMo
1155: 1
1156: 
1157: 
1158: 1
1159: net_useragent_mobile_common
1160: net_useragent_mobile_docomo
1161: DoCoMo
1162: 1
1163: 
1164: 
1165: 1
1166: net_useragent_mobile_common
1167: net_useragent_mobile_docomo
1168: DoCoMo
1169: 1
1170: 
1171: 
1172: 1
1173: net_useragent_mobile_common
1174: net_useragent_mobile_docomo
1175: DoCoMo
1176: 1
1177: 
1178: 
1179: 1
1180: net_useragent_mobile_common
1181: net_useragent_mobile_docomo
1182: DoCoMo
1183: 1
1184: 
1185: 
1186: 1
1187: net_useragent_mobile_common
1188: net_useragent_mobile_docomo
1189: DoCoMo
1190: 1
1191: 
1192: 
1193: 1
1194: net_useragent_mobile_common
1195: net_useragent_mobile_docomo
1196: DoCoMo
1197: 1
1198: 
1199: 
1200: 1
1201: net_useragent_mobile_common
1202: net_useragent_mobile_docomo
1203: DoCoMo
1204: 1
1205: 
1206: 
1207: 1
1208: net_useragent_mobile_common
1209: net_useragent_mobile_docomo
1210: DoCoMo
1211: 1
1212: 
1213: 
1214: 1
1215: net_useragent_mobile_common
1216: net_useragent_mobile_docomo
1217: DoCoMo
1218: 1
1219: 
1220: 
1221: 1
1222: net_useragent_mobile_common
1223: net_useragent_mobile_docomo
1224: DoCoMo
1225: 1
1226: 
1227: 
1228: 1
1229: net_useragent_mobile_common
1230: net_useragent_mobile_docomo
1231: DoCoMo
1232: 1
1233: 
1234: 
1235: 1
1236: net_useragent_mobile_common
1237: net_useragent_mobile_docomo
1238: DoCoMo
1239: 1
1240: 
1241: 
1242: 1
1243: net_useragent_mobile_common
1244: net_useragent_mobile_docomo
1245: DoCoMo
1246: 1
1247: 
1248: 
1249: 1
1250: net_useragent_mobile_common
1251: net_useragent_mobile_docomo
1252: DoCoMo
1253: 1
1254: 
1255: 
1256: 1
1257: net_useragent_mobile_common
1258: net_useragent_mobile_docomo
1259: DoCoMo
1260: 1
1261: 
1262: 
1263: 1
1264: net_useragent_mobile_common
1265: net_useragent_mobile_docomo
1266: DoCoMo
1267: 1
1268: 
1269: 
1270: 1
1271: net_useragent_mobile_common
1272: net_useragent_mobile_docomo
1273: DoCoMo
1274: 1
1275: 
1276: 
1277: 1
1278: net_useragent_mobile_common
1279: net_useragent_mobile_docomo
1280: DoCoMo
1281: 1
1282: 
1283: 
1284: 1
1285: net_useragent_mobile_common
1286: net_useragent_mobile_docomo
1287: DoCoMo
1288: 1
1289: 
1290: 
1291: 1
1292: net_useragent_mobile_common
1293: net_useragent_mobile_docomo
1294: DoCoMo
1295: 1
1296: 
1297: 
1298: 1
1299: net_useragent_mobile_common
1300: net_useragent_mobile_docomo
1301: DoCoMo
1302: 1
1303: 
1304: 
1305: 1
1306: net_useragent_mobile_common
1307: net_useragent_mobile_docomo
1308: DoCoMo
1309: 1
1310: 
1311: 
1312: 1
1313: net_useragent_mobile_common
1314: net_useragent_mobile_docomo
1315: DoCoMo
1316: 1
1317: 
1318: 
1319: 1
1320: net_useragent_mobile_common
1321: net_useragent_mobile_docomo
1322: DoCoMo
1323: 1
1324: 
1325: 
1326: 1
1327: net_useragent_mobile_common
1328: net_useragent_mobile_docomo
1329: DoCoMo
1330: 1
1331: 
1332: 
1333: 1
1334: net_useragent_mobile_common
1335: net_useragent_mobile_docomo
1336: DoCoMo
1337: 1
1338: 
1339: 
1340: 1
1341: net_useragent_mobile_common
1342: net_useragent_mobile_docomo
1343: DoCoMo
1344: 1
1345: 
1346: 
1347: 1
1348: net_useragent_mobile_common
1349: net_useragent_mobile_docomo
1350: DoCoMo
1351: 1
1352: 
1353: 
1354: 1
1355: net_useragent_mobile_common
1356: net_useragent_mobile_docomo
1357: DoCoMo
1358: 1
1359: 
1360: 
1361: 1
1362: net_useragent_mobile_common
1363: net_useragent_mobile_docomo
1364: DoCoMo
1365: 1
1366: 
1367: 
1368: 1
1369: net_useragent_mobile_common
1370: net_useragent_mobile_docomo
1371: DoCoMo
1372: 1
1373: 
1374: 
1375: 1
1376: net_useragent_mobile_common
1377: net_useragent_mobile_docomo
1378: DoCoMo
1379: 1
1380: 
1381: 
1382: 1
1383: net_useragent_mobile_common
1384: net_useragent_mobile_docomo
1385: DoCoMo
1386: 1
1387: 
1388: 
1389: 1
1390: net_useragent_mobile_common
1391: net_useragent_mobile_docomo
1392: DoCoMo
1393: 1
1394: 
1395: 
1396: 1
1397: net_useragent_mobile_common
1398: net_useragent_mobile_docomo
1399: DoCoMo
1400: 1
1401: 
1402: 
1403: 1
1404: net_useragent_mobile_common
1405: net_useragent_mobile_docomo
1406: DoCoMo
1407: 1
1408: 
1409: 
