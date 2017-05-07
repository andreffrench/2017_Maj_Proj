from flask import Flask, render_template, json, request,redirect,session
from flask.ext.mysql import MySQL
#from werkzeug import generate_password_hash, check_password_hash
import serial

mysql = MySQL()
appm = Flask(__name__)
ser = serial.Serial('COM4', 9600)

appm.config['MYSQL_DATABASE_USER'] = 'root'
appm.config['MYSQL_DATABASE_PASSWORD'] = 'Password12#'
appm.config['MYSQL_DATABASE_DB'] = 'BucketList'
appm.config['MYSQL_DATABASE_HOST'] = 'localhost'
mysql.init_app(appm)


@appm.route('/')
def main():
    return render_template('login.html')

@appm.route('/checklevels')
def checklevels():
    cnt = 1
    while cnt == 1:
        dataz = ser.readline()
        valz = int(dataz)
        # print valz
        cnt = 2
    return render_template('checklevels.html', valz=valz)

@appm.route('/checklevels')
def checklevels():
    cnt = 1
    while cnt == 1:
        dataz = ser.readline()
        valz = int(dataz)
        # print valz
        cnt = 2
    return render_template('checklevels.html', valz=valz)




if __name__ == "__main__":
    appm.run(host='0.0.0.0')