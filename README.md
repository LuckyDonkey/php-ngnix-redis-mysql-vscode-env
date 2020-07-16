如何使用：
1、打开命令行：mac（终端）、window（命令行）
2、cd /进入当前项目的根目录
3、执行指令 docker-compose up -d
执行完，整个php的开发环境就搭建成功了，

4、接下来是配置vscode的php断点调试：
打开一个php项目文件夹，然后打开debug的配置文件，然后按下面的代码去修改配置文件。
{
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9001,  //1、把端口改成9001
            "pathMappings": { 
                "/var/www/html": "/Users/zhoujinbo/Documents/docker/php-docker-test/php/www"  //2、把后面的“/Users/zhoujinbo/.../www”改成自己的项目文件根目录
            }
        },
        {
            "name": "Launch currently open script",
            "type": "php",
            "request": "launch",
            "program": "${file}",
            "cwd": "${fileDirname}",
            "port": 9001 //1、把端口改成9001
        }
    ]
}
修改完重启一下

vscode需要安装一些插件：
1、PHP Debug         
author：Felix Becker

配置信息：


2、vscode-docker-phpunit
author：eric-c-hansen

配置信息：
"phpunit": {
    "exec": "/usr/local/bin/phpunit",
    "extra_params": [],
    "docker_name": "php-docker-test_php_1",
    "code_path": "/var/www/html"
  }


其他事项：
Php源代码存放在：php/www/中
http://localhost:8080/     php的路径
http://localhost:8080/hello.php
http://localhost:8080/mysql_test.php
http://localhost:8080/redis_test.php
http://localhost:8080/phpInfo.php

http://localhost:8081/     phpmyadmin的网址
链接上redis进行命令行操作： 
docker container exec -it php-ngnix-redis-mysql-vscode-env_redis_1 redis-cli
