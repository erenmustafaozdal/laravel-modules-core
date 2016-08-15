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
     * on save function
     *
     * @param node
     */
    onSave: function(node)
    {
        var type = node.isSaved() ? 'POST' : 'PATCH';
        return {
            url: ! node.isSaved() ? apiStoreURL : apiUpdateURL.replace('###id###',node.getId()),
            type: type,
            data: {
                parent: node.getParent(),
                name: node.getName(),
                position: node.getInsertPosition(),
                related: node.getRelatedNodeId()
            },
            error: LMCApp.getErrorMessage
        };
    },

    /**
     * on delete function
     *
     * @param node
     */
    onDelete: function(node)
    {
        console.log(node.getId());
        return {
            url: apiDestroyURL.replace('###id###',node.getId()),
            type: 'DELETE',
            error: LMCApp.getErrorMessage
        };
    },

    /**
     * on move function
     *
     * @param source
     * @param destination
     * @param position
     */
    onMove: function(source, destination, position)
    {
        return {
            url: apiMoveURL.replace('###id###', source.getId()),
            data: {
                related: destination.getId(),
                position: position
            },
            error: LMCApp.getErrorMessage
        };
    },

    /**
     * get models
     *
     * @param id
     */
    source: function(id)
    {
        return {
            url: ajaxURL,
            type: 'GET',
            data: { id: id },
            error: LMCApp.getErrorMessage
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
                manyroots: true,
                selectLimit: 0,
                onSave: theGTreeTable.onSave,
                onDelete: theGTreeTable.onDelete,
                onMove: theGTreeTable.onMove,
                source: theGTreeTable.source,
                actions: [
                    {
                        name: LMCApp.lang.admin.ops.show,
                        event: function (node, manager) {
                            window.location.href = showURL.replace('###id###',node.id);
                        }
                    },
                    {
                        name: LMCApp.lang.admin.ops.edit,
                        event: function (node, manager) {
                            window.location.href = editURL.replace('###id###',node.id);
                        }
                    }
                ],
                types: {
                    file: 'glyphicon glyphicon-file',
                    folder: 'glyphicon glyphicon-folder-open'
                }
            }
        };
    }
};