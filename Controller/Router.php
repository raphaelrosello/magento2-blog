<?php


namespace Rrosello\Blog\Controller;


use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\Url;
use Rrosello\Blog\Api\PostRepositoryInterface;

class Router implements RouterInterface
{

    /**
     * @var ActionFactory
     */
    protected $actionFactory;

    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    public function __construct(
        ActionFactory $actionFactory,
        PostRepositoryInterface $postRepository
    )
    {
        $this->actionFactory = $actionFactory;
        $this->postRepository = $postRepository;
    }

    /**
     * Validate and match blog post and modify request
     *
     * @param RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function match(RequestInterface $request)
    {
        $url_key = trim($request->getPathInfo(), '/blog/');
        $url_key = rtrim($url_key, '/');

        $post = $this->postRepository->getByUrlKey($url_key);

        if(!$post->getPostId()) {
            return null;
        }

        $request
            ->setModuleName('blog')
            ->setControllerName('post')
            ->setActionName('index')
            ->setParam('post_id', $post->getPostId());


        $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $url_key);

        return $this->actionFactory->create('Magento\Framework\App\Action\Forward');
    }


}