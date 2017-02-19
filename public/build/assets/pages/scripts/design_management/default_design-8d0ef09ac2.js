;var theModel;
var Model = {

    /**
     * user create options
     * @var object
     */
    options: {
        formSrc: 'form.form-horizontal'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        theModel = this;

        this.form = $(this.options.formSrc);

        $('.color-picker').minicolors({
            control: 'hue',
            letterCase: 'lowercase',
            position: 'bottom right',
            theme: 'bootstrap'
        });

        // save as default
        var defaultAjax = function(type)
        {
            $.ajax({
                data: {form: 'default_design', type: type},
                url: defaultDesignChangeURL,
                success: function(data)
                {
                    if (data.result === 'success') {
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.update_success.message,
                            title: LMCApp.lang.admin.flash.update_success.title,
                            type: 'success'
                        });
                        location.reload();
                        return;
                    }
                    LMCApp.getNoty({
                        message: LMCApp.lang.admin.flash.update_error.message,
                        title: LMCApp.lang.admin.flash.update_error.title,
                        type: 'error'
                    });
                }
            });
        };
        $('#save-as-default').on('click',function(e)
        {
            bootbox.confirm('<em class="text-info">Default renkler</em> değiştirildiğinde tekrar <em class="text-danger">geri dönülemez</em>. <em class="text-info">Geçerli renkleri</em>, <em class="text-info">default renkler</em> olarak kaydetmek istediğine emin misin?', function(res)
            {
                if (res) {
                    defaultAjax('save');
                }
            })
        });
        $('#back-to-default').on('click',function(e)
        {
            bootbox.confirm('<em class="text-info">Geçerli renkler</em>, <em class="text-info">default renklere</em> geri döndüğünde yaptığın bütün <em class="text-danger">değişiklikleri kaybetmiş olacaksın</em>. Geri dönmek istediğine emin misin?', function(res)
            {
                if (res) {
                    defaultAjax('back');
                }
            })
        });

    }
};
