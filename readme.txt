=== Simple Location ===
Contributors: dshanske
Tags: geolocation, geo, maps, location, indieweb
Stable tag: 3.2.1
Requires at least: 4.7
Tested up to: 4.8.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds geographic location support to WordPress.

== Description == 

Supports adding geo coordinates or textual description to a post, comment, user, or attachment. Will be supporting saving a 
location as a venue for reuse. Offers choice of map displays.

It supports retrieving location using the HTML5 geolocation API. As it stores the GeoData in a 
WordPress standard format, Geodata can also be added from other plugins.

Offers the opportunity to change the displayed timezone on a per-post basis for those posts from far off locations and set this based on the coordinates of the location.

== Other Notes == 

* API Keys are required to use [Google Static Maps](https://developers.google.com/maps/documentation/javascript/get-api-key), [Mapbox Static Maps](https://www.mapbox.com/help/create-api-access-token/), or [Bing Maps](https://www.bingmapsportal.com/). 
If not provided there will be no map displayed regardless of setting. The appropriate API keys should be entered in Settings>>Media or within the admin interface at /wp-admin/options-media.php.

* You can filter any query or archive by adding `?geo={all|public|text}` to it to show only public posts with location. Adding /geo/all to the homepage or archive pages should also work

* Chrome Users: The button that retrieves the location using the HTML5 geolocation API will not work on Chrome if your website is not secure(https). This is a Chrome decision to ensure safe control of personal
data.

* The Development Version as well as support can be found on [Github](https://github.com/dshanske/simple-location).

== Venues ==

Venues are locations stored as a custom taxonomy in WordPress using the Term Metadata functionality added in Version 4.4 of WordPress. Venues as taxonomies
have the advantage of supporting an archive page of all posts from that location and giving the location a permalink on your site. To add anything more than a basic location you will have to create a venue unlike in earlier versions of the plugin.

== WordPress GeoData ==

[WordPress Geodata](http://codex.wordpress.org/Geodata) is an existing standard
used to store geodata about a post, user, comment, or term.

It consists of four fields: latitude, longitude, public, and address. The plugin also saves zoom which is for the purpose of map display.

== Upgrade Notice ==

Recommend backup before upgrade to Version 3.0.0 due to the start of venue support. Full location data will not be saved in the post and old posts will be converted. The display name will be saved if set, otherwise a display name will be set from the coordinates. An API key
will now be required to show maps for services that require API keys.

== Changelog ==

= Version 3.2.1 =
	* Show settings for current default map provider only
	* Add style settings for each map provider ( props @miklb )

= Version 3.2.0 =
	* Allow passing of coordinates directly in constructor for map provider
	* Switch to argument array instead of individual properties for most display and data functions
	* Support per post zoom settings
	* Set initial map zoom based on geolocation accuracy
	* Quick and dirty Bing Maps support
	* Set location metadata for attachments if in EXIF data
	* Add location metabox to attachments
	* Add arguments for marking up location
	* Add GEORSS support from defunct project

= Version 3.1.0 =
	* New release with more functionality coming soon
	* `get_geodata` function now supports WP_Post, WP_Comment, and WP_Term objects
	* Fix registration of default settings
	* Add global setting for public or private by default
	* Switch from admin ajax to REST Route API for simple endpoints
	* Add map endpoint to retrieve a URL for a map based on coordinates
	* Add reverse endpoint to retrieve an address object based on coordinates
	* Allow arguments to be passed to map provider
	* Remove popup location metabox and replace with slidedown metabox
	* Combine geolocation and reverse lookup buttons
	* Set public/private to system default if post is published outside of Post UI

= Version 3.0.4 =
	* Fix Activation Issue
= Version 3.0.3 =
	* Add support for queries and permalinks to show location enabled posts
	* Use built-in WP timezone list generation code
	* Fix error with private setting
	* Put in check for improperly timezone setting to avoid exception error

= Version 3.0.2 =
	* Continuing to iterate based on initial feedback to 3.0.0
	* Timezone box now hidden until checked
	* Timezone now stored in geo_timezone in interest of consistency
	* Icon Size for some fixed
	* Priority of location and map box increased
	* Text added to Location box to explain how to complete
	* Constant SLOC_PUBLIC and filter geo_public_default allow the default to be changed from public(1) to private(0) if no geo_public is set
	* Display Address generation tweaks
	* Display now shows all HTML5 geolocation API stats.

= Version 3.0.1 =
	* Some quick fixes on the release. Due to issues with the removal of the old location data, it will no longer be removed. Instead only the extra display metadata will be removed.
	* If there is no geo_address set and there are coordinates a geo_address will be automatically set along with timezone
	

= Version 3.0.0 =
	* New Version Takes Advantage of new WordPress Term Metadata to create Venues (Feature disabled until future release)
	* The most Javascript I've ever used in a WordPress plugin. Retrieving location information is now done without page refresh.
	* Timezone Override is set by location lookup.
	* Google Map Services will now require an API key to be provided.
	* MapBox is now the static map provider if you are using OSM maps and an API key must be provided
	* You Can Now Choose Map Providers but not reverse lookup providers which may come in future
	* Full Address data is no longer stored in the post. You will have the choice of either a textual description and coordinates in the post
	or assigning a venue which can have full data. Venue support in future version and is disabled here.
	* Warnings no longer showing in debug logs.
	* Displayed name and timezone are now set if Micropub plugin provides geo coordinates


= Version 2.1.0 =
	* Revamp in Text Display Parameters, now offering three levels of Detail
	* Coordinates will now display and Location will link to map if set for full address

= Version 2.0.3 =
	* Google Static Maps now link to Google Maps
	* Nominatim now defaultly tries to retrieve in the language of the blog

= Version 2.0.2 =
	* Fixed formatting on timezone feature as it was not displaying the proper
		date formatting and falling back to default

= Version 2.0.1 = 
	* Option to override the displayed timezone on a per post basis for posts
		made at a location other than the default

= Version 2.0 =
	* Complete Rewrite with improved scoping
	* Google Maps is now a provider of static maps
	* Maps providers are built with a common interface to allow multiple providers

= Version 1.0.1 =
	* Some refinements to the presentation

= Version 1.0 =
	* Initial Release

