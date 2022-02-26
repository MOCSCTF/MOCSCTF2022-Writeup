from flask import Flask, Response, send_from_directory
import random

app = Flask('app', static_url_path='')

@app.route('/deead76a0b4ae11caa2945c9a9fe6709.css')
def stylecss():
    return send_from_directory('.', path='./deead76a0b4ae11caa2945c9a9fe6709.css')

@app.route('/')
def hello_world():
    response = Response()
    response.headers['link'] = '<deead76a0b4ae11caa2945c9a9fe6709.css>; rel=stylesheet;'
    response.headers['Refresh'] = str(random.randint(1,10))+'; url=https://www.youtube.com/watch?v=kRSGL32Vg7E&t=70s'
    response.headers['Cache-Control'] = 'no-cache'
    return response

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=80, debug=True)
