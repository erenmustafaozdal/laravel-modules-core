var UserOperation,Operation={options:{fileinputSrc:"#photo",formSrc:"form.form"},form:null,init:function(i){UserOperation=this,this.form=$(this.options.formSrc),LMCFileinput.init(this.getFileinputInitOptions()),Validation.init({src:this.options.formSrc,isAjax:!1,validate:{rules:i,messages:messagesOfRules}})},getFileinputInitOptions:function(){return{src:UserOperation.options.fileinputSrc,formSrc:UserOperation.options.formSrc,fileinput:{uploadUrl:UserOperation.form.prop("action"),showUpload:!1,showCancel:!1,fileActionSettings:{showUpload:!1}}}}};