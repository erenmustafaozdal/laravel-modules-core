var theValidation,Validation={form:null,options:{},validateInitialized:!1,formIsSubmit:!1,init:function(t){theValidation=this,this.options=$.extend(!0,this.getDefaultOptions(),t),this.form=$(this.options.src),this.form.validate(this.options.validate),this.validateInitialized=!0,this.formIsSubmit=!1,this.form.find("input").keypress(function(t){return 13==t.which?(t.preventDefault(),theValidation.form.validate().form()&&theValidation.form.submit(),!1):void 0})},removeElementRule:function(t,e){this.form.find('input[name="'+t+'"]').rules("remove",e)},addElementRule:function(t,e){this.form.find('input[name="'+t+'"]').rules("add",e)},getDefaultOptions:function(){return{src:"",isAjax:!1,validate:{ignore:[],errorElement:"em",errorClass:"help-block",focusInvalid:!1,rules:{},messages:{},invalidHandler:function(t,e){LMCApp.getNoty({message:LMCApp.lang.formError.defaultMessage,title:LMCApp.lang.formError.defaultTitle,type:"error"})},highlight:function(t){$(t).hasClass("repeater")?$(t).closest(".mt-repeater-item").addClass("has-error"):$(t).closest(".form-group").addClass("has-error")},success:function(t){t.prev().hasClass("repeater")?t.closest(".mt-repeater-item").removeClass("has-error"):t.closest(".form-group").removeClass("has-error"),t.remove()},errorPlacement:function(t,e){e.hasClass("select2me")||e.hasClass("addresses")?t.insertAfter(e.next("span.select2")):"file"===e.prop("type")||"elfinder-photo"===$(e).prop("id")||e.hasClass("touchspinme")||e.hasClass("input-group-element")?t.insertAfter(e.closest("div.input-group")):t.insertAfter(e)},submitHandler:function(t){return theValidation.formIsSubmit?!1:theValidation.options.isAjax?(theValidation.options.submitAjax&&(theValidation.options.submitAjax.call(void 0,theValidation),theValidation.formIsSubmit=!0),!1):(t.submit(),void(theValidation.formIsSubmit=!0))}}}}};