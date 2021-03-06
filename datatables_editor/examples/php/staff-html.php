<?php

/*
 * Example PHP implementation used for the htmlTable.html example
 */

// DataTables PHP library
include( "../../php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

Editor::inst( $db, 'tariff' )
	->fields(
		Field::inst( 'resource' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'tariff_name' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'measure' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'value' )
			->validator( 'Validate::numeric' )
			->getFormatter( function ( $val ) {
				return '$'.number_format($val);
			} )
			->setFormatter( 'Format::ifEmpty', null )
	)
	->process( $_POST )
	->json();

Editor::inst( $db, 'building' )
	->fields(
		Field::inst( 'building_address' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'apartaments_number' )
			->validator( 'Validate::numeric' )
			->getFormatter( function ( $val ) {
				return '$'.number_format($val);
			} )
			->setFormatter( 'Format::ifEmpty', null ),
		Field::inst( 'non_live_number' )
			->validator( 'Validate::numeric' )
			->getFormatter( function ( $val ) {
				return '$'.number_format($val);
			} )
			->setFormatter( 'Format::ifEmpty', null ),
		Field::inst( 'equipmens_number' )
			->validator( 'Validate::numeric' )
			->getFormatter( function ( $val ) {
				return '$'.number_format($val);
			} )
			->setFormatter( 'Format::ifEmpty', null ),
		Field::inst( 'ODU_counters_number' )
			->validator( 'Validate::numeric' )
			->getFormatter( function ( $val ) {
				return '$'.number_format($val);
			} )
			->setFormatter( 'Format::ifEmpty', null )
	)
	->process( $_POST )
	->json();
