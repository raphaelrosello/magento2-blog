<?php


namespace Raphaelrosello\Blog\Api\Data;


interface PostInterface
{

    CONST POST_ID = 'post_id';
    CONST STORE_ID = 'store_id';
    CONST SHORT_DESCRIPTION = 'short_description';
    CONST CONTENT = 'content';
    CONST AUTHOR_ID = 'author_id';
    CONST STATUS = 'status';
    CONST ALLOW_CONTENT = 'allow_comment';
    CONST URL_KEY = 'url_key';
    CONST VIEWS = 'views';
    CONST IMAGE = 'image';
    CONST CREATED_AT = 'created_at';
    CONST UPDATED_AT = 'updated_at';

    /**
     * @return int
     */
    public function getPostId();

    /**
     * @param int $post_id
     */
    public function setPostId($post_id);

    /**
     * @return int
     */
    public function getStoreId();

    /**
     * @param int $store_id
     */
    public function setStoreId($store_id);

    /**
     * @return string
     */
    public function getShortDescription();

    /**
     * @param string $short_description
     */
    public function setShortDescription($short_description);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param string $content
     */
    public function setContent($content);

    /**
     * @return int
     */
    public function getAuthorId();

    /**
     * @param int $author_id
     */
    public function setAuthorId($author_id);

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param string $status
     */
    public function setStatus($status);

    /**
     * @return bool
     */
    public function getAllowComment();

    /**
     * @param bool $allow_comment
     */
    public function setAllowComment($allow_comment);

    /**
     * @return string
     */
    public function getUrlKey();

    /**
     * @param string $url_key
     */
    public function setUrlKey($url_key);

    /**
     * @return int
     */
    public function getViews();

    /**
     * @param int $views
     */
    public function setViews($views);

    /**
     * @return string
     */
    public function getImage();

    /**
     * @param string $image
     */
    public function setImage($image);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at);

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at);

}