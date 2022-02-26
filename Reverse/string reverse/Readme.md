# Writeup
1. According to the provided Java code, we have gaven the result string "Esr3v3R_eSReVer_9n1rt3_"

2. We have to understand what the checkFlag function did.
It splits the input value, since the for-loop is three time, we will know the value is split into 3 parts by underscore. 
Then we find that inner loop is just to reverse the string array order.

```
String[] strArray = str.split("_");

for(int i=0; i<3; i++){ 
    char[] s1 = strArray[i].toCharArray(); 
    for (int j = s1.length-1; j>=0; j--)
    {
        stringBuilder.append(s1[j]);
    }
        stringBuilder.append("_");
}
```

3. Finally, we come out below logic.
```
Esr3v3R -> R3v3rsE
eSReVer -> reVeRSe
9n1rt3 -> 3tr1n9
```

4. The correct input is MOCSCTF{R3v3rsE_reVeRSe_3tr1n9}

## flag
MOCSCTF{R3v3rsE_reVeRSe_3tr1n9}