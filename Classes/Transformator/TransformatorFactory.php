<?php

declare(strict_types=1);

namespace GeorgRinger\SchemaOrgGenerator\Transformator;


use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class TransformatorFactory implements SingletonInterface
{

    /**
     * @param $in
     * @return TransformatorInterface
     * @todo finalize
     */
    public function getTransformatorForObject($in): ?TransformatorInterface
    {
        $transformators = [
            TtAddressTransformator::class,
        ];
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
