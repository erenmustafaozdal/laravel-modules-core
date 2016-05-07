# laravel-modules-core

##### Varsayılan Menü Tasarımı
**Laravel User Module** varsayılan tasarımı içinde [caffeinated/menus](https://github.com/caffeinated/menus) paketini kullanarak menü oluşturuyor. Eğer varsayılan tasarımı kullanacaksan `app/Http/Kernel.php` dosyandaki `$middleware` dizi değişkenine `\ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\MenuMiddleware::class` değerini eklemeyi unutma!
