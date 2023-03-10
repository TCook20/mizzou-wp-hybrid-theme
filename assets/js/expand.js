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
				const { detect } = require('./utils')

				const toggle = require('./toggle') // CSS for expands

				const expandCSS = {
					container: 'miz-expand',
					show_content: 'expand',
				} // Button data attribute

				const expandButtonAttribute = 'data-miz-expand'
				document.addEventListener('DOMContentLoaded', function () {
					// Locate all the expand containers in the document and store in a collection
					const expandCollection = document.getElementsByClassName(expandCSS.container)

					for (let i = 0; i < expandCollection.length; i += 1) {
						const expand = expandCollection[i]
						const toggleController = expand.querySelector(`[${expandButtonAttribute}]`)

						if (toggleController !== null) {
							const toggleContent = document.getElementById(toggleController.dataset.mizExpand)

							const hideThis = () =>
								toggle.hide(toggleController, toggleContent, expandCSS.show_content)

							expand.addEventListener('click', (e) => {
								if (toggleController.contains(e.target)) {
									if (toggleContent.classList.contains('expand')) {
										hideThis()
									} else {
										toggle.show(toggleController, toggleContent, expandCSS.show_content)
										detect(expand, toggleController, hideThis)
									}
								}
							})
						}
					}
				})
			},
			{ './toggle': 2, './utils': 3 },
		],
		2: [
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
		3: [
			function (require, module, exports) {
				/**
				 *
				 * @param {HTMLElement} container The container around the button and content
				 * @param {HTMLElement} button The button that controls the expand
				 * @param {toggleCB} cb The expand/collapse function to call when a click outside the content occurs
				 */
				const detectOutsideClicks = (container, button, cb) => {
					const handler = (e) => {
						if (!container.contains(e.target)) {
							document.removeEventListener('click', handler, true)
							cb()
						} else if (button.contains(e.target)) {
							document.removeEventListener('click', handler, true)
						}
					}

					document.addEventListener('click', handler, true)
				}

				module.exports = {
					detect: detectOutsideClicks,
				}
			},
			{},
		],
	},
	{},
	[1],
)
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uL25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIuLi9ub2RlX21vZHVsZXMvQG1penpvdS9taXp6b3UtZGVzaWduLXN5c3RlbS9zcmMvbWl6L3NjcmlwdHMvZXhwYW5kLmpzIiwiLi4vbm9kZV9tb2R1bGVzL0BtaXp6b3UvbWl6em91LWRlc2lnbi1zeXN0ZW0vc3JjL21pei9zY3JpcHRzL3RvZ2dsZS5qcyIsIi4uL25vZGVfbW9kdWxlcy9AbWl6em91L21penpvdS1kZXNpZ24tc3lzdGVtL3NyYy9taXovc2NyaXB0cy91dGlscy5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQ0FBLE1BQU07QUFBRSxFQUFBO0FBQUYsSUFBYSxPQUFPLENBQUMsU0FBRCxDQUExQjs7QUFDQSxNQUFNLE1BQU0sR0FBRyxPQUFPLENBQUMsVUFBRCxDQUF0QixDLENBRUE7OztBQUNBLE1BQU0sU0FBUyxHQUFHO0FBQ2hCLEVBQUEsU0FBUyxFQUFFLFlBREs7QUFFaEIsRUFBQSxZQUFZLEVBQUU7QUFGRSxDQUFsQixDLENBS0E7O0FBQ0EsTUFBTSxxQkFBcUIsR0FBRyxpQkFBOUI7QUFFQSxRQUFRLENBQUMsZ0JBQVQsQ0FBMEIsa0JBQTFCLEVBQThDLFlBQVc7QUFFdkQ7QUFDQSxRQUFNLGdCQUFnQixHQUFHLFFBQVEsQ0FBQyxzQkFBVCxDQUFnQyxTQUFTLENBQUMsU0FBMUMsQ0FBekI7O0FBRUEsT0FBSyxJQUFJLENBQUMsR0FBRyxDQUFiLEVBQWdCLENBQUMsR0FBRyxnQkFBZ0IsQ0FBQyxNQUFyQyxFQUE2QyxDQUFDLElBQUksQ0FBbEQsRUFBcUQ7QUFDbkQsVUFBTSxNQUFNLEdBQUcsZ0JBQWdCLENBQUMsQ0FBRCxDQUEvQjtBQUNBLFVBQU0sZ0JBQWdCLEdBQUcsTUFBTSxDQUFDLGFBQVAsQ0FBc0IsSUFBRyxxQkFBc0IsR0FBL0MsQ0FBekI7O0FBQ0EsUUFBSSxnQkFBZ0IsS0FBSyxJQUF6QixFQUErQjtBQUM3QixZQUFNLGFBQWEsR0FBRyxRQUFRLENBQUMsY0FBVCxDQUF3QixnQkFBZ0IsQ0FBQyxPQUFqQixDQUF5QixTQUFqRCxDQUF0Qjs7QUFDQSxZQUFNLFFBQVEsR0FBRyxNQUFNLE1BQU0sQ0FBQyxJQUFQLENBQVksZ0JBQVosRUFBOEIsYUFBOUIsRUFBNkMsU0FBUyxDQUFDLFlBQXZELENBQXZCOztBQUVBLE1BQUEsTUFBTSxDQUFDLGdCQUFQLENBQXdCLE9BQXhCLEVBQWlDLENBQUMsSUFBSTtBQUNwQyxZQUFJLGdCQUFnQixDQUFDLFFBQWpCLENBQTBCLENBQUMsQ0FBQyxNQUE1QixDQUFKLEVBQXlDO0FBQ3ZDLGNBQUksYUFBYSxDQUFDLFNBQWQsQ0FBd0IsUUFBeEIsQ0FBaUMsUUFBakMsQ0FBSixFQUFnRDtBQUM5QyxZQUFBLFFBQVE7QUFDVCxXQUZELE1BRU87QUFDTCxZQUFBLE1BQU0sQ0FBQyxJQUFQLENBQVksZ0JBQVosRUFBOEIsYUFBOUIsRUFBNkMsU0FBUyxDQUFDLFlBQXZEO0FBQ0EsWUFBQSxNQUFNLENBQUMsTUFBRCxFQUFTLGdCQUFULEVBQTJCLFFBQTNCLENBQU47QUFDRDtBQUNGO0FBQ0YsT0FURDtBQVVEO0FBQ0Y7QUFDRixDQXhCRDs7O0FDWkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0UsTUFBTSxpQkFBaUIsR0FBRyxDQUFDLE1BQUQsRUFBUyxPQUFULEVBQWtCLEdBQUcsR0FBRyxNQUF4QixLQUFtQztBQUMzRCxFQUFBLE9BQU8sQ0FBQyxTQUFSLENBQWtCLEdBQWxCLENBQXNCLEdBQXRCO0FBQ0EsRUFBQSxNQUFNLENBQUMsWUFBUCxDQUFvQixlQUFwQixFQUFxQyxNQUFyQztBQUNELENBSEQ7QUFLRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUNFLE1BQU0saUJBQWlCLEdBQUcsQ0FBQyxNQUFELEVBQVMsT0FBVCxFQUFrQixHQUFHLEdBQUcsTUFBeEIsS0FBbUM7QUFDN0QsRUFBQSxPQUFPLENBQUMsU0FBUixDQUFrQixNQUFsQixDQUF5QixHQUF6QjtBQUNBLEVBQUEsTUFBTSxDQUFDLGVBQVAsQ0FBdUIsZUFBdkI7QUFDRCxDQUhDOztBQUtGLE1BQU0sQ0FBQyxPQUFQLEdBQWlCO0FBQ2YsRUFBQSxJQUFJLEVBQUUsaUJBRFM7QUFFZixFQUFBLElBQUksRUFBRTtBQUZTLENBQWpCOzs7QUN0QkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0UsTUFBTSxtQkFBbUIsR0FBRyxDQUFDLFNBQUQsRUFBWSxNQUFaLEVBQW9CLEVBQXBCLEtBQTJCO0FBQ3ZELFFBQU0sT0FBTyxHQUFHLENBQUMsSUFBSTtBQUNuQixRQUFJLENBQUMsU0FBUyxDQUFDLFFBQVYsQ0FBbUIsQ0FBQyxDQUFDLE1BQXJCLENBQUwsRUFBbUM7QUFDakMsTUFBQSxRQUFRLENBQUMsbUJBQVQsQ0FBNkIsT0FBN0IsRUFBc0MsT0FBdEMsRUFBK0MsSUFBL0M7QUFDQSxNQUFBLEVBQUU7QUFDSCxLQUhELE1BR08sSUFBSSxNQUFNLENBQUMsUUFBUCxDQUFnQixDQUFDLENBQUMsTUFBbEIsQ0FBSixFQUErQjtBQUNwQyxNQUFBLFFBQVEsQ0FBQyxtQkFBVCxDQUE2QixPQUE3QixFQUFzQyxPQUF0QyxFQUErQyxJQUEvQztBQUNEO0FBQ0YsR0FQRDs7QUFRQSxFQUFBLFFBQVEsQ0FBQyxnQkFBVCxDQUEwQixPQUExQixFQUFtQyxPQUFuQyxFQUE0QyxJQUE1QztBQUNELENBVkM7O0FBWUYsTUFBTSxDQUFDLE9BQVAsR0FBaUI7QUFDZixFQUFBLE1BQU0sRUFBRTtBQURPLENBQWpCIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKXtmdW5jdGlvbiByKGUsbix0KXtmdW5jdGlvbiBvKGksZil7aWYoIW5baV0pe2lmKCFlW2ldKXt2YXIgYz1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlO2lmKCFmJiZjKXJldHVybiBjKGksITApO2lmKHUpcmV0dXJuIHUoaSwhMCk7dmFyIGE9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitpK1wiJ1wiKTt0aHJvdyBhLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsYX12YXIgcD1uW2ldPXtleHBvcnRzOnt9fTtlW2ldWzBdLmNhbGwocC5leHBvcnRzLGZ1bmN0aW9uKHIpe3ZhciBuPWVbaV1bMV1bcl07cmV0dXJuIG8obnx8cil9LHAscC5leHBvcnRzLHIsZSxuLHQpfXJldHVybiBuW2ldLmV4cG9ydHN9Zm9yKHZhciB1PVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmUsaT0wO2k8dC5sZW5ndGg7aSsrKW8odFtpXSk7cmV0dXJuIG99cmV0dXJuIHJ9KSgpIiwiY29uc3QgeyBkZXRlY3QgfSA9IHJlcXVpcmUoJy4vdXRpbHMnKVxuY29uc3QgdG9nZ2xlID0gcmVxdWlyZSgnLi90b2dnbGUnKVxuXG4vLyBDU1MgZm9yIGV4cGFuZHNcbmNvbnN0IGV4cGFuZENTUyA9IHtcbiAgY29udGFpbmVyOiAnbWl6LWV4cGFuZCcsXG4gIHNob3dfY29udGVudDogJ2V4cGFuZCdcbn1cblxuLy8gQnV0dG9uIGRhdGEgYXR0cmlidXRlXG5jb25zdCBleHBhbmRCdXR0b25BdHRyaWJ1dGUgPSAnZGF0YS1taXotZXhwYW5kJ1xuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdET01Db250ZW50TG9hZGVkJywgZnVuY3Rpb24oKSB7XG5cbiAgLy8gTG9jYXRlIGFsbCB0aGUgZXhwYW5kIGNvbnRhaW5lcnMgaW4gdGhlIGRvY3VtZW50IGFuZCBzdG9yZSBpbiBhIGNvbGxlY3Rpb25cbiAgY29uc3QgZXhwYW5kQ29sbGVjdGlvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoZXhwYW5kQ1NTLmNvbnRhaW5lcilcblxuICBmb3IgKGxldCBpID0gMDsgaSA8IGV4cGFuZENvbGxlY3Rpb24ubGVuZ3RoOyBpICs9IDEpIHtcbiAgICBjb25zdCBleHBhbmQgPSBleHBhbmRDb2xsZWN0aW9uW2ldXG4gICAgY29uc3QgdG9nZ2xlQ29udHJvbGxlciA9IGV4cGFuZC5xdWVyeVNlbGVjdG9yKGBbJHtleHBhbmRCdXR0b25BdHRyaWJ1dGV9XWApXG4gICAgaWYgKHRvZ2dsZUNvbnRyb2xsZXIgIT09IG51bGwpIHtcbiAgICAgIGNvbnN0IHRvZ2dsZUNvbnRlbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0b2dnbGVDb250cm9sbGVyLmRhdGFzZXQubWl6RXhwYW5kKVxuICAgICAgY29uc3QgaGlkZVRoaXMgPSAoKSA9PiB0b2dnbGUuaGlkZSh0b2dnbGVDb250cm9sbGVyLCB0b2dnbGVDb250ZW50LCBleHBhbmRDU1Muc2hvd19jb250ZW50KVxuXG4gICAgICBleHBhbmQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBlID0+IHtcbiAgICAgICAgaWYgKHRvZ2dsZUNvbnRyb2xsZXIuY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICAgICAgaWYgKHRvZ2dsZUNvbnRlbnQuY2xhc3NMaXN0LmNvbnRhaW5zKCdleHBhbmQnKSkge1xuICAgICAgICAgICAgaGlkZVRoaXMoKVxuICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICB0b2dnbGUuc2hvdyh0b2dnbGVDb250cm9sbGVyLCB0b2dnbGVDb250ZW50LCBleHBhbmRDU1Muc2hvd19jb250ZW50KVxuICAgICAgICAgICAgZGV0ZWN0KGV4cGFuZCwgdG9nZ2xlQ29udHJvbGxlciwgaGlkZVRoaXMpXG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KVxuICAgIH1cbiAgfVxufSlcbiIsIi8qKlxuICAqIEBjYWxsYmFjayB0b2dnbGVDQlxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGJ1dHRvbiBUaGUgYnV0dG9uIHRoYXQgY29udHJvbHMgdGhlIHRvZ2dsZVxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGNvbnRlbnQgVGhlIGNvbnRlbnQgdG8gc2hvdy9oaWRlXG4gICogQHBhcmFtIHtzdHJpbmd9ICAgICAgY3NzIFRoZSBDU1MgY2xhc3MgdG8gYWRkXG4gICovXG4gIGNvbnN0IHNob3dUb2dnbGVDb250ZW50ID0gKGJ1dHRvbiwgY29udGVudCwgY3NzID0gJ3Nob3cnKSA9PiB7XG4gICAgY29udGVudC5jbGFzc0xpc3QuYWRkKGNzcylcbiAgICBidXR0b24uc2V0QXR0cmlidXRlKCdhcmlhLWV4cGFuZGVkJywgJ3RydWUnKVxuICB9XG5cbi8qKlxuICAqIEBjYWxsYmFjayB0b2dnbGVDQlxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGJ1dHRvbiBUaGUgYnV0dG9uIHRoYXQgY29udHJvbHMgdGhlIHRvZ2dsZVxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGNvbnRlbnQgVGhlIGNvbnRlbnQgdG8gc2hvdy9oaWRlXG4gICogQHBhcmFtIHtzdHJpbmd9ICAgICAgY3NzIFRoZSBDU1MgY2xhc3MgdG8gcmVtb3ZlXG4gICovXG4gIGNvbnN0IGhpZGVUb2dnbGVDb250ZW50ID0gKGJ1dHRvbiwgY29udGVudCwgY3NzID0gJ3Nob3cnKSA9PiB7XG4gIGNvbnRlbnQuY2xhc3NMaXN0LnJlbW92ZShjc3MpXG4gIGJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoJ2FyaWEtZXhwYW5kZWQnKVxufVxuXG5tb2R1bGUuZXhwb3J0cyA9IHtcbiAgc2hvdzogc2hvd1RvZ2dsZUNvbnRlbnQsXG4gIGhpZGU6IGhpZGVUb2dnbGVDb250ZW50XG59XG4iLCIvKipcbiAgKlxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGNvbnRhaW5lciBUaGUgY29udGFpbmVyIGFyb3VuZCB0aGUgYnV0dG9uIGFuZCBjb250ZW50XG4gICogQHBhcmFtIHtIVE1MRWxlbWVudH0gYnV0dG9uIFRoZSBidXR0b24gdGhhdCBjb250cm9scyB0aGUgZXhwYW5kXG4gICogQHBhcmFtIHt0b2dnbGVDQn0gY2IgVGhlIGV4cGFuZC9jb2xsYXBzZSBmdW5jdGlvbiB0byBjYWxsIHdoZW4gYSBjbGljayBvdXRzaWRlIHRoZSBjb250ZW50IG9jY3Vyc1xuICAqL1xuICBjb25zdCBkZXRlY3RPdXRzaWRlQ2xpY2tzID0gKGNvbnRhaW5lciwgYnV0dG9uLCBjYikgPT4ge1xuICBjb25zdCBoYW5kbGVyID0gZSA9PiB7XG4gICAgaWYgKCFjb250YWluZXIuY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIGhhbmRsZXIsIHRydWUpXG4gICAgICBjYigpXG4gICAgfSBlbHNlIGlmIChidXR0b24uY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIGhhbmRsZXIsIHRydWUpXG4gICAgfVxuICB9XG4gIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgaGFuZGxlciwgdHJ1ZSlcbn1cblxubW9kdWxlLmV4cG9ydHMgPSB7XG4gIGRldGVjdDogZGV0ZWN0T3V0c2lkZUNsaWNrc1xufVxuIl19
