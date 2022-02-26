#!/bin/python3
import string

def encrypt(flag):
    f = lambda x : x^2 + 2*x + 233
    return ''.join(chr(f(c)) for c in flag)

enc = open('./output.txt', 'r').read().strip()

enc_list=list(encrypt(bytes(string.printable,'ascii')))

print("".join(string.printable[enc_list.index(e)] for e in enc ))