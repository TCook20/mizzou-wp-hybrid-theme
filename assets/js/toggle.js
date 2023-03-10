;(function () {
	function r(e, n, t) {
		function o(i, f) {
			if (!n[i]) {
				if (!e[i]) {
					var c = 'function' == typeof require && require
					if (!f && c) return c(i, !0)
					if (u) return u(i, !0)
					var a = new Error("Cannot find module '" + i + "'")
					throw ((a.code = 'MODULE_NOT_FOUND'), a)
				}
				var p = (n[i] = { exports: {} })
				e[i][0].call(
					p.exports,
					function (r) {
						var n = e[i][1][r]
						return o(n || r)
					},
					p,
					p.exports,
					r,
					e,
					n,
					t,
				)
			}
			return n[i].exports
		}
		for (var u = 'function' == typeof require && require, i = 0; i < t.length; i++) o(t[i])
		return o
	}
	return r
})()(
	{
		1: [
			function (require, module, exports) {
				/**
				 * @callback toggleCB
				 * @param {HTMLElement} button The button that controls the toggle
				 * @param {HTMLElement} content The content to show/hide
				 * @param {string}      css The CSS class to add
				 */
				const showToggleContent = (button, content, css = 'show') => {
					content.classList.add(css)
					button.setAttribute('aria-expanded', 'true')
				}
				/**
				 * @callback toggleCB
				 * @param {HTMLElement} button The button that controls the toggle
				 * @param {HTMLElement} content The content to show/hide
				 * @param {string}      css The CSS class to remove
				 */

				const hideToggleContent = (button, content, css = 'show') => {
					content.classList.remove(css)
					button.removeAttribute('aria-expanded')
				}

				module.exports = {
					show: showToggleContent,
					hide: hideToggleContent,
				}
			},
			{},
		],
	},
	{},
	[1],
)
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uL25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIuLi9ub2RlX21vZHVsZXMvQG1penpvdS9taXp6b3UtZGVzaWduLXN5c3RlbS9zcmMvbWl6L3NjcmlwdHMvdG9nZ2xlLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FDQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0UsTUFBTSxpQkFBaUIsR0FBRyxDQUFDLE1BQUQsRUFBUyxPQUFULEVBQWtCLEdBQUcsR0FBRyxNQUF4QixLQUFtQztBQUMzRCxFQUFBLE9BQU8sQ0FBQyxTQUFSLENBQWtCLEdBQWxCLENBQXNCLEdBQXRCO0FBQ0EsRUFBQSxNQUFNLENBQUMsWUFBUCxDQUFvQixlQUFwQixFQUFxQyxNQUFyQztBQUNELENBSEQ7QUFLRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUNFLE1BQU0saUJBQWlCLEdBQUcsQ0FBQyxNQUFELEVBQVMsT0FBVCxFQUFrQixHQUFHLEdBQUcsTUFBeEIsS0FBbUM7QUFDN0QsRUFBQSxPQUFPLENBQUMsU0FBUixDQUFrQixNQUFsQixDQUF5QixHQUF6QjtBQUNBLEVBQUEsTUFBTSxDQUFDLGVBQVAsQ0FBdUIsZUFBdkI7QUFDRCxDQUhDOztBQUtGLE1BQU0sQ0FBQyxPQUFQLEdBQWlCO0FBQ2YsRUFBQSxJQUFJLEVBQUUsaUJBRFM7QUFFZixFQUFBLElBQUksRUFBRTtBQUZTLENBQWpCIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKXtmdW5jdGlvbiByKGUsbix0KXtmdW5jdGlvbiBvKGksZil7aWYoIW5baV0pe2lmKCFlW2ldKXt2YXIgYz1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlO2lmKCFmJiZjKXJldHVybiBjKGksITApO2lmKHUpcmV0dXJuIHUoaSwhMCk7dmFyIGE9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitpK1wiJ1wiKTt0aHJvdyBhLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsYX12YXIgcD1uW2ldPXtleHBvcnRzOnt9fTtlW2ldWzBdLmNhbGwocC5leHBvcnRzLGZ1bmN0aW9uKHIpe3ZhciBuPWVbaV1bMV1bcl07cmV0dXJuIG8obnx8cil9LHAscC5leHBvcnRzLHIsZSxuLHQpfXJldHVybiBuW2ldLmV4cG9ydHN9Zm9yKHZhciB1PVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmUsaT0wO2k8dC5sZW5ndGg7aSsrKW8odFtpXSk7cmV0dXJuIG99cmV0dXJuIHJ9KSgpIiwiLyoqXG4gICogQGNhbGxiYWNrIHRvZ2dsZUNCXG4gICogQHBhcmFtIHtIVE1MRWxlbWVudH0gYnV0dG9uIFRoZSBidXR0b24gdGhhdCBjb250cm9scyB0aGUgdG9nZ2xlXG4gICogQHBhcmFtIHtIVE1MRWxlbWVudH0gY29udGVudCBUaGUgY29udGVudCB0byBzaG93L2hpZGVcbiAgKiBAcGFyYW0ge3N0cmluZ30gICAgICBjc3MgVGhlIENTUyBjbGFzcyB0byBhZGRcbiAgKi9cbiAgY29uc3Qgc2hvd1RvZ2dsZUNvbnRlbnQgPSAoYnV0dG9uLCBjb250ZW50LCBjc3MgPSAnc2hvdycpID0+IHtcbiAgICBjb250ZW50LmNsYXNzTGlzdC5hZGQoY3NzKVxuICAgIGJ1dHRvbi5zZXRBdHRyaWJ1dGUoJ2FyaWEtZXhwYW5kZWQnLCAndHJ1ZScpXG4gIH1cblxuLyoqXG4gICogQGNhbGxiYWNrIHRvZ2dsZUNCXG4gICogQHBhcmFtIHtIVE1MRWxlbWVudH0gYnV0dG9uIFRoZSBidXR0b24gdGhhdCBjb250cm9scyB0aGUgdG9nZ2xlXG4gICogQHBhcmFtIHtIVE1MRWxlbWVudH0gY29udGVudCBUaGUgY29udGVudCB0byBzaG93L2hpZGVcbiAgKiBAcGFyYW0ge3N0cmluZ30gICAgICBjc3MgVGhlIENTUyBjbGFzcyB0byByZW1vdmVcbiAgKi9cbiAgY29uc3QgaGlkZVRvZ2dsZUNvbnRlbnQgPSAoYnV0dG9uLCBjb250ZW50LCBjc3MgPSAnc2hvdycpID0+IHtcbiAgY29udGVudC5jbGFzc0xpc3QucmVtb3ZlKGNzcylcbiAgYnV0dG9uLnJlbW92ZUF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcpXG59XG5cbm1vZHVsZS5leHBvcnRzID0ge1xuICBzaG93OiBzaG93VG9nZ2xlQ29udGVudCxcbiAgaGlkZTogaGlkZVRvZ2dsZUNvbnRlbnRcbn1cbiJdfQ==
