;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(modelJs,'model');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js', 'inputmask');
    });
    $script.ready(['config','model','inputmask'], function()
    {
        EMOModel.init();

        // phone
        LMCApp.initInputMask({
            src: '.inputmask-phone',
            type: 'phone',
            inputmask: {
                placeholder: '_'
            }
        });
    });
})();