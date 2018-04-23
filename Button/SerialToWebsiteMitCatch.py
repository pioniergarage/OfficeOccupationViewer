import serial # make sure pySerial is installed
import urllib3
import time

# set up serial connection
init = False
while(not init):
    try:
        ser = serial.Serial('/dev/ttyACM3',9600)
        init = True
        print "Got it "
    except:
       time.sleep(10)
       print("Traffic light not found")

print "Traffic light found"
# create PoolManager to get webpage
http = urllib3.PoolManager()
headers = urllib3.util.make_headers(basic_auth='<ToDo: set auth header>')

def changeDoorState(bool, versuch):
    try:
        if(bool):
            http.request('GET', 'http://launchpadapp.pioniergarage.de/api/door/change-status?door=open')
            http.request('POST', 'http://launchpadapp-api.pioniergarage.de/openchange', headers=headers, fields={'open': "1"})
            print "gesendet"    
        else:
            http.request('GET', 'http://launchpadapp.pioniergarage.de/api/door/change-status?door=closed')
            http.request('POST', 'http://launchpadapp-api.pioniergarage.de/openchange', headers=headers, fields={'open': '0'})
            print "gesendet"
    except:
        print "Internet geht nicht"
        time.sleep(10)
        changeDoorState(bool, versuch*versuch)


while(True):
    line = ser.readline()
    print line 
    if("1" in line):
        changeDoorState(True, 2)
    else:
        changeDoorState(False, 2)