;var theModel;
var Model = {

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
        theModel = this;

        this.form = $(this.options.formSrc);

        $('.color-picker').minicolors({
            control: 'hue',
            letterCase: 'lowercase',
            position: 'bottom right',
            theme: 'bootstrap'
        });

    }
};
