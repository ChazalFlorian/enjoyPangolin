<?php

namespace EP\CommentaryBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'commentary' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.EP.CommentaryBundle.Model.map
 */
class CommentaryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.EP.CommentaryBundle.Model.map.CommentaryTableMap';

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
        $this->setName('commentary');
        $this->setPhpName('Commentary');
        $this->setClassname('EP\\CommentaryBundle\\Model\\Commentary');
        $this->setPackage('src.EP.CommentaryBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', true, null, null);
        $this->addColumn('like', 'Like', 'INTEGER', true, null, null);
        $this->addColumn('dislike', 'Dislike', 'INTEGER', true, null, null);
        $this->addColumn('moderated', 'Moderated', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('author_id', 'AuthorId', 'INTEGER', 'fos_user', 'id', true, null, null);
        $this->addForeignKey('article_id', 'ArticleId', 'INTEGER', 'article', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'EP\\UserBundle\\Model\\User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), null, null);
        $this->addRelation('Article', 'EP\\ArticleBundle\\Model\\Article', RelationMap::MANY_TO_ONE, array('article_id' => 'id', ), null, null);
    } // buildRelations()

} // CommentaryTableMap
