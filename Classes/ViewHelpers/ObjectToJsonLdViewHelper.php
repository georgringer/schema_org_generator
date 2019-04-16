<?php

namespace GeorgRinger\SchemaOrgGenerator\ViewHelpers;

use GeorgRinger\SchemaOrgGenerator\Transformator\TransformatorFactory;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\Type;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class ObjectToJsonLdViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('object', 'object', 'Object', true);
        $this->registerArgument('link', 'link', 'string', false, '');
        $this->registerArgument('extra', 'Extra information', 'array', false, []);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return int
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    )
    {
       $factory = GeneralUtility::makeInstance(TransformatorFactory::class);
       $transformator = $factory->getTransformatorForObject($arguments['object'], $arguments['link'], $arguments['extra']);
       if ($transformator) {
           $schemaType = $transformator->transform($arguments['object']);
           return $schemaType->toScript();
       }
    }
}
