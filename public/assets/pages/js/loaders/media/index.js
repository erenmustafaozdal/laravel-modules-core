!function(){"use strict";$script.ready("validation",function(){$script(validationMethodsJs)}),$script.ready("app_editor",function(){$script(indexJs,"index")}),$script.ready(["config","index","app_fileinput","app_jcrop"],function(){Index.init({DataTable:{datatableIsResponsive:datatableIsResponsive,groupActionSupport:groupActionSupport,rowDetailSupport:rowDetailSupport,datatableFilterSupport:datatableFilterSupport}}),$script(videoPhotoJs)}),$script.ready(["config","app_select2"],function(){Select2.init({select2:{templateResult:function(t){if(t.loading)return t.text;var e=""==t.parents?"":'<small class="text-muted">'+t.parents+"</small> ",a=e+t.text;if("video"!==t.type){var r="classical"==t.gallery_type?"Klasik Albüm":"modern"==t.gallery_type?"Modern Albüm":"Kategorili Albüm";a+=' <small class="text-muted">('+r+")</small>"}return a},escapeMarkup:function(t){return t},templateSelection:function(t){return t.text},ajax:{url:modelsURL,processResults:function(t){return{results:$.map(t,function(t){return{text:t.name_uc_first,id:t.id,parents:t.parent_name_uc_first,type:t.type,gallery_type:t.gallery_type}})}}}}})})}();