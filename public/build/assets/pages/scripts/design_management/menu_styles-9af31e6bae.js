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

        $('#save-order').on('click',function(e)
        {
            var datas = {}, left = $('#top_box_left').sortable('toArray'), right = $('#top_box_right').sortable('toArray');
            $.each(left, function(index, value)
            {
                datas[value] = { location: 'left', order: index + 1 };
            });
            $.each(right, function(index, value)
            {
                datas[value] = { location: 'right', order: index + 1 };
            });

            $.ajax({
                data: datas,
                url: saveTopBoxOrderURL,
                success: function(data)
                {
                    if (data.result === 'success') {
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.update_success.message,
                            title: LMCApp.lang.admin.flash.update_success.title,
                            type: 'success'
                        });
                        return;
                    }
                    LMCApp.getNoty({
                        message: LMCApp.lang.admin.flash.update_error.message,
                        title: LMCApp.lang.admin.flash.update_error.title,
                        type: 'error'
                    });
                }
            });
        });
        $('#top_box_components, #top_box_left, #top_box_right').sortable({
            axis: 'x',
            connectWith: '.top_box_components',
            items: '.component',
            opacity: 0.5,
            coneHelperSize: true,
            placeholder: 'icon-btn-sortable-placeholder',
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            helper: 'clone',
            revert: 250
        }).disableSelection();

    }
};
