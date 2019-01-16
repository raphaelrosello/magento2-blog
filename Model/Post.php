<?php


namespace Raphaelrosello\Blog\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Raphaelrosello\Blog\Api\Data\PostInterface;

class Post extends AbstractModel implements PostInterface, IdentityInterface
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'blog_post';

    /**
     * @var string
     */
    protected $_cacheTag = 'blog_post';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'blog_post';


    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('Raphaelrosello\Blog\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getData(self::POST_ID);
    }


    /**
     * @inheritdoc
     */
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * @inheritdoc
     */
    public function setPostId($post_id)
    {
        $this->setData(self::POST_ID, $post_id);
    }

    /**
     * @inheritdoc
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * @inheritdoc
     */
    public function setStoreId($store_id)
    {
        $this->setData(self::STORE_ID, $store_id);
    }

    /**
     * @inheritdoc
     */
    public function getShortDescription()
    {
        return $this->getData(self::SHORT_DESCRIPTION);
    }

    /**
     * @inheritdoc
     */
    public function setShortDescription($short_description)
    {
        $this->setData(self::SHORT_DESCRIPTION, $short_description);
    }

    /**
     * @inheritdoc
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @inheritdoc
     */
    public function setContent($content)
    {
        $this->setData(self::CONTENT, $content);
    }

    /**
     * @inheritdoc
     */
    public function getAuthorId()
    {
        return $this->getData(self::AUTHOR_ID);
    }

    /**
     * @inheritdoc
     */
    public function setAuthorId($author_id)
    {
        $this->setData(self::AUTHOR_ID, $author_id);
    }

    /**
     * @inheritdoc
     */
    public function isActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    /**
     * @inheritdoc
     */
    public function setIsActive($isActive)
    {
        $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * @inheritdoc
     */
    public function getAllowComment()
    {
        return $this->getData(self::ALLOW_COMMENT);
    }

    /**
     * @inheritdoc
     */
    public function setAllowComment($allow_comment)
    {
        $this->setData(self::ALLOW_COMMENT, $allow_comment);
    }

    /**
     * @inheritdoc
     */
    public function getUrlKey()
    {
        return $this->getData(self::URL_KEY);
    }

    /**
     * @inheritdoc
     */
    public function setUrlKey($url_key)
    {
        $this->setData(self::URL_KEY, $url_key);
    }

    /**
     * @inheritdoc
     */
    public function getViews()
    {
        return $this->getData(self::VIEWS);
    }

    /**
     * @inheritdoc
     */
    public function setViews($views)
    {
        $this->setData(self::VIEWS, $views);
    }

    /**
     * @inheritdoc
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @inheritdoc
     */
    public function setImage($image)
    {
        $this->setData(self::IMAGE, $image);
    }

    /**
     * @inheritdoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function setCreatedAt($created_at)
    {
        $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * @inheritdoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function setUpdatedAt($updated_at)
    {
        $this->setData(self::UPDATED_AT, $updated_at);
    }




}