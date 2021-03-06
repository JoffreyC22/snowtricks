<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(
 *     "username",
 *     message="Ce pseudo est déjà utilisé"
 * )
 * @UniqueEntity(
 *     "email",
 *     message="Cet e-mail est déjà utilisé"
 * )
 * @ORM\HasLifecycleCallbacks
 */
class User implements AdvancedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = 2,
     *     max = 15,
     *     minMessage = "Minimum 2 caractères",
     *     maxMessage = "Maximum 15 caractères"
     * )
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = 2,
     *     max = 15,
     *     minMessage = "Minimum 2 caractères",
     *     maxMessage = "Maximum 15 caractères"
     * )
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     * @Assert\Image(
     *     maxSize = "1024k",
     * )
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=4,
     *     max=4096,
     *     minMessage = "Le mot de passe doit contenir au moins quatre caractères"
     * )
     */
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = 2,
     *     max = 10,
     *     minMessage = "Le pseudo doit contenir au moins deux caractères",
     *     maxMessage = "Le pseudo ne peut pas dépasser 10 caractères"
     * )
     */
    private $username;

    /**
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    /**
     * @var string
     *
     * @ORM\Column(name="token_activation", type="string", length=255)
     */
    private $token_activation;

    /**
     * @var string
     *
     * @ORM\Column(name="token_reset_password", type="string", length=255, nullable=true)
     */
    private $token_reset_password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reset_password", type="datetime", nullable=true)
     */
    private $date_reset_password;

    /**
     * Set date expiracy token reset password
     *
     * @param \DateTime $date_reset_password
     *
     */
    public function setDateResetPassword($date_reset_password)
    {
        $this->date_reset_password = $date_reset_password;

        return $this;
    }

    /**
     * Get date expiracy token reset password
     *
     * @return \DateTime
     */
    public function getDateResetPassword()
    {
        return $this->date_reset_password;
    }

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


    public function __construct() {
        $this->roles = array("ROLE_USER");
        $this->salt = null;
        $this->token_activation = bin2hex(random_bytes(20));
    }


    // Les getters et setters

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set password
     *
     * @param string $password
     *
     * @return User
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

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    /**
     * Set salt.
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set roles.
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set token_activation
     *
     * @param string $token_activation
     *
     * @return User
     */
    public function setTokenActivation($token_activation)
    {
        $this->token_activation = $token_activation;

        return $this;
    }

    /**
     * Get token_activation
     *
     * @return string
     */
    public function getTokenActivation()
    {
        return $this->token_activation;
    }

    /**
     * Set token_reset_password
     *
     * @param string $token_reset_password
     *
     * @return User
     */
    public function setTokenResetPassword($token_reset_password)
    {
        $this->token_reset_password = $token_reset_password;

        return $this;
    }

    /**
     * Get token_reset_password
     *
     * @return string
     */
    public function getTokenResetPassword()
    {
        return $this->token_reset_password;
    }

    /**
     * Set isActive.
     *
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
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


    // serialize and unserialize must be updated - see below
    public function serialize()
    {
        return serialize(array(
            // ...
            $this->isActive,
        ));
    }
    public function unserialize($serialized)
    {
        list (
            // ...
            $this->isActive,
            ) = unserialize($serialized);
    }
}
