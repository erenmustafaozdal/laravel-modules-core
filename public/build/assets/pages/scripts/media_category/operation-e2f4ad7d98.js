var ModelOperation,Operation={options:{formSrc:"form.form"},form:null,init:function(){ModelOperation=this,this.form=$(this.options.formSrc),Validation.init({src:this.options.formSrc,isAjax:!1,validate:{rules:{name:{required:!0},type:{required:!0},gallery_type:{required:!0}},messages:messagesOfRules}}),$(".element-wrapper").on("click",".remove-element",function(e){$(this).closest(".element-wrapper").remove()})}};