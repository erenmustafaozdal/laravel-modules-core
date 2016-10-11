;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
    });
    $script.ready(['config','operation'], function()
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
                console.log(lists.length);
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
    });
})();