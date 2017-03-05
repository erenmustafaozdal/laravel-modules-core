;var theEditor;
var Editor = {

    /**
     * editor options
     * @var object
     */
    editorOptions: {},

    /**
     * modal jquery object
     * @var null|jquery object
     */
    modal: null,
    actionButton: null,
    form: null,

    /**
     * modal action type
     * @var string
     */
    actionType: 'add',

    /**
     * editing datatable row
     * @var null | DataTable row
     */
    row: null,

    /**
     * editor init function
     * @param options
     */
    init: function(options)
    {
        // Editor object
        theEditor = this;

        // default settings
        this.editorOptions = $.extend(true, this.getDefaultOptions(), options);

        // create modal and other jquery objects
        this.modal = $(this.editorOptions.modalSrc);
        this.actionButton = $(this.editorOptions.actionSrc);
        this.form = $(this.editorOptions.formSrc);

        // editor modal action button click
        this.modal.on('click',this.editorOptions.actionSrc, function()
        {
            if (theEditor.editorOptions.actionButtonCallback) {
                theEditor.editorOptions.actionButtonCallback.call(this, theEditor);
            }
        });

        // editor modal create için mi, yoksa edit için mi açıldı
        this.modal.on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // fast-add | fast-edit
            theEditor.actionType = button.data('action'); // data-action
            var modal = $(this);

            // modal açıldı callback call
            if (theEditor.editorOptions.modalShowCallback) {
                theEditor.editorOptions.modalShowCallback.call(this, theEditor);
            }

            // if fast-add
            if (theEditor.actionType === 'fast-add') {
                modal.find('.modal-title').text(LMCApp.lang.admin.ops.fast_add);
                $(theEditor.editorOptions.actionSrc, modal).text(LMCApp.lang.admin.ops.fast_add);
                LMCApp.resetAllFormFields(theEditor.form);
                return true;
            }

            // başlık ve buton düzenlenir
            modal.find('.modal-title').text(LMCApp.lang.admin.ops.fast_edit);
            $(theEditor.editorOptions.actionSrc, modal).text(LMCApp.lang.admin.ops.fast_edit);
            var tr = button.closest('tr');
            LMCApp.resetAllFormFields(theEditor.form);
            theEditor.row = theDataTable.getDataTable().row(tr);
            theEditor.getEditDataToForm();
        });

        // editor modal kapandığında yapılacak işlemler
        this.modal.on('hide.bs.modal', function (e) {
            LMCApp.resetAllFormFields(theEditor.form);
        });
    },

    /**
     * get row edit data and set to form
     */
    getEditDataToForm: function()
    {
        $.ajax({
            url: theEditor.row.data().urls.fast_edit,
            async: false,
            success: function(data)
            {
                $.each(data, function(key, value)
                {
                    key = key === 'categories' ? 'category_id[]' : key;

                    $('textarea[name="' + key + '"], select[name="' + key + '"], input[name="' + key + '"]', theEditor.form).each(function()
                    {
                        $(this).val(value);
                    });
                    $('input[name="' + key + '"]', theEditor.form).each(function()
                    {
                        if ( ! $(this).hasClass('make-switch')) {
                            $(this).attr("checked", value);
                            return;
                        }
                        $(this).bootstrapSwitch('state', value, true);
                    });
                    $('select.select2me[name="' + key + '_id"]', theEditor.form).each(function()
                    {
                        if (value != null) {
                            $(this).append('<option value="' + value.id + '" selected>' + value.name + '</option>').trigger('change');
                        }
                    });

                    // categories gelince
                    if (value != null && typeof value == 'object') {
                        var className = typeof LMCSelect2s != 'undefined' && LMCSelect2s['.select2me'] != undefined ? 'select2me' : 'select2category';

                        $('select.' + className +'[name="' + key + '"]', theEditor.form).each(function () {
                            var element = $(this);
                            $.each(value, function (index, item) {

                                element.append('<option value="' + item.id + '" selected>' + item.name + '</option>').trigger('change');
                            });
                        });
                    }

                    // addresses
                    $('select.addresses[name="' + key + '_id"]', theEditor.form).each(function()
                    {
                        if (value != null) {
                            $(this).prop('disabled', false).append('<option value="' + value.id + '" selected>' + value[key] + '</option>');
                        }
                    });

                    // product showcase
                    if (key === 'showcases') {
                        $.each(value, function (index, item) {
                            $('.icheck[name="showcase_id[' + item.id + '][type]"]').iCheck('check');
                        });
                    }

                    // product short description to editor
                    if ($('textarea.tinymce[name="' + key + '"]', theEditor.form).length) {
                        tinyMCE.activeEditor.setContent(value);
                    }
                });
            }
        });
    },

    /**
     * get default editor options function
     */
    getDefaultOptions: function()
    {
        return {
            modalSrc: "#editor-modal", // modal
            actionSrc: ".editor-action", // modal action button
            formSrc: "form.form"
        };
    }

};
