<?php


namespace Raphaelrosello\Blog\Model;


use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Raphaelrosello\Blog\Api\Data\PostInterface;
use Raphaelrosello\Blog\Api\Data\PostSearchInterfaceFactory;
use Raphaelrosello\Blog\Api\PostRepositoryInterface;
use Raphaelrosello\Blog\Model\ResourceModel\Post as PostResource;
use Raphaelrosello\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var \Raphaelrosello\Blog\Model\ResourceModel\Post
     */
    protected $postResource;

    /**
     * @var PostFactory
     */
    protected $postFactory;

    protected $collection;

    protected $postSearchFactory;

    private $collectionProcessor;

    public function __construct(
        PostResource $postResource,
        PostFactory $postFactory,
        PostCollectionFactory $collection,
        PostSearchInterfaceFactory $postSearchFactory,
        CollectionProcessor $collectionProcessor
    )
    {
        $this->postResource = $postResource;
        $this->postFactory = $postFactory;
        $this->collection = $collection;
        $this->postSearchFactory = $postSearchFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(PostInterface $post, $saveOptions = false)
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritdoc
     */
    public function getById($post_id)
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $post_id);

        if(!$post->getId()) {
            throw new NoSuchEntityException(__('Unable to find Post with ID "%1"', $post_id));
        }

        return $post;
    }

    /**
     * @inheritdoc
     */
    public function getByUrlKey($url_key)
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $url_key, 'url_key');

        if(!$post->getId()) {
            throw new NoSuchEntityException(__('Unable to find Post with url_key "%1"', $url_key));
        }

        return $post;
    }


    public function deleteById($post_id)
    {
        // TODO: Implement deleteById() method.
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collection->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResult = $this->postSearchFactory->create();

        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());

        return $searchResult;

    }


}