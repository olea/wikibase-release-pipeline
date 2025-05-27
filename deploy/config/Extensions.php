<?php
// ************************************************************************
// Wikibase Suite Deploy Extension.php
// ************************************************************************
//
// File to load MediaWiki extension.
//
// This file will be loaded after all other extensions have been loaded,
// just like as if this code would be at the end of LocalSettings.php.
//
// Make sure to prefix the extensions name with "extensions/" when loading.
// e.g. when extension installation instructions state you need to put
//   wfLoadExtension( 'WikibaseLexeme' );
// here in Wikibase Suite Deploy you need to put
//   wfLoadExtension( 'extensions/WikibaseLexeme' );

// Springboard
wfLoadExtension('extensions/Springboard-main');
require_once('/var/www/html/extensions/extensions/Springboard-main/includes/CustomLoader.php');

// TimedMediaHandler
wfLoadExtension('extensions/TimedMediaHandler');
$wgFFmpegLocation = '/usr/bin/ffmpeg';

// PDF handler
wfLoadExtension( 'PdfHandler' );
// this should be in LocalSettings.php?
$wgPdfProcessor = "gs";
$wgPdfPostProcessor = "convert";
$wgPdfInfo ="pdfinfo";
$wgPdftoText = "pdftotext";
$wgPdfOutputExtension = "png";
$wgPdfHandlerDpi = "300" ;
$wgFileExtensions[] = 'pdf';

// PagedTiffHandler
wfLoadExtension( 'extensions/PagedTiffHandler' );

// VipsScaler
wfLoadExtension( 'extensions/VipsScaler' );

// WikibaseInWikitext
wfLoadExtension( 'extensions/WikibaseInWikitext' );
//$wgWikibaseInWikitextSparqlDefaultUi = $WDQS_PUBLIC_URL ;
$wgWikibaseInWikitextSparqlDefaultUi = "https://wbqs.local/";

// WikibaseQualityConstraints
wfLoadExtension( 'extensions/WikibaseQualityConstraints' );

// WikibaseMediaInfo
wfLoadExtension( 'extensions/WikibaseMediaInfo' );
$wgUploadWizardConfig['wikibase']['enabled'] = true ;
$wgMediaInfoProperties = [ 'depicts' => 'P1', ];
//Links to pages to learn more about wikibase properties:
//$wgMediaInfoHelpUrls =	[ 'P1' => 'https://commons.wikimedia.org/wiki/Special:MyLanguage/Commons:Depicts' ];
//UploadWizard feature-flags:
$wgUploadWizardConfig[ 'wikibase' ][ 'enabled' ] = true;
$wgUploadWizardConfig[ 'wikibase' ][ 'captions' ] = true;
$wgUploadWizardConfig[ 'wikibase' ][ 'statements' ] = true;

