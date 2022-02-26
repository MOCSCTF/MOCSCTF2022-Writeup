const express = require('express')
const bodyParser = require('body-parser')

const app = express()

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));

app.use("/", express.static(__dirname + "/static"));


const isObject = obj => obj && obj.constructor && obj.constructor === Object;
const merge = (dest, src) => {
    for (var attr in src) {
        if (isObject(dest[attr]) && isObject(src[attr])) {
            merge(dest[attr], src[attr]);
        } else {
            dest[attr] = src[attr];
        }
    }
    return dest
};

app.get('/', function (req, res, next) {
    try {
        res.send('index.html')
    } catch (error) {
        res.send(error)
    }
})

app.post('/api/require', function (req, res, next) {
    try {
        require(req.body.requirethis.toString());
        delete require.cache[require.resolve(req.body.requirethis.toString())];
        res.send('required');
    } catch (error) {
        res.send(error)
    }
})

app.post('/api/merge', function (req, res, next) {
    try {
        let merge1 = req.body.merge1 || "";
        let merge2 = req.body.merge2 || "";
        console.log(merge1);
        console.log(merge2);
        newmerge = merge(merge1, merge2);
        res.json(newmerge);
    } catch (error) {
        res.send(error)
    }
})


const port = 3000
app.listen(port, function () {
    console.log("[Start] Server starting:" + port)
})


