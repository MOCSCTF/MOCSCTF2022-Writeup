enc = [
  0xCA, 0xF6, 0x58, 0x87, 0x53, 0x03, 0x7B, 0xB5, 0x3F, 0x27, 
  0x11, 0x27, 0x7F, 0xC0, 0xFE, 0xD7, 0xCE, 0xA4, 0xB1, 0x2C, 
  0x55, 0x47, 0xFD, 0xF7, 0x58, 0xBC, 0xFB, 0x87, 0x42, 0x96, 
  0x29, 0xF6, 0x40, 0x5B, 0x87, 0x4A, 0x95, 0x0A, 0x7E
]

cipher = [
  0x87,0xB9,0x0B,0xC4,0x07,0x45,0x00,0xE2,0x0C,0x16,0x72,0x17,
  0x12,0xA5,0xA1,0x96,0xA0,0xE0,0xEE,0x5B,0x30,0x2B,0x9E,0x98,
  0x35,0xD9,0xDA,0xA6,0x63,0xC9,0x7B,0x93,0x1F,0x6A,0xF4,0x15,
  0xD0,0x70,0x03
]

for i in range(len(enc)):
    print(chr(enc[i]^cipher[i]),end="")