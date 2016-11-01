# OfficeOccupationViewer
This basic Website should display if our office is occupied or not.

This project has to main parts:
- A physical button that triggers the website (Arduino & Python script)
- A Website that displays the state of the office.

# Website - OfficeOccupationViewer
The website consists of diffrent parts.
A MySQL Database, that contains the current status of the office.
Replace the 	$host="127.0.0.1";
		$user="test";
		$password="test2"; 
in the PHP Files.
And the PHP Files that display the current status in the browser.

The getStatus.php File return “0” if the office is closed or “1” if it is open.

# Physical Toggle Button
The toggle Button consists of two parts:

1. One Button that is connected to an Arduino.
	Pushbutton at (Pin 4)
	LED that displays the current status (Pin 5)
2. Computer with internet access, that runs a magic python script.
	Following Libraries are needed: pySerial & urllib3
	Replace the path to your serial device with the right one
		(Mac: .usbmodemXXXX, Windows: COMX, Linux: ttyATHX)

The Arduino sends the current stat to the computer over its serial interface.
The python scripts listens to serial and performs HTML request to change the OfficeOccupationViewer state.

# If you have any questions feel free to ask us :)
