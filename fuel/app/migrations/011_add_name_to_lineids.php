<?php

namespace Fuel\Migrations;

class Add_name_to_lineids
{
	public function up()
	{
		\DBUtil::add_fields('lineids', array(
			'name' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('lineids', array(
			'name'

		));
	}
}