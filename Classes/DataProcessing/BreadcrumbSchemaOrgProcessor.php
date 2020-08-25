<?php

declare(strict_types=1);

namespace GeorgRinger\SchemaOrgGenerator\DataProcessing;

use Spatie\SchemaOrg\Schema;
use TYPO3\CMS\Core\Page\AssetCollector;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class BreadcrumbSchemaOrgProcessor implements DataProcessorInterface
{

    /**
     * @param ContentObjectRenderer $cObj
     * @param array $contentObjectConfiguration
     * @param array $processorConfiguration
     * @param array $processedData
     * @return array
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {
        if (!$processorConfiguration['menus']) {
            return $processedData;
        }

        $items = [];
        $i = 1;
        foreach ($processedData[$processorConfiguration['menus']] as $k => $item) {
            $items[] = Schema::listItem()
                ->setProperty('position', $i)
                ->item(
                    Schema::webPage()
                        ->name($item['title'])
                        ->url($item['uri'])
                        ->setProperty('@id', $item['link'])
                );
            $i++;
        }
        $schemaOrg = Schema::BreadcrumbList()
            ->itemListElement($items);

        $assetCollector = GeneralUtility::makeInstance(AssetCollector::class);
        $assetCollector->addInlineJavaScript('breadcrumb', json_encode($schemaOrg->toArray(), JSON_UNESCAPED_UNICODE));

        return $processedData;
    }
}
