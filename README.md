Laravel Modules Core
===================
[![Laravel 5.1](https://img.shields.io/badge/Laravel-5.1-orange.svg?style=flat-square)](https://laravel.com/docs/5.1/)
[![Source](https://img.shields.io/badge/source-erenmustafaozdal/laravel--modules--core-blue.svg?style=flat-square)](https://github.com/erenmustafaozdal/laravel-modules-core)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

**Laravel Modules Core** geliştirdiğim Laravel 5.1 modüllerinde, kendi ihtiyaçlarıma göre dizayn ettiğim tsaarımları kapsamaktadır. Kendi ihtiyaçlarım için geliştirirken, diğer geliştiricilerin de tercihine sunmaktayım. İstersen bu şekilde kullanabilir veya esinlenebilirsin.

:exclamation: Bu pakette tasarım ve javascript işlemleri tamamen kendi ihtiyaçlarımı karşılama amacıyla tasarlanmıştır. Her türlü fikir ve eleştirilerinizi kabul etmekle birlite, her an kendi ihtiyacıma göre dizaynı veya işleyişi değiştirme hakkımı saklı tutarım.

**Laravel Modules Core** kurulumu gayet basit bir tasarım paketidir. Diğer geliştirdiğim veya geliştireceğim modüllerle tam uyumlu çalışmaktadır. Kurulumu yaptıktan sonra, eğer hiçbir değişiklik yapmayacaksan; var olan modülleri kullanacak şekilde hiçbir işlem yapmana gerek kalmayacaktır.

Güncellemeler
-------
#### 10 Ağustos 2016 - v0.2.0
* [barryvdh/laravel-elfinder](https://github.com/barryvdh/laravel-elfinder) ile Elfinder dosya yöneticisi sisteme dahil edildi. Bu paketin ayarlarını ['config/laravel-modules-core'](https://github.com/erenmustafaozdal/laravel-modules-core/blob/develop/config/laravel-modules-core.php) dosyasından yapabilirsin.
* Admin panelinde üstte bulunan "Eylemler" ve yanda bulunan "Kenar" menüleri ayar dosyası üzerinden düzenleme imkanı getirildi. Bunun için ayar dosyasında `menus.action` ve `menus.side` değişkenlerini düzenleyin.
* Genelde görünüm dosyalarında olmak üzere çeşitli yerlerde metin düzenleme işlemlerinde kullanılan `str_replace()` fonksiyonu kaldırılmıştır. Bu düzenlemeler için `trans()` fonksiyonunun ikinci parametresi kullanılmaya başlanmıştır.
* Assets içindeki `css` ve `js` dosyaları minimize edilmiş hali yerine orjinal hali getirilmiştir. Gerekli düzenlemeleri yazılımcıların yapabilmesi göz önünde bulundurulmuştur.


Yapılacaklar
-------
* Ayar dosyasındaki menü yönetimi daha basit hale getirilecek.



1. [Kurulum](#kurulum)
    1. [Dosyaların Yayınlanması](#kurulum-dosyalarinYayinlanmasi)
    2. [Menü Tasarımı](#kurulum-menuTasarimi)
2. [Kullanım](#kullanim)
    1. [Genel Ayarlar](#kullanim-ayarDosyasi-genelAyarlar)
    2. [Görünüm Ayarları](#kullanim-ayarDosyasi-gorunumAyarlari)
    3. [Paketler Ayarları](#kullanim-ayarDosyasi-paketlerAyarlari)
3. [Lisans](#lisans)
4. [Ekran Görüntüleri](#ekranGoruntuleri)


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

> :exclamation: **Laravel Modules Core** dosya yönetimi arayüzü ve arka plan işlemleri için  [barryvdh/laravel-elfinder](https://github.com/barryvdh/laravel-elfinder) paketini kullanıyor. Kurulum sonrasında bu paketin ayar dosyasını da yayınlayıp, kendine göre düzenlemelisin.


<a name="kurulum-dosyalarinYayinlanmasi"></a>
##### Dosyaların Yayınlanması

**Laravel Modules Core** paketinin dosyalarını aşağıdaki kodla yayınlamalısın.

```bash
php artisan vendor:publish --provider="ErenMustafaOzdal\LaravelModulesCore\LaravelModulesCoreServiceProvider"
```


<a name="kurulum-menuTasarimi"></a>
#### # Menü Tasarımı
**Laravel Modules Core** varsayılan tasarımı içinde [caffeinated/menus](https://github.com/caffeinated/menus) paketini kullanarak menü oluşturuyor. Menülerin aktif hale gelmesi için `app/Http/Kernel.php` dosyandaki `$middleware` dizi değişkenine `\ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\MenuMiddleware::class` değerini eklemeyi unutma!



<a name="kullanim"></a>
Kullanım
--------

Kurulum bittikten sonra, varolan paketlerin için her şey hazır olmuş olacak. Harika değil mi? Şimdi istersen biraz ayarlamalarda oynamalar yapalım.

> :exclamation: Metinler yanlış görünüyorsa, paketin İngilizce dil dosyaları hazır olmadığı içindir. Bu sebeple projenin `config/app.php` dosyasında `'locale' => 'tr'` tanımlaması yapmalısın.


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

Tasarımda kullanılan paketlerin tanımlaması. Yani "Burada bulunan paketleri kullanıyorum ve tasarımda bu paketlerle ilgili içerikler ekle" anlamına gelen ayarlar! Bu ayar, ayar dosyasının `packages` alanı altında bulunuyor.


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


 <a name="ekranGoruntuleri"></a>
Ekran Görüntüleri
------

### Laravel User Module

[![Kullanıcılar](http://i.hizliresim.com/mLZN02.png)](http://hizliresim.com/mLZN02)
[![Kullanıcılar sayfası hızlı kullanıcı ekleme ekranı](http://i.hizliresim.com/AJPXpQ.png)](http://hizliresim.com/AJPXpQ)
[![Yeni kullanıcı ekleme](http://i.hizliresim.com/aERN6d.png)](http://hizliresim.com/aERN6d)
[![Yeni kullanıcı ekleme - Fotoğraf](http://i.hizliresim.com/nroNBa.png)](http://hizliresim.com/nroNBa)
[![Yeni kullanıcı ekleme - İzinler](http://i.hizliresim.com/qBnNV3.png)](http://hizliresim.com/qBnNV3)
[![Kullanıcı bilgileri](http://i.hizliresim.com/WYRp5q.png)](http://hizliresim.com/WYRp5q)
[![Roller](http://i.hizliresim.com/GzX4ay.png)](http://hizliresim.com/GzX4ay)
[![Roller sayfası hızlı rol ekleme ekranı](http://i.hizliresim.com/pPVNlN.png)](http://hizliresim.com/pPVNlN)
[![Yeni rol ekleme](http://i.hizliresim.com/l1RNml.png)](http://hizliresim.com/l1RNml)
[![Rol bilgileri](http://i.hizliresim.com/X4p3Ao.png)](http://hizliresim.com/X4p3Ao)

### Laravel Page Module

[![Sayfaların ve sayfa kategorilerinin listelendiği sayfa](http://i.hizliresim.com/NkVGlO.jpg)](http://hizliresim.com/NkVGlO)
[![Hızlı sayfa ekleme penceresi](http://i.hizliresim.com/LQPGZj.jpg)](http://hizliresim.com/LQPGZj)
[![Elfinder dosya yöneticisi](http://i.hizliresim.com/kEr0bW.jpg)](http://hizliresim.com/kEr0bW)
[![Sayfa ekleme ve düzenleme sayfası ve editör (Tinymce)](http://i.hizliresim.com/LQPGyj.jpg)](http://hizliresim.com/LQPGyj)
[![Sayfa bilgilerinin gösterildiği ve satır içi düzenleme yapıldı sayfa](http://i.hizliresim.com/dXjMGX.jpg)](http://hizliresim.com/dXjMGX)
