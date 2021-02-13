<?php
/**
 * ORM Interface
 */
namespace App\Core\Contracts;


interface ORMInterface
{
    /**
     * Db Connection
     */
    // protected $connection;

    /**
     * Connection Logic
     */
    public function createConnection();

    /**
     * Create Database Logic
     */
    public function createDb();

    /**
     * Create Table Logic
     */
    public function createTable();

    /**
     * Insert To Table Logic
     */
    public function insertLogic();

    /**
     * Update Table Logic
     */
    public function updateLogic();

    /**
     * Delete Record Logic
     */
    public function deleteLogic();

    /**
     * Find All Record Logic
     */
    public function findAllLogic();

    /**
     * Find One Record Logic
     */
    public function findOneLogic();
}