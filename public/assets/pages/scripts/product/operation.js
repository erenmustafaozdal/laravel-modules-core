;var ModelOperation;
var Operation = {

    /**
     * user create options
     * @var object
     */
    options: {
        formSrc: 'form.form'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        ModelOperation = this;

        this.form = $(this.options.formSrc);

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    'category_id': {
                        required: true
                    },
                    name: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init
        LMCFileinput.init(this.getPhotoFileinputOptions());

        // remove photo
        $('a.remove-element').on('click', function()
        {
            var el = $(this);
            LMCApp.removeElement({
                element: el,
                removeElement: {
                    src: '.element-wrapper'
                },
                ajax: {
                    url: removePhotoURL.replace('###id###',el.data('parent-id')),
                    data: {id: el.data('element-id')}
                }
            });
        });

        // set main photo
        $('a.set-main-photo').on('click', function () {
            var el = $(this);
            $.ajax({
                url: setMainPhotoURL.replace('###id###',el.data('parent-id')),
                data: {id: el.data('element-id')},
                success: function (data)
                {
                    if (data.result !== 'success') {
                        LMCApp.getNoty({
                            message: LMCApp.lang.admin.flash.update_error.message,
                            title: LMCApp.lang.admin.flash.update_error.title,
                            type: 'error'
                        });
                        return;
                    }
                    LMCApp.getNoty({
                        message: LMCApp.lang.admin.flash.update_success.message,
                        title: LMCApp.lang.admin.flash.update_success.title,
                        type: 'success'
                    });

                    var ribbon = el.closest('div.row').find('.ribbon');
                    var oldMain = ribbon.next().find('a.remove-element');
                    var elementId = oldMain.data('element-id');
                    var parentId = oldMain.data('parent-id');
                    ribbon.prependTo(el.closest('.mt-element-overlay'));
                    oldMain.closest('ul.mt-info').append('<li></li>');
                    el.data('element-id', elementId).attr('data-element-id', elementId)
                        .data('parent-id',parentId).attr('data-parent-id',parentId)
                        .appendTo(oldMain.closest('ul.mt-info').find('li').last());
                }
            });
        });

        // initial file input preview image
        if (theLMCFileinput.options.fileinput.initialPreview != undefined && theLMCFileinput.options.fileinput.initialPreview != null) {
            var accordionIsOpen = false;
            var resizeTimer;
            $('#detail_accordion_toggle').on('click', function () {
                if (accordionIsOpen) {
                    return;
                }
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    $('.file-preview-image').each(function (key, value) {
                        var id = $(value).prop('id').replace('img-', '');
                        $(value).closest('.file-preview-frame').prop('id', id);
                        theLMCJcrop.setupElement(id);
                    });
                }, 250);
                accordionIsOpen = true;
            });
        }

    },

    /**
     * get default photo fileinput options
     */
    getPhotoFileinputOptions: function()
    {
        return {
            src: '#photo',
            formSrc:  'form.form',
            fileinput: {
                maxFileCount: maxFile,
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                showRemove: false,
                initialPreview: initialPreview,
                initialPreviewConfig: initialPreviewConfig,
                initialPreviewThumbTags: initialPreviewThumbTags,
                initialPreviewShowDelete: false,
                initialPreviewFileType: 'image',
                fileActionSettings: {
                    showUpload: false,
                    showRemove: false
                }
            }
        };
    }
};
