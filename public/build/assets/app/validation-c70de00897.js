var theValidation,Validation={form:null,options:{},validateInitialized:!1,init:function(e){theValidation=this,this.options=$.extend(!0,this.getDefaultOptions(),e),this.form=$(this.options.src),this.form.validate(this.options.validate),this.validateInitialized=!0,this.form.find("input").keypress(function(e){return 13==e.which?(e.preventDefault(),theValidation.form.validate().form()&&theValidation.form.submit(),!1):void 0})},removeElementRule:function(e,t){this.form.find('input[name="'+e+'"]').rules("remove",t)},addElementRule:function(e,t){this.form.find('input[name="'+e+'"]').rules("add",t)},getDefaultOptions:function(){return{src:"",isAjax:!1,validate:{ignore:[],errorElement:"em",errorClass:"help-block",focusInvalid:!1,rules:{},messages:{},invalidHandler:function(e,t){LMCApp.getNoty({message:LMCApp.lang.formError.defaultMessage,title:LMCApp.lang.formError.defaultTitle,type:"error"})},highlight:function(e){$(e).hasClass("repeater")?$(e).closest(".mt-repeater-item").addClass("has-error"):$(e).closest(".form-group").addClass("has-error")},success:function(e){e.prev().hasClass("repeater")?e.closest(".mt-repeater-item").removeClass("has-error"):e.closest(".form-group").removeClass("has-error"),e.remove()},errorPlacement:function(e,t){t.hasClass("select2me")||t.hasClass("addresses")?e.insertAfter(t.next("span.select2")):"file"===t.prop("type")||"elfinder-photo"===$(t).prop("id")||t.hasClass("touchspinme")||t.hasClass("input-group-element")?e.insertAfter(t.closest("div.input-group")):e.insertAfter(t)},submitHandler:function(e){return theValidation.options.isAjax?(theValidation.options.submitAjax&&theValidation.options.submitAjax.call(void 0,theValidation),!1):void e.submit()}}}}};