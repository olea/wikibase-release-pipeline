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

// Springboard: seems it will never be an universal mediawiki extensions installer.
/// wfLoadExtension('extensions/Springboard-main');
/// require_once('/var/www/html/extensions/extensions/Springboard-main/includes/CustomLoader.php');

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

// extensions distributed in WBS but not activated:
// CiteThisPage
wfLoadExtension( 'CiteThisPage' );
// Gadgets
wfLoadExtension( 'Gadgets' );
// MultimediaViewer
wfLoadExtension( 'MultimediaViewer' );
// PageImages
wfLoadExtension( 'PageImages' );
// Thanks
wfLoadExtension( 'Thanks' );
// Echo
wfLoadExtension( 'Echo' );


// Wikibase extensions:
// WikibaseQualityConstraints
wfLoadExtension( 'extensions/WikibaseQualityConstraints' );

// WikibaseMediaInfo
wfLoadExtension( 'extensions/WikibaseMediaInfo' );
$wgUploadWizardConfig['wikibase']['enabled'] = true ;
// set to the definitive 
$wgMediaInfoProperties = [ 'depicts' => 'P1', ];
//Links to pages to learn more about wikibase properties:
//$wgMediaInfoHelpUrls =	[ 'P1' => 'https://commons.wikimedia.org/wiki/Special:MyLanguage/Commons:Depicts' ];
//UploadWizard feature-flags:
$wgUploadWizardConfig[ 'wikibase' ][ 'enabled' ] = true;
$wgUploadWizardConfig[ 'wikibase' ][ 'captions' ] = true;
$wgUploadWizardConfig[ 'wikibase' ][ 'statements' ] = true;

// WikibaseInWikitext
wfLoadExtension( 'extensions/WikibaseInWikitext' );
//$wgWikibaseInWikitextSparqlDefaultUi = $WDQS_PUBLIC_URL ;
$wgWikibaseInWikitextSparqlDefaultUi = "https://wbqs.local/";

// WikibaseLexeme
wfLoadExtension( 'extensions/WikibaseLexeme' );

// WikibaseLexemeCirrusSearch
wfLoadExtension( 'extensions/WikibaseLexemeCirrusSearch' );

// PropertySuggester
wfLoadExtension( 'extensions/PropertySuggester' );


// Extension:WikibaseManifest things

// this should use external variables for the services names,
// but it's a job for me from the future.
$wgWbManifestExternalServiceMapping = [
        // WDQS_PUBLIC_HOST
	'queryservice_ui' => 'https://wbqs.local',
        # queryservice is derived from Wikibase config if left out:
	'queryservice' => 'https://wbqs.local/sparql',
	// QUICKSTATEMENTS_PUBLIC_URL
	'quickstatements' => 'https://wb.local/tools/quickstatements',
	// OPENREFINE_VERSION ?
	// RECONCILE_PORT=8000
	'openrefine_reconcile' => 'https://wbqs.local:8000/${lang}/api',
];
