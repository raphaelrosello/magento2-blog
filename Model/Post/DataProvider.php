<?php


namespace Raphaelrosello\Blog\Model\Post;


use Magento\Framework\App\Request\DataPersistorInterface;
use Raphaelrosello\Blog\Model\ResourceModel\Post\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * @var CollectionFactory
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collection,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collection->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Prepares Meta
     *
     * @param array $meta
     * @return array
     */
    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var $post \Raphaelrosello\Blog\Model\Post */
        foreach ($items as $post) {
            $this->loadedData[$post->getPostId()] = $post->getData();
        }

        $data = $this->dataPersistor->get('blog_post');
        if (!empty($data)) {
            $post = $this->collection->getNewEmptyItem();
            $post->setData($data);
            $this->loadedData[$post->getPostId()] = $post->getData();
            $this->dataPersistor->clear('blog_post');
        }

        return $this->loadedData;
    }

}