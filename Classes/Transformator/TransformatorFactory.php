<?php
declare(strict_types=1);

namespace GeorgRinger\SchemaOrgGenerator\Transformator;

/**
 * This file is part of the "schema_org_generator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Return available transformator
 */
class TransformatorFactory implements SingletonInterface
{

    /**
     * @param mixed $in
     * @return TransformatorInterface
     */
    public function getTransformatorForObject($in): ?TransformatorInterface
    {
        $transformators = (array)$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['schema-org']['transformators'];
        foreach ($transformators as $transformator) {
            /** @var TransformatorInterface $instance */
            $instance = GeneralUtility::makeInstance($transformator);
            if ($instance->canHandle($in)) {
                return $instance;
            }
        }
        return null;
    }
}
