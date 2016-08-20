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
                    $('select.select2[name="' + key + '_id"]', theEditor.form).each(function()
                    {
                        theSelect2.element.append('<option value="' + value.id +'" selected>' + value.name + '</option>').trigger('change');
                    });
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
            formSrc: ".form"
        };
    }

};
