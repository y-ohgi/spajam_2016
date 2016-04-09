<?php

namespace Fuel\Migrations;

class Create_guide_requesters
{
	public function up()
	{
		\DBUtil::create_table('guide_requesters', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'guide_id' => array('constraint' => 11, 'type' => 'int'),
			'request_id' => array('constraint' => 11, 'type' => 'int'),
			'gr_state' => array('constraint' => 11, 'type' => 'int'),
			'comment' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('guide_requesters');
	}
}