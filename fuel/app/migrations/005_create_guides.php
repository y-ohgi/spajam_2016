<?php

namespace Fuel\Migrations;

class Create_guides
{
	public function up()
	{
		\DBUtil::create_table('guides', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'request' => array('constraint' => 255, 'type' => 'varchar'),
			'start_time' => array('type' => 'datetime'),
			'end_time' => array('type' => 'datetime'),
			'remark' => array('type' => 'text'),
			'location' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('guides');
	}
}