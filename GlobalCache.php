<?php

// mem101
$wgObjectCaches['memcached-mem-1'] = [
	'class'                => MemcachedPeclBagOStuff::class,
	'serializer'           => 'php',
	'persistent'           => false,
	'servers'              => [ '127.0.0.1:11212' ],
	// Effectively disable the failure limit (0 is invalid)
	'server_failure_limit' => 1e9,
	// Effectively disable the retry timeout
	'retry_timeout'        => -1,
	'loggroup'             => 'memcached',
	// 500ms, in microseconds
	'timeout'              => 0.5 * 1e6,
];

// mem131
$wgObjectCaches['memcached-mem-2'] = [
	'class'                => MemcachedPeclBagOStuff::class,
	'serializer'           => 'php',
	'persistent'           => false,
	'servers'              => [ '127.0.0.1:11214' ],
	// Effectively disable the failure limit (0 is invalid)
	'server_failure_limit' => 1e9,
	// Effectively disable the retry timeout
	'retry_timeout'        => -1,
	'loggroup'             => 'memcached',
	// 500ms, in microseconds
	'timeout'              => 0.5 * 1e6,
];

$wgObjectCaches['mysql-multiwrite'] = [
	'class' => MultiWriteBagOStuff::class,
	'caches' => [
		0 => [
			'factory' => [ 'ObjectCache', 'getInstance' ],
			'args' => [ 'memcached-mem-1' ]
		],
		1 => [
			'class' => SqlBagOStuff::class,
			'servers' => [
				[
					'type'      => 'mysql',
					'host'      => 'db121.miraheze.org',
					'dbname'    => 'parsercache',
					'user'      => $wgDBuser,
					'password'  => $wgDBpassword,
					// DBO_SSL is deprecated in 1.39
					// use 'ssl' parameter instead
					'flags'     => DBO_SSL,
					'sslCAFile' => '/etc/ssl/certs/Sectigo.crt',
				],
			],
			'purgePeriod' => 0,
			'tableName' => 'pc',
			'reportDupes' => false
		],
	],
	'replication' => 'async',
	'reportDupes' => false
];

$wgSessionCacheType = 'memcached-mem-2';

$redisServerIP = '[2a10:6740::6:306]:6379';

$wgMainCacheType = 'memcached-mem-2';
$wgMessageCacheType = 'memcached-mem-2';
$wgParserCacheType = 'mysql-multiwrite';

$wgLanguageConverterCacheType = CACHE_ACCEL;

// 10 days
$wgParserCacheExpireTime = 86400 * 10;

// 3 days
$wgRevisionCacheExpiry = 86400 * 3;

$wgDLPQueryCacheTime = 120;
$wgDplSettings['queryCacheTime'] = 120;

// Disable sidebar cache for select wikis as a solution to T8732 and T9699
if ( $wgDBname !== 'solarawiki' && $wgDBname !== 'constantnoblewiki' ) {
	$wgEnableSidebarCache = true;
}

$wgUseLocalMessageCache = true;
$wgInvalidateCacheOnLocalSettingsChange = false;

if ( preg_match( '/^(.*)\.betaheze\.org$/', $wi->server ) ) {
	$redisServerIP = '[2a10:6740::6:406]:6379';

	// Session cache needs to be flipped for betaheze to avoid session conflicts
	$wgSessionCacheType = 'memcached-mem-1';

	$wgMainWANCache = 'betaheze';
	$wgWANObjectCaches['betaheze'] = [
		'class' => WANObjectCache::class,
		'cacheId' => 'memcached-mem-1',
	];
}

$wgJobTypeConf['default'] = [
	'class' => JobQueueRedis::class,
	'redisServer' => $redisServerIP,
	'redisConfig' => [
		'connectTimeout' => 2,
		'password' => $wmgRedisPassword,
		'compression' => 'gzip',
	],
	'claimTTL' => 3600,
	'daemonized' => true,
];

if ( PHP_SAPI === 'cli' ) {
	// APC not available in CLI mode
	$wgLanguageConverterCacheType = CACHE_NONE;
}

unset( $redisServerIP );
