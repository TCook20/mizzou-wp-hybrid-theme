// editor.js
wp.domReady(function () {
	// Disable Core Blocks
	// wp.blocks.unregisterBlockType('core/audio');
	// wp.blocks.unregisterBlockType('core/buttons');
	// wp.blocks.unregisterBlockType('core/calendar');
	// wp.blocks.unregisterBlockType('core/cover');
	// wp.blocks.unregisterBlockType('core/file');
	// wp.blocks.unregisterBlockType('core/latest-comments');
	// wp.blocks.unregisterBlockType('core/more');
	// wp.blocks.unregisterBlockType('core/nextpage');
	// wp.blocks.unregisterBlockType('core/search');
	// wp.blocks.unregisterBlockType('core/tag-cloud');
	// wp.blocks.unregisterBlockType('core/verse');
	// wp.blocks.unregisterBlockType('core/video');

	// Disable Embed Types
	wp.blocks.unregisterBlockVariation('core/embed', 'amazon-kindle')
	wp.blocks.unregisterBlockVariation('core/embed', 'animoto')
	wp.blocks.unregisterBlockVariation('core/embed', 'cloudup')
	wp.blocks.unregisterBlockVariation('core/embed', 'collegehumor')
	wp.blocks.unregisterBlockVariation('core/embed', 'crowdsignal')
	wp.blocks.unregisterBlockVariation('core/embed', 'dailymotion')
	wp.blocks.unregisterBlockVariation('core/embed', 'imgur')
	wp.blocks.unregisterBlockVariation('core/embed', 'issuu')
	wp.blocks.unregisterBlockVariation('core/embed', 'kickstarter')
	wp.blocks.unregisterBlockVariation('core/embed', 'meetup-com')
	wp.blocks.unregisterBlockVariation('core/embed', 'mixcloud')
	wp.blocks.unregisterBlockVariation('core/embed', 'reddit')
	wp.blocks.unregisterBlockVariation('core/embed', 'reverbnation')
	wp.blocks.unregisterBlockVariation('core/embed', 'screencast')
	wp.blocks.unregisterBlockVariation('core/embed', 'scribd')
	wp.blocks.unregisterBlockVariation('core/embed', 'slideshare')
	wp.blocks.unregisterBlockVariation('core/embed', 'smugmug')
	wp.blocks.unregisterBlockVariation('core/embed', 'soundcloud')
	wp.blocks.unregisterBlockVariation('core/embed', 'speaker-deck')
	wp.blocks.unregisterBlockVariation('core/embed', 'spotify')
	wp.blocks.unregisterBlockVariation('core/embed', 'tiktok')
	wp.blocks.unregisterBlockVariation('core/embed', 'tumblr')
	wp.blocks.unregisterBlockVariation('core/embed', 'videopress')
	wp.blocks.unregisterBlockVariation('core/embed', 'wordpress')
	wp.blocks.unregisterBlockVariation('core/embed', 'wordpress-tv')
})
