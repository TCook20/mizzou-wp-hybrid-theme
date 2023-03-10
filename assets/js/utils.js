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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uL25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIuLi9ub2RlX21vZHVsZXMvQG1penpvdS9taXp6b3UtZGVzaWduLXN5c3RlbS9zcmMvbWl6L3NjcmlwdHMvdXRpbHMuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUNBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDRSxNQUFNLG1CQUFtQixHQUFHLENBQUMsU0FBRCxFQUFZLE1BQVosRUFBb0IsRUFBcEIsS0FBMkI7QUFDdkQsUUFBTSxPQUFPLEdBQUcsQ0FBQyxJQUFJO0FBQ25CLFFBQUksQ0FBQyxTQUFTLENBQUMsUUFBVixDQUFtQixDQUFDLENBQUMsTUFBckIsQ0FBTCxFQUFtQztBQUNqQyxNQUFBLFFBQVEsQ0FBQyxtQkFBVCxDQUE2QixPQUE3QixFQUFzQyxPQUF0QyxFQUErQyxJQUEvQztBQUNBLE1BQUEsRUFBRTtBQUNILEtBSEQsTUFHTyxJQUFJLE1BQU0sQ0FBQyxRQUFQLENBQWdCLENBQUMsQ0FBQyxNQUFsQixDQUFKLEVBQStCO0FBQ3BDLE1BQUEsUUFBUSxDQUFDLG1CQUFULENBQTZCLE9BQTdCLEVBQXNDLE9BQXRDLEVBQStDLElBQS9DO0FBQ0Q7QUFDRixHQVBEOztBQVFBLEVBQUEsUUFBUSxDQUFDLGdCQUFULENBQTBCLE9BQTFCLEVBQW1DLE9BQW5DLEVBQTRDLElBQTVDO0FBQ0QsQ0FWQzs7QUFZRixNQUFNLENBQUMsT0FBUCxHQUFpQjtBQUNmLEVBQUEsTUFBTSxFQUFFO0FBRE8sQ0FBakIiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIHIoZSxuLHQpe2Z1bmN0aW9uIG8oaSxmKXtpZighbltpXSl7aWYoIWVbaV0pe3ZhciBjPVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmU7aWYoIWYmJmMpcmV0dXJuIGMoaSwhMCk7aWYodSlyZXR1cm4gdShpLCEwKTt2YXIgYT1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK2krXCInXCIpO3Rocm93IGEuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixhfXZhciBwPW5baV09e2V4cG9ydHM6e319O2VbaV1bMF0uY2FsbChwLmV4cG9ydHMsZnVuY3Rpb24ocil7dmFyIG49ZVtpXVsxXVtyXTtyZXR1cm4gbyhufHxyKX0scCxwLmV4cG9ydHMscixlLG4sdCl9cmV0dXJuIG5baV0uZXhwb3J0c31mb3IodmFyIHU9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZSxpPTA7aTx0Lmxlbmd0aDtpKyspbyh0W2ldKTtyZXR1cm4gb31yZXR1cm4gcn0pKCkiLCIvKipcbiAgKlxuICAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGNvbnRhaW5lciBUaGUgY29udGFpbmVyIGFyb3VuZCB0aGUgYnV0dG9uIGFuZCBjb250ZW50XG4gICogQHBhcmFtIHtIVE1MRWxlbWVudH0gYnV0dG9uIFRoZSBidXR0b24gdGhhdCBjb250cm9scyB0aGUgZXhwYW5kXG4gICogQHBhcmFtIHt0b2dnbGVDQn0gY2IgVGhlIGV4cGFuZC9jb2xsYXBzZSBmdW5jdGlvbiB0byBjYWxsIHdoZW4gYSBjbGljayBvdXRzaWRlIHRoZSBjb250ZW50IG9jY3Vyc1xuICAqL1xuICBjb25zdCBkZXRlY3RPdXRzaWRlQ2xpY2tzID0gKGNvbnRhaW5lciwgYnV0dG9uLCBjYikgPT4ge1xuICBjb25zdCBoYW5kbGVyID0gZSA9PiB7XG4gICAgaWYgKCFjb250YWluZXIuY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIGhhbmRsZXIsIHRydWUpXG4gICAgICBjYigpXG4gICAgfSBlbHNlIGlmIChidXR0b24uY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIGhhbmRsZXIsIHRydWUpXG4gICAgfVxuICB9XG4gIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgaGFuZGxlciwgdHJ1ZSlcbn1cblxubW9kdWxlLmV4cG9ydHMgPSB7XG4gIGRldGVjdDogZGV0ZWN0T3V0c2lkZUNsaWNrc1xufVxuIl19
