;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-ui/jquery-ui.min.js', 'jquery_ui');
    });
    $script.ready(['jquery_ui','config','app_select2'], function()
    {
        // select 2 init
        Select2.init({
            select2: {
                ajax: null,
                minimumResultsForSearch: -1
            }
        });

        // portlet sortable disable and enable
        $('input.switch-is-active').on('switchChange.bootstrapSwitch', function(event, state)
        {
            var element = $(this);
            if (state) {
                element.closest('div.portlet').removeClass('bg-inverse').removeClass('portlet-sortable-disabled');
            } else {
                element.closest('div.portlet').addClass('bg-inverse').addClass('portlet-sortable-disabled');
            }
        });

        // accordion off and on
        $('a.accordion-toggle').on('click',function(e)
        {
            if ($(this).closest('div.portlet').hasClass('portlet-sortable-disabled')) {
                return false;
            }
        });

        // sortable disable and enable
        $('#enable_sortable').on('click',function(e)
        {
            $("#sortable_portlets").sortable( "enable" );
            $('#save_sortable').removeClass('disabled').prop('disabled',false);
            $('#disable_sortable').removeClass('hidden');
            $(this).addClass('hidden');
        });
        $('#disable_sortable').on('click',function(e)
        {
            $("#sortable_portlets").sortable( "disable" );
            $('#save_sortable').addClass('disabled').prop('disabled',true);
            $('#enable_sortable').removeClass('hidden');
            $(this).addClass('hidden');
        });

        // sortable text is focus
        $('.section-title').on('click',function()
        {
            $(this).focus();
        });

        // save sortable
        var sortableElement = $('#sortable_portlets');
        $('#save_sortable').on('click', function(e)
        {
            var datas = {}, isActiveEl = $('input.switch-is-active'),
                titleEl = $('input[type="text"][name="section_title"]'),
                sortable = sortableElement.sortable('toArray');

            $.each(sortable, function(index, value)
            {
                datas[value] = {
                    title: titleEl.eq(index).val(),
                    is_active: isActiveEl.eq(index).bootstrapSwitch('state'),
                    order: index + 1
                };
            });

            $.ajax({
                data: datas,
                url: saveSortableURL,
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

        // sortable
        sortableElement.sortable({
            axis: 'y',
            disabled: true,
            connectWith: '.portlet',
            items: '.portlet',
            opacity: 0.5,
            handle : '.portlet-title',
            coneHelperSize: true,
            placeholder: 'portlet-sortable-placeholder',
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            helper: 'clone',
            cancel: '.portlet-sortable-empty, .portlet-sortable-disabled, .portlet-fullscreen', // cancel dragging if portlet is in fullscreen mode
            revert: 250, // animation in milliseconds
            update: function(b, c) {
                if (c.item.prev().hasClass('portlet-sortable-empty')) {
                    c.item.prev().before(c.item);
                }
            }
        }).disableSelection();
    });
})();