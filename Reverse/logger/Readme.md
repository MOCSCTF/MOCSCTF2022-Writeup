# Writeup
1. Decomplie the class file.

Online java decomplier:
http://www.javadecompilers.com

```
import org.apache.logging.log4j.Logger;
import java.util.Scanner;
import org.apache.logging.log4j.LogManager;

// 
// Decompiled by Procyon v0.5.36
// 

public class MyLogger
{
    public static void main(final String[] args) {
        try {
            final Logger logger = LogManager.getLogger((Class)MyLogger.class);
            final Scanner sc = new Scanner(System.in);
            System.out.print("What are you looking for? ");
            final String str = sc.nextLine();
            if (str.toLowerCase().contains("jdni")) {
                System.out.println("Bad input!");
                System.exit(0);
            }
            if (str.toLowerCase().contains("flag")) {
                System.out.println("Look up SECRET_VALUE!");
            }
            else {
                logger.error("Not Found: {}", (Object)str);
            }
        }
        catch (Exception exception) {
            System.err.println(exception);
        }
    }
}

```

2. Checked the code is vulnerable to CVE-2021-44228.

3. Try the jdni payload, but it's filtered and not able to bypass.

4. From the hint, the flag is stored on SECRET_VALUE. It looks like the docker enviorment value.

4. The payload is ${env:SECRET_VALUE:-:}

## flag
MOCSCTF{log4j-1s-3v3rywh3r3}