var ModelOperation,Operation={options:{formSrc:"form.form"},form:null,init:function(){if(ModelOperation=this,this.form=$(this.options.formSrc),Validation.init({src:this.options.formSrc,isAjax:!1,validate:{rules:{category_id:{required:!0},name:{required:!0}},messages:messagesOfRules}}),LMCFileinput.init(this.getPhotoFileinputOptions()),$("a.remove-element").on("click",function(){var e=$(this);LMCApp.removeElement({element:e,removeElement:{src:".element-wrapper"},ajax:{url:removePhotoURL.replace("###id###",e.data("parent-id")),data:{id:e.data("element-id")}}})}),$("a.set-main-photo").on("click",function(){var e=$(this);$.ajax({url:setMainPhotoURL.replace("###id###",e.data("parent-id")),data:{id:e.data("element-id")},success:function(i){if("success"!==i.result)return void LMCApp.getNoty({message:LMCApp.lang.admin.flash.update_error.message,title:LMCApp.lang.admin.flash.update_error.title,type:"error"});LMCApp.getNoty({message:LMCApp.lang.admin.flash.update_success.message,title:LMCApp.lang.admin.flash.update_success.title,type:"success"});var t=e.closest("div.row").find(".ribbon"),a=t.next().find("a.remove-element"),o=a.data("element-id"),n=a.data("parent-id");t.prependTo(e.closest(".mt-element-overlay")),a.closest("ul.mt-info").append("<li></li>"),e.data("element-id",o).attr("data-element-id",o).data("parent-id",n).attr("data-parent-id",n).appendTo(a.closest("ul.mt-info").find("li").last())}})}),$(".showcase-checkbox:checkbox").on("click",function(){$(this).closest(".row").find('select,input[type="text"]').prop("disabled",!this.checked)}),$(".showcase-type").on("change",function(){var e=$(this).val();"clear"===e?$(this).closest(".row").find('input[type="text"]').prop("disabled",!1):$(this).closest(".row").find('input[type="text"]').val("").prop("disabled",!0)}),void 0!=theLMCFileinput.options.fileinput.initialPreview&&null!=theLMCFileinput.options.fileinput.initialPreview){var e,i=!1;$("#detail_accordion_toggle").on("click",function(){i||(clearTimeout(e),e=setTimeout(function(){$(".file-preview-image").each(function(e,i){var t=$(i).prop("id").replace("img-","");$(i).closest(".file-preview-frame").prop("id",t),theLMCJcrop.setupElement(t)})},250),i=!0)})}},getPhotoFileinputOptions:function(){return{src:"#photo",formSrc:"form.form",fileinput:{maxFileCount:maxFile,maxFileSize:maxSize,showUpload:!1,showCancel:!1,showRemove:!1,initialPreview:initialPreview,initialPreviewConfig:initialPreviewConfig,initialPreviewThumbTags:initialPreviewThumbTags,initialPreviewShowDelete:!1,initialPreviewFileType:"image",fileActionSettings:{showUpload:!1,showRemove:!1}}}}};