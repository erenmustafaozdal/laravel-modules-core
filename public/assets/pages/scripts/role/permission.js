;var thePermission;
var Permission = {

    /**
     * is all checked
     */
    isAllChecked: false,

    /**
     * permission object init
     */
    init: function()
    {
        thePermission = this;

        // check all
        this.checkAll();

        // all permission change
        $('#all-permission').on('click', function(event)
        {
            thePermission.changeAll();
        });

        // group permission change
        $('.group-permission').on('switchChange.bootstrapSwitch', function(event, state) {
            thePermission.changeGroup(this, state);
        });

        // item permission change
        $('.item-permission').on('switchChange.bootstrapSwitch', function(event, state) {
            if ( ! state) {
                thePermission.isAllChecked = false;
                return false;
            }
            thePermission.checkAll();
        });
    },

    /**
     * change group
     */
    changeGroup: function(element, state)
    {
        $(element).closest('.task-list').find('input[type="checkbox"].item-permission').each(function(index, element)
        {
            $(element).bootstrapSwitch('state', state, true);
        });
    },

    /**
     * change all
     */
    changeAll: function()
    {
        var state = thePermission.isAllChecked ? false : true;
        $('input[type="checkbox"].item-permission').each(function(index, element)
        {
            $(element).bootstrapSwitch('state', state, true);
        });
        $('.group-permission').each(function(index, element)
        {
            $(element).bootstrapSwitch('state', state, true);
        });
        thePermission.isAllChecked = state;
    },

    /**
     * check all
     */
    checkAll: function()
    {
        var isAllChecked = true;
        $('.item-permission').each(function(index,element)
        {
            if ( ! $(element).bootstrapSwitch('state') ) {
                isAllChecked = false;
            }
        });

        this.isAllChecked = isAllChecked;
    }

};