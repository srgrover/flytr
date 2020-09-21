<?php

namespace App\Entity;

use App\Repository\FollowRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FollowRepository::class)
 */
class Follow
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="followers")
     */
    private $user_following;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="following")
     */
    private $user_followed;

    public function getUserFollowing(): ?User
    {
        return $this->user_following;
    }

    public function setUserFollowing(?User $user_following): self
    {
        $this->user_following = $user_following;

        return $this;
    }

    public function getUserFollowed(): ?User
    {
        return $this->user_followed;
    }

    public function setUserFollowed(?User $user_followed): self
    {
        $this->user_followed = $user_followed;

        return $this;
    }
    
}
