// Generated by CoffeeScript 1.7.1

/*
  FilmRoll (for jQuery)
  version: 0.1.8 (2/25/14)
  @requires jQuery >= v1.4

  By Noel Peden
  Examples at http://straydogstudio.github.io/film_roll

  Licensed under the MIT:
    http://www.opensource.org/licenses/mit-license.php

  Usage:
    var film_troll = new FilmRoll({container: '#container_id', OPTIONS});
 */

(function() {
  var __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  this.FilmRoll = (function() {
    function FilmRoll(options) {
      this.options = options != null ? options : {};
      this.rotateRight = __bind(this.rotateRight, this);
      this.rotateLeft = __bind(this.rotateLeft, this);
      this.resize = __bind(this.resize, this);
      this.moveRight = __bind(this.moveRight, this);
      this.moveLeft = __bind(this.moveLeft, this);
      this.clearScroll = __bind(this.clearScroll, this);
      this.configureScroll = __bind(this.configureScroll, this);
      this.configureWidths = __bind(this.configureWidths, this);
      this.configureLoad = __bind(this.configureLoad, this);
      this.configureHover = __bind(this.configureHover, this);
      if (this.options.container) {
        this.div = jQuery(this.options.container);
        if (this.div.length) {
          this.configure();
        }
      }
    }

    FilmRoll.prototype.configure = function() {
      var first_child;
      this.children = this.div.children();
      this.children.wrapAll('<div class="film_roll_wrapper"></div>');
      this.children.wrapAll('<div class="film_roll_shuttle"></div>');
      this.wrapper = this.div.find('.film_roll_wrapper');
      this.shuttle = this.div.find('.film_roll_shuttle');
      this.rotation = [];
      this.shuttle.width(this.options.shuttle_width ? parseInt(this.options.shuttle_width, 10) : 10000);
      if (this.options.start_height) {
        this.wrapper.height(parseInt(this.options.start_height, 10));
      }
      if (this.options.vertical_center) {
        this.shuttle.addClass('vertical_center');
      }
      if (!(this.options.no_css === true || document.film_roll_styles_added)) {
        jQuery("<style type='text/css'> .film_roll_wrapper{display:block;text-align:center;float:none;position:relative;top:auto;right:auto;bottom:auto;left:auto;z-index:auto;width:100%;height:100%;margin:0 !important;padding:0 !important;overflow:hidden;} .film_roll_shuttle{text-align:left;float:none;position:relative;top:0;left:0;right:auto;bottom:auto;height:100%;margin:0 !important;padding:0 !important;z-index:auto;} .film_roll_shuttle.vertical_center:before{content:'';display:inline-block;height:100%;vertical-align:middle;margin-right:-0.25em;} .film_roll_child{position:relative;display:inline-block;*display:inline;vertical-align:middle;zoom:1;} .film_roll_prev,.film_roll_next{position:absolute;top:48%;left:15px;width:40px;height:40px;margin:-20px 0 0 0;padding:0;font-size:60px;font-weight:100;line-height:30px;color:white;text-align:center;background:#222;border:3px solid white;border-radius:23px;opacity:0.5} .film_roll_prev:hover,.film_roll_next:hover{color:white;text-decoration:none;opacity:0.9} .film_roll_next{left:auto;right:15px} .film_roll_pager{text-align:center;} .film_roll_pager a{width:5px;height:5px;border:2px solid #333;border-radius:5px;display:inline-block;margin:0 5px 0 0;transition:all 1s ease} .film_roll_pager a:hover{background:#666} .film_roll_pager a.active{background:#333} .film_roll_pager span{display:none} .film_roll_pager a,a.film_roll_prev,a.film_roll_next{-webkit-box-sizing: content-box;-moz-box-sizing: content-box;box-sizing: content-box;} </style>").appendTo('head');
        document.film_roll_styles_added = true;
      }
      if (this.options.pager !== false) {
        this.pager = jQuery('<div class="film_roll_pager">');
        this.div.append(this.pager);
        this.children.each((function(_this) {
          return function(i, e) {
            var link;
            link = jQuery("<a href='#' data-id='" + e.id + "'><span>" + (i + 1) + "</span></a>");
            _this.pager.append(link);
            return link.click(function() {
              _this.index = i;
              _this.moveToIndex(_this.index, 'best', true);
              return false;
            });
          };
        })(this));
      }
      this.pager_links = this.div.find('.film_roll_pager a');
      if (this.options.hover === 'scroll') {
        this.options.scroll = false;
        this.hover_in = (function(_this) {
          return function() {
            clearTimeout(_this.hover_timer);
            return _this.hover_timer = setTimeout(function() {
              _this.moveLeft();
              return _this.configureScroll();
            }, 300);
          };
        })(this);
        this.hover_out = this.clearScroll;
      } else {
        if (this.options.hover !== false) {
          this.hover_in = (function(_this) {
            return function() {
              clearTimeout(_this.hover_timer);
              return _this.hover_timer = setTimeout(function() {
                return _this.clearScroll();
              }, 300);
            };
          })(this);
          this.hover_out = this.configureScroll;
        }
      }
      if (this.options.hover !== false) {
        this.mouse_catcher = jQuery('<div style="position:absolute; top:0; left: 0; height: 100%; width: 100%;" class="film_roll_mouse_catcher"></div>');
        this.mouse_catcher.appendTo(this.wrapper).mousemove((function(_this) {
          return function() {
            _this.hover_in();
            return _this.mouse_catcher.remove();
          };
        })(this));
      }
      first_child = null;
      this.children.each((function(_this) {
        return function(i, e) {
          var $el;
          $el = jQuery(e);
          $el.attr('data-film-roll-child-id', i);
          $el.addClass("film_roll_child");
          return _this.rotation.push(e);
        };
      })(this));
      if (this.options.prev && this.options.next) {
        this.prev = jQuery(this.options.prev);
        this.next = jQuery(this.options.next);
      } else {
        this.wrapper.append('<a class="film_roll_prev" href="#">&lsaquo;</a>');
        this.wrapper.append('<a class="film_roll_next" href="#">&rsaquo;</a>');
        this.prev = this.div.find('.film_roll_prev');
        this.next = this.div.find('.film_roll_next');
      }
      this.prev.click((function(_this) {
        return function() {
          return _this.moveRight();
        };
      })(this));
      this.next.click((function(_this) {
        return function() {
          return _this.moveLeft();
        };
      })(this));
      this.index = this.options.start_index || 0;
      this.interval = this.options.interval || 4000;
      this.animation = this.options.animation || this.interval / 4;
      this.easing = this.options.easing || 'swing';
      if (this.options.resize !== false) {
        jQuery(window).resize((function(_this) {
          return function() {
            return _this.resize();
          };
        })(this));
      }
      if (this.options.configure_load) {
        if (typeof this.options.configure_load === 'function') {
          this.options.configure_load.apply(this, arguments);
        } else {
          this.configureLoad();
        }
      } else {
        jQuery(window).load(this.configureLoad);
      }
      this.div.trigger(jQuery.Event("film_roll:dom_ready"));
      return this;
    };

    FilmRoll.prototype.bestDirection = function(child, rotation_index) {
      rotation_index || (rotation_index = jQuery.inArray(child, this.rotation));
      if (rotation_index < (this.children.length / 2)) {
        return 'right';
      } else {
        return 'left';
      }
    };

    FilmRoll.prototype.configureHover = function() {
      this.div.hover(this.hover_in, this.hover_out);
      if (this.options.prev && this.options.next) {
        this.prev.hover(this.hover_in, this.hover_out);
        return this.next.hover(this.hover_in, this.hover_out);
      }
    };

    FilmRoll.prototype.configureLoad = function() {
      this.configureWidths();
      this.moveToIndex(this.index, 'right', true);
      if (this.options.hover === 'scroll') {
        this.options.scroll = false;
        return this.configureHover();
      } else if (this.options.scroll !== false) {
        this.configureScroll();
        if (this.options.hover !== false) {
          return this.configureHover();
        }
      }
    };

    FilmRoll.prototype.configureWidths = function() {
      var min_height;
      this.width = min_height = 0;
      this.wrapper.css({
        height: '',
        'min-height': 0
      });
      this.shuttle.width('').removeClass('film_roll_shuttle').addClass('film_roll_resizing');
      this.children.width('');
      this.div.trigger(jQuery.Event("film_roll:resizing"));
      this.children.each((function(_this) {
        return function(i, e) {
          var $el, el_height, el_width;
          $el = jQuery(e);
          el_width = $el.outerWidth(true);
          $el.width(el_width);
          _this.width += el_width;
          if (!_this.options.height) {
            el_height = $el.outerHeight(true);
            if (el_height > min_height) {
              min_height = el_height;
            }
          }
          return e;
        };
      })(this));
      if (this.options.height) {
        this.wrapper.height(this.options.height);
      } else {
        this.wrapper.height('');
        this.wrapper.css('min-height', min_height);
      }
      this.real_width = this.width;
      this.shuttle.width(this.real_width * 2).removeClass('film_roll_resizing').addClass('film_roll_shuttle');
      return this;
    };

    FilmRoll.prototype.configureScroll = function() {
      if (this.scrolled !== true) {
        this.timer = setInterval((function(_this) {
          return function() {
            return _this.moveLeft();
          };
        })(this), this.interval);
        this.scrolled = true;
      }
      return this;
    };

    FilmRoll.prototype.clearScroll = function() {
      if (this.scrolled !== false) {
        clearInterval(this.timer);
        this.scrolled = false;
      }
      return this;
    };

    FilmRoll.prototype.marginLeft = function(rotation_index, offset) {
      var child, i, margin, _i, _len, _ref;
      if (offset == null) {
        offset = 0;
      }
      margin = 0;
      _ref = this.rotation;
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        child = _ref[i];
        if (i < rotation_index && i >= offset) {
          margin += jQuery(child).outerWidth(true);
        }
      }
      return margin;
    };

    FilmRoll.prototype.marginRight = function(rotation_index, offset) {
      var child, i, margin, _i, _len, _ref;
      if (offset == null) {
        offset = 0;
      }
      offset = this.rotation.length - offset - 1;
      margin = 0;
      _ref = this.rotation;
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        child = _ref[i];
        if (i > rotation_index && i <= offset) {
          margin += jQuery(child).outerWidth(true);
        }
      }
      return margin;
    };

    FilmRoll.prototype.moveLeft = function() {
      this.index = (this.index + 1) % this.children.length;
      this.moveToIndex(this.index, 'left', true);
      return false;
    };

    FilmRoll.prototype.moveRight = function() {
      this.index -= 1;
      if (this.index < 0) {
        this.index = this.children.length - 1;
      }
      this.moveToIndex(this.index, 'right', true);
      return false;
    };

    FilmRoll.prototype.moveToChild = function(element) {
      var child_index;
      child_index = jQuery.inArray(jQuery(element)[0], this.children);
      if (child_index > -1) {
        return this.moveToIndex(child_index);
      }
    };

    FilmRoll.prototype.moveToIndex = function(index, direction, animate) {
      var child, direction_class, new_left_margin, rotation_index, scrolled, visible_margin, wrapper_width;
      if (animate == null) {
        animate = true;
      }
      this.index = index;
      scrolled = this.scrolled;
      this.clearScroll();
      child = this.children[index];
      rotation_index = jQuery.inArray(child, this.rotation);
      if (!direction || direction === 'best') {
        direction = this.bestDirection(child, rotation_index);
      }
      this.children.removeClass('active');
      jQuery(child).addClass('active').trigger(jQuery.Event("film_roll:activate"));
      this.pager_links.removeClass('active');
      jQuery(this.pager_links[index]).addClass('active');
      wrapper_width = this.wrapper.width();
      if (wrapper_width < this.real_width) {
        visible_margin = (wrapper_width - jQuery(child).outerWidth(true)) / 2;
        if (direction === 'right') {
          while (rotation_index === 0 || this.marginLeft(rotation_index) < visible_margin) {
            this.rotateRight();
            rotation_index = jQuery.inArray(child, this.rotation);
          }
        } else {
          while (rotation_index === this.children.length - 1 || this.marginRight(rotation_index) < visible_margin) {
            this.rotateLeft();
            rotation_index = jQuery.inArray(child, this.rotation);
          }
        }
        new_left_margin = -1 * (this.marginLeft(rotation_index) - visible_margin);
        if (animate) {
          direction_class = "moving_" + direction;
          this.shuttle.addClass(direction_class);
          this.div.trigger(jQuery.Event("film_roll:moving"));
          this.shuttle.stop().animate({
            'left': new_left_margin
          }, this.animation, this.easing, (function(_this) {
            return function() {
              _this.shuttle.removeClass(direction_class);
              return _this.div.trigger(jQuery.Event("film_roll:moved"));
            };
          })(this));
        } else {
          this.shuttle.css('left', new_left_margin);
          this.div.trigger(jQuery.Event("film_roll:moved"));
        }
      } else {
        this.shuttle.css('left', (wrapper_width - this.width) / 2);
      }
      if (scrolled) {
        this.configureScroll();
      }
      return this;
    };

    FilmRoll.prototype.resize = function() {
      clearTimeout(this.resize_timer);
      this.resize_timer = setTimeout((function(_this) {
        return function() {
          var scrolled;
          scrolled = _this.scrolled;
          _this.clearScroll();
          if (scrolled) {
            _this.configureScroll();
          }
          _this.configureWidths();
          _this.moveToIndex(_this.index, 'best');
          return _this.div.trigger(jQuery.Event("film_roll:resized"));
        };
      })(this), 200);
      return this;
    };

    FilmRoll.prototype.rotateLeft = function() {
      var _css_left, _first_child, _shuttle_left;
      _css_left = this.shuttle.css('left');
      _shuttle_left = _css_left ? parseInt(_css_left, 10) : 0;
      _first_child = this.rotation.shift();
      this.rotation.push(_first_child);
      this.shuttle.css('left', _shuttle_left + jQuery(_first_child).outerWidth(true));
      return this.shuttle.append(this.shuttle.children().first().detach());
    };

    FilmRoll.prototype.rotateRight = function() {
      var _css_left, _last_child, _shuttle_left;
      _css_left = this.shuttle.css('left');
      _shuttle_left = _css_left ? parseInt(_css_left, 10) : 0;
      _last_child = this.rotation.pop();
      this.rotation.unshift(_last_child);
      this.shuttle.css('left', _shuttle_left - jQuery(_last_child).outerWidth(true));
      return this.shuttle.prepend(this.shuttle.children().last().detach());
    };

    return FilmRoll;

  })();

}).call(this);
