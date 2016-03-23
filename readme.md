#Poster - 简单方便的web界面的接口测试工具

![Poster](https://github.com/Jaggle/poster/master/static/images/screenshot.png)
##特点

 - 自动保存，只要测试过的接口都会记录下来并根据你的使用次数从大到小排序
 - 使用方便，基于web，数据库保存接口历史

##依赖

 - PHP >= 5.4
 - Mysql

##使用方法

  - 将poster.sql文件导入到数据库中
  - 创建数据库,在config.php文件中填写你的数据库连接信息
  - 命令行进入到此项目的目录，输入命令 php -S 127.0.0.1:8181(端口可修改)
  - 浏览器打开 127.0.0.1:8181 ,done!

##提示

如果遇到跨域请求请在你的chrome的快捷方式的目标一栏的后面添加

 " --disable-web-security"
 
 注意 -- 之前需要有一个空格,不需要引号