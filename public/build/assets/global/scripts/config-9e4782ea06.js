; var lmcApp; // LMCApp object
/*
 |--------------------------------------------------------------------------
 | Javascript config file and object
 |--------------------------------------------------------------------------
 */
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
        transactionError: {
            title: 'İşlem Devam Ediyor',
            message: 'Bir önceki işlemin bitmeden başka işlem yapamazsın'
        },
        ajaxErrors: {
            authorization: {
                title: 'Yetkin Yok',
                message: 'Bu işlemi yapmak için yetkin yok.'
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
        lmcApp = lmcApp === "undefined" ? this : lmcApp;
        this.initTooltips(); // init tooltips
        this.setToastrOptions(); // set toastr default options
        this.setBootboxOptions(); // set bootbox default options
        this.setPaceOptions(); // set pace default options
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
            timeOut: 10000,
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
            "startOnPageLoad": false
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
                        message: lmcApp.lang.transactionError.message
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
                        if (xhr.status == 403 || xhr.status == 401) {
                            lmcApp.getNoty({
                                title: lmcApp.lang.ajaxErrors.authorization.title,
                                message: lmcApp.lang.ajaxErrors.authorization.message
                            });
                            return;
                        }
                        lmcApp.getNoty();
                        break;
                    case 'timeout': // zaman aşımı
                        lmcApp.getNoty({
                            title: lmcApp.lang.ajaxErrors.timeout.title,
                            message: lmcApp.lang.ajaxErrors.timeout.message
                        });
                        break;
                    case 'abort': // iptal edildi
                        lmcApp.getNoty({
                            title: lmcApp.lang.ajaxErrors.abort.title,
                            message: lmcApp.lang.ajaxErrors.abort.message
                        });
                        break;
                    case 'parsererror': // ayrıştırılamadı
                        lmcApp.getNoty({
                            title: lmcApp.lang.ajaxErrors.parsererror.title,
                            message: lmcApp.lang.ajaxErrors.parsererror.message
                        });
                        break;
                }
            }
        });
    }
};