!function(){"use strict";$script.ready("validation",function(){$script(validationMethodsJs)}),$script.ready("jquery",function(){$script(homeJs,"home"),$script("/vendor/laravel-modules-core/assets/global/plugins/jquery-repeater/jquery.repeater.min.js","repeater"),$script("/vendor/laravel-modules-core/assets/global/plugins/jquery-ui/jquery-ui.min.js","jquery_ui")}),$script.ready("jquery_ui",function(){$script("/vendor/laravel-modules-core/assets/global/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js","touch_punch")}),$script.ready(["jquery_ui","touch_punch","config","app_select2","repeater","home","app_fileinput","app_jcrop"],function(){Home.init(),Select2.init({select2:{ajax:null}});var e=function(e,t){2>=t?e.find(".mt-repeater-delete").addClass("disabled"):e.find(".mt-repeater-delete").removeClass("disabled"),12>t?e.find(".mt-repeater-add").removeClass("disabled"):e.find(".mt-repeater-add").addClass("disabled")};$(".mt-repeater").each(function(){$(this).repeater({show:function(){$(this).slideDown(),LMCApp.initTooltips();var t=$(this).find(".photo_home_image_banner");t.closest(".form-group").empty().append(t),LMCFileinput.init(theHome.getPhotoHomeImageBannerOptions());var i=$(this).closest(".mt-repeater").find(".mt-repeater-item").length;$(this).find("a.fileinput-tabs").each(function(){var e=$(this).prop("href"),t=e.split("---");$(this).prop("href",t[0]+"---"+(i-1))}),$(this).find("div.tab-pane").each(function(){var e=$(this).prop("id"),t=e.split("---");$(this).prop("id",t[0]+"---"+(i-1))});var s=$(this).find('input.elfinder[type="text"]'),a=s.prop("id"),o=a.split("---"),r=o[0]+"---"+(i-1);s.prop("id",r).next().find("a.popup_selector").attr("data-inputid",r),e($(this).closest(".mt-repeater"),i)},hide:function(t){var i=$(this).closest(".mt-repeater"),s=i.find(".mt-repeater-item").length;bootbox.confirm(LMCApp.lang.admin.ops.destroy_input_confirm,function(a){a&&(e(i,s-1),$(this).slideUp(t))})},ready:function(e){}})});var t=$("select.item-type");$("select.items-type");t.on("change",function(e){var t,i,s,a,o=$(this);t=o.val(),i=window[t+"CategoriesURL"],$.ajax({url:i,success:function(e){s=o.closest(".form-body").find(".items-type"),s.empty().append("<option></option>").append('<option value="all">Hepsi</option>'),$.each(e,function(e,t){a='<option value="'+t.id+'">'+t.name_uc_first+"</option>",s.append(a)})}})}),t.on("change",function(e){var t,i=$(this);t=i.val(),"Project"===t?(i.closest(".form-body").find("input.icheck").iCheck("disable").closest(".form-group").addClass("hidden"),i.closest(".form-body").find('input[type="hidden"][name="carouselOption[options][item_visible]"]').prop("disable",!0)):(i.closest(".form-body").find("input.icheck").iCheck("enable").closest(".form-group").removeClass("hidden"),i.closest(".form-body").find('input[type="hidden"][name="carouselOption[options][item_visible]"]').prop("disable",!1))}),$("input.switch-is-active").on("switchChange.bootstrapSwitch",function(e,t){var i=$(this);t?i.closest("div.portlet").removeClass("bg-inverse").removeClass("portlet-sortable-disabled"):i.closest("div.portlet").addClass("bg-inverse").addClass("portlet-sortable-disabled")}),$("a.accordion-toggle").on("click",function(e){return $(this).closest("div.portlet").hasClass("portlet-sortable-disabled")?!1:void 0}),$("#enable_sortable").on("click",function(e){$("#sortable_portlets").sortable("enable"),$("#disable_sortable").removeClass("hidden"),$(this).addClass("hidden")}),$("#disable_sortable").on("click",function(e){$("#sortable_portlets").sortable("disable"),$("#enable_sortable").removeClass("hidden"),$(this).addClass("hidden")}),$(".section-title").on("click",function(){$(this).focus()});var i=$("#sortable_portlets");$("#save_sortable").on("click",function(e){var t={},s=$("input.switch-is-active"),a=$('input[type="text"][name="section_title"]'),o=i.sortable("toArray");$.each(o,function(e,i){t[i]={title:a.eq(e).val(),is_active:s.eq(e).bootstrapSwitch("state"),order:e+1}}),$.ajax({data:t,url:saveSortableURL,success:function(e){return"success"===e.result?void LMCApp.getNoty({message:LMCApp.lang.admin.flash.update_success.message,title:LMCApp.lang.admin.flash.update_success.title,type:"success"}):void LMCApp.getNoty({message:LMCApp.lang.admin.flash.update_error.message,title:LMCApp.lang.admin.flash.update_error.title,type:"error"})}})}),i.sortable({axis:"y",disabled:!0,connectWith:".portlet",items:".portlet",opacity:.5,handle:".portlet-title",coneHelperSize:!0,placeholder:"portlet-sortable-placeholder",forcePlaceholderSize:!0,tolerance:"pointer",helper:"clone",cancel:".portlet-sortable-empty, .portlet-sortable-disabled, .portlet-fullscreen",revert:250,update:function(e,t){t.item.prev().hasClass("portlet-sortable-empty")&&t.item.prev().before(t.item)}}).disableSelection(),$(".icheck").on("ifToggled",function(e){var t=$(this).closest(".icheck-inline").find('input.icheck[type="checkbox"]:checked').length;3===t&&LMCApp.getNoty({message:LMCApp.lang.admin.validation.max.array.message.replace(":attribute","Görünenler").replace(":max",3),title:LMCApp.lang.admin.validation.max.array.title,type:"error"})})})}();