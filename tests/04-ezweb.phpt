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
               array('UP.Browser/3.01-HI01 UP.Link/3.4.5.2', '3.01', 'HI01', 'UP.Link/3.4.5.2', FALSE, NULL, TRUE, FALSE),
               array('KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1', '6.0.2.276 (GUI)', 'TS21', 'MMP/1.1', TRUE, NULL, FALSE, TRUE),
               array('UP.Browser/3.04-TS14 UP.Link/3.4.4 (Google WAP Proxy/1.0)', '3.04', 'TS14', 'UP.Link/3.4.4', FALSE, 'Google WAP Proxy/1.0', TRUE, FALSE)
               );

$test_agents = array(
                     'KDDI-CA21 UP.Browser/6.0.6 (GUI) MMP/1.1',
                     'KDDI-CA21 UP.Browser/6.0.7.1 (GUI) MMP/1.1',
                     'KDDI-HI21 UP.Browser/6.0.2.213 (GUI) MMP/1.1',
                     'KDDI-HI21 UP.Browser/6.0.2.273 (GUI) MMP/1.1',
                     'KDDI-HI21 UP.Browser/6.0.6 (GUI) MMP/1.1',
                     'KDDI-KC21 UP.Browser/6.0.2.273 (GUI) MMP/1.1',
                     'KDDI-KC21 UP.Browser/6.0.5 (GUI) MMP/1.1',
                     'KDDI-KC21 UP.Browser/6.0.6 (GUI) MMP/1.1',
                     'KDDI-MA21 UP.Browser/6.0.2.276 (GUI) MMP/1.1',
                     'KDDI-MA21 UP.Browser/6.0.5 (GUI) MMP/1.1',
                     'KDDI-MA21 UP.Browser/6.0.6 (GUI) MMP/1.1',
                     'KDDI-MA21 UP.Browser/6.0.7 (GUI) MMP/1.1',
                     'KDDI-SA21 UP.Browser/6.0.6 (GUI) MMP/1.1',
                     'KDDI-SA21 UP.Browser/6.0.7 (GUI) MMP/1.1',
                     'KDDI-SA21 UP.Browser/6.0.7.1 (GUI) MMP/1.1',
                     'KDDI-SA22 UP.Browser/6.0.7.2 (GUI) MMP/1.1',
                     'KDDI-SN21 UP.Browser/6.0.7 (GUI) MMP/1.1',
                     'KDDI-SN22 UP.Browser/6.0.7 (GUI) MMP/1.1',
                     'KDDI-TS21 UP.Browser/6.0.2.273 (GUI) MMP/1.1',
                     'KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1',
                     'KDDI-TS21 UP.Browser/6.0.5.287 (GUI) MMP/1.1',
                     'KDDI-TS21 UP.Browser/6.0.6 (GUI) MMP/1.1',
                     'KDDI-TS22 UP.Browser/6.0.6 (GUI) MMP/1.1',
                     'KDDI-TS22 UP.Browser/6.0.7.1 (GUI) MMP/1.1',
                     'UP.Browser/3.01-HI01 UP.Link/3.4.5.2',
                     'UP.Browser/3.01-HI02 UP.Link/3.2.1.2',
                     'UP.Browser/3.03-HI11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.03-HI11 UP.Link/3.4.4',
                     'UP.Browser/3.03-KCT3 UP.Link/3.4.4',
                     'UP.Browser/3.03-SYC1 UP.Link/3.4.4',
                     'UP.Browser/3.03-TS11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.03-TST1 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-CA11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-CA11 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-CA11 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-CA11 UP.Link/3.4.4',
                     'UP.Browser/3.04-CA12 UP.Link/3.4.4',
                     'UP.Browser/3.04-CA13 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-CA13 UP.Link/3.4.4',
                     'UP.Browser/3.04-CA14 UP.Link/3.4.4',
                     'UP.Browser/3.04-DN11 UP.Link/3.3.0.1',
                     'UP.Browser/3.04-DN11 UP.Link/3.4.4',
                     'UP.Browser/3.04-HI11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-HI11 UP.Link/3.4.4',
                     'UP.Browser/3.04-HI12 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-HI12 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-HI12 UP.Link/3.4.4',
                     'UP.Browser/3.04-HI12 UP.Link/3.4.4 (Google WAP Proxy/1.0)',
                     'UP.Browser/3.04-HI13 UP.Link/3.4.4',
                     'UP.Browser/3.04-HI14 UP.Link/3.4.4',
                     'UP.Browser/3.04-HI14 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-KC11 UP.Link/3.4.4',
                     'UP.Browser/3.04-KC12 UP.Link/3.4.4',
                     'UP.Browser/3.04-KC13 UP.Link/3.4.4',
                     'UP.Browser/3.04-KC14 UP.Link/3.4.4',
                     'UP.Browser/3.04-KC15 UP.Link/3.4.4',
                     'UP.Browser/3.04-KCT4 UP.Link/3.4.4',
                     'UP.Browser/3.04-KCT5 UP.Link/3.4.4',
                     'UP.Browser/3.04-KCT6 UP.Link/3.4.4',
                     'UP.Browser/3.04-KCT7 UP.Link/3.4.4',
                     'UP.Browser/3.04-KCT8 UP.Link/3.4.4',
                     'UP.Browser/3.04-KCT9 UP.Link/3.4.4',
                     'UP.Browser/3.04-MA11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-MA11 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-MA11 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-MA11 UP.Link/3.4.4',
                     'UP.Browser/3.04-MA12 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-MA12 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-MA12 UP.Link/3.4.4',
                     'UP.Browser/3.04-MA12 UP.Link/3.4.4 (Google WAP Proxy/1.0)',
                     'UP.Browser/3.04-MA13 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-MA13 UP.Link/3.4.4',
                     'UP.Browser/3.04-MA13 UP.Link/3.4.4 (Google WAP Proxy/1.0)',
                     'UP.Browser/3.04-MA13 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-MAC2 UP.Link/3.4.4',
                     'UP.Browser/3.04-MAI1 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-MAI2 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-MAI2 UP.Link/3.4.4',
                     'UP.Browser/3.04-MAT1 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-MAT3 UP.Link/3.4.4',
                     'UP.Browser/3.04-MIT1 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-MIT1 UP.Link/3.4.4',
                     'UP.Browser/3.04-MIT1 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-SN11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-SN11 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-SN11 UP.Link/3.4.4',
                     'UP.Browser/3.04-SN11 UP.Link/3.4.4 (Google WAP Proxy/1.0)',
                     'UP.Browser/3.04-SN12 UP.Link/3.3.0.1',
                     'UP.Browser/3.04-SN12 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-SN12 UP.Link/3.4.4',
                     'UP.Browser/3.04-SN12 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-SN13 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-SN13 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-SN13 UP.Link/3.4.4',
                     'UP.Browser/3.04-SN14 UP.Link/3.4.4',
                     'UP.Browser/3.04-SN14 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-SN15 UP.Link/3.4.4',
                     'UP.Browser/3.04-SN15 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-SN16 UP.Link/3.4.4',
                     'UP.Browser/3.04-SN17 UP.Link/3.4.4',
                     'UP.Browser/3.04-SNI1 UP.Link/3.4.4',
                     'UP.Browser/3.04-ST11 UP.Link/3.3.0.1',
                     'UP.Browser/3.04-ST11 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-ST11 UP.Link/3.4.4',
                     'UP.Browser/3.04-ST12 UP.Link/3.4.4',
                     'UP.Browser/3.04-ST13 UP.Link/3.4.4',
                     'UP.Browser/3.04-SY11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-SY11 UP.Link/3.4.4',
                     'UP.Browser/3.04-SY12 UP.Link/3.3.0.1',
                     'UP.Browser/3.04-SY12 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-SY12 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-SY12 UP.Link/3.4.4',
                     'UP.Browser/3.04-SY12 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-SY12 UP.Link/3.4.5.6',
                     'UP.Browser/3.04-SY13 UP.Link/3.4.4',
                     'UP.Browser/3.04-SY14 UP.Link/3.4.4',
                     'UP.Browser/3.04-SY15 UP.Link/3.4.4',
                     'UP.Browser/3.04-SYT3 UP.Link/3.4.4',
                     'UP.Browser/3.04-SYT3 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-TS11 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-TS11 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-TS11 UP.Link/3.4.4',
                     'UP.Browser/3.04-TS12 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-TS12 UP.Link/3.3.0.1',
                     'UP.Browser/3.04-TS12 UP.Link/3.3.0.3',
                     'UP.Browser/3.04-TS12 UP.Link/3.3.0.5',
                     'UP.Browser/3.04-TS12 UP.Link/3.4.4',
                     'UP.Browser/3.04-TS13 UP.Link/3.4.4',
                     'UP.Browser/3.04-TS14 UP.Link/3.4.4',
                     'UP.Browser/3.04-TS14 UP.Link/3.4.4 (Google WAP Proxy/1.0)',
                     'UP.Browser/3.04-TS14 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-TSI1 UP.Link/3.2.2.7c',
                     'UP.Browser/3.04-TST3 UP.Link/3.4.4',
                     'UP.Browser/3.04-TST4 UP.Link/3.4.4',
                     'UP.Browser/3.04-TST4 UP.Link/3.4.5.2',
                     'UP.Browser/3.04-TST4 UP.Link/3.4.5.6',
                     'UP.Browser/3.04-TST5 UP.Link/3.4.4',
                     'UP.Browser/3.1-NT95 UP.Link/3.2',
                     'UP.Browser/3.1-SY11 UP.Link/3.2',
                     'UP.Browser/3.1-UPG1 UP.Link/3.2',
                     'UP.Browser/3.2.9.1-SA12 UP.Link/3.2',
                     'UP.Browser/3.2.9.1-UPG1 UP.Link/3.2'
                     );

