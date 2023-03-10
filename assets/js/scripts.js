!(function (e, t) {
	'object' == typeof exports && 'object' == typeof module
		? (module.exports = t())
		: 'function' == typeof define && define.amd
		? define([], t)
		: 'object' == typeof exports
		? (exports.mizScripts = t())
		: (e.mizScripts = t())
})(self, function () {
	return (function () {
		var e = {
				462: function (e) {
					e.exports = {
						detect: (e, t, n) => {
							const o = (r) => {
								e.contains(r.target)
									? t.contains(r.target) && document.removeEventListener('click', o, !0)
									: (document.removeEventListener('click', o, !0), n())
							}
							document.addEventListener('click', o, !0)
						},
					}
				},
			},
			t = {}
		function n(o) {
			var r = t[o]
			if (void 0 !== r) return r.exports
			var c = (t[o] = { exports: {} })
			return e[o](c, c.exports, n), c.exports
		}
		;(n.d = function (e, t) {
			for (var o in t)
				n.o(t, o) && !n.o(e, o) && Object.defineProperty(e, o, { enumerable: !0, get: t[o] })
		}),
			(n.o = function (e, t) {
				return Object.prototype.hasOwnProperty.call(e, t)
			}),
			(n.r = function (e) {
				'undefined' != typeof Symbol &&
					Symbol.toStringTag &&
					Object.defineProperty(e, Symbol.toStringTag, { value: 'Module' }),
					Object.defineProperty(e, '__esModule', { value: !0 })
			})
		var o = {}
		return (
			(function () {
				'use strict'
				n.r(o),
					n.d(o, {
						Dropdown: function () {
							return e
						},
						Expand: function () {
							return t
						},
					})
				var e = {}
				n.r(e),
					n.d(e, {
						default: function () {
							return a
						},
					})
				var t = {}
				n.r(t),
					n.d(t, {
						default: function () {
							return u
						},
					})
				var r = n(462)
				const c = (e, t, n = 'show') => {
						t.classList.add(n), e.setAttribute('aria-expanded', 'true')
					},
					i = (e, t, n = 'show') => {
						t.classList.remove(n), e.removeAttribute('aria-expanded')
					},
					s = 'show'
				var a = () => {
					const e = document.getElementsByClassName('miz-dropdown')
					for (let t = 0; t < e.length; t += 1) {
						const n = e[t],
							o = n.querySelector('[data-miz-toggle-controls]')
						if (null !== o) {
							const e = document.getElementById(o.dataset.mizToggleControls),
								t = () => (o.classList.remove('active'), (e.hidden = !0), i(o, e, s))
							n.addEventListener('click', (i) => {
								o.contains(i.target) &&
									(e.classList.contains(s)
										? ((e.style.maxHeight = e.offsetHeight), t())
										: (c(o, e, s),
										  (e.hidden = !1),
										  (0, r.detect)(n, o, t),
										  o.classList.add('active')))
							})
						}
					}
				}
				const d = 'expand'
				var u = () => {
					const e = document.getElementsByClassName('miz-expand')
					for (let t = 0; t < e.length; t += 1) {
						const n = e[t],
							o = n.querySelector('[data-miz-expand]')
						if (null !== o) {
							const e = document.getElementById(o.dataset.mizExpand),
								t = () => i(o, e, d)
							n.addEventListener('click', (i) => {
								o.contains(i.target) &&
									(e.classList.contains('expand') ? t() : (c(o, e, d), (0, r.detect)(n, o, t)))
							})
						}
					}
				}
			})(),
			o
		)
	})()
})
