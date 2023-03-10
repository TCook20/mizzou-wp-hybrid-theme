function ClassManipulation() {}
function domTraversal(strDirection, objNode, strTagName) {
	if (
		((strTagName = void 0 !== strTagName ? strTagName.toUpperCase() : null),
		'children' === strDirection)
	) {
		var objSelectedChildNodes = [],
			objChildNodes = objNode.childNodes
		if (0 < objChildNodes.length)
			for (var i = 0; i < objChildNodes.length; i++)
				1 !== objChildNodes[i].nodeType ||
					(objChildNodes[i].nodeName !== strTagName && null !== strTagName) ||
					objSelectedChildNodes.push(objChildNodes[i])
		return objSelectedChildNodes
	}
	for (
		var objCurrentNode = objNode;
		((objCurrentNode =
			'parent' === strDirection
				? objCurrentNode.parentNode
				: 'previous' === strDirection
				? objCurrentNode.previousSibling
				: objCurrentNode.nextSibling) &&
			1 !== objCurrentNode.nodeType) ||
		(null !== strTagName && null !== objCurrentNode && objCurrentNode.nodeName !== strTagName);

	);
	return objCurrentNode
}
ClassManipulation.prototype = {
	hasClass: function (objNode, strTargetClass) {
		return null !== objNode.className.match(new RegExp('(\\s|^)' + strTargetClass + '(\\s|$)'))
	},
	addClass: function (objNode, strTargetClass) {
		this.hasClass(objNode, strTargetClass) || (objNode.className += ' ' + strTargetClass),
			(objNode.className = this.trim(objNode.className))
	},
	removeClass: function (objNode, objRegexp) {
		this.hasClass(objNode, objRegexp) &&
			((objRegexp = new RegExp('(\\s|^)' + objRegexp + '(\\s|$)')),
			(objNode.className = objNode.className.replace(objRegexp, ' '))),
			(objNode.className = this.trim(objNode.className))
	},
	toggleClass: function (objNode, strTargetClass) {
		var objRegexp
		this.hasClass(objNode, strTargetClass)
			? ((objRegexp = new RegExp('(\\s|^)' + strTargetClass + '(\\s|$)')),
			  (objNode.className = objNode.className.replace(objRegexp, ' ')))
			: (objNode.className += ' ' + strTargetClass),
			(objNode.className = this.trim(objNode.className))
	},
	trim: function (strToTrim) {
		return strToTrim.replace(/^\s+|\s+$/g, '')
	},
}
var objClassManipulation = new ClassManipulation()
function toggleMenuVisibility(objEvent) {
	return (
		objEvent.preventDefault(),
		objClassManipulation.toggleClass(
			domTraversal('parent', domTraversal('parent', this)),
			'nav--hide',
		),
		!1
	)
}
function setupMobileMenuButton(objHTMLTag, strCloneToSelector, strMenuTitle) {
	var objClonedElement,
		objElements,
		objElementsToCloneTo,
		objMobileMenuButton,
		objMobileMenuButtonLink,
		objMobileMenuButtonHeader
	if (
		(void 0 === strMenuTitle && (strMenuTitle = 'Menu'),
		0 < (objElements = document.querySelectorAll(objHTMLTag)).length)
	) {
		for (var i = 0; i < objElements.length; i++) {
			if (
				void 0 !== strCloneToSelector &&
				!1 !== strCloneToSelector &&
				0 < (objElementsToCloneTo = document.querySelectorAll(strCloneToSelector)).length
			) {
				;(objClonedElement = objElements[i].cloneNode(!0)).removeAttribute('id')
				for (var intClones = 0; intClones < objElementsToCloneTo.length; intClones++)
					objElementsToCloneTo[intClones].appendChild(objClonedElement)
			}
			;(objMobileMenuButton = document.createElement('div')),
				objClassManipulation.addClass(objMobileMenuButton, 'nav__mobile-menu-button'),
				((objMobileMenuButtonLink = document.createElement('a')).href = '#'),
				(objMobileMenuButtonLink.tabIndex = 0),
				objClassManipulation.addClass(objMobileMenuButtonLink, 'nav__mobile-menu-button-link'),
				(objMobileMenuButtonHeader = document.createElement('span')),
				objClassManipulation.addClass(objMobileMenuButtonHeader, 'nav__mobile-menu-button-header'),
				objMobileMenuButtonHeader.appendChild(document.createTextNode(strMenuTitle)),
				objMobileMenuButtonLink.appendChild(objMobileMenuButtonHeader),
				objMobileMenuButton.appendChild(objMobileMenuButtonLink),
				objMobileMenuButtonLink.addEventListener('click', toggleMenuVisibility),
				objElements[i].insertBefore(objMobileMenuButton, objElements[i].firstChild),
				objClassManipulation.hasClass(objElements[i], 'nav--open-by-default') ||
					objClassManipulation.addClass(objElements[i], 'nav--hide')
		}
		0 < (objHTMLTag = document.getElementsByTagName('html')).length &&
			objClassManipulation.addClass(objHTMLTag[0], 'has-mobile-menu-button')
	}
}
const accordionItem = document.getElementsByClassName('miz-accordion__item'),
	accordionHeader = document.getElementsByClassName('miz-accordion__header'),
	accordionTrigger = document.getElementsByClassName('miz-accordion__trigger'),
	accordionContent = document.getElementsByClassName('miz-accordion__content')
for (let i = 0; i < accordionItem.length; i += 1)
	accordionHeader[i].addEventListener('click', function () {
		accordionContent[i].classList.contains('collapsed')
			? (accordionContent[i].classList.replace('collapsed', 'expanded'),
			  accordionTrigger[i].setAttribute('aria-expanded', !0))
			: (accordionContent[i].classList.replace('expanded', 'collapsed'),
			  accordionTrigger[i].setAttribute('aria-expanded', !1))
	})
setupMobileMenuButton('.nav--primary-navigation', '#mobile-nav')
