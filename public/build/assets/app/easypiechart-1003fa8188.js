var EasyPie = {

    /**
     * easy pie chart init
     */
    init: function(options)
    {
        if ( ! $().easyPieChart) {
            return false;
        }

        // default settings
        options = $.extend(true, this.getDefaultOptions(), options);

        $(options.src).easyPieChart(options.easyPieChart);

    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: '',
            easyPieChart: {
                animate: 1000,
                size: 75,
                lineWidth: 5,
                trackColor:	'#f2f2f2',
                scaleColor: '#dfe0e0',
                lineCap: 'round',
                barColor: function(percent) {
                    if (percent>70) return App.getBrandColor('green');
                    else if (percent>45) return App.getBrandColor('yellow');
                    else return App.getBrandColor('red');
                }
            }
        };
    }

};