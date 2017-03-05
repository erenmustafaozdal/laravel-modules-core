;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(showJs,'show');
    });
    $script.ready(['show', 'config'], function()
    {
        Show.init();
    });
    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
            variableNames: {
                text: 'name'
            },
            select2: {
                ajax: {
                    url: modelsURL
                }
            }
        });
    });

    if (tinymcePermission) {
        $script.ready(['config', 'app_tinymce'], function () {
            Tinymce.init({
                route: tinymceURL,
                saveRoute: tinymceSaveURL,
                tinymce: {
                    inline: true,
                    content_css: '',
                    toolbar: [
                        'saveToDb undo redo | fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify',
                        'bullist numlist outdent indent | link image | styleselect emoticons hr'
                    ]
                }
            });
        });
    }
})();