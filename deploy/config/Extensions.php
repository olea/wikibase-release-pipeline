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
// wfLoadExtension( 'extensions/WikibaseLexeme' );

# Enable multilanguage labels
## Mediawiki 1.44
$wgWBRepoSettings['EnableMulLanguageCode'] = true;

# Enable UniversalLanguageSelector
# (seems it's required for the Openrefine reconcilator to work)
wfLoadExtension( 'UniversalLanguageSelector' );


//FIX ME Extension:UrlShortner
//wfLoadExtension( 'extensions/UrlShortner');

//FIX ME Extension:WikibaseFacetedSearch
//See https://professional.wiki/en/extension/wikibase-faceted-search#Installation
//wfLoadExtension( 'WikibaseFacetedSearch' );


# activate UploadWizard extension:
$wgEnableUploads = true;
$wgUseImageMagick = true;
//$wgImageMagickConvertCommand = <path to your convert command>;  # Only needs to be set if different from /usr/bin/convert
wfLoadExtension( 'extensions/UploadWizard' );
// we keep this installed for the moment but with no use because is hardcoded for Wikimedia Commons


// Springboard: seems it will never be an universal mediawiki extensions installer.
/// wfLoadExtension('extensions/Springboard-main');
/// require_once('/var/www/html/extensions/extensions/Springboard-main/includes/CustomLoader.php');


// TimedMediaHandler
//FIX THIS wfLoadExtension('extensions/TimedMediaHandler');
$wgFFmpegLocation = '/usr/bin/ffmpeg';
// read more at https://www.mediawiki.org/wiki/Extension:TimedMediaHandler


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
// read more at https://www.mediawiki.org/wiki/Extension:PagedTiffHandler
// WE SHOULD to verify these are the real paths:
// Path to identify
$wgImageMagickIdentifyCommand = '/usr/bin/identify';
// Use exiv2? if false, MediaWiki's internal EXIF parser will be used
$wgTiffUseExiv = true;
// Path to exiv2 (MediaWiki core configuration option)
$wgExiv2Command = '/usr/bin/exiv2';
// Use tiffinfo? if false, ImageMagick's identify command will be used
$wgTiffUseTiffinfo = false;
// Path to tiffinfo
// $wgTiffTiffinfoCommand = '/usr/bin/tiffinfo';

// VipsScaler
wfLoadExtension( 'extensions/VipsScaler' );
// read more at https://www.mediawiki.org/wiki/Extension:VipsScaler


# activate MediaSearch extension:
wfLoadExtension( 'extensions/MediaSearch' );
$wgMediaSearchExternalEntitySearchBaseUri = '';
$wgMediaSearchExternalSearchUri = '';

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

// activate WikibaseQualityConstraints extension:
// wfLoadExtension( 'extensions/WikibaseQualityConstraints' );  // FIX THIS
// we need to figure out how to set up everything for this.


// WikibaseMediaInfo
wfLoadExtension( 'extensions/WikibaseMediaInfo' );
$wgUploadWizardConfig['wikibase']['enabled'] = true ;
// set to the definitive 
$wgMediaInfoProperties = [ 'depicts' => 'P1', ]; // FIX THIS
//Links to pages to learn more about wikibase properties:
$wgMediaInfoHelpUrls =	[ 'P1' => 'https://commons.wikimedia.org/wiki/Special:MyLanguage/Commons:Depicts' ]; // FIX THIS
//UploadWizard feature-flags:
$wgUploadWizardConfig[ 'wikibase' ][ 'enabled' ] = true;
$wgUploadWizardConfig[ 'wikibase' ][ 'captions' ] = true;
$wgUploadWizardConfig[ 'wikibase' ][ 'statements' ] = true;


// WikibaseInWikitext
wfLoadExtension( 'extensions/WikibaseInWikitext' );
//$wgWikibaseInWikitextSparqlDefaultUi = $WDQS_PUBLIC_URL ;
//$wgWikibaseInWikitextSparqlDefaultUi = "https://wbqs.local/";  // FIX THIS
$wgWikibaseInWikitextSparqlDefaultUi = "https://grafoq.laoficinacultural.org/";

// WikibaseLexeme
wfLoadExtension( 'extensions/WikibaseLexeme' );


// WikibaseLexemeCirrusSearch
wfLoadExtension( 'extensions/WikibaseLexemeCirrusSearch' );
$wgLexemeUseCirrus = true;


// activate PropertySuggester extension:
// wfLoadExtension( 'extensions/PropertySuggester' );  // FIX THIS
// can't activate until set up a workflow/automatism for updating the suggestions db
// RFE added to https://docs.google.com/spreadsheets/d/1cRp5ZkSdfaRuMfosaFkCfTCtOsMcg17H1OC9sMBh0kM/
// read more at https://gerrit.wikimedia.org/r/plugins/gitiles/wikibase/property-suggester-scripts/


// Extension:WikibaseManifest things
// this should use external variables for the services names,
// but it's a job for me from the future.
$wgWbManifestExternalServiceMapping = [
	// WDQS_PUBLIC_HOST
	'queryservice_ui' => "{$wdqs_frontend_url}", 
	'queryservice' => "{$wdqs_endpoint_url}",	
	// QUICKSTATEMENTS_PUBLIC_URL
	'quickstatements' => "{$quickstatements_url}",
	// OPENREFINE_VERSION ?
	// RECONCILE_PORT=8000
	'openrefine_reconcile' => "{$wgServer}:8000/\${lang}/api",
];

// Citoid
wfLoadExtension( 'extensions/TemplateData' );
wfLoadExtension( 'extensions/TemplateStyles' );
wfLoadExtension( 'extensions/Cite' );
wfLoadExtension( 'extensions/Citoid' );
$wgCitoidServiceUrl = "https://es.wikipedia.org/api/rest_v1/data/citation";


// skin!!
$wgDefaultSkin = 'vector-2022';

// Access control
$wgGroupPermissions['user']['read'] = true;  // logged-in users only
// FIX ME: we need to disable this for the benefit of current ttl2wb.py script
// $wgGroupPermissions['*']['read']  = false;   // anons can’t read
$wgWhitelistRead = [ 'Main Page', 'Special:UserLogin', 'Special:CreateAccount' ]; // optional
