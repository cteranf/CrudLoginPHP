<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'ID' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'NOMBRE' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'APELLIDO' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'USUARIO' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'CONTRASENA' => array(
                                'type' => 'VARCHAR',
                                'constraint'=> '100',
                                
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('TBL_USUARIO');
        }

        public function down()
        {
                $this->dbforge->drop_table('TBL_USUARIO');
        }
}