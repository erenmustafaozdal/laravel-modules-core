;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
    });
    $script.ready(['jquery','bootstrap'], function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js', 'bs_select');
    });
    $script.ready(['config','operation','bs_select','app_fileinput','app_jcrop'], function()
    {
        Operation.init();

        var search = $('#module-search');
        search.val('');
        search.on('change',function()
        {
            var value = $(this).val();
            var panel = $('#menu-modules');
            panel.find('label.control-label:not(:contains('+value+'))').closest('.list-group-item')
                .addClass('search-close')
                .removeClass('search-open')
                .hide();
            panel.find('label.control-label:contains('+value+')').closest('.list-group-item')
                .removeClass('search-close')
                .addClass('search-open')
                .show();

            panel.find('div.panel').each(function()
            {
                var lists = $(this).find('li.list-group-item.search-open');
                if (lists.length == 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        }).on('keyup',function()
        {
            $(this).change();
        });

        // type change
        $('input[type="radio"][name="type"][value="mega"]').on('ifChecked', function()
        {
            var columnNumber = $('#menu-column-number');
            if (columnNumber.hasClass('hidden')) columnNumber.removeClass('hidden');

            // column number a göre photo düzenle
            photoChange($('select[name="column_number"]').val());
        });
        $('input[type="radio"][name="type"][value="normal"]').on('ifChecked', function()
        {
            var columnNumber = $('#menu-column-number');
            if (! columnNumber.hasClass('hidden')) columnNumber.addClass('hidden');
        });

        // column change
        $('select[name="column_number"]').on('change',function()
        {
            photoChange($(this).val());
        });
        var photoChange = function(value)
        {
            var photo = $('#menu-photo');
            var textInput = $('.tabbable-line').find('input.elfinder[type="text"]');
            var fileinput = $('#photo');
            if (value == 2) {
                if (photo.hasClass('hidden')) photo.removeClass('hidden');
                // text iptal edilir
                textInput.val('').prop('disabled',true);
                // fileinput aktif edilir
                LMCFileinput.enable(fileinput);
            } else {
                if (! photo.hasClass('hidden')) photo.addClass('hidden');
                // text alanı aktif edilir
                textInput.prop('disabled',false);
                // fileinput iptal edilir
                LMCFileinput.disable(fileinput);
            }
        }
    });
})();