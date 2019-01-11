<?php


namespace Raphaelrosello\Blog\Api;


interface PostRepositoryInterface
{

    /**
     * Save blog
     *
     * @param \Raphaelrosello\Blog\Api\Data\PostInterface $post
     * @param bool $saveOptions
     * @return \Raphaelrosello\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Raphaelrosello\Blog\Api\Data\PostInterface $post, $saveOptions = false);

    /**
     * Get Blog by ID
     * @param int $post_id
     * @return \Raphaelrosello\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($post_id);

    /**
     * @param string $url_key
     * @return \Raphaelrosello\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByUrlKey($url_key);

    /**
     * Delete Blog
     *
     * @param int $post_id
     * @return bool
     */
    public function deleteById($post_id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Raphaelrosello\Blog\Api\Data\PostSearchInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

}