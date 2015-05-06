<?php
/**
 * Created by PhpStorm.
 * User: risheebhatt
 * Date: 5/6/15
 * Time: 10:22 AM
 */

namespace App\Models;

class Acl extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'acl';

	/**
	 * Primary key for the acl table.
	 *
	 * @var string
	 */
	protected $primaryKey = 'acl_id';
}