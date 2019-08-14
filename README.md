# anti-qq-cheat

一个收集QQ盗号网站的Repository。

所有的信息在 https://github.com/thieveskiller/qq-cheats-list 内！

本项目的自动构建地址为 http://thieveskiller.org/ 【暂定】。

如果你需要webhook请在上述网站提交！

# 如何安装

执行以下命令

```
git clone https://github.com/thieveskiller/anti-qq-cheat.git
cd anti-qq-cheat
composer install
```

之后将.env.example命名为.env并完成相关配置

windows下可以命名为.env.之后windows会自动处理为.env

继续运行

```
php artisan migration
php artisan key:generate
```

再将web根目录设置为public文件夹即可完成安装。

你需要准备git,composer,php以及一个web服务器(建议linux下的apache)

好像写倒了。。。
