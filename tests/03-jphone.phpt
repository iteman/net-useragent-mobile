--TEST--
Net_UserAgent_Mobile: J-PHONE
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - J-PHONE
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$tests = array(
               // ua, version, model, packet_compliant, serial_number, vendor, vendor_version, java_infos
               array('J-PHONE/2.0/J-DN02', '2.0', 'J-DN02', false),
               array('J-PHONE/3.0/J-PE03_a', '3.0', 'J-PE03_a', false),
               array('J-PHONE/4.0/J-SH51/SNJSHA3029293 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0', '4.0', 'J-SH51', true, 'JSHA3029293', 'SH', '0001aa', array('Profile' => 'MIDP-1.0', 'Configuration' => 'CLDC-1.0', 'Ext-Profile' => 'JSCL-1.1.0')),
               array('J-PHONE/4.0/J-SH51/SNXXXXXXXXX SH/0001a Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0', '4.0', 'J-SH51', true, 'XXXXXXXXX', 'SH', '0001a', array('Profile' => 'MIDP-1.0', 'Configuration' => 'CLDC-1.0', 'Ext-Profile' => 'JSCL-1.1.0')),
               );

$test_agents = array(
                     'J-PHONE/1.0',
                     'J-PHONE/2.0/J-DN02',
                     'J-PHONE/2.0/J-P02',
                     'J-PHONE/2.0/J-P03',
                     'J-PHONE/2.0/J-SA02',
                     'J-PHONE/2.0/J-SH02',
                     'J-PHONE/2.0/J-SH03',
                     'J-PHONE/2.0/J-SH03_a',
                     'J-PHONE/2.0/J-SH04',
                     'J-PHONE/2.0/J-T04',
                     'J-PHONE/2.0/J-T05',
                     'J-PHONE/3.0/J-D03',
                     'J-PHONE/3.0/J-D04',
                     'J-PHONE/3.0/J-D05',
                     'J-PHONE/3.0/J-DN03',
                     'J-PHONE/3.0/J-K03',
                     'J-PHONE/3.0/J-K04',
                     'J-PHONE/3.0/J-K05',
                     'J-PHONE/3.0/J-N03',
                     'J-PHONE/3.0/J-N03B',
                     'J-PHONE/3.0/J-N04',
                     'J-PHONE/3.0/J-N05',
                     'J-PHONE/3.0/J-NM01_a',
                     'J-PHONE/3.0/J-NM02',
                     'J-PHONE/3.0/J-PE03',
                     'J-PHONE/3.0/J-PE03_a',
                     'J-PHONE/3.0/J-SA03_a',
                     'J-PHONE/3.0/J-SA04',
                     'J-PHONE/3.0/J-SA04_a',
                     'J-PHONE/3.0/J-SH04',
                     'J-PHONE/3.0/J-SH04_a',
                     'J-PHONE/3.0/J-SH04_b',
                     'J-PHONE/3.0/J-SH04_c',
                     'J-PHONE/3.0/J-SH05',
                     'J-PHONE/3.0/J-SH05_a',
                     'J-PHONE/3.0/J-SH06',
                     'J-PHONE/3.0/J-SH07',
                     'J-PHONE/3.0/J-SH08',
                     'J-PHONE/3.0/J-T05',
                     'J-PHONE/3.0/J-T06',
                     'J-PHONE/3.0/J-T06_a',
                     'J-PHONE/3.0/J-T07',
                     'J-PHONE/4.0/J-K51/SNJKWA3001061 KW/1.00 Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-K51/SNJKWA3040744 KW/1.00 Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-P51/SNJMAA1036146 MA/JDP51A36 Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51/SNJSHA1032366 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51/SNJSHA1041639 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51/SNJSHA2901949 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51/SNJSHA3008160 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51/SNJSHA3016183 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51/SNJSHA3029293 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51/SNXXXXXXXXX SH/0001a Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51_a/SNJSHA1045575 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51_a/SNJSHA1082487 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51_a/SNJSHA1086956 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51_a/SNJSHA3093881 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-SH51_a/SNJSHA5081372 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-T51/SNJTSA1077171 TS/1.00 Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-T51/SNJTSA1082745 TS/1.00 Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0',
                     'J-PHONE/4.0/J-T51/SNJTSA3001961 TS/1.00 Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0'
                     );

