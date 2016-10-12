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

        if (options.hasOwnProperty("gtreetable") && options.gtreetable.hasOwnProperty("actions") && this.options.gtreetable.actions.length != options.gtreetable.actions.length) {
            this.options.gtreetable['actions'] = options.gtreetable.actions;
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
        if (theGTreeTable.options.nestableLevel != 0 && node.level > theGTreeTable.options.nestableLevel) {
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
        if ( nl != 0 && ( dl > nl || (dl == nl && p.search("Child") != -1) ) ) {
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
                cache: 1,
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
                    default: 'glyphicon glyphicon-file',
                    file: 'glyphicon glyphicon-file',
                    folder: 'glyphicon glyphicon-folder-open'
                },
                templateParts: {
                    draggableIcon: '<span class="node-icon-handle">&zwnj;</span><span class="node-draggable-pointer">&zwnj;</span>',
                    indent: '<span class="node-indent">&zwnj;</span>',
                    ecIcon: '<span class="node-icon-ce icon"></span>',
                    selectedIcon: '<span class="node-icon-selected icon"></span>',
                    typeIcon: '<span class="node-icon-type"></span>',
                    name: '<span class="node-name"></span>',
                    input: '<input type="text" name="name" value="" style="width: 60%" class="form-control form-control-solid placeholder-no-fix" />',
                    saveButton: '<button type="button" class="btn btn-sm blue btn-outline node-save"> Kaydet </button>',
                    cancelButton: '<button type="button" class="btn btn-sm red btn-outline node-cancel"> Vazgeç </button>',
                    actionsButton: '<button type="button" class="btn btn-sm dark btn-outline dropdown-toggle" data-toggle="dropdown"> İşlem <span class="caret"></span></button>',
                    actionsList: ''
                }
            }
        };
    }
};