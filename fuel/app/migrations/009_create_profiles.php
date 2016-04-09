<?php

namespace Fuel\Migrations;

class Create_profiles
{
	public function up()
	{
		\DBUtil::create_table('profiles', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'img_path' => array('constraint' => 255, 'type' => 'varchar'),
			'hobby' => array('constraint' => 255, 'type' => 'varchar'),
			'age' => array('constraint' => 11, 'type' => 'int'),
			'location' => array('constraint' => 255, 'type' => 'varchar'),
			'remark' => array('type' => 'text'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('profiles');
	}
}