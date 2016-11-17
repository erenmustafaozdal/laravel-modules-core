; var lmcApp; // LMCApp object
/*
 |--------------------------------------------------------------------------
 | Javascript config file and object
 |--------------------------------------------------------------------------
 */
"use strict";
var LMCApp = {

    /*
     |--------------------------------------------------------------------------
     | Variables
     |--------------------------------------------------------------------------
     */

    /**
     * default language object
     */
    lang: {
        formError: {
            defaultTitle: 'Form Hatalı',
            defaultMessage: 'Formda bazı hatalar var. Lütfen tekrar kontrol et.'
        },
        transactionError: {
            title: 'İşlem Devam Ediyor',
            message: 'Bir önceki işlemin bitmeden başka işlem yapamazsın'
        },
        ajaxErrors: {
            '400': {
                title: 'İstek İşlenemez',
                message: 'Tarayıcı tarafından yapılan istek işlenemez durumda. Lütfen daha sonra tekrar dene!'
            },
            '401': {
                title: 'Yetkin Yok',
                message: 'Bu işlemi yapmak için yetkin yok.'
            },
            '403': {
                title: 'Yetkin Yok',
                message: 'Bu işlemi yapmak için yetkin yok.'
            },
            '404': {
                title: 'Kaynak Bulunamadı',
                message: 'Tarayıcı tarafından istek gönderilen adresin kaynağı bulunamadı.'
            },
            '405': {
                title: 'İzin Verilmeyen Yöntem',
                message: 'Tarayıcı tarafından istek gönderilen yöntem desteklenmiyor.'
            },
            '406': {
                title: 'İstek Kabul Edilemez',
                message: 'Tarayıcı tarafından istenen kaynak istek kabul yeteneğine sahip değildir.'
            },
            '408': {
                title: 'Zaman Aşımı',
                message: 'Sunucu isteği beklerken zaman aşımına uğradı. HTTP özelliklerine göre: ".Sunucu beklemek için hazırlanan süre içinde bir istek vermedi. Daha sonra, değişiklik yapmadan isteği tekrarla."'
            },
            '422': {
                title: 'Veriler Onaylanmadı',
                message: 'Formda hata var veya aynı veriler tekrar kayıt edilmek istendi.'
            },
            '500': {
                title: 'Sunucu Hatası',
                message: 'Beklenmeyen bir durum ile karşılaşıldı. Lütfen daha sonra dene!'
            },
            '502': {
                title: 'Uygunsuz Ağ Geçidi',
                message: 'Sunucu bir ağ geçidi veya proxy gibi davranırken yukarı akış sunucusundan geçersiz bir yanıt aldı.'
            },
            '503': {
                title: 'Servis Hizmet Dışı',
                message: 'Servis aşırı yük veya bakım için durdurulmuş olabilir. Sunucu şu anda kullanılamıyor. Genellikle, bu geçici bir durumdur.'
            },
            '504': {
                title: 'Zaman Aşımı',
                message: 'Sunucu bir ağ geçidi veya proxy gibi davranırken yukarı akış sunucusundan zamanında yanıt alamadı.'
            },
            timeout: {
                title: 'Zaman Aşımı',
                message: 'İstek zaman aşımına uğradı. Lütfen aynı işlemi daha sonra tekrar dene.'
            },
            abort: {
                title: 'İptal Edildi',
                message: 'İstek sunucu tarafından iptal edildi. Lütfen aynı işlemi daha sonra tekrar dene.'
            },
            parsererror: {
                title: 'Ayrıştırılamadı',
                message: 'İstek sunucu tarafından ayrıştırılamadı. Lütfen aynı işlemi daha sonra tekrar dene.'
            }
        },
        // admin
        admin: {
            ops: {
                fast_add: 'Hızlı Ekle',
                show: 'Göster',
                edit: 'Düzenle',
                copy: 'Kopyala',
                fast_edit: 'Hızlı Düzenle',
                destroy_confirm: 'Kayıt silinecek! Emin misin?',
                destroy: 'Sil',
                activate: 'Aktifleştir',
                not_activate: 'Aktifliği Kaldır',
                publish: 'Yayınla',
                not_publish: 'Yayından Kaldır',
                browse: 'Gözat',
                crop: 'Kırp',
                select: 'Seç',
                write_here: 'Buraya yaz...',
                relations: 'İlişkili Veriler',
                relation_categories: 'İlişkili Kategoriler',
                file_manager: 'Dosya Yöneticisinden',
                set_main_photo: 'Ana Fotoğraf Yap',
                add_marker: 'İşaretçi Ekle',
                center_here: 'Merkez Yap',
                latitude: 'Enlem',
                longitude: 'Boylam',
                search_location: 'Konum Ara',
            },
            flash: {
                store_success: {
                    title: 'Ekleme Tamamlandı',
                    message: 'Ekleme işlemi başarılı bir şekilde gerçekleşti.'
                },
                store_error: {
                    title: 'Kayıt Eklenemedi',
                    message: 'Ekleme işlemi gerçekleşmedi. Lütfen daha sonra dene!'
                },
                update_success: {
                    title: 'Düzenleme Tamamlandı',
                    message: 'Düzenleme işlemi başarılı bir şekilde gerçekleşti.'
                },
                update_error: {
                    title: 'Kayıt Düzenlenemedi',
                    message: 'Düzenleme işlemi gerçekleşmedi. Lütfen daha sonra dene!'
                },
                destroy_info: {
                    title: 'Kayıt Silinecek',
                    message: 'Kayıt silinmek üzere... İstersen iptal ederek işlemi geri alabilirsin.<div class="clearfix"></div><button type="button" role="button" class="btn dark cancel-destroy"> İptal Et </button> '
                },
                destroy_success: {
                    title: 'Silme Tamamlandı',
                    message: 'Silme işlemi başarılı bir şekilde gerçekleşti.'
                },
                destroy_error: {
                    title: 'Kayıt Silinemedi',
                    message: 'Silme işlemi gerçekleşmedi. Lütfen daha sonra dene!'
                },
                destroy_self: {
                    title: 'Kendini Silemezsin',
                    message: 'Silme işlemi gerçekleşmedi. Kendini silemezsin!'
                },
                activate_success: {
                    title: 'Aktifleştirme Tamamlandı',
                    message: 'Aktifleştirme işlemi başarılı bir şekilde gerçekleşti.'
                },
                activate_error: {
                    title: 'Aktifleştirilemedi',
                    message: 'Aktifleştirme işlemi gerçekleşmedi. Lütfen daha sonra dene!'
                },
                not_activate_success: {
                    title: 'Aktifliği Kaldırma Tamamlandı',
                    message: 'Aktifliği kaldırma işlemi başarılı bir şekilde gerçekleşti.'
                },
                not_activate_error: {
                    title: 'Aktiflik Kaldırılamadı',
                    message: 'Aktifliği kaldırma işlemi gerçekleşmedi. Lütfen daha sonra dene!'
                },
                publish_success: {
                    title: 'Yayınlama Tamamlandı',
                    message: 'Yayınlama işlemi başarılı bir şekilde gerçekleşti.'
                },
                publish_error: {
                    title: 'Yayınlanamadı',
                    message: 'Yayınlama işlemi gerçekleşmedi. Lütfen daha sonra dene!'
                },
                not_publish_success: {
                    title: 'Yayından Kaldırma Tamamlandı',
                    message: 'Yayından kaldırma işlemi başarılı bir şekilde gerçekleşti.'
                },
                not_publish_error: {
                    title: 'Yayından Kaldırılamadı',
                    message: 'Yayından kaldırma işlemi gerçekleşmedi. Lütfen daha sonra dene!'
                },
                not_select_rows: {
                    title: 'Veri Seçilmedi',
                    message: 'Veri tablosunda hiçbir satır seçilmedi.'
                },
                not_select_action: {
                    title: 'Eylem Seçilmedi',
                    message: 'Veri tablosunda işlem yapmak için hiçbir eylem seçilmedi.'
                },
                group_action_success: {
                    title: 'Toplu İşlem Tamamlandı',
                    message: 'Toplu işlem başarılı bir şekilde gerçekleşti.'
                },
                group_action_error: {
                    title: 'Toplu İşlem Gerçekleşmedi',
                    message: 'Toplu işlem gerçekleşmedi. Lütfen daha sonra dene!'
                },
                nestable_level_error: {
                    title: 'Alt Öğe Ekleyemezsin',
                    message: 'İzin verilen alt öğe sınırı aşıldı! Bu öğeyi daha üst seviyeye eklemelisin.'
                },
                column_move_error: {
                    title: 'Sütun Taşınamaz',
                    message: 'Mega menülerin sütunları taşınamaz.'
                },
                column_update_error: {
                    title: 'Sütun Güncellenemez',
                    message: 'Mega menülerin sütunları güncellenemez.'
                },
                column_destroy_error: {
                    title: 'Sütun Silinemez',
                    message: 'Mega menülerin sütunları silinemez.'
                },
                column_near_store_error: {
                    title: 'Sütunların Yanına Kayıt Yapılamaz',
                    message: 'Mega menülerin sütunlarının yanına kayıt yapılamaz. Menüyü istediğin bir sütunun altına kaydetmelisin.'
                },
                column_near_move_error: {
                    title: 'Sütunların Yanına Taşınamaz',
                    message: 'Mega menülerin sütunlarının yanına menü taşınamaz. Menüyü istediğin bir sütunun altına taşımalısın.'
                },
                geolocate_success: {
                    title: 'Konumun Alındı',
                    message: 'Tarayıcın üzerinden konumunu aldık.'
                },
                geolocate_error: {
                    title: 'Konum Bulunamadı',
                    message: 'Tarayıcın üzerinden konum bulma işlemi gerçekleşmedi.'
                },
                geolocate_not_support_error: {
                    title: 'Desteklenmiyor',
                    message: 'Tarayıcın konum almamızı desteklemiyor.'
                }
            },
            validation: {
                max: {
                    array: {
                        title: 'Çok Fazla Nesne',
                        message: ':attribute değeri :max adedinden az nesneye sahip olmalıdır.'
                    }
                }
            }
        }
    },

    /**
     * domain link
     */
    link: 'http://'+window.location.host,

    /**
     * app has transaction
     */
    hasTransaction: false,

    /**
     * notification message default options
     */
    notyOptions: {
        message: 'Bilinmeyen bir hata ile karşılaştık. Lütfen aynı işlemi daha sonra tekrar dene.',
        title: 'Bilinmeyen Hata',
        type: 'error'
    },

    /**
     * toastr and destroy miliseconds
     * @var integer
     */
    waitMiliSeconds: 10000,

    /**
     * destroy timer
     */
    destroyTimer: null,



    /*
     |--------------------------------------------------------------------------
     | init functions
     |--------------------------------------------------------------------------
     */

    /**
     * LMCApp init
     * starting when page is firstly load
     */
    init: function()
    {
        this.initDateTimepicker(); // init date time picker
        this.initClipboard(); // init clipboard
        this.initBootstrapSelect(); // init bootstrap select
        this.initMaxLength(); // init maxlength
        this.initTooltips(); // init tooltips
        this.setToastrOptions(); // set toastr default options
        this.setBootboxOptions(); // set bootbox default options
        this.setPaceOptions(); // set pace default options
        this.setAjaxOptions();
        lmcApp = this;
    },

    /**
     * bootstrap select init
     */
    initClipboard: function()
    {
        $('.mt-clipboard').each(function(){
            new Clipboard(this);
        });
    },

    /**
     * bootstrap select init
     */
    initBootstrapSelect: function()
    {
        if (!$().selectpicker) {
            return;
        }

        $('.bs-select').selectpicker({
            iconBase: 'fa',
            tickIcon: 'fa-check'
        });
    },

    /**
     * maxlength init
     */
    initMaxLength: function()
    {
        var element = $('.maxlength');
        var limit = element.prop('maxlength');
        element.maxlength({
            limitReachedClass: "label label-danger",
            warningClass: "label label-info",
            separator: ' / ',
            preText: 'En fazla ' + limit + ' karakter kullanabilirsin! ',
            postText: ' karakter kullanıldı.',
            validate: true,
            alwaysShow: true
        });

    },

    /**
     * tooltips init
     */
    initTooltips: function()
    {
        $('.tooltips').tooltip({
            container: 'body',
            html: true,
            placement: "auto top"
        });

    },

    /**
     * datepicker init
     *
     * @param option
     */
    initDatepicker: function(option)
    {
        if (!$().datepicker) {
            return;
        }
        option = $.extend(true, {
            orientation: "auto",
            language: 'tr',
            todayHighlight: true,
            autoclose: true,
            weekStart: 1,
            todayBtn: true,
            clearBtn: true
        },option);
        $('.date-picker').datepicker(option);
    },

    /**
     * date timepicker init
     *
     * @param option
     */
    initDateTimepicker: function(option)
    {
        if (!$().datetimepicker) {
            return;
        }
        option = $.extend(true, {
            orientation: "auto",
            format: "dd.mm.yyyy hh:ii",
            pickerPosition: 'bottom-left',
            language: 'tr',
            todayHighlight: true,
            autoclose: true,
            weekStart: 1,
            todayBtn: true,
            clearBtn: true
        },option);
        $('.date-time-picker').datetimepicker(option);
    },

    /**
     * init bootstrap touchspin
     *
     * @param options
     */
    initTouchSpin: function(options) {
        var ops = $.extend(true, {
            src: '',
            touchspin: {
                min: 0,
                max: 100,
                initval: '',
                stepinterval: 100,
                stepintervaldelay: 500,
                step: 1,
                forcestepdivisibility: 'round', // 'none' | 'round' | 'floor' | 'ceil'
                decimals: 0,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '',
                postfix_extraclass: "",
                prefix: '',
                prefix_extraclass: "",
                verticalbuttons: false,
                verticalupclass: 'glyphicon glyphicon-plus',
                verticaldownclass: 'glyphicon glyphicon-minus',
                buttondown_class: "btn btn-sm red btn-outline",
                buttonup_class: "btn btn-sm green btn-outline"
            }
        }, options);

        $(ops.src).TouchSpin(ops.touchspin);
    },

    /**
     * init jquery input mask
     *
     * @param options
     */
    initInputMask: function(options)
    {
        if (!$().inputmask) {
            return;
        }
        var mask;
        var ops = $.extend(true, {
            src: '',
            type: '',
            inputmask: {
                placeholder: ' '
            }
        }, options);

        switch (ops.type) {
            case 'youtube':
                mask = "\\http\\s://www.\\youtube.co\\m/w\\atc\\h?v=*{1,20}";
                break;
            case 'phone':
                mask = "0(999) 999 99 99";
                break;
            case 'amount':
                mask = "99.999,99";
                break;
        }
        ops.inputmask.mask = mask;

        $(ops.src).inputmask(ops.inputmask);
    },



    /*
     |--------------------------------------------------------------------------
     | get functions
     |--------------------------------------------------------------------------
     */

    /**
     * get notification by default notification library
     * @param options object
     */
    getNoty: function(options)
    {
        var opt = $.extend(true, this.notyOptions, options);
        switch (opt.type)
        {
            case 'error':
                toastr.error(opt.message,opt.title);
                break;
            case 'warning':
                toastr.warning(opt.message,opt.title);
                break;
            case 'info':
                toastr.info(opt.message,opt.title);
                break;
            case 'success':
                toastr.success(opt.message,opt.title);
                break;
        }
    },



    /*
     |--------------------------------------------------------------------------
     | set functions
     |--------------------------------------------------------------------------
     */

    /**
     * set toastr notification default options
     */
    setToastrOptions: function()
    {
        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: 'toast-bottom-left',
            onclick: null,
            timeOut: this.waitMiliSeconds,
            extendedTimeOut: 5000
        };
    },

    /**
     * set bootbox default options
     */
    setBootboxOptions: function()
    {
        bootbox.setDefaults({
            locale: "tr",
            closeButton: false
        });
    },

    /**
     * page load view pace default options
     */
    setPaceOptions: function()
    {
        window.paceOptions = {
            ajax: true,
            startOnPageLoad: false
        };
    },

    /**
     * set jquery ajax setup options
     */
    setAjaxOptions: function()
    {
        $.ajaxSetup({
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                if (lmcApp.hasTransaction) {
                    lmcApp.getNoty({
                        title: lmcApp.lang.transactionError.title,
                        message: lmcApp.lang.transactionError.message,
                        type: 'error'
                    });
                    return false;
                }
                lmcApp.hasTransaction = true;

                Pace.restart();
            },
            complete: function (xhr,status) {
                Pace.stop();
                lmcApp.hasTransaction = false;
                switch (status) {
                    case 'error': // hata
                        LMCApp.getErrorMessage(xhr);
                        break;
                    case 'timeout': // zaman aşımı
                        lmcApp.getNoty({
                            title: lmcApp.lang.ajaxErrors.timeout.title,
                            message: lmcApp.lang.ajaxErrors.timeout.message,
                            type: 'error'
                        });
                        break;
                    case 'abort': // iptal edildi
                        lmcApp.getNoty({
                            title: lmcApp.lang.ajaxErrors.abort.title,
                            message: lmcApp.lang.ajaxErrors.abort.message,
                            type: 'error'
                        });
                        break;
                    case 'parsererror': // ayrıştırılamadı
                        lmcApp.getNoty({
                            title: lmcApp.lang.ajaxErrors.parsererror.title,
                            message: lmcApp.lang.ajaxErrors.parsererror.message,
                            type: 'error'
                        });
                        break;
                }
            }
        });
    },



    /*
     |--------------------------------------------------------------------------
     | global functions
     |--------------------------------------------------------------------------
     */

    /**
     * reset all form fields
     * @param target
     */
    resetAllFormFields: function(target)
    {
        $('textarea, select, input[type!="hidden"]', target).each(function()
        {
            $(this).val("").closest('.form-group')
                .removeClass('has-error').find('span.help-block').remove();
        });
        $('input[type="checkbox"]', target).each(function()
        {
            if ($(this).hasClass('make-switch')) {
                $(this).bootstrapSwitch('state', false, true);
            }
            $(this).attr("checked", false).closest('.form-group')
                .removeClass('has-error').find('span.help-block').remove();
        });

        // file input reset
        if (typeof theLMCFileinput == 'object') {
            theLMCFileinput.fileElement.fileinput('reset');
        }

        // select2 reset
        if ($('select.select2me', target).length) {
            $('select.select2me', target).each(function()
            {
                var options;
                if ( LMCSelect2s['.select2me'] != undefined ) {
                    options = LMCSelect2s['.select2me'];
                } else if ( $(this).hasClass('select2category') ) {
                    options = LMCSelect2s['.select2category'];
                } else {
                    options = LMCSelect2s['.select2brand'];
                }

                $(this).empty().select2(options.select2);
                $(this).find('.select2-selection__clear').remove();
            });
        }
        if ($('select.addresses', target).length) {
            $('select.addresses', target).each(function()
            {
                var id = $(this).prop('id');
                if (id !== 'province_id') {
                    $(this).prop('disabled',true);
                }
                $(this).empty().select2(LMCSelect2s['#' + id].select2);
                $(this).find('.select2-selection__clear').remove();
            });
        }
    },

    /**
     * timer when click destroy
     * @param destroyCallback
     * @param cancelCallback
     */
    startDestroyTimer: function(destroyCallback, cancelCallback)
    {
        this.getNoty({
            message: this.lang.admin.flash.destroy_info.message,
            title: this.lang.admin.flash.destroy_info.title,
            type: 'info'
        });
        this.destroyTimer = window.setTimeout(destroyCallback, this.waitMiliSeconds);

        $('.toast-message').on('click', '.cancel-destroy', function()
        {
            clearTimeout(LMCApp.destroyTimer);
            cancelCallback.call();
        });
    },

    /**
     * get ajax error with xhr status
     * @param xhr
     */
    getErrorMessage: function(xhr)
    {
        lmcApp.getNoty({
            title: LMCApp.lang.ajaxErrors[xhr.status].title,
            message: LMCApp.lang.ajaxErrors[xhr.status].message,
            type: 'error'
        });
    },

    /**
     * get opposite aspect ratio
     *
     * @param oldAspect
     * @param type [square,vertical,horizontal]
     */
    getOppositeAspect: function(oldAspect, type)
    {
        if (type === 'square') {
            return 1;
        }

        if ( type === 'horizontal' && oldAspect <= 1 ) {
            return horizontalRatio;
        }

        if ( type === 'vertical' && oldAspect >= 1 ) {
            return verticalRatio;
        }
        return oldAspect;
    },

    /**
     * strip tags function
     *
     * @param html
     */
    stripTags: function(html)
    {
        if (html == null) { return html;}
        return html.replace(/(<([^>]+)>)/ig,"");
    },

    /**
     * remove element
     *
     * @param options
     */
    removeElement: function(options)
    {
        var opt = $.extend(true, {
            element: null,          // jquery element
            removeElement: {
                type: 'closest',    // where is remove element (jquery function) [closest|other]
                src: ''
            },
            ajax: {
                url: '',            // ajax url
                data: {}            // ajax data
            }
        }, options);

        bootbox.confirm(LMCApp.lang.admin.ops.destroy_confirm,function(result)
        {
            if ( ! result ) {
                return;
            }

            $.ajax({
                url: opt.ajax.url,
                data: opt.ajax.data,
                success: function (data)
                {
                    if (data.result !== 'success') {
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.destroy_error.message,
                            title: LMCApp.lang.admin.flash.destroy_error.title,
                            type: 'error'
                        });
                        return;
                    }
                    LMCApp.getNoty({
                        message: LMCApp.lang.admin.flash.destroy_success.message,
                        title: LMCApp.lang.admin.flash.destroy_success.title,
                        type: 'success'
                    });
                    // remove element
                    switch (opt.removeElement.type) {
                        case 'closest':
                            opt.element.closest('.element-wrapper').fadeOut().remove();
                            break;
                        default:
                            $('.element-wrapper').fadeOut().remove();
                            break;
                    }
                }
            });
        });
    }
};
