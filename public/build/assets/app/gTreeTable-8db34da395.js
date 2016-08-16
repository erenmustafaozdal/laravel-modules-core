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
        // add items to action
        if (this.options.relationLinks.category || this.options.relationLinks.model) {
            this.options.gtreetable.actions.push({ divider: true });
        }
        if (this.options.relationLinks.category) {
            this.options.gtreetable.actions.push({
                name: LMCApp.lang.admin.ops.relation_categories,
                event: function (node, manager) {
                    window.location.href = theGTreeTable.options.relationURLs.category.replace('###id###',node.id);
                }
            });
        }
        if (this.options.relationLinks.model) {
            this.options.gtreetable.actions.push({
                name: LMCApp.lang.admin.ops.relations,
                event: function (node, manager) {
                    window.location.href = theGTreeTable.options.relationURLs.model.replace('###id###',node.id);
                }
            });
        }

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
        console.log(node);
        console.log(theGTreeTable.options.nestableLevel);
        if (node.level > theGTreeTable.options.nestableLevel) {
            theGTreeTable.getLevelError();
            return {
                beforeSend: function(xhr,settings){
                    return false;
                }
            };
        }

        var type = ! node.isSaved() ? 'POST' : 'PATCH';
        return {
            url: ! node.isSaved() ? apiStoreURL : apiUpdateURL.replace('###id###',node.getId()),
            type: type,
            data: {
                parent: node.getParent(),
                name: node.getName(),
                position: node.getInsertPosition(),
                related: node.getRelatedNodeId()
            }
        };
    },

    /**
     * on delete function
     *
     * @param node
     */
    onDelete: function(node)
    {
        return {
            url: apiDestroyURL.replace('###id###',node.getId()),
            type: 'DELETE'
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
        var dl = destination.level, nl = theGTreeTable.options.nestableLevel, p = position;
        console.log(dl);
        console.log(nl);
        console.log(p);
        if (dl > nl || (dl == nl && p.search("Child") != -1)) {
            theGTreeTable.getLevelError();
            return {
                beforeSend: function(xhr,settings){
                    return false;
                }
            };
        }

        return {
            url: apiMoveURL.replace('###id###', source.getId()),
            data: {
                related: destination.getId(),
                position: position
            }
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
            data: { id: id }
        };
    },

    /**
     * get level error
     */
    getLevelError: function()
    {
        lmcApp.getNoty({
            title: LMCApp.lang.admin.flash.nestable_level_error.title,
            message: LMCApp.lang.admin.flash.nestable_level_error.message,
            type: 'error'
        });
    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: '.gtreetable',
            relationLinks: {
                category: false,
                model: false
            },
            relationURLs: {
                category: false,
                model: false
            },
            nestableLevel: 0,
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