$line = 0;

++$line;
print "$line: " . "Testing J-PHONE ...\n";

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
    print "$line: " . $agent->getModel() . "\n";
    ++$line;
    print "$line: " . $agent->isPacketCompliant() . "\n";
    if (count($data) == 7) {
        ++$line;
        print "$line: " . $agent->getSerialNumber() . "\n";
        ++$line;
        print "$line: " . $agent->getVendor() . "\n";
        ++$line;
        print "$line: " . $agent->getVendorVersion() . "\n";
        $java_info = $agent->getJavaInfo();
        foreach ($data[6] as $key2 => $value2) {
            ++$line;
            print "$line: " . "Testing $key2 ...\n";
            switch ($key2) {
            case 'Profile':
                ++$line;
                print "$line: " . $java_info['Profile'] . "\n";
                break;
            case 'Configuration':
                ++$line;
                print "$line: " . $java_info['Configuration'] . "\n";
                break;
            case 'Ext-Profile':
                ++$line;
                print "$line: " . $java_info['Ext-Profile']  . "\n";
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
1: Testing J-PHONE ...
2: 1
3: net_useragent_mobile_common
4: net_useragent_mobile_jphone
5: 
6: 1
7: 
8: J-PHONE
9: J-PHONE/2.0/J-DN02
10: 2.0
11: J-DN02
12: 
13: 1
14: net_useragent_mobile_common
15: net_useragent_mobile_jphone
16: 
17: 1
18: 
19: J-PHONE
20: J-PHONE/3.0/J-PE03_a
21: 3.0
22: J-PE03_a
23: 
24: 1
25: net_useragent_mobile_common
26: net_useragent_mobile_jphone
27: 
28: 1
29: 
30: J-PHONE
31: J-PHONE/4.0/J-SH51/SNJSHA3029293 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0
32: 4.0
33: J-SH51
34: 1
35: JSHA3029293
36: SH
37: 0001aa
38: Testing Profile ...
39: MIDP-1.0
40: Testing Configuration ...
41: CLDC-1.0
42: Testing Ext-Profile ...
43: JSCL-1.1.0
44: 1
45: net_useragent_mobile_common
46: net_useragent_mobile_jphone
47: 
48: 1
49: 
50: J-PHONE
51: J-PHONE/4.0/J-SH51/SNXXXXXXXXX SH/0001a Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0
52: 4.0
53: J-SH51
54: 1
55: XXXXXXXXX
56: SH
57: 0001a
58: Testing Profile ...
59: MIDP-1.0
60: Testing Configuration ...
61: CLDC-1.0
62: Testing Ext-Profile ...
63: JSCL-1.1.0
64: 1
65: net_useragent_mobile_common
66: net_useragent_mobile_jphone
67: J-PHONE
68: 
69: 1
70: 
71: 1
72: net_useragent_mobile_common
73: net_useragent_mobile_jphone
74: J-PHONE
75: 
76: 1
77: 
78: 1
79: net_useragent_mobile_common
80: net_useragent_mobile_jphone
81: J-PHONE
82: 
83: 1
84: 
85: 1
86: net_useragent_mobile_common
87: net_useragent_mobile_jphone
88: J-PHONE
89: 
90: 1
91: 
92: 1
93: net_useragent_mobile_common
94: net_useragent_mobile_jphone
95: J-PHONE
96: 
97: 1
98: 
99: 1
100: net_useragent_mobile_common
101: net_useragent_mobile_jphone
102: J-PHONE
103: 
104: 1
105: 
106: 1
107: net_useragent_mobile_common
108: net_useragent_mobile_jphone
109: J-PHONE
110: 
111: 1
112: 
113: 1
114: net_useragent_mobile_common
115: net_useragent_mobile_jphone
116: J-PHONE
117: 
118: 1
119: 
120: 1
121: net_useragent_mobile_common
122: net_useragent_mobile_jphone
123: J-PHONE
124: 
125: 1
126: 
127: 1
128: net_useragent_mobile_common
129: net_useragent_mobile_jphone
130: J-PHONE
131: 
132: 1
133: 
134: 1
135: net_useragent_mobile_common
136: net_useragent_mobile_jphone
137: J-PHONE
138: 
139: 1
140: 
141: 1
142: net_useragent_mobile_common
143: net_useragent_mobile_jphone
144: J-PHONE
145: 
146: 1
147: 
148: 1
149: net_useragent_mobile_common
150: net_useragent_mobile_jphone
151: J-PHONE
152: 
153: 1
154: 
155: 1
156: net_useragent_mobile_common
157: net_useragent_mobile_jphone
158: J-PHONE
159: 
160: 1
161: 
162: 1
163: net_useragent_mobile_common
164: net_useragent_mobile_jphone
165: J-PHONE
166: 
167: 1
168: 
169: 1
170: net_useragent_mobile_common
171: net_useragent_mobile_jphone
172: J-PHONE
173: 
174: 1
175: 
176: 1
177: net_useragent_mobile_common
178: net_useragent_mobile_jphone
179: J-PHONE
180: 
181: 1
182: 
183: 1
184: net_useragent_mobile_common
185: net_useragent_mobile_jphone
186: J-PHONE
187: 
188: 1
189: 
190: 1
191: net_useragent_mobile_common
192: net_useragent_mobile_jphone
193: J-PHONE
194: 
195: 1
196: 
197: 1
198: net_useragent_mobile_common
199: net_useragent_mobile_jphone
200: J-PHONE
201: 
202: 1
203: 
204: 1
205: net_useragent_mobile_common
206: net_useragent_mobile_jphone
207: J-PHONE
208: 
209: 1
210: 
211: 1
212: net_useragent_mobile_common
213: net_useragent_mobile_jphone
214: J-PHONE
215: 
216: 1
217: 
218: 1
219: net_useragent_mobile_common
220: net_useragent_mobile_jphone
221: J-PHONE
222: 
223: 1
224: 
225: 1
226: net_useragent_mobile_common
227: net_useragent_mobile_jphone
228: J-PHONE
229: 
230: 1
231: 
232: 1
233: net_useragent_mobile_common
234: net_useragent_mobile_jphone
235: J-PHONE
236: 
237: 1
238: 
239: 1
240: net_useragent_mobile_common
241: net_useragent_mobile_jphone
242: J-PHONE
243: 
244: 1
245: 
246: 1
247: net_useragent_mobile_common
248: net_useragent_mobile_jphone
249: J-PHONE
250: 
251: 1
252: 
253: 1
254: net_useragent_mobile_common
255: net_useragent_mobile_jphone
256: J-PHONE
257: 
258: 1
259: 
260: 1
261: net_useragent_mobile_common
262: net_useragent_mobile_jphone
263: J-PHONE
264: 
265: 1
266: 
267: 1
268: net_useragent_mobile_common
269: net_useragent_mobile_jphone
270: J-PHONE
271: 
272: 1
273: 
274: 1
275: net_useragent_mobile_common
276: net_useragent_mobile_jphone
277: J-PHONE
278: 
279: 1
280: 
281: 1
282: net_useragent_mobile_common
283: net_useragent_mobile_jphone
284: J-PHONE
285: 
286: 1
287: 
288: 1
289: net_useragent_mobile_common
290: net_useragent_mobile_jphone
291: J-PHONE
292: 
293: 1
294: 
295: 1
296: net_useragent_mobile_common
297: net_useragent_mobile_jphone
298: J-PHONE
299: 
300: 1
301: 
302: 1
303: net_useragent_mobile_common
304: net_useragent_mobile_jphone
305: J-PHONE
306: 
307: 1
308: 
309: 1
310: net_useragent_mobile_common
311: net_useragent_mobile_jphone
312: J-PHONE
313: 
314: 1
315: 
316: 1
317: net_useragent_mobile_common
318: net_useragent_mobile_jphone
319: J-PHONE
320: 
321: 1
322: 
323: 1
324: net_useragent_mobile_common
325: net_useragent_mobile_jphone
326: J-PHONE
327: 
328: 1
329: 
330: 1
331: net_useragent_mobile_common
332: net_useragent_mobile_jphone
333: J-PHONE
334: 
335: 1
336: 
337: 1
338: net_useragent_mobile_common
339: net_useragent_mobile_jphone
340: J-PHONE
341: 
342: 1
343: 
344: 1
345: net_useragent_mobile_common
346: net_useragent_mobile_jphone
347: J-PHONE
348: 
349: 1
350: 
351: 1
352: net_useragent_mobile_common
353: net_useragent_mobile_jphone
354: J-PHONE
355: 
356: 1
357: 
358: 1
359: net_useragent_mobile_common
360: net_useragent_mobile_jphone
361: J-PHONE
362: 
363: 1
364: 
365: 1
366: net_useragent_mobile_common
367: net_useragent_mobile_jphone
368: J-PHONE
369: 
370: 1
371: 
372: 1
373: net_useragent_mobile_common
374: net_useragent_mobile_jphone
375: J-PHONE
376: 
377: 1
378: 
379: 1
380: net_useragent_mobile_common
381: net_useragent_mobile_jphone
382: J-PHONE
383: 
384: 1
385: 
386: 1
387: net_useragent_mobile_common
388: net_useragent_mobile_jphone
389: J-PHONE
390: 
391: 1
392: 
393: 1
394: net_useragent_mobile_common
395: net_useragent_mobile_jphone
396: J-PHONE
397: 
398: 1
399: 
400: 1
401: net_useragent_mobile_common
402: net_useragent_mobile_jphone
403: J-PHONE
404: 
405: 1
406: 
407: 1
408: net_useragent_mobile_common
409: net_useragent_mobile_jphone
410: J-PHONE
411: 
412: 1
413: 
414: 1
415: net_useragent_mobile_common
416: net_useragent_mobile_jphone
417: J-PHONE
418: 
419: 1
420: 
421: 1
422: net_useragent_mobile_common
423: net_useragent_mobile_jphone
424: J-PHONE
425: 
426: 1
427: 
428: 1
429: net_useragent_mobile_common
430: net_useragent_mobile_jphone
431: J-PHONE
432: 
433: 1
434: 
435: 1
436: net_useragent_mobile_common
437: net_useragent_mobile_jphone
438: J-PHONE
439: 
440: 1
441: 
442: 1
443: net_useragent_mobile_common
444: net_useragent_mobile_jphone
445: J-PHONE
446: 
447: 1
448: 
449: 1
450: net_useragent_mobile_common
451: net_useragent_mobile_jphone
452: J-PHONE
453: 
454: 1
455: 
456: 1
457: net_useragent_mobile_common
458: net_useragent_mobile_jphone
459: J-PHONE
460: 
461: 1
462: 
463: 1
464: net_useragent_mobile_common
465: net_useragent_mobile_jphone
466: J-PHONE
467: 
468: 1
469: 
470: 1
471: net_useragent_mobile_common
472: net_useragent_mobile_jphone
473: J-PHONE
474: 
475: 1
476: 
477: 1
478: net_useragent_mobile_common
479: net_useragent_mobile_jphone
480: J-PHONE
481: 
482: 1
483: 
484: 1
485: net_useragent_mobile_common
486: net_useragent_mobile_jphone
487: J-PHONE
488: 
489: 1
490: 
