var ModelIndex,Index={options:{},init:function(t){ModelIndex=this,this.options=$.extend(!0,this.getDefaultOptions(),t),this.options.DataTable.datatableFilterSupport&&LMCApp.initDatepicker(),DataTable.init(this.options.DataTable),Editor.init(this.options.Editor),LMCFileinput.init(this.options.Fileinput),LMCFileinput.init(this.options.mainPhotoFileinput),LMCFileinput.init(this.options.firstMiniFileinput),LMCFileinput.init(this.options.secondMiniFileinput),LMCFileinput.init(this.options.thirdMiniFileinput),$(".color-picker").minicolors({control:"hue",letterCase:"lowercase",position:"bottom right",theme:"bootstrap"}),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-publish",function(){var t=$(this).closest("tr"),e=theDataTable.getDataTable(),i=e.row(t);$.ajax({url:i.data().urls.publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_success.message,title:LMCApp.lang.admin.flash.publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_error.message,title:LMCApp.lang.admin.flash.publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,e.draw())})}),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-not-publish",function(){var t=$(this).closest("tr"),e=theDataTable.getDataTable(),i=e.row(t);$.ajax({url:i.data().urls.not_publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_success.message,title:LMCApp.lang.admin.flash.not_publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_error.message,title:LMCApp.lang.admin.flash.not_publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,e.draw())})})},getDefaultOptions:function(){return{DataTable:{src:".lmcDataTable",exportTitle:"Slaytlar",datatableIsResponsive:!0,groupActionSupport:!0,rowDetailSupport:!1,datatableFilterSupport:!0,exportColumnSize:3,exportOrientation:"landscape",exportOptionsFormat:{body:function(t,e,i){return LMCApp.stripTags(t)}},isRelationTable:!1,changeRelationTable:function(){},onSuccess:function(t,e){},onError:function(t){},onDataLoad:function(t){},onDeleteError:function(t){},getDetailTableFormat:function(t){},exportOptions:{columns:[]},dataTable:{columns:[{data:"id",name:"id",className:"text-center"},{data:"photo",name:"photo",searchable:!1,orderable:!1,className:"text-center",render:function(t,e,i,a){return null!=t?'<img src="'+t+'" height="150">':""}},{data:"status",name:"is_publish",className:"text-center",render:function(t,e,i,a){return t?'<span class="label label-success"> Yayında </span>':'<span class="label label-danger"> Yayında Değil </span>'}},{data:{_:"created_at.display",sort:"created_at.timestamp"},name:"created_at",className:"text-center"},{data:"action",name:"action",searchable:!1,orderable:!1,className:"text-center",render:function(t,e,i,a){var n={id:i.id,showUrl:null,buttons:[{title:'<i class="fa fa-trash"></i> '+LMCApp.lang.admin.ops.destroy,attributes:{href:"javascript:;","class":"fast-destroy"}},"divider"]};return n.buttons.push({title:i.status?'<i class="fa fa-times"></i> '+LMCApp.lang.admin.ops.not_publish:'<i class="fa fa-check"></i> '+LMCApp.lang.admin.ops.publish,attributes:{href:"javascript:;","class":i.status?"fast-not-publish":"fast-publish"}}),theDataTable.getActionMenu(n)}}],ajax:{url:ajaxURL}}},Editor:{modalShowCallback:function(t){},actionButtonCallback:function(t){$script(formLoaderJs,"formLoader"),$script.ready(["formLoader","validation"],function(){$script(formJs,"form")}),$script.ready("form",function(){ModelForm.init({isAjax:!0,submitAjax:function(e){var i=$("#photo"),a=LMCFileinputs["#photo"].isEnable;return"fast-add"===t.actionType&&a?void i.fileinput("upload"):void $.ajax({url:apiStoreURL,data:{photo:e.form.find('input.elfinder[name="photo"]').val(),is_publish:e.form.find('input[name="is_publish"]').bootstrapSwitch("state")},type:"POST",success:function(e){return"success"===e.result?(LMCApp.getNoty({message:LMCApp.lang.admin.flash.store_success.message,title:LMCApp.lang.admin.flash.store_success.title,type:"success"}),void t.modal.modal("hide")):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.store_error.message,title:LMCApp.lang.admin.flash.update_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,DataTable.dataTable.ajax.reload())})}}),$(t.editorOptions.formSrc).submit()})}},Fileinput:{src:"#photo",fileinput:{uploadUrl:apiStoreURL,allowedFileExtensions:validExtension.split(","),allowedFileTypes:null,previewFileType:"any",showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},uploadExtraData:function(t,e){var i=$(".form");return{is_publish:i.find('input[name="is_publish"]').bootstrapSwitch("state"),x:$("input[name='x[]']").map(function(){return $(this).val()}).get(),y:$("input[name='y[]']").map(function(){return $(this).val()}).get(),width:$("input[name='width[]']").map(function(){return $(this).val()}).get(),height:$("input[name='height[]']").map(function(){return $(this).val()}).get()}},ajaxSettings:{success:function(t){var e,i,a,n;return"fast-add"===Editor.actionType?(e=LMCApp.lang.admin.flash.store_success.message,i=LMCApp.lang.admin.flash.store_success.title,a=LMCApp.lang.admin.flash.store_error.message,n=LMCApp.lang.admin.flash.store_error.title):(e=LMCApp.lang.admin.flash.update_success.message,i=LMCApp.lang.admin.flash.update_success.title,a=LMCApp.lang.admin.flash.update_error.message,n=LMCApp.lang.admin.flash.update_error.title),"success"===t.result?(LMCApp.getNoty({message:e,title:i,type:"success"}),Editor.modal.modal("hide"),LMCApp.hasTransaction=!1,void DataTable.dataTable.ajax.reload()):void LMCApp.getNoty({message:a,title:n,type:"error"})}}}},mainPhotoFileinput:{src:"#main-photo",formSrc:"form.form-horizontal",aspectRatio:mainAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="photo[x]" value="0">\n   <input type="hidden" class="crop-y" name="photo[y]" value="0">\n   <input type="hidden" class="crop-width" name="photo[width]" value="0">\n   <input type="hidden" class="crop-height" name="photo[height]" value="0">\n</div>\n'}}},firstMiniFileinput:{src:"#first-mini-photo",formSrc:"form.form-horizontal",aspectRatio:firstAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="first_mini_photo[x]" value="0">\n   <input type="hidden" class="crop-y" name="first_mini_photo[y]" value="0">\n   <input type="hidden" class="crop-width" name="first_mini_photo[width]" value="0">\n   <input type="hidden" class="crop-height" name="first_mini_photo[height]" value="0">\n</div>\n'}}},secondMiniFileinput:{src:"#second-mini-photo",formSrc:"form.form-horizontal",aspectRatio:secondAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="second_mini_photo[x]" value="0">\n   <input type="hidden" class="crop-y" name="second_mini_photo[y]" value="0">\n   <input type="hidden" class="crop-width" name="second_mini_photo[width]" value="0">\n   <input type="hidden" class="crop-height" name="second_mini_photo[height]" value="0">\n</div>\n'}}},thirdMiniFileinput:{src:"#third-mini-photo",formSrc:"form.form-horizontal",aspectRatio:thirdAspectRatio,fileinput:{maxFileSize:maxSize,showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},previewTemplates:{image:'<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n   <div class="kv-file-content">       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n   </div>\n   {footer}\n   <input type="hidden" class="crop-x" name="third_mini_photo[x]" value="0">\n   <input type="hidden" class="crop-y" name="third_mini_photo[y]" value="0">\n   <input type="hidden" class="crop-width" name="third_mini_photo[width]" value="0">\n   <input type="hidden" class="crop-height" name="third_mini_photo[height]" value="0">\n</div>\n'}}}}}};