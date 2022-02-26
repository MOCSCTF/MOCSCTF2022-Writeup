import os 
import sys

path = sys._MEIPASS+"/" if hasattr(sys, 'frozen') else os.getcwd()+"/resources/"
icon = path+"icon.png"

os.system(icon)