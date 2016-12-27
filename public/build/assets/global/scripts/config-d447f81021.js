var lmcApp,LMCApp={lang:{formError:{defaultTitle:"Form Hatalı",defaultMessage:"Formda bazı hatalar var. Lütfen tekrar kontrol et."},transactionError:{title:"İşlem Devam Ediyor",message:"Bir önceki işlemin bitmeden başka işlem yapamazsın"},ajaxErrors:{400:{title:"İstek İşlenemez",message:"Tarayıcı tarafından yapılan istek işlenemez durumda. Lütfen daha sonra tekrar dene!"},401:{title:"Yetkin Yok",message:"Bu işlemi yapmak için yetkin yok."},403:{title:"Yetkin Yok",message:"Bu işlemi yapmak için yetkin yok."},404:{title:"Kaynak Bulunamadı",message:"Tarayıcı tarafından istek gönderilen adresin kaynağı bulunamadı."},405:{title:"İzin Verilmeyen Yöntem",message:"Tarayıcı tarafından istek gönderilen yöntem desteklenmiyor."},406:{title:"İstek Kabul Edilemez",message:"Tarayıcı tarafından istenen kaynak istek kabul yeteneğine sahip değildir."},408:{title:"Zaman Aşımı",message:'Sunucu isteği beklerken zaman aşımına uğradı. HTTP özelliklerine göre: ".Sunucu beklemek için hazırlanan süre içinde bir istek vermedi. Daha sonra, değişiklik yapmadan isteği tekrarla."'},422:{title:"Veriler Onaylanmadı",message:"Formda hata var veya aynı veriler tekrar kayıt edilmek istendi."},500:{title:"Sunucu Hatası",message:"Beklenmeyen bir durum ile karşılaşıldı. Lütfen daha sonra dene!"},502:{title:"Uygunsuz Ağ Geçidi",message:"Sunucu bir ağ geçidi veya proxy gibi davranırken yukarı akış sunucusundan geçersiz bir yanıt aldı."},503:{title:"Servis Hizmet Dışı",message:"Servis aşırı yük veya bakım için durdurulmuş olabilir. Sunucu şu anda kullanılamıyor. Genellikle, bu geçici bir durumdur."},504:{title:"Zaman Aşımı",message:"Sunucu bir ağ geçidi veya proxy gibi davranırken yukarı akış sunucusundan zamanında yanıt alamadı."},timeout:{title:"Zaman Aşımı",message:"İstek zaman aşımına uğradı. Lütfen aynı işlemi daha sonra tekrar dene."},abort:{title:"İptal Edildi",message:"İstek sunucu tarafından iptal edildi. Lütfen aynı işlemi daha sonra tekrar dene."},parsererror:{title:"Ayrıştırılamadı",message:"İstek sunucu tarafından ayrıştırılamadı. Lütfen aynı işlemi daha sonra tekrar dene."}},admin:{ops:{fast_add:"Hızlı Ekle",show:"Göster",edit:"Düzenle",copy:"Kopyala",fast_edit:"Hızlı Düzenle",destroy_confirm:"Kayıt silinecek! Emin misin?",destroy_input_confirm:"Kayıt, form bilgileri arasından silinecek! Bu işlem formu göndermeden bir değişikliğe yol açmaz...<br> Silmek istediğine emin misin?",destroy:"Sil",activate:"Aktifleştir",not_activate:"Aktifliği Kaldır",publish:"Yayınla",not_publish:"Yayından Kaldır",browse:"Gözat",crop:"Kırp",select:"Seç",write_here:"Buraya yaz...",relations:"İlişkili Veriler",relation_categories:"İlişkili Kategoriler",file_manager:"Dosya Yöneticisinden",set_main_photo:"Ana Fotoğraf Yap",add_marker:"İşaretçi Ekle",center_here:"Merkez Yap",latitude:"Enlem",longitude:"Boylam",search_location:"Konum Ara"},flash:{store_success:{title:"Ekleme Tamamlandı",message:"Ekleme işlemi başarılı bir şekilde gerçekleşti."},store_error:{title:"Kayıt Eklenemedi",message:"Ekleme işlemi gerçekleşmedi. Lütfen daha sonra dene!"},update_success:{title:"Düzenleme Tamamlandı",message:"Düzenleme işlemi başarılı bir şekilde gerçekleşti."},update_error:{title:"Kayıt Düzenlenemedi",message:"Düzenleme işlemi gerçekleşmedi. Lütfen daha sonra dene!"},destroy_info:{title:"Kayıt Silinecek",message:'Kayıt silinmek üzere... İstersen iptal ederek işlemi geri alabilirsin.<div class="clearfix"></div><button type="button" role="button" class="btn dark cancel-destroy"> İptal Et </button> '},destroy_success:{title:"Silme Tamamlandı",message:"Silme işlemi başarılı bir şekilde gerçekleşti."},destroy_error:{title:"Kayıt Silinemedi",message:"Silme işlemi gerçekleşmedi. Lütfen daha sonra dene!"},destroy_self:{title:"Kendini Silemezsin",message:"Silme işlemi gerçekleşmedi. Kendini silemezsin!"},activate_success:{title:"Aktifleştirme Tamamlandı",message:"Aktifleştirme işlemi başarılı bir şekilde gerçekleşti."},activate_error:{title:"Aktifleştirilemedi",message:"Aktifleştirme işlemi gerçekleşmedi. Lütfen daha sonra dene!"},not_activate_success:{title:"Aktifliği Kaldırma Tamamlandı",message:"Aktifliği kaldırma işlemi başarılı bir şekilde gerçekleşti."},not_activate_error:{title:"Aktiflik Kaldırılamadı",message:"Aktifliği kaldırma işlemi gerçekleşmedi. Lütfen daha sonra dene!"},publish_success:{title:"Yayınlama Tamamlandı",message:"Yayınlama işlemi başarılı bir şekilde gerçekleşti."},publish_error:{title:"Yayınlanamadı",message:"Yayınlama işlemi gerçekleşmedi. Lütfen daha sonra dene!"},not_publish_success:{title:"Yayından Kaldırma Tamamlandı",message:"Yayından kaldırma işlemi başarılı bir şekilde gerçekleşti."},not_publish_error:{title:"Yayından Kaldırılamadı",message:"Yayından kaldırma işlemi gerçekleşmedi. Lütfen daha sonra dene!"},not_select_rows:{title:"Veri Seçilmedi",message:"Veri tablosunda hiçbir satır seçilmedi."},not_select_action:{title:"Eylem Seçilmedi",message:"Veri tablosunda işlem yapmak için hiçbir eylem seçilmedi."},group_action_success:{title:"Toplu İşlem Tamamlandı",message:"Toplu işlem başarılı bir şekilde gerçekleşti."},group_action_error:{title:"Toplu İşlem Gerçekleşmedi",message:"Toplu işlem gerçekleşmedi. Lütfen daha sonra dene!"},nestable_level_error:{title:"Alt Öğe Ekleyemezsin",message:"İzin verilen alt öğe sınırı aşıldı! Bu öğeyi daha üst seviyeye eklemelisin."},column_move_error:{title:"Sütun Taşınamaz",message:"Mega menülerin sütunları taşınamaz."},column_update_error:{title:"Sütun Güncellenemez",message:"Mega menülerin sütunları güncellenemez."},column_destroy_error:{title:"Sütun Silinemez",message:"Mega menülerin sütunları silinemez."},column_near_store_error:{title:"Sütunların Yanına Kayıt Yapılamaz",message:"Mega menülerin sütunlarının yanına kayıt yapılamaz. Menüyü istediğin bir sütunun altına kaydetmelisin."},column_near_move_error:{title:"Sütunların Yanına Taşınamaz",message:"Mega menülerin sütunlarının yanına menü taşınamaz. Menüyü istediğin bir sütunun altına taşımalısın."},geolocate_success:{title:"Konumun Alındı",message:"Tarayıcın üzerinden konumunu aldık."},geolocate_error:{title:"Konum Bulunamadı",message:"Tarayıcın üzerinden konum bulma işlemi gerçekleşmedi."},geolocate_not_support_error:{title:"Desteklenmiyor",message:"Tarayıcın konum almamızı desteklemiyor."}},validation:{max:{array:{title:"Çok Fazla Nesne",message:":attribute değeri :max adedinden az nesneye sahip olmalıdır."}}}}},link:"http://"+window.location.host,hasTransaction:!1,notyOptions:{message:"Bilinmeyen bir hata ile karşılaştık. Lütfen aynı işlemi daha sonra tekrar dene.",title:"Bilinmeyen Hata",type:"error"},waitMiliSeconds:1e4,destroyTimer:null,init:function(){this.initDateTimepicker(),this.initClipboard(),this.initBootstrapSelect(),this.initMaxLength(),this.initTooltips(),this.setToastrOptions(),this.setBootboxOptions(),this.setPaceOptions(),this.setAjaxOptions(),lmcApp=this},initClipboard:function(){$(".mt-clipboard").each(function(){new Clipboard(this)})},initBootstrapSelect:function(){$().selectpicker&&$(".bs-select").selectpicker({iconBase:"fa",tickIcon:"fa-check"})},initMaxLength:function(){$(".maxlength").each(function(){var e=$(this).prop("maxlength");$(this).maxlength({limitReachedClass:"label label-danger",warningClass:"label label-info",separator:" / ",preText:"En fazla "+e+" karakter kullanabilirsin! ",postText:" karakter kullanıldı.",validate:!0,alwaysShow:!0})})},initTooltips:function(){$(".tooltips").tooltip({container:"body",html:!0,placement:"auto top"})},initDatepicker:function(e){$().datepicker&&(e=$.extend(!0,{orientation:"auto",language:"tr",todayHighlight:!0,autoclose:!0,weekStart:1,todayBtn:!0,clearBtn:!0},e),$(".date-picker").datepicker(e))},initDateTimepicker:function(e){$().datetimepicker&&(e=$.extend(!0,{orientation:"auto",format:"dd.mm.yyyy hh:ii",pickerPosition:"bottom-left",language:"tr",todayHighlight:!0,autoclose:!0,weekStart:1,todayBtn:!0,clearBtn:!0},e),$(".date-time-picker").datetimepicker(e))},initTouchSpin:function(e){var a=$.extend(!0,{src:"",touchspin:{min:0,max:100,initval:"",stepinterval:100,stepintervaldelay:500,step:1,forcestepdivisibility:"round",decimals:0,boostat:5,maxboostedstep:10,postfix:"",postfix_extraclass:"",prefix:"",prefix_extraclass:"",verticalbuttons:!1,verticalupclass:"glyphicon glyphicon-plus",verticaldownclass:"glyphicon glyphicon-minus",buttondown_class:"btn btn-sm red btn-outline",buttonup_class:"btn btn-sm green btn-outline"}},e);$(a.src).TouchSpin(a.touchspin)},initInputMask:function(e){if($().inputmask){var a,t=$.extend(!0,{src:"",type:"",inputmask:{placeholder:" "}},e);switch(t.type){case"phone":a="0(999) 999 99 99";break;case"amount":a="999.999.999,99"}t.inputmask.mask=a,$(t.src).inputmask(t.inputmask)}},getNoty:function(e){var a=$.extend(!0,this.notyOptions,e);switch(a.type){case"error":toastr.error(a.message,a.title);break;case"warning":toastr.warning(a.message,a.title);break;case"info":toastr.info(a.message,a.title);break;case"success":toastr.success(a.message,a.title)}},setToastrOptions:function(){toastr.options={closeButton:!0,debug:!1,positionClass:"toast-bottom-left",onclick:null,timeOut:this.waitMiliSeconds,extendedTimeOut:5e3}},setBootboxOptions:function(){bootbox.setDefaults({locale:"tr",closeButton:!1})},setPaceOptions:function(){window.paceOptions={ajax:!0,startOnPageLoad:!1}},setAjaxOptions:function(){$.ajaxSetup({type:"POST",dataType:"json",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},beforeSend:function(){return lmcApp.hasTransaction?(lmcApp.getNoty({title:lmcApp.lang.transactionError.title,message:lmcApp.lang.transactionError.message,type:"error"}),!1):(lmcApp.hasTransaction=!0,void Pace.restart())},complete:function(e,a){switch(Pace.stop(),lmcApp.hasTransaction=!1,a){case"error":LMCApp.getErrorMessage(e);break;case"timeout":lmcApp.getNoty({title:lmcApp.lang.ajaxErrors.timeout.title,message:lmcApp.lang.ajaxErrors.timeout.message,type:"error"});break;case"abort":lmcApp.getNoty({title:lmcApp.lang.ajaxErrors.abort.title,message:lmcApp.lang.ajaxErrors.abort.message,type:"error"});break;case"parsererror":lmcApp.getNoty({title:lmcApp.lang.ajaxErrors.parsererror.title,message:lmcApp.lang.ajaxErrors.parsererror.message,type:"error"})}}})},resetAllFormFields:function(e){$('textarea, select, input[type!="hidden"]',e).each(function(){$(this).val("").closest(".form-group").removeClass("has-error").find("span.help-block").remove()}),$('input[type="checkbox"]',e).each(function(){$(this).hasClass("make-switch")&&$(this).bootstrapSwitch("state",!1,!0),$(this).attr("checked",!1).closest(".form-group").removeClass("has-error").find("span.help-block").remove()}),"object"==typeof theLMCFileinput&&theLMCFileinput.fileElement.fileinput("reset"),$("select.select2me",e).length&&$("select.select2me",e).each(function(){var e;e=void 0!=LMCSelect2s[".select2me"]?LMCSelect2s[".select2me"]:$(this).hasClass("select2category")?LMCSelect2s[".select2category"]:LMCSelect2s[".select2brand"],$(this).empty().select2(e.select2),$(this).find(".select2-selection__clear").remove()}),$("select.addresses",e).length&&$("select.addresses",e).each(function(){var e=$(this).prop("id");"province_id"!==e&&$(this).prop("disabled",!0),$(this).empty().select2(LMCSelect2s["#"+e].select2),$(this).find(".select2-selection__clear").remove()}),$(".icheck",e).length&&$(".icheck",e).iCheck("uncheck").iCheck("update"),$("textarea.tinymce").length&&tinyMCE.activeEditor.setContent("")},startDestroyTimer:function(e,a){this.getNoty({message:this.lang.admin.flash.destroy_info.message,title:this.lang.admin.flash.destroy_info.title,type:"info"}),this.destroyTimer=window.setTimeout(e,this.waitMiliSeconds),$(".toast-message").on("click",".cancel-destroy",function(){clearTimeout(LMCApp.destroyTimer),a.call()})},getErrorMessage:function(e){lmcApp.getNoty({title:LMCApp.lang.ajaxErrors[e.status].title,message:LMCApp.lang.ajaxErrors[e.status].message,type:"error"})},getOppositeAspect:function(e,a){return"square"===a?1:"horizontal"===a&&1>=e?horizontalRatio:"vertical"===a&&e>=1?verticalRatio:e},stripTags:function(e){return null==e?e:e.replace(/(<([^>]+)>)/gi,"")},removeElement:function(e){var a=$.extend(!0,{element:null,removeElement:{type:"closest",src:""},ajax:{url:"",data:{}}},e);bootbox.confirm(LMCApp.lang.admin.ops.destroy_confirm,function(e){e&&$.ajax({url:a.ajax.url,data:a.ajax.data,success:function(e){if("success"!==e.result)return void LMCApp.getNoty({message:LMCApp.lang.admin.flash.destroy_error.message,title:LMCApp.lang.admin.flash.destroy_error.title,type:"error"});switch(LMCApp.getNoty({message:LMCApp.lang.admin.flash.destroy_success.message,title:LMCApp.lang.admin.flash.destroy_success.title,type:"success"}),a.removeElement.type){case"closest":a.element.closest(".element-wrapper").fadeOut().remove();break;default:$(".element-wrapper").fadeOut().remove()}}})})}};