var zoomView = (function($) {
	var SELECTOR = '*[data-zoomview-src]';

	// Defaults
	var defaults = {
		disableIfTouchDevice: true,
		uniqueSourcesOnly: false,
		padding: 50,
		closeText: ''
	};

	// Item
	function Item(el, index) {
		this.$el = $(el);
		this.src = this.$el.data('zoomview-src');
		this.srcArr = this.$el.data('zoomview-src').split(', ');
		this.caption = this.$el.data('zoomview-caption') || "";
		this.isLoaded = false;
	}

	Item.prototype.load = function() {
		if (this.isLoaded) {
			this.setStyle();
		} else {
			this.$img = $('<img style="display: none" />');
			this.$img.attr('src', this.srcArr[0]);

			// set style
			if (this.$img.get(0).complete) {
				this.setStyle();
			} else {
				this.$img
					.on('load', this.setStyle.bind(this));
			}

			// if second highres src exist
			if (this.srcArr.length > 1) {
				$('body').addClass('zoomview-loading');
				$('<img />')
					.attr('src', this.srcArr[1])
					.on('load', function(e) {
						this.$img.attr('src', $(e.target).attr('src'));
						$(e.target).remove();
						$('body').removeClass('zoomview-loading');
					}.bind(this));
			}
		}
	};

	Item.prototype.setStyle = function() {
		var $window = $(window);
		var doublePadding = defaults.padding * 2;
		var windowWidth = $window.width();
		var windowHeight = $window.height();
		var windowRatio = (windowWidth - doublePadding) / (windowHeight - doublePadding);
		var imageRatio = this.$img.prop('naturalWidth') / this.$img.prop('naturalHeight');

		this.$img.css({
			width: imageRatio < windowRatio ? 'auto' : (windowWidth - doublePadding),
			height: imageRatio > windowRatio ? 'auto' : (windowHeight - doublePadding),
			// padding: defaults.padding,
			display: 'block'
		});
	};

	// View
	function View(el) {
		this.init(el);
	}

	View.prototype.init = function(el) {
		var $el = $(el);

		// Use a timestamp as namespace
		this.namespace = +new Date();

		// Find related elements within the set scope
		var set = $el.data('zoomview-set');
		this.$els = $(SELECTOR).filter(function(index, el) {
			return $(el).data('zoomview-set') === set;
		});

		// Remove the old click event
		// and attach a new one bound 
		// to this view instance
		this.$els
			.off('click.zoomview')
			.on('click.' + this.namespace, this.itemClickHandler.bind(this));

		// Remove duplicate elements by src
		if (defaults.uniqueSourcesOnly) {
			var sources = [];
			this.$els = this.$els.filter(function() {
				var src = $(this).data('zoomview-src');
				if (sources.indexOf(src) !== -1) {
					return false;
				} else {
					sources.push(src);
					return true;
				}
			});
		}

		// Create items
		this.items = this.$els.map(function(index, el) {
			return new Item(el);
		}).get();

		// Open and go to the index of the initializing element
		this.open();
		this.goto(this.getItemIndexByEl($el));
	};

	View.prototype.open = function() {
		this.isOpen = true;

		console.log('open');

		var $body = $('body');

		// Create elements
		this.$overlay = $('<div class="zoomview__overlay" />')
			.on('click', this.overlayClickHandler.bind(this))
			.appendTo($body);

		this.$caption = $('<div class="zoomview__caption" />')
			.appendTo($body);

		this.$close = $('<div class="zoomview__close" />')
			.text(defaults.closeText)
			.on('click', this.closeClickHandler.bind(this))
			.appendTo($body);

		if (this.items.length > 1) {
			this.$next = $('<div class="zoomview__next" />')
				.on('click', this.nextClickHandler.bind(this))
				.appendTo($body);

			this.$prev = $('<div class="zoomview__prev" />')
				.on('click', this.prevClickHandler.bind(this))
				.appendTo($body);
		}

		// Attach events
		$(window)
			.on('keydown.' + this.namespace, this.windowKeyDownHandler.bind(this))
			.on('resize.' + this.namespace, this.windowResizeHandler.bind(this));

		// $body.addClass('zoomview-open');
	};
	
	View.prototype.close = function() {
		// Remove elements
		this.$overlay.remove();
		this.$caption.remove();
		this.$close.remove();

		if (this.items.length > 1) {
			this.$prev.remove();
			this.$next.remove();
		}

		// Detach events
		$(window)
			.off('keydown.' + this.namespace)
			.off('resize.' + this.namespace);

		$('body').removeClass('zoomview-open');

		this.isOpen = false;
	};

	View.prototype.next = function() {
		this.goto(this.getNextItemIndex());
	};

	View.prototype.prev = function() {
		this.goto(this.getPrevItemIndex());
	};
	
	View.prototype.goto = function(index) {
		this.currentItemIndex = index;

		// load current item and its neighbours
		this.items[this.currentItemIndex].load();
		this.items[this.getNextItemIndex()].load();
		this.items[this.getPrevItemIndex()].load();
		
		// insert item and update caption
		this.$overlay.html(this.items[this.currentItemIndex].$img);
		//this.$caption.html(this.items[this.currentItemIndex].caption);

		var caption = this.items[this.currentItemIndex].caption;
		caption += this.currentItemIndex + 1 + '/' + this.items.length;
		this.$caption.html('Bild ' + caption);
	};

	View.prototype.getNextItemIndex = function() {
		var index = this.currentItemIndex + 1;

		if (index > this.items.length - 1) {
			index = 0;
		}

		return index;
	};

	View.prototype.getPrevItemIndex = function() {
		var index = this.currentItemIndex - 1;

		if (index < 0) {
			index = this.items.length - 1;
		}

		return index;
	};

	View.prototype.getItemIndexByEl = function($el) {
		var index = null;
		var src = $el.data('zoomview-src');

		this.items.forEach(function(item, _index) {
			if (item.src === src) {
				index = _index;
			}
		});

		return index;
	};

	View.prototype.itemClickHandler = function(e) {
		var $el = $(e.currentTarget);
		var index = this.getItemIndexByEl($el);

		if (!this.isOpen) {
			this.open();
		}

		this.goto(index);
	};

	View.prototype.overlayClickHandler = function(e) {
		this.close();
	};

	View.prototype.nextClickHandler = function(e) {
		this.next();
	};

	View.prototype.prevClickHandler = function(e) {
		this.prev();
	};

	View.prototype.closeClickHandler = function(e) {
		this.close();
	};

	View.prototype.windowKeyDownHandler = function(e) {
		var actions = {
			27: 'close',
			37: 'prev',
			39: 'next'
		};

		if (typeof this[actions[e.keyCode]] === 'function') {
			this[actions[e.keyCode]].apply(this);
		}
	};

	View.prototype.windowResizeHandler = function(e) {
		var item = this.items[this.currentItemIndex];

		item.setStyle();
	};

	// Init
	return function(options) {
		defaults = $.extend(true, {}, defaults, options);

		// Exit
		if (defaults.disableIfTouchDevice && ("ontouchstart" in window || navigator.maxTouchPoints)) {
			return;
		}

		$(SELECTOR).on('click.zoomview', function(e) {
			var view = new View(e.currentTarget);
		});
	};
})(jQuery);