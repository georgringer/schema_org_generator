<?php

// Register "schema:" namespace
$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['schema'][] = 'GeorgRinger\\SchemaOrgGenerator\\ViewHelpers';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['schema-org']['transformators'][] =
    \GeorgRinger\SchemaOrgGenerator\Transformator\TtAddressTransformator::class;
