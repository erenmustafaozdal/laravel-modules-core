;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(homeJs,'home');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-repeater/jquery.repeater.min.js', 'repeater');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-ui/jquery-ui.min.js', 'jquery_ui');
    });
    $script.ready('jquery_ui', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js', 'touch_punch');
    });
    $script.ready(['jquery_ui','touch_punch','config','app_select2','repeater','home','app_fileinput','app_jcrop'], function()
    {
        Home.init();

        // select 2 init
        Select2.init({
            select2: {
                ajax: null
            }
        });

        // repeater
        var changeRepeaterButton = function (element, length) {
            // min 2
            if (length <= 2) {
                element.find('.mt-repeater-delete').addClass('disabled');
            } else {
                element.find('.mt-repeater-delete').removeClass('disabled');
            }

            // max 12
            if (length < 12) {
                element.find('.mt-repeater-add').removeClass('disabled');
            } else {
                element.find('.mt-repeater-add').addClass('disabled');
            }
        };
        $('.mt-repeater').each(function(){
            $(this).repeater({
                show: function () {
                    $(this).slideDown();
                    LMCApp.initTooltips();
                    // file input
                    var fileEl = $(this).find('.photo_home_image_banner');
                    fileEl.closest('.form-group').empty().append(fileEl);
                    LMCFileinput.init(theHome.getPhotoHomeImageBannerOptions());
                    // tab change
                    var elLen = $(this).closest('.mt-repeater').find('.mt-repeater-item').length;
                    $(this).find('a.fileinput-tabs').each(function()
                    {
                        var aHref = $(this).prop('href');
                        var splitHref = aHref.split('---');
                        $(this).prop('href', splitHref[0] + '---' + (elLen-1));
                    });
                    $(this).find('div.tab-pane').each(function()
                    {
                        var divId = $(this).prop('id');
                        var splitId = divId.split('---');
                        $(this).prop('id', splitId[0] + '---' + (elLen-1));
                    });
                    // elfinder
                    var elText = $(this).find('input.elfinder[type="text"]');
                    var textId = elText.prop('id');
                    var splitId = textId.split('---');
                    var newId = splitId[0] + '---' + (elLen-1);
                    elText.prop('id', newId).next().find('a.popup_selector').attr('data-inputid', newId);
                    changeRepeaterButton($(this).closest('.mt-repeater'),elLen);
                },

                hide: function (deleteElement) {
                    var element = $(this).closest('.mt-repeater');
                    var elLen = element.find('.mt-repeater-item').length;
                    bootbox.confirm(LMCApp.lang.admin.ops.destroy_confirm, function(result)
                    {
                        if (result) {
                            changeRepeaterButton(element,elLen - 1);
                            $(this).slideUp(deleteElement);

                        }
                    });
                },

                ready: function (setIndexes) {

                }

            });
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
                }
            });
        });
        // item type hide visible
        itemType.on('change',function(e)
        {
            var value, element = $(this);
            value = element.val();
            if (value === 'Project') {
                element.closest('.form-body').find('input.icheck').iCheck('disable').closest('.form-group').addClass('hidden');
                element.closest('.form-body').find('input[type="hidden"][name="carouselOption[options][item_visible]"]').prop('disable',true);
            } else {
                element.closest('.form-body').find('input.icheck').iCheck('enable').closest('.form-group').removeClass('hidden');
                element.closest('.form-body').find('input[type="hidden"][name="carouselOption[options][item_visible]"]').prop('disable',false);
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

        // icheck item visible control
        $('.icheck').on('ifToggled', function(event){
            var count = $(this).closest('.icheck-inline').find('input.icheck[type="checkbox"]:checked').length;
            if (count === 3) {
                LMCApp.getNoty({
                    message: LMCApp.lang.admin.validation.max.array.message.replace(':attribute','Görünenler').replace(':max',3),
                    title: LMCApp.lang.admin.validation.max.array.title,
                    type: 'error'
                });
            }
        });
    });
})();