<?php
/**
 * Created by PhpStorm.
 * User: risheebhatt
 * Date: 5/6/15
 * Time: 10:43 AM
 */
namespace App\Repositories;

interface RepositoryInterface {

	/**
	 * Retrieves all the items in table.
	 *
	 * @return mixed
	 */
	public function all();

	/**
	 * Gets an item by id.
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function getById($id);

	/**
	 * Creates an item.
	 *
	 * @return mixed
	 */
	public function create();

	/**
	 * Edits an item.
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function edit($id);

	/**
	 * Deletes an item.
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function delete($id);
}