;var theValidation;
var Validation = {

    /**
     * form jquery element
     * @var null | jquery element
     */
    form: null,

    /**
     * validation options
     * @var object
     */
    options: {},

    /**
     * validate is initialized
     * @var boolean
     */
    validateInitialized: false,

    /**
     * validation init function
     * @param options
     */
    init: function(options)
    {
        // Editor object
        theValidation = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // form jquery element
        this.form = $(this.options.src);

        // form validate run
        this.form.validate(this.options.validate);

        this.validateInitialized = true;

        // when press enter
        this.form.find('input').keypress(function(e) {
            if (e.which == 13) {
                if (theValidation.form.validate().form()) {
                    theValidation.form.submit();
                }
                return false;
            }
        });
    },

    /**
     * remove validate rule of element
     * @var element name
     * @var rule string
     */
    removeElementRule: function(element, rule)
    {
        this.form.find('input[name="' + element + '"]').rules('remove', rule);
    },

    /**
     * add validate rule of element
     * @var element name
     * @var rules object
     */
    addElementRule: function(element, rules)
    {
        this.form.find('input[name="' + element + '"]').rules('add', rules);
    },

    /**
     * get default options
     */
    getDefaultOptions:function()
    {
        return {
            src: '',
            isAjax: false,
            validate: {
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {},
                messages: {},
                invalidHandler: function(event, validator) { //display error alert on form submit
                    LMCApp.getNoty({
                        message: LMCApp.lang.formError.defaultMessage,
                        title: LMCApp.lang.formError.defaultTitle,
                        type: 'error'
                    });
                },
                highlight: function(element) { // hightlight error inputs
                    $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    if ( ! theValidation.options.isAjax) {
                        form.submit();
                        return;
                    }
                    if (theValidation.options.submitAjax) {
                        theValidation.options.submitAjax.call(undefined, theValidation);
                    }
                }
            }
        };
    }

};