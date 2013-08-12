<?php

namespace Fuel\Migrations;

class Create_pricingtable
{
	public function up()
	{
		\DBUtil::create_table('pricingtable', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'id_pricingtable_theme' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pricingtable');
	}
}