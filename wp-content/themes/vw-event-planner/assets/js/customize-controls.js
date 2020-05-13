( function( api ) {

	// Extends our custom "vw-event-planner" section.
	api.sectionConstructor['vw-event-planner'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );