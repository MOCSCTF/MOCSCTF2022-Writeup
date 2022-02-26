# Writeup
1. After analyse the pcap, we found it look like DNS Data Exfiltration.

2. We gather all the suspcious DNS query from pcap.

4d4f43534354467b64.mocsctf.com
6e245f337866693174.mocsctf.com
72617469306e7d.mocsctf.com

3. After we decode the data from hex to string, we got this result.
```
4d4f43534354467b64 -> MOCSCTF{d
6e245f337866693174 -> n$_3xfi1t
72617469306e7d -> rati0n}
```

## flag
MOCSCTF{dn$_3xfi1trati0n}