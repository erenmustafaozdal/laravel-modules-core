;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        //$script(operationJs,'operation');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-ui/jquery-ui.min.js', 'jquery_ui');
    });
    $script.ready(['jquery_ui','config','app_select2'/*'operation','app_fileinput','app_jcrop'*/], function()
    {
        //Operation.init();

        // select 2 init
        Select2.init({
            select2: {
                ajax: null
            }
        });

        // item type to items type
        var itemType = $('select.item-type'), itemsType = $('select.items-type');
        itemType.on('change',function(e)
        {
            var value, url, element = $(this), otherElement, option;
            value = element.val();
            url = window[value + 'CategoriesURL'];

            $.ajax({
                url: url,
                success: function (data)
                {
                    otherElement = element.closest('.form-body').find('.items-type');
                    otherElement.empty().append('<option></option>').append('<option value="all">Hepsi</option>');
                    $.each(data, function (i,val) {
                        option = '<option value="'+val.id+'">' + val.name_uc_first + '</option>';
                        otherElement.append(option);
                    });
                    otherElement.closest('.form-group').find('input[type="hidden"][name="category_id"]').val(0);
                }
            });
        });
        // items type to category id
        itemsType.on('change',function(e)
        {
            var value, element = $(this);
            value = element.val();
            if (value !== 'all') {
                element.closest('.form-group').find('input[type="hidden"][name="category_id"]').val(value);
            }
        });
        
        // portlet sortable disable and enable
        $('input.make-switch').on('switchChange.bootstrapSwitch', function(event, state)
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
            $('#save_sortable').removeClass('disabled');
            $('#disable_sortable').removeClass('hidden');
            $(this).addClass('hidden');
        });
        $('#disable_sortable').on('click',function(e)
        {
            $("#sortable_portlets").sortable( "disable" );
            $('#save_sortable').addClass('disabled');
            $('#enable_sortable').removeClass('hidden');
            $(this).addClass('hidden');
        });

        // sortable text is focus
        $('.section-title').on('click',function()
        {
            $(this).focus();
        });

        // sortable
        $("#sortable_portlets").sortable({
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