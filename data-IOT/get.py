import network   #import des fonction lier au wifi
import urequests #import des fonction lier au requetes http
import utime #import des fonction lier au temps
import ujson #import des fonction lier aà la convertion en Json
from random import randint

from machine import Pin, PWM, ADC, Timer
import time

wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

ssid = 'ESP32-CAM-MB'
password = ''
url = "http://192.168.4.2/CDI-Axe-Project/pages/getOne.php"
wlan.connect(ssid) # connecte la raspi au réseau


url2 = "http://192.168.4.2/CDI-Axe-Project/pages/postOne.php"

autoMessage = {"content" : "Actuellement en plein test de prog", "tag" : "Tech"}
               
               
               
tagColor =  {"Sport" : [251,171,214], "Culture" : [252,147,166], "JeuxVidéo" : [254,174,133], "Histoire" : [255,210,193], "Cinéma" : [70,234,176], "Littérature" : [91,199,208], "Tech" : [195,254,241], "Musique" : [172,197,252], "Animé" : [194,231,255], "Art" : [238,248,255]}



button = Pin(14, mode=Pin.IN, pull=Pin.PULL_UP)

isLedSwitchedOn = False
previousButtonValue = 1

timerButton = Timer()

def checkButton(timer):
    global isLedSwitchedOn
    global previousButtonValue
    global url2
    
    if button.value() == 0 and previousButtonValue == 1: 
        isLedSwitchedOn = not isLedSwitchedOn
        print("test")
        r = urequests.post(url2, json = autoMessage)# lance une requete sur l'url
        print(r.status_code)
 
    previousButtonValue = button.value()


blueLED = PWM(Pin(19,mode=Pin.OUT))
greenLED = PWM(Pin(18,mode=Pin.OUT))
redLED = PWM(Pin(17,mode=Pin.OUT))

blueLED.duty_u16(0)
greenLED.duty_u16(0)
redLED.duty_u16(0)

multiplicateur = 65535/257

while not wlan.isconnected():
    print("pas connecté au wifi")
    utime.sleep(1)
    pass

timerButton.init(period=100, mode=Timer.PERIODIC, callback=checkButton)

while(True): 
    try:
        print("GET")
        r = urequests.get(url)
        tag = r.json()[0]["tag"]
        print(tag) # traite sa reponse en Json
        blueLED.duty_u16(int(multiplicateur * tagColor[tag][2]))
        greenLED.duty_u16(int(multiplicateur * tagColor[tag][1]))
        redLED.duty_u16(int(multiplicateur * tagColor[tag][0]))
        
        print("Bleu Vert Rouge : " + str(tagColor[tag][2]) + "," + str(tagColor[tag][1]) + "," + str(tagColor[tag][0]))
        utime.sleep(1)
        blueLED.duty_u16(0)
        greenLED.duty_u16(0)
        redLED.duty_u16(0)
        r.close() # ferme la demande"""
        
    except Exception as e:
        print(e)
    
