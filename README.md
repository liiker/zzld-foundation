# ZZLD-Foundation

> v2.x.x 以后版本均对 [Laravel](https://laravel.com/) 最新版提供支持。此版本将对原有代码结构进行比较大的调整，将模型和管理界面的配置逻辑进行分离。

## 说明
中正联达基础框架，主要包括以下功能:
### 基础功能
1. 代码生成脚手架
2. 基于角色的权限管理
3. 在线代码编辑器

### 业务模块
1. CMS Module
2. Shoping Module
3. WorkFlow Module

## 引用第三方组件
* [LaravelCollective/html](https://github.com/LaravelCollective/html) 生成表单以及 HTML
* [laravel-permission](https://github.com/spatie/laravel-permission) 权限控制
* [AdminLTE2](https://adminlte.io/themes/AdminLTE/index2.html)  后台管理 UI

## 安装

### 安装包文件

```shell
composer require "liiker/zzld-foundation:*"
```

## 配置
1. 修改 config/app.php 文件，在 `providers` 中添加 `Zzld\Foundation\Providers\FoundationServiceProvider::class`
2. 运行命令 `./artisan vendor:publish` 将扩展的配置和资源文件同步到项目目录下

## 框架使用

### 脚手架
脚手架用来快速生成代码骨架

* 生成 `html` 代码
> php artisan scaffold:gen-html model-name

* 生成 `api` 代码
> php artisan scaffold:gen-json model-name 

### 定制代码
#### 配置 `Model`
#### 配置 `Admin`
##### 配置 `Form`
##### 配置 `Grid`