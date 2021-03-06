(function (a, b) {
    a.widget("scrollbar.scrollbar", {
        options: {
            classes: "",
            wheel: 40,
            scroll: true,
            overlay: true,
            autohide: true,
            animate: {
                duration: 300,
                easing: "swing"
            }
        },
        _create: function () {
            this.settings = {
                viewport: {},
                overview: {},
                scrollbarX: {
                    thumb: {},
                    track: {}
                },
                scrollbarY: {
                    thumb: {},
                    track: {}
                },
                move: {
                    axis: null,
                    mouse: {},
                    position: {}
                }
            };
            this._wrapInContainer();
            this.refresh();
            this._attachEvents()
        },
        _wrapInContainer: function () {
            this._id = a[b].count++;
            this._overflowX = this.element.css("overflow-x");
            this._overflowY = this.element.css("overflow-y");
            this._scrollX = this._overflowX in {
                auto: 1,
                scroll: 1
            } ? true : false;
            this._scrollY = this._overflowY in {
                auto: 1,
                scroll: 1
            } ? true : false;
            this._outerHeight = this.element.outerHeight();
            this._outerWidth = this.element.outerWidth();
            this.$overview = this.element.addClass("ui-scrollbar-overview");
            this.$container = a("<div class='ui-scrollbar ui-scrollbar-default " + this.options.classes + "' id='scrollbar-" + this._id + "' />").toggleClass("ui-scrollbar-overlay", this.options.overlay);
            this.$viewport = a("<div class='ui-scrollbar-viewport' />");
            this.$scrollbarX = a("<div class='ui-scrollbar-scrollbarX'><div class='ui-scrollbar-track'><div class='ui-scrollbar-thumb'></div></div></div>");
            this.$scrollbarY = a("<div class='ui-scrollbar-scrollbarY'><div class='ui-scrollbar-track'><div class='ui-scrollbar-thumb'></div></div></div>");
            this.$overview.after(this.$container);
            this.$overview.remove();
            this.$container.append(this.$viewport);
            this.$viewport.append(this.$overview);
            if (this._scrollY) {
                this.$container.append(this.$scrollbarY)
            }
            if (this._scrollX) {
                this.$container.append(this.$scrollbarX)
            }
            this._trackXWidth = this.$scrollbarX.find(".ui-scrollbar-track").width();
            this._trackYHeight = this.$scrollbarY.find(".ui-scrollbar-track").height();
            this._thumbXWidth = this.$scrollbarX.find(".ui-scrollbar-thumb").width();
            this._thumbYHeight = this.$scrollbarY.find(".ui-scrollbar-thumb").height()
        },
        _setSize: function () {
            if (this._scrollY) {
                this.$overview.css("top", -this.settings.scrollbarY.pos);
                this.$scrollbarY.css("height", this.settings.scrollbarY.track.height);
                this.$scrollbarY.find(".ui-scrollbar-track").css("height", this.settings.scrollbarY.track.height);
                
                this.$scrollbarY.find(".ui-scrollbar-thumb").css({
                    top: this.settings.scrollbarY.pos / this.settings.scrollbarY.ratio,
                    height: this.settings.scrollbarY.thumb.height
                })
            }
            if (this._scrollX) {
                this.$overview.css("left", -this.settings.scrollbarX.pos);
                this.$scrollbarX.css("width", this.settings.scrollbarX.track.width);
                this.$scrollbarX.find(".ui-scrollbar-track").css("width", this.settings.scrollbarX.track.width);
                this.$scrollbarX.find(".ui-scrollbar-thumb").css({
                    left: this.settings.scrollbarX.pos / this.settings.scrollbarX.ratio,
                    width: this.settings.scrollbarX.thumb.width
                })
            }
        },
        _attachEvents: function () {
            if (this._scrollY) {
                this.$scrollbarY.find(".ui-scrollbar-thumb").bind("mousedown", {
                    axis: "y",
                    obj: this
                }, this._onStart);
                this.$scrollbarY.find(".ui-scrollbar-track").bind("mouseup", {
                    axis: "y",
                    obj: this
                }, this._onDrag);
                if (this.options.scroll) {
                    this.$container.bind("DOMMouseScroll mousewheel", {
                        axis: "y",
                        obj: this
                    }, this._onWheel)
                }
            }
            if (this._scrollX) {
                this.$scrollbarX.find(".ui-scrollbar-thumb").bind("mousedown", {
                    axis: "x",
                    obj: this
                }, this._onStart);
                this.$scrollbarX.find(".ui-scrollbar-track").bind("mouseup", {
                    axis: "x",
                    obj: this
                }, this._onDrag);
                if (this.options.scroll) {
                    this.$container.bind("DOMMouseScroll mousewheel", {
                        axis: "x",
                        obj: this
                    }, this._onWheel)
                }
            }
        },
        _onStart: function (b) {
            var c = b.data.obj;
            c.settings.move.axis = b.data.axis;
            if (c.settings.move.axis == "y") {
                c.settings.move.mouse.start = b.pageY;
                var d = parseInt(c.$scrollbarY.find(".ui-scrollbar-thumb").css("top"));
                c.settings.move.position.start = d == "auto" ? 0 : d;
                a(document).bind("mousemove touchmove", {
                    axis: "y",
                    obj: c
                }, c._onDrag);
                a(document).bind("mouseup touchend", {
                    axis: "y",
                    obj: c
                }, c._onEnd);
                c.$scrollbarY.find(".ui-scrollbar-thumb").bind("mouseup touchend", {
                    axis: "y",
                    obj: c
                }, c._onEnd)
            }
            if (c.settings.move.axis == "x") {
                c.settings.move.mouse.start = b.pageX;
                var e = parseInt(c.$scrollbarX.find(".ui-scrollbar-thumb").css("left"));
                c.settings.move.position.start = e == "auto" ? 0 : e;
                a(document).bind("mousemove touchmove", {
                    axis: "x",
                    obj: c
                }, c._onDrag);
                a(document).bind("mouseup touchend", {
                    axis: "x",
                    obj: c
                }, c._onEnd);
                c.$scrollbarX.find(".ui-scrollbar-thumb").bind("mouseup touchend", {
                    axis: "x",
                    obj: c
                }, c._onEnd)
            }
            return false
        },
        _onEnd: function (b) {
            var c = b.data.obj;
            if (c.settings.move.axis == "y") {
                a(document).unbind("mousemove touchmove", c._onDrag);
                a(document).unbind("mouseup touchend", c._onEnd);
                c.$scrollbarY.find(".ui-scrollbar-thumb").unbind("mouseup touchend", c._onEnd)
            }
            if (c.settings.move.axis == "x") {
                a(document).unbind("mousemove touchmove", c._onDrag);
                a(document).unbind("mouseup touchend", c._onEnd);
                c.$scrollbarX.find(".ui-scrollbar-thumb").unbind("mouseup touchend", c._onEnd)
            }
            return false
        },
        _onDrag: function (a) {
            var b = a.data.obj;
            if (!b.settings.move.axis) b.settings.move.axis = a.data.axis;
            if (b.settings.move.axis == "y") {
                if (!(b.settings.overview.ratioY >= 1)) {
                    b.settings.move.position.current = Math.min(b.settings.scrollbarY.track.height - b.settings.scrollbarY.thumb.height, Math.max(0, b.settings.move.position.start + (a.pageY - b.settings.move.mouse.start)));
                    b.settings.scrollbarY.pos = b.settings.move.position.current * b.settings.scrollbarY.ratio;
                    b.$overview.css("top", -b.settings.scrollbarY.pos);
                    b.$scrollbarY.find(".ui-scrollbar-thumb").css("top", b.settings.move.position.current)
                }
            }
            if (b.settings.move.axis == "x") {
                if (!(b.settings.overview.ratioX >= 1)) {
                    b.settings.move.position.current = Math.min(b.settings.scrollbarX.track.width - b.settings.scrollbarX.thumb.width, Math.max(0, b.settings.move.position.start + (a.pageX - b.settings.move.mouse.start)));
                    b.settings.scrollbarX.pos = b.settings.move.position.current * b.settings.scrollbarX.ratio;
                    b.$overview.css("left", -b.settings.scrollbarX.pos);
                    b.$scrollbarX.find(".ui-scrollbar-thumb").css("left", b.settings.move.position.current)
                }
            }
            return false
        },
        _onWheel: function (b) {
            var c = b.data.obj;
            if (b.originalEvent.wheelDeltaX) c.settings.move.axis = "x";
            else if (b.originalEvent.wheelDeltaY) c.settings.move.axis = "y";
            else if (!c.settings.move.axis) c.settings.move.axis = b.data.axis;
            if (c.settings.move.axis == "y") {
                if (!(c.settings.overview.ratioY >= 1)) {
                    b = a.event.fix(b || window.event);
                    var d = b.wheelDelta ? b.wheelDelta / 120 : -b.detail / 3;
                    c.settings.scrollbarY.pos -= d * c.options.wheel;
                    c.settings.scrollbarY.pos = Math.min(c.settings.overview.height - c.settings.viewport.height, Math.max(0, c.settings.scrollbarY.pos));
                    if (c.options.animate) {
                        c.$scrollbarY.find(".ui-scrollbar-thumb").stop().animate({
                            top: c.settings.scrollbarY.pos / c.settings.scrollbarY.ratio
                        }, c.options.animate.duration, c.options.animate.easing);
                        c.$overview.stop().animate({
                            top: -c.settings.scrollbarY.pos
                        }, c.options.animate.duration, c.options.animate.easing)
                    } else {
                        c.$scrollbarY.find(".ui-scrollbar-thumb").css("top", c.settings.scrollbarY.pos / c.settings.scrollbarY.ratio);
                        c.$overview.css("top", -c.settings.scrollbarY.pos)
                    } if (c.settings.scrollbarY.pos > 0 && c.settings.scrollbarY.pos < c.settings.overview.height - c.settings.viewport.height) b.preventDefault()
                }
            }
            if (c.settings.move.axis == "x") {
                if (!(c.settings.overview.ratioX >= 1)) {
                    b = a.event.fix(b || window.event);
                    var d = b.wheelDelta ? b.wheelDelta / 120 : -b.detail / 3;
                    c.settings.scrollbarX.pos -= d * c.options.wheel;
                    c.settings.scrollbarX.pos = Math.min(c.settings.overview.width - c.settings.viewport.width, Math.max(0, c.settings.scrollbarX.pos));
                    if (c.options.animate) {
                        c.$scrollbarX.find(".ui-scrollbar-thumb").stop().animate({
                            left: c.settings.scrollbarX.pos / c.settings.scrollbarX.ratio
                        }, c.options.animate.duration, c.options.animate.easing);
                        c.$overview.stop().animate({
                            left: -c.settings.scrollbarX.pos
                        }, c.options.animate.duration, c.options.animate.easing)
                    } else {
                        c.$scrollbarX.find(".ui-scrollbar-thumb").css("left", c.settings.scrollbarX.pos / c.settings.scrollbarX.ratio);
                        c.$overview.css("left", -c.settings.scrollbarX.pos)
                    } if (c.settings.scrollbarX.pos > 0 && c.settings.scrollbarX.pos < c.settings.overview.width - c.settings.viewport.width) b.preventDefault()
                }
            }
        },
        _scrollTo: function (a, b) {
            a = a || typeof a == "number" ? a : null;
            b = b || typeof b == "number" ? b : null;
            if (a || a === 0) {
                var c = Math.min(this.settings.scrollbarY.track.height - this.settings.scrollbarY.thumb.height, Math.max(0, a / this.settings.scrollbarY.ratio));
                this.settings.scrollbarY.pos = c * this.settings.scrollbarY.ratio;
                this.$overview.css("top", -this.settings.scrollbarY.pos);
                this.$scrollbarY.find(".ui-scrollbar-thumb").css("top", c)
            }
            if (b || b === 0) {
                var d = Math.min(this.settings.scrollbarX.track.width - this.settings.scrollbarX.thumb.width, Math.max(0, b / this.settings.scrollbarX.ratio));
                this.settings.scrollbarX.pos = d * this.settings.scrollbarX.ratio;
                this.$overview.css("left", -this.settings.scrollbarX.pos);
                this.$scrollbarX.find(".ui-scrollbar-thumb").css("left", d)
            }
        },
        refresh: function (a, b) {
            this.$container.width(this._outerWidth);
            this.$container.height(this._outerHeight);
            this.$viewport.width(this.options.overlay ? this._outerWidth : this._outerWidth - this.$scrollbarY.outerWidth());
            this.$viewport.height(this.options.overlay ? this._outerHeight : this._outerHeight - this.$scrollbarX.outerHeight());
            if (this._scrollY) {
                this.$overview.css({
                    height: "auto"
                });
                this.settings.viewport.height = this.$viewport.outerHeight();
                this.settings.overview.height = this.$overview.outerHeight();
                if (this._scrollX) {
                    this.$overview.css({
                        width: "auto"
                    });
                    this.settings.viewport.width = this.$viewport.outerWidth();
                    this.settings.overview.width = this.$overview.outerWidth();
                    this.settings.overview.ratioX = this.settings.viewport.width / this.settings.overview.width
                }
                this.settings.overview.ratioY = this.settings.viewport.height / this.settings.overview.height;
                this.settings.scrollbarY.offsetHeight = this.$scrollbarY.outerHeight() - this.$scrollbarY.height();
                this.settings.scrollbarY.track.height = this._trackYHeight == 0 ? this.settings.viewport.height - this.settings.scrollbarY.offsetHeight - (this._scrollX && this.options.overlay && this.settings.overview.ratioX < 1 ? this.$scrollbarX.outerHeight() : 0) : this.$scrollbarY.find(".ui-scrollbar-track").height();
                this.settings.scrollbarY.thumb.height = this._thumbYHeight == 0 ? Math.min(this.settings.scrollbarY.track.height, Math.max(0, this.settings.scrollbarY.track.height * this.settings.overview.ratioY)) : this.$scrollbarY.find(".ui-scrollbar-thumb").height();
                this.settings.scrollbarY.ratio = (this.settings.overview.height - this._trackYHeight) / this.settings.scrollbarY.track.height;
                this.settings.scrollbarY.pos = 0;
                this.$scrollbarY.toggleClass("disabled ui-scrollbar-disabled", this.settings.overview.ratioY >= 1)
            }
            if (this._scrollX) {
                this.$overview.css({
                    width: "auto"
                });
                this.settings.viewport.width = this.$viewport.outerWidth();
                this.settings.overview.width = this.$overview.outerWidth();
                if (this._scrollY && !this.settings.overview.ratioY) {
                    this.$overview.css({
                        height: "auto"
                    });
                    this.settings.viewport.height = this.$viewport.outerHeight();
                    this.settings.overview.height = this.$overview.outerHeight();
                    this.settings.overview.ratioY = this.settings.viewport.height / this.settings.overview.height
                }
                this.settings.overview.ratioX = this.settings.viewport.width / this.settings.overview.width;
                this.settings.scrollbarX.offsetWidth = this.$scrollbarX.outerWidth() - this.$scrollbarX.width();
                this.settings.scrollbarX.track.width = this._trackXWidth == 0 ? this.settings.viewport.width - this.settings.scrollbarX.offsetWidth - (this._scrollY && this.options.overlay && this.settings.overview.ratioY < 1 ? this.$scrollbarY.outerWidth() : 0) : this.$scrollbarX.find(".ui-scrollbar-track").width();
                this.settings.scrollbarX.thumb.width = this._thumbXWidth == 0 ? Math.min(this.settings.scrollbarX.track.width, Math.max(0, this.settings.scrollbarX.track.width * this.settings.overview.ratioX)) : this.$scrollbarX.find(".ui-scrollbar-thumb").width();
                this.settings.scrollbarX.ratio = (this.settings.overview.width - this._trackXWidth) / this.settings.scrollbarX.track.width;
                this.settings.scrollbarX.pos = 0;
                this.$scrollbarX.toggleClass("disabled ui-scrollbar-disabled", this.settings.overview.ratioX >= 1)
            }
            this._setSize();
            if (this.options.autohide) {
                this.$container.unbind("mouseenter touchstart mouseleave touchend");
                if (this._scrollY && !this.$scrollbarY.hasClass("ui-scrollbar-disabled")) {
                    this.$scrollbarY.hide();
                    var c = this.$scrollbarY;
                    this.$container.bind("mouseenter touchstart", function () {
                        c.stop(true, true).fadeIn(400)
                    }).bind("mouseleave touchend", function () {
                        c.stop(true, true).delay(500).fadeOut(600)
                    })
                }
                if (this._scrollX && !this.$scrollbarX.hasClass("ui-scrollbar-disabled")) {
                    this.$scrollbarX.hide();
                    var d = this.$scrollbarX;
                    this.$container.hover(function () {
                        d.stop(true, true).fadeIn(400)
                    }, function () {
                        d.stop(true, true).delay(500).fadeOut(600)
                    })
                }
            }
            if (b || typeof b == "number" || a || typeof a == "number") this.scrollTo(b, a)
        },
        scrollTo: function (a, b) {
            switch (typeof a) {
            case "number":
                this._scrollTo(a, b);
                break;
            case "string":
                var c = this.$overview.find(a);
                if (!c.length) return false;
                var d = c.first().position();
                this._scrollTo(d.top, d.left);
                break;
            case "object":
                var c = this.$overview.find(a[0]);
                if (!c.length) return false;
                var d = c.first().position();
                this._scrollTo(d.top, d.left);
                break
            }
        }
    });
    a[b].count = 0
})(jQuery, "scrollbar")