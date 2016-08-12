;var theGTreeTable;
var GTreeTable = {

    /**
     * options
     */
    options: {},

    /**
     * jcrop jquery elements
     */
    element: null,

    /**
     * init function
     *
     * @param options
     */
    init: function(options)
    {
        // object
        theGTreeTable = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);
        this.element = $(this.options.src);

        // gtreetable init
        this.element.gtreetable(this.options.gtreetable);

    },

    /**
     * on error
     *
     * @var XMLHttpRequest
     */
    onError: function(XMLHttpRequest)
    {
        LMCApp.getNoty({
            message: XMLHttpRequest.responseText,
            title: XMLHttpRequest.status,
            type: 'error'
        });
    },

    /**
     * on save function
     *
     * @var node
     */
    onSave: function(node)
    {
        return {
            url: ! node.isSaved() ? apiStoreURL : apiUpdateURL.replace('{id}',node.getId()),
            data: {
                parent: node.getParent(),
                name: node.getName(),
                position: node.getInsertPosition(),
                related: node.getRelatedNodeId()
            },
            statusCode: {
                422: function () {
                    LMCApp.getNoty({
                        message: LMCApp.lang.ajaxErrors.validation.message,
                        title: LMCApp.lang.ajaxErrors.validation.title,
                        type: 'error'
                    });
                }
            },
            error: theGTreeTable.onError
        };
    },

    /**
     * on delete function
     *
     * @var node
     */
    onDelete: function(node)
    {
        return {
            url: apiDestroyURL.replace('{id}',node.getId()),
            error: theGTreeTable.onError
        };
    },

    /**
     * on move function
     *
     * @var source
     * @var destination
     * @var position
     */
    onMove: function(source, destination, position)
    {
        return {
            url: apiMoveURL.replace('{id}', source.getId()),
            data: {
                related: destination.getId(),
                position: position
            },
            error: theGTreeTable.onError
        };
    },

    /**
     * get models
     *
     * @var id
     */
    source: function(id)
    {
        return {
            url: ajaxURL,
            data: { id: id },
            error: theGTreeTable.onError
        };
    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: '.gtreetable',
            gtreetable: {
                language: 'tr',
                draggable: true,
                selectLimit: 0,
                onSave: theGTreeTable.onSave,
                onDelete: theGTreeTable.onDelete,
                onMove: theGTreeTable.onMove,
                source: theGTreeTable.source,
                actions: [
                    {
                        name: LMCApp.lang.admin.show,
                        event: function (node, manager) {
                            window.location.href = showURL.replace('{id}',node.id);
                        }
                    },
                    {
                        name: LMCApp.lang.admin.edit,
                        event: function (node, manager) {
                            window.location.href = editURL.replace('{id}',node.id);
                        }
                    }
                ],
                types: {
                    file: 'glyphicon glyphicon-file',
                    folder: 'glyphicon glyphicon-folder-open',
                    publish_folder: 'glyphicon glyphicon-folder-open text-success',
                    publish_file: 'glyphicon glyphicon-file text-success'
                }
            }
        };
    }
};