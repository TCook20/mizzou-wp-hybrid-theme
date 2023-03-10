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
				/* ==========================================================================
    Calendar Toggle
 ========================================================================== */
				var calendarButtonsGroup = document.querySelectorAll('.btn-group')[0]
				var calendarButtons = calendarButtonsGroup && calendarButtonsGroup.childNodes
				var calendarbutton1 = calendarButtons && calendarButtons[1].id
				var calendarbutton2 = calendarButtons && calendarButtons[3].id
				var calendarToggleButtonOne = document.getElementById(calendarbutton1)
				var calendarToggleButtonTwo = document.getElementById(calendarbutton2)
				var calendarCardOne = document.getElementById('calendarCardOne')
				var calendarCardTwo = document.getElementById('calendarCardTwo')
				calendarToggleButtonOne != null &&
					calendarToggleButtonOne.addEventListener('click', function (e) {
						e.preventDefault()
						$(calendarToggleButtonTwo).removeClass('active-event-calendar')
						$(calendarCardTwo).removeClass('miz-events__group--active')
						$(calendarToggleButtonTwo).addClass('shadow')
						e.target.classList.remove('shadow')
						e.target.classList.add('active-academic-dates')
						$(calendarCardOne).addClass('miz-events__group--active')
					})
				calendarToggleButtonTwo != null &&
					calendarToggleButtonTwo.addEventListener('click', function (e) {
						e.preventDefault()
						$(calendarToggleButtonOne).removeClass('active-academic-dates')
						$(calendarCardOne).removeClass('miz-events__group--active')
						$(calendarToggleButtonOne).addClass('shadow')
						e.target.classList.remove('shadow')
						e.target.classList.add('active-event-calendar')
						$(calendarCardTwo).addClass('miz-events__group--active')
					})
				/* ==========================================================================
        Navigation
     ========================================================================== */

				var menuButton = document.querySelector('.navbar-toggler')
				var searchButton = document.querySelector(
					'.miz-button--xs[data-target="#collapseSearchBox"]',
				)
				var searchInput = document.querySelector('.input-group')
				var navbarContent = document.querySelector('.navbar-collapse')
				var navExpand = [].slice.call(document.querySelectorAll('.nav-expand'))
				var bottomTwoThirdsNav = document.getElementById('bottom-two-thirds-nav') // var backLink = `
				// <li id="backLi" class="nav-item">
				//   <a class="nav-link nav-back-link" href="javascript:;">
				//   </a>
				// </li>`;

				searchButton &&
					searchButton.addEventListener('click', function (e) {
						if (navbarContent.classList.contains('show')) {
							navExpand.forEach(function (item) {
								item.classList.remove('active')
							})
						}
					})
				menuButton &&
					menuButton.addEventListener('click', function (e) {
						$('body').addClass('fixedPosition')

						if (navbarContent.classList.contains('show')) {
							$('.nav-expand-content').hide()
							$('body').removeClass('fixedPosition')
							navExpand.forEach(function (item) {
								item.classList.remove('active')
							})
							setTimeout(function () {
								$('.nav-expand-content').show()
							}, 500)
						}
					}) // navExpand &&
				//   navExpand.forEach(item => {
				//     item.querySelector(".nav-link").addEventListener("click", () => {
				//       if (searchInput.classList.contains("show")) {
				//         searchInput.classList.remove("show");
				//       }
				//       item.classList.add("active");
				//     });
				//
				//     item.querySelector('.nav-expand-content').insertAdjacentHTML(
				//       'afterbegin',
				//       `
				//     <li class="nav-item">
				//       <a class="nav-link nav-back-link" href="javascript:;">
				//           <span>${item.childNodes[1].innerHTML}</span>
				//       </a>
				//     </li>`
				//     )
				//
				//     item.querySelector(".nav-back-link").addEventListener("click", () => {
				//       text = "";
				//       item.classList.remove("active");
				//     });
				//   });

				/* ==========================================================================
        Pillar Callout Expand 2.0
     ========================================================================== */

				var pillarContainer = document.getElementById('pillar-expand-layer')
				var box1Button = document.getElementById('box-1-button')
				var box2Button = document.getElementById('box-2-button')
				var box3Button = document.getElementById('box-3-button')
				var boxOneOverlay = document.getElementById('box-1-overlay')
				var boxTwoOverlay = document.getElementById('box-2-overlay')
				var boxThreeOverlay = document.getElementById('box-3-overlay')
				var closeButton = Array.prototype.slice.call(document.querySelectorAll('.closebtn'))
				var nextButton = Array.prototype.slice.call(document.querySelectorAll('.nextbtn'))
				var prevButton = Array.prototype.slice.call(document.querySelectorAll('.prevbtn')) // function handleCommand(e) {
				//   let currentOverlay
				//   let nextElement
				//   let pressed = e.target.parentElement.getAttribute('aria-pressed') === 'true'
				//
				//   if (e.key === ' ' || e.key === 'Enter' || e.key === 'Spacebar') {
				//     e.preventDefault()
				//     currentOverlay = e.target.parentElement.parentElement.parentElement.parentElement
				//     nextElement = currentOverlay.nextElementSibling
				//
				//     e.target.setAttribute('aria-pressed', !pressed)
				//     currentOverlay.classList.add('hide')
				//     nextElement.classList.remove('hide')
				//   } else {
				//     currentOverlay = e.target.parentElement.parentElement.parentElement.parentElement.parentElement
				//     nextElement = currentOverlay.nextElementSibling
				//
				//     e.target.parentElement.setAttribute('aria-pressed', !pressed)
				//     currentOverlay.classList.add('hide')
				//     nextElement.classList.remove('hide')
				//   }
				// }

				nextButton &&
					nextButton.forEach(function (button) {
						button.addEventListener('click', function (e) {
							var currentOverlay = e.target.parentElement.parentElement.parentElement.parentElement
							currentOverlay.classList.add('hide')
							currentOverlay.nextElementSibling.classList.remove('hide')
						})
					})
				prevButton &&
					prevButton.forEach(function (button) {
						button.addEventListener('click', function (e) {
							var currentOverlay = e.target.parentElement.parentElement.parentElement.parentElement
							currentOverlay.classList.add('hide')
							currentOverlay.previousElementSibling.classList.remove('hide')
						})
					})
				box1Button &&
					box1Button.addEventListener('click', function () {
						boxOneOverlay.classList.remove('hide')
						boxTwoOverlay.classList.add('hide')
						boxThreeOverlay.classList.add('hide')
						pillarContainer.classList.add('addOverlay')
					})
				box2Button &&
					box2Button.addEventListener('click', function () {
						boxTwoOverlay.classList.remove('hide')
						boxOneOverlay.classList.add('hide')
						boxThreeOverlay.classList.add('hide')
						pillarContainer.classList.add('addOverlay')
					})
				box3Button &&
					box3Button.addEventListener('click', function () {
						boxThreeOverlay.classList.remove('hide')
						boxOneOverlay.classList.add('hide')
						boxTwoOverlay.classList.add('hide')
						pillarContainer.classList.add('addOverlay')
					})
				closeButton.forEach(function (button) {
					button.addEventListener('click', function () {
						pillarContainer.classList.remove('addOverlay')
					})
				})
				/* ==========================================================================
        Card with Tabs
     ========================================================================== */
				// var tabs = document.querySelectorAll(".tab");
				// var allTabContent = document.querySelectorAll(".panel-content");
				//
				// tabs &&
				//   tabs.forEach(tab => {
				//     tab.addEventListener("click", setActiveClass);
				//   });
				//
				// function setActiveClass(e) {
				//   tabs.forEach(tab => {
				//     tab.classList.remove("active");
				//     tab.classList.add("grey-border-bottom");
				//   });
				//
				//   allTabContent.forEach(tabContent => {
				//     tabContent.classList.add("hide-content");
				//     if (tabContent.id === e.currentTarget.dataset.target) {
				//       tabContent.classList.remove("hide-content");
				//     }
				//   });
				//
				//   e.currentTarget.classList.add("active");
				//   e.currentTarget.classList.remove("grey-border-bottom");
				// }

				/* ==========================================================================
        DRUPAL
     ========================================================================== */

				jQuery(document).ready(function ($) {
					/* ===============
          Alert Modal
    ================= */
					// initializes and invokes the modal on page load
					$('#alertModal').modal()
				})
			},
			{},
		],
	},
	{},
	[1],
)
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uL25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIuLi9ub2RlX21vZHVsZXMvQG1penpvdS9taXp6b3UtZGVzaWduLXN5c3RlbS9zcmMvbWl6L3NjcmlwdHMvbWl6LmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FDQUE7QUFDQTtBQUNBO0FBRUEsSUFBSSxvQkFBb0IsR0FBRyxRQUFRLENBQUMsZ0JBQVQsQ0FBMEIsWUFBMUIsRUFBd0MsQ0FBeEMsQ0FBM0I7QUFDQSxJQUFJLGVBQWUsR0FBRyxvQkFBb0IsSUFBSSxvQkFBb0IsQ0FBQyxVQUFuRTtBQUNBLElBQUksZUFBZSxHQUFHLGVBQWUsSUFBSSxlQUFlLENBQUMsQ0FBRCxDQUFmLENBQW1CLEVBQTVEO0FBQ0EsSUFBSSxlQUFlLEdBQUcsZUFBZSxJQUFJLGVBQWUsQ0FBQyxDQUFELENBQWYsQ0FBbUIsRUFBNUQ7QUFFQSxJQUFJLHVCQUF1QixHQUFHLFFBQVEsQ0FBQyxjQUFULENBQXdCLGVBQXhCLENBQTlCO0FBQ0EsSUFBSSx1QkFBdUIsR0FBRyxRQUFRLENBQUMsY0FBVCxDQUF3QixlQUF4QixDQUE5QjtBQUVBLElBQUksZUFBZSxHQUFHLFFBQVEsQ0FBQyxjQUFULENBQXdCLGlCQUF4QixDQUF0QjtBQUNBLElBQUksZUFBZSxHQUFHLFFBQVEsQ0FBQyxjQUFULENBQXdCLGlCQUF4QixDQUF0QjtBQUVBLHVCQUF1QixJQUFJLElBQTNCLElBQ0UsdUJBQXVCLENBQUMsZ0JBQXhCLENBQXlDLE9BQXpDLEVBQWtELFVBQVMsQ0FBVCxFQUFZO0FBQzVELEVBQUEsQ0FBQyxDQUFDLGNBQUY7QUFDQSxFQUFBLENBQUMsQ0FBQyx1QkFBRCxDQUFELENBQTJCLFdBQTNCLENBQXVDLHVCQUF2QztBQUNBLEVBQUEsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQixXQUFuQixDQUErQiwyQkFBL0I7QUFDQSxFQUFBLENBQUMsQ0FBQyx1QkFBRCxDQUFELENBQTJCLFFBQTNC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QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBQ0EsTUFBTSxDQUFDLFFBQUQsQ0FBTixDQUFpQixLQUFqQixDQUF1QixVQUFTLENBQVQsRUFBWTtBQUNqQztBQUNGO0FBQ0E7QUFDRTtBQUNBLEVBQUEsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQixLQUFqQjtBQUNELENBTkQiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIHIoZSxuLHQpe2Z1bmN0aW9uIG8oaSxmKXtpZighbltpXSl7aWYoIWVbaV0pe3ZhciBjPVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmU7aWYoIWYmJmMpcmV0dXJuIGMoaSwhMCk7aWYodSlyZXR1cm4gdShpLCEwKTt2YXIgYT1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK2krXCInXCIpO3Rocm93IGEuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixhfXZhciBwPW5baV09e2V4cG9ydHM6e319O2VbaV1bMF0uY2FsbChwLmV4cG9ydHMsZnVuY3Rpb24ocil7dmFyIG49ZVtpXVsxXVtyXTtyZXR1cm4gbyhufHxyKX0scCxwLmV4cG9ydHMscixlLG4sdCl9cmV0dXJuIG5baV0uZXhwb3J0c31mb3IodmFyIHU9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZSxpPTA7aTx0Lmxlbmd0aDtpKyspbyh0W2ldKTtyZXR1cm4gb31yZXR1cm4gcn0pKCkiLCIvKiA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICAgIENhbGVuZGFyIFRvZ2dsZVxuID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09ICovXG5cbnZhciBjYWxlbmRhckJ1dHRvbnNHcm91cCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5idG4tZ3JvdXAnKVswXVxudmFyIGNhbGVuZGFyQnV0dG9ucyA9IGNhbGVuZGFyQnV0dG9uc0dyb3VwICYmIGNhbGVuZGFyQnV0dG9uc0dyb3VwLmNoaWxkTm9kZXNcbnZhciBjYWxlbmRhcmJ1dHRvbjEgPSBjYWxlbmRhckJ1dHRvbnMgJiYgY2FsZW5kYXJCdXR0b25zWzFdLmlkXG52YXIgY2FsZW5kYXJidXR0b24yID0gY2FsZW5kYXJCdXR0b25zICYmIGNhbGVuZGFyQnV0dG9uc1szXS5pZFxuXG52YXIgY2FsZW5kYXJUb2dnbGVCdXR0b25PbmUgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChjYWxlbmRhcmJ1dHRvbjEpXG52YXIgY2FsZW5kYXJUb2dnbGVCdXR0b25Ud28gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChjYWxlbmRhcmJ1dHRvbjIpXG5cbnZhciBjYWxlbmRhckNhcmRPbmUgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2FsZW5kYXJDYXJkT25lJylcbnZhciBjYWxlbmRhckNhcmRUd28gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2FsZW5kYXJDYXJkVHdvJylcblxuY2FsZW5kYXJUb2dnbGVCdXR0b25PbmUgIT0gbnVsbCAmJlxuICBjYWxlbmRhclRvZ2dsZUJ1dHRvbk9uZS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KClcbiAgICAkKGNhbGVuZGFyVG9nZ2xlQnV0dG9uVHdvKS5yZW1vdmVDbGFzcygnYWN0aXZlLWV2ZW50LWNhbGVuZGFyJylcbiAgICAkKGNhbGVuZGFyQ2FyZFR3bykucmVtb3ZlQ2xhc3MoJ21pei1ldmVudHNfX2dyb3VwLS1hY3RpdmUnKVxuICAgICQoY2FsZW5kYXJUb2dnbGVCdXR0b25Ud28pLmFkZENsYXNzKCdzaGFkb3cnKVxuICAgIGUudGFyZ2V0LmNsYXNzTGlzdC5yZW1vdmUoJ3NoYWRvdycpXG5cbiAgICBlLnRhcmdldC5jbGFzc0xpc3QuYWRkKCdhY3RpdmUtYWNhZGVtaWMtZGF0ZXMnKVxuICAgICQoY2FsZW5kYXJDYXJkT25lKS5hZGRDbGFzcygnbWl6LWV2ZW50c19fZ3JvdXAtLWFjdGl2ZScpXG4gIH0pXG5cbmNhbGVuZGFyVG9nZ2xlQnV0dG9uVHdvICE9IG51bGwgJiZcbiAgY2FsZW5kYXJUb2dnbGVCdXR0b25Ud28uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpXG4gICAgJChjYWxlbmRhclRvZ2dsZUJ1dHRvbk9uZSkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZS1hY2FkZW1pYy1kYXRlcycpXG4gICAgJChjYWxlbmRhckNhcmRPbmUpLnJlbW92ZUNsYXNzKCdtaXotZXZlbnRzX19ncm91cC0tYWN0aXZlJylcbiAgICAkKGNhbGVuZGFyVG9nZ2xlQnV0dG9uT25lKS5hZGRDbGFzcygnc2hhZG93JylcbiAgICBlLnRhcmdldC5jbGFzc0xpc3QucmVtb3ZlKCdzaGFkb3cnKVxuXG4gICAgZS50YXJnZXQuY2xhc3NMaXN0LmFkZCgnYWN0aXZlLWV2ZW50LWNhbGVuZGFyJylcbiAgICAkKGNhbGVuZGFyQ2FyZFR3bykuYWRkQ2xhc3MoJ21pei1ldmVudHNfX2dyb3VwLS1hY3RpdmUnKVxuICB9KVxuXG4vKiA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICAgICAgICBOYXZpZ2F0aW9uXG4gICAgID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09ICovXG52YXIgbWVudUJ1dHRvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uYXZiYXItdG9nZ2xlcicpXG52YXIgc2VhcmNoQnV0dG9uID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm1pei1idXR0b24tLXhzW2RhdGEtdGFyZ2V0PVwiI2NvbGxhcHNlU2VhcmNoQm94XCJdJylcbnZhciBzZWFyY2hJbnB1dCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5pbnB1dC1ncm91cCcpXG52YXIgbmF2YmFyQ29udGVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uYXZiYXItY29sbGFwc2UnKVxudmFyIG5hdkV4cGFuZCA9IFtdLnNsaWNlLmNhbGwoZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLm5hdi1leHBhbmQnKSlcbnZhciBib3R0b21Ud29UaGlyZHNOYXYgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYm90dG9tLXR3by10aGlyZHMtbmF2Jylcbi8vIHZhciBiYWNrTGluayA9IGBcbi8vIDxsaSBpZD1cImJhY2tMaVwiIGNsYXNzPVwibmF2LWl0ZW1cIj5cbi8vICAgPGEgY2xhc3M9XCJuYXYtbGluayBuYXYtYmFjay1saW5rXCIgaHJlZj1cImphdmFzY3JpcHQ6O1wiPlxuLy8gICA8L2E+XG4vLyA8L2xpPmA7XG5cbnNlYXJjaEJ1dHRvbiAmJlxuICBzZWFyY2hCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgaWYgKG5hdmJhckNvbnRlbnQuY2xhc3NMaXN0LmNvbnRhaW5zKCdzaG93JykpIHtcbiAgICAgIG5hdkV4cGFuZC5mb3JFYWNoKGZ1bmN0aW9uKGl0ZW0pIHtcbiAgICAgICAgaXRlbS5jbGFzc0xpc3QucmVtb3ZlKCdhY3RpdmUnKVxuICAgICAgfSlcbiAgICB9XG4gIH0pXG5cbm1lbnVCdXR0b24gJiZcbiAgbWVudUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgICAkKCdib2R5JykuYWRkQ2xhc3MoJ2ZpeGVkUG9zaXRpb24nKVxuICAgIGlmIChuYXZiYXJDb250ZW50LmNsYXNzTGlzdC5jb250YWlucygnc2hvdycpKSB7XG4gICAgICAkKCcubmF2LWV4cGFuZC1jb250ZW50JykuaGlkZSgpXG4gICAgICAkKCdib2R5JykucmVtb3ZlQ2xhc3MoJ2ZpeGVkUG9zaXRpb24nKVxuICAgICAgbmF2RXhwYW5kLmZvckVhY2goZnVuY3Rpb24oaXRlbSkge1xuICAgICAgICBpdGVtLmNsYXNzTGlzdC5yZW1vdmUoJ2FjdGl2ZScpXG4gICAgICB9KVxuICAgICAgc2V0VGltZW91dChmdW5jdGlvbigpIHtcbiAgICAgICAgJCgnLm5hdi1leHBhbmQtY29udGVudCcpLnNob3coKVxuICAgICAgfSwgNTAwKVxuICAgIH1cbiAgfSlcblxuLy8gbmF2RXhwYW5kICYmXG4vLyAgIG5hdkV4cGFuZC5mb3JFYWNoKGl0ZW0gPT4ge1xuLy8gICAgIGl0ZW0ucXVlcnlTZWxlY3RvcihcIi5uYXYtbGlua1wiKS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xuLy8gICAgICAgaWYgKHNlYXJjaElucHV0LmNsYXNzTGlzdC5jb250YWlucyhcInNob3dcIikpIHtcbi8vICAgICAgICAgc2VhcmNoSW5wdXQuY2xhc3NMaXN0LnJlbW92ZShcInNob3dcIik7XG4vLyAgICAgICB9XG4vLyAgICAgICBpdGVtLmNsYXNzTGlzdC5hZGQoXCJhY3RpdmVcIik7XG4vLyAgICAgfSk7XG4vL1xuLy8gICAgIGl0ZW0ucXVlcnlTZWxlY3RvcignLm5hdi1leHBhbmQtY29udGVudCcpLmluc2VydEFkamFjZW50SFRNTChcbi8vICAgICAgICdhZnRlcmJlZ2luJyxcbi8vICAgICAgIGBcbi8vICAgICA8bGkgY2xhc3M9XCJuYXYtaXRlbVwiPlxuLy8gICAgICAgPGEgY2xhc3M9XCJuYXYtbGluayBuYXYtYmFjay1saW5rXCIgaHJlZj1cImphdmFzY3JpcHQ6O1wiPlxuLy8gICAgICAgICAgIDxzcGFuPiR7aXRlbS5jaGlsZE5vZGVzWzFdLmlubmVySFRNTH08L3NwYW4+XG4vLyAgICAgICA8L2E+XG4vLyAgICAgPC9saT5gXG4vLyAgICAgKVxuLy9cbi8vICAgICBpdGVtLnF1ZXJ5U2VsZWN0b3IoXCIubmF2LWJhY2stbGlua1wiKS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xuLy8gICAgICAgdGV4dCA9IFwiXCI7XG4vLyAgICAgICBpdGVtLmNsYXNzTGlzdC5yZW1vdmUoXCJhY3RpdmVcIik7XG4vLyAgICAgfSk7XG4vLyAgIH0pO1xuXG4vKiA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICAgICAgICBQaWxsYXIgQ2FsbG91dCBFeHBhbmQgMi4wXG4gICAgID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09ICovXG5cbnZhciBwaWxsYXJDb250YWluZXIgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncGlsbGFyLWV4cGFuZC1sYXllcicpXG52YXIgYm94MUJ1dHRvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdib3gtMS1idXR0b24nKVxudmFyIGJveDJCdXR0b24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYm94LTItYnV0dG9uJylcbnZhciBib3gzQnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2JveC0zLWJ1dHRvbicpXG52YXIgYm94T25lT3ZlcmxheSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdib3gtMS1vdmVybGF5JylcbnZhciBib3hUd29PdmVybGF5ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2JveC0yLW92ZXJsYXknKVxudmFyIGJveFRocmVlT3ZlcmxheSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdib3gtMy1vdmVybGF5JylcbnZhciBjbG9zZUJ1dHRvbiA9IEFycmF5LnByb3RvdHlwZS5zbGljZS5jYWxsKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5jbG9zZWJ0bicpKVxudmFyIG5leHRCdXR0b24gPSBBcnJheS5wcm90b3R5cGUuc2xpY2UuY2FsbChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcubmV4dGJ0bicpKVxudmFyIHByZXZCdXR0b24gPSBBcnJheS5wcm90b3R5cGUuc2xpY2UuY2FsbChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcucHJldmJ0bicpKVxuXG4vLyBmdW5jdGlvbiBoYW5kbGVDb21tYW5kKGUpIHtcbi8vICAgbGV0IGN1cnJlbnRPdmVybGF5XG4vLyAgIGxldCBuZXh0RWxlbWVudFxuLy8gICBsZXQgcHJlc3NlZCA9IGUudGFyZ2V0LnBhcmVudEVsZW1lbnQuZ2V0QXR0cmlidXRlKCdhcmlhLXByZXNzZWQnKSA9PT0gJ3RydWUnXG4vL1xuLy8gICBpZiAoZS5rZXkgPT09ICcgJyB8fCBlLmtleSA9PT0gJ0VudGVyJyB8fCBlLmtleSA9PT0gJ1NwYWNlYmFyJykge1xuLy8gICAgIGUucHJldmVudERlZmF1bHQoKVxuLy8gICAgIGN1cnJlbnRPdmVybGF5ID0gZS50YXJnZXQucGFyZW50RWxlbWVudC5wYXJlbnRFbGVtZW50LnBhcmVudEVsZW1lbnQucGFyZW50RWxlbWVudFxuLy8gICAgIG5leHRFbGVtZW50ID0gY3VycmVudE92ZXJsYXkubmV4dEVsZW1lbnRTaWJsaW5nXG4vL1xuLy8gICAgIGUudGFyZ2V0LnNldEF0dHJpYnV0ZSgnYXJpYS1wcmVzc2VkJywgIXByZXNzZWQpXG4vLyAgICAgY3VycmVudE92ZXJsYXkuY2xhc3NMaXN0LmFkZCgnaGlkZScpXG4vLyAgICAgbmV4dEVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZSgnaGlkZScpXG4vLyAgIH0gZWxzZSB7XG4vLyAgICAgY3VycmVudE92ZXJsYXkgPSBlLnRhcmdldC5wYXJlbnRFbGVtZW50LnBhcmVudEVsZW1lbnQucGFyZW50RWxlbWVudC5wYXJlbnRFbGVtZW50LnBhcmVudEVsZW1lbnRcbi8vICAgICBuZXh0RWxlbWVudCA9IGN1cnJlbnRPdmVybGF5Lm5leHRFbGVtZW50U2libGluZ1xuLy9cbi8vICAgICBlLnRhcmdldC5wYXJlbnRFbGVtZW50LnNldEF0dHJpYnV0ZSgnYXJpYS1wcmVzc2VkJywgIXByZXNzZWQpXG4vLyAgICAgY3VycmVudE92ZXJsYXkuY2xhc3NMaXN0LmFkZCgnaGlkZScpXG4vLyAgICAgbmV4dEVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZSgnaGlkZScpXG4vLyAgIH1cbi8vIH1cbm5leHRCdXR0b24gJiZcbiAgbmV4dEJ1dHRvbi5mb3JFYWNoKGZ1bmN0aW9uKGJ1dHRvbikge1xuICAgIGJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgICAgIHZhciBjdXJyZW50T3ZlcmxheSA9IGUudGFyZ2V0LnBhcmVudEVsZW1lbnQucGFyZW50RWxlbWVudC5wYXJlbnRFbGVtZW50LnBhcmVudEVsZW1lbnRcblxuICAgICAgY3VycmVudE92ZXJsYXkuY2xhc3NMaXN0LmFkZCgnaGlkZScpXG4gICAgICBjdXJyZW50T3ZlcmxheS5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LnJlbW92ZSgnaGlkZScpXG4gICAgfSlcbiAgfSlcblxucHJldkJ1dHRvbiAmJlxuICBwcmV2QnV0dG9uLmZvckVhY2goZnVuY3Rpb24oYnV0dG9uKSB7XG4gICAgYnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICAgdmFyIGN1cnJlbnRPdmVybGF5ID0gZS50YXJnZXQucGFyZW50RWxlbWVudC5wYXJlbnRFbGVtZW50LnBhcmVudEVsZW1lbnQucGFyZW50RWxlbWVudFxuXG4gICAgICBjdXJyZW50T3ZlcmxheS5jbGFzc0xpc3QuYWRkKCdoaWRlJylcbiAgICAgIGN1cnJlbnRPdmVybGF5LnByZXZpb3VzRWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LnJlbW92ZSgnaGlkZScpXG4gICAgfSlcbiAgfSlcblxuYm94MUJ1dHRvbiAmJlxuICBib3gxQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG4gICAgYm94T25lT3ZlcmxheS5jbGFzc0xpc3QucmVtb3ZlKCdoaWRlJylcbiAgICBib3hUd29PdmVybGF5LmNsYXNzTGlzdC5hZGQoJ2hpZGUnKVxuICAgIGJveFRocmVlT3ZlcmxheS5jbGFzc0xpc3QuYWRkKCdoaWRlJylcbiAgICBwaWxsYXJDb250YWluZXIuY2xhc3NMaXN0LmFkZCgnYWRkT3ZlcmxheScpXG4gIH0pXG5cbmJveDJCdXR0b24gJiZcbiAgYm94MkJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgIGJveFR3b092ZXJsYXkuY2xhc3NMaXN0LnJlbW92ZSgnaGlkZScpXG4gICAgYm94T25lT3ZlcmxheS5jbGFzc0xpc3QuYWRkKCdoaWRlJylcbiAgICBib3hUaHJlZU92ZXJsYXkuY2xhc3NMaXN0LmFkZCgnaGlkZScpXG4gICAgcGlsbGFyQ29udGFpbmVyLmNsYXNzTGlzdC5hZGQoJ2FkZE92ZXJsYXknKVxuICB9KVxuXG5ib3gzQnV0dG9uICYmXG4gIGJveDNCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICBib3hUaHJlZU92ZXJsYXkuY2xhc3NMaXN0LnJlbW92ZSgnaGlkZScpXG4gICAgYm94T25lT3ZlcmxheS5jbGFzc0xpc3QuYWRkKCdoaWRlJylcbiAgICBib3hUd29PdmVybGF5LmNsYXNzTGlzdC5hZGQoJ2hpZGUnKVxuICAgIHBpbGxhckNvbnRhaW5lci5jbGFzc0xpc3QuYWRkKCdhZGRPdmVybGF5JylcbiAgfSlcblxuY2xvc2VCdXR0b24uZm9yRWFjaChmdW5jdGlvbihidXR0b24pIHtcbiAgYnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG4gICAgcGlsbGFyQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoJ2FkZE92ZXJsYXknKVxuICB9KVxufSlcblxuLyogPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgICAgICAgQ2FyZCB3aXRoIFRhYnNcbiAgICAgPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0gKi9cblxuLy8gdmFyIHRhYnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLnRhYlwiKTtcbi8vIHZhciBhbGxUYWJDb250ZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5wYW5lbC1jb250ZW50XCIpO1xuLy9cbi8vIHRhYnMgJiZcbi8vICAgdGFicy5mb3JFYWNoKHRhYiA9PiB7XG4vLyAgICAgdGFiLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBzZXRBY3RpdmVDbGFzcyk7XG4vLyAgIH0pO1xuLy9cbi8vIGZ1bmN0aW9uIHNldEFjdGl2ZUNsYXNzKGUpIHtcbi8vICAgdGFicy5mb3JFYWNoKHRhYiA9PiB7XG4vLyAgICAgdGFiLmNsYXNzTGlzdC5yZW1vdmUoXCJhY3RpdmVcIik7XG4vLyAgICAgdGFiLmNsYXNzTGlzdC5hZGQoXCJncmV5LWJvcmRlci1ib3R0b21cIik7XG4vLyAgIH0pO1xuLy9cbi8vICAgYWxsVGFiQ29udGVudC5mb3JFYWNoKHRhYkNvbnRlbnQgPT4ge1xuLy8gICAgIHRhYkNvbnRlbnQuY2xhc3NMaXN0LmFkZChcImhpZGUtY29udGVudFwiKTtcbi8vICAgICBpZiAodGFiQ29udGVudC5pZCA9PT0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudGFyZ2V0KSB7XG4vLyAgICAgICB0YWJDb250ZW50LmNsYXNzTGlzdC5yZW1vdmUoXCJoaWRlLWNvbnRlbnRcIik7XG4vLyAgICAgfVxuLy8gICB9KTtcbi8vXG4vLyAgIGUuY3VycmVudFRhcmdldC5jbGFzc0xpc3QuYWRkKFwiYWN0aXZlXCIpO1xuLy8gICBlLmN1cnJlbnRUYXJnZXQuY2xhc3NMaXN0LnJlbW92ZShcImdyZXktYm9yZGVyLWJvdHRvbVwiKTtcbi8vIH1cblxuLyogPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgICAgICAgRFJVUEFMXG4gICAgID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09ICovXG5qUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCQpIHtcbiAgLyogPT09PT09PT09PT09PT09XG4gICAgICAgICAgQWxlcnQgTW9kYWxcbiAgICA9PT09PT09PT09PT09PT09PSAqL1xuICAvLyBpbml0aWFsaXplcyBhbmQgaW52b2tlcyB0aGUgbW9kYWwgb24gcGFnZSBsb2FkXG4gICQoJyNhbGVydE1vZGFsJykubW9kYWwoKVxufSlcbiJdfQ==
