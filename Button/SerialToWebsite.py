import serial # make sure pySerial is installed
import urllib3

# set up serial connection
ser = serial.Serial('/dev/tty.usbmodem1411',9600)

# create PoolManager to get webpage
http = urllib3.PoolManager()

def changeDoorState(bool):
    if(bool):
        http.request('GET', 'http://istjemandimlaunchpad.pioniergarage.de/changeState.php?door=open')
    else:
        http.request('GET', 'http://istjemandimlaunchpad.pioniergarage.de/changeState.php?door=closed')

while(True):
    line = ser.readline()
    print(line)
    if("1" in line):
        changeDoorState(True)
    else:
        changeDoorState(False)
