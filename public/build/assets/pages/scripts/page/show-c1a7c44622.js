var ModuleShow,Show={options:{formSrc:"#page-edit-info"},form:null,init:function(){ModuleShow=this,this.form=$(this.options.formSrc),Validation.init({src:this.options.formSrc,isAjax:!1,validate:{rules:{category_id:{required:!0},title:{required:!0},slug:{alpha_dash:!0}},messages:messagesOfRules}})}};