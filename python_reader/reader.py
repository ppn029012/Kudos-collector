import serial
import pycurl


ser = serial.Serial('/dev/ttyACM0', 9600)

coinNum = 0

while 1:
	coinStr = ser.readline()
        tmpNum = int(coinStr)
        if tmpNum != coinNum:
			print str(coinNum)
			coinNum = tmpNum
            # there is new coin comes into the basket
            #  let's start to update the website
			c = pycurl.Curl()
			c.setopt(c.URL, 'https://hidden-depths-7198.herokuapp.com/addLike.php?id=15')
			c.perform()
