<?php


namespace Raphaelrosello\Blog\Block\Post;


use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;
use Raphaelrosello\Blog\Api\PostRepositoryInterface;
use Raphaelrosello\Blog\Model\Post;

class PostList extends Template implements IdentityInterface
{
    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * @var SortOrderBuilder
     */
    protected $sortOrderBuilder;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    public function __construct(
        PostRepositoryInterface $postRepository,
        SortOrderBuilder $sortOrderBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        Template\Context $context,
        array $data = [])
    {
        $this->postRepository = $postRepository;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getIdentities()
    {
        return [Post::CACHE_TAG.'_'.'list'];
    }

    public function getPosts()
    {
        if (!$this->hasData('posts')) {
            $sortOrder = $this->sortOrderBuilder
                ->setField('created_at')
                ->setDirection(SortOrder::SORT_DESC)
                ->create();

            $searchCriteriaBuilder = $this->searchCriteriaBuilder
                ->addSortOrder($sortOrder)
                ->setPageSize(5)
                ->setCurrentPage(1)
                ->create();

            $posts = $this->postRepository
                ->getList($searchCriteriaBuilder)
                ->getItems();

            $this->setData('posts', $posts);
        }

        return $this->getData('posts');

    }

}