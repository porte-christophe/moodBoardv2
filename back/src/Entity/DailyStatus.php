<?php

namespace App\Entity;

use App\Repository\DailyStatusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DailyStatusRepository::class)]
class DailyStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $sleepDuration = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'dailyStatuses')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'dailyStatuses')]
    private ?Mood $mood = null;

    #[ORM\ManyToOne(inversedBy: 'dailyStatuses')]
    private ?BodyStatus $body_status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSleepDuration(): ?int
    {
        return $this->sleepDuration;
    }

    public function setSleepDuration(int $sleepDuration): static
    {
        $this->sleepDuration = $sleepDuration;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getMood(): ?Mood
    {
        return $this->mood;
    }

    public function setMood(?Mood $mood): static
    {
        $this->mood = $mood;

        return $this;
    }

    public function getBodyStatus(): ?BodyStatus
    {
        return $this->body_status;
    }

    public function setBodyStatus(?BodyStatus $body_status): static
    {
        $this->body_status = $body_status;

        return $this;
    }
}
