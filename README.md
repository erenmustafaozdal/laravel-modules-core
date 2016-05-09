# laravel-modules-core

##### Görünümlerde Kullanılan Varlıklar
Eğer varsayılan temayı kullanacaksan, paketin viewlerinde kullanılan `css` ve `js` varlıklarını da yayınlamalısın. Bunun için aşağıdaki komutu kullan:
```bash
php artisan vendor:publish --provider="ErenMustafaOzdal\LaravelModulesCore\LaravelModulesCoreServiceProvider" --tag="public" --force
```

##### Varsayılan Menü Tasarımı
**Laravel User Module** varsayılan tasarımı içinde [caffeinated/menus](https://github.com/caffeinated/menus) paketini kullanarak menü oluşturuyor. Eğer varsayılan tasarımı kullanacaksan `app/Http/Kernel.php` dosyandaki `$middleware` dizi değişkenine `\ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\MenuMiddleware::class` değerini eklemeyi unutma!
