<?php

namespace EP\UserBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use EP\UserBundle\Model\Group;
use EP\UserBundle\Model\User;
use EP\UserBundle\Model\UserGroup;
use EP\UserBundle\Model\UserPeer;
use EP\UserBundle\Model\UserQuery;

/**
 * @method UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method UserQuery orderByUsernameCanonical($order = Criteria::ASC) Order by the username_canonical column
 * @method UserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method UserQuery orderByEmailCanonical($order = Criteria::ASC) Order by the email_canonical column
 * @method UserQuery orderByEnabled($order = Criteria::ASC) Order by the enabled column
 * @method UserQuery orderBySalt($order = Criteria::ASC) Order by the salt column
 * @method UserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method UserQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method UserQuery orderByLocked($order = Criteria::ASC) Order by the locked column
 * @method UserQuery orderByExpired($order = Criteria::ASC) Order by the expired column
 * @method UserQuery orderByExpiresAt($order = Criteria::ASC) Order by the expires_at column
 * @method UserQuery orderByConfirmationToken($order = Criteria::ASC) Order by the confirmation_token column
 * @method UserQuery orderByPasswordRequestedAt($order = Criteria::ASC) Order by the password_requested_at column
 * @method UserQuery orderByCredentialsExpired($order = Criteria::ASC) Order by the credentials_expired column
 * @method UserQuery orderByCredentialsExpireAt($order = Criteria::ASC) Order by the credentials_expire_at column
 * @method UserQuery orderByRoles($order = Criteria::ASC) Order by the roles column
 * @method UserQuery orderByFacebookid($order = Criteria::ASC) Order by the facebookId column
 *
 * @method UserQuery groupById() Group by the id column
 * @method UserQuery groupByUsername() Group by the username column
 * @method UserQuery groupByUsernameCanonical() Group by the username_canonical column
 * @method UserQuery groupByEmail() Group by the email column
 * @method UserQuery groupByEmailCanonical() Group by the email_canonical column
 * @method UserQuery groupByEnabled() Group by the enabled column
 * @method UserQuery groupBySalt() Group by the salt column
 * @method UserQuery groupByPassword() Group by the password column
 * @method UserQuery groupByLastLogin() Group by the last_login column
 * @method UserQuery groupByLocked() Group by the locked column
 * @method UserQuery groupByExpired() Group by the expired column
 * @method UserQuery groupByExpiresAt() Group by the expires_at column
 * @method UserQuery groupByConfirmationToken() Group by the confirmation_token column
 * @method UserQuery groupByPasswordRequestedAt() Group by the password_requested_at column
 * @method UserQuery groupByCredentialsExpired() Group by the credentials_expired column
 * @method UserQuery groupByCredentialsExpireAt() Group by the credentials_expire_at column
 * @method UserQuery groupByRoles() Group by the roles column
 * @method UserQuery groupByFacebookid() Group by the facebookId column
 *
 * @method UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UserQuery leftJoinUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserGroup relation
 * @method UserQuery rightJoinUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserGroup relation
 * @method UserQuery innerJoinUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the UserGroup relation
 *
 * @method User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method User findOneOrCreate(PropelPDO $con = null) Return the first User matching the query, or a new User object populated from the query conditions when no match is found
 *
 * @method User findOneByUsername(string $username) Return the first User filtered by the username column
 * @method User findOneByUsernameCanonical(string $username_canonical) Return the first User filtered by the username_canonical column
 * @method User findOneByEmail(string $email) Return the first User filtered by the email column
 * @method User findOneByEmailCanonical(string $email_canonical) Return the first User filtered by the email_canonical column
 * @method User findOneByEnabled(boolean $enabled) Return the first User filtered by the enabled column
 * @method User findOneBySalt(string $salt) Return the first User filtered by the salt column
 * @method User findOneByPassword(string $password) Return the first User filtered by the password column
 * @method User findOneByLastLogin(string $last_login) Return the first User filtered by the last_login column
 * @method User findOneByLocked(boolean $locked) Return the first User filtered by the locked column
 * @method User findOneByExpired(boolean $expired) Return the first User filtered by the expired column
 * @method User findOneByExpiresAt(string $expires_at) Return the first User filtered by the expires_at column
 * @method User findOneByConfirmationToken(string $confirmation_token) Return the first User filtered by the confirmation_token column
 * @method User findOneByPasswordRequestedAt(string $password_requested_at) Return the first User filtered by the password_requested_at column
 * @method User findOneByCredentialsExpired(boolean $credentials_expired) Return the first User filtered by the credentials_expired column
 * @method User findOneByCredentialsExpireAt(string $credentials_expire_at) Return the first User filtered by the credentials_expire_at column
 * @method User findOneByRoles(array $roles) Return the first User filtered by the roles column
 * @method User findOneByFacebookid(string $facebookId) Return the first User filtered by the facebookId column
 *
 * @method array findById(int $id) Return User objects filtered by the id column
 * @method array findByUsername(string $username) Return User objects filtered by the username column
 * @method array findByUsernameCanonical(string $username_canonical) Return User objects filtered by the username_canonical column
 * @method array findByEmail(string $email) Return User objects filtered by the email column
 * @method array findByEmailCanonical(string $email_canonical) Return User objects filtered by the email_canonical column
 * @method array findByEnabled(boolean $enabled) Return User objects filtered by the enabled column
 * @method array findBySalt(string $salt) Return User objects filtered by the salt column
 * @method array findByPassword(string $password) Return User objects filtered by the password column
 * @method array findByLastLogin(string $last_login) Return User objects filtered by the last_login column
 * @method array findByLocked(boolean $locked) Return User objects filtered by the locked column
 * @method array findByExpired(boolean $expired) Return User objects filtered by the expired column
 * @method array findByExpiresAt(string $expires_at) Return User objects filtered by the expires_at column
 * @method array findByConfirmationToken(string $confirmation_token) Return User objects filtered by the confirmation_token column
 * @method array findByPasswordRequestedAt(string $password_requested_at) Return User objects filtered by the password_requested_at column
 * @method array findByCredentialsExpired(boolean $credentials_expired) Return User objects filtered by the credentials_expired column
 * @method array findByCredentialsExpireAt(string $credentials_expire_at) Return User objects filtered by the credentials_expire_at column
 * @method array findByRoles(array $roles) Return User objects filtered by the roles column
 * @method array findByFacebookid(string $facebookId) Return User objects filtered by the facebookId column
 */
