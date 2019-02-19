<?php


namespace Rrosello\Blog\Api;


use Rrosello\Blog\Api\Data\PostInterface;

interface PostRepositoryInterface
{

    /**
     * Save blog
     *
     * @param \Rrosello\Blog\Api\Data\PostInterface $post
     * @param bool $saveOptions
     * @return \Rrosello\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Rrosello\Blog\Api\Data\PostInterface $post, $saveOptions = false);

    /**
     * Get Blog by ID
     * @param int $post_id
     * @return \Rrosello\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($post_id);

    /**
     * Get post by URL key
     *
     * @param string $url_key
     * @return \Rrosello\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByUrlKey($url_key);

    /**
     * Delete blog object
     *
     * @param PostInterface $post
     * @return bool
     */
    public function delete(PostInterface $post);

    /**
     * Delete Blog by ID
     *
     * @param int $post_id
     * @return bool
     */
    public function deleteById($post_id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Rrosello\Blog\Api\Data\PostSearchInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

}