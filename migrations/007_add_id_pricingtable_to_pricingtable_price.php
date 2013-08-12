<?php

namespace Fuel\Migrations;

class Add_id_pricingtable_to_pricingtable_price
{
	public function up()
	{
		\DBUtil::add_fields('pricingtable_price', array(
			'id_pricingtable' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('pricingtable_price', array(
			'id_pricingtable'

		));
	}
}