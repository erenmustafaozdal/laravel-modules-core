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
            nestableLevel: 0
        }
    }
};
