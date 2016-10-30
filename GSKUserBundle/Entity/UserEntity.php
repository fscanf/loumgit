<?php

namespace GSKUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Description of ClasseEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="user")
 * 
 */
class UserEntity implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(name="userId", type="integer") 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private   $userId;
    
    /**
     * @ORM\Column(name="userName", type="string", length=100) 
     */
    private   $userName;
    
    /**
     *
     * @ORM\Column(name="password", type="string", length=200)
     */
    private   $password;    
    
    /**
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    private   $email;
    
    /**
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private   $isActive;    
    
    /**
    * @ORM\Column(name="salt", type="string", length=255)
    */
    private $salt;
    
    /**
    * @ORM\Column(name="roles", type="string", length=50)
    */
    private $roles;
   
    
    public function __contruct() {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }
    
    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return UserEntity
     */
    public function setUerName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return UserEntity
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
   
    public function getSalt() 
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    public function getRoles()
    {
        return array('ROLE_USER');
    }
 
    public function eraseCredentials()
    {
 
    }
 
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->userId,
            $this->userName,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }
    
    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->userId,
            $this->userName,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    
    public function equals(UserInterface $user)
    {
        return $user->getUsername() == $this->getUsername();
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return UserEntity
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return UserEntity
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return UserEntity
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }
    
}
