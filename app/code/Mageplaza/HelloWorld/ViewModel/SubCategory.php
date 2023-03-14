<?php

namespace Mageplaza\HelloWorld\ViewModel;

use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class SubCategory implements ArgumentInterface
{
    /**
     * @var Category
     */
    protected $_registry;

    /**
     * @var CollectionFactory
     */
    protected $_categoryCollectionFactory;

    /**
     * @param \Magento\Framework\Registry $registry
     * @param CollectionFactory $categoryCollectionFactory
     */
    public function __construct(
        \Magento\Framework\Registry $registry,
        CollectionFactory $categoryCollectionFactory
    ) {
        $this->_registry = $registry;
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
    }

    /**
     * Retrieve child categories of the current category
     *
     * @return Category[]
     */
    public function getCategories()
    {
        $category = $this->_registry->registry('current_category');
        if (!$category || !$category->getId()) {
            return [];
        }

        $collection = $this->_categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addIdFilter($category->getChildren());

        return $collection->getItems();
    }
}
