var ModelForm={init:function(e){var t=$.extend(!0,this.getDefaultOptions(),e);Validation.init(t)},getDefaultOptions:function(){return{src:".form",isAjax:!1,submitAjax:function(e){},validate:{rules:{category_id:{required:!0},title:{required:!0},slug:{alpha_dash:!0}},messages:messagesOfRules}}}};