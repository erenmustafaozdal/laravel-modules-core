!function(a){a.baseClass=function(b){return b=a(b),b.get(0).className.match(/([^ ]+)/)[1]},a.fn.addDependClass=function(b,c){var d={delimiter:c?c:"-"};return this.each(function(){var c=a.baseClass(this);c&&a(this).addClass(c+d.delimiter+b)})},a.fn.removeDependClass=function(b,c){var d={delimiter:c?c:"-"};return this.each(function(){var c=a.baseClass(this);c&&a(this).removeClass(c+d.delimiter+b)})},a.fn.toggleDependClass=function(b,c){var d={delimiter:c?c:"-"};return this.each(function(){var c=a.baseClass(this);c&&(a(this).is("."+c+d.delimiter+b)?a(this).removeClass(c+d.delimiter+b):a(this).addClass(c+d.delimiter+b))})}}(jQuery);