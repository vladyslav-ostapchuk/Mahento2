<?php

declare(strict_types=1);

namespace Mageplaza\HelloWorld\ViewModel;

use \Magento\Catalog\Model\CategoryRepository;

class SubCategory extends \Magento\Framework\View\Element\Template implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    public function __construct(

        \Magento\Framework\Registry $coreRegistry,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
    ) {
        $this->coreRegistry        = $coreRegistry;
        $this->categoryFactory     = $categoryFactory;
    }

    public function getCategories()
    {

        $category = $this->getCurrentCategory();
        if (!$category) return;

        $categoryId = $category->getId();

        $model = $this->categoryFactory->create();
        $categories = $model->getCollection()
            ->addAttributeToSelect(['name'])
            ->addAttributeToFilter('parent_id', $categoryId)
            ->addIsActiveFilter();

        return $categories;
    }
    public function getCurrentCategory()
    {
        return $this->coreRegistry->registry('current_category');
    }
}
