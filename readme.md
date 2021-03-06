# shcms

一个基于laravel5.2最佳实践的cms程序，使用众多现代web开发特性。

## 在线DEMO

香港1M带宽

http://shcms.endaosi.com/

## 特色
 - 内容分类
 
   抽象tag和category为meta表, 使用Eloquent ORM的global scope特性来自动维护meta表的type字段，
 meta和article的关系为多对多（即一篇文章可以属于多个标签和分类，一个分类或分类也可以被绑定到多个文章）

 - 权限管理
 
   使用`zizaco/entrust`库作权限管理，权限定义可参考`<root>/database/seeds/UsersSeeder.php`

 - 现代化的数据迁移
 
   充分使用现代框架的特性，migrate and seed

 - 云平台友好

   可部署于国内流行的应用引擎，如BAE等。
   
 - 随处可见的最佳实践

   例如根目录的`helpers.php`中书写的全局函数使用composer autoload来加载。
   
 - 灵活的配置（config）

   使用`App\\SiteConfigLoadProvider`加载数据库配置，例如网站标题(site_title)，既可以在<root>/config/system.php中定义，也可在数据库中定义。
 - 规范的异常处理

   大量使用异常来控制程序流程。例如定义了`App\\Exceptions\DeniedPermissionException`来管理权限不足时的异常。并在App\\Exceptions\Handler中进行相应的权限不足时的友好页面显示
   
 - 不写重复的代码

   使用`App\\ModelTrait\\ModelHelperTrait`进行方便的条件筛选，你可以使用User::autoWithAll() -> get();来自动使用get参数中的参数作为sql的where参数。
   
   当默认的“时间范围”“等于”“限制返回数量”“自定义和随机排序”不能满足你的要求时，你还可以自定义修改App\\ModelTrait\\ModelHelperTrait来实现你自己的过滤。
   
   使用这个技巧，你可以不用再在控制器中书写冗长的where语句了。
 

## 使用方法

```bash

git clone git@github.com:shellus/shcms.git

cd shcms

composer install

cp .env.example .env

php artisan key:generate

#edit .env change database connect info

php artisan migrate

php artisan db:seed

```

可选执行

> 如果你使用redis，请执行 `composer require predis/predis` 
> 并修改 `.env` 文件中的`CACHE_DRIVER` `SESSION_DRIVER` `QUEUE_DRIVER` 值为`redis`

> 如果看到权限不足（permission denied）的提示，请执行 `chmod -R 777 storage/`

## 约定与定义

user 网站用户

article 文章

goods/item 商品

shop_cart 购物车

goods_spec 商品规格，如 颜色 套餐，和价格关联。不同规格可以有不同的价格

goods_attribute 商品属性 描述商品，且可以用来做属性搜索。


## 文档

暂无

## 开源协议

shcms is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
