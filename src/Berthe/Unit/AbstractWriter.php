<?php

/**
 * Class definition for Writer Berthe_Modules_Transaction_Writer
 * 
 * @author dev@evaneos.com
 * @copyright Evaneos
 * @version 1.0 
 * @filesource Berthe/Transaction/Writer.php
 * @package Berthe/Transaction
 */
abstract class Berthe_Unit_AbstractWriter extends Berthe_AbstractWriter {

    /**
     * Should return an instance of implementation of Berthe_Unit_AbstractData corresponding to the module
     */
    abstract protected function _getData();
    // Methods
    /**
     * inserts a new Berthe_Modules_Transaction_VO in the database
     * @param Berthe_Modules_Transaction_VO $object 
     * @return boolean
     */
    public function insert(Berthe_AbstractVO $object) {
        $_data = $this->_getData();
        $_data[] = $object;
    }

    /**
     * update a Berthe_Modules_Transaction_VO in the database
     * @param Berthe_Modules_Transaction_VO $object 
     * @return boolean
     */
    public function update(Berthe_AbstractVO $object) {
        $_data = $this->_getData();
        $_data[] = $object;
    }

    /**
     * deletes a Berthe_Modules_Transaction_VO from the database
     * @param Berthe_Modules_Transaction_VO $object 
     * @return boolean
     */
    public function delete(Berthe_AbstractVO $object) {
        $_data = $this->_getData();
        unset($_data[$object->id]);
    }

    public function deleteById($id) {
        $_data = $this->_getData();
        unset($_data[$id]);
    }
}