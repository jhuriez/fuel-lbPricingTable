<?php

namespace Fuel\Migrations;

class Create_pricingtable_attribute_value
{
	public function up()
	{
		\DBUtil::create_table('pricingtable_attribute_value', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'position' => array('constraint' => 11, 'type' => 'int'),
			'tooltip_info' => array('type' => 'text', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pricingtable_attribute_value');
	}
}