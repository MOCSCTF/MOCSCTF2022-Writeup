#!/bin/python3

def encrypt(flag):
    f = lambda x : x^2 + 2*x + 233
    return ''.join(chr(f(c)) for c in flag)

FLAG = open('./flag.txt', 'rb').read().strip()

enc = encrypt(FLAG)
print(enc)
