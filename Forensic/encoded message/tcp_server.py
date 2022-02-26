# first of all import the socket library
import socket	


def encryptDecrypt(input):
	key = ['M', 'O', 'C','S', 'C', 'T','F'] #Can be any chars, and any size array
	output = []
	
	for i in range(len(input)):
		xor_num = ord(input[i]) ^ ord(key[i % len(key)])
		output.append(chr(xor_num))
	
	return ''.join(output)		

# next create a socket object
s = socket.socket()		
print ("Socket successfully created")

# reserve a port on your computer in our
# case it is 12345 but it can be anything
port = 12345			

# Next bind to the port
# we have not typed any ip in the ip field
# instead we have inputted an empty string
# this makes the server listen to requests
# coming from other computers on the network
s.bind(('', port))		
print ("socket binded to %s" %(port))

# put the socket into listening mode
s.listen(5)	
print ("socket is listening")		

encrypted = encryptDecrypt("MOCSCTF{3nc0d3_me55ag3_w1th_XOR}");

# a forever loop until we interrupt it or
# an error occurs
while True:

	# Establish connection with client.
	c, addr = s.accept()	
	print ('Got connection from', addr )

	# send a thank you message to the client. encoding to send byte type.
	#c.send('Thank you for connecting'.encode())
	c.send(encrypted.encode())


	# Close the connection with the client
	c.close()

	# Breaking once connection closed
	break


