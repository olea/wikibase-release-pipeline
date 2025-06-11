// Extension:WikibaseManifest things

// this should use external variables for the services names
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
