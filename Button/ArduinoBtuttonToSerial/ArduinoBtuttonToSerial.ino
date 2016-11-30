// Define location of the pins
int ledOut = 5;
int buttonIn = 4;
bool var = false;
bool state = false;
bool prev = false;

// Setup up 
void setup() {
  // Set led as output and button as input with pull up an begin serial
  pinMode(ledOut, OUTPUT);
  pinMode(buttonIn, INPUT_PULLUP);
  Serial.begin(9600);
}

// Main code that set controlls the led and sends the status over serial
void loop() {
  // read current state
  var = digitalRead(buttonIn);

  // if button ist pressed and but has not been pressed in the last iteration change state
  if(prev != var && var){
    // change state
    if(state){
      digitalWrite(ledOut, HIGH);
      state = false;
    }
    else{
      digitalWrite(ledOut, LOW);
      state = true;
    }
    // send state
    Serial.println(state);
    delay(1500);
  }
  prev = var;
}
