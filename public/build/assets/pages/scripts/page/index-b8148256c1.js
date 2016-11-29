var ModelIndex,Index={options:{},init:function(t){ModelIndex=this,this.options=$.extend(!0,this.getDefaultOptions(),t),this.options.DataTable.datatableFilterSupport&&LMCApp.initDatepicker(),DataTable.init(this.options.DataTable),Editor.init(this.options.Editor),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-publish",function(){var t=$(this).closest("tr"),a=theDataTable.getDataTable(),e=a.row(t);$.ajax({url:e.data().urls.publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_success.message,title:LMCApp.lang.admin.flash.publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_error.message,title:LMCApp.lang.admin.flash.publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,a.draw())})}),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-not-publish",function(){var t=$(this).closest("tr"),a=theDataTable.getDataTable(),e=a.row(t);$.ajax({url:e.data().urls.not_publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_success.message,title:LMCApp.lang.admin.flash.not_publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_error.message,title:LMCApp.lang.admin.flash.not_publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,a.draw())})})},getDefaultOptions:function(){return{DataTable:{src:".lmcDataTable",exportTitle:"Sayfalar",datatableIsResponsive:!0,groupActionSupport:!0,rowDetailSupport:!0,datatableFilterSupport:!0,exportColumnSize:5,exportOptionsFormat:{body:function(t,a,e){return LMCApp.stripTags(t)}},isRelationTable:!1,changeRelationTable:function(){theDataTable.tableOptions.exportColumnSize=4,theDataTable.tableOptions.dataTable.columns.splice(2,1)},onSuccess:function(t,a){},onError:function(t){},onDataLoad:function(t){},onDeleteError:function(t){},getDetailTableFormat:function(t){var a='<table class="table table-hover table-light"><tbody>';return theDataTable.tableOptions.isRelationTable||(a+='<tr><td style="width:150px; text-align:right;"> <strong>Kategori:</strong> </td><td class="text-left">'+(null==t.category.name?"":t.category.name)+"</td></tr>"),a+'<tr><td style="width:150px; text-align:right;"> <strong>Başlık:</strong> </td><td class="text-left">'+(null==t.title?"":t.title)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Oluşturma Tarihi:</strong> </td><td class="text-left">'+t.created_at.display+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Düzenleme Tarihi:</strong> </td><td class="text-left">'+t.updated_at.display+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>İçerik:</strong> </td><td class="text-left">'+(null==t.content?"":t.content)+"</td></tr></tbody></table>"},exportOptions:{columns:[]},dataTable:{columns:[{data:"id",name:"id",className:"text-center"},{data:"title",name:"title"},{data:"category",name:"category",render:function(t,a,e,s){return'<a href="'+categoryURL.replace("###id###",t.id)+'"> '+t.name+" </a>"}},{data:"status",name:"is_publish",className:"text-center",render:function(t,a,e,s){return t?'<span class="label label-success"> Yayında </span>':'<span class="label label-danger"> Yayında Değil </span>'}},{data:{_:"created_at.display",sort:"created_at.timestamp"},name:"created_at",className:"text-center"},{data:"action",name:"action",searchable:!1,orderable:!1,className:"text-center",render:function(t,a,e,s){var i={id:e.id,showUrl:e.urls.show,buttons:[{title:'<i class="fa fa-pencil"></i> '+LMCApp.lang.admin.ops.fast_edit,attributes:{href:"#editor-modal","data-toggle":"modal","data-action":"fast-edit","data-id":e.id}},{title:'<i class="fa fa-pencil"></i> '+LMCApp.lang.admin.ops.edit,attributes:{href:e.urls.edit_page}},{title:'<i class="fa fa-trash"></i> '+LMCApp.lang.admin.ops.destroy,attributes:{href:"javascript:;","class":"fast-destroy"}},"divider"]};return i.buttons.push({title:e.status?'<i class="fa fa-times"></i> '+LMCApp.lang.admin.ops.not_publish:'<i class="fa fa-check"></i> '+LMCApp.lang.admin.ops.publish,attributes:{href:"javascript:;","class":e.status?"fast-not-publish":"fast-publish"}}),theDataTable.getActionMenu(i)}}],ajax:{url:ajaxURL}}},Editor:{modalShowCallback:function(t){},actionButtonCallback:function(t){var a="fast-add"===t.actionType?apiStoreURL:t.row.data().urls.edit;$script(formLoaderJs,"formLoader"),$script.ready(["formLoader","validation"],function(){$script(formJs,"form")}),$script.ready("form",function(){ModelForm.init({isAjax:!0,submitAjax:function(e){var s=theDataTable.tableOptions.isRelationTable?e.form.find('input[name="category_id"]').val():e.form.find('select[name="category_id"]').val(),i={category_id:s,title:e.form.find('input[name="title"]').val(),slug:e.form.find('input[name="slug"]').val(),description:e.form.find('textarea[name="description"]').val(),is_publish:e.form.find('input[name="is_publish"]').bootstrapSwitch("state")};if("fast-add"===t.actionType)var l="POST",n=LMCApp.lang.admin.flash.store_success.message,r=LMCApp.lang.admin.flash.store_success.title,o=LMCApp.lang.admin.flash.store_error.message,p=LMCApp.lang.admin.flash.store_error.title;else var l="PATCH",n=LMCApp.lang.admin.flash.update_success.message,r=LMCApp.lang.admin.flash.update_success.title,o=LMCApp.lang.admin.flash.update_error.message,p=LMCApp.lang.admin.flash.update_error.title;$.ajax({url:a,data:i,type:l,success:function(a){return"success"===a.result?(LMCApp.getNoty({message:n,title:r,type:"success"}),void t.modal.modal("hide")):void LMCApp.getNoty({message:o,title:p,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,DataTable.dataTable.ajax.reload())})}}),$(t.editorOptions.formSrc).submit()})}}}}};