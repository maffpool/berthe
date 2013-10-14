<?php

/**
 * AbstractNMStorage for N <-> M tables
 *
 * @author ghislain@evaneos.com
 * @copyright Evaneos
 * @version 1.0 
 * @filesource Berthe/AbstractNMStorage.php
 * @package Berthe
 * @see Berthe/AbstractStorage.php
 */
abstract class Berthe_AbstractNMStorage extends Berthe_AbstractStorage {
    /**
     * @param Fetcher $paginator
     * @return Fetcher 
     */
    public function getByPaginator(Fetcher $paginator) {
        $count = $this->_reader->selectCountByPaginator($paginator);
        $ids = $this->_reader->selectIdsByPaginator($paginator);
        $results = $this->getByIds($ids);
        $paginator->setTtlCount($count);
        $paginator->set($results);
        return $paginator;
    }
}