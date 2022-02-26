## writeup
Suppose IP and Port is a.b.c.d:e

1. View the HTML source code
   Find a file called "source.php"
2. Go to url "a.b.c.d:e/source.php"
   Find a file called "hint.php"
3. Go to url "a.b.c.d:e/hint.php"
   Find something called "ffflllaaaggg"
4. Go to url "a.b.c.d:e/ffflllaaaggg"
   Get the hint "Find it in a big face"
5. There are two big face seen before
   One of it is on index.php and the other one is on "source.php"
   When viewing the source code, the big face in "index.php" is called "asmallface.png" and the one in "souce.php" is called "abigface.png"
   Download abigface.png on "source.php"
6. Unzip abigface.png and get a file called "flag"
7. Convert all Hexadecimal number in "flag" to ASCII, get the flag
   flag = MOCSCTF{nvcx7ewjsdkj8w4jds89ewn89f2et8_Thanks_BoardWare}
