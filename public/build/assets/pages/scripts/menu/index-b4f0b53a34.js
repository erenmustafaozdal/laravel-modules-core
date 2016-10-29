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
                onSave: ModelIndex.onSave
            }
        }
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
                title: node.getName(),
                position: node.getInsertPosition(),
                related: node.getRelatedNodeId()
            }
        };
    },
};
