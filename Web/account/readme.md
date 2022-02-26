## writeup

Suppose IP and Port is a.b.c.d:e

1. Type anything in username and password
   Find index.txt
2. Go to url "a.b.c.d:e/index.txt"
   Find "if (@strcmp($username, $_GET['username']) == 0 && @strcmp($password, $_GET['password']) == 0) { }"
3. Problem of "strcmp()" and "==" in PHP, if 'username' is an array, "strcmp($username, $_GET['username']) == 0" is TRUE
   Similarly, if 'password' is an array, "strcmp($password, $_GET['password']) == 0" is TRUE
   Login by using url "a.b.c.d:e?username[]=&password[]="
4. Click "PIN" button and enter "pin.php"
   Get hint "PIN is 123456"
5. Try to type 123456 in PIN and click "Submit"
   Nothing happens
6. Assign PIN by using "GET" method which is adding "?PIN=123456" in the url
   Get hint "PIN is not numeric"
7. Hints "PIN is 123456" and "PIN is not numeric", problem of "==" in PHP, the answer is multiple, one of it is "PIN=123456a"
   Assign PIN by using "GET" method, then get the flag
   flag = MOCSCTF{c2we8023xc88ew23dx54fdg56sdg5b_Thanks_BoardWare}
