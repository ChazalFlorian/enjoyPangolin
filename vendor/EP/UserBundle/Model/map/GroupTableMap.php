<?php

namespace EP\UserBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'fos_group' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor.EP.UserBundle.Model.map
 */
class GroupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'vendor.EP.UserBundle.Model.map.GroupTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('fos_group');
        $this->setPhpName('Group');
        $this->setClassname('EP\\UserBundle\\Model\\Group');
        $this->setPackage('vendor.EP.UserBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->getColumn('name', false)->setPrimaryString(true);
        $this->addColumn('roles', 'Roles', 'ARRAY', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UserGroup', 'EP\\UserBundle\\Model\\UserGroup', RelationMap::ONE_TO_MANY, array('id' => 'fos_group_id', ), null, null, 'UserGroups');
        $this->addRelation('User', 'EP\\UserBundle\\Model\\User', RelationMap::MANY_TO_MANY, array(), null, null, 'Users');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'typehintable' =>  array (
  'roles' => 'array',
),
        );
    } // getBehaviors()

} // GroupTableMap
