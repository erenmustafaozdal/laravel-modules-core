!function(){"use strict";$script.ready("validation",function(){$script(validationMethodsJs)}),$script.ready("app_editor",function(){$script(indexJs,"index"),$script("/vendor/laravel-modules-core/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js","inputmask")}),$script.ready("bootstrap",function(){$script("/vendor/laravel-modules-core/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js","touchspin")}),$script.ready(["config","index","touchspin","inputmask","app_fileinput","app_jcrop"],function(){Index.init({DataTable:{datatableIsResponsive:datatableIsResponsive,groupActionSupport:groupActionSupport,rowDetailSupport:rowDetailSupport,datatableFilterSupport:datatableFilterSupport}}),LMCApp.initTouchSpin({src:"#amount_from",touchspin:{max:99999,decimals:2,step:10,postfix:"₺"}}),LMCApp.initTouchSpin({src:"#amount_to",touchspin:{max:99999,decimals:2,step:10,postfix:"₺"}}),$('input[name="amount_from"],input[name="amount_to"]').on("change",function(t){var e=$(this).val();$(this).val(e.replace(".",","))}),LMCApp.initInputMask({src:"#amount",type:"amount",inputmask:{placeholder:"_",numericInput:!0,rightAlignNumerics:!1,greedy:!1}})}),$script.ready(["config","app_select2"],function(){Select2.init({src:".select2category",select2:{templateResult:function(t){if(t.loading)return t.text;var e=""==t.parents?"":'<small class="text-muted">'+t.parents+"</small> ";return e+t.text},escapeMarkup:function(t){return t},templateSelection:function(t){return t.text},ajax:{url:categoriesURL,processResults:function(t){return{results:$.map(t,function(t){return{text:t.name_uc_first,id:t.id,parents:t.parent_name_uc_first}})}}}}}),Select2.init({src:".select2brand",variableNames:{text:"name"},select2:{ajax:{url:brandsURL}}})})}();