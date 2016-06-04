/**
 * Created by Kupletsky Sergey on 05.11.14.
 *
 * Material Design Responsive Table
 * Tested on Win8.1 with browsers: Chrome 37, Firefox 32, Opera 25, IE 11, Safari 5.1.7
 * You can use this table in Bootstrap (v3) projects. Material Design Responsive Table CSS-style will override basic bootstrap style.
 * JS used only for table constructor: you don't need it in your project
 */

$(document).ready(function() {

    var table = $('#table');
    // Table bordered
    $('#table-bordered').change(function() {
        var value = $( this ).val();
        table.removeClass('table-bordered').addClass(value);
    });
	$('#table-bordered').change();
    // Table striped
    $('#table-striped').change(function() {
        var value = $( this ).val();
        table.removeClass('table-striped').addClass(value);
    });
	$('#table-striped').change();
    // Table hover
    $('#table-hover').change(function() {
        var value = $( this ).val();
        table.removeClass('table-hover').addClass(value);
    });

    // Table color
    $('#table-color').change(function() {
        var value = $(this).val();
        table.removeClass(/^table-mc-/).addClass(value);
    });
	$('#table-color').change();
});

// jQuery’s hasClass and removeClass on steroids
// by Nikita Vasilyev
// https://github.com/NV/jquery-regexp-classes
(function(removeClass) {

	jQuery.fn.removeClass = function( value ) {
		if ( value && typeof value.test === "function" ) {
			for ( var i = 0, l = this.length; i < l; i++ ) {
				var elem = this[i];
				if ( elem.nodeType === 1 && elem.className ) {
					var classNames = elem.className.split( /\s+/ );

					for ( var n = classNames.length; n--; ) {
						if ( value.test(classNames[n]) ) {
							classNames.splice(n, 1);
						}
					}
					elem.className = jQuery.trim( classNames.join(" ") );
				}
			}
		} else {
			removeClass.call(this, value);
		}
		return this;
	}

})(jQuery.fn.removeClass);


/**
 * ad agent form js code below
 **/

/*
 * Material Deesign Checkboxes non Polymer updated for use in bootstrap.
 * Tested and working in: IE9+, Chrome (Mobile + Desktop), Safari, Opera, Firefox.
 * @author Jason Mayes 2014, www.jasonmayes.com
 * @update Sergey Kupletsky 2014, www.design4net.ru
 */

var wskCheckbox = function() {
	var wskCheckboxes = [];
	var SPACE_KEY = 32;

	function addEventHandler(elem, eventType, handler) {
		if (elem.addEventListener) {
			elem.addEventListener (eventType, handler, false);
		}
		else if (elem.attachEvent) {
			elem.attachEvent ('on' + eventType, handler);
		}
	}

	function clickHandler(e) {
		e.stopPropagation();
		if (this.className.indexOf('checked') < 0) {
			this.className += ' checked';
		} else {
			this.className = 'chk-span';
		}
	}

	function keyHandler(e) {
		e.stopPropagation();
		if (e.keyCode === SPACE_KEY) {
			clickHandler.call(this, e);
			// Also update the checkbox state.

			var cbox = document.getElementById(this.parentNode.getAttribute('for'));
			cbox.checked = !cbox.checked;
		}
	}

	function clickHandlerLabel(e) {
		var id = this.getAttribute('for');
		var i = wskCheckboxes.length;
		while (i--) {
			if (wskCheckboxes[i].id === id) {
				if (wskCheckboxes[i].checkbox.className.indexOf('checked') < 0) {
					wskCheckboxes[i].checkbox.className += ' checked';
				} else {
					wskCheckboxes[i].checkbox.className = 'chk-span';
				}
				break;
			}
		}
	}

	function findCheckBoxes() {
		var labels =  document.getElementsByTagName('label');
		var i = labels.length;
		while (i--) {
			var posCheckbox = document.getElementById(labels[i].getAttribute('for'));
			if (posCheckbox !== null && posCheckbox.type === 'checkbox') {
				var text = labels[i].innerText;
				var span = document.createElement('span');
				span.className = 'chk-span';
				span.tabIndex = i;
				labels[i].insertBefore(span, labels[i].firstChild);
				addEventHandler(span, 'click', clickHandler);
				addEventHandler(span, 'keyup', keyHandler);
				addEventHandler(labels[i], 'click', clickHandlerLabel);
				wskCheckboxes.push({'checkbox': span,
					'id': labels[i].getAttribute('for')});
			}
		}
	}

	return {
		init: findCheckBoxes
	};
}();

wskCheckbox.init();


/**
 * js code for metiral button below
 * **/
// Ripple-effect animation
(function($) {
	$(".ripple-effect").click(function(e){
		var rippler = $(this);

		// create .ink element if it doesn't exist
		if(rippler.find(".ink").length == 0) {
			rippler.append("<span class='ink'></span>");
		}

		var ink = rippler.find(".ink");

		// prevent quick double clicks
		ink.removeClass("animate");

		// set .ink diametr
		if(!ink.height() && !ink.width())
		{
			var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
			ink.css({height: d, width: d});
		}

		// get click coordinates
		var x = e.pageX - rippler.offset().left - ink.width()/2;
		var y = e.pageY - rippler.offset().top - ink.height()/2;

		// set .ink position and add class .animate
		ink.css({
			top: y+'px',
			left:x+'px'
		}).addClass("animate");
	})
})(jQuery);