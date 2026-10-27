<?php

namespace App\Entity;

use App\Repository\FeedBackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedBackRepository::class)]
class FeedBack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $count = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'feedBacks')]
    private ?Mood $id_mood = null;

    #[ORM\ManyToOne(inversedBy: 'feedBacks')]
    private ?Activity $id_activity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIdMood(): ?Mood
    {
        return $this->id_mood;
    }

    public function setIdMood(?Mood $id_mood): static
    {
        $this->id_mood = $id_mood;

        return $this;
    }

    public function getIdActivity(): ?Activity
    {
        return $this->id_activity;
    }

    public function setIdActivity(?Activity $id_activity): static
    {
        $this->id_activity = $id_activity;

        return $this;
    }
}
