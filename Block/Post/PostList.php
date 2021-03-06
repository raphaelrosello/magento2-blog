<?php


namespace Rrosello\Blog\Block\Post;


use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;
use Rrosello\Blog\Api\PostRepositoryInterface;
use Rrosello\Blog\Helper\Data as BlogHelperData;
use Rrosello\Blog\Model\Post;

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

    /**
     * @var BlogHelperData
     */
    protected $blogHelperData;

    public function __construct(
        PostRepositoryInterface $postRepository,
        SortOrderBuilder $sortOrderBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        BlogHelperData $blogHelperData,
        Template\Context $context,
        array $data = [])
    {
        $this->postRepository = $postRepository;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->blogHelperData = $blogHelperData;
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
                ->setPageSize(10)
                ->setCurrentPage(1)
                ->create();

            $posts = $this->postRepository
                ->getList($searchCriteriaBuilder)
                ->getItems();

            $this->setData('posts', $posts);
        }

        return $this->getData('posts');

    }

    public function getMediaUrl()
    {
        $mediaUrl = $this->_storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'blog/image/';
        return $mediaUrl;
    }

    public function getHelperData()
    {
        return $this->blogHelperData;
    }


}