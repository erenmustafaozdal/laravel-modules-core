;var ModelIndex;
var Index = {

    /**
     * options
     */
    options: {},

    init: function (options)
    {
        ModelIndex = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // init gtreetable
        GTreeTable.init(this.options);
    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            relationLinks: {
                category: false,
                model: false
            },
            relationURLs: {
                category: '#',
                model: '#'
            },
            nestableLevel: 0,
            gtreetable: {
                onSave: ModelIndex.onSave,
                onMove: ModelIndex.onMove,
                onDelete: ModelIndex.onDelete,
                actions: [
                    {
                        name: LMCApp.lang.admin.ops.edit,
                        event: function (node, manager) {
                            if (node.name.search('Sütun#') != -1) {
                                ModelIndex.getColumnError('update');
                                return false;
                            }
                            window.location.href = editURL.replace('###id###',node.id);
                        }
                    }
                ]
            }
        }
    },

    /**
     * get column error
     *
     * @param type
     */
    getColumnError: function(type)
    {
        LMCApp.getNoty({
            title: LMCApp.lang.admin.flash['column_' + type +'_error'].title,
            message: LMCApp.lang.admin.flash['column_' + type +'_error'].message,
            type: 'error'
        });
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

        if (node.isSaved() && node.name.search('Sütun#') != -1) {
            ModelIndex.getColumnError('update');
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
                title: node.getName(),
                position: node.getInsertPosition(),
                related: node.getRelatedNodeId()
            },
            complete: function (xhr,status) {
                LMCApp.hasTransaction = false;
            },
            error: function(data) {
                data = jQuery.parseJSON( data.responseText );
                if (data.hasOwnProperty("result") && data.result == 'error') {
                    ModelIndex.getColumnError('near_' + data.type);
                    return false;
                }
            }
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

        if (source.name.search('Sütun#') != -1) {
            ModelIndex.getColumnError('move');
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
            },
            complete: function (xhr,status) {
                LMCApp.hasTransaction = false;
            },
            error: function(data) {
                data = jQuery.parseJSON( data.responseText );
                if (data.hasOwnProperty("result") && data.result == 'error') {
                    ModelIndex.getColumnError('near_' + data.type);
                    return false;
                }
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
        if (node.name.search('Sütun#') != -1) {
            ModelIndex.getColumnError('destroy');
            return {
                beforeSend: function(xhr,settings){
                    return false;
                }
            };
        }

        return {
            url: apiDestroyURL.replace('###id###',node.getId()),
            type: 'DELETE'
        };
    }
};
