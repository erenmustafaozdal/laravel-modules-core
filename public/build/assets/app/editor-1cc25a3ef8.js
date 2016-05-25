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
     */
    actionType: 'create',

    editing: null,
    new: false,

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
            console.log('modal içindeki hızlı ekle butonuna basıldı');
        });

        // editor modal create için mi, yoksa edit için mi açıldı
        this.modal.on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Modal'ı tetikleyen düğme
            var recipient = button.data('herhangi bir şey'); // data-* özelliklerinden bilgi çıkar
            // Gerekliyse burda AJAX isteği başlatabilirsin (ve sonra callback'te güncelleme işlemini yaparsın).
            // Modal'ın içeriğini güncelle. Biz burda jQuery kullancağız, ama veri bağlama veya diğer yöntemleri de kullanabilirsin.
            var modal = $(this);
            modal.find('.modal-title').text('Yeni mesaj ' + recipient);
            modal.find('.modal-body input').val(recipient);
        });

        // editor modal kapandığında yapılacak işlemler
        this.modal.on('hide.bs.modal', function (e) {
            LMCApp.resetAllFormFields(theEditor.form);
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
            formSrc: ".editor-form"
        };
    }

};
