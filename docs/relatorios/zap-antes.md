# ZAP Scanning Report

ZAP by [Checkmarx](https://checkmarx.com/).


## Summary of Alerts

| Risk Level | Number of Alerts |
| --- | --- |
| High | 3 |
| Medium | 4 |
| Low | 9 |
| Informational | 6 |




## Insights

| Level | Reason | Site | Description | Statistic |
| --- | --- | --- | --- | --- |
| Low | Warning |  | ZAP warnings logged - see the zap.log file for details | 8    |
| Info | Informational |  | Percentage of network failures | 1 % |
| Info | Informational | http://127.0.0.1:8000 | Percentage of responses with status code 2xx | 15 % |
| Info | Informational | http://127.0.0.1:8000 | Percentage of responses with status code 3xx | 42 % |
| Info | Exceeded Low | http://127.0.0.1:8000 | Percentage of responses with status code 4xx | 16 % |
| Info | Exceeded Low | http://127.0.0.1:8000 | Percentage of responses with status code 5xx | 25 % |
| Info | Informational | http://127.0.0.1:8000 | Percentage of endpoints with content type text/html | 83 % |
| Info | Informational | http://127.0.0.1:8000 | Percentage of endpoints with content type text/plain | 16 % |
| Info | Informational | http://127.0.0.1:8000 | Percentage of endpoints with method GET | 83 % |
| Info | Informational | http://127.0.0.1:8000 | Percentage of endpoints with method POST | 16 % |
| Info | Informational | http://127.0.0.1:8000 | Count of total endpoints | 6    |
| Info | Exceeded Low | http://127.0.0.1:8000 | Percentage of slow responses | 19 % |







## Alerts

| Name | Risk Level | Number of Instances |
| --- | --- | --- |
| Cross Site Scripting (DOM Based) | High | 1 |
| Cross Site Scripting (Reflected) | High | 1 |
| SQL Injection | High | 1 |
| Buffer Overflow | Medium | 3 |
| Content Security Policy (CSP) Header Not Set | Medium | 3 |
| Integer Overflow Error | Medium | 3 |
| Missing Anti-clickjacking Header | Medium | 2 |
| Big Redirect Detected (Potential Sensitive Information Leak) | Low | 1 |
| Cookie No HttpOnly Flag | Low | 4 |
| Cookie Slack Detector | Low | 3 |
| Cross-Origin-Embedder-Policy Header Missing or Invalid | Low | 2 |
| Cross-Origin-Opener-Policy Header Missing or Invalid | Low | 2 |
| Cross-Origin-Resource-Policy Header Missing or Invalid | Low | 3 |
| Permissions Policy Header Not Set | Low | 3 |
| Server Leaks Information via "X-Powered-By" HTTP Response Header Field(s) | Low | 5 |
| X-Content-Type-Options Header Missing | Low | 3 |
| Cookie Slack Detector | Informational | 2 |
| Non-Storable Content | Informational | 5 |
| Session Management Response Identified | Informational | 5 |
| Storable and Cacheable Content | Informational | 1 |
| User Agent Fuzzer | Informational | Systemic |
| User Controllable HTML Element Attribute (Potential XSS) | Informational | 1 |




## Alert Detail



### [ Cross Site Scripting (DOM Based) ](https://www.zaproxy.org/docs/alerts/40026/)



##### High (High)

### Description

Cross-site Scripting (XSS) is an attack technique that involves echoing attacker-supplied code into a user's browser instance. A browser instance can be a standard web browser client, or a browser object embedded in a software product such as the browser within WinAmp, an RSS reader, or an email client. The code itself is usually written in HTML/JavaScript, but may also extend to VBScript, ActiveX, Java, Flash, or any other browser-supported technology.
When an attacker gets a user's browser to execute his/her code, the code will run within the security context (or zone) of the hosting web site. With this level of privilege, the code has the ability to read, modify and transmit any sensitive data accessible by the browser. A Cross-site Scripted user could have his/her account hijacked (cookie theft), their browser redirected to another location, or possibly shown fraudulent content delivered by the web site they are visiting. Cross-site Scripting attacks essentially compromise the trust relationship between a user and the web site. Applications utilizing browser object instances which load content from the file system may execute code under the local machine zone allowing for system compromise.

There are three types of Cross-site Scripting attacks: non-persistent, persistent and DOM-based.
Non-persistent attacks and DOM-based attacks require a user to either visit a specially crafted link laced with malicious code, or visit a malicious web page containing a web form, which when posted to the vulnerable site, will mount the attack. Using a malicious form will oftentimes take place when the vulnerable resource only accepts HTTP POST requests. In such a case, the form can be submitted automatically, without the victim's knowledge (e.g. by using JavaScript). Upon clicking on the malicious link or submitting the malicious form, the XSS payload will get echoed back and will get interpreted by the user's browser and execute. Another technique to send almost arbitrary requests (GET and POST) is by using an embedded client, such as Adobe Flash.
Persistent attacks occur when the malicious code is submitted to a web site where it's stored for a period of time. Examples of an attacker's favorite targets often include message board posts, web mail messages, and web chat software. The unsuspecting user is not required to interact with any additional site/link (e.g. an attacker site or a malicious link sent via email), just simply view the web page containing the code.

* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP%3Fname=abc%23%3Cimg%20src=%22random.gif%22%20onerror=alert(5397&29%3E
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: ``
  * Attack: `?name=abc#<img src="random.gif" onerror=alert(5397)>`
  * Evidence: ``
  * Other Info: `The following steps were done to trigger the DOM XSS:
With <PAYLOAD_0> as: ?name=abc#<img src="random.gif" onerror=alert(5397)>
Access: http://127.0.0.1:8000/produtos?q=ZAP<PAYLOAD_0>
Write to /html/body/form[1]/input the value: <PAYLOAD_0>
Click element: /html/body/form[1]/input
Access: http://127.0.0.1:8000/produtos?q=ZAP<PAYLOAD_0>
Write to /html/body/form[2]/input[1] the value: <PAYLOAD_0>
Access: http://127.0.0.1:8000/produtos?q=ZAP<PAYLOAD_0>
Write to /html/body/form[2]/input[2] the value: <PAYLOAD_0>
Click element: /html/body/form[2]/input[2]
Access: http://127.0.0.1:8000/produtos?q=ZAP<PAYLOAD_0>
Write to /html/body/form[2]/input[3] the value: <PAYLOAD_0>
Click element: /html/body/form[2]/input[3]
Access: http://127.0.0.1:8000/produtos?q=ZAP<PAYLOAD_0>
Click element: /html/body/form[1]/button
`


Instances: 1

### Solution

Phase: Architecture and Design
Use a vetted library or framework that does not allow this weakness to occur or provides constructs that make this weakness easier to avoid.
Examples of libraries and frameworks that make it easier to generate properly encoded output include Microsoft's Anti-XSS library, the OWASP ESAPI Encoding module, and Apache Wicket.

Phases: Implementation; Architecture and Design
Understand the context in which your data will be used and the encoding that will be expected. This is especially important when transmitting data between different components, or when generating outputs that can contain multiple encodings at the same time, such as web pages or multi-part mail messages. Study all expected communication protocols and data representations to determine the required encoding strategies.
For any data that will be output to another web page, especially any data that was received from external inputs, use the appropriate encoding on all non-alphanumeric characters.
Consult the XSS Prevention Cheat Sheet for more details on the types of encoding and escaping that are needed.

Phase: Architecture and Design
For any security checks that are performed on the client side, ensure that these checks are duplicated on the server side, in order to avoid CWE-602. Attackers can bypass the client-side checks by modifying values after the checks have been performed, or by changing the client to remove the client-side checks entirely. Then, these modified values would be submitted to the server.

If available, use structured mechanisms that automatically enforce the separation between data and code. These mechanisms may be able to provide the relevant quoting, encoding, and validation automatically, instead of relying on the developer to provide this capability at every point where output is generated.

Phase: Implementation
For every web page that is generated, use and specify a character encoding such as ISO-8859-1 or UTF-8. When an encoding is not specified, the web browser may choose a different encoding by guessing which encoding is actually being used by the web page. This can cause the web browser to treat certain sequences as special, opening up the client to subtle XSS attacks. See CWE-116 for more mitigations related to encoding/escaping.

To help mitigate XSS attacks against the user's session cookie, set the session cookie to be HttpOnly. In browsers that support the HttpOnly feature (such as more recent versions of Internet Explorer and Firefox), this attribute can prevent the user's session cookie from being accessible to malicious client-side scripts that use document.cookie. This is not a complete solution, since HttpOnly is not supported by all browsers. More importantly, XMLHTTPRequest and other powerful browser technologies provide read access to HTTP headers, including the Set-Cookie header in which the HttpOnly flag is set.

Assume all input is malicious. Use an "accept known good" input validation strategy, i.e., use an allow list of acceptable inputs that strictly conform to specifications. Reject any input that does not strictly conform to specifications, or transform it into something that does. Do not rely exclusively on looking for malicious or malformed inputs (i.e., do not rely on a deny list). However, deny lists can be useful for detecting potential attacks or determining which inputs are so malformed that they should be rejected outright.

When performing input validation, consider all potentially relevant properties, including length, type of input, the full range of acceptable values, missing or extra inputs, syntax, consistency across related fields, and conformance to business rules. As an example of business rule logic, "boat" may be syntactically valid because it only contains alphanumeric characters, but it is not valid if you are expecting colors such as "red" or "blue."

Ensure that you perform input validation at well-defined interfaces within the application. This will help protect the application even if a component is reused or moved elsewhere.
	

### Reference


* [ https://owasp.org/www-community/attacks/xss/ ](https://owasp.org/www-community/attacks/xss/)
* [ https://cwe.mitre.org/data/definitions/79.html ](https://cwe.mitre.org/data/definitions/79.html)


#### CWE Id: [ 79 ](https://cwe.mitre.org/data/definitions/79.html)


#### WASC Id: 8

#### Source ID: 1

### [ Cross Site Scripting (Reflected) ](https://www.zaproxy.org/docs/alerts/40012/)



##### High (Medium)

### Description

Cross-site Scripting (XSS) is an attack technique that involves echoing attacker-supplied code into a user's browser instance. A browser instance can be a standard web browser client, or a browser object embedded in a software product such as the browser within WinAmp, an RSS reader, or an email client. The code itself is usually written in HTML/JavaScript, but may also extend to VBScript, ActiveX, Java, Flash, or any other browser-supported technology.
When an attacker gets a user's browser to execute his/her code, the code will run within the security context (or zone) of the hosting web site. With this level of privilege, the code has the ability to read, modify and transmit any sensitive data accessible by the browser. A Cross-site Scripted user could have his/her account hijacked (cookie theft), their browser redirected to another location, or possibly shown fraudulent content delivered by the web site they are visiting. Cross-site Scripting attacks essentially compromise the trust relationship between a user and the web site. Applications utilizing browser object instances which load content from the file system may execute code under the local machine zone allowing for system compromise.

There are three types of Cross-site Scripting attacks: non-persistent, persistent and DOM-based.
Non-persistent attacks and DOM-based attacks require a user to either visit a specially crafted link laced with malicious code, or visit a malicious web page containing a web form, which when posted to the vulnerable site, will mount the attack. Using a malicious form will oftentimes take place when the vulnerable resource only accepts HTTP POST requests. In such a case, the form can be submitted automatically, without the victim's knowledge (e.g. by using JavaScript). Upon clicking on the malicious link or submitting the malicious form, the XSS payload will get echoed back and will get interpreted by the user's browser and execute. Another technique to send almost arbitrary requests (GET and POST) is by using an embedded client, such as Adobe Flash.
Persistent attacks occur when the malicious code is submitted to a web site where it's stored for a period of time. Examples of an attacker's favorite targets often include message board posts, web mail messages, and web chat software. The unsuspecting user is not required to interact with any additional site/link (e.g. an attacker site or a malicious link sent via email), just simply view the web page containing the code.

* URL: http://127.0.0.1:8000/produtos%3Fq=%253C%252Fp%253E%253CscrIpt%253Ealert%25281%2529%253B%253C%252FscRipt%253E%253Cp%253E
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `q`
  * Attack: `</p><scrIpt>alert(1);</scRipt><p>`
  * Evidence: `</p><scrIpt>alert(1);</scRipt><p>`
  * Other Info: ``


Instances: 1

### Solution

Phase: Architecture and Design
Use a vetted library or framework that does not allow this weakness to occur or provides constructs that make this weakness easier to avoid.
Examples of libraries and frameworks that make it easier to generate properly encoded output include Microsoft's Anti-XSS library, the OWASP ESAPI Encoding module, and Apache Wicket.

Phases: Implementation; Architecture and Design
Understand the context in which your data will be used and the encoding that will be expected. This is especially important when transmitting data between different components, or when generating outputs that can contain multiple encodings at the same time, such as web pages or multi-part mail messages. Study all expected communication protocols and data representations to determine the required encoding strategies.
For any data that will be output to another web page, especially any data that was received from external inputs, use the appropriate encoding on all non-alphanumeric characters.
Consult the XSS Prevention Cheat Sheet for more details on the types of encoding and escaping that are needed.

Phase: Architecture and Design
For any security checks that are performed on the client side, ensure that these checks are duplicated on the server side, in order to avoid CWE-602. Attackers can bypass the client-side checks by modifying values after the checks have been performed, or by changing the client to remove the client-side checks entirely. Then, these modified values would be submitted to the server.

If available, use structured mechanisms that automatically enforce the separation between data and code. These mechanisms may be able to provide the relevant quoting, encoding, and validation automatically, instead of relying on the developer to provide this capability at every point where output is generated.

Phase: Implementation
For every web page that is generated, use and specify a character encoding such as ISO-8859-1 or UTF-8. When an encoding is not specified, the web browser may choose a different encoding by guessing which encoding is actually being used by the web page. This can cause the web browser to treat certain sequences as special, opening up the client to subtle XSS attacks. See CWE-116 for more mitigations related to encoding/escaping.

To help mitigate XSS attacks against the user's session cookie, set the session cookie to be HttpOnly. In browsers that support the HttpOnly feature (such as more recent versions of Internet Explorer and Firefox), this attribute can prevent the user's session cookie from being accessible to malicious client-side scripts that use document.cookie. This is not a complete solution, since HttpOnly is not supported by all browsers. More importantly, XMLHTTPRequest and other powerful browser technologies provide read access to HTTP headers, including the Set-Cookie header in which the HttpOnly flag is set.

Assume all input is malicious. Use an "accept known good" input validation strategy, i.e., use an allow list of acceptable inputs that strictly conform to specifications. Reject any input that does not strictly conform to specifications, or transform it into something that does. Do not rely exclusively on looking for malicious or malformed inputs (i.e., do not rely on a deny list). However, deny lists can be useful for detecting potential attacks or determining which inputs are so malformed that they should be rejected outright.

When performing input validation, consider all potentially relevant properties, including length, type of input, the full range of acceptable values, missing or extra inputs, syntax, consistency across related fields, and conformance to business rules. As an example of business rule logic, "boat" may be syntactically valid because it only contains alphanumeric characters, but it is not valid if you are expecting colors such as "red" or "blue."

Ensure that you perform input validation at well-defined interfaces within the application. This will help protect the application even if a component is reused or moved elsewhere.
	

### Reference


* [ https://owasp.org/www-community/attacks/xss/ ](https://owasp.org/www-community/attacks/xss/)
* [ https://cwe.mitre.org/data/definitions/79.html ](https://cwe.mitre.org/data/definitions/79.html)


#### CWE Id: [ 79 ](https://cwe.mitre.org/data/definitions/79.html)


#### WASC Id: 8

#### Source ID: 1

### [ SQL Injection ](https://www.zaproxy.org/docs/alerts/40018/)



##### High (Low)

### Description

SQL injection may be possible.

* URL: http://127.0.0.1:8000/produtos%3Fq=%2527
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `q`
  * Attack: `'`
  * Evidence: `HTTP/1.1 500 Internal Server Error`
  * Other Info: ``


Instances: 1

### Solution

Do not trust client side input, even if there is client side validation in place.
In general, type check all data on the server side.
If the application uses JDBC, use PreparedStatement or CallableStatement, with parameters passed by '?'
If the application uses ASP, use ADO Command Objects with strong type checking and parameterized queries.
If database Stored Procedures can be used, use them.
Do *not* concatenate strings into queries in the stored procedure, or use 'exec', 'exec immediate', or equivalent functionality!
Do not create dynamic SQL queries using simple string concatenation.
Escape all data received from the client.
Apply an 'allow list' of allowed characters, or a 'deny list' of disallowed characters in user input.
Apply the principle of least privilege by using the least privileged database user possible.
In particular, avoid using the 'sa' or 'db-owner' database users. This does not eliminate SQL injection, but minimizes its impact.
Grant the minimum database access that is necessary for the application.

### Reference


* [ https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html ](https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html)


#### CWE Id: [ 89 ](https://cwe.mitre.org/data/definitions/89.html)


#### WASC Id: 19

#### Source ID: 1

### [ Buffer Overflow ](https://www.zaproxy.org/docs/alerts/30001/)



##### Medium (Medium)

### Description

Buffer overflow errors are characterized by the overwriting of memory spaces of the background web process, which should have never been modified intentionally or unintentionally. Overwriting values of the IP (Instruction Pointer), BP (Base Pointer) and other registers causes exceptions, segmentation faults, and other process errors to occur. Usually these errors end execution of the application in an unexpected way.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `descricao`
  * Attack: `PfcjNsFsDfUbvNyGIwpayrWnWDiPmBXbWlHWWqaVHkjlDaQsqLaXVwSKPXlMuolSKCAMaqMvTVuvBTFIExeWShqKVRekxmIrjeIedaKZHmMcKAOwCppJjQTNkHWkoaWaWprtmGWMpimlfAuhYZuCdmkJJsDIDiaKvjiCTSoKFWnDddRfIyoboAyAvZCJpaNUYtngWNZIHTgTSBglLocNLgiIRrXfjZeFqqTZJIIKDDCfcKnWEQiMWRowBguqptgKHBNiNLeYfihDCctGSysRTqHQpejZphOVyWFWCcOekeEnDXoWKNVrNeZAMKscchsDubhRpkCVMPWlLedSQQObLKIrkqZIbbgQEgGNIVIkmbOXupiJBUBYVBLLUbZUYJpniRyTFcdMCDkcOwqsgRDTkcYilqBGWuIlkIBtbDxOsJihoxSmdTsUqsNgXIZVeESileQGwLirwthcELxMEWkbqyWGNObyMjjjprrqaMQieGNvUIekSxBpwPHtUIwjAJCRToBKZmFIsRyYjyIJtxBoxdWXsbNjMSeOKJTmHBwaJQkHBLUjcLkExoAEihVdhmVTwffUDtbHCNEGxCnPoXCwWOIrTUWxafchNwFKBigClZoKAHvQFUawyoGGHGyZLQEVmqjneIRGKFheouteRuHBbnCVtfoArmbspRuqxTIrqXrkwdDPHoIkmjpEZufHsaUnQdXGoSGlfGEYBNHJLQtIJuQMsDwhlUThbmqOOFsXErceFvMCqHWMwUhPLXmqVNNIKEtTaaPNrGQyhZWTqmHtPAqrKVnKAvkSMMLFPkoiRXvVgHaWLSItWrWLXitUqxpfEpQGuhjYgMNZIRfIUGaLpUgIysJXRULWakwdGVPFhHHNlcQbnigcPGCSRqcfkunYwftOfwMDNEiZYCdfMWRHqqRCqdcQouwVtfFicuYXoYBWRQKPGXYAgRXWcmUMlFQpESWQtQDkCTvPhSUElAFPnEdKGqwnCEaJBKMWGMOWJaoLPwCraVtGePlCLSqqCQXHksISSurdyfRHiUvHhjYnRcmqxatgvbtTGCArPlyQNlCNyyloASiRmqtdBYUgucePIlWRMiaiYriFlPOkpGbKqVBXySTIsJoIIZbaKIOdgQOuEwKZcqCUIOZkMhGNoMOwHHhEjDViWZneVYBYHIIfOjqmuuNGwWhtojywprhjkkuxsriAFWiEGQMshYHtiIYuuuRNupPQbGREdPIRtHNtwvCLbOAcFFwWwBHALVtXssHVYTWHPLuSfLcrpwLAIUvPjoQmuBRpYOEFFCUqkUNxaxenHKftVcsdEPQZIxZtfIHyrurVDZVkbqyaxfSIodCoYrHduxWyaGYJZdFnnvGeSPtiqhvUwomxIHZvAfjpICAWRdknFwAJOnjVEMQTWnmMCiOnCyFCrZOQbtqsHjUSwKZnPhjprSwqiKkwYxejgtehsusjYhUSCXBopxASAlFqlHiAUIRgFiuZLfqdaCVbfMiaYGULXbYSSSGVNNokgmBxmrkAJNSNPRWnOeshulCRyRvaMYAfXipfheBVghWSsWbWvExqVUyffTIcAPEbmwZqFlmKYSEnSpwjkPqiJwHQavXKjViMxdItqSecLqIMOdGVUGZcoiwyxZUIVrahAFrVGbowaipGrrACMNPcVTbiIfpRXnkCUrhnxenImnvMpxBlOXIaKFhcuHoJGwWffNAIYhwQSwvYhyOREyEXnbBjwTrHiAtaiMFhxApSAfEWAmauILUhoXpdrWZBTWnGBKybeINRGrqVgveJcQddHmPIAdTvvKJCBrqsKwplandhIMmMtuYkdBDSjohnqNoYyArnXVEunIaYFHmvGxtDKhfWMQhCWbwoSTYXmAtINoXOIHKYalDrNweluEIoSxJPZdHRDEbNsXbLfcaflDdriPhcTFUjvHfAHGpxhDTlbJIEgHOtHVNbTgUKpfygfRpVXNgvQbHUswJoSrkgObwygjDdCGtBFaSvxQvaMMWEVYkJCbAwLDsnNFUpXaGIRqKSGuqnUhCPuRUXIfTDwCimMvBffmIPQZwBcuFPUaRtTrJvVaZNADXSLnkNjcUNquGnPCvTlnfIOsFv`
  * Evidence: `Connection: close`
  * Other Info: `Potential Buffer Overflow. The script closed the connection and threw a 500 Internal Server Error.`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `nome`
  * Attack: `qjDYWmDZAcTewhTtCwUidnDpNPewCHnNsfMmVMrIpsLImKpEYLiUktcgygghDQlmSNKgItHoDxYRNpdHeZGPPdHNeHtMoDPHqyYohrhDrhyaDCUNMbqokOyFXnsBamEbdZAWamRpRccXLRcZPZaFrEDNsdArVdorAViwoldkIlTEsiVgIJqsrRnMUxtkuisaDbsdLNYXOwYncjgbFIfIqUVCxNdfqODiFBNKBtydGDpirLjGSPjtBqXaHCRMmtCxYYSiQynJINyaWTLxWLKjxCjmQvFuhkXQJAFxqLcuPjFtJBTkdUQbgkwXWYcQSxBqLZUoOijKmawyxPdYqKPwuuPkIMpYUahSYotYrQqqyKrDBbLDMQZqQwGMCRngMruTWTLvCpSLhwqNaPfkxGKBlGYZebQFlCAepqJrbacqoqZLKfmaMdyQweRuTCuvUItcPFhkjedSNqVIcbcsIlXTIxuDqqAYdIedxMiuXQqBfoyWLiVSjAxqmhPXmGbuYODUlmGRJYvBGyCBijrZnFMllxAPSBCZascqhIMLfYRZZdpVeRkWCTNUhKWYHSBckwjkFomZbnXbWbHQUtEIeiFrtpWRMyirHaJTHKVqqIGRPgvlNsUfbBkrjXugGUIoKNHiBjaXNPMnVoNnTFRnRkjeWstFqQcOkTaEpqDbLTDPRxPNkUHcqQulFdPhkqsFPnqmrxqCjTNpWCrVFwgpjaVGaPxLxgDjvSYUgEKJHcaThpDmsTXFluFVMinZpYNcUQibJfQkjDoXRKtuGINuIFSWgHUoCXhEfyMaJXugUCCOZYUrAQiVAYnVeadNfjdjmIAmPMiDUSIZytRyVsSjufLVYdPSJgTBAxBKvPWGbqsDFgYmMcNiIBfxtPbhYXCACnoJpJCLvRMxVqeSwJAyuyBJsqofejvYwqyhvyDcVhWFwcwfOoijQrNEVMICqxJkWIOvTkKpgINmtWeVhrXWDDQSEVLwEVXxsyykOMUPavFDDOsRUKGsbsWiXgrBLteNIbofLqbiCINjBmYqkbmFYqrmmAQUfXJhNbSSLZwNwmijdNCShRWbWIqGaXQOcViTWFYAYDSnbEHKYlECGDcSNYlRYkDOuLbyZGWMKwLAPoeyWgXRFawGEPgkYDbwbQYVeWeoISjkLwmRYYAugrDQUvClilDssNDmQdqvSainfLqyEQpfdhDZOgsRpvIJYyTZaynOgabhIfTBViTFUoHDbMdRCikYxbDLjuvIOUcnUTPiBDcAviHnXAlElCgvwBndaUUotEsPrRHkMCUYhAGhTucDdLuWfXMBDiDMTOFLwWmAIVPuuQGNgsEwyCAyoLJOrPSFqTjfmscKuLcEQKglfkjpAFaHkXDMgtQVgeHSxUXKuoeLsHgUufsZcHwVCDNWASqqyADMNeGkEUxefaIorTwnGxcyXOxbjjuojIcdbBNTwGeMJOxTRAjLuaYXmOFcXuaVAOFAffEZQUbDKrPubEXyNXxscgkjnlqTUQZOEIwbRMXoAyPKBNcwHpFrJPFqxmdJXFZGIWyQpPEZgwtQIHlSpREDWxHaBxaBdAbkPAvVDwNVOWUsfbMRbDDGjhQhSNDEDqeEhNvYilmuEuqoEKgjGWoQNywmDinFhIoZnEwTTTJwTXEEOSZDAOLpMJbOcNlWYjLlwdgyARTVbWAYcPiZhlkevceRMncVfuPqrDVWdUTwtAksUieHgmbokHfDjDWXZkFOpThIqRvMClCDBqeVhnrwvVtJnstLaZKFGEjeltyfLgZemacnKLeTHNllmDCAJaZRFLNvLKYNwZEhDlVLdOBYLTjboTCiQaVksjTwBLrrQSpapnIKrvOjCsxDHLTTeOwphjUnhmJTphRglCWeNWpqawSwDGNDdQijYNgtCFbeRUwhNBCEfLDabmnqKvPBtZLOMIEktbqPfDWttPyWOykmSrtKcArKoOLBfWsuNqciUAyQvrNpLgGDdVrlswvFgoYKntbJgngtBuVAeSRdaTOEmKdnBsqeWerKhakGalTmhRvWwyKFKApJlXIWWglmuIotboPaqITwuSSdWZjPrYZdLUOxXxxeDgxfLwaZSgSWnDwukaMK`
  * Evidence: `Connection: close`
  * Other Info: `Potential Buffer Overflow. The script closed the connection and threw a 500 Internal Server Error.`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `preco`
  * Attack: `gAIhcDqUTMXxVAbjtKathldwGUTYtwHXOoWbgFpqGNUjmDpBvlduqZlTiypouFVsgEuuKttwQQFhNKgdWEnBcMdwYdBsOkKxbyLTIAKtlPFkYZBgdSFsTcswTdcavgDlCQgSvaSwvgpQQvkVJkrUOpYoiwUuKPTILIuwPtUThCMHqADuVwkjrPyJaZNrqrGmVwkHKiuOOYNiGqNjOIGyRMKmJnyCSbEMffshsoUtesGDuBNtjddIfkwDeIUdWfLncBxwewwgwelWwgXBcobxQaKOeeZORgyutOndxdkNpArOXeZrETpBSiDwuLrJbHUEtYOIAkOZaQcacwXhiUhFCQVyeDEPfxanGUSdnxxoIuOukHsVEpKfTtqClBvWUEgxUTlPGCeUXgguKmanKtBoICYsicUjKgDrlnWTryTKLqQJuGfCaeBmsxfwGZDANiuBBLBpbgfIsWbtouWhaeJUulxFKNGVBSdjmDogwvBnRSxyLbWRjjfxwjtbhpnstsERYqZfGELVAhvdJCASBJiILJXmXZvRgoOhVnvHyIffOcjgTlPTyRdBicYJiYphREbtneIQXAqddFKuwonMMZaDXGXldUxYWroKhAhpcalPUBElLJuknrOKbPalmLAyHACrfVPIWUSyApbEBMeIyunxMEwGDxdoRSISuymYfqKvvNTCSOGNtNugUSGWtCqbbKjUYeWBoPKJhOWAuNugPFxirwXBAcnQQTnCcYIXXJqKxhSRVUWISSoJpGiwWLUfnHWPXSVlWDYgGXvlAiFsvEafVyXryrmbSjIoAgZSlBABCVeQaHLBbRCJfxykqmupwVeGyCuEMvYqEYMyeblwgZrADyFdxNKSXCxeMHSkjIBVuNesUGVBTatUqhFBBElVSeNWVvlwXvsSHAVGrAewUqqwQbkrWtdaDGyyUedaNBrtjjCLFGvLMMebYvXrFSXRhxxhSdyneWYuwamtemqGZTvVZcdkmnroiiRpWcMngkbAVcWLJKPBCcRhwhEpHXvWqxJUJDNSeSTdhVVmGhZYQPJfHyXEIZloSokTVcPynUfjeNXLObWuqxTcjImiKnMDKwaelcSyanYpsumEFEGRVFsqgpTGKKxhykPjKcWPvvkLsoUyuJApwqWZTZVaxokPKDqZBTTwrygAyKWKFleTNlwefNytEaBeovrPtHipvwngiSTjsKbiVmtCxZxsiRllkMKeaEPoDqcQNyJPqRIJeNJZlVqwLgUSTWkmQeFvlQmKWZvQfbueHPRvhjvUJICpAHeSKQkkkWIjBZIKQaFMxVXTdGNreKSHAytJEdPjRWGlQpqGeNtcAekrZUNGOKEIOLAyUADMLJxJbRHrhjdDwkhWCUYvXbkNTSqbdTwtYflmODtwZmSNTYvndRKqoQAuXjPoLRRUFwjfjiSfIiccAqirsmRKLoYdlvAquYvfEaoLcbcTceHIGmbXboUSojkNXqRmBXugLXQHOZrQrrdsYTDyZmUuFXIiPjhxsCxLvZqdErESOcBJkTjltHCyfVDHlYCCHNkePpeuOpuDMxgVGhMyxoLPjUQybrxwqbxwHiOxTZVkHIsbapILfwJSFqZkGJvyYnJCoMecoDIpmOWtvmOZWrqghdnbaBWQUWWSAiSVCmEVmrcPDrKAPIBkgXFtQTYCoRESvgmakfFHVJbHrerbabLhFUouMgTnsvBoLmMtchoNwRGKJpgKMbHAFMWfCRukiTRPTuGPYlnMdHRHCiaXImJbndVkHJXlGMTNZDFDdbnkgEgpnaBREqQbVdIdhXPCUSHfDixJfrZeccOdLihTsmQWMLldJDQVmDZAqAUhgyXctuaHGurpvVFfYpXbqdjEXNxTViHYaCjuUbZbkiGOPxcQvrNphmcvPaAYgFxDxarDkOuhWWZcycrNZQMlYVdtGqreduuvYrrKWrmgPBeoabYgsViDFYWJNunoleiiHeRXSHkCrvUxAOtdUDsnBmkxIrdZqGAtXHDnAGJUhSvThaTKBLaBdybZsCmCQSdADfddceqVaFueVuSsTUofsDVqjDWMBTxWBpyTNjXTGAiKUCnVvtsbkyGlpsVVapaaNTymVYXQxDNQ`
  * Evidence: `Connection: close`
  * Other Info: `Potential Buffer Overflow. The script closed the connection and threw a 500 Internal Server Error.`


Instances: 3

### Solution

Rewrite the background program using proper return length checking. This will require a recompile of the background executable.

### Reference


* [ https://owasp.org/www-community/attacks/Buffer_overflow_attack ](https://owasp.org/www-community/attacks/Buffer_overflow_attack)


#### CWE Id: [ 120 ](https://cwe.mitre.org/data/definitions/120.html)


#### WASC Id: 7

#### Source ID: 1

### [ Content Security Policy (CSP) Header Not Set ](https://www.zaproxy.org/docs/alerts/10038/)



##### Medium (High)

### Description

Content Security Policy (CSP) is an added layer of security that helps to detect and mitigate certain types of attacks, including Cross Site Scripting (XSS) and data injection attacks. These attacks are used for everything from data theft to site defacement or distribution of malware. CSP provides a set of standard HTTP headers that allow website owners to declare approved sources of content that browsers should be allowed to load on that page — covered types are JavaScript, CSS, HTML frames, fonts, images and embeddable objects such as Java applets, ActiveX, audio and video files.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/sitemap.xml
  * Node Name: `http://127.0.0.1:8000/sitemap.xml`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: ``


Instances: 3

### Solution

Ensure that your web server, application server, load balancer, etc. is configured to set the Content-Security-Policy header.

### Reference


* [ https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/CSP ](https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/CSP)
* [ https://cheatsheetseries.owasp.org/cheatsheets/Content_Security_Policy_Cheat_Sheet.html ](https://cheatsheetseries.owasp.org/cheatsheets/Content_Security_Policy_Cheat_Sheet.html)
* [ https://www.w3.org/TR/CSP/ ](https://www.w3.org/TR/CSP/)
* [ https://w3c.github.io/webappsec-csp/ ](https://w3c.github.io/webappsec-csp/)
* [ https://web.dev/articles/csp ](https://web.dev/articles/csp)
* [ https://caniuse.com/#feat=contentsecuritypolicy ](https://caniuse.com/#feat=contentsecuritypolicy)
* [ https://content-security-policy.com/ ](https://content-security-policy.com/)


#### CWE Id: [ 693 ](https://cwe.mitre.org/data/definitions/693.html)


#### WASC Id: 15

#### Source ID: 3

### [ Integer Overflow Error ](https://www.zaproxy.org/docs/alerts/30003/)



##### Medium (Medium)

### Description

An integer overflow condition exists when an integer used in a compiled program extends beyond the range limits and has not been properly checked from the input stream.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `descricao`
  * Attack: `00793582170876689771538057728464873492083835`
  * Evidence: `HTTP/1.1 500 Internal Server Error`
  * Other Info: `Potential Integer Overflow. Status code changed on the input of a long string of random integers.`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `nome`
  * Attack: `74725138576208144133013210010643484435044520`
  * Evidence: `HTTP/1.1 500 Internal Server Error`
  * Other Info: `Potential Integer Overflow. Status code changed on the input of a long string of random integers.`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `preco`
  * Attack: `61910220809975851876847584216712709848263298`
  * Evidence: `HTTP/1.1 500 Internal Server Error`
  * Other Info: `Potential Integer Overflow. Status code changed on the input of a long string of random integers.`


Instances: 3

### Solution

In order to prevent overflows and divide by 0 (zero) errors in the application, please rewrite the backend program, checking if the values of integers being processed are within the application's allowed range. This will require a recompilation of the backend executable.

### Reference


* [ https://en.wikipedia.org/wiki/Integer_overflow ](https://en.wikipedia.org/wiki/Integer_overflow)
* [ https://cwe.mitre.org/data/definitions/190.html ](https://cwe.mitre.org/data/definitions/190.html)


#### CWE Id: [ 190 ](https://cwe.mitre.org/data/definitions/190.html)


#### WASC Id: 3

#### Source ID: 1

### [ Missing Anti-clickjacking Header ](https://www.zaproxy.org/docs/alerts/10020/)



##### Medium (Medium)

### Description

The response does not protect against 'ClickJacking' attacks. It should include either Content-Security-Policy with 'frame-ancestors' directive or X-Frame-Options.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `x-frame-options`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `x-frame-options`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``


Instances: 2

### Solution

Modern Web browsers support the Content-Security-Policy and X-Frame-Options HTTP headers. Ensure one of them is set on all web pages returned by your site/app.
If you expect the page to be framed only by pages on your server (e.g. it's part of a FRAMESET) then you'll want to use SAMEORIGIN, otherwise if you never expect the page to be framed, you should use DENY. Alternatively consider implementing Content Security Policy's "frame-ancestors" directive.

### Reference


* [ https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/X-Frame-Options ](https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/X-Frame-Options)


#### CWE Id: [ 1021 ](https://cwe.mitre.org/data/definitions/1021.html)


#### WASC Id: 15

#### Source ID: 3

### [ Big Redirect Detected (Potential Sensitive Information Leak) ](https://www.zaproxy.org/docs/alerts/10044/)



##### Low (Medium)

### Description

The server has responded with a redirect that seems to provide a large response. This may indicate that although the server sent a redirect it also responded with body content (which may include sensitive details, PII, etc.).

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: `Location header URI length: 30 [http://127.0.0.1:8000/produtos].
Predicted response size: 330.
Response Body Length: 366.`


Instances: 1

### Solution

Ensure that no sensitive information is leaked via redirect responses. Redirect responses should have almost no content.

### Reference



#### CWE Id: [ 201 ](https://cwe.mitre.org/data/definitions/201.html)


#### WASC Id: 13

#### Source ID: 3

### [ Cookie No HttpOnly Flag ](https://www.zaproxy.org/docs/alerts/10010/)



##### Low (Medium)

### Description

A cookie has been set without the HttpOnly flag, which means that the cookie can be accessed by JavaScript. If a malicious script can be run on this page then the cookie will be accessible and can be transmitted to another site. If this is a session cookie then session hijacking may be possible.

* URL: http://127.0.0.1:8000/
  * Node Name: `http://127.0.0.1:8000/`
  * Method: `GET`
  * Parameter: `XSRF-TOKEN`
  * Attack: ``
  * Evidence: `Set-Cookie: XSRF-TOKEN`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `XSRF-TOKEN`
  * Attack: ``
  * Evidence: `Set-Cookie: XSRF-TOKEN`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `XSRF-TOKEN`
  * Attack: ``
  * Evidence: `Set-Cookie: XSRF-TOKEN`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `XSRF-TOKEN`
  * Attack: ``
  * Evidence: `Set-Cookie: XSRF-TOKEN`
  * Other Info: ``


Instances: 4

### Solution

Ensure that the HttpOnly flag is set for all cookies.

### Reference


* [ https://owasp.org/www-community/HttpOnly ](https://owasp.org/www-community/HttpOnly)


#### CWE Id: [ 1004 ](https://cwe.mitre.org/data/definitions/1004.html)


#### WASC Id: 13

#### Source ID: 3

### [ Cookie Slack Detector ](https://www.zaproxy.org/docs/alerts/90027/)



##### Low (Low)

### Description

Repeated GET requests: drop a different cookie each time, followed by normal request with all cookies to stabilize session, compare responses against original baseline GET. This can reveal areas where cookie based authentication/attributes are not actually enforced.

* URL: http://127.0.0.1:8000
  * Node Name: `http://127.0.0.1:8000`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: `NOTE: Because of its name this cookie may be important, but dropping it appears to have no effect: [laravel-session]
Cookies that don't have expected effects can reveal flaws in application logic. In the worst case, this can reveal where authentication via cookie token(s) is not actually enforced.
These cookies affected the response: 
These cookies did NOT affect the response: XSRF-TOKEN,laravel-session
`
* URL: http://127.0.0.1:8000/
  * Node Name: `http://127.0.0.1:8000/`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: `NOTE: Because of its name this cookie may be important, but dropping it appears to have no effect: [laravel-session]
Cookies that don't have expected effects can reveal flaws in application logic. In the worst case, this can reveal where authentication via cookie token(s) is not actually enforced.
These cookies affected the response: 
These cookies did NOT affect the response: XSRF-TOKEN,laravel-session
`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: `NOTE: Because of its name this cookie may be important, but dropping it appears to have no effect: [laravel-session]
Cookies that don't have expected effects can reveal flaws in application logic. In the worst case, this can reveal where authentication via cookie token(s) is not actually enforced.
These cookies affected the response: 
These cookies did NOT affect the response: XSRF-TOKEN,laravel-session
`


Instances: 3

### Solution



### Reference


* [ https://cwe.mitre.org/data/definitions/205.html ](https://cwe.mitre.org/data/definitions/205.html)


#### CWE Id: [ 205 ](https://cwe.mitre.org/data/definitions/205.html)


#### WASC Id: 45

#### Source ID: 1

### [ Cross-Origin-Embedder-Policy Header Missing or Invalid ](https://www.zaproxy.org/docs/alerts/90004/)



##### Low (Medium)

### Description

Cross-Origin-Embedder-Policy header is a response header that prevents a document from loading any cross-origin resources that don't explicitly grant the document permission (using CORP or CORS).

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `Cross-Origin-Embedder-Policy`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `Cross-Origin-Embedder-Policy`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``


Instances: 2

### Solution

Ensure that the application/web server sets the Cross-Origin-Embedder-Policy header appropriately, and that it sets the Cross-Origin-Embedder-Policy header to 'require-corp' for documents.
If possible, ensure that the end user uses a standards-compliant and modern web browser that supports the Cross-Origin-Embedder-Policy header (https://caniuse.com/mdn-http_headers_cross-origin-embedder-policy).

### Reference


* [ https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Cross-Origin-Embedder-Policy ](https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Cross-Origin-Embedder-Policy)


#### CWE Id: [ 693 ](https://cwe.mitre.org/data/definitions/693.html)


#### WASC Id: 14

#### Source ID: 3

### [ Cross-Origin-Opener-Policy Header Missing or Invalid ](https://www.zaproxy.org/docs/alerts/90004/)



##### Low (Medium)

### Description

Cross-Origin-Opener-Policy header is a response header that allows a site to control if others included documents share the same browsing context. Sharing the same browsing context with untrusted documents might lead to data leak.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `Cross-Origin-Opener-Policy`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `Cross-Origin-Opener-Policy`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``


Instances: 2

### Solution

Ensure that the application/web server sets the Cross-Origin-Opener-Policy header appropriately, and that it sets the Cross-Origin-Opener-Policy header to 'same-origin' for documents.
'same-origin-allow-popups' is considered as less secured and should be avoided.
If possible, ensure that the end user uses a standards-compliant and modern web browser that supports the Cross-Origin-Opener-Policy header (https://caniuse.com/mdn-http_headers_cross-origin-opener-policy).

### Reference


* [ https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Cross-Origin-Opener-Policy ](https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Cross-Origin-Opener-Policy)


#### CWE Id: [ 693 ](https://cwe.mitre.org/data/definitions/693.html)


#### WASC Id: 14

#### Source ID: 3

### [ Cross-Origin-Resource-Policy Header Missing or Invalid ](https://www.zaproxy.org/docs/alerts/90004/)



##### Low (Medium)

### Description

Cross-Origin-Resource-Policy header is an opt-in header designed to counter side-channels attacks like Spectre. Resource should be specifically set as shareable amongst different origins.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `Cross-Origin-Resource-Policy`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `Cross-Origin-Resource-Policy`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/robots.txt
  * Node Name: `http://127.0.0.1:8000/robots.txt`
  * Method: `GET`
  * Parameter: `Cross-Origin-Resource-Policy`
  * Attack: ``
  * Evidence: ``
  * Other Info: ``


Instances: 3

### Solution

Ensure that the application/web server sets the Cross-Origin-Resource-Policy header appropriately, and that it sets the Cross-Origin-Resource-Policy header to 'same-origin' for all web pages.
'same-site' is considered as less secured and should be avoided.
If resources must be shared, set the header to 'cross-origin'.
If possible, ensure that the end user uses a standards-compliant and modern web browser that supports the Cross-Origin-Resource-Policy header (https://caniuse.com/mdn-http_headers_cross-origin-resource-policy).

### Reference


* [ https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Cross-Origin-Embedder-Policy ](https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Cross-Origin-Embedder-Policy)


#### CWE Id: [ 693 ](https://cwe.mitre.org/data/definitions/693.html)


#### WASC Id: 14

#### Source ID: 3

### [ Permissions Policy Header Not Set ](https://www.zaproxy.org/docs/alerts/10063/)



##### Low (Medium)

### Description

Permissions Policy Header is an added layer of security that helps to restrict from unauthorized access or usage of browser/client features by web resources. This policy ensures the user privacy by limiting or specifying the features of the browsers can be used by the web resources. Permissions Policy provides a set of standard HTTP headers that allow website owners to limit which features of browsers can be used by the page such as camera, microphone, location, full screen etc.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/sitemap.xml
  * Node Name: `http://127.0.0.1:8000/sitemap.xml`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: ``


Instances: 3

### Solution

Ensure that your web server, application server, load balancer, etc. is configured to set the Permissions-Policy header.

### Reference


* [ https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Permissions-Policy ](https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Permissions-Policy)
* [ https://developer.chrome.com/blog/feature-policy/ ](https://developer.chrome.com/blog/feature-policy/)
* [ https://scotthelme.co.uk/a-new-security-header-feature-policy/ ](https://scotthelme.co.uk/a-new-security-header-feature-policy/)
* [ https://w3c.github.io/webappsec-feature-policy/ ](https://w3c.github.io/webappsec-feature-policy/)
* [ https://www.smashingmagazine.com/2018/12/feature-policy/ ](https://www.smashingmagazine.com/2018/12/feature-policy/)


#### CWE Id: [ 693 ](https://cwe.mitre.org/data/definitions/693.html)


#### WASC Id: 15

#### Source ID: 3

### [ Server Leaks Information via "X-Powered-By" HTTP Response Header Field(s) ](https://www.zaproxy.org/docs/alerts/10037/)



##### Low (Medium)

### Description

The web/application server is leaking information via one or more "X-Powered-By" HTTP response headers. Access to such information may facilitate attackers identifying other frameworks/components your web application is reliant upon and the vulnerabilities such components may be subject to.

* URL: http://127.0.0.1:8000/
  * Node Name: `http://127.0.0.1:8000/`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `X-Powered-By: PHP/8.4.26`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `X-Powered-By: PHP/8.4.26`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `X-Powered-By: PHP/8.4.26`
  * Other Info: ``
* URL: http://127.0.0.1:8000/sitemap.xml
  * Node Name: `http://127.0.0.1:8000/sitemap.xml`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `X-Powered-By: PHP/8.4.26`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: ``
  * Attack: ``
  * Evidence: `X-Powered-By: PHP/8.4.26`
  * Other Info: ``


Instances: 5

### Solution

Ensure that your web server, application server, load balancer, etc. is configured to suppress "X-Powered-By" headers.

### Reference


* [ https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/01-Information_Gathering/08-Fingerprint_Web_Application_Framework ](https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/01-Information_Gathering/08-Fingerprint_Web_Application_Framework)
* [ https://www.troyhunt.com/shhh-dont-let-your-response-headers/ ](https://www.troyhunt.com/shhh-dont-let-your-response-headers/)


#### CWE Id: [ 497 ](https://cwe.mitre.org/data/definitions/497.html)


#### WASC Id: 13

#### Source ID: 3

### [ X-Content-Type-Options Header Missing ](https://www.zaproxy.org/docs/alerts/10021/)



##### Low (Medium)

### Description

The Anti-MIME-Sniffing header X-Content-Type-Options was not set to 'nosniff'. This allows older versions of Internet Explorer and Chrome to perform MIME-sniffing on the response body, potentially causing the response body to be interpreted and displayed as a content type other than the declared content type. Current (early 2014) and legacy versions of Firefox will use the declared content type (if one is set), rather than performing MIME-sniffing.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `x-content-type-options`
  * Attack: ``
  * Evidence: ``
  * Other Info: `This issue still applies to error type pages (401, 403, 500, etc.) as those pages are often still affected by injection issues, in which case there is still concern for browsers sniffing pages away from their actual content type.
At "High" threshold this scan rule will not alert on client or server error responses.`
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `x-content-type-options`
  * Attack: ``
  * Evidence: ``
  * Other Info: `This issue still applies to error type pages (401, 403, 500, etc.) as those pages are often still affected by injection issues, in which case there is still concern for browsers sniffing pages away from their actual content type.
At "High" threshold this scan rule will not alert on client or server error responses.`
* URL: http://127.0.0.1:8000/robots.txt
  * Node Name: `http://127.0.0.1:8000/robots.txt`
  * Method: `GET`
  * Parameter: `x-content-type-options`
  * Attack: ``
  * Evidence: ``
  * Other Info: `This issue still applies to error type pages (401, 403, 500, etc.) as those pages are often still affected by injection issues, in which case there is still concern for browsers sniffing pages away from their actual content type.
At "High" threshold this scan rule will not alert on client or server error responses.`


Instances: 3

### Solution

Ensure that the application/web server sets the Content-Type header appropriately, and that it sets the X-Content-Type-Options header to 'nosniff' for all web pages.
If possible, ensure that the end user uses a standards-compliant and modern web browser that does not perform MIME-sniffing at all, or that can be directed by the web application/web server to not perform MIME-sniffing.

### Reference


* [ https://learn.microsoft.com/en-us/previous-versions/windows/internet-explorer/ie-developer/compatibility/gg622941(v=vs.85) ](https://learn.microsoft.com/en-us/previous-versions/windows/internet-explorer/ie-developer/compatibility/gg622941(v=vs.85))
* [ https://owasp.org/www-community/Security_Headers ](https://owasp.org/www-community/Security_Headers)


#### CWE Id: [ 693 ](https://cwe.mitre.org/data/definitions/693.html)


#### WASC Id: 15

#### Source ID: 3

### [ Cookie Slack Detector ](https://www.zaproxy.org/docs/alerts/90027/)



##### Informational (Low)

### Description

Repeated GET requests: drop a different cookie each time, followed by normal request with all cookies to stabilize session, compare responses against original baseline GET. This can reveal areas where cookie based authentication/attributes are not actually enforced.

* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: `Dropping this cookie appears to have invalidated the session: [XSRF-TOKEN] A follow-on request with all original cookies still had a different response than the original request.
`
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: `Dropping this cookie appears to have invalidated the session: [XSRF-TOKEN] A follow-on request with all original cookies still had a different response than the original request.
`


Instances: 2

### Solution



### Reference


* [ https://cwe.mitre.org/data/definitions/205.html ](https://cwe.mitre.org/data/definitions/205.html)


#### CWE Id: [ 205 ](https://cwe.mitre.org/data/definitions/205.html)


#### WASC Id: 45

#### Source ID: 1

### [ Non-Storable Content ](https://www.zaproxy.org/docs/alerts/10049/)



##### Informational (Medium)

### Description

The response contents are not storable by caching components such as proxy servers. If the response does not contain sensitive, personal or user-specific information, it may benefit from being stored and cached, to improve performance.

* URL: http://127.0.0.1:8000/
  * Node Name: `http://127.0.0.1:8000/`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `private`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `private`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `private`
  * Other Info: ``
* URL: http://127.0.0.1:8000/sitemap.xml
  * Node Name: `http://127.0.0.1:8000/sitemap.xml`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: `private`
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: ``
  * Attack: ``
  * Evidence: `private`
  * Other Info: ``


Instances: 5

### Solution

The content may be marked as storable by ensuring that the following conditions are satisfied:
The request method must be understood by the cache and defined as being cacheable ("GET", "HEAD", and "POST" are currently defined as cacheable)
The response status code must be understood by the cache (one of the 1XX, 2XX, 3XX, 4XX, or 5XX response classes are generally understood)
The "no-store" cache directive must not appear in the request or response header fields
For caching by "shared" caches such as "proxy" caches, the "private" response directive must not appear in the response
For caching by "shared" caches such as "proxy" caches, the "Authorization" header field must not appear in the request, unless the response explicitly allows it (using one of the "must-revalidate", "public", or "s-maxage" Cache-Control response directives)
In addition to the conditions above, at least one of the following conditions must also be satisfied by the response:
It must contain an "Expires" header field
It must contain a "max-age" response directive
For "shared" caches such as "proxy" caches, it must contain a "s-maxage" response directive
It must contain a "Cache Control Extension" that allows it to be cached
It must have a status code that is defined as cacheable by default (200, 203, 204, 206, 300, 301, 404, 405, 410, 414, 501).

### Reference


* [ https://datatracker.ietf.org/doc/html/rfc7234 ](https://datatracker.ietf.org/doc/html/rfc7234)
* [ https://datatracker.ietf.org/doc/html/rfc7231 ](https://datatracker.ietf.org/doc/html/rfc7231)
* [ https://www.w3.org/Protocols/rfc2616/rfc2616-sec13.html ](https://www.w3.org/Protocols/rfc2616/rfc2616-sec13.html)


#### CWE Id: [ 524 ](https://cwe.mitre.org/data/definitions/524.html)


#### WASC Id: 13

#### Source ID: 3

### [ Session Management Response Identified ](https://www.zaproxy.org/docs/alerts/10112/)



##### Informational (Medium)

### Description

The given response has been identified as containing a session management token. The 'Other Info' field contains a set of header tokens that can be used in the Header Based Session Management Method. If the request is in a context which has a Session Management Method set to "Auto-Detect" then this rule will change the session management to use the tokens identified.

* URL: http://127.0.0.1:8000/
  * Node Name: `http://127.0.0.1:8000/`
  * Method: `GET`
  * Parameter: `laravel-session`
  * Attack: ``
  * Evidence: `laravel-session`
  * Other Info: `cookie:laravel-session
cookie:XSRF-TOKEN`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `laravel-session`
  * Attack: ``
  * Evidence: `laravel-session`
  * Other Info: `cookie:laravel-session
cookie:XSRF-TOKEN`
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `laravel-session`
  * Attack: ``
  * Evidence: `laravel-session`
  * Other Info: `cookie:laravel-session
cookie:XSRF-TOKEN`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `laravel-session`
  * Attack: ``
  * Evidence: `laravel-session`
  * Other Info: `cookie:laravel-session
cookie:XSRF-TOKEN`
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `XSRF-TOKEN`
  * Attack: ``
  * Evidence: `XSRF-TOKEN`
  * Other Info: `cookie:XSRF-TOKEN`


Instances: 5

### Solution

This is an informational alert rather than a vulnerability and so there is nothing to fix.

### Reference


* [ https://www.zaproxy.org/docs/desktop/addons/authentication-helper/session-mgmt-id/ ](https://www.zaproxy.org/docs/desktop/addons/authentication-helper/session-mgmt-id/)



#### Source ID: 3

### [ Storable and Cacheable Content ](https://www.zaproxy.org/docs/alerts/10049/)



##### Informational (Medium)

### Description

The response contents are storable by caching components such as proxy servers, and may be retrieved directly from the cache, rather than from the origin server by the caching servers, in response to similar requests from other users. If the response data is sensitive, personal or user-specific, this may result in sensitive information being leaked. In some cases, this may even result in a user gaining complete control of the session of another user, depending on the configuration of the caching components in use in their environment. This is primarily an issue where "shared" caching servers such as "proxy" caches are configured on the local network. This configuration is typically found in corporate or educational environments, for instance.

* URL: http://127.0.0.1:8000/robots.txt
  * Node Name: `http://127.0.0.1:8000/robots.txt`
  * Method: `GET`
  * Parameter: ``
  * Attack: ``
  * Evidence: ``
  * Other Info: `In the absence of an explicitly specified caching lifetime directive in the response, a liberal lifetime heuristic of 1 year was assumed. This is permitted by rfc7234.`


Instances: 1

### Solution

Validate that the response does not contain sensitive, personal or user-specific information. If it does, consider the use of the following HTTP response headers, to limit, or prevent the content being stored and retrieved from the cache by another user:
Cache-Control: no-cache, no-store, must-revalidate, private
Pragma: no-cache
Expires: 0
This configuration directs both HTTP 1.0 and HTTP 1.1 compliant caching servers to not store the response, and to not retrieve the response (without validation) from the cache, in response to a similar request.

### Reference


* [ https://datatracker.ietf.org/doc/html/rfc7234 ](https://datatracker.ietf.org/doc/html/rfc7234)
* [ https://datatracker.ietf.org/doc/html/rfc7231 ](https://datatracker.ietf.org/doc/html/rfc7231)
* [ https://www.w3.org/Protocols/rfc2616/rfc2616-sec13.html ](https://www.w3.org/Protocols/rfc2616/rfc2616-sec13.html)


#### CWE Id: [ 524 ](https://cwe.mitre.org/data/definitions/524.html)


#### WASC Id: 13

#### Source ID: 3

### [ User Agent Fuzzer ](https://www.zaproxy.org/docs/alerts/10104/)



##### Informational (Medium)

### Description

Check for differences in response based on fuzzed User Agent (eg. mobile sites, access as a Search Engine Crawler). Compares the response statuscode and the hashcode of the response body with the original response.

* URL: http://127.0.0.1:8000
  * Node Name: `http://127.0.0.1:8000`
  * Method: `GET`
  * Parameter: `Header User-Agent`
  * Attack: `Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)`
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/
  * Node Name: `http://127.0.0.1:8000/`
  * Method: `GET`
  * Parameter: `Header User-Agent`
  * Attack: `Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)`
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos`
  * Method: `GET`
  * Parameter: `Header User-Agent`
  * Attack: `Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)`
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `Header User-Agent`
  * Attack: `Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)`
  * Evidence: ``
  * Other Info: ``
* URL: http://127.0.0.1:8000/produtos
  * Node Name: `http://127.0.0.1:8000/produtos ()(_token,descricao,nome,preco)`
  * Method: `POST`
  * Parameter: `Header User-Agent`
  * Attack: `Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)`
  * Evidence: ``
  * Other Info: ``

Instances: Systemic


### Solution



### Reference


* [ https://owasp.org/wstg ](https://owasp.org/wstg)



#### Source ID: 1

### [ User Controllable HTML Element Attribute (Potential XSS) ](https://www.zaproxy.org/docs/alerts/10031/)



##### Informational (Low)

### Description

This check looks at user-supplied input in query string parameters and POST data to identify where certain HTML attribute values might be controlled. This provides hot-spot detection for XSS (cross-site scripting) that will require further review by a security analyst to determine exploitability.

* URL: http://127.0.0.1:8000/produtos%3Fq=ZAP
  * Node Name: `http://127.0.0.1:8000/produtos (q)`
  * Method: `GET`
  * Parameter: `q`
  * Attack: ``
  * Evidence: ``
  * Other Info: `User-controlled HTML attribute values were found. Try injecting special characters to see if XSS might be possible. The page at the following URL:

http://127.0.0.1:8000/produtos?q=ZAP

appears to include user input in:
a(n) [input] tag [value] attribute

The user input found was:
q=ZAP

The user-controlled value was:
zap`


Instances: 1

### Solution

Validate all input and sanitize output it before writing to any HTML attributes.

### Reference


* [ https://cheatsheetseries.owasp.org/cheatsheets/Input_Validation_Cheat_Sheet.html ](https://cheatsheetseries.owasp.org/cheatsheets/Input_Validation_Cheat_Sheet.html)


#### CWE Id: [ 20 ](https://cwe.mitre.org/data/definitions/20.html)


#### WASC Id: 20

#### Source ID: 3


