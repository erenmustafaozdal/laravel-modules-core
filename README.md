Laravel Modules Core
===================
[![Laravel 5.1](https://img.shields.io/badge/Laravel-5.1-orange.svg?style=flat-square)](https://laravel.com/docs/5.1/)
[![Source](https://img.shields.io/badge/source-erenmustafaozdal/laravel--modules--core-blue.svg?style=flat-square)](https://github.com/erenmustafaozdal/laravel-modules-core)
[![License](http://img.shields.io/badge/license-MIT-brig

**Laravel Modules Core** geliştirdiğim Laravel 5.1 modüllerinde, kendi ihtiyaçlarıma göre dizayn ettiğim tsaarımları kapsamaktadır. Kendi ihtiyaçlarım için geliştirirken, diğer geliştiricilerin de tercihine sunmaktayım. İstersen bu şekilde kullanabilir veya esinlenebilirsin.

:exclamation: Bu pakette tasarım ve javascript işlemleri tamamen kendi ihtiyaçlarımı karşılama amacıyla tasarlanmıştır. Her türlü fikir ve eleştirilerinizi kabul etmekle birlite, her an kendi ihtiyacıma göre dizaynı veya işleyişi değiştirme hakkımı saklı tutarım.

**Laravel Modules Core** kurulumu gayet basit bir tasarım paketidir. Diğer geliştirdiğim veya geliştireceğim modüllerle tam uyumlu çalışmaktadır. Kurulumu yaptıktan sonra, eğer hiçbir değişiklik yapmayacaksan; var olan modülleri kullancak şekilde hiçbir işlem yapmana gerek kalmayacaktır.

1. [Kurulum](#kurulum)
    1. [Dosyaların Yayınlanması](#kurulum-dosyalarinYayinlanmasi)
    2. [Menü Tasarımı](#kurulum-menuTasarimi)
2. [Kullanım](#kullanim)
    1. [Genel Ayarlar](#kullanim-ayarDosyasi-genelAyarlar)
    2. [Görünüm Ayarları](#kullanim-ayarDosyasi-gorunumAyarlari)
    3. [Paketler Ayarları](#kullanim-ayarDosyasi-paketlerAyarlari)
3. [Lisans](#lisans)


<a name="kurulum"></a>
Kurulum
-------
Composer ile yüklemek için aşağıdaki kodu kullanabilirsin.

```bash
composer require erenmustafaozdal/laravel-modules-core
```

Ya da `composer.json` dosyana, aşağıdaki gibi ekleme yapıp, paketleri güncelleyebilirsin.

```json
{
    "require": {
        "erenmustafaozdal/laravel-modules-core": "~0.1"
    }
}
```

```bash
composer update
```

Bu işlem bittikten sonra, service provider'i projenin `config/app.php` dosyasına eklemelisin.

```php
ErenMustafaOzdal\LaravelModulesCore\LaravelModulesCoreServiceProvider::class,
```

> :exclamation: Bu paketin service provider tanımlamasını, modüllerin service provider tanımlamalarının üzerinde yapmalısın.


<a name="kurulum-dosyalarinYayinlanmasi"></a>
##### Dosyaların Yayınlanması

**Laravel Modules Core** paketinin dosyalarını aşağıdaki kodla yayınlamalısın.

```bash
php artisan vendor:publish --provider="ErenMustafaOzdal\LaravelModulesCore\LaravelModulesCoreServiceProvider"
```


<a name="kurulum-menuTasarimi"></a>
##### Menü Tasarımı
**Laravel Modules Core** varsayılan tasarımı içinde [caffeinated/menus](https://github.com/caffeinated/menus) paketini kullanarak menü oluşturuyor. Menülerin aktif hale gelmesi için `app/Http/Kernel.php` dosyandaki `$middleware` dizi değişkenine `\ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\MenuMiddleware::class` değerini eklemeyi unutma!



<a name="kullanim"></a>
Kullanım
--------

Kurulum bittikten sonra, varolan paketlerin için her şey hazır olmuş olacak. Harika değil mi? Şimdi istersen biraz ayarlamalarda oynamalar yapalım.

> :exclamation: metinler yanlış görünüyorsa, paketin İngilizce dil dosyaları hazır olmadığı içindir. Bu sebeple projenin `config/app.php` dosyasında `'locale' => 'tr'` tanımlaması yapmalısın.


<a name="kullanim-ayarDosyasi"></a>
### Ayar Dosyası


<a name="kullanim-ayarDosyasi-genelAyarlar"></a>
##### Genel Ayarlar

Paketin içinde kullanılan genel ayarlar. Ayar dosyası içinde kök alanda bulunan ayarlar.

| Ayar | Açıklama | Varsayılan Değer |
|---|---|---|
| app_name | Footer vb. yerlerde kullanılan uygulama adı | Laravel Modules |
| copyright_year | Footer vb. yerlerde kullanılan telif hakkı yılı | 2016 |


<a name="kullanim-ayarDosyasi-gorunumAyarlari"></a>
##### Görünüm Ayarları

Görünümler içinde kullanılan bazı değerlerin tanımlamalarıdır. Ayar dosyasının `views` alanı altında bulunan ayarlardır.

| Ayar | Açıklama | Varsayılan Değer |
|---|---|---|
| html_lang | HTML dil seçeneği | tr |
| html_head.content_type | HTML içerik tipi | text/html; charset=UTF-8 |
| html_head.charset | HTML karakter seti | utf-8 |
| html_head.default_title | Her sayfa başlığında bulunan ve `... | Başlık` şeklinde konumlanan başlıktır | Laravel Modules |
| html_head.meta_description | HTML meta açıklama | Laravel Modules packages |
| html_head.meta_author | HTML meta yazar | Eren Mustafa ÖZDAL |
| html_head.meta_keywords | HTML meta anahtar kelimeler | laravel,modules,packages |
| html_head.meta_robots | admin paneli için meta robots değişkeni | noindex,nofollow |
| html_head.meta_googlebot | admin paneli için meta googlebot değişkeni | noindex,nofollow |


<a name="kullanim-ayarDosyasi-paketlerAyarlari"></a>
##### Paketler Ayarları

Tasarımda kullanılan paketlerin tanımlaması. Yani burada bulunan paketleri kullanıyorum ve tasarımda bu paketlerle ilgili içerikler ekle! Bu ayar, ayar dosyasının `packages` alanı altında bulunuyor.


> :exclamation: varsayılan olarak bütün paketler burada tanımlıdır veya tanımlı olacaktır. Kullanmadıklarını buradan çıkarmalısın. Örnek tanımlama şu şeklidedir:

```php
'packages' => [
    'laravel-user-module'   => \ErenMustafaOzdal\LaravelUserModule\LaravelUserModuleServiceProvider::class
]
```
 
 
 <a name="lisans"></a>
Lisans
------
MIT
