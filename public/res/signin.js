(function() {
	var t = function(t, o) {
			return function() {
				return t.apply(o, arguments)
			}
		},
		o = function(t, o) {
			function n() {
				this.constructor = t
			}
			for (var s in o) i.call(o, s) && (t[s] = o[s]);
			return n.prototype = o.prototype, t.prototype = new n, t.__super__ = o.prototype, t
		},
		i = {}.hasOwnProperty;
	Maleskine.SignIn = function(i) {
		function n() {
			this.chooseNation = t(this.chooseNation, this), this["switch"] = t(this["switch"], this), n.__super__.constructor.apply(this, arguments)
		}
		return o(n, i), n.prototype.elements = {
			".foreign": "foreign",
			".domestic": "domestic",
			".password": "password",
			".switch_sign_in_name": "switchButton",
			".choose_phone .dropdown-toggle": "nationDropdownButton",
			"#sign_in_country_code": "countryCodeField",
			"#sign_in_is_foreign": "isForeign"
		}, n.prototype.events = {
			"click .switch_sign_in_name": "switch",
			"click .choose_phone li": "chooseNation"
		}, n.prototype["switch"] = function() {
			return this.foreign.is(":visible") ? (this.foreign.hide(), this.domestic.show(), this.password.removeClass("mobile-verify-icon"), this.switchButton.html(I18n.t("reading.sign_in.go_to_foreign")), this.isForeign.val("false")) : (this.foreign.show(), this.domestic.hide(), this.password.addClass("mobile-verify-icon"), this.switchButton.html(I18n.t("reading.sign_in.go_to_domestic")), this.isForeign.val("true"))
		}, n.prototype.chooseNation = function(t) {
			var o, i, n;
			return o = $(t.currentTarget), i = o.data("calling-code"), n = o.data("iso-code"), this.nationDropdownButton.html("+" + i + "<span class='caret'></span>"), this.countryCodeField.val(n)
		}, n
	}(Maleskine.BaseModule)
}).call(this);