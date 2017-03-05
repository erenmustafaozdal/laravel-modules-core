;var theEMOModel;
var EMOModel = {

    /**
     * user create options
     * @var object
     */
    options: {
        formSrc: 'form.form-horizontal'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        theEMOModel = this;

        this.form = $(this.options.formSrc);

        // create form validation
        var codeEditor = $('.code-editor');
        $.each(codeEditor, function(index,value)
        {
            CodeMirror.fromTextArea(value, {
                lineNumbers: false,
                gutter: true,
                lineWrapping: false,
                matchBrackets: true,
                styleActiveLine: true,
                indentUnit: 4,
                theme:"material",
                mode: 'htmlmixed'
            });
        });
    }
};
