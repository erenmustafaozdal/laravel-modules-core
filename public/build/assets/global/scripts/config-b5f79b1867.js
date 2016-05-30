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
            authorization: {
                title: 'Yetkin Yok',
                message: 'Bu işlemi yapmak için yetkin yok.'
            },
            validation: {
                title: 'Veriler Onaylanmadı',
                message: 'Formda hata var veya aynı veriler tekrar kayıt edilmek istendi.'
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
                fast_edit: 'Hızlı Düzenle',
                destroy: 'Sil',
                activate: 'Aktifleştir',
                not_activate: 'Aktifliği Kaldır',
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
        lmcApp = this;
        this.initTooltips(); // init tooltips
        this.setToastrOptions(); // set toastr default options
        this.setBootboxOptions(); // set bootbox default options
        this.setPaceOptions(); // set pace default options
        this.setAjaxOptions();
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
     */
    initDatepicker: function()
    {
        if (!$().datepicker) {
            return;
        }

        $('.date-picker').datepicker({
            orientation: "left",
            language: 'tr',
            todayHighlight: true,
            autoclose: true,
            weekStart: 1,
            todayBtn: true,
            clearBtn: true
        });
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
                        // authorization
                        if (xhr.status === 403 || xhr.status === 401) {
                            lmcApp.getNoty({
                                title: lmcApp.lang.ajaxErrors.authorization.title,
                                message: lmcApp.lang.ajaxErrors.authorization.message,
                                type: 'error'
                            });
                            return;
                        }
                        // validation
                        if (xhr.status === 422) {
                            var errors = JSON.parse(xhr.responseText), message;
                            if (errors.length < 1) {
                                message = lmcApp.lang.ajaxErrors.validation.message;
                            } else {
                                message  = '<ul>';
                                $.each(errors, function(key,value)
                                {
                                    message += '<li> ' + value + '</li>';
                                });
                                message += '</ul>';
                            }
                            lmcApp.getNoty({
                                title: lmcApp.lang.ajaxErrors.validation.title,
                                message: message,
                                type: 'error'
                            });
                            return;
                        }
                        lmcApp.getNoty();
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
        $('textarea, select, input', target).each(function()
        {
            $(this).val("").closest('.form-group')
                .removeClass('has-error').find('span.help-block').remove();
        });
        $('input[type="checkbox"]', target).each(function()
        {
            $(this).attr("checked", false).closest('.form-group')
                .removeClass('has-error').find('span.help-block').remove();
        });
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
    }
};
