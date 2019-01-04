<?php


namespace Raphaelrosello\Blog\Block\Post;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;
use Raphaelrosello\Blog\Model\Post;
use Raphaelrosello\Blog\Model\ResourceModel\Post\CollectionFactory;
use Raphaelrosello\Blog\Model\ResourceModel\Post\Collection as PostCollection;

class PostList extends Template implements IdentityInterface
{
    protected $_postCollectionFactory;

    public function __construct(
        CollectionFactory $postCollectionFactory,
        Template\Context $context,
        array $data = [])
    {
        $this->_postCollectionFactory = $postCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getIdentities()
    {
        return [Post::CACHE_TAG.'_'.'list'];
    }

    public function getPosts()
    {
        if (!$this->hasData('posts')) {
            $posts = $this->_postCollectionFactory->create()
                ->addFilter('status', 1)
                ->addOrder(
                    Post::CREATED_AT,
                    PostCollection::SORT_ORDER_DESC
                );
            $this->setData('posts', $posts);
        }

        return $this->getData('posts');

    }

}