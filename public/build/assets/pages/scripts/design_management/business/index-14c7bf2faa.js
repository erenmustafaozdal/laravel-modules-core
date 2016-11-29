var ModelIndex,Index={options:{},init:function(t){ModelIndex=this,this.options=$.extend(!0,this.getDefaultOptions(),t),this.options.DataTable.datatableFilterSupport&&LMCApp.initDatepicker(),DataTable.init(this.options.DataTable),Editor.init(this.options.Editor),LMCFileinput.init(this.options.Fileinput),$(".color-picker").minicolors({control:"hue",letterCase:"lowercase",position:"bottom right",theme:"bootstrap"}),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-publish",function(){var t=$(this).closest("tr"),e=theDataTable.getDataTable(),a=e.row(t);$.ajax({url:a.data().urls.publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_success.message,title:LMCApp.lang.admin.flash.publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_error.message,title:LMCApp.lang.admin.flash.publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,e.draw())})}),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-not-publish",function(){var t=$(this).closest("tr"),e=theDataTable.getDataTable(),a=e.row(t);$.ajax({url:a.data().urls.not_publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_success.message,title:LMCApp.lang.admin.flash.not_publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_error.message,title:LMCApp.lang.admin.flash.not_publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,e.draw())})})},getDefaultOptions:function(){return{DataTable:{src:".lmcDataTable",exportTitle:"Slaytlar",datatableIsResponsive:!0,groupActionSupport:!0,rowDetailSupport:!0,datatableFilterSupport:!0,exportColumnSize:5,exportOrientation:"landscape",exportOptionsFormat:{body:function(t,e,a){return LMCApp.stripTags(t)}},isRelationTable:!1,changeRelationTable:function(){},onSuccess:function(t,e){},onError:function(t){},onDataLoad:function(t){},onDeleteError:function(t){},getDetailTableFormat:function(t){return'<table class="table table-hover table-light"><tbody><tr><td style="width:150px; text-align:right;"> <strong>Fotoğraf/Renkler:</strong> </td><td class="text-left">'+(null==t.photo?'<div class="color-demo"><div class="color-view bold uppercase" style="color: #fff; background-color: '+t.first_color+'"> '+t.first_color+' </div></div><div class="color-demo"><div class="color-view bold uppercase" style="color: #fff; background-color: '+t.second_color+'"> '+t.second_color+" </div></div>":'<img src="'+t.photo+'" height="200">')+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Mini Fotoğraf:</strong> </td><td class="text-left">'+(null==t.mini_photo?"":'<img src="'+t.mini_photo+'" height="200">')+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Başlık:</strong> </td><td class="text-left">'+(null==t.title?"":t.title)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Başlık Rengi:</strong> </td><td class="text-left">'+(null==t.title_color?"":'<div class="color-demo"><div class="color-view bold uppercase" style="color: #fff; background-color: '+t.title_color+'"> '+t.title_color+" </div></div>")+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Başlık Puntosu:</strong> </td><td class="text-left">'+(null==t.title_point?"":t.title_point+" px")+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Açıklama:</strong> </td><td class="text-left">'+(null==t.description?"":t.description)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Açıklama Rengi:</strong> </td><td class="text-left">'+(null==t.description_color?"":'<div class="color-demo"><div class="color-view bold uppercase" style="color: #fff; background-color: '+t.description_color+'"> '+t.description_color+" </div></div>")+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Açıklama Puntosu:</strong> </td><td class="text-left">'+(null==t.description_point?"":t.description_point+" px")+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Bağlantı Adresi:</strong> </td><td class="text-left">'+(null==t.link?"":t.link)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Buton Metni:</strong> </td><td class="text-left">'+(null==t.button_text?"":t.button_text)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Oluşturma Tarihi:</strong> </td><td class="text-left">'+t.created_at.display+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Düzenleme Tarihi:</strong> </td><td class="text-left">'+t.updated_at.display+"</td></tr>"},exportOptions:{columns:[]},dataTable:{columns:[{data:"id",name:"id",className:"text-center"},{data:"photo",name:"photo",searchable:!1,orderable:!1,className:"text-center",render:function(t,e,a,s){return null!=t?'<img src="'+t+'" height="50">':""}},{data:"mini_photo",name:"mini_photo",searchable:!1,orderable:!1,className:"text-center",render:function(t,e,a,s){return null!=t?'<img src="'+t+'" height="50">':""}},{data:"title",name:"title"},{data:"status",name:"is_publish",className:"text-center",render:function(t,e,a,s){return t?'<span class="label label-success"> Yayında </span>':'<span class="label label-danger"> Yayında Değil </span>'}},{data:{_:"created_at.display",sort:"created_at.timestamp"},name:"created_at",className:"text-center"},{data:"action",name:"action",searchable:!1,orderable:!1,className:"text-center",render:function(t,e,a,s){var l={id:a.id,showUrl:null,buttons:[{title:'<i class="fa fa-pencil"></i> '+LMCApp.lang.admin.ops.edit,attributes:{href:a.urls.edit_page}},{title:'<i class="fa fa-trash"></i> '+LMCApp.lang.admin.ops.destroy,attributes:{href:"javascript:;","class":"fast-destroy"}},"divider"]};return l.buttons.push({title:a.status?'<i class="fa fa-times"></i> '+LMCApp.lang.admin.ops.not_publish:'<i class="fa fa-check"></i> '+LMCApp.lang.admin.ops.publish,attributes:{href:"javascript:;","class":a.status?"fast-not-publish":"fast-publish"}}),theDataTable.getActionMenu(l)}}],ajax:{url:ajaxURL}}},Editor:{modalShowCallback:function(t){},actionButtonCallback:function(t){$script(formLoaderJs,"formLoader"),$script.ready(["formLoader","validation"],function(){$script(formJs,"form")}),$script.ready("form",function(){ModelForm.init({isAjax:!0,submitAjax:function(e){var a=$("#photo"),s=LMCFileinputs["#photo"].isEnable;return"fast-add"===t.actionType&&s?void a.fileinput("upload"):void $.ajax({url:apiStoreURL,data:{photo:{photo:e.form.find('input.elfinder[name="photo[photo]"]').val()},is_publish:e.form.find('input[name="is_publish"]').bootstrapSwitch("state")},type:"POST",success:function(e){return"success"===e.result?(LMCApp.getNoty({message:LMCApp.lang.admin.flash.store_success.message,title:LMCApp.lang.admin.flash.store_success.title,type:"success"}),void t.modal.modal("hide")):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.store_error.message,title:LMCApp.lang.admin.flash.update_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,DataTable.dataTable.ajax.reload())})}}),$(t.editorOptions.formSrc).submit()})}},Fileinput:{src:"#photo",fileinput:{uploadUrl:apiStoreURL,allowedFileExtensions:validExtension.split(","),allowedFileTypes:null,previewFileType:"any",showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},uploadExtraData:function(t,e){var a=$(".form");return{is_publish:a.find('input[name="is_publish"]').bootstrapSwitch("state")}},ajaxSettings:{success:function(t){var e,a,s,l;return"fast-add"===Editor.actionType?(e=LMCApp.lang.admin.flash.store_success.message,a=LMCApp.lang.admin.flash.store_success.title,s=LMCApp.lang.admin.flash.store_error.message,l=LMCApp.lang.admin.flash.store_error.title):(e=LMCApp.lang.admin.flash.update_success.message,a=LMCApp.lang.admin.flash.update_success.title,s=LMCApp.lang.admin.flash.update_error.message,l=LMCApp.lang.admin.flash.update_error.title),"success"===t.result?(LMCApp.getNoty({message:e,title:a,type:"success"}),Editor.modal.modal("hide"),LMCApp.hasTransaction=!1,void DataTable.dataTable.ajax.reload()):void LMCApp.getNoty({message:s,title:l,type:"error"})}}}}}}};