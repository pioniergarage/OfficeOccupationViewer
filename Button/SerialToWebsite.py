import serial #make shure pySerial is installed
import urllib3

# set up serial connection
# ToDo: change path to the correct path of your device
ser = serial.Serial('/dev/tty.usbmodem1411',9600)

# create PoolManager to get webpage
http = urllib3.PoolManager()

# http request to open or close the door
def changeDoorState(bool):
    if(bool):
        http.request('GET', 'http://istjemandimlaunchpad.pioniergarage.de/changeState.php?door=open')
    else:
        http.request('GET', 'http://istjemandimlaunchpad.pioniergarage.de/changeState.php?door=closed')

# loop forever
while(True):
    # if serial input contains one open the door or close otherwise
    line = ser.readline()
    print(line)
    if("1" in line):
        changeDoorState(True)
    else:
        changeDoorState(False)
