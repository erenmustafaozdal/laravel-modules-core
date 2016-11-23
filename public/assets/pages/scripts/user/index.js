var UserIndex,Index={options:{},init:function(t){UserIndex=this,this.options=$.extend(!0,this.getDefaultOptions(),t),this.options.DataTable.datatableFilterSupport&&LMCApp.initDatepicker(),DataTable.init(this.options.DataTable),Editor.init(this.options.Editor),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-activate",function(){var t=$(this).closest("tr"),a=theDataTable.getDataTable(),e=a.row(t);$.ajax({url:e.data().urls.activate,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.activate_success.message,title:LMCApp.lang.admin.flash.activate_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.activate_error.message,title:LMCApp.lang.admin.flash.activate_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,a.draw())})}),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-not-activate",function(){var t=$(this).closest("tr"),a=theDataTable.getDataTable(),e=a.row(t);$.ajax({url:e.data().urls.not_activate,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_activate_success.message,title:LMCApp.lang.admin.flash.not_activate_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_activate_error.message,title:LMCApp.lang.admin.flash.not_activate_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,a.draw())})})},getDefaultOptions:function(){return{DataTable:{src:".lmcDataTable",exportTitle:"Yöneticiler",datatableIsResponsive:!0,groupActionSupport:!0,rowDetailSupport:!0,datatableFilterSupport:!0,exportColumnSize:5,exportOptionsFormat:{body:function(t,a,e){return LMCApp.stripTags(t)}},changeExportColumn:function(){theDataTable.options.exportOptions.columns.splice(1,1)},isRelationTable:!1,changeRelationTable:function(){},onSuccess:function(t,a){},onError:function(t){},onDataLoad:function(t){},onDeleteError:function(t){},getDetailTableFormat:function(t){return'<table class="table table-hover table-light"><tbody><tr><td style="width:150px; text-align:right;"> <strong>E-posta:</strong> </td><td class="text-left">'+t.email+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Son Giriş:</strong> </td><td class="text-left">'+t.last_login.display+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Düzenleme Tarihi:</strong> </td><td class="text-left">'+t.updated_at.display+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Roller:</strong> </td><td class="text-left">'+t.roles+"</td></tr></tbody></table>"},exportOptions:{columns:[]},dataTable:{columns:[{data:"id",name:"id",className:"text-center"},{data:"photo",name:"photo",searchable:!1,orderable:!1,className:"text-center",render:function(t,a,e,s){return'<img src="'+t+'" width="35" class="img-circle">'}},{data:"fullname",name:"first_name"},{data:"status",name:"is_active",className:"text-center",render:function(t,a,e,s){return t?'<span class="label label-success"> Aktif </span>':'<span class="label label-danger"> Aktif Değil </span>'}},{data:{_:"created_at.display",sort:"created_at.timestamp"},name:"created_at",className:"text-center"},{data:"action",name:"action",searchable:!1,orderable:!1,className:"text-center",render:function(t,a,e,s){var i={id:e.id,showUrl:e.urls.show,buttons:[{title:'<i class="fa fa-pencil"></i> '+LMCApp.lang.admin.ops.fast_edit,attributes:{href:"#editor-modal","data-toggle":"modal","data-action":"fast-edit","data-id":e.id}},{title:'<i class="fa fa-pencil"></i> '+LMCApp.lang.admin.ops.edit,attributes:{href:e.urls.edit_page}},{title:'<i class="fa fa-trash"></i> '+LMCApp.lang.admin.ops.destroy,attributes:{href:"javascript:;","class":"fast-destroy"}},"divider"]};return i.buttons.push({title:e.status?'<i class="fa fa-times"></i> '+LMCApp.lang.admin.ops.not_activate:'<i class="fa fa-check"></i> '+LMCApp.lang.admin.ops.activate,attributes:{href:"javascript:;","class":e.status?"fast-not-activate":"fast-activate"}}),theDataTable.getActionMenu(i)}}],ajax:{url:ajaxURL}}},Editor:{modalShowCallback:function(t){"fast-edit"===t.actionType?$(t.editorOptions.formSrc).find('input[name="email"]').prop("disabled",!0):$(t.editorOptions.formSrc).find('input[name="email"]').prop("disabled",!1)},actionButtonCallback:function(t){var a="fast-add"===t.actionType?apiStoreURL:t.row.data().urls.edit;$script(formLoaderJs,"formLoader"),$script.ready(["formLoader","validation"],function(){$script(formJs,"form")}),$script.ready("form",function(){UserForm.init({isAjax:!0,submitAjax:function(e){var s={first_name:e.form.find('input[name="first_name"]').val(),last_name:e.form.find('input[name="last_name"]').val(),email:e.form.find('input[name="email"]').val(),password:e.form.find('input[name="password"]').val(),password_confirmation:e.form.find('input[name="password_confirmation"]').val(),is_active:e.form.find('input[name="is_active"]').bootstrapSwitch("state")};if("fast-add"===t.actionType)var i="POST",n=LMCApp.lang.admin.flash.store_success.message,r=LMCApp.lang.admin.flash.store_success.title,o=LMCApp.lang.admin.flash.store_error.message,l=LMCApp.lang.admin.flash.store_error.title;else var i="PATCH",n=LMCApp.lang.admin.flash.update_success.message,r=LMCApp.lang.admin.flash.update_success.title,o=LMCApp.lang.admin.flash.update_error.message,l=LMCApp.lang.admin.flash.update_error.title;$.ajax({url:a,data:s,type:i,success:function(a){return"success"===a.result?(LMCApp.getNoty({message:n,title:r,type:"success"}),void t.modal.modal("hide")):void LMCApp.getNoty({message:o,title:l,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,DataTable.dataTable.ajax.reload())})}}),"fast-add"===t.actionType?(Validation.addElementRule("password",{required:!0}),Validation.addElementRule("password_confirmation",{required:!0})):(Validation.removeElementRule("password","required"),Validation.removeElementRule("password_confirmation","required")),$(t.editorOptions.formSrc).submit()})}}}}};