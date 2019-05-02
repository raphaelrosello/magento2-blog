<?php


namespace Rrosello\Blog\Block\Category;


use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Rrosello\Blog\Api\CategoryRepositoryInterface;

class CategoryList extends Template
{

    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    public function __construct(
        Template\Context $context,
        CategoryRepositoryInterface $categoryRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = [])
    {
        $this->categoryRepository = $categoryRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getCategories()
    {
        if (!$this->hasData('categories')) {
            $categories = $this->categoryRepository->getList(
                $this->searchCriteriaBuilder->create()
            )->getItems();

            $this->setData('categories', $categories);
        }

        return $this->getData('categories');
    }

}