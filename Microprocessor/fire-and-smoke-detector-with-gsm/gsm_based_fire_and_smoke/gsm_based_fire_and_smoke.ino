//By HomeMade Electronics
//Subscribe to my channel https://www.youtube.com/channel/UC8isJR_71x1wIfw6jB106pg
//Visit website https://sirboatengonline.com
//for more tutorial videos
//like, share and leave a comment if you need help
// Credit: Gidey Gebrehiwot, Academia.com, Arduino.cc


#include<Servo.h>
Servo myservo;
int pos = 0;
int val;int motor = 8;
#include <LiquidCrystal.h>
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);
#include <TinyGPS.h>
#include <SoftwareSerial.h>
SoftwareSerial mySerial(9, 10);
byte tx=1;
TinyGPS gps;  //Creates a new instance of the TinyGPS object

const int SPEAKER = 6;
const int LED_RED = 7;
const int LED_YELLOW = 10;
int Relay=7;
int tempC_1 = 0; //set initial tempC 0° for all LM35
int smkC_1 = 0; //set initial tempC 0º for all MQ 2
const int SensorPin1 = A0; //fire input sensor pin
const int SensorPin2 = A1;
String textForSMS;
void setup()
{
  pinMode(motor, OUTPUT);
  pinMode(tx, OUTPUT);
  pinMode(Relay, OUTPUT);
  myservo.attach(13);
  pinMode(SPEAKER, OUTPUT);
  lcd.begin(14, 2);
  delay(100);
  pinMode(SensorPin1, INPUT);
  pinMode(SensorPin2, INPUT);
  pinMode(SPEAKER, OUTPUT);

pinMode(LED_RED, OUTPUT);
pinMode(LED_YELLOW, OUTPUT); //Set control pins to be outputs
digitalWrite(LED_RED, LOW);
digitalWrite(LED_YELLOW, LOW);//set both motors off for start-up
mySerial.begin(9600);
Serial.begin(9600); //Start the serial connection with the computer
}
void loop()
{
  int tempC_1 = analogRead(SensorPin1);
  int SmkC_1 = analogRead(SensorPin2);
  tempC_1 = analogRead(SensorPin1); //read the value from the LM35 sensor
  tempC_1 = (5.0 * tempC_1 * 100.0) / 1024.0; //convert the analog data to temperature
  smkC_1 = analogRead(SensorPin2); //read the value from the MQ 2 sensor
  smkC_1 = (5.0 * smkC_1 * 100.0) / 1024.0; //convert the analog data to temperature
  delay(50);
  
  bool newData = false;
  unsigned long chars;
  unsigned short sentences, failed;
  for (unsigned long start = millis(); millis() -start < 1000;)
  {
    while (Serial.available())
    {
      char c = Serial.read();
      if (gps.encode(c)) 
      newData = true;  
      }
    } 
    
    if (tempC_1 >= 50 || smkC_1 >= 50) 
    {
      digitalWrite(Relay,HIGH);
      val = analogRead(pos);
      val = map(val, 0, 1023, 0, 180);
      myservo.write(val);
      delay(50);
      digitalWrite(motor, HIGH);
      digitalWrite(LED_RED, HIGH);
      digitalWrite(LED_YELLOW, HIGH);
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("  THERE IS FIRE ");
      lcd.setCursor(0, 1);
      lcd.print(" NOT SAFE HERE ");
      delay(100);
      lcd.clear();
      lcd.print("Sending SMS...");
      delay(100);
      
      tone(SPEAKER, 1047, 500);
      delay(200);
      tone(SPEAKER, 1109, 300);
      delay(200);
      tone(SPEAKER, 1175, 100);
      delay(5);
      
      float flat, flon;
      unsigned long age;
      gps.f_get_position(&flat, &flon, &age);
      Serial.print("AT+CMGF=1\r");
      delay(100);
      Serial.print("AT+CMGS=\"+233266302607\"\r");
      Serial.print("FIRE ALERT!\r");
      delay(100);
      Serial.print("AT+CMGS=\"+233266302607\"\r");
      Serial.print("FIRE OCCURED!\r");
      delay(100);
      Serial.print("AT+CMGS=\"+233266302607\"\r");
      Serial.print("FIRE OCCURED! in\r");
      delay(200);
      Serial.print("Latitude = ");
      Serial.print(flat == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flat, 6);
      Serial.print(" Longitude = ");
      Serial.print(flon == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flon, 6);
      delay(200);
      Serial.println((char)26); // End AT command with a ^Z, ASCII code 26
      delay(200);
      Serial.println();
      }
      else
      {
        digitalWrite(Relay,LOW);
        delay(50);
        digitalWrite(LED_RED, LOW);
        digitalWrite(LED_YELLOW, LOW);
        digitalWrite(motor, LOW);
        lcd.clear();
        lcd.setCursor(0, 0);
        lcd.print("    NO FIRE    ");
        lcd.setCursor(0, 1);
        lcd.print("   ALL SAFE   ");
        } 
      }
