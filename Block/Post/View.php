<?php


namespace Rrosello\Blog\Block\Post;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;
use Rrosello\Blog\Api\Data\PostInterface;
use Rrosello\Blog\Api\PostRepositoryInterface;

/**
 * @method PostInterface getPost()
 * @method View setPost(PostInterface $post)
 *
 * @package Rrosello\Blog\Block\Post
 */
class View extends Template implements IdentityInterface
{
    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * @var PostInterface
     */
    protected $post;

    public function __construct(
        Template\Context $context,
        PostRepositoryInterface $postRepository,
        array $data = []
    )
    {
        $this->postRepository = $postRepository;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        parent::_construct();

        $post_id = $this->getRequest()->getParam('post_id');
        if($post_id) {
            $this->setPost($this->postRepository->getById($post_id));

        }
    }

    public function getIdentities()
    {
        return [\Rrosello\Blog\Model\Post::CACHE_TAG . '_' . $this->getPost()->getId()];
    }

    public function getMediaUrl()
    {
        $mediaUrl = $this->_storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'blog/image/';

        return $mediaUrl;
    }


}
