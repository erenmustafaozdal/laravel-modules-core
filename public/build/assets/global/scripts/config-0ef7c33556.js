var Config = function () {

    /*
     |--------------------------------------------------------------------------
     | Tooltips Metronic ayarlarının üzerine yazma
     |--------------------------------------------------------------------------
     */
    var handleTooltips = function ()
    {
        $('.tooltips').tooltip({
            container: 'body',
            html: true,
            placement: "auto top"
        });
    };

    /*
     |--------------------------------------------------------------------------
     | Bootbox default ayarları
     |--------------------------------------------------------------------------
     */
    bootbox.setDefaults({
        locale: "tr",
        closeButton: false
    });

    /*
     |--------------------------------------------------------------------------
     | Toastr notification ayar işlemleri
     |--------------------------------------------------------------------------
     */
    var toastrOptionReset = function ()
    {
        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: 'toast-bottom-left',
            onclick: null,
            timeOut: 10000,
            extendedTimeOut: 5000
        };
    };

    /*
     |--------------------------------------------------------------------------
     | Her türlü bildirimleri fırlatan fonksiyon
     |--------------------------------------------------------------------------
     | @param {string} [type] [bildirim tipi (error ,info, success, warning) ]
     | @param {string} [message] [bildirim içeriği]
     | @param {string} [title] [bildirim başlığı]
     */
    var getNoty = function (title,message,type)
    {
        switch (type)
        {
            case 'error':
                toastr.error(message,title);
                break;
            case 'warning':
                toastr.warning(message,title);
                break;
            case 'info':
                toastr.info(message,title);
                break;
            case 'success':
                toastr.success(message,title);
                break;
        }
    };

    /*
     |--------------------------------------------------------------------------
     | Sistem içinde lazım olan bazı değişkenler
     |--------------------------------------------------------------------------
     */
    var LINK = 'http://'+window.location.host;
    var TRANSACTION = true; // üst üste işlem yapmaması için
    var TRANSACTION_MESSAGE = function () {
        getNoty('İşlem Devam Ediyor','Bir önceki işlemin bitmeden başka işlem yapamazsın','error');
    };

    /*
     |--------------------------------------------------------------------------
     | ajaxlarda yükleme işlemini gösterecek olan pace ayarları
     |--------------------------------------------------------------------------
     */
    window.paceOptions = {
        ajax: true,
        "startOnPageLoad": false
    };

    /*
     |--------------------------------------------------------------------------
     | ajaxSetup ile default ajax parametreleri belirlenir
     |--------------------------------------------------------------------------
     */
    $.ajaxSetup({
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            if (!TRANSACTION) {
                TRANSACTION_MESSAGE();
                return false;
            }
            TRANSACTION = false;

            Pace.restart();
        },
        complete: function (xhr,status) {
            Pace.stop();
            TRANSACTION = true;
            switch (status) {
                case 'error': // hata
                    if (xhr.status == 403 || xhr.status == 401) {
                        getNoty('Yetkin Yok','Bu işlemi yapmak için yetkin yok.','error');
                        return;
                    }
                    getNoty('Bilinmeyen Hata','Bilinmeyen bir hata ile karşılaştık. Lütfen aynı işlemi daha sonra tekrar dene.','error');
                    break;
                case 'timeout': // zaman aşımı
                    getNoty('Zaman Aşımı','İstek zaman aşımına uğradı. Lütfen aynı işlemi daha sonra tekrar dene.','error');
                    break;
                case 'abort': // iptal edildi
                    getNoty('İptal Edildi','İstek sunucu tarafından iptal edildi. Lütfen aynı işlemi daha sonra tekrar dene.','error');
                    break;
                case 'parsererror': // ayrıştırılamadı
                    getNoty('Ayrıştırılamadı','İstek sunucu tarafından ayrıştırılamadı. Lütfen aynı işlemi daha sonra tekrar dene.','error');
                    break;
            }
        }
    });

    return {
        init: function() {
            handleTooltips();
            toastrOptionReset();
        }
    };

}();