$line = 0;

++$line;
print "$line: " . "Testing EZweb ...\n";

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
    print "$line: " . $agent->getDeviceID() . "\n";
    ++$line;
    print "$line: " . $agent->getServer() . "\n";
    ++$line;
    print "$line: " . $agent->isXHTMLCompliant() . "\n";
    ++$line;
    print "$line: " . $agent->getComment() . "\n";
    ++$line;
    print "$line: " . $agent->isWAP1() . "\n";
    ++$line;
    print "$line: " . $agent->isWAP2() . "\n";
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
1: Testing EZweb ...
2: 1
3: net_useragent_mobile_common
4: net_useragent_mobile_ezweb
5: 
6: 
7: 1
8: UP.Browser
9: UP.Browser/3.01-HI01 UP.Link/3.4.5.2
10: 3.01
11: HI01
12: UP.Link/3.4.5.2
13: 
14: 
15: 1
16: 
17: 1
18: net_useragent_mobile_common
19: net_useragent_mobile_ezweb
20: 
21: 
22: 1
23: UP.Browser
24: KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1
25: 6.0.2.276
26: TS21
27: MMP/1.1
28: 1
29: 
30: 
31: 1
32: 1
33: net_useragent_mobile_common
34: net_useragent_mobile_ezweb
35: 
36: 
37: 1
38: UP.Browser
39: UP.Browser/3.04-TS14 UP.Link/3.4.4 (Google WAP Proxy/1.0)
40: 3.04
41: TS14
42: UP.Link/3.4.4
43: 
44: Google WAP Proxy/1.0
45: 1
46: 
47: 1
48: net_useragent_mobile_common
49: net_useragent_mobile_ezweb
50: UP.Browser
51: 
52: 
53: 1
54: 1
55: net_useragent_mobile_common
56: net_useragent_mobile_ezweb
57: UP.Browser
58: 
59: 
60: 1
61: 1
62: net_useragent_mobile_common
63: net_useragent_mobile_ezweb
64: UP.Browser
65: 
66: 
67: 1
68: 1
69: net_useragent_mobile_common
70: net_useragent_mobile_ezweb
71: UP.Browser
72: 
73: 
74: 1
75: 1
76: net_useragent_mobile_common
77: net_useragent_mobile_ezweb
78: UP.Browser
79: 
80: 
81: 1
82: 1
83: net_useragent_mobile_common
84: net_useragent_mobile_ezweb
85: UP.Browser
86: 
87: 
88: 1
89: 1
90: net_useragent_mobile_common
91: net_useragent_mobile_ezweb
92: UP.Browser
93: 
94: 
95: 1
96: 1
97: net_useragent_mobile_common
98: net_useragent_mobile_ezweb
99: UP.Browser
100: 
101: 
102: 1
103: 1
104: net_useragent_mobile_common
105: net_useragent_mobile_ezweb
106: UP.Browser
107: 
108: 
109: 1
110: 1
111: net_useragent_mobile_common
112: net_useragent_mobile_ezweb
113: UP.Browser
114: 
115: 
116: 1
117: 1
118: net_useragent_mobile_common
119: net_useragent_mobile_ezweb
120: UP.Browser
121: 
122: 
123: 1
124: 1
125: net_useragent_mobile_common
126: net_useragent_mobile_ezweb
127: UP.Browser
128: 
129: 
130: 1
131: 1
132: net_useragent_mobile_common
133: net_useragent_mobile_ezweb
134: UP.Browser
135: 
136: 
137: 1
138: 1
139: net_useragent_mobile_common
140: net_useragent_mobile_ezweb
141: UP.Browser
142: 
143: 
144: 1
145: 1
146: net_useragent_mobile_common
147: net_useragent_mobile_ezweb
148: UP.Browser
149: 
150: 
151: 1
152: 1
153: net_useragent_mobile_common
154: net_useragent_mobile_ezweb
155: UP.Browser
156: 
157: 
158: 1
159: 1
160: net_useragent_mobile_common
161: net_useragent_mobile_ezweb
162: UP.Browser
163: 
164: 
165: 1
166: 1
167: net_useragent_mobile_common
168: net_useragent_mobile_ezweb
169: UP.Browser
170: 
171: 
172: 1
173: 1
174: net_useragent_mobile_common
175: net_useragent_mobile_ezweb
176: UP.Browser
177: 
178: 
179: 1
180: 1
181: net_useragent_mobile_common
182: net_useragent_mobile_ezweb
183: UP.Browser
184: 
185: 
186: 1
187: 1
188: net_useragent_mobile_common
189: net_useragent_mobile_ezweb
190: UP.Browser
191: 
192: 
193: 1
194: 1
195: net_useragent_mobile_common
196: net_useragent_mobile_ezweb
197: UP.Browser
198: 
199: 
200: 1
201: 1
202: net_useragent_mobile_common
203: net_useragent_mobile_ezweb
204: UP.Browser
205: 
206: 
207: 1
208: 1
209: net_useragent_mobile_common
210: net_useragent_mobile_ezweb
211: UP.Browser
212: 
213: 
214: 1
215: 1
216: net_useragent_mobile_common
217: net_useragent_mobile_ezweb
218: UP.Browser
219: 
220: 
221: 1
222: 1
223: net_useragent_mobile_common
224: net_useragent_mobile_ezweb
225: UP.Browser
226: 
227: 
228: 1
229: 1
230: net_useragent_mobile_common
231: net_useragent_mobile_ezweb
232: UP.Browser
233: 
234: 
235: 1
236: 1
237: net_useragent_mobile_common
238: net_useragent_mobile_ezweb
239: UP.Browser
240: 
241: 
242: 1
243: 1
244: net_useragent_mobile_common
245: net_useragent_mobile_ezweb
246: UP.Browser
247: 
248: 
249: 1
250: 1
251: net_useragent_mobile_common
252: net_useragent_mobile_ezweb
253: UP.Browser
254: 
255: 
256: 1
257: 1
258: net_useragent_mobile_common
259: net_useragent_mobile_ezweb
260: UP.Browser
261: 
262: 
263: 1
264: 1
265: net_useragent_mobile_common
266: net_useragent_mobile_ezweb
267: UP.Browser
268: 
269: 
270: 1
271: 1
272: net_useragent_mobile_common
273: net_useragent_mobile_ezweb
274: UP.Browser
275: 
276: 
277: 1
278: 1
279: net_useragent_mobile_common
280: net_useragent_mobile_ezweb
281: UP.Browser
282: 
283: 
284: 1
285: 1
286: net_useragent_mobile_common
287: net_useragent_mobile_ezweb
288: UP.Browser
289: 
290: 
291: 1
292: 1
293: net_useragent_mobile_common
294: net_useragent_mobile_ezweb
295: UP.Browser
296: 
297: 
298: 1
299: 1
300: net_useragent_mobile_common
301: net_useragent_mobile_ezweb
302: UP.Browser
303: 
304: 
305: 1
306: 1
307: net_useragent_mobile_common
308: net_useragent_mobile_ezweb
309: UP.Browser
310: 
311: 
312: 1
313: 1
314: net_useragent_mobile_common
315: net_useragent_mobile_ezweb
316: UP.Browser
317: 
318: 
319: 1
320: 1
321: net_useragent_mobile_common
322: net_useragent_mobile_ezweb
323: UP.Browser
324: 
325: 
326: 1
327: 1
328: net_useragent_mobile_common
329: net_useragent_mobile_ezweb
330: UP.Browser
331: 
332: 
333: 1
334: 1
335: net_useragent_mobile_common
336: net_useragent_mobile_ezweb
337: UP.Browser
338: 
339: 
340: 1
341: 1
342: net_useragent_mobile_common
343: net_useragent_mobile_ezweb
344: UP.Browser
345: 
346: 
347: 1
348: 1
349: net_useragent_mobile_common
350: net_useragent_mobile_ezweb
351: UP.Browser
352: 
353: 
354: 1
355: 1
356: net_useragent_mobile_common
357: net_useragent_mobile_ezweb
358: UP.Browser
359: 
360: 
361: 1
362: 1
363: net_useragent_mobile_common
364: net_useragent_mobile_ezweb
365: UP.Browser
366: 
367: 
368: 1
369: 1
370: net_useragent_mobile_common
371: net_useragent_mobile_ezweb
372: UP.Browser
373: 
374: 
375: 1
376: 1
377: net_useragent_mobile_common
378: net_useragent_mobile_ezweb
379: UP.Browser
380: 
381: 
382: 1
383: 1
384: net_useragent_mobile_common
385: net_useragent_mobile_ezweb
386: UP.Browser
387: 
388: 
389: 1
390: 1
391: net_useragent_mobile_common
392: net_useragent_mobile_ezweb
393: UP.Browser
394: 
395: 
396: 1
397: 1
398: net_useragent_mobile_common
399: net_useragent_mobile_ezweb
400: UP.Browser
401: 
402: 
403: 1
404: 1
405: net_useragent_mobile_common
406: net_useragent_mobile_ezweb
407: UP.Browser
408: 
409: 
410: 1
411: 1
412: net_useragent_mobile_common
413: net_useragent_mobile_ezweb
414: UP.Browser
415: 
416: 
417: 1
418: 1
419: net_useragent_mobile_common
420: net_useragent_mobile_ezweb
421: UP.Browser
422: 
423: 
424: 1
425: 1
426: net_useragent_mobile_common
427: net_useragent_mobile_ezweb
428: UP.Browser
429: 
430: 
431: 1
432: 1
433: net_useragent_mobile_common
434: net_useragent_mobile_ezweb
435: UP.Browser
436: 
437: 
438: 1
439: 1
440: net_useragent_mobile_common
441: net_useragent_mobile_ezweb
442: UP.Browser
443: 
444: 
445: 1
446: 1
447: net_useragent_mobile_common
448: net_useragent_mobile_ezweb
449: UP.Browser
450: 
451: 
452: 1
453: 1
454: net_useragent_mobile_common
455: net_useragent_mobile_ezweb
456: UP.Browser
457: 
458: 
459: 1
460: 1
461: net_useragent_mobile_common
462: net_useragent_mobile_ezweb
463: UP.Browser
464: 
465: 
466: 1
467: 1
468: net_useragent_mobile_common
469: net_useragent_mobile_ezweb
470: UP.Browser
471: 
472: 
473: 1
474: 1
475: net_useragent_mobile_common
476: net_useragent_mobile_ezweb
477: UP.Browser
478: 
479: 
480: 1
481: 1
482: net_useragent_mobile_common
483: net_useragent_mobile_ezweb
484: UP.Browser
485: 
486: 
487: 1
488: 1
489: net_useragent_mobile_common
490: net_useragent_mobile_ezweb
491: UP.Browser
492: 
493: 
494: 1
495: 1
496: net_useragent_mobile_common
497: net_useragent_mobile_ezweb
498: UP.Browser
499: 
500: 
501: 1
502: 1
503: net_useragent_mobile_common
504: net_useragent_mobile_ezweb
505: UP.Browser
506: 
507: 
508: 1
509: 1
510: net_useragent_mobile_common
511: net_useragent_mobile_ezweb
512: UP.Browser
513: 
514: 
515: 1
516: 1
517: net_useragent_mobile_common
518: net_useragent_mobile_ezweb
519: UP.Browser
520: 
521: 
522: 1
523: 1
524: net_useragent_mobile_common
525: net_useragent_mobile_ezweb
526: UP.Browser
527: 
528: 
529: 1
530: 1
531: net_useragent_mobile_common
532: net_useragent_mobile_ezweb
533: UP.Browser
534: 
535: 
536: 1
537: 1
538: net_useragent_mobile_common
539: net_useragent_mobile_ezweb
540: UP.Browser
541: 
542: 
543: 1
544: 1
545: net_useragent_mobile_common
546: net_useragent_mobile_ezweb
547: UP.Browser
548: 
549: 
550: 1
551: 1
552: net_useragent_mobile_common
553: net_useragent_mobile_ezweb
554: UP.Browser
555: 
556: 
557: 1
558: 1
559: net_useragent_mobile_common
560: net_useragent_mobile_ezweb
561: UP.Browser
562: 
563: 
564: 1
565: 1
566: net_useragent_mobile_common
567: net_useragent_mobile_ezweb
568: UP.Browser
569: 
570: 
571: 1
572: 1
573: net_useragent_mobile_common
574: net_useragent_mobile_ezweb
575: UP.Browser
576: 
577: 
578: 1
579: 1
580: net_useragent_mobile_common
581: net_useragent_mobile_ezweb
582: UP.Browser
583: 
584: 
585: 1
586: 1
587: net_useragent_mobile_common
588: net_useragent_mobile_ezweb
589: UP.Browser
590: 
591: 
592: 1
593: 1
594: net_useragent_mobile_common
595: net_useragent_mobile_ezweb
596: UP.Browser
597: 
598: 
599: 1
600: 1
601: net_useragent_mobile_common
602: net_useragent_mobile_ezweb
603: UP.Browser
604: 
605: 
606: 1
607: 1
608: net_useragent_mobile_common
609: net_useragent_mobile_ezweb
610: UP.Browser
611: 
612: 
613: 1
614: 1
615: net_useragent_mobile_common
616: net_useragent_mobile_ezweb
617: UP.Browser
618: 
619: 
620: 1
621: 1
622: net_useragent_mobile_common
623: net_useragent_mobile_ezweb
624: UP.Browser
625: 
626: 
627: 1
628: 1
629: net_useragent_mobile_common
630: net_useragent_mobile_ezweb
631: UP.Browser
632: 
633: 
634: 1
635: 1
636: net_useragent_mobile_common
637: net_useragent_mobile_ezweb
638: UP.Browser
639: 
640: 
641: 1
642: 1
643: net_useragent_mobile_common
644: net_useragent_mobile_ezweb
645: UP.Browser
646: 
647: 
648: 1
649: 1
650: net_useragent_mobile_common
651: net_useragent_mobile_ezweb
652: UP.Browser
653: 
654: 
655: 1
656: 1
657: net_useragent_mobile_common
658: net_useragent_mobile_ezweb
659: UP.Browser
660: 
661: 
662: 1
663: 1
664: net_useragent_mobile_common
665: net_useragent_mobile_ezweb
666: UP.Browser
667: 
668: 
669: 1
670: 1
671: net_useragent_mobile_common
672: net_useragent_mobile_ezweb
673: UP.Browser
674: 
675: 
676: 1
677: 1
678: net_useragent_mobile_common
679: net_useragent_mobile_ezweb
680: UP.Browser
681: 
682: 
683: 1
684: 1
685: net_useragent_mobile_common
686: net_useragent_mobile_ezweb
687: UP.Browser
688: 
689: 
690: 1
691: 1
692: net_useragent_mobile_common
693: net_useragent_mobile_ezweb
694: UP.Browser
695: 
696: 
697: 1
698: 1
699: net_useragent_mobile_common
700: net_useragent_mobile_ezweb
701: UP.Browser
702: 
703: 
704: 1
705: 1
706: net_useragent_mobile_common
707: net_useragent_mobile_ezweb
708: UP.Browser
709: 
710: 
711: 1
712: 1
713: net_useragent_mobile_common
714: net_useragent_mobile_ezweb
715: UP.Browser
716: 
717: 
718: 1
719: 1
720: net_useragent_mobile_common
721: net_useragent_mobile_ezweb
722: UP.Browser
723: 
724: 
725: 1
726: 1
727: net_useragent_mobile_common
728: net_useragent_mobile_ezweb
729: UP.Browser
730: 
731: 
732: 1
733: 1
734: net_useragent_mobile_common
735: net_useragent_mobile_ezweb
736: UP.Browser
737: 
738: 
739: 1
740: 1
741: net_useragent_mobile_common
742: net_useragent_mobile_ezweb
743: UP.Browser
744: 
745: 
746: 1
747: 1
748: net_useragent_mobile_common
749: net_useragent_mobile_ezweb
750: UP.Browser
751: 
752: 
753: 1
754: 1
755: net_useragent_mobile_common
756: net_useragent_mobile_ezweb
757: UP.Browser
758: 
759: 
760: 1
761: 1
762: net_useragent_mobile_common
763: net_useragent_mobile_ezweb
764: UP.Browser
765: 
766: 
767: 1
768: 1
769: net_useragent_mobile_common
770: net_useragent_mobile_ezweb
771: UP.Browser
772: 
773: 
774: 1
775: 1
776: net_useragent_mobile_common
777: net_useragent_mobile_ezweb
778: UP.Browser
779: 
780: 
781: 1
782: 1
783: net_useragent_mobile_common
784: net_useragent_mobile_ezweb
785: UP.Browser
786: 
787: 
788: 1
789: 1
790: net_useragent_mobile_common
791: net_useragent_mobile_ezweb
792: UP.Browser
793: 
794: 
795: 1
796: 1
797: net_useragent_mobile_common
798: net_useragent_mobile_ezweb
799: UP.Browser
800: 
801: 
802: 1
803: 1
804: net_useragent_mobile_common
805: net_useragent_mobile_ezweb
806: UP.Browser
807: 
808: 
809: 1
810: 1
811: net_useragent_mobile_common
812: net_useragent_mobile_ezweb
813: UP.Browser
814: 
815: 
816: 1
817: 1
818: net_useragent_mobile_common
819: net_useragent_mobile_ezweb
820: UP.Browser
821: 
822: 
823: 1
824: 1
825: net_useragent_mobile_common
826: net_useragent_mobile_ezweb
827: UP.Browser
828: 
829: 
830: 1
831: 1
832: net_useragent_mobile_common
833: net_useragent_mobile_ezweb
834: UP.Browser
835: 
836: 
837: 1
838: 1
839: net_useragent_mobile_common
840: net_useragent_mobile_ezweb
841: UP.Browser
842: 
843: 
844: 1
845: 1
846: net_useragent_mobile_common
847: net_useragent_mobile_ezweb
848: UP.Browser
849: 
850: 
851: 1
852: 1
853: net_useragent_mobile_common
854: net_useragent_mobile_ezweb
855: UP.Browser
856: 
857: 
858: 1
859: 1
860: net_useragent_mobile_common
861: net_useragent_mobile_ezweb
862: UP.Browser
863: 
864: 
865: 1
866: 1
867: net_useragent_mobile_common
868: net_useragent_mobile_ezweb
869: UP.Browser
870: 
871: 
872: 1
873: 1
874: net_useragent_mobile_common
875: net_useragent_mobile_ezweb
876: UP.Browser
877: 
878: 
879: 1
880: 1
881: net_useragent_mobile_common
882: net_useragent_mobile_ezweb
883: UP.Browser
884: 
885: 
886: 1
887: 1
888: net_useragent_mobile_common
889: net_useragent_mobile_ezweb
890: UP.Browser
891: 
892: 
893: 1
894: 1
895: net_useragent_mobile_common
896: net_useragent_mobile_ezweb
897: UP.Browser
898: 
899: 
900: 1
901: 1
902: net_useragent_mobile_common
903: net_useragent_mobile_ezweb
904: UP.Browser
905: 
906: 
907: 1
908: 1
909: net_useragent_mobile_common
910: net_useragent_mobile_ezweb
911: UP.Browser
912: 
913: 
914: 1
915: 1
916: net_useragent_mobile_common
917: net_useragent_mobile_ezweb
918: UP.Browser
919: 
920: 
921: 1
922: 1
923: net_useragent_mobile_common
924: net_useragent_mobile_ezweb
925: UP.Browser
926: 
927: 
928: 1
929: 1
930: net_useragent_mobile_common
931: net_useragent_mobile_ezweb
932: UP.Browser
933: 
934: 
935: 1
936: 1
937: net_useragent_mobile_common
938: net_useragent_mobile_ezweb
939: UP.Browser
940: 
941: 
942: 1
943: 1
944: net_useragent_mobile_common
945: net_useragent_mobile_ezweb
946: UP.Browser
947: 
948: 
949: 1
950: 1
951: net_useragent_mobile_common
952: net_useragent_mobile_ezweb
953: UP.Browser
954: 
955: 
956: 1
957: 1
958: net_useragent_mobile_common
959: net_useragent_mobile_ezweb
960: UP.Browser
961: 
962: 
963: 1
964: 1
965: net_useragent_mobile_common
966: net_useragent_mobile_ezweb
967: UP.Browser
968: 
969: 
970: 1
971: 1
972: net_useragent_mobile_common
973: net_useragent_mobile_ezweb
974: UP.Browser
975: 
976: 
977: 1
978: 1
979: net_useragent_mobile_common
980: net_useragent_mobile_ezweb
981: UP.Browser
982: 
983: 
984: 1
985: 1
986: net_useragent_mobile_common
987: net_useragent_mobile_ezweb
988: UP.Browser
989: 
990: 
991: 1
992: 1
993: net_useragent_mobile_common
994: net_useragent_mobile_ezweb
995: UP.Browser
996: 
997: 
998: 1
999: 1
1000: net_useragent_mobile_common
1001: net_useragent_mobile_ezweb
1002: UP.Browser
1003: 
1004: 
1005: 1
1006: 1
1007: net_useragent_mobile_common
1008: net_useragent_mobile_ezweb
1009: UP.Browser
1010: 
1011: 
1012: 1
1013: 1
1014: net_useragent_mobile_common
1015: net_useragent_mobile_ezweb
1016: UP.Browser
1017: 
1018: 
1019: 1
1020: 1
1021: net_useragent_mobile_common
1022: net_useragent_mobile_ezweb
1023: UP.Browser
1024: 
1025: 
1026: 1
1027: 1
1028: net_useragent_mobile_common
1029: net_useragent_mobile_ezweb
1030: UP.Browser
1031: 
1032: 
1033: 1
1034: 1
1035: net_useragent_mobile_common
1036: net_useragent_mobile_ezweb
1037: UP.Browser
1038: 
1039: 
1040: 1
