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

				const toggle = require('./toggle') // CSS for dropdowns

				const dropdownCSS = {
					container: 'miz-dropdown',
					show_content: 'show',
				} // Button data attribute

				const dropdownButtonAttribute = 'data-miz-toggle-controls'
				document.addEventListener('DOMContentLoaded', function () {
					// Locate all the dropdown containers in the document and store in a collection
					const dropdownCollection = document.getElementsByClassName(dropdownCSS.container)

					for (let i = 0; i < dropdownCollection.length; i += 1) {
						const dropdown = dropdownCollection[i]
						const dropdownController = dropdown.querySelector(`[${dropdownButtonAttribute}]`)

						if (dropdownController !== null) {
							const dropdownContent = document.getElementById(
								dropdownController.dataset.mizToggleControls,
							)

							const hideThis = () =>
								toggle.hide(dropdownController, dropdownContent, dropdownCSS.show_content)

							dropdown.addEventListener('click', (e) => {
								if (dropdownController.contains(e.target)) {
									if (dropdownContent.classList.contains(dropdownCSS.show_content)) {
										hideThis()
									} else {
										toggle.show(dropdownController, dropdownContent, dropdownCSS.show_content)
										detect(dropdown, dropdownController, hideThis)
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uL25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIuLi9ub2RlX21vZHVsZXMvQG1penpvdS9taXp6b3UtZGVzaWduLXN5c3RlbS9zcmMvbWl6L3NjcmlwdHMvZHJvcGRvd24uanMiLCIuLi9ub2RlX21vZHVsZXMvQG1penpvdS9taXp6b3UtZGVzaWduLXN5c3RlbS9zcmMvbWl6L3NjcmlwdHMvdG9nZ2xlLmpzIiwiLi4vbm9kZV9tb2R1bGVzL0BtaXp6b3UvbWl6em91LWRlc2lnbi1zeXN0ZW0vc3JjL21pei9zY3JpcHRzL3V0aWxzLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FDQUEsTUFBTTtBQUFFLEVBQUE7QUFBRixJQUFhLE9BQU8sQ0FBQyxTQUFELENBQTFCOztBQUNBLE1BQU0sTUFBTSxHQUFHLE9BQU8sQ0FBQyxVQUFELENBQXRCLEMsQ0FFQTs7O0FBQ0EsTUFBTSxXQUFXLEdBQUc7QUFDbEIsRUFBQSxTQUFTLEVBQUUsY0FETztBQUVsQixFQUFBLFlBQVksRUFBRTtBQUZJLENBQXBCLEMsQ0FLQTs7QUFDQSxNQUFNLHVCQUF1QixHQUFHLDBCQUFoQztBQUVBLFFBQVEsQ0FBQyxnQkFBVCxDQUEwQixrQkFBMUIsRUFBOEMsWUFBVztBQUV2RDtBQUNBLFFBQU0sa0JBQWtCLEdBQUcsUUFBUSxDQUFDLHNCQUFULENBQWdDLFdBQVcsQ0FBQyxTQUE1QyxDQUEzQjs7QUFFQSxPQUFLLElBQUksQ0FBQyxHQUFHLENBQWIsRUFBZ0IsQ0FBQyxHQUFHLGtCQUFrQixDQUFDLE1BQXZDLEVBQStDLENBQUMsSUFBSSxDQUFwRCxFQUF1RDtBQUNyRCxVQUFNLFFBQVEsR0FBRyxrQkFBa0IsQ0FBQyxDQUFELENBQW5DO0FBQ0EsVUFBTSxrQkFBa0IsR0FBRyxRQUFRLENBQUMsYUFBVCxDQUF3QixJQUFHLHVCQUF3QixHQUFuRCxDQUEzQjs7QUFDQSxRQUFJLGtCQUFrQixLQUFLLElBQTNCLEVBQWlDO0FBQy9CLFlBQU0sZUFBZSxHQUFHLFFBQVEsQ0FBQyxjQUFULENBQXdCLGtCQUFrQixDQUFDLE9BQW5CLENBQTJCLGlCQUFuRCxDQUF4Qjs7QUFDQSxZQUFNLFFBQVEsR0FBRyxNQUFNLE1BQU0sQ0FBQyxJQUFQLENBQVksa0JBQVosRUFBZ0MsZUFBaEMsRUFBaUQsV0FBVyxDQUFDLFlBQTdELENBQXZCOztBQUVBLE1BQUEsUUFBUSxDQUFDLGdCQUFULENBQTBCLE9BQTFCLEVBQW1DLENBQUMsSUFBSTtBQUN0QyxZQUFJLGtCQUFrQixDQUFDLFFBQW5CLENBQTRCLENBQUMsQ0FBQyxNQUE5QixDQUFKLEVBQTJDO0FBQ3pDLGNBQUksZUFBZSxDQUFDLFNBQWhCLENBQTBCLFFBQTFCLENBQW1DLFdBQVcsQ0FBQyxZQUEvQyxDQUFKLEVBQWtFO0FBQ2hFLFlBQUEsUUFBUTtBQUNULFdBRkQsTUFFTztBQUNMLFlBQUEsTUFBTSxDQUFDLElBQVAsQ0FBWSxrQkFBWixFQUFnQyxlQUFoQyxFQUFpRCxXQUFXLENBQUMsWUFBN0Q7QUFDQSxZQUFBLE1BQU0sQ0FBQyxRQUFELEVBQVcsa0JBQVgsRUFBK0IsUUFBL0IsQ0FBTjtBQUNEO0FBQ0Y7QUFDRixPQVREO0FBVUQ7QUFDRjtBQUNGLENBeEJEOzs7QUNaQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDRSxNQUFNLGlCQUFpQixHQUFHLENBQUMsTUFBRCxFQUFTLE9BQVQsRUFBa0IsR0FBRyxHQUFHLE1BQXhCLEtBQW1DO0FBQzNELEVBQUEsT0FBTyxDQUFDLFNBQVIsQ0FBa0IsR0FBbEIsQ0FBc0IsR0FBdEI7QUFDQSxFQUFBLE1BQU0sQ0FBQyxZQUFQLENBQW9CLGVBQXBCLEVBQXFDLE1BQXJDO0FBQ0QsQ0FIRDtBQUtGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBQ0UsTUFBTSxpQkFBaUIsR0FBRyxDQUFDLE1BQUQsRUFBUyxPQUFULEVBQWtCLEdBQUcsR0FBRyxNQUF4QixLQUFtQztBQUM3RCxFQUFBLE9BQU8sQ0FBQyxTQUFSLENBQWtCLE1BQWxCLENBQXlCLEdBQXpCO0FBQ0EsRUFBQSxNQUFNLENBQUMsZUFBUCxDQUF1QixlQUF2QjtBQUNELENBSEM7O0FBS0YsTUFBTSxDQUFDLE9BQVAsR0FBaUI7QUFDZixFQUFBLElBQUksRUFBRSxpQkFEUztBQUVmLEVBQUEsSUFBSSxFQUFFO0FBRlMsQ0FBakI7OztBQ3RCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDRSxNQUFNLG1CQUFtQixHQUFHLENBQUMsU0FBRCxFQUFZLE1BQVosRUFBb0IsRUFBcEIsS0FBMkI7QUFDdkQsUUFBTSxPQUFPLEdBQUcsQ0FBQyxJQUFJO0FBQ25CLFFBQUksQ0FBQyxTQUFTLENBQUMsUUFBVixDQUFtQixDQUFDLENBQUMsTUFBckIsQ0FBTCxFQUFtQztBQUNqQyxNQUFBLFFBQVEsQ0FBQyxtQkFBVCxDQUE2QixPQUE3QixFQUFzQyxPQUF0QyxFQUErQyxJQUEvQztBQUNBLE1BQUEsRUFBRTtBQUNILEtBSEQsTUFHTyxJQUFJLE1BQU0sQ0FBQyxRQUFQLENBQWdCLENBQUMsQ0FBQyxNQUFsQixDQUFKLEVBQStCO0FBQ3BDLE1BQUEsUUFBUSxDQUFDLG1CQUFULENBQTZCLE9BQTdCLEVBQXNDLE9BQXRDLEVBQStDLElBQS9DO0FBQ0Q7QUFDRixHQVBEOztBQVFBLEVBQUEsUUFBUSxDQUFDLGdCQUFULENBQTBCLE9BQTFCLEVBQW1DLE9BQW5DLEVBQTRDLElBQTVDO0FBQ0QsQ0FWQzs7QUFZRixNQUFNLENBQUMsT0FBUCxHQUFpQjtBQUNmLEVBQUEsTUFBTSxFQUFFO0FBRE8sQ0FBakIiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIHIoZSxuLHQpe2Z1bmN0aW9uIG8oaSxmKXtpZighbltpXSl7aWYoIWVbaV0pe3ZhciBjPVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmU7aWYoIWYmJmMpcmV0dXJuIGMoaSwhMCk7aWYodSlyZXR1cm4gdShpLCEwKTt2YXIgYT1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK2krXCInXCIpO3Rocm93IGEuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixhfXZhciBwPW5baV09e2V4cG9ydHM6e319O2VbaV1bMF0uY2FsbChwLmV4cG9ydHMsZnVuY3Rpb24ocil7dmFyIG49ZVtpXVsxXVtyXTtyZXR1cm4gbyhufHxyKX0scCxwLmV4cG9ydHMscixlLG4sdCl9cmV0dXJuIG5baV0uZXhwb3J0c31mb3IodmFyIHU9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZSxpPTA7aTx0Lmxlbmd0aDtpKyspbyh0W2ldKTtyZXR1cm4gb31yZXR1cm4gcn0pKCkiLCJjb25zdCB7IGRldGVjdCB9ID0gcmVxdWlyZSgnLi91dGlscycpXG5jb25zdCB0b2dnbGUgPSByZXF1aXJlKCcuL3RvZ2dsZScpXG5cbi8vIENTUyBmb3IgZHJvcGRvd25zXG5jb25zdCBkcm9wZG93bkNTUyA9IHtcbiAgY29udGFpbmVyOiAnbWl6LWRyb3Bkb3duJyxcbiAgc2hvd19jb250ZW50OiAnc2hvdydcbn1cblxuLy8gQnV0dG9uIGRhdGEgYXR0cmlidXRlXG5jb25zdCBkcm9wZG93bkJ1dHRvbkF0dHJpYnV0ZSA9ICdkYXRhLW1pei10b2dnbGUtY29udHJvbHMnXG5cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbigpIHtcblxuICAvLyBMb2NhdGUgYWxsIHRoZSBkcm9wZG93biBjb250YWluZXJzIGluIHRoZSBkb2N1bWVudCBhbmQgc3RvcmUgaW4gYSBjb2xsZWN0aW9uXG4gIGNvbnN0IGRyb3Bkb3duQ29sbGVjdGlvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoZHJvcGRvd25DU1MuY29udGFpbmVyKVxuXG4gIGZvciAobGV0IGkgPSAwOyBpIDwgZHJvcGRvd25Db2xsZWN0aW9uLmxlbmd0aDsgaSArPSAxKSB7XG4gICAgY29uc3QgZHJvcGRvd24gPSBkcm9wZG93bkNvbGxlY3Rpb25baV1cbiAgICBjb25zdCBkcm9wZG93bkNvbnRyb2xsZXIgPSBkcm9wZG93bi5xdWVyeVNlbGVjdG9yKGBbJHtkcm9wZG93bkJ1dHRvbkF0dHJpYnV0ZX1dYClcbiAgICBpZiAoZHJvcGRvd25Db250cm9sbGVyICE9PSBudWxsKSB7XG4gICAgICBjb25zdCBkcm9wZG93bkNvbnRlbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChkcm9wZG93bkNvbnRyb2xsZXIuZGF0YXNldC5taXpUb2dnbGVDb250cm9scylcbiAgICAgIGNvbnN0IGhpZGVUaGlzID0gKCkgPT4gdG9nZ2xlLmhpZGUoZHJvcGRvd25Db250cm9sbGVyLCBkcm9wZG93bkNvbnRlbnQsIGRyb3Bkb3duQ1NTLnNob3dfY29udGVudClcblxuICAgICAgZHJvcGRvd24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBlID0+IHtcbiAgICAgICAgaWYgKGRyb3Bkb3duQ29udHJvbGxlci5jb250YWlucyhlLnRhcmdldCkpIHtcbiAgICAgICAgICBpZiAoZHJvcGRvd25Db250ZW50LmNsYXNzTGlzdC5jb250YWlucyhkcm9wZG93bkNTUy5zaG93X2NvbnRlbnQpKSB7XG4gICAgICAgICAgICBoaWRlVGhpcygpXG4gICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIHRvZ2dsZS5zaG93KGRyb3Bkb3duQ29udHJvbGxlciwgZHJvcGRvd25Db250ZW50LCBkcm9wZG93bkNTUy5zaG93X2NvbnRlbnQpXG4gICAgICAgICAgICBkZXRlY3QoZHJvcGRvd24sIGRyb3Bkb3duQ29udHJvbGxlciwgaGlkZVRoaXMpXG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KVxuICAgIH1cbiAgfVxufSlcbiIsIi8qKlxuICAqIEBjYWxsYmFjayB0b2dnbGVDQlxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGJ1dHRvbiBUaGUgYnV0dG9uIHRoYXQgY29udHJvbHMgdGhlIHRvZ2dsZVxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGNvbnRlbnQgVGhlIGNvbnRlbnQgdG8gc2hvdy9oaWRlXG4gICogQHBhcmFtIHtzdHJpbmd9ICAgICAgY3NzIFRoZSBDU1MgY2xhc3MgdG8gYWRkXG4gICovXG4gIGNvbnN0IHNob3dUb2dnbGVDb250ZW50ID0gKGJ1dHRvbiwgY29udGVudCwgY3NzID0gJ3Nob3cnKSA9PiB7XG4gICAgY29udGVudC5jbGFzc0xpc3QuYWRkKGNzcylcbiAgICBidXR0b24uc2V0QXR0cmlidXRlKCdhcmlhLWV4cGFuZGVkJywgJ3RydWUnKVxuICB9XG5cbi8qKlxuICAqIEBjYWxsYmFjayB0b2dnbGVDQlxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGJ1dHRvbiBUaGUgYnV0dG9uIHRoYXQgY29udHJvbHMgdGhlIHRvZ2dsZVxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGNvbnRlbnQgVGhlIGNvbnRlbnQgdG8gc2hvdy9oaWRlXG4gICogQHBhcmFtIHtzdHJpbmd9ICAgICAgY3NzIFRoZSBDU1MgY2xhc3MgdG8gcmVtb3ZlXG4gICovXG4gIGNvbnN0IGhpZGVUb2dnbGVDb250ZW50ID0gKGJ1dHRvbiwgY29udGVudCwgY3NzID0gJ3Nob3cnKSA9PiB7XG4gIGNvbnRlbnQuY2xhc3NMaXN0LnJlbW92ZShjc3MpXG4gIGJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoJ2FyaWEtZXhwYW5kZWQnKVxufVxuXG5tb2R1bGUuZXhwb3J0cyA9IHtcbiAgc2hvdzogc2hvd1RvZ2dsZUNvbnRlbnQsXG4gIGhpZGU6IGhpZGVUb2dnbGVDb250ZW50XG59XG4iLCIvKipcbiAgKlxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGNvbnRhaW5lciBUaGUgY29udGFpbmVyIGFyb3VuZCB0aGUgYnV0dG9uIGFuZCBjb250ZW50XG4gICogQHBhcmFtIHtIVE1MRWxlbWVudH0gYnV0dG9uIFRoZSBidXR0b24gdGhhdCBjb250cm9scyB0aGUgZXhwYW5kXG4gICogQHBhcmFtIHt0b2dnbGVDQn0gY2IgVGhlIGV4cGFuZC9jb2xsYXBzZSBmdW5jdGlvbiB0byBjYWxsIHdoZW4gYSBjbGljayBvdXRzaWRlIHRoZSBjb250ZW50IG9jY3Vyc1xuICAqL1xuICBjb25zdCBkZXRlY3RPdXRzaWRlQ2xpY2tzID0gKGNvbnRhaW5lciwgYnV0dG9uLCBjYikgPT4ge1xuICBjb25zdCBoYW5kbGVyID0gZSA9PiB7XG4gICAgaWYgKCFjb250YWluZXIuY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIGhhbmRsZXIsIHRydWUpXG4gICAgICBjYigpXG4gICAgfSBlbHNlIGlmIChidXR0b24uY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIGhhbmRsZXIsIHRydWUpXG4gICAgfVxuICB9XG4gIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgaGFuZGxlciwgdHJ1ZSlcbn1cblxubW9kdWxlLmV4cG9ydHMgPSB7XG4gIGRldGVjdDogZGV0ZWN0T3V0c2lkZUNsaWNrc1xufVxuIl19
