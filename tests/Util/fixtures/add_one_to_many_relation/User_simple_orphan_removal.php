<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UserAvatarPhoto::class, orphanRemoval: true)]
    private $avatarPhotos;

    public function __construct()
    {
        $this->avatarPhotos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, UserAvatarPhoto>
     */
    public function getAvatarPhotos(): Collection
    {
        return $this->avatarPhotos;
    }

    public function addAvatarPhoto(UserAvatarPhoto $avatarPhoto): self
    {
        if (!$this->avatarPhotos->contains($avatarPhoto)) {
            $this->avatarPhotos->add($avatarPhoto);
            $avatarPhoto->setUser($this);
        }

        return $this;
    }

    public function removeAvatarPhoto(UserAvatarPhoto $avatarPhoto): self
    {
        if ($this->avatarPhotos->removeElement($avatarPhoto)) {
            // set the owning side to null (unless already changed)
            if ($avatarPhoto->getUser() === $this) {
                $avatarPhoto->setUser(null);
            }
        }

        return $this;
    }
}