abstract class BaseUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUserQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'default';
        }
        if (null === $modelName) {
            $modelName = 'EP\\UserBundle\\Model\\User';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UserQuery) {
            return $criteria;
        }
        $query = new UserQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   User|User[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 User A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 User A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `credentials_expired`, `credentials_expire_at`, `roles`, `facebookId` FROM `fos_user` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new User();
            $obj->hydrate($row);
            UserPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return User|User[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|User[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UserPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UserPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the username_canonical column
     *
     * Example usage:
     * <code>
     * $query->filterByUsernameCanonical('fooValue');   // WHERE username_canonical = 'fooValue'
     * $query->filterByUsernameCanonical('%fooValue%'); // WHERE username_canonical LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usernameCanonical The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByUsernameCanonical($usernameCanonical = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usernameCanonical)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usernameCanonical)) {
                $usernameCanonical = str_replace('*', '%', $usernameCanonical);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::USERNAME_CANONICAL, $usernameCanonical, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the email_canonical column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailCanonical('fooValue');   // WHERE email_canonical = 'fooValue'
     * $query->filterByEmailCanonical('%fooValue%'); // WHERE email_canonical LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailCanonical The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByEmailCanonical($emailCanonical = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailCanonical)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $emailCanonical)) {
                $emailCanonical = str_replace('*', '%', $emailCanonical);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::EMAIL_CANONICAL, $emailCanonical, $comparison);
    }

    /**
     * Filter the query on the enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByEnabled(true); // WHERE enabled = true
     * $query->filterByEnabled('yes'); // WHERE enabled = true
     * </code>
     *
     * @param     boolean|string $enabled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByEnabled($enabled = null, $comparison = null)
    {
        if (is_string($enabled)) {
            $enabled = in_array(strtolower($enabled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::ENABLED, $enabled, $comparison);
    }

    /**
     * Filter the query on the salt column
     *
     * Example usage:
     * <code>
     * $query->filterBySalt('fooValue');   // WHERE salt = 'fooValue'
     * $query->filterBySalt('%fooValue%'); // WHERE salt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterBySalt($salt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $salt)) {
                $salt = str_replace('*', '%', $salt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::SALT, $salt, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login < '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(UserPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(UserPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::LAST_LOGIN, $lastLogin, $comparison);
    }

    /**
     * Filter the query on the locked column
     *
     * Example usage:
     * <code>
     * $query->filterByLocked(true); // WHERE locked = true
     * $query->filterByLocked('yes'); // WHERE locked = true
     * </code>
     *
     * @param     boolean|string $locked The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByLocked($locked = null, $comparison = null)
    {
        if (is_string($locked)) {
            $locked = in_array(strtolower($locked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::LOCKED, $locked, $comparison);
    }

    /**
     * Filter the query on the expired column
     *
     * Example usage:
     * <code>
     * $query->filterByExpired(true); // WHERE expired = true
     * $query->filterByExpired('yes'); // WHERE expired = true
     * </code>
     *
     * @param     boolean|string $expired The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByExpired($expired = null, $comparison = null)
    {
        if (is_string($expired)) {
            $expired = in_array(strtolower($expired), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::EXPIRED, $expired, $comparison);
    }

    /**
     * Filter the query on the expires_at column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiresAt('2011-03-14'); // WHERE expires_at = '2011-03-14'
     * $query->filterByExpiresAt('now'); // WHERE expires_at = '2011-03-14'
     * $query->filterByExpiresAt(array('max' => 'yesterday')); // WHERE expires_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $expiresAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByExpiresAt($expiresAt = null, $comparison = null)
    {
        if (is_array($expiresAt)) {
            $useMinMax = false;
            if (isset($expiresAt['min'])) {
                $this->addUsingAlias(UserPeer::EXPIRES_AT, $expiresAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiresAt['max'])) {
                $this->addUsingAlias(UserPeer::EXPIRES_AT, $expiresAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::EXPIRES_AT, $expiresAt, $comparison);
    }

    /**
     * Filter the query on the confirmation_token column
     *
     * Example usage:
     * <code>
     * $query->filterByConfirmationToken('fooValue');   // WHERE confirmation_token = 'fooValue'
     * $query->filterByConfirmationToken('%fooValue%'); // WHERE confirmation_token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $confirmationToken The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfirmationToken($confirmationToken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($confirmationToken)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $confirmationToken)) {
                $confirmationToken = str_replace('*', '%', $confirmationToken);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::CONFIRMATION_TOKEN, $confirmationToken, $comparison);
    }

    /**
     * Filter the query on the password_requested_at column
     *
     * Example usage:
     * <code>
     * $query->filterByPasswordRequestedAt('2011-03-14'); // WHERE password_requested_at = '2011-03-14'
     * $query->filterByPasswordRequestedAt('now'); // WHERE password_requested_at = '2011-03-14'
     * $query->filterByPasswordRequestedAt(array('max' => 'yesterday')); // WHERE password_requested_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $passwordRequestedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPasswordRequestedAt($passwordRequestedAt = null, $comparison = null)
    {
        if (is_array($passwordRequestedAt)) {
            $useMinMax = false;
            if (isset($passwordRequestedAt['min'])) {
                $this->addUsingAlias(UserPeer::PASSWORD_REQUESTED_AT, $passwordRequestedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($passwordRequestedAt['max'])) {
                $this->addUsingAlias(UserPeer::PASSWORD_REQUESTED_AT, $passwordRequestedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::PASSWORD_REQUESTED_AT, $passwordRequestedAt, $comparison);
    }

    /**
     * Filter the query on the credentials_expired column
     *
     * Example usage:
     * <code>
     * $query->filterByCredentialsExpired(true); // WHERE credentials_expired = true
     * $query->filterByCredentialsExpired('yes'); // WHERE credentials_expired = true
     * </code>
     *
     * @param     boolean|string $credentialsExpired The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByCredentialsExpired($credentialsExpired = null, $comparison = null)
    {
        if (is_string($credentialsExpired)) {
            $credentialsExpired = in_array(strtolower($credentialsExpired), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CREDENTIALS_EXPIRED, $credentialsExpired, $comparison);
    }

    /**
     * Filter the query on the credentials_expire_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCredentialsExpireAt('2011-03-14'); // WHERE credentials_expire_at = '2011-03-14'
     * $query->filterByCredentialsExpireAt('now'); // WHERE credentials_expire_at = '2011-03-14'
     * $query->filterByCredentialsExpireAt(array('max' => 'yesterday')); // WHERE credentials_expire_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $credentialsExpireAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByCredentialsExpireAt($credentialsExpireAt = null, $comparison = null)
    {
        if (is_array($credentialsExpireAt)) {
            $useMinMax = false;
            if (isset($credentialsExpireAt['min'])) {
                $this->addUsingAlias(UserPeer::CREDENTIALS_EXPIRE_AT, $credentialsExpireAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($credentialsExpireAt['max'])) {
                $this->addUsingAlias(UserPeer::CREDENTIALS_EXPIRE_AT, $credentialsExpireAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::CREDENTIALS_EXPIRE_AT, $credentialsExpireAt, $comparison);
    }

    /**
     * Filter the query on the roles column
     *
     * @param     array $roles The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByRoles($roles = null, $comparison = null)
    {
        $key = $this->getAliasedColName(UserPeer::ROLES);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($roles as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($roles as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($roles as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(UserPeer::ROLES, $roles, $comparison);
    }

    /**
     * Filter the query on the roles column
     * @param     mixed $roles The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByRole($roles = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($roles)) {
                $roles = '%| ' . $roles . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $roles = '%| ' . $roles . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(UserPeer::ROLES);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $roles, $comparison);
            } else {
                $this->addAnd($key, $roles, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(UserPeer::ROLES, $roles, $comparison);
    }

    /**
     * Filter the query on the facebookId column
     *
     * Example usage:
     * <code>
     * $query->filterByFacebookid('fooValue');   // WHERE facebookId = 'fooValue'
     * $query->filterByFacebookid('%fooValue%'); // WHERE facebookId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $facebookid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByFacebookid($facebookid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($facebookid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $facebookid)) {
                $facebookid = str_replace('*', '%', $facebookid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::FACEBOOKID, $facebookid, $comparison);
    }

    /**
     * Filter the query by a related UserGroup object
     *
     * @param   UserGroup|PropelObjectCollection $userGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserGroup($userGroup, $comparison = null)
    {
        if ($userGroup instanceof UserGroup) {
            return $this
                ->addUsingAlias(UserPeer::ID, $userGroup->getFosUserId(), $comparison);
        } elseif ($userGroup instanceof PropelObjectCollection) {
            return $this
                ->useUserGroupQuery()
                ->filterByPrimaryKeys($userGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUserGroup() only accepts arguments of type UserGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserGroup');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UserGroup');
        }

        return $this;
    }

    /**
     * Use the UserGroup relation UserGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \EP\UserBundle\Model\UserGroupQuery A secondary query class using the current class as primary query
     */
    public function useUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserGroup', '\EP\UserBundle\Model\UserGroupQuery');
    }

    /**
     * Filter the query by a related Group object
     * using the fos_user_group table as cross reference
     *
     * @param   Group $group the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     */
    public function filterByGroup($group, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useUserGroupQuery()
            ->filterByGroup($group, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   User $user Object to remove from the list of results
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserPeer::ID, $user->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
