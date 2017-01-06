var ModelIndex,Index={options:{},init:function(t){ModelIndex=this,this.options=$.extend(!0,this.getDefaultOptions(),t),this.options.DataTable.datatableFilterSupport&&LMCApp.initDatepicker(),DataTable.init(this.options.DataTable),Editor.init(this.options.Editor),LMCFileinput.init(this.options.Fileinput),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-publish",function(){var t=$(this).closest("tr"),a=theDataTable.getDataTable(),e=a.row(t);$.ajax({url:e.data().urls.publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_success.message,title:LMCApp.lang.admin.flash.publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.publish_error.message,title:LMCApp.lang.admin.flash.publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,a.draw())})}),$(DataTable.tableOptions.src+" tbody").on("click","tr td ul.dropdown-menu a.fast-not-publish",function(){var t=$(this).closest("tr"),a=theDataTable.getDataTable(),e=a.row(t);$.ajax({url:e.data().urls.not_publish,success:function(t){return"success"===t.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_success.message,title:LMCApp.lang.admin.flash.not_publish_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.not_publish_error.message,title:LMCApp.lang.admin.flash.not_publish_error.title,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,a.draw())})}),$(DataTable.tableOptions.src+" tbody").on("click","a.remove-element",function(){var t=$(this);LMCApp.removeElement({element:t,removeElement:{src:".element-wrapper"},ajax:{url:removePhotoURL.replace("###id###",t.data("parent-id")),data:{id:t.data("element-id")}}})}),$(DataTable.tableOptions.src+" tbody").on("click","a.set-main-photo",function(){var t=$(this);$.ajax({url:setMainPhotoURL.replace("###id###",t.data("parent-id")),data:{id:t.data("element-id")},success:function(a){if("success"!==a.result)return void LMCApp.getNoty({message:LMCApp.lang.admin.flash.update_error.message,title:LMCApp.lang.admin.flash.update_error.title,type:"error"});LMCApp.getNoty({message:LMCApp.lang.admin.flash.update_success.message,title:LMCApp.lang.admin.flash.update_success.title,type:"success"});var e=t.closest("div.row").find(".ribbon"),i=e.next().find("a.remove-element"),s=i.data("element-id"),n=i.data("parent-id");e.prependTo(t.closest(".mt-element-overlay")),i.closest("ul.mt-info").append("<li></li>"),t.data("element-id",s).attr("data-element-id",s).data("parent-id",n).attr("data-parent-id",n).appendTo(i.closest("ul.mt-info").find("li").last())}})})},getDefaultOptions:function(){return{DataTable:{src:".lmcDataTable",exportTitle:"Ürünler",datatableIsResponsive:!0,groupActionSupport:!0,rowDetailSupport:!0,datatableFilterSupport:!0,exportColumnSize:9,exportOrientation:"landscape",exportOptionsFormat:{body:function(t,a,e){return LMCApp.stripTags(t)}},isRelationTable:!1,changeRelationTable:function(){},onSuccess:function(t,a){},onError:function(t){},onDataLoad:function(t){},onDeleteError:function(t){},getDetailTableFormat:function(t){detail='<table class="table table-hover table-light"><tbody><tr><td style="width:150px; text-align:right;"> <strong>Kategori:</strong> </td><td class="text-left">';var a=t.category.length,e=1;return $.each(t.category,function(t,i){detail+="<span",detail+=a>e?' class="text-muted"':' class="text-info"',detail+="> "+i.name+" </span>",a>e&&(detail+='<span class="text-muted">/</span>'),e++}),detail+='</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Marka:</strong> </td><td class="text-left">'+(null==t.brand?"":t.brand.name)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Ad:</strong> </td><td class="text-left">'+(null==t.name?"":t.name)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Fiyat:</strong> </td><td class="text-left">'+(null==t.amount?"":t.amount)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Kod:</strong> </td><td class="text-left">'+(null==t.code?"":t.code)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Kısa Açıklama:</strong> </td><td class="text-left">'+(null==t.short_description?"":t.short_description)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Açıklama:</strong> </td><td class="text-left">'+(null==t.description?"":t.description)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>SEO Başlık:</strong> </td><td class="text-left">'+(null==t.meta_title?"":t.meta_title)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>SEO Açıklama:</strong> </td><td class="text-left">'+(null==t.meta_description?"":t.meta_description)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>SEO Anahtar Kelimeler:</strong> </td><td class="text-left">'+(null==t.meta_keywords?"":t.meta_keywords)+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Vitrinler:</strong> </td><td class="text-left">',t.showcases.length>0&&(detail+='<ul class="list-unstyled">',$.each(t.showcases,function(t,a){detail+="<li>"+a.name+"</li>"}),detail+="</ul>"),detail+='</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Oluşturma Tarihi:</strong> </td><td class="text-left">'+t.created_at.display+'</td></tr><tr><td style="width:150px; text-align:right;"> <strong>Düzenleme Tarihi:</strong> </td><td class="text-left">'+t.updated_at.display+"</td></tr>",null!=t.photos&&(detail+='<tr><td style="width:150px; text-align:right;"> <strong>Fotoğraf:</strong> </td><td class="text-left"><div class="row">',$.each(t.photos,function(a,e){detail+='<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 margin-bottom-5 element-wrapper  mt-element-ribbon photo-ribbon"><div class="mt-element-overlay">',e.id==t.photo_id&&(detail+='<div class="ribbon ribbon-left ribbon-vertical-left ribbon-shadow ribbon-border-dash-vert ribbon-color-primary uppercase tooltips" data-container="body" data-original-title="Ana Fotoğraf"><div class="ribbon-sub ribbon-bookmark"></div><i class="fa fa-star"></i></div>'),detail+='<div class="mt-overlay-2 mt-overlay-2-icons"><img src="'+e.photo+'"><div class="mt-overlay"><ul class="mt-info"><li><a href="javascript:;" class="btn red btn-outline remove-element tooltips" data-element-id="'+e.id+'" data-parent-id="'+t.id+'" data-container="body" data-original-title="'+LMCApp.lang.admin.ops.destroy+'"> <i class="fa fa-trash"></i></a></li>',e.id!=t.photo_id&&(detail+='<li><a href="javascript:;" class="btn blue btn-outline set-main-photo tooltips" data-element-id="'+e.id+'" data-parent-id="'+t.id+'" data-container="body" data-original-title="'+LMCApp.lang.admin.ops.set_main_photo+'"> <i class="fa fa-share"></i></a></li>'),detail+="</ul></div></div></div></div>"}),detail+="</div></td></tr>"),detail+"</tbody></table>"},exportOptions:{columns:[]},dataTable:{columns:[{data:"id",name:"id",className:"text-center"},{data:"main_photo",name:"main_photo",searchable:!1,orderable:!1,className:"text-center",render:function(t,a,e,i){return null!=t?'<img src="'+t+'" width="100">':""}},{data:"name",name:"name"},{data:"code",name:"code",className:"text-center"},{data:"category",name:"category_id",render:function(t,a,e,i){var s="",n=t.length,l=1;return $.each(t,function(t,a){s+='<a href="'+categoryURL.replace("###id###",a.id)+'"',n>l&&(s+=' class="text-muted"'),s+=">"+a.name+"</a>",n>l&&(s+='<span class="text-muted">/</span>'),l++}),s}},{data:"brand",name:"brand_id",render:function(t,a,e,i){return null!=t?'<a href="'+brandURL.replace("###id###",t.id)+'"> '+t.name+" </a>":""}},{data:"amount",name:"amount",className:"text-center"},{data:"status",name:"is_publish",className:"text-center",render:function(t,a,e,i){return t?'<span class="label label-success"> Yayında </span>':'<span class="label label-danger"> Yayında Değil </span>'}},{data:{_:"created_at.display",sort:"created_at.timestamp"},name:"created_at",className:"text-center"},{data:"action",name:"action",searchable:!1,orderable:!1,className:"text-center",render:function(t,a,e,i){var s={id:e.id,showUrl:e.urls.show,buttons:[{title:'<i class="fa fa-pencil"></i> '+LMCApp.lang.admin.ops.fast_edit,attributes:{href:"#editor-modal","data-toggle":"modal","data-action":"fast-edit","data-id":e.id}},{title:'<i class="fa fa-pencil"></i> '+LMCApp.lang.admin.ops.edit,attributes:{href:e.urls.edit_page}},{title:'<i class="fa fa-clone"></i> '+LMCApp.lang.admin.ops.copy,attributes:{href:e.urls.copy_page}},{title:'<i class="fa fa-trash"></i> '+LMCApp.lang.admin.ops.destroy,attributes:{href:"javascript:;","class":"fast-destroy"}},"divider"]};return s.buttons.push({title:e.status?'<i class="fa fa-times"></i> '+LMCApp.lang.admin.ops.not_publish:'<i class="fa fa-check"></i> '+LMCApp.lang.admin.ops.publish,attributes:{href:"javascript:;","class":e.status?"fast-not-publish":"fast-publish"}}),theDataTable.getActionMenu(s)}}],ajax:{url:ajaxURL}}},Editor:{modalShowCallback:function(t){var a=$("#photo"),e=$("#elfinder-photo"),i=$("#file-upload-management");"fast-edit"===t.actionType?(LMCFileinput.disable(a),e.prop("disabled",!0),i.hide()):(LMCFileinput.enable(a),e.prop("disabled",!1),i.show())},actionButtonCallback:function(t){$script(formLoaderJs,"formLoader"),$script.ready(["formLoader","validation"],function(){$script(formJs,"form")}),$script.ready("form",function(){ModelForm.init({isAjax:!0,submitAjax:function(a){var e=$("#photo"),i=LMCFileinputs["#photo"].isEnable;if(e.length&&"fast-add"===t.actionType&&i)return void e.fileinput("upload");var s,n,l,r,o,d,p=$(".icheck"),c={1:{type:p.iCheck("update")[0].checked?"random":""},2:{type:p.iCheck("update")[1].checked?"random":""}},u={category_id:a.form.find('select[name="category_id"]').val(),brand_id:a.form.find('select[name="brand_id"]').val(),name:a.form.find('input[name="name"]').val(),amount:a.form.find('input[name="amount"]').val(),code:a.form.find('input[name="code"]').val(),showcase_id:c,short_description:tinyMCE.activeEditor.getContent(),meta_title:a.form.find('input[name="meta_title"]').val(),meta_description:a.form.find('textarea[name="meta_description"]').val(),meta_keywords:a.form.find('input[name="meta_keywords"]').val(),is_publish:a.form.find('input[name="is_publish"]').bootstrapSwitch("state")};"fast-add"===t.actionType?(n="POST",s=apiStoreURL,l=LMCApp.lang.admin.flash.store_success.message,r=LMCApp.lang.admin.flash.store_success.title,o=LMCApp.lang.admin.flash.store_error.message,d=LMCApp.lang.admin.flash.store_error.title,u.photo=$("#elfinder-photo").val()):(n="PATCH",s=t.row.data().urls.edit,l=LMCApp.lang.admin.flash.update_success.message,r=LMCApp.lang.admin.flash.update_success.title,o=LMCApp.lang.admin.flash.update_error.message,d=LMCApp.lang.admin.flash.update_error.title),$.ajax({url:s,data:u,type:n,success:function(a){return"success"===a.result?(LMCApp.getNoty({message:l,title:r,type:"success"}),void t.modal.modal("hide")):void LMCApp.getNoty({message:o,title:d,type:"error"})}}).done(function(t){"success"===t.result&&(LMCApp.hasTransaction=!1,DataTable.dataTable.ajax.reload())})}}),$(t.editorOptions.formSrc).submit()})}},Fileinput:{src:"#photo",fileinput:{uploadUrl:apiStoreURL,allowedFileExtensions:validExtension.split(","),allowedFileTypes:null,previewFileType:"any",showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1},uploadExtraData:function(t,a){var e=$(".form"),i=$(".icheck"),s={1:{type:i.iCheck("update")[0].checked?"random":""},2:{type:i.iCheck("update")[1].checked?"random":""}};return{category_id:e.find('select[name="category_id"]').val(),brand_id:e.find('select[name="brand_id"]').val(),name:e.find('input[name="name"]').val(),amount:e.find('input[name="amount"]').val(),code:e.find('input[name="code"]').val(),showcase_id:JSON.stringify(s),short_description:tinyMCE.activeEditor.getContent(),meta_title:e.find('input[name="meta_title"]').val(),meta_description:e.find('textarea[name="meta_description"]').val(),meta_keywords:e.find('input[name="meta_keywords"]').val(),is_publish:e.find('input[name="is_publish"]').bootstrapSwitch("state"),x:$("input[name='x[]']").map(function(){return $(this).val()}).get(),y:$("input[name='y[]']").map(function(){return $(this).val()}).get(),width:$("input[name='width[]']").map(function(){return $(this).val()}).get(),height:$("input[name='height[]']").map(function(){return $(this).val()}).get()}},ajaxSettings:{success:function(t){var a,e,i,s;return"fast-add"===Editor.actionType?(a=LMCApp.lang.admin.flash.store_success.message,e=LMCApp.lang.admin.flash.store_success.title,i=LMCApp.lang.admin.flash.store_error.message,s=LMCApp.lang.admin.flash.store_error.title):(a=LMCApp.lang.admin.flash.update_success.message,e=LMCApp.lang.admin.flash.update_success.title,i=LMCApp.lang.admin.flash.update_error.message,s=LMCApp.lang.admin.flash.update_error.title),"success"===t.result?(LMCApp.getNoty({message:a,title:e,type:"success"}),Editor.modal.modal("hide"),LMCApp.hasTransaction=!1,void DataTable.dataTable.ajax.reload()):void LMCApp.getNoty({message:i,title:s,type:"error"})}}}}}}};