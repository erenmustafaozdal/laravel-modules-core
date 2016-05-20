var Datatables = {
    /**
     * element css name
     *
     * @var Jquery Element | null
     */
    element : null,

    /**
     * set element
     *
     * @param string elem
     * @return this
     */
    setElement : function(elem)
    {
        this.element = $(elem);
        return this;
    },

    /**
     * get element
     *
     * @return Jquery Element
     */
    getElement : function()
    {
        return this.element;
    },

    /**
     * init jquery datatables
     *
     * @return this
     */
    init : function()
    {
        this.getElement().DataTable();
    }
};