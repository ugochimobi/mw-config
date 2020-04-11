<?php

$wi->config->settings['wgLBFactoryConf']['default'] = [
	'class' => 'LBFactoryMulti',
	'sectionsByDB' => [
		// large wikis
		'anterrawiki' => 'c4',
		'jayuvandalwiki' => 'c4',
		'ciptamediawiki' => 'c4',
		'bpwiki' => 'c4',
		'terribletvshowswiki' => 'c4',
		'osaindexwiki' => 'c4',
		'newusopediawiki' => 'c4',
		'mc2wiki' => 'c4',
		'jawp2chwiki' => 'c4',
		'sumroletaericwiki' => 'c4',
		'sidemwiki' => 'c4',
		'ranchstorywiki' => 'c4',
		'maiasongcontestwiki' => 'c4',
		'awesomegameswiki' => 'c4',
		'animebathswiki' => 'c4',
		'americangirldollswiki' => 'c4',
		'schattenvonskeloswiki' => 'c4',
		's23wiki' => 'c4',
		'libertygamewiki' => 'c4',
		'healthyfandomsandandhatedomwiki' => 'c4',
		'gyaanipediawiki' => 'c4',
		'bigforestwiki' => 'c4',
		'2b2twiki' => 'c4',
		'simswiki' => 'c4',
		'frikipediawiki' => 'c4',
		'uncyclomirrorwiki' => 'c4',
		'baobabarchiveswiki' => 'c4',
		'zhdelwiki' => 'c4',
		'allthetropeswiki' => 'c4',

		'test2wiki' => 'c4',
		'altversewiki' => 'c4',
		'anotheredenwiki' => 'c4',
		'concordancewiki' => 'c4',
		'dreamversewiki' => 'c4',
		'nbdbwiki' => 'c4',
		'nonbinarywiki' => 'c4',
		'onepiecewiki' => 'c4',
		'onepiecebountyrushwiki' => 'c4',
		'openhatchwiki' => 'c4',
		'proxybotwiki' => 'c4',
		'rotompediawiki' => 'c4',
		'staffwiki' => 'c4',
		'testwiki' => 'c4',
		'buswiki' => 'c4',
		'tmewiki' => 'c4',
		'vsrecommendedgameswiki' => 'c4',
		'animatedfeetwiki' => 'c4',
		'crappygameswiki' => 'c4',
		'anglishwiki' => 'c4',
		'trollpastawiki' => 'c4',
		'poserdazfreebieswiki' => 'c4',
		'nltramswiki' => 'c4',
		'beidipediawiki' => 'c4',
		'nilamwikiubzx217c40wiki' => 'c4',
		'bluepageswiki' => 'c4',
		'awfulmovieswiki' => 'c4',
		'uncyclopediawiki' => 'c4',
		'tolololpediawiki' => 'c4',
		'platprojectwiki' => 'c4',
		'trollpastawikiwiki' => 'c4',
		'ansaikuropediawiki' => 'c4',
		'pluspiwiki' => 'c4',
		'csydeswiki' => 'c4',
		'atrociousyoutuberswiki' => 'c4',
		'nonciclopediawiki' => 'c4',
		'toxicfandomsandhatedomswiki' => 'c4',
		'nonsensopediawiki' => 'c4',

		'nenawikiwiki' => 'c4',
		'ndgwiki' => 'c4',
 	],
	'sectionLoads' => [
		'DEFAULT' => [
			'dbt1' => 1,
		],
		'c1' => [
			'dbt1' => 1,
		],
		'c4' => [
 			'db7' => 1,
 		],
	],
	'serverTemplate' => [
		'dbname' => $wgDBname,
		'user' => $wgDBuser,
		'password' => $wgDBpassword,
		'type' => 'mysql',
		'flags' => DBO_SSL | DBO_COMPRESS,
		'sslCertPath' => '/etc/ssl/certs/wildcard.miraheze.org.crt',
		'sslKeyPath' => '/etc/ssl/private/wildcard.miraheze.org.key',
	],
	'hostsByName' => [
		'dbt1' => 'dbt1.miraheze.org',
		'db7' => 'db7.miraheze.org',
	],
	'externalLoads' => [
		'echo' => [
			'dbt1' => 1, // should echo c1
		],
	],
	'readOnlyBySection' => [
		// 'DEFAULT' => 'Maintenance ongoing on the database server.',
		// 'c1' => 'Maintenance ongoing on the database server.',
		// 'c4' => 'Maintenance ongoing on the database server.',
	],
];
