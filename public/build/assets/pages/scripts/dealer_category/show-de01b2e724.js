var ModuleShow,Show={options:{formSrc:"#dealer_category-edit-info"},form:null,init:function(){ModuleShow=this,this.form=$(this.options.formSrc),Validation.init({src:this.options.formSrc,isAjax:!1,validate:{rules:{name:{required:!0}},messages:messagesOfRules}})}};