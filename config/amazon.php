<?php

return [

	/**
	 * Your access key.
	 */
	'access_key' => env('AMAZON_ACCESS_KEY', 'AKIAJZNOIOLLW22L7FWQ'),

	/**
	 * Your secret key.
	 */
	'secret_key' => env('AMAZON_SECRET_KEY', 'fYQxjSI/H4uA8za4TjlA3Rt9uNVEcwQ5k4dM3YFX'),

	/**
	 * Your affiliate associate tag.
	 */
	'associate_tag' => env('AMAZON_ASSOCIATE_TAG', 'eva01-21'),

	/**
	 * Preferred locale
	 */
	'locale' => env('AMAZON_LOCALE', 'com'),

	/**
	 * Preferred response group
	 */
	'response_group' => env('AMAZON_RESPONSE_GROUP', 'Images,ItemAttributes'),

        /**
         * Preferred search index
         */
	'search_index' => env('AMAZON_SEARCH_INDEX', 'All'),


];
