!function(){"use strict";$script.ready("validation",function(){$script(validationMethodsJs)}),$script.ready("jquery",function(){$script(operationJs,"operation"),$script("/vendor/laravel-modules-core/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js","inputmask")}),$script.ready(["config","operation","inputmask"],function(){Operation.init(),LMCApp.initInputMask({src:".inputmask-land-phone",type:"phone",inputmask:{placeholder:"_"}}),LMCApp.initInputMask({src:".inputmask-mobile-phone",type:"phone",inputmask:{placeholder:"_"}})}),$script.ready(["config","app_select2"],function(){Select2.init({select2:{templateResult:function(t){if(t.loading)return t.text;var e=""==t.parents?"":'<small class="text-muted">'+t.parents+"</small> ";return e+t.text},escapeMarkup:function(t){return t},templateSelection:function(t){return t.text},ajax:{url:modelsURL,processResults:function(t){return{results:$.map(t,function(t){return{text:t.name_uc_first,id:t.id,parents:t.parent_name_uc_first}})}}}}})})}();