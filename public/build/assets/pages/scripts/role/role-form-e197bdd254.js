var UserForm={init:function(e){var s=$.extend(!0,this.getDefaultOptions(),e);Validation.init(s)},getDefaultOptions:function(){return{src:".form",isAjax:!1,submitAjax:function(e){},validate:{rules:{name:{required:!0},slug:{alpha_dash:!0}},messages:messagesOfRules}}}};