<?php

namespace EP\ArticleBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'article' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.EP.ArticleBundle.Model.map
 */
class ArticleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.EP.ArticleBundle.Model.map.ArticleTableMap';

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
        $this->setName('article');
        $this->setPhpName('Article');
        $this->setClassname('EP\\ArticleBundle\\Model\\Article');
        $this->setPackage('src.EP.ArticleBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('img', 'Img', 'VARCHAR', true, 255, null);
        $this->addColumn('header', 'Header', 'VARCHAR', true, 255, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('author_id', 'AuthorId', 'INTEGER', 'fos_user', 'id', true, null, null);
        $this->addColumn('YSource', 'Ysource', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'EP\\UserBundle\\Model\\User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), null, null);
        $this->addRelation('Commentary', 'EP\\CommentaryBundle\\Model\\Commentary', RelationMap::ONE_TO_MANY, array('id' => 'article_id', ), null, null, 'Commentaries');
    } // buildRelations()

} // ArticleTableMap
