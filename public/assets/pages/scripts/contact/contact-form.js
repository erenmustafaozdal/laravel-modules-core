var ModelForm={init:function(e){var i=$.extend(!0,this.getDefaultOptions(),e);Validation.init(i)},getDefaultOptions:function(){return{src:".form",isAjax:!1,submitAjax:function(e){},validate:{rules:{name:{required:!0},province_id:{required:!0},county_id:{required:!0}},messages:messagesOfRules}}}};