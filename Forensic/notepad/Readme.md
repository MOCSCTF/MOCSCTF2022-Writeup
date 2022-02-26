# writeup CMDid

raw image:
https://drive.google.com/file/d/1Nne5lIXVaIUPR_7jF9s5AwbAZWRbCUqs/view?usp=sharing


volatility -f flag.raw --profile=Win7SP1x64 memdump --dump-dir=. -p 2424
strings -e l ./2424.dmp | grep MOCSCTF{

MOCSCTF{7h3_5h0w_mu57_60_0